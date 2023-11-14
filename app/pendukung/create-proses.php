<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
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

// If upload button is clicked ...
if (isset($_POST['nik'])) {
    $nik = $_POST['nik'];
    $no_hp = $_POST['no_hp'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $provinsi = "14"; //$_POST['provinsi'];
    $kabupaten = "1401"; //$_POST['kabupaten'];
    $kecamatan = $_POST['kecamatan'];
    $desa = $_POST['desa'];
    $tps = $_POST['tps'];
    $kordinator = ""; //$_POST['kordinator'];
    $hapus = $_POST['hapus'];
    $id_users = $_POST['id_users'];
    $spanduk = ""; //$_POST['spanduk'];
    $alamat = ""; // $_POST['alamat'];
    $agama = ""; // $_POST['agama'];
    $pekerjaan = ""; //$_POST['pekerjaan'];
    $status = ""; //$_POST['status'];
    $caleg_prov = $_POST['caleg_prov'];
    $caleg_kab = $_POST['caleg_kab'];
    $aspirasi = $_POST['aspirasi'];

    if (!empty($_FILES["ktp"]["tmp_name"])) {
        $tempname = $_FILES["ktp"]["tmp_name"];
        $source = $tempname;
        $nameCreate = "code_" . time();
        $nameCreateNumber = rand(1000, 10000);
        $newName = $nameCreate . $nameCreateNumber;
        $finalName = $newName . ".jpeg";
        $folder = "../../images/" . $finalName;
        $compress = compress($source, $folder, 60);
    } else {
        // echo "<h3>  Failed to upload image!</h3>";
        $finalName = "";
    }
    $store = "INSERT INTO pendukung3 (`id`, `nama`, `nik`, `no_hp`, `jenis_kelamin`, `pekerjaan`, `alamat`, `agama`, `status`, `provinsi`, `kabupaten`, `kecamatan`, `desa`, `tps`, `kordinator`, `ktp`, `hapus`, `id_users`, `spanduk`,`created_date`, `caleg_prov`, `caleg_kab`,`aspirasi`) VALUES (
        '',
        '" . $nama . "',
        '" . $nik . "',
        '" . $no_hp . "',
        '" . $jk . "',
        '" . $pekerjaan . "',
        '" . $alamat . "',
        '" . $agama . "',
        '" . $status . "',
        '" . $provinsi . "',
        '" . $kabupaten . "',
        '" . $kecamatan . "',
        '" . $desa . "',
        '" . $tps . "',
        '" . $kordinator . "',
        '" . $finalName . "',
        '" . $hapus . "',
        '" . $id_users . "',
        '" . $spanduk . "',
        '" . date('Y-m-d H:i:s') . "',
        '" . $caleg_prov . "',
        '" . $caleg_kab . "',
        '" . $aspirasi . "'
        )";
    $add = mysqli_query($conn, $store);
    echo "<script>window.location.href = \"" . $base_url . "/index.php?r=pendukung\" </script>";
} else {
    echo "Tidak diizinkan";
}

// echo "'',
//     '" . $nama . "',
//     '" . $nik . "',
//     '" . $no_hp . "',
//     '" . $jk . "',
//     '" . $pekerjaan . "',
//     '',
//     '" . $alamat . "',
//     '" . $agama . "',
//     '" . $filename . "',
//     '" . $status . "'";
