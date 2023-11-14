<?php
session_start();
include("../../koneksi/index.php");

$id_tps = $_GET['id_tps'];

$update = "UPDATE indonesia_tps 
        SET
        hapus='True'

        WHERE id_tps = '" . $id_tps . "'";

$edit = mysqli_query($conn, $update);

echo "<script>window.location.href = \"$base_url?r=infografis-tps&code=" . $_GET['code'] . "\" </script>";
