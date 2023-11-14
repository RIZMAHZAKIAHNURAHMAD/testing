<?php
session_start();
include("../../koneksi/index.php");

$code = $_GET['code'];

$update = "UPDATE indonesia_cities 
        SET
        stat='Disable'

        WHERE code = '" . $code . "'";

$edit = mysqli_query($conn, $update);

echo "<script>window.location.href = \"$base_url?r=kab#" . $_GET['code'] . "\" </script>";
