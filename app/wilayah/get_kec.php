<?php
session_start();
include("../../koneksi/index.php");

$kabupatenId = $_GET["city_code"];
$id_dapil = $_GET["id_dapil"];
$districts = array();

if ($kabupatenId) {
    $query = "SELECT * 
    FROM indonesia_districts 
    LEFT JOIN dapil_kec ON dapil_kec.kec_code = indonesia_districts.code
    WHERE indonesia_districts.city_code = $kabupatenId  AND dapil_kec.id_dapil = $id_dapil
    ORDER BY name";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $districts[] = array("code" => $row["code"], "name" => $row["name"]);
    }
}

// Return indonesia_districts as JSON
header("Content-Type: application/json");
echo json_encode($districts);
