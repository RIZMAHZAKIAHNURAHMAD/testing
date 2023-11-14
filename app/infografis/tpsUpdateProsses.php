<?php
session_start();
include("../../koneksi/index.php");

$id_tps = $_POST['id_tps'];
$code_desa = $_POST['code_desa'];
$nama_tps = $_POST['nama_tps'];
$id_user = $_POST['id_user'];

$update = "UPDATE indonesia_tps 
        SET
        id_tps='" . $id_tps . "',
        code_desa='" . $code_desa . "',
        nama_tps='" . $nama_tps . "',
        id_user='" . $id_user . "'

        WHERE id_tps = '" . $id_tps . "'";

$edit = mysqli_query($conn, $update);

echo "<script>window.location.href = \"$base_url?r=infografis-tps&code=".$_POST['code_desa']."\" </script>";
