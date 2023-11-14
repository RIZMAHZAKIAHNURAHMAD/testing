<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
include("../../koneksi/index.php");

// If upload button is clicked ...
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (isset($_POST['role'])) {
        $role = $_POST['role'];
    } else {
        $role = "Relawan";
    }
    // $hapus = $_POST['hapus'];
    $hapus = 'False';;

    $store = "INSERT INTO users (`id`, `username`, `email`, `password`, `role`, `hapus`, created_date)  VALUES (
        '',
        '" . $username . "',
        '" . $email . "',
        '" . $password . "',
        '" . $role . "',
        '" . $hapus . "',
        '" . date('Y-m-d H:i:s') . "'
        )";
    $add = mysqli_query($conn, $store);
}
echo "<script>window.location.href = \"$base_url?r=user\" </script>";
