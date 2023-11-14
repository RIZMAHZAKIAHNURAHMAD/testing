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
JOIN indonesia_tps ON pendukung3.tps=indonesia_tps.id_tps
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
    $id_tps = $row['id_tps'];
    $nama_tps = $row['nama_tps'];
}

?>
<div class="container">
    <div class="d-none d-sm-block">
        <h4 style="text-align: center;">Update</h4>
        <form action="<?= $base_url ?>/app/pendukung/update-prosses.php" method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-sm-10">
                    <input type="hidden" class="form-control" name="id_pendukung" required value="<?php echo $id_pendukung ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama" class="form-label col-sm-2">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" required value="<?php echo $nama ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="nik" class="form-label col-sm-2">NIK</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nik" required value="<?php echo $nik ?>" autofocus>
                </div>
            </div>
            <div class="row mb-3">
                <label for="no_kk" class="form-label col-sm-2">No Hp</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_hp" value="<?php echo $no_hp ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="jk" class="form-label col-sm-2">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select name="jk" class="form-control">
                        <option value="<?php echo $jenis_kelamin ?>"><?php echo $jenis_kelamin ?></option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="form-label col-sm-2">Provinsi</label>
                <div class="col-sm-10">
                    <select class="form-control" id="provinsi" name="provinsi" onclick="loadKabu()">
                        <option value="<?php echo $code_pro ?>"><?php echo $name_pro ?></option>
                        <?php
                        // Fetch countries from the database and populate the options
                        // Replace with your database connection code
                        $query = "SELECT * FROM indonesia_provinces";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['code']}'>{$row['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="form-label col-sm-2">Kabupaten</label>
                <div class="col-sm-10">
                    <select class="form-control" name="kabupaten" id="kabupaten" onclick="loadKeca()">
                        <option value="<?php echo $code_kab ?>"><?php echo $name_kab ?></option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="form-label col-sm-2">Kecamatan</label>
                <div class="col-sm-10">
                    <select class="form-control" name="kecamatan" id="kecamatan" onclick="loadDesaa()">
                        <option value="<?php echo $code_kec ?>"><?php echo $name_kec ?></option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="form-label col-sm-2">Kelurahan/Desa</label>
                <div class="col-sm-10">
                    <select class="form-control" name="desa" id="desa" onclick="loadTps()">
                        <option value="<?php echo $code_desa ?>"><?php echo $name_desa ?></option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="form-label col-sm-2">TPS</label>
                <div class="col-sm-10">
                    <select class="form-control" name="tps" id="tps">
                        <option value="<?php echo $tps ?>"><?php echo $nama_tps ?></option>
                    </select>
                </div>
            </div>
            <!-- <div class="row mb-3">
                <label class="form-label col-sm-2">Kordinator</label>
                <div class="col-sm-10">
                    <select class="form-control" name="kordinator" id="desa">
                        <option value="<?php echo $kordinator ?>"><?php echo $kordinator ?></option>
                        <option value="Kordinator kabupaten">Kordinator kabupaten</option>
                        <option value="Kordinator kecamatan">Kordinator kecamatan</option>
                        <option value="Kordinator desa/kelurahan">Kordinator desa/kelurahan</option>
                        <option value="Kordinator TPS">Kordinator TPS</option>
                    </select>
                </div>
            </div> -->
            <!--<div class="row mb-3">-->
            <!--    <label for="agama" class="form-label col-sm-2">Agama</label>-->
            <!--    <div class="col-sm-10">-->
            <!--        <input type="text" class="form-control" name="agama" value="Masukkan Agama">-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="row mb-3">-->
            <!--    <label for="pekerjaan" class="form-label col-sm-2">Pekerjaan</label>-->
            <!--    <div class="col-sm-10">-->
            <!--        <input type="text" class="form-control" name="pekerjaan" value="Masukkan Pekerjaan">-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="row mb-3">-->
            <!--    <label for="status" class="form-label col-sm-2">Status</label>-->
            <!--    <div class="col-sm-10">-->
            <!--        <input type="text" class="form-control" name="status" value="Masukkan Status">-->
            <!--    </div>-->
            <!--</div>-->
            <div class="row mb-3">
                <label for="alamat" class="form-label col-sm-2">KTP</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" name="gambar" value="" />
                </div>
            </div>


            <input type="submit" class="btn btn-danger col-sm-12" value="Update">
        </form>
    </div>
    <div class="d-block d-sm-none">
        <h4 style=" text-align: center;">Update / Delete</h4>
        <div class="card">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <img src="assets/img/fotologo.png" height="100%" width="100%">
                    </div>
                    <div class="col-9 pt-3">
                        <b>
                            <?php echo $nama ?>
                        </b>
                        <p><?php echo $nik ?></p>
                    </div>
                </div>
            </div>
        </div>
        <form action="<?= $base_url ?>/app/pendukung/update-prosses.php" method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-sm-10">
                    <input type="hidden" class="form-control" name="id_pendukung" required value="<?php echo $id_pendukung ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama" class="form-label col-sm-2">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" required value="<?php echo $nama ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="nik" class="form-label col-sm-2">NIK</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nik" required value="<?php echo $nik ?>" autofocus>
                </div>
            </div>
            <div class="row mb-3">
                <label for="no_kk" class="form-label col-sm-2">No Hp</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_hp" value="<?php echo $no_hp ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="jk" class="form-label col-sm-2">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select name="jk" class="form-control">
                        <option value="<?php echo $jenis_kelamin ?>"><?php echo $jenis_kelamin ?></option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="form-label col-sm-2">Provinsi</label>
                <div class="col-sm-10">
                    <select class="form-control" id="provinsi" name="provinsi" onclick="loadKabu()">
                        <option value="<?php echo $code_pro ?>"><?php echo $name_pro ?></option>
                        <?php
                        // Fetch countries from the database and populate the options
                        // Replace with your database connection code
                        $query = "SELECT * FROM indonesia_provinces";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['code']}'>{$row['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="form-label col-sm-2">Kabupaten</label>
                <div class="col-sm-10">
                    <select class="form-control" name="kabupaten" id="kabupaten" onclick="loadKeca()">
                        <option value="<?php echo $code_kab ?>"><?php echo $name_kab ?></option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="form-label col-sm-2">Kecamatan</label>
                <div class="col-sm-10">
                    <select class="form-control" name="kecamatan" id="kecamatan" onclick="loadDesaa()">
                        <option value="<?php echo $code_kec ?>"><?php echo $name_kec ?></option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="form-label col-sm-2">Kelurahan/Desa</label>
                <div class="col-sm-10">
                    <select class="form-control" name="desa" id="desa">
                        <option value="<?php echo $code_desa ?>"><?php echo $name_desa ?></option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="form-label col-sm-2">Kordinator</label>
                <div class="col-sm-10">
                    <select class="form-control" name="kordinator" id="desa">
                        <option value="<?php echo $kordinator ?>"><?php echo $kordinator ?></option>
                        <option value="Kordinator kabupaten">Kordinator kabupaten</option>
                        <option value="Kordinator kecamatan">Kordinator kecamatan</option>
                        <option value="Kordinator desa/kelurahan">Kordinator desa/kelurahan</option>
                        <option value="Kordinator TPS">Kordinator TPS</option>
                    </select>
                </div>
            </div>
            <!--<div class="row mb-3">-->
            <!--    <label for="agama" class="form-label col-sm-2">Agama</label>-->
            <!--    <div class="col-sm-10">-->
            <!--        <input type="text" class="form-control" name="agama" value="Masukkan Agama">-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="row mb-3">-->
            <!--    <label for="pekerjaan" class="form-label col-sm-2">Pekerjaan</label>-->
            <!--    <div class="col-sm-10">-->
            <!--        <input type="text" class="form-control" name="pekerjaan" value="Masukkan Pekerjaan">-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="row mb-3">-->
            <!--    <label for="status" class="form-label col-sm-2">Status</label>-->
            <!--    <div class="col-sm-10">-->
            <!--        <input type="text" class="form-control" name="status" value="Masukkan Status">-->
            <!--    </div>-->
            <!--</div>-->
            <div class="row mb-3">
                <label for="alamat" class="form-label col-sm-2">KTP</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" name="gambar" value="" />
                </div>
            </div>
            <input type="submit" class="btn btn-primary col-12" value="Update">
        </form>
        <div class="pt-2">
            <a onClick="javascript: return confirm('Apakah Anda Yakin Ingin Menghapusnya?')" href="<?= $base_url; ?>/app/pendukung/delete.php?id_pendukung=<?php echo $row['id_pendukung'] ?>" class="btn btn-danger col-12">Delete</a>
        </div>
    </div>
