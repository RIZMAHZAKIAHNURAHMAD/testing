<script>
    var id_dapil = "4";
</script>

<section class="about_area mb-5 con2">
    <div class="container mb-4">
        <h1 style="text-align: center;color:#FFFFFF">Tambah Pendukung</h1>
        <div class="row justify-content-start align-items-center mb-4 pb-4">
            <div class="col-12 p-1">
                <form action="<?= $base_url ?>/app/pendukung/create-proses.php" method="post" enctype="multipart/form-data" class="card p-2">
                    <div class="row mb-3">
                        <label for="nik" class="form-label col-sm-2">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nik" required placeholder="Masukkan NIK" autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama" class="form-label col-sm-2">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" required placeholder="Masukkan Nama">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="no_kk" class="form-label col-sm-2">No Hp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_hp" placeholder="Masukkan No Hp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jk" class="form-label col-sm-2">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select required name="jk" class="form-control">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="row mb-3">
                        <label class="form-label col-sm-2">Provinsi</label>
                        <div class="col-sm-10">
                            <select required class="form-control" id="provinsi" name="provinsi" onclick="loadKabu()">
                                <option value="">-- Pilih Provinsi --</option>
                                <?php
                                $query = "SELECT * FROM indonesia_provinces";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='{$row['code']}'>{$row['name']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div> -->
                    <!-- <div class="row mb-3">
                        <label class="form-label col-sm-2">Kabupaten</label>
                        <div class="col-sm-10">
                            <select required class="form-control" name="kabupaten" id="kabupaten" onclick="loadKeca()">
                                <option value="">-</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="row mb-3">
                        <label class="form-label col-sm-2">Kecamatan</label>
                        <div class="col-sm-10">
                            <select required class="form-control" name="kecamatan" id="kecamatan" onclick="loadDesaa()">
                                <option value="">-</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="form-label col-sm-2">Kelurahan/Desa</label>
                        <div class="col-sm-10">
                            <select required class="form-control" name="desa" id="desa" onclick="loadTps()">
                                <option value="">-</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="form-label col-sm-2">TPS</label>
                        <div class="col-sm-10">
                            <select required class="form-control" name="tps" id="tps">
                                <option value="">-</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="jk" class="form-label col-sm-2">Calon Legislatif Provinsi</label>
                        <div class="col-sm-10">
                            <?php
                            $calegProvList = [];
                            // $calegProvList[] = "PKB - ADRIAS, S.Pd.";
                            // $calegProvList[] = "PKB - A. ABU ZAZID, S.H., M.Pd.I.";
                            // $calegProvList[] = "PKB - TOHIR, S.Pd.";
                            // $calegProvList[] = "PKB - Ir. ALIMAN MAKMUR, M.Si., Ph.D.";
                            // $calegProvList[] = "PKB - JAWAHIR, S.Pd., M.Pd.";
                            // $calegProvList[] = "PKB - WULAN PERMATASARI, A.Md.";
                            // $calegProvList[] = "PKB - AFIFUDDIN, S.T.";
                            // $calegProvList[] = "PKB - SAMSUARDI BOMBOM";
                            $calegProvList[] = "PPP - H. YUYUN HIDAYAT, S.T., M.M.";
                            $calegProvList[] = "PPP - HARNI YUSNITA, S.T., M.T.";
                            $calegProvList[] = "PPP - K.H. MUHAMMAD ALWI AR";
                            $calegProvList[] = "PPP - ABDUL MAJID, S.Pd.";
                            $calegProvList[] = "PPP - AFIFAH PUTRI ANSARI";
                            $calegProvList[] = "PPP - MUHAMMAD SURYATAMA";
                            $calegProvList[] = "PPP - AMIRULLAH, S.Pd.";
                            $calegProvList[] = "PPP - ALPANDI WINATA, S.E.";

                            ?>
                            <select required name="caleg_prov" class="form-control">
                                <option value="">-- Pilih Calon --</option>
                                <?php foreach ($calegProvList as $key => $value) : ?>
                                    <option value="<?= $value ?>"><?= $value ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="jk" class="form-label col-sm-2">Calon Legislatif Kabupaten</label>
                        <div class="col-sm-10">
                            <?php
                            $calegProvList = [];
                            // $calegProvList[] = "PKB - IDASMI";
                            // $calegProvList[] = "PKB - REOGI";
                            // $calegProvList[] = "PKB - FAUZAN DOMO, SH, MH";
                            // $calegProvList[] = "PKB - FITRI NELI";
                            // $calegProvList[] = "PKB - RAMLI, S.KOM";
                            // $calegProvList[] = "PKB - SYAHRIAL";
                            // $calegProvList[] = "PKB - JALINUS, S.H.I";
                            // $calegProvList[] = "PKB - VIVI SUMANTI";
                            // $calegProvList[] = "PKB - MUHAMMAD ISYAHS.Pdi";
                            // $calegProvList[] = "PKB - R IFKAR ASYKAR";
                            $calegProvList[] = "PPP - H. SYAFRUDDIN DOMO";
                            $calegProvList[] = "PPP - CELVIN RINALDI";
                            $calegProvList[] = "PPP - HASNA RIYANTI";
                            $calegProvList[] = "PPP - HENDRI YUSMARDIANTOS.Sos";
                            $calegProvList[] = "PPP - SITI MUFIDA";
                            $calegProvList[] = "PPP - MHD. SALEH, SH, S.PD, MH";
                            $calegProvList[] = "PPP - FIKRI AMANAH";
                            $calegProvList[] = "PPP - MOHD. ELFENDRI VETRA";
                            $calegProvList[] = "PPP - DESY MURINI,S.Ag";
                            $calegProvList[] = "PPP - MARZAN";
                            $calegProvList[] = "PPP - DEBBIE RICARDO,SE";

                            ?>
                            <select required name="caleg_kab" class="form-control">
                                <option value="">-- Pilih Calon --</option>
                                <?php foreach ($calegProvList as $key => $value) : ?>
                                    <option value="<?= $value ?>"><?= $value ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="form-label col-sm-2">Aspirasi</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="aspirasi" id="desa">
                                <option value="">-- Pilih Aspirasi --</option>
                                <option>Sembako</option>
                                <option>Uang 50.000</option>
                                <option>Uang 100.000</option>
                                <option>Uang diatas 100.000</option>
                                <option>Tanpa Aspirasi</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="form-label col-sm-2">KTP</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="ktp" value="" />
                        </div>
                    </div>
                    <input type="hidden" name="hapus" value="False">
                    <input type="hidden" name="id_users" value="<?php echo $_SESSION['id']; ?>">
                    <input type="hidden" name="spanduk" value="Nonaktif">

                    <input type="submit" class="btn btn-danger col-12" value="Tambahkan">
                </form>
            </div>
        </div>
    </div>
</section>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> -->
<script>
    // loadKabu();
    function loadKabu() {
        var provinsi = "1401"; //document.getElementById("provinsi");
        var kabupaten = document.getElementById("kabupaten");

        var selectedProvinces = "14"; //provinsi.value;


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

    loadKeca(id_dapil);

    function loadKeca(id_dapil) {
        console.log('#code', '#name kec 1');
        // var kabupaten = document.getElementById("kabupaten");
        var kecamatan = document.getElementById("kecamatan");

        var selectedDistricts = "1401"; //kabupaten.value;

        // Clear existing options in the city dropdown
        kecamatan.innerHTML = '<option value="">-- Pilih Kecamatan --</option>';

        if (selectedDistricts) {

            // Perform an AJAX request to fetch cities for the selected country
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "<?= $base_url; ?>/app/wilayah/get_kec.php?city_code=" + selectedDistricts + "&id_dapil=" + id_dapil, true);
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