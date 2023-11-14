<script>
    var id_partai = "4";
</script>

<section class="about_area mb-5 con2">
    <div class="container mb-4">
        <h1 style="text-align: center;color:#FFFFFF">Tambah Partai</h1>
        <div class="row justify-content-start align-items-center mb-4 pb-4">
            <div class="col-12 p-1">
                <form action="<?= $base_url ?>/app/partai/create-proses.php" method="post" enctype="multipart/form-data" class="card p-2">
                    <div class="row mb-3">
                        <label for="partai" class="form-label col-sm-2">Partai</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="partai" required placeholder="Masukkan Nama Partai">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="akronim" class="form-label col-sm-2">Akronim</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="akronim" placeholder="Masukkan Akronim">
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