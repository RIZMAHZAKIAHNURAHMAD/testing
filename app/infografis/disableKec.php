<?php
session_start();
include("../../koneksi/index.php");

$code = $_GET['code'];

$update = "UPDATE indonesia_districts
        SET
        stat='Disable'

        WHERE code = '" . $code . "'";

$edit = mysqli_query($conn, $update);

echo "<script>window.location.href = \"$base_url?r=kec&code=" . substr($_GET['code'], 0, 4) . "#" . $_GET['code'] . "\" </script>";
