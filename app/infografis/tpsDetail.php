<?php
$pendukung = "SELECT *,  indonesia_cities.name as name_kab, indonesia_provinces.name as name_pro, indonesia_districts.name as name_kec, indonesia_villages.name as name_desa, pendukung3.id as id_pendukung
FROM pendukung3
LEFT JOIN indonesia_cities ON pendukung3.kabupaten=indonesia_cities.code
LEFT JOIN indonesia_provinces ON pendukung3.provinsi=indonesia_provinces.code
LEFT JOIN indonesia_districts ON pendukung3.kecamatan=indonesia_districts.code
LEFT JOIN indonesia_villages ON pendukung3.desa=indonesia_villages.code 
WHERE (pendukung3.hapus IS NULL OR pendukung3.hapus = 'False')
AND pendukung3.tps = '" . $_GET['code'] . "'
ORDER BY id_pendukung DESC";

$dbPendukung = mysqli_query($conn, $pendukung);
$dbPendukung2 = mysqli_query($conn, $pendukung);
$modelPendukung = mysqli_fetch_array($dbPendukung2);
// print_r($modelPendukung);
// exit;

if (isset($modelPendukung)) :


    $queryKab = "SELECT *
    FROM `indonesia_cities` as kab
    WHERE kab.code='" . substr($modelPendukung['kabupaten'], 0, 4) . "'";
    $dbKab = mysqli_query($conn, $queryKab);
    $modelKab = mysqli_fetch_array($dbKab);

    $queryKec = "SELECT *
    FROM `indonesia_districts` as kec
    WHERE kec.code='" . substr($modelPendukung['kecamatan'], 0, 6) . "'";
    $dbKec = mysqli_query($conn, $queryKec);
    $modelKec = mysqli_fetch_array($dbKec);

    $queryDesa = "SELECT *
    FROM `indonesia_villages` as desa
    WHERE desa.code='" . substr($modelPendukung['desa'], 0, 11) . "'";
    $dbDesa = mysqli_query($conn, $queryDesa);
    $modelDesa = mysqli_fetch_array($dbDesa);

    $queryTps = "SELECT *
    FROM `indonesia_tps` as tps
    WHERE tps.id_tps='" . substr($_GET['code'], 0, 10) . "'";
    $dbTps = mysqli_query($conn, $queryTps);
    $modelTps = mysqli_fetch_array($dbTps);
