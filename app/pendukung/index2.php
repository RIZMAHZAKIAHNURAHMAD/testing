<?php
$tampil = "SELECT *, pendukung3.id as id_pendukung
            FROM pendukung3
            WHERE provinsi IS NULL 
            ORDER BY id_pendukung DESC";
            
            // WHERE alamat != '' AND alamat LIKE 'PANGKALAN TUJUH'
// $tampil = "SELECT *,  indonesia_cities.name as name_kab, indonesia_provinces.name as name_pro, indonesia_districts.name as name_kec, indonesia_villages.name as name_desa, pendukung3.id as id_pendukung
// FROM pendukung3
// JOIN indonesia_cities ON pendukung3.kabupaten=indonesia_cities.code
// JOIN indonesia_provinces ON pendukung3.provinsi=indonesia_provinces.code
// JOIN indonesia_districts ON pendukung3.kecamatan=indonesia_districts.code
// JOIN indonesia_villages ON pendukung3.desa=indonesia_villages.code
// ORDER BY id_pendukung DESC";
$db = mysqli_query($conn, $tampil);
?>
<section class="about_area pt-5">
    <div class="container pt-5">
        <h1 style="text-align: center;">List Pendukung</h1>
        <div class="row pt-4">
            <div class="col-lg-12">
                <table id="example1" class="table table-bordered table-striped">
                    <tr>
                        <th class="d-table-cell">Nama</th>
                        <th class="d-table-cell">NIK</th>
                        <th class="d-none d-sm-table-cell d-md-table-cell d-lg-table-cell d-xl-table-cell d-xxl-table-cell">No HP</th>
                        <th class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell d-xxl-table-cell">Jenis Kelamin</th>
                        <th class="d-none d-lg-table-cell d-xl-table-cell d-xxl-table-cell">Provinsi</th>
                        <th class="d-none d-xl-table-cell d-xxl-table-cell">Kabupaten</th>
                        <th class="d-none d-xxl-table-cell">Kecamatan</th>
                        <th class="d-none d-xxl-table-cell">Desa</th>
                        <th class="d-none d-xxl-table-cell">Alamat</th>
                        <th class="d-none d-xxl-table-cell">KTP</th>
                        <th class="d-table-cell">Aksi</th>
                    </tr>
                    <?php
                    $x = 1;
                    while ($row = mysqli_fetch_array($db)) {
                        $provinsi = '14';
                        $kabupaten = '1404';
                        $kecamatan = '140408';
                        $desa = '1404082008';
                        $id = $row['id_pendukung'];
                        $update = "UPDATE pendukung3 
                            SET
                            provinsi='" . $provinsi . "',
                            kabupaten='" . $kabupaten . "',
                            kecamatan='" . $kecamatan . "',
                            desa='" . $desa . "'
                    
                            WHERE id = '" . $id . "'";
                    
                        // $edit = mysqli_query($conn, $update);
                    ?>
                        <tr>
                            <td class="d-table-cell">
                                <p style="margin-bottom:0px;"><?php echo $row['id_pendukung'] ?>. <?php echo $row['nama'] ?></p>
                                <p style="font-size:10px;color:grey;margin-top:0px;"><?php echo $row['created_date'] ?></p>
                            </td>
                            <td class="d-table-cell"><?php echo $row['nik'] ?></td>
                            <td class="d-none d-sm-table-cell d-md-table-cell d-lg-table-cell d-xl-table-cell d-xxl-table-cell"><?php echo $row['no_hp'] ?></td>
                            <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell d-xxl-table-cell"><?php echo $row['jenis_kelamin'] ?></td>
                            <td class="d-none d-lg-table-cell d-xl-table-cell d-xxl-table-cell"><?php echo $row['provinsi'] ?></td>
                            <td class="d-none d-xl-table-cell d-xxl-table-cell"><?php echo $row['kabupaten'] ?></td>
                            <td class="d-none d-xxl-table-cell"><?php echo $row['kecamatan'] ?></td>
                            <td class="d-none d-xxl-table-cell"><?php echo $row['desa'] ?></td>
                            <td class="d-none d-xxl-table-cell"><?php echo $row['alamat'] ?></td>
                            <td class="d-none d-xxl-table-cell"><?php echo "<img src='images/$row[ktp]' width='90' height='70' alt='ktp' />"; ?></td>
                            <td class="d-table-cell">
                                <a href="<?= $base_url; ?>?r=pendukung-edit&id_pendukung=<?php echo $row['id_pendukung'] ?>">
                                    <input type="submit" class="btn btn-primary col-12" value="Edit">
                                </a>
                                <a href="pendukung/delete.php?id_pendukung=<?php echo $row['id_pendukung'] ?>">
                                    <input type="submit" class="btn btn-danger col-12" value="Delete">
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</section>