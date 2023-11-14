<?php
$tampil = "SELECT * FROM indonesia_tps
WHERE id_tps = '" . $_GET['id_tps'] . "'";

$q_buat = mysqli_query($conn, $tampil);
while ($row = mysqli_fetch_array($q_buat)) {
    $id = $row['id_tps'];
    $code_desa = $row['code_desa'];
    $nama_tps = $row['nama_tps'];
    $id_user = $row['id_user'];
}

?>
<div class="container">
    <div class="row">
        <h3 style="text-align: center;">
            Update TPS
            <button class="btn btn-success float-end" onclick="history.back()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg>
            </button>
        </h3>
        <div class="col-lg-12">
            <form action="app/infografis/tpsUpdateProsses.php" method="post">
                <div class="row mb-3">
                    <input type="hidden" class="form-control" name="id_tps" required value="<?php echo $id ?>">
                    <label for="nama_tps" class="form-label col-sm-2">Nama TPS</label>
                    <input type="hidden" class="form-control" name="code_desa" required value="<?php echo $code_desa ?>">
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_tps" required value="<?php echo $nama_tps ?>" autofocus>
                    </div>
                    <input type="hidden" class="form-control" name="id_user" required value="<?php echo $id_user ?>">
                </div>

                <input type="submit" class="btn btn-danger col-sm-12" value="Update">
            </form>
        </div>
    </div>
</div>