?>
    <div class="container con2">
        <div class="row">
            <!-- judul -->
            <div class="row">
                <div class="float-start w-auto">
                    <h3>Detail TPS - Relawan</h3>
                </div>
                <div class="float-start w-auto ms-auto" style="z-index: 9;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= $base_url; ?>?r=home">Home</a></li>
                            <!-- <li class="breadcrumb-item active" aria-current="page"><a href='#'>Wilayah</a></li> -->
                            <!-- <li class="breadcrumb-item active" aria-current="page"><a href="<?= $base_url; ?>?r=infografis">Riau</a></li> -->
                            <!-- <li class="breadcrumb-item active" aria-current="page"><a href="<?= $base_url; ?>?r=infografis-kab&code=<?= substr($modelPendukung['kabupaten'], 0, 4); ?>"><?= $modelKab['name']; ?></a></li> -->
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?= $base_url; ?>?r=infografis-kec&code=<?= substr($modelPendukung['kecamatan'], 0, 6); ?>"><?= $modelKec['name']; ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?= $base_url; ?>?r=infografis-tps&code=<?= substr($modelPendukung['desa'], 0, 11); ?>"><?= $modelDesa['name']; ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="<?= $base_url; ?>?r=infografis-tps&code=<?= substr($modelPendukung['desa'], 0, 11); ?>"><?= $modelTps['nama_tps']; ?></a>
                            </li>
                            <li class="breadcrumb-item bc-active" aria-current="page">
                                <a href="<?= $base_url; ?>?r=infografis-tps&code=<?= substr($modelPendukung['desa'], 0, 11); ?>">Relawan</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end judul -->
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped col-12 col-lg-12">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>No HP</th>
                        <th>Jenis Kelamin</th>
                        <th>Kabupaten</th>
                        <th>Kecamatan</th>
                        <th>Desa</th>
                        <th>KTP</th>
                    </tr>
                    <?php
                    $x = 1;
                    while ($row = mysqli_fetch_array($dbPendukung)) {
                    ?>
                        <tr>
                            <td><?php echo $x++ ?></td>
                            <td><?php echo $row['nama'] ?></td>
                            <td><?php echo $row['nik'] ?></td>
                            <td><?php echo $row['no_hp'] ?></td>
                            <td><?php echo $row['jenis_kelamin'] ?></td>
                            <td><?php echo $row['name_kab'] ?></td>
                            <td><?php echo $row['name_kec'] ?></td>
                            <td><?php echo $row['name_desa'] ?></td>
                            <td><?php echo "<img src='../images/$row[ktp]' width='90' height='70' alt='KTP' />"; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

<?php
else :
    $queryKab = "SELECT *
    FROM `indonesia_tps` as tps
    WHERE id_tps='" . $_GET['code'] . "'";
    $dbKab = mysqli_query($conn, $queryKab);
    $modelPendukung = mysqli_fetch_array($dbKab);
    
    $queryKab = "SELECT *
    FROM `indonesia_cities` as kab
    WHERE kab.code='" . substr($modelPendukung['code_desa'], 0, 4) . "'";
    $dbKab = mysqli_query($conn, $queryKab);
    $modelKab = mysqli_fetch_array($dbKab);
// print_r($modelKab);
//     exit;

    $queryKec = "SELECT *
    FROM `indonesia_districts` as kec
    WHERE kec.code='" . substr($modelPendukung['code_desa'], 0, 6) . "'";
    $dbKec = mysqli_query($conn, $queryKec);
    $modelKec = mysqli_fetch_array($dbKec);

    $queryDesa = "SELECT *
    FROM `indonesia_villages` as desa
    WHERE desa.code='" . substr($modelPendukung['code_desa'], 0, 11) . "'";
    $dbDesa = mysqli_query($conn, $queryDesa);
    $modelDesa = mysqli_fetch_array($dbDesa);

    $queryTps = "SELECT *
    FROM `indonesia_tps` as tps
    WHERE tps.id_tps='" . substr($_GET['code'], 0, 10) . "'";
    $dbTps = mysqli_query($conn, $queryTps);
    $modelTps = $modelPendukung;
?>
    <div class="container con2">
        <div class="row">
            <!-- judul -->
            <div class="row">
                <div class="float-start w-auto">
                    <h3>Detail TPS - Relawan</h3>
                </div>
                <div class="float-start w-auto ms-auto" style="z-index: 9;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= $base_url; ?>?r=home">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href='#'>Wilayah</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?= $base_url; ?>?r=infografis">Riau</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?= $base_url; ?>?r=infografis-kab&code=<?= substr($modelPendukung['code_desa'], 0, 4); ?>"><?= $modelKab['name']; ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?= $base_url; ?>?r=infografis-kec&code=<?= substr($modelPendukung['code_desa'], 0, 6); ?>"><?= $modelKec['name']; ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?= $base_url; ?>?r=infografis-tps&code=<?= substr($modelPendukung['code_desa'], 0, 11); ?>"><?= $modelDesa['name']; ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="<?= $base_url; ?>?r=infografis-tps&code=<?= substr($modelPendukung['code_desa'], 0, 11); ?>"><?= $modelTps['nama_tps']; ?></a>
                            </li>
                            <li class="breadcrumb-item bc-active" aria-current="page">
                                <a href="<?= $base_url; ?>?r=infografis-tps&code=<?= substr($modelPendukung['code_desa'], 0, 11); ?>">Relawan</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end judul -->
            <div class="table-responsive text-center">
            <img src="https://i.pinimg.com/564x/cc/89/95/cc8995093a664839d22b5c4bef40424b.jpg" alt="kosong" width="30%">
                <h4>Belum Ada Data</h4>
                <p>Silahkan input data terlebih dahulu</p>
                <div class="breadcrumb-item bc-active mb-2">
                    <a href="<?= $base_url ?>?r=tambah-pendukung" class="fs-5 p-2 mb-2">Tambah Data</a>
                </div>
            </div>
        </div>
    </div>
<?php
endif;
?>