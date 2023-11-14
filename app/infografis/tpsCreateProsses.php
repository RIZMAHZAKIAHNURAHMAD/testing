<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
include("../../koneksi/index.php");

// If upload button is clicked ...
if (isset($_POST['nama_tps'])) {
    $code = $_POST['code'];
    $nama_tps = $_POST['nama_tps'];
    $id_user = $_POST['id_user'];

    $store = "INSERT INTO indonesia_tps (`id_tps`, `code_desa`, `nama_tps`, `created_at`, `id_user`) VALUES (
        '',
        '" . $code . "',
        '" . $nama_tps . "',
        '" . date('Y-m-d H:i:s') . "',
        '".$id_user."'
        )";

    // echo $store;
    $add = mysqli_query($conn, $store);
}
echo "<script>window.location.href = \"$base_url?r=infografis-tps&code=".$_POST['code']."\" </script>";
?>