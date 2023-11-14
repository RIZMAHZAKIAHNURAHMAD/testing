<?php
session_start();
include("../../koneksi/index.php");

// Pastikan parameter id ada dan bukan null
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Gunakan parameterized query untuk mencegah SQL injection
    $update = "UPDATE partai 
                SET
                hapus='False'
                WHERE id = ?";

    $stmt = mysqli_prepare($conn, $update);

    // Periksa apakah persiapan statement berhasil
    if($stmt) {
        // Bind parameter id ke statement
        mysqli_stmt_bind_param($stmt, "s", $id);

        // Eksekusi statement
        $edit = mysqli_stmt_execute($stmt);

        // Periksa apakah query berhasil dijalankan
        if($edit) {
            echo "<script>window.location.href = \"$base_url?r=partai\" </script>";
        } else {
            echo "Gagal menjalankan query";
        }

        // Tutup statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Gagal mempersiapkan statement";
    }
} else {
    echo "Parameter id tidak valid";
}
?>