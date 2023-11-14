<?php
$tampil = "SELECT k.id, k.name, k.stat, (SELECT COUNT(*) FROM pendukung3 as p WHERE p.kecamatan=k.code) as jumlah, koordinator.*, p.*, k.code as code
        FROM `indonesia_districts` as k
        LEFT JOIN koordinator ON koordinator.code = k.code
        LEFT JOIN pendukung3 as p ON p.id = koordinator.id_pendukung
        WHERE k.city_code='" . $_GET['code'] . "'
        ORDER BY k.name ASC";

$db = mysqli_query($conn, $tampil);

$queryKab = "SELECT *
    FROM `indonesia_cities` as kab
    WHERE kab.code='" . $_GET['code'] . "'";
$dbKab = mysqli_query($conn, $queryKab);
$modelKab = mysqli_fetch_array($dbKab);
?>
<div class="container">
    <div class="row">
        <!-- judul -->
        <div class="row">
            <div class="float-start w-auto">
                <h3>List Pendukung Kecamatan</h3>
            </div>
            <div class="float-start w-auto ms-auto" style="z-index: 9;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $base_url; ?>?r=home">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Wilayah</li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="<?= $base_url; ?>?r=infografis">Riau</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="<?= $base_url; ?>?r=infografis-kab&code=<?= $_GET['code']; ?>"><?= $modelKab['name']; ?></a></li>
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
                <a href="<?= $base_url; ?>?r=infografis-kab&code=<?= $_GET['code']; ?>" class="btn mr-2 btn-outline-primary" style="float:left;margin-bottom:1%;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                    Kembali
                </a>
                <table id="example1" class="table table-bordered table-striped col-12 col-lg-12">
                    <tr>
                        <th>no</th>
                        <th>Kecamatan</th>
                        <th>Koordinator</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                        <th></th>
                    </tr>
                    <?php
                    $x = 1;
                    while ($row = mysqli_fetch_array($db)) {
                        $nama = $row['name'];
                    ?>
                        <tr id="<?= $row['code'] ?>">
                            <td><?php echo $x++ ?></td>
                            <td>
                                <?php echo $row['stat'] == 'Disable' ? '<span style="color:#D8D9DA">' . $row['name'] . '</span>' : '<span style="color:black">' . $row['name'] . '</span>' ?>
                            </td>
                            <td>
                                <?php
                                if ($row['stat'] == 'Disable') {
                                    echo "<p class='btn btn-xs btn-warning' style='font-size:10px;'>Disembunyikan</p>";
                                } else {
                                    echo isset($row['nama']) ? $row['nama'] : '<a href="' . $base_url . '?r=wilayah-koor&code=' . $row['code'] . '" class="btn btn-success">+</a>';
                                }
                                ?>
                            </td>
                            <td><?php echo $row['stat'] == 'Disable' ? '' : $row['jumlah'] ?></td>
                            <td>
                                <?php
                                if ($row['stat'] != 'Disable') :
                                ?>
                                    <a href="<?= $base_url; ?>?r=infografis-kec&code=<?php echo $row['code'] ?>"" class=" btn btn-primary" style="display: flex;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-view-stacked mt-1 me-1" viewBox="0 0 16 16">
                                            <path d="M3 0h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3zm0 8h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3z" />
                                        </svg>
                                        <span class="">Lihat</span>
                                    </a>
                                <?php
                                endif;
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($row['stat'] == 'Disable') {
                                ?>
                                    <a href="app/infografis/enableKec.php?code=<?php echo $row['code'] ?>" class="btn btn-primary" onclick="return confirm('Munculkan <?php echo $nama ?>?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                        </svg>
                                    </a>
                                <?php
                                } else {
                                ?>
                                    <a href="app/infografis/disableKec.php?code=<?php echo $row['code'] ?>" class="btn btn-danger" onclick="return confirm('Sembunyikan <?php echo $nama ?>?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </a>
                                <?php
                                }
                                ?>
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