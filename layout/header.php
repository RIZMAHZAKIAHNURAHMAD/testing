<?php
include("koneksi/index.php");
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Politik Booster</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo2.png">
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .navtop {
            font-weight: 450;
        }

        .navtop a {
            color: #FFFFFF;
        }

        .navbar-brand {
            color: #FFFFFF;
        }

        .menu-active a {
            color: #3085C3;
        }

        .menu-active {
            background: #FFFFFF;
            border: 1px solid #FFFFFF;
            border-radius: 20px;
            margin: 0 5px 0 5px;
        }

        .con2 {
            margin-top: -80px;
        }

        .breadcrumb-item a {
            font-size: 12px;
            background: #FFFFFF;
            color: #3085C3;
            text-decoration: none;
            padding: 5px;
            border: 1px solid #FFFFFF;
            border-radius: 20px;
        }

        .table-responsive {
            background: #FFFFFF;
            border: 0.5px solid gainsboro;
            border-radius: 20px;
            padding: 2%;
        }

        canvas {
            border: 0.5px solid gainsboro;
            background: #FFFFFF;
            border-radius: 20px;
            padding: 2%;
            width: 100%;
        }

        h3 {
            color: #FFFFFF;
        }

        .bc-active a {
            background: #ffc107;
            color: #FFFFFF;
            font-weight: 500;
        }
    </style>

</head>

