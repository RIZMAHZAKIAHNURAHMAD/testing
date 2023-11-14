<?php
if ($_SESSION['role'] == "SuperAdmin") {
    $tampil = "SELECT *,  indonesia_cities.name as name_kab, indonesia_provinces.name as name_pro, indonesia_districts.name as name_kec, indonesia_villages.name as name_desa, pendukung3.id as id_pendukung
            FROM pendukung3
            JOIN indonesia_cities ON pendukung3.kabupaten=indonesia_cities.code
            JOIN indonesia_provinces ON pendukung3.provinsi=indonesia_provinces.code
            JOIN indonesia_districts ON pendukung3.kecamatan=indonesia_districts.code
            JOIN indonesia_villages ON pendukung3.desa=indonesia_villages.code
            ORDER BY id_pendukung DESC";
} else if ($_SESSION['role'] == "Caleg" || $_SESSION['role'] == "Relawan") {
    $tampil = "SELECT *,  indonesia_cities.name as name_kab, indonesia_provinces.name as name_pro, indonesia_districts.name as name_kec, indonesia_villages.name as name_desa, pendukung3.id as id_pendukung
            FROM pendukung3
            JOIN indonesia_cities ON pendukung3.kabupaten=indonesia_cities.code
            JOIN indonesia_provinces ON pendukung3.provinsi=indonesia_provinces.code
            JOIN indonesia_districts ON pendukung3.kecamatan=indonesia_districts.code
            JOIN indonesia_villages ON pendukung3.desa=indonesia_villages.code 
            WHERE pendukung3.hapus IS NULL OR pendukung3.hapus = 'False'
            ORDER BY id_pendukung DESC";
}

$stmt = mysqli_prepare($conn, $tampil);

// Periksa apakah persiapan statement berhasil
if($stmt) {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    // Gunakan hasil kueri dalam loop
    while ($row = mysqli_fetch_array($result)) {
        // ... (bagian HTML)
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
} else {
    echo "Gagal mempersiapkan statement";
}

?>
<section class="about_area">
    <div class="container">
        <h1 style="text-align: center;">List Partai</h1>
        <div class="row pt-4">
            <div class="col-lg-12">
                <table id="example" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="d-table-cell d-sm-none"></th>
                            <th class="d-none d-sm-table-cell">Partai</th>
                            <th class="d-none d-sm-table-cell">Akronim</th>
                            <th class="d-none d-sm-table-cell">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x = 1;
                        while ($row = mysqli_fetch_array($db)) {
                        ?>
                            <tr>
                                <td class="d-block d-sm-none">
                                    <div class="d-block d-sm-none">
                                        <a href="<?= $base_url; ?>?r=partai-edit&id=<?php echo $row['id'] ?>">
                                            <div class="card">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-3 p-4">
                                                            <!-- <img src="assets/img/fotologo.png" height="100%" width="100%"> -->
                                                            <i class="bi bi-search" style="font-weight: bolder;font-size:30px;"></i>
                                                        </div>
                                                        <div class="col-7 pt-4">
                                                            <b>
                                                                <?php echo $row['partai'] ?>
                                                            </b>
                                                            <p><?php echo $row['akronim'] ?></p>
                                                        </div>
                                                        <div class="col-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <p style="margin-bottom:0px;"><?php echo $x++ ?></p>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <p style="margin-bottom:0px;"><?php echo $row['partai'] ?></p>
                                    <p style="font-size:10px;color:grey;margin-top:0px;"><?php echo $row['created_date'] ?></p>
                                </td>
                                <td class="d-none d-sm-table-cell"><?php echo $row['akronim'] ?></td>
                        

                                <td class="d-none d-sm-table-cell">
                                    <a href="<?= $base_url; ?>?r=detail-partai&id=<?php echo $row['id'] ?>">
                                        <input type="submit" class="btn btn-info col-12" value="Detail">
                                    </a>
                                    <a href="<?= $base_url; ?>?r=partai-edit&id=<?php echo $row['id'] ?>">
                                        <input type="submit" class="btn btn-primary mt-1 col-12" value="Edit">
                                    </a>
                                    <div class="pt-1">
                                    <?php
                                    if ($_SESSION['role'] == "SuperAdmin") {
                                        if ($row['hapus'] == 'False') {
                                    ?>
                                            <a href="<?= $base_url; ?>/app/partai/delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger col-12" onClick="javascript: return confirm('Apakah Anda Yakin Ingin Menghapusnya?')">Delete</a>
                                        <?php
                                        } else if ($row['hapus'] == 'True') {
                                        ?>
                                            <a href="<?= $base_url; ?>/app/partai/hapus.php?id=<?php echo $row['id'] ?>" class="btn btn-success col-12" onClick="javascript: return confirm('Apakah Anda Yakin Ingin Memulihkannya?')">Pulihkan</a>
                                        <?php
                                        }
                                    } else if ($_SESSION['role'] == "Caleg") {
                                        if ($row['hapus'] == 'False') {
                                        ?>
                                            <a href="<?= $base_url; ?>/app/partai/delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger col-12" onClick="javascript: return confirm('Apakah Anda Yakin Ingin Menghapusnya?')">Delete</a>
                                        <?php
                                        }
                                    } else if ($_SESSION['role'] == "Relawan") {
                                        if ($row['hapus'] == 'False') {
                                        ?>
                                            <a href="<?= $base_url; ?>/app/partai/delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger col-12" onClick="javascript: return confirm('Apakah Anda Yakin Ingin Menghapusnya?')">Delete</a>
                                    <?php
                                        }
                                    }
                                    ?>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>