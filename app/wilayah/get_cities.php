<?php
session_start();
include("../../koneksi/index.php");

$provinsiId = $_GET["province_code"];
$cities = array();

if ($provinsiId) {
    $query = "SELECT * FROM indonesia_cities WHERE province_code = $provinsiId ORDER BY name";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $cities[] = array("code" => $row["code"], "name" => $row["name"]);
    }
}

// Return indonesia_cities as JSON
header("Content-Type: application/json");
echo json_encode($cities);

?>