<body>

    <?php
    if (isset($_GET['r'])) {
        switch ($_GET['r']) {
            case 'home':
                $menu['home'] = 'menu-active';
                break;

            case 'pendukung':
                $menu['relawan'] = 'menu-active';
                break;

            case 'pendukung2':
                break;

            case 'tambah-pendukung':
                $menu['tambah-relawan'] = 'menu-active';
                break;

            case 'detail-pendukung':
                break;

            case 'pendukung-edit':
                break;
            case 'infografis':
                $menu['wilayah'] = 'menu-active';
                break;
            case 'kab':
                $menu['wilayah'] = 'menu-active';
                break;
            case 'kec':
                $menu['wilayah'] = 'menu-active';
                break;
            case 'desa':
                $menu['wilayah'] = 'menu-active';
                break;
            case 'wilayah-koor':
                $menu['wilayah'] = 'menu-active';
                break;
            case 'infografis-kab':
                $menu['wilayah'] = 'menu-active';
                break;
            case 'infografis-kec':
                $menu['wilayah'] = 'menu-active';
                break;
            case 'infografis-tps':
                $menu['wilayah'] = 'menu-active';
                break;

            case 'tps-tambah':
                break;

            case 'tps-update':
                break;

            case 'partai':
                $menu['partai'] = 'menu-active';
                break;

            case 'tambah-partai':
                $menu['tambah-partai'] = 'menu-active';
                break;

            case 'detail-partai':
                break;

            case 'partai-edit':
                break;

            case 'user':
                $menu['user'] = 'menu-active';
                break;

            case 'user-edit':
                break;

            case 'add-user':
                break;

            default:
                break;
        }
    }
    // print_r($menu);
    ?>
    <!--================ Start Header Area =================-->

    <div class="container">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= $base_url; ?>?r=home" style="font-weight: bold;">
                    <img src="assets/img/logo2.png" width="32px">
                    Politik <span style="color:#279EFF;">Booster</span>
                </a>
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
                <div class="collapse navbar-collapse" id="collapsibleNavbarx">

                    <ul class="navbar-nav ms-auto" style="z-index: 9;">
                        <li class="nav-item navtop <?= $menu['home']; ?>"><a class="nav-link" href="<?= $base_url; ?>?r=home">Home</a></li>
                        <?php
                        if ($_SESSION['role'] == "SuperAdmin") {
                        ?>
                            <li class="nav-item navtop <?= $menu['relawan']; ?>"><a class="nav-link" href="<?= $base_url; ?>?r=pendukung">Data Pendukung</a></li>
                            <li class="nav-item navtop <?= $menu['tambah-relawan']; ?>"><a class="nav-link" href="<?= $base_url; ?>?r=tambah-pendukung">Tambah Pendukung</a></li>
                            <li class="nav-item navtop <?= $menu['wilayah']; ?>"><a class="nav-link" href="<?= $base_url; ?>?r=infografis">Wilayah</a></li>
                            <li class="nav-item navtop <?= $menu['user']; ?>"><a class="nav-link" href="<?= $base_url; ?>?r=user">User</a></li>
                            <?php
                        } else if ($_SESSION['role'] == "Caleg") {
                            ?>
                            <li class="nav-item navtop <?= $menu['relawan']; ?>"><a class="nav-link" href="<?= $base_url; ?>?r=pendukung">Data Relawan</a></li>
                            <li class="nav-item navtop <?= $menu['tambah-relawan']; ?>"><a class="nav-link" href="<?= $base_url; ?>?r=tambah-pendukung">Tambah Relawan</a></li>
                            <li class="nav-item navtop <?= $menu['wilayah']; ?>"><a class="nav-link" href="<?= $base_url; ?>?r=infografis">Wilayah</a></li>
                            <li class="nav-item navtop <?= $menu['partai']; ?>"><a class="nav-link" href="<?= $base_url; ?>?r=partai">Data Partai</a></li>
                            <li class="nav-item navtop <?= $menu['tambah-partai']; ?>"><a class="nav-link" href="<?= $base_url; ?>?r=tambah-partai">Tambah Partai</a></li>
                            <li class="nav-item navtop <?= $menu['user']; ?>"><a class="nav-link" href="<?= $base_url; ?>?r=user">Admin</a></li>
                        <?php
                        } else if ($_SESSION['role'] == "Relawan") {
                        ?>
                            <li class="nav-item navtop <?= $menu['relawan']; ?>"><a class="nav-link" href="<?= $base_url; ?>?r=pendukung">Data Relawan</a></li>
                            <li class="nav-item navtop <?= $menu['tambah-relawan']; ?>"><a class="nav-link" href="<?= $base_url; ?>?r=tambah-pendukung">Tambah Relawan</a></li>
                            <li class="nav-item navtop <?= $menu['wilayah']; ?>"><a class="nav-link" href="<?= $base_url; ?>?r=infografis">Wilayah</a></li>
                            <li class="nav-item navtop <?= $menu['user']; ?>"><a class="nav-link" href="<?= $base_url; ?>?r=user">Admin</a></li>
                        <?php
                        }
                        ?>
                        <!-- <li class="nav-item navtop <?= $menu['home']; ?>"><a class="nav-link text-danger" href="app/login/logout.php">Logout (<?php echo $_SESSION['role']; ?>)</a></li> -->
                        <li class="nav-item navtop menu-active">
                            <a class="btn text-danger" href="app/login/logout.php" onclick="return confirm('Yakin ingin logout?')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                </svg>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- <a href="app/login/logout.php" class="btn btn-outline-danger float-end">
                    Logout
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                    </svg>
                </a> -->
            </div>
        </nav>

        <!-- Bottom Navbar -->
        <nav class="navbar navbar-white bg-white navbar-expand fixed-bottom d-md-none d-lg-none d-xl-none">
            <ul class="navbar-nav nav-justified w-100">
                <li class="nav-item">
                    <a href="<?= $base_url; ?>?r=home" class="nav-link">
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                        </svg>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url; ?>?r=pendukung" class="nav-link">
                        <i class="bi bi-menu-up" style="font-weight: bolder;font-size:22px;"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url; ?>?r=tambah-pendukung" class="nav-link">

                        <i class="bi bi-person-add" style="font-weight: bolder;font-size:22px;"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url; ?>?r=partai" class="nav-link">
                        <i class="bi bi-menu-up" style="font-weight: bolder;font-size:22px;"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url; ?>?r=tambah-partai" class="nav-link">

                        <i class="bi bi-person-add" style="font-weight: bolder;font-size:22px;"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url; ?>?r=infografis" class="nav-link">
                        <i class="bi bi-map" style="font-weight: bolder;font-size:22px;"></i>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="<?= $base_url; ?>?r=user" class="nav-link">
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                        </svg>
                    </a>
                </li> -->
            </ul>
        </nav>

    </div>

    <div style="width:100%;display:inline-block;margin-top:-300px;background: #633bb8;">
        <img src="assets/img/shape.png" style="float:right;width:400px;opacity:0.3;">
    </div>