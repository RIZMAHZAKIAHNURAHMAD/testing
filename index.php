<?php
session_start();
if (isset($_SESSION['role'])) {

  $menu = [];
  $menu['home'] = '';
  $menu['relawan'] = '';
  $menu['tambah-relawan'] = '';
  $menu['wilayah'] = '';
  $menu['user'] = '';

  include 'layout/header.php';

  // print_r($menu);
  if (isset($_GET['r'])) {
    switch ($_GET['r']) {
      case 'home':
        $menu['home'] = 'menu-active';
        include 'app/home.php';
        break;

      case 'pendukung':
        $menu['relawan'] = 'menu-active';
        include 'app/pendukung/index.php';
        break;

      case 'pendukung2':
        include 'app/pendukung/index2.php';
        break;

      case 'tambah-pendukung':
        $menu['relawan'] = 'menu-active';
        include 'app/pendukung/create.php';
        break;

      case 'detail-pendukung':
        include 'app/pendukung/detail.php';
        break;

      case 'pendukung-edit':
        include 'app/pendukung/update.php';
        break;
      case 'infografis':
        $menu['wilayah'] = 'menu-active';
        // include 'app/infografis/index.php';
        include 'app/infografis/detailKab.php';
        break;
      case 'kab':
        include 'app/infografis/kab.php';
        break;
      case 'kec':
        include 'app/infografis/kec.php';
        break;
      case 'desa':
        include 'app/infografis/desa.php';
        break;
      case 'wilayah-koor':
        include 'app/infografis/koor.php';
        break;
      case 'infografis-kab':
        include 'app/infografis/detailKab.php';
        break;
      case 'infografis-kec':
        include 'app/infografis/detailKec.php';
        break;
      case 'infografis-tps':
        include 'app/infografis/tps.php';
        break;

      case 'tps-tambah':
        include 'app/infografis/tpsCreate.php';
        break;

      case 'tps-update':
        include 'app/infografis/tpsUpdate.php';
        break;

      case 'tps-detail':
        include 'app/infografis/tpsDetail.php';
        break;

      case 'user':
        include 'app/user/index.php';
        break;

      case 'user-edit':
        include 'app/user/update.php';
        break;

      case 'add-user':
        include 'app/user/create.php';
        break;

      default:
        include 'app/home.php';
        break;
    }
  } else {
    include 'app/home.php';
  }
?>

<?php include 'layout/footer.php';
} else {
  header("Location: app/login/index.php");
}
?>