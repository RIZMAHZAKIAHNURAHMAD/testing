<?php
if ($_SESSION['role'] == "SuperAdmin") {
    $tampil = "SELECT * FROM users";
} else if ($_SESSION['role'] == "Caleg") {
    $tampil = "SELECT * FROM users WHERE (hapus is NULL OR hapus != 'True') AND role = 'Relawan'";
} else {
    $tampil = "SELECT * FROM users WHERE (hapus is NULL OR hapus != 'True') AND role = 'Relawan'";
}
$db = mysqli_query($conn, $tampil);
?>
<div class="container con2">
    <div class="row">
        <?php
        if ($_SESSION['role'] == "SuperAdmin") {
        ?>
            <div class="col-6 pt-2 text-left">
                <h3>User</h3>
            </div>
            <div class="col-6 pb-2 d-flex flex-row-reverse">
                <a href="<?= $base_url; ?>?r=add-user" class="btn btn-primary">
                    Add User
                </a>
            </div>
        <?php
        } else if ($_SESSION['role'] == "Caleg") {
        ?>
            <div class="col-6 pt-2 text-left">
                <h3>Admin</h3>
            </div>
            <div class="col-6 pb-2 d-flex flex-row-reverse">
                <a href="<?= $base_url; ?>?r=add-user" class="btn btn-primary">
                    Tambah Admin
                </a>
            </div>
        <?php
        } else if ($_SESSION['role'] == "Relawan") {
        ?>
            <div class="col-6 pt-2 text-left">
                <h3>Admin</h3>
            </div>

        <?php
        }
        ?>
        <div class="table-responsive">
            <div class="col-12 pb-2 d-flex flex-row-reverse">
                <a href="<?= $base_url; ?>?r=add-user" class="btn btn-primary">
                    Tambah Admin
                </a>
            </div>
            <table id="example" class="table table-bordered table-striped col-12 col-lg-12">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                $x = 1;
                while ($row = mysqli_fetch_array($db)) {
                ?>
                    <tr>
                        <td><?php echo $x++ ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['role'] == 'Relawan' ? 'Admin' : $row['role'] ?></td>
                        <td>
                            <a href="<?= $base_url; ?>?r=user-edit&id=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a>
                            <?php
                            if ($_SESSION['role'] == "SuperAdmin") {
                                if ($row['hapus'] == 'False') {
                            ?>
                                    <a href="<?= $base_url; ?>/app/user/delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
                                <?php
                                } else if ($row['hapus'] == 'True') {
                                ?>
                                    <a href="<?= $base_url; ?>/app/user/hapus.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Pulihkan</a>
                                <?php
                                }
                            } else if ($_SESSION['role'] == "Caleg") {
                                if ($row['hapus'] == 'False') {
                                ?>
                                    <a href="<?= $base_url; ?>/app/user/delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
                            <?php
                                }
                            }
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>