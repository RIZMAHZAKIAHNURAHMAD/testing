<?php
$tampil = "SELECT k.id, k.code, k.name, (SELECT COUNT(*) FROM pendukung3 as p WHERE p.desa=k.code) as jumlah,k.*, p.*, k.code as code
        FROM `indonesia_villages` as k
        LEFT JOIN koordinator ON koordinator.code = k.code
        LEFT JOIN pendukung3 as p ON p.id = koordinator.id_pendukung
        WHERE k.district_code='" . $_GET['code'] . "'
        ORDER BY k.name ASC";

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
// print_r($modelKec);
?>
<div class="container con2">
    <div class="row">
        <!-- judul -->
        <div class="row">
            <div class="float-start w-auto">
                <h3>List Pendukung Desa</h3>
            </div>
            <div class="float-start w-auto ms-auto" style="z-index: 9;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $base_url; ?>?r=home">Home</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page"><a href='#'>Wilayah</a></li> -->
                        <!-- <li class="breadcrumb-item active" aria-current="page"><a href="<?= $base_url; ?>?r=infografis">Riau</a></li> -->
                        <li class="breadcrumb-item active" aria-current="page"><a href="<?= $base_url; ?>?r=infografis-kab&code=<?= substr($_GET['code'], 0, 4); ?>"><?= $modelKab['name']; ?></a></li>
                        <li class="breadcrumb-item bc-active" aria-current="page">
                            <a href="<?= $base_url; ?>?r=infografis-kec&code=<?= $_GET['code']; ?>">
                                <?= $modelKec['name']; ?>
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end judul -->

        <div class="col-md-5">
            <canvas id="myChart" height="250px"></canvas>
        </div>
        <div class="col-md-7">
            <div class="table-responsive">
                <h3>
                    <a href="<?= $base_url; ?>?r=desa&code=<?= $_GET['code']; ?>" class="btn mr-2 btn-outline-primary" style="float:right;margin-bottom:1%;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                        </svg>
                    </a>
                </h3>
                <table id="example1" class="table table-bordered table-striped col-12 col-lg-12">
                    <tr>
                        <th>No</th>
                        <th>Kelurahan/Desa</th>
                        <!-- <th>Koordinator</th> -->
                        <th>TPS</th>
                        <th>Relawan</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $x = 1;
                    while ($row = mysqli_fetch_array($db)) {
                        $queryTps = "SELECT COUNT(*) as jumlah
                        FROM indonesia_tps
                        WHERE code_desa LIKE '" . $row['code'] . "%'
                        AND (hapus LIKE 'True' OR hapus IS NULL)
                        ";
                        $dbTps = mysqli_query($conn, $queryTps);
                        $modelTps = mysqli_fetch_array($dbTps);
                    ?>
                        <tr>
                            <td><?php echo $x++ ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <!-- <td>
                                <?php
                                if ($row['stat'] == 'Disable') {
                                    echo "<p class='btn btn-xs btn-warning' style='font-size:10px;'>Disembunyikan</p>";
                                } else {
                                    echo isset($row['nama']) ? $row['nama'] : '-';
                                }
                                ?>
                            </td> -->
                            <td><?php echo $modelTps['jumlah'] ?></td>
                            <td><?php echo $row['jumlah'] ?></td>
                            <td>
                                <a href="<?= $base_url; ?>?r=infografis-tps&code=<?php echo $row['code'] ?>" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-view-stacked me-1" viewBox="0 0 16 16">
                                        <path d="M3 0h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3zm0 8h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3z" />
                                    </svg>
                                    Lihat
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
$labels = [];
$values = [];

foreach ($db as $row) {
    $labels[] = $row['name'];
    $values[] = $row['jumlah'];
}
?>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Grafik Pendukung',
                data: <?php echo json_encode($values); ?>,
                borderWidth: 1
            }]

        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>