</div>

<script>
    function loadKabu() {
        var provinsi = document.getElementById("provinsi");
        var kabupaten = document.getElementById("kabupaten");

        var selectedProvinces = provinsi.value;


        console.log('#code1', '#name kab 1 <?= $base_url; ?>');
        // Clear existing options in the city dropdown
        kabupaten.innerHTML = '<option value="">-- Pilih Kabupaten --</option>';

        if (selectedProvinces) {

            console.log('#code2', '#name kab 2 ' + selectedProvinces);
            // Perform an AJAX request to fetch cities for the selected country
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "<?= $base_url; ?>/app/wilayah/get_cities.php?province_code=" + selectedProvinces, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var cities = JSON.parse(xhr.responseText);
                        // Populate the city dropdown with fetched cities
                        cities.forEach(function(city) {
                            var cityOption = document.createElement("option");
                            cityOption.value = city.code;
                            cityOption.textContent = city.name;
                            kabupaten.appendChild(cityOption);
                        });
                    } else {}
                }
            };
            xhr.send();
        }
    }

    function loadKeca() {
        console.log('#code', '#name kec 1');
        var kabupaten = document.getElementById("kabupaten");
        var kecamatan = document.getElementById("kecamatan");

        var selectedDistricts = kabupaten.value;

        // Clear existing options in the city dropdown
        kecamatan.innerHTML = '<option value="">-- Pilih Kecamatan --</option>';

        if (selectedDistricts) {

            // Perform an AJAX request to fetch cities for the selected country
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "<?= $base_url; ?>/app/wilayah/get_kec.php?city_code=" + selectedDistricts, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var districts = JSON.parse(xhr.responseText);
                        // Populate the city dropdown with fetched districts
                        districts.forEach(function(kec) {
                            var kecOption = document.createElement("option");
                            kecOption.value = kec.code;
                            kecOption.textContent = kec.name;
                            kecamatan.appendChild(kecOption);
                        });
                    } else {

                    }
                }
            };
            xhr.send();
        }
    }

    function loadDesaa() {
        var kecamatan = document.getElementById("kecamatan");
        var desa = document.getElementById("desa");

        var selectedDesa = kecamatan.value;

        // Clear existing options in the city dropdown
        desa.innerHTML = '<option value="">-- Pilih Desa --</option>';

        if (selectedDesa) {
            // Perform an AJAX request to fetch cities for the selected country
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "<?= $base_url; ?>/app/wilayah/get_desa.php?district_code=" + selectedDesa, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var villages = JSON.parse(xhr.responseText);
                        // Populate the city dropdown with fetched villages
                        villages.forEach(function(villa) {
                            var villaOption = document.createElement("option");
                            villaOption.value = villa.code;
                            villaOption.textContent = villa.name;
                            desa.appendChild(villaOption);
                        });
                    } else {

                    }
                }
            };
            xhr.send();
        }
    }

    function loadTps() {
        var kecamatan = document.getElementById("desa");
        var desa = document.getElementById("tps");

        var selectedDesa = kecamatan.value;

        // Clear existing options in the city dropdown
        desa.innerHTML = '<option value="">-- Pilih TPS --</option>';

        if (selectedDesa) {
            // Perform an AJAX request to fetch cities for the selected country
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "<?= $base_url; ?>/app/wilayah/get_tps.php?district_code=" + selectedDesa, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var villages = JSON.parse(xhr.responseText);
                        // Populate the city dropdown with fetched villages
                        villages.forEach(function(villa) {
                            var villaOption = document.createElement("option");
                            villaOption.value = villa.code;
                            villaOption.textContent = villa.name;
                            desa.appendChild(villaOption);
                        });
                    } else {

                    }
                }
            };
            xhr.send();
        }
    }
</script>