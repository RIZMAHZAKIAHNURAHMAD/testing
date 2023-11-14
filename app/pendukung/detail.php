<?php
$tampil = "SELECT * ,  
indonesia_cities.name as name_kab, indonesia_cities.code as code_kab, 
indonesia_provinces.name as name_pro, indonesia_provinces.code as code_pro,
indonesia_districts.name as name_kec, indonesia_districts.code as code_kec,
indonesia_villages.name as name_desa, indonesia_villages.code as code_desa,
pendukung3.id as id_pendukung 
FROM pendukung3 
JOIN indonesia_cities ON pendukung3.kabupaten=indonesia_cities.code
JOIN indonesia_provinces ON pendukung3.provinsi=indonesia_provinces.code
JOIN indonesia_districts ON pendukung3.kecamatan=indonesia_districts.code
JOIN indonesia_villages ON pendukung3.desa=indonesia_villages.code
WHERE pendukung3.id = '" . $_GET['id_pendukung'] . "'";

$q_buat = mysqli_query($conn, $tampil);
while ($row = mysqli_fetch_array($q_buat)) {
    $id_pendukung = $row['id_pendukung'];
    $name_pro = $row['name_pro'];
    $code_pro = $row['code_pro'];
    $name_kab = $row['name_kab'];
    $code_kab = $row['code_kab'];
    $name_kec = $row['name_kec'];
    $code_kec = $row['code_kec'];
    $name_desa = $row['name_desa'];
    $code_desa = $row['code_desa'];
    $nama = $row['nama'];
    $nik = $row['nik'];
    $no_hp = $row['no_hp'];
    $jenis_kelamin = $row['jenis_kelamin'];
    $provinsi = $row['provinsi'];
    $kabupaten = $row['kabupaten'];
    $kecamatan = $row['kecamatan'];
    $desa = $row['desa'];
    $kordinator = $row['kordinator'];
    $ktp = $row['ktp'];
    $spanduk = $row['spanduk'];
}

?>
<div class="container">
    <div class="row">
        <h3>
            Detail Pendukung
            <button class="btn btn-success float-end" onclick="history.back()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg>
            </button>
        </h3>
        <div class="card mb-3">
            <img src="images/<?php echo $ktp ?>" width="50%" height="50%" class="card-img-top" alt="ktp">
            <div class="card-body">
                <h5 class="card-title">Detail</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-3">
                                Nama
                            </div>
                            <div class="text-left col-9">
                                : <?php echo $nama ?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-3">
                                Nik
                            </div>
                            <div class="text-left col-9">
                                : <?php echo $nik ?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-3">
                                No Hp
                            </div>
                            <div class="text-left col-9">
                                : <?php echo $no_hp ?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-3">
                                Jenis Kelamin
                            </div>
                            <div class="text-left col-9">
                                : <?php echo $jenis_kelamin ?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-3">
                                Alamat
                            </div>
                            <div class="text-left col-9">
                                : <?php echo $name_pro . ' - ' .  $name_kab . ' - ' . $name_kec . ' - ' . $name_desa ?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-3">
                                Spanduk
                            </div>
                            <div class="text-left col-9">
                                : <?php echo $spanduk ?>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>