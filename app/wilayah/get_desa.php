<?php
session_start();
include("../../koneksi/index.php");

$kecamatanCode = $_GET["district_code"];
$villages = array();

if ($kecamatanCode) {
    $query = "SELECT * FROM indonesia_villages WHERE district_code = $kecamatanCode ORDER BY name";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $villages[] = array("code" => $row["code"], "name" => $row["name"]);
    }
}

// Return indonesia_villages as JSON
header("Content-Type: application/json");
echo json_encode($villages);
