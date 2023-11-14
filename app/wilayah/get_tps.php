<?php
session_start();
include("../../koneksi/index.php");

$kecamatanCode = $_GET["district_code"];
$villages = array();

if ($kecamatanCode) {
    $query = "SELECT * FROM indonesia_tps WHERE (hapus LIKE 'True' OR hapus IS NULL) AND code_desa = $kecamatanCode  ORDER BY nama_tps";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $villages[] = array("code" => $row["id_tps"], "name" => $row["nama_tps"]);
    }
}

// Return indonesia_villages as JSON
header("Content-Type: application/json");
echo json_encode($villages);
