<?php
session_start();
include("../../koneksi/index.php");

function compress($source_url, $destination_url, $quality)
{
    $info = getimagesize($source_url);

    if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
    elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
    elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
    elseif ($info['mime'] == 'image/jpg') $image = imagecreatefromjpeg($source_url);

    imagejpeg($image, $destination_url, $quality);

    return $destination_url;
}

$tempname = $_FILES["gambar"]["tmp_name"];
$source = $tempname;
$nameCreate = "code_".time();
$nameCreateNumber = rand(1000, 10000) ;
$newName = $nameCreate.$nameCreateNumber ;
$finalName = $newName.".jpeg" ;
$folder = "../../images/". $finalName;
$compress = compress($source, $folder, 60);
// $filename = $_FILES["gambar"]["name"];
// $tempname = $_FILES["gambar"]["tmp_name"];

$id = $_POST['id_pendukung'];
$nik = $_POST['nik'];
$no_hp = $_POST['no_hp'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$provinsi = $_POST['provinsi'];
$kabupaten = $_POST['kabupaten'];
$kecamatan = $_POST['kecamatan'];
$desa = $_POST['desa'];
$kordinator = $_POST['kordinator'];
$alamat = ""; // $_POST['alamat'];
$agama = ""; // $_POST['agama'];
$pekerjaan = ""; //$_POST['pekerjaan'];
$status = ""; //$_POST['status'];


// $d = compress($source_img, $destination_img, 90);
// Now let's move the uploaded image into the folder: image
if (compress($source, $folder, 60)) {

    $update = "UPDATE pendukung3 
        SET
        nama='" . $nama . "',
        nik='" . $nik . "',
        no_hp='" . $no_hp . "',
        jenis_kelamin='" . $jk . "',
        pekerjaan='" . $pekerjaan . "',
        aspirasi='',
        alamat='" . $alamat . "',
        agama='" . $agama . "',
        status='" . $status . "',
        provinsi='" . $provinsi . "',
        kabupaten='" . $kabupaten . "',
        kecamatan='" . $kecamatan . "',
        desa='" . $desa . "',
        kordinator='" . $kordinator . "',
        ktp='" . $finalName . "',
        created_date='" . date('Y-m-d H:i:s') . "'

        WHERE id = '" . $id . "'";

    $edit = mysqli_query($conn, $update);
} else {
    $update = "UPDATE pendukung3 
        SET
        nama='" . $nama . "',
        nik='" . $nik . "',
        no_hp='" . $no_hp . "',
        jenis_kelamin='" . $jk . "',
        pekerjaan='" . $pekerjaan . "',
        aspirasi='',
        alamat='" . $alamat . "',
        agama='" . $agama . "',
        status='" . $status . "',
        provinsi='" . $provinsi . "',
        kabupaten='" . $kabupaten . "',
        kecamatan='" . $kecamatan . "',
        desa='" . $desa . "',
        kordinator='" . $kordinator . "',
        created_date='" . date('Y-m-d H:i:s') . "'

        WHERE id = '" . $id . "'";

    $edit = mysqli_query($conn, $update);
}

echo "<script>window.location.href = \"".$base_url."/index.php?r=pendukung\" </script>";
