<div class="container">
    <div class="row">
        <h3 style="text-align: center;">
            Add User
            <button class="btn btn-success float-end" onclick="history.back()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg>
            </button>
        </h3>
        <div class="col-lg-12">
            <form action="app/user/create-prosses.php" method="post">
                <div class="row mb-3">
                    <label for="nik" class="form-label col-sm-2">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" required placeholder="Masukkan Username" autofocus>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="form-label col-sm-2">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" required placeholder="Masukkan Email">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="no_kk" class="form-label col-sm-2">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                    </div>
                </div>
                <?php
                if ($_SESSION['role'] == "SuperAdmin") {
                ?>
                    <div class="row mb-3">
                        <label for="no_kk" class="form-label col-sm-2">Role</label>
                        <div class="col-sm-10">
                            <select name="role" class="form-control">
                                <option value="">-- Pilih Role --</option>
                                <option value="Super Admin">Super Admin</option>
                                <option value="Caleg">Caleg</option>
                                <option value="Relawan">Relawan</option>
                            </select>
                        </div>
                    </div>
                    <i class="text-danger">Menu User Info : <br>Lihatkan = Semua User Bisa Melihat Data User <br>Sembunyikan = Hanya Super Admin Yang Bisa Melihat Data User</i>
                    <div class="row mb-3">
                        <label for="no_kk" class="form-label col-sm-2">Menu User</label>
                        <div class="col-sm-10">
                            <select name="hapus" class="form-control">
                                <option value="">-- Pilih Menu User --</option>
                                <option value="False">Lihatkan</option>
                                <option value="True">Sembuyikan</option>
                            </select>
                        </div>
                    </div>
                <?php
                } else if ($_SESSION['role'] == "Caleg") {
                ?>
                    <div class="row mb-3">
                        <label for="no_kk" class="form-label col-sm-2">Role</label>
                        <div class="col-sm-10">
                            <select name="role" class="form-control">
                                <option value="">-- Pilih Role --</option>
                                <option value="Relawan">Relawan</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="hapus" value="False">
                <?php
                }
                ?>
                <input type="submit" class="btn btn-danger col-sm-12" value="Tambahkan">
            </form>
        </div>
    </div>
</div>