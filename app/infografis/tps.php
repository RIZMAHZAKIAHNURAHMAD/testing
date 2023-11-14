<?php
$tampil = "SELECT *, (SELECT COUNT(*) FROM pendukung3 as p WHERE p.tps=k.id_tps) as jumlah
            FROM indonesia_tps as k
            LEFT JOIN koordinator ON koordinator.code = k.id_tps
            LEFT JOIN pendukung3 as p ON p.id = koordinator.id_pendukung
            WHERE k.code_desa = '" . $_GET['code'] . "'
            AND (k.hapus LIKE 'True' OR k.hapus IS NULL)
            ORDER BY k.created_at ASC";
$db = mysqli_query($conn, $tampil);

$queryKab = "SELECT *
    FROM `indonesia_cities` as kab
    WHERE kab.code='" . substr($_GET['code'], 0, 4) . "'";
$dbKab = mysqli_query($conn, $queryKab);
$modelKab = mysqli_fetch_array($dbKab);

$queryKec = "SELECT *
    FROM `indonesia_districts` as kec
    WHERE kec.code='" . substr($_GET['code'], 0, 6) . "'";
$dbKec = mysqli_query($conn, $queryKec);
$modelKec = mysqli_fetch_array($dbKec);

$queryDesa = "SELECT *
    FROM `indonesia_villages` as desa
    WHERE desa.code='" . substr($_GET['code'], 0, 11) . "'";
$dbDesa = mysqli_query($conn, $queryDesa);
$modelDesa = mysqli_fetch_array($dbDesa);
// print_r($modelDesa);
?>
<div class="container con2">
    <div class="row">
        <!-- judul -->
        <div class="row">
            <div class="float-start w-auto">
                <h3>Kelola TPS</h3>
            </div>
            <div class="float-start w-auto ms-auto" style="z-index: 9;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $base_url; ?>?r=home">Home</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page"><a href='#'>Wilayah</a></li> -->
                        <!-- <li class="breadcrumb-item active" aria-current="page"><a href="<?= $base_url; ?>?r=infografis">Riau</a></li> -->
                        <!-- <li class="breadcrumb-item active" aria-current="page"><a href="<?= $base_url; ?>?r=infografis-kab&code=<?= substr($_GET['code'], 0, 4); ?>"><?= $modelKab['name']; ?></a></li> -->
                        <li class="breadcrumb-item active" aria-current="page"><a href="<?= $base_url; ?>?r=infografis-kec&code=<?= substr($_GET['code'], 0, 6); ?>"><?= $modelKec['name']; ?></a></li>
                        <li class="breadcrumb-item bc-active" aria-current="page"><a href="<?= $base_url; ?>?r=infografis-tps&code=<?= substr($_GET['code'], 0, 11); ?>"><?= $modelDesa['name']; ?></a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end judul -->

        <div class="table-responsive">
            <div class="col-12 pb-2 d-flex flex-row-reverse">
                <!-- <h3>
                    <button class="btn btn-success float-end" onclick="history.back()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                        </svg>
                    </button>
                </h3> -->
                <a href="<?= $base_url; ?>?r=tps-tambah&code=<?= $_GET['code']; ?>" class="btn btn-primary">
                    Tambah TPS
                </a>
            </div>
            <table id="example1" class="table table-bordered table-striped col-12 col-lg-12">
                <tr>
                    <th>No</th>
                    <th>Nama TPS</th>
                    <!-- <th>Koordinator</th> -->
                    <th>Relawan</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $x = 1;
                while ($row = mysqli_fetch_array($db)) {
                    // print_r($row);
                    // exit;
                ?>
                    <tr>
                        <td><?php echo $x++ ?></td>
                        <td><?php echo $row['nama_tps'] ?></td>
                        <!-- <td>
                            <?php
                            // if ($row['stat'] == 'Disable') {
                            //     echo "<p class='btn btn-xs btn-warning' style='font-size:10px;'>Disembunyikan</p>";
                            // } else {
                            echo isset($row['nama']) ? $row['nama'] : '<a href="' . $base_url . '?r=wilayah-koor&code=' . $row['id_tps'] . '&code2=' . $_GET['code'] . '" class="btn btn-success">+</a>';
                            // }
                            ?>
                        </td> -->
                        <td><?php echo $row['jumlah'] ?></td>
                        <td>
                            <a href="<?= $base_url; ?>?r=tps-detail&code=<?php echo $row['id_tps'] ?>" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-view-stacked me-1" viewBox="0 0 16 16">
                                    <path d="M3 0h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3zm0 8h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3z" />
                                </svg>
                                Lihat
                            </a>
                            <a href="<?php $base_url ?>?r=tps-update&id_tps=<?php echo $row['id_tps'] ?>" class="btn btn-primary">Update</a>
                            <?php
                            if ($row['hapus'] == 'False') {
                            ?>
                                <a href="app/infografis/tpsPulihkan.php?id_tps=<?php echo $row['id_tps'] ?>&code=<?= $_GET['code']; ?>" class="btn btn-success" onclick="return confirm('Yakin ingin pulihkan data <?php echo $row['nama_tps'] ?> ?')">Pulihkan</a>
                            <?php
                            } else {
                            ?>
                                <a href="app/infografis/tpsDelete.php?id_tps=<?php echo $row['id_tps'] ?>&code=<?= $_GET['code']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus data <?php echo $row['nama_tps'] ?> ?')">Delete</a>
                            <?php
                            }
                            ?>
                            <!-- <a href="" class="btn btn-info">Detail</a> -->
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>