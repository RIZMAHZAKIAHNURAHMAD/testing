<?php
session_start();
include("../../koneksi/index.php");

$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

$update = "UPDATE users 
        SET
        username='" . $username . "',
        email='" . $email . "',
        password='" . $password . "',
        role='" . $role . "'

        WHERE id = '" . $id . "'";

$edit = mysqli_query($conn, $update);

echo "<script>window.location.href = \"$base_url?r=user\" </script>";
