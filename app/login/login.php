<?php
ini_set('session.cookie_lifetime', 60 * 60 * 24 * 7);
ini_set('session.gc_maxlifetime', 60 * 60 * 24 * 7);
session_start();
include '../../koneksi/index.php';

$email = $_POST['email'];
$password = $_POST['password'];

$login = mysqli_query($conn, "select * from users where (email='$email' OR username ='$email') and password='$password'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {

	$data = mysqli_fetch_assoc($login);
	if ($data['role'] == "SuperAdmin") {
		$_SESSION['email'] = $email;
		$_SESSION['role'] = "SuperAdmin";
		$_SESSION['id'] = $data['id'];
		header("location:../../index.php?r=home");
	} else if ($data['role'] == "Caleg") {
		$_SESSION['email'] = $email;
		$_SESSION['role'] = "Caleg";
		$_SESSION['id'] = $data['id'];
		header("location:../../index.php?r=home");
	} else if ($data['role'] == "Relawan") {
		$_SESSION['email'] = $email;
		$_SESSION['role'] = "Relawan";
		$_SESSION['id'] = $data['id'];
		header("location:../../index.php?r=home");
	} else {
		header("location:index.php?pesan=gagal");
	}
} else {
	header("location:index.php?pesan=gagal");
}
