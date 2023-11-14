<?php

$q_buat = mysqli_query($conn, $tampil);
while ($row = mysqli_fetch_array($q_buat)) {
    $id_pendukung = $row['id'];
    $name_pro = $row['partai'];
    $code_pro = $row['akronim'];
}

?>
<div class="container">
    <div class="row">
        <h3>
            Detail Partai
            <button class="btn btn-success float-end" onclick="history.back()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg>
            </button>
        </h3>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Detail</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-3">
                                Partai
                            </div>
                            <div class="text-left col-9">
                                : <?php echo $partai ?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-3">
                                Akronim
                            </div>
                            <div class="text-left col-9">
                                : <?php echo $akronim ?>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>