<?php
if ($_SESSION['role'] == "SuperAdmin") {
    $tampil = "SELECT *,  indonesia_cities.name as name_kab, indonesia_provinces.name as name_pro, indonesia_districts.name as name_kec, indonesia_villages.name as name_desa, pendukung3.id as id_pendukung
            FROM pendukung3
            JOIN indonesia_cities ON pendukung3.kabupaten=indonesia_cities.code
            JOIN indonesia_provinces ON pendukung3.provinsi=indonesia_provinces.code
            JOIN indonesia_districts ON pendukung3.kecamatan=indonesia_districts.code
            JOIN indonesia_villages ON pendukung3.desa=indonesia_villages.code
            ORDER BY id_pendukung DESC";
} else if ($_SESSION['role'] == "Caleg") {
    $tampil = "SELECT *,  indonesia_cities.name as name_kab, indonesia_provinces.name as name_pro, indonesia_districts.name as name_kec, indonesia_villages.name as name_desa, pendukung3.id as id_pendukung
            FROM pendukung3
            JOIN indonesia_cities ON pendukung3.kabupaten=indonesia_cities.code
            JOIN indonesia_provinces ON pendukung3.provinsi=indonesia_provinces.code
            JOIN indonesia_districts ON pendukung3.kecamatan=indonesia_districts.code
            JOIN indonesia_villages ON pendukung3.desa=indonesia_villages.code 
            WHERE pendukung3.hapus IS NULL OR pendukung3.hapus = 'False'
            ORDER BY id_pendukung DESC";
} else if ($_SESSION['role'] == "Relawan") {
    $tampil = "SELECT *,  indonesia_cities.name as name_kab, indonesia_provinces.name as name_pro, indonesia_districts.name as name_kec, indonesia_villages.name as name_desa, pendukung3.id as id_pendukung
            FROM pendukung3
            JOIN indonesia_cities ON pendukung3.kabupaten=indonesia_cities.code
            JOIN indonesia_provinces ON pendukung3.provinsi=indonesia_provinces.code
            JOIN indonesia_districts ON pendukung3.kecamatan=indonesia_districts.code
            JOIN indonesia_villages ON pendukung3.desa=indonesia_villages.code 
            WHERE pendukung3.hapus IS NULL OR pendukung3.hapus = 'False'
            ORDER BY id_pendukung DESC";
}
$db = mysqli_query($conn, $tampil);
?>
<section class="about_area">
    <div class="container">
        <h1 style="text-align: center;">List Relawan</h1>
        <div class="row pt-4">
            <div class="col-lg-12">
                <table id="example" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="d-table-cell d-sm-none"></th>
                            <th class="d-none d-sm-table-cell">No</th>
                            <th class="d-none d-sm-table-cell">Nama</th>
                            <th class="d-none d-sm-table-cell">NIK</th>
                            <th class="d-none d-sm-table-cell d-md-table-cell d-lg-table-cell d-xl-table-cell d-xxl-table-cell">No HP</th>
                            <th class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell d-xxl-table-cell">Jenis Kelamin</th>
                            <th class="d-none d-lg-table-cell d-xl-table-cell d-xxl-table-cell">Provinsi</th>
                            <th class="d-none d-xl-table-cell d-xxl-table-cell">Kabupaten</th>
                            <th class="d-none d-xxl-table-cell">Kecamatan</th>
                            <th class="d-none d-xxl-table-cell">Desa</th>
                            <th class="d-none d-xxl-table-cell">Kordinator</th>
                            <th class="d-none d-xxl-table-cell">Spanduk</th>
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
                                        <a href="<?= $base_url; ?>?r=pendukung-edit&id_pendukung=<?php echo $row['id_pendukung'] ?>">
                                            <div class="card">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-3 p-4">
                                                            <!-- <img src="assets/img/fotologo.png" height="100%" width="100%"> -->
                                                            <i class="bi bi-search" style="font-weight: bolder;font-size:30px;"></i>
                                                        </div>
                                                        <div class="col-7 pt-4">
                                                            <b>
                                                                <?php echo $row['nama'] ?>
                                                            </b>
                                                            <p><?php echo $row['nik'] ?></p>
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
                                    <p style="margin-bottom:0px;"><?php echo $row['nama'] ?></p>
                                    <p style="font-size:10px;color:grey;margin-top:0px;"><?php echo $row['created_date'] ?></p>
                                </td>
                                <td class="d-none d-sm-table-cell"><?php echo $row['nik'] ?></td>
                                <td class="d-none d-sm-table-cell d-md-table-cell d-lg-table-cell d-xl-table-cell d-xxl-table-cell"><?php echo $row['no_hp'] ?></td>
                                <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell d-xxl-table-cell"><?php echo $row['jenis_kelamin'] ?></td>
                                <td class="d-none d-lg-table-cell d-xl-table-cell d-xxl-table-cell"><?php echo $row['name_pro'] ?></td>
                                <td class="d-none d-xl-table-cell d-xxl-table-cell"><?php echo $row['name_kab'] ?></td>
                                <td class="d-none d-xxl-table-cell"><?php echo $row['name_kec'] ?></td>
                                <td class="d-none d-xxl-table-cell"><?php echo $row['name_desa'] ?></td>
                                <td class="d-none d-xxl-table-cell"><?php echo $row['kordinator'] ?></td>
                                <?php
                                if ($row['spanduk'] == "Aktif") {
                                ?>
                                    <td class="d-none d-xxl-table-cell text-center">
                                        <a href="<?= $base_url; ?>/app/pendukung/spandukOff.php?id_pendukung=<?php echo $row['id_pendukung'] ?>" class="btn btn-success"><?php echo $row['spanduk'] ?></a>
                                    </td>
                                <?php
                                } else {
                                ?>
                                    <td class="text-center d-none d-xxl-table-cell">
                                        <a href="<?= $base_url; ?>/app/pendukung/spandukOn.php?id_pendukung=<?php echo $row['id_pendukung'] ?>" class="btn btn-danger"><?php echo $row['spanduk'] ?></a>
                                    </td>
                                <?php
                                }
                                ?>
                                <td class="d-none d-sm-table-cell">
                                    <a href="<?= $base_url; ?>?r=detail-pendukung&id_pendukung=<?php echo $row['id_pendukung'] ?>">
                                        <input type="submit" class="btn btn-info col-12" value="Detail">
                                    </a>
                                    <a href="<?= $base_url; ?>?r=pendukung-edit&id_pendukung=<?php echo $row['id_pendukung'] ?>">
                                        <input type="submit" class="btn btn-primary mt-1 col-12" value="Edit">
                                    </a>
                                    <div class="pt-1">
                                    <?php
                                    if ($_SESSION['role'] == "SuperAdmin") {
                                        if ($row['hapus'] == 'False') {
                                    ?>
                                            <a href="<?= $base_url; ?>/app/pendukung/delete.php?id_pendukung=<?php echo $row['id_pendukung'] ?>" class="btn btn-danger col-12" onClick="javascript: return confirm('Apakah Anda Yakin Ingin Menghapusnya?')">Delete</a>
                                        <?php
                                        } else if ($row['hapus'] == 'True') {
                                        ?>
                                            <a href="<?= $base_url; ?>/app/pendukung/hapus.php?id_pendukung=<?php echo $row['id_pendukung'] ?>" class="btn btn-success col-12" onClick="javascript: return confirm('Apakah Anda Yakin Ingin Memulihkannya?')">Pulihkan</a>
                                        <?php
                                        }
                                    } else if ($_SESSION['role'] == "Caleg") {
                                        if ($row['hapus'] == 'False') {
                                        ?>
                                            <a href="<?= $base_url; ?>/app/pendukung/delete.php?id_pendukung=<?php echo $row['id_pendukung'] ?>" class="btn btn-danger col-12" onClick="javascript: return confirm('Apakah Anda Yakin Ingin Menghapusnya?')">Delete</a>
                                        <?php
                                        }
                                    } else if ($_SESSION['role'] == "Relawan") {
                                        if ($row['hapus'] == 'False') {
                                        ?>
                                            <a href="<?= $base_url; ?>/app/pendukung/delete.php?id_pendukung=<?php echo $row['id_pendukung'] ?>" class="btn btn-danger col-12" onClick="javascript: return confirm('Apakah Anda Yakin Ingin Menghapusnya?')">Delete</a>
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