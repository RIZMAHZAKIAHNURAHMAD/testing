<?php
$tampil = "select * from pendukung3";
$db = mysqli_query($conn, $tampil);
$modelPendukung = mysqli_fetch_all($db);


$tampil = "select * from pendukung3 WHERE jenis_kelamin = 'Laki-laki'";
$db = mysqli_query($conn, $tampil);
$modelPendukungL = mysqli_fetch_all($db);
$modelPendukungP = count($modelPendukung) - count($modelPendukungL);
// print_r(count($modelPendukungL));
?>
<section class="about_area" style="margin-top:-100px;">
    <div class="container">
        <div class="row justify-content-start align-items-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-6 col-12 pb-4" style="float:left;">
                            <div class="card bg-light">
                                <div class="container">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-4">
                                            <div class="cardx bg-light m-2">
                                                <div class="containerx">
                                                    <img src="https://infopemilu.kpu.go.id/berkas-silon/calon/345153/pas_foto/1683952159_a0af2d87-972b-4188-8d5b-16ac5a044f4e.jpeg" height="100%" width="100%" style="border-radius:20px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h3 class="mb-0" style="color:#000000;">HASNA RIYANTI</h3>
                                            <p class="mt-0">Perempuan</p>
                                            <p class="mb-0">Daerah Pemilihan</p>
                                            <h5>Dapil 4 Kampar</h5>
                                            <!-- <canvas id="myChart" style="width:100%;"></canvas> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 px-2 justify-content-center align-items-center mt-2">
                                <div class="col-12 float-start">
                                    <a href="<?= $base_url; ?>?r=tambah-pendukung" class="text-decoration-none">
                                        <div class="card text-center p-3" style="background: #FF4B91;border-color:#FFF;border-radius:30px">
                                            <p class="text-white mb-0 ">
                                                <i class="bi bi-person-add" style="font-weight: bolder;font-size:30px;"></i>
                                                Tambah Dukungan
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12" style="float:left;">
                            <div class="col-lg-12 px-2 justify-content-center align-items-center">
                                <div class="col-12 float-start mb-2">
                                    <div class="card text-center p-3" style="background: #FFFFFF;border:2px solid #633bb8;">
                                        <p class="text-black mb-0">Target Pemenang</p>
                                        <h1 class=" mt-0" style="color:#633bb8;">
                                            <i class="bi bi-search" style="font-weight: bolder;font-size:30px;"></i>
                                            5000
                                        </h1>
                                    </div>
                                </div>
                                <div class="col-12 float-start ps-0 mb-2">
                                    <div class="card text-center p-3" style="background: #a63bb8;border-color:#FFF;">
                                        <p class="text-white mb-0">Perolehan Dukungan</p>
                                        <h1 class="text-white mt-0">
                                            <i class="bi bi-person-add" style="font-weight: bolder;font-size:30px;"></i>
                                            <?php echo count($modelPendukung) ?>
                                        </h1>
                                    </div>
                                </div>
                                <!-- <div class="col-12 pt-4 pb-4 float-start">
                                    <h4 style="text-align: center;"><b style="color: black;">Progress Pemenangan</b></h4>
                                    <div class="progress mx-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>


                <div class="row justify-content-center align-items-center">
                    <div class="col-12 mb-5">
                        <h4 class="text-center"><b style="color: black;">Jenis Kelamin</b></h4>
                        <div class="card bg-light mb-5 mx-2">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-6">
                                    <div class="row justify-content-center align-items-center ps-3">
                                        <div class="col-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-gender-male" viewBox="0 0 16 16" style="color: blue;">
                                                <path fill-rule="evenodd" d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z" />
                                            </svg>
                                        </div>
                                        <div class="col-8">
                                            <p class="text-start">
                                                <b style="color: blue;">
                                                    <?= number_format(count($modelPendukungL) / count($modelPendukung) * 100, 2) ?>%
                                                </b>
                                                <br><?= count($modelPendukungL) ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-6">
                                    <div class="row justify-content-center align-items-center pe-3">
                                        <div class="col-8">
                                            <p class="text-end" style="color: black;">
                                                <b style="color: red;">
                                                    <?= number_format(($modelPendukungP) / count($modelPendukung) * 100, 2) ?>%
                                                </b>
                                                <br><?= ($modelPendukungP) ?>
                                            </p>
                                        </div>
                                        <div class="col-4 text-end">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-gender-female" viewBox="0 0 16 16" style="color: red;">
                                                <path fill-rule="evenodd" d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
<script>
    var xValues = ["Grafik Pendukung"];
    var yValues = [678];
    var barColors = ["blue"];

    new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "Grafik Pendukung"
            }
        }
    });
</script>