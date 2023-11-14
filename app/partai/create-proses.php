<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
include("../../koneksi/index.php");

// If upload button is clicked ...
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $partai = $_POST['partai'];
    $akronim = $_POST['akronim'];

    $store = "INSERT INTO partai (`id`, `partai`, `akronim`) VALUES (
        '',
        '" . $partai . "',
        '" . $akronim . "'
    )";
    $add = mysqli_query($conn, $store);
    if ($add) {
        echo "<script>window.location.href = \"" . $base_url . "/index.php?r=partai\" </script>";
    } else {
        echo "Gagal menambahkan data partai";
    }
} else {
    echo "Tidak diizinkan";
}
?>