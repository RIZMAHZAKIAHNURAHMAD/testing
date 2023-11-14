<?php
session_start();
include ("../../koneksi/index.php");

$id = $_GET['id_pendukung'];

$update = "UPDATE pendukung3 
        SET
        hapus='True'

        WHERE id = '" . $id . "'";

$edit = mysqli_query($conn, $update);

echo "<script>window.location.href = \"$base_url?r=pendukung\" </script>";
