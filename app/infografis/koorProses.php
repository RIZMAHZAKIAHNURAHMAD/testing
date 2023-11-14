<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
include("../../koneksi/index.php");

// If upload button is clicked ...
if (isset($_POST['code'])) {
    $code = $_POST['code'];
    $id_pendukung = $_POST['id_pendukung'];
    $created_date = date('Y-m-d H:i:s');
    $created_by = $_SESSION['id'];

    $store = "INSERT INTO koordinator (`code`, `id_pendukung`,`created_date`, `created_by`) VALUES (
        '" . $code . "',
        '" . $id_pendukung . "',
        '" . $created_date . "',
        '" . $created_by . "'
        )";

    // echo $store;
    $add = mysqli_query($conn, $store);
    if (strlen($code) <= 4) {
        echo "<script>window.location.href = \"$base_url?r=kab#" . $_POST['code'] . "\" </script>";
    }elseif (substr($code, 0, 2) == 99) {
        echo "<script>window.location.href = \"$base_url?r=infografis-tps&code=" . $_POST['code2'] . "\" </script>";
    }elseif (strlen($code) == 6) {
        echo "<script>window.location.href = \"$base_url?r=kec&code=" . substr($_POST['code'],0,4) . "#" . $_POST['code'] . "\" </script>";
    }elseif (strlen($code) == 10) {
        echo "<script>window.location.href = \"$base_url?r=desa&code=" . substr($_POST['code'],0,6) . "#" . $_POST['code'] . "\" </script>";
    
    }else{
        echo "<script>window.location.href = \"$base_url?r=kab#" . $_POST['code'] . "\" </script>";
    }
} else {
    echo "<script>window.location.href = \"$base_url?r=kab\" </script>";
}
