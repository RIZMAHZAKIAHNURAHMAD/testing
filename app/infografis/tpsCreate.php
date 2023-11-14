<?php
$tampil = "SELECT k.id, k.code, k.name, (SELECT COUNT(*) FROM pendukung3 as p WHERE p.desa=k.code) as jumlah
        FROM `indonesia_villages` as k
        WHERE k.district_code='" . $_GET['code'] . "'";

$db = mysqli_query($conn, $tampil);
?>
<div class="container">
    <div class="row">
        <h3 style="text-align: center;">
            Tambah TPS 
            <button class="btn btn-success float-end" onclick="history.back()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg>
            </button>
        </h3>
        <div class="col-lg-12">
            <form action="app/infografis/tpsCreateProsses.php" method="post">
                <div class="row mb-3">
                    <label for="nik" class="form-label col-sm-2">Nama TPS</label>
                    <input type="hidden" class="form-control" name="code" required value="<?php echo $_GET['code'] ?>">
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_tps" required placeholder="Masukkan Nama TPS" autofocus>
                    </div>
                    <input type="hidden" class="form-control" name="id_user" required value="<?php echo $_SESSION['id'] ?>">
                </div>

                <input type="submit" class="btn btn-danger col-sm-12" value="Tambahkan">
            </form>
        </div>
    </div>
</div>