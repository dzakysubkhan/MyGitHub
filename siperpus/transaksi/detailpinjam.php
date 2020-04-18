<?php
include 'koneksi.php';
include 'fungsi-transaksi.php';

session_start();

if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
    header("location: http://localhost/siperpus/index.php"); // Kita Redirect ke halaman index.php karena belum login
  }
  
$id_pinjam = $_GET['id_pinjam'];

$sql = "SELECT * FROM peminjaman p INNER JOIN detail_pinjam dp ON p.id_pinjam=dp.id_pinjam INNER JOIN buku b ON b.id_buku=dp.id_buku where p.id_pinjam='$id_pinjam'";
$res = mysqli_query($connect, $sql);
$detail = mysqli_fetch_assoc($res);
$tgl_kembali = $detail["tgl_kembali"];

if ($tgl_kembali == null) {
    $tgl_kembali = date("Y-m-d");
    $denda = hitungDenda($connect, $id_pinjam, $tgl_kembali);
} else {
    $denda = hitungDenda($connect, $id_pinjam, $tgl_kembali);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="http://localhost/siperpus/aset/boosttrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/siperpus/aset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="http://localhost/siperpus/aset/stylehead.css">
    <link rel="stylesheet" href="http://localhost/siperpus/transaksi/styledetail.css">


    <title>Detail Buku</title>
</head>

<body>

    <header>
        <div class="container-fluid">
            <nav>
                <div class="nav-brand">
                    <p style="color:white"><img class="icon-brand" src="http://localhost/siperpus/aset/pict/icon-home2.png" alt="">Hai, <?php echo $_SESSION['nama'] ?></p>
                </div>

                <div class="menu-icons open">
                    <i class="icon ion-md-menu"></i>
                </div>

                <ul class="nav-list">
                    <div class="menu-icons close">
                        <i class="icon ion-md-close"></i>
                    </div>
                    <li class="nav-item">
                        <a href="http://localhost/siperpus/dashboard/index.php" class="nav-link"><b>Dashboard</b> </a>
                    </li>
                    <li class="nav-item">
                        <a href="http://localhost/siperpus/buku/index.php" class="nav-link "><b> Buku</b></a>
                    </li>
                    <li class="nav-item">
                        <a href="http://localhost/siperpus/anggota/index.php" class="nav-link "><b>Anggota</b></a>
                    </li>
                    <li class="nav-item">
                        <a href="http://localhost/siperpus/transaksi/index.php" class="nav-link current"><b>Peminjam</b></a>
                    </li>
                    <li class="nav-item ">
                        <a href="http://localhost/siperpus/logout.php">
                            <div class="nav-link logout-icon "></div>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link">Home</a>
                    </li> -->
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="row mt-4">
            <div class="col-md">
                <div class="card" style="width: 1100px; height:500px">
                    <div class="card-header kepala">
                        <h3>Detail Peminjaman Buku <?= $detail['judul'] ?></h3>
                    </div>
                    <div class="card-body">

                        <table>
                            <tr>
                                <td rowspan="8" colspan="5" >
                                    <img src="../dashboard/aset/book/<?= $detail['cover']?>" alt="" width="250px" class="book" >
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4><b>Judul </b> </h4>
                                    <h4><?= $detail['judul'] ?></h4>
                                    </br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4><b>Tanggal Pinjam </b> </h4>
                                    <h4><?= date('d F Y', strtotime($detail['tgl_pinjam'])) ?></h4>
                                    </br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4><b>Tanggal Jatuh Tempo</b> </h4>
                                    <h4><?= date('d F Y', strtotime($detail['tgl_jatuh_tempo'])) ?></h4>
                                    </br>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h4><b>Tanggal Kembali</b> </h4>
                                    <h4>
                                    <?php
                                        if ($detail['tgl_kembali'] == 00000) {
                                            echo '-';
                                        } else {
                                            echo date('d F Y', strtotime($detail['tgl_kembali']));
                                        }
                                        ?>
                                    </h4>
                                    </br>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h4><b>Status</b> </h4>
                                    <h4><span class="badge badge-info"><?= $detail['status'] ?></span></h4>
                                    </br>
                                </td>
                            </tr>

                            <?php
                            if ($denda > 0) {
                            ?>
                                <tr>
                                    <td class="table-danger" colspan="2">
                                        <h4>Denda</h4>
                                        <h4>Rp<?= $denda ?></h4>
                                        </br>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                            <tr>
                                <td class="text-rigth" colspan="2">
                                    <a href="index.php" class="btn btn-success"><i class="fas fa-angle-double-left"></i>Kembali</a>
                                    <a class="btn btn-primary
                                    <?php if ($detail['tgl_kembali'] != 00000) {
                                        echo "disabled";
                                    } ?>" href="form-kembali.php?id_pinjam=<?= $detail['id_pinjam'] ?>&id_buku=<?= $detail['id_buku'] ?>" role="button">Kembalikan Buku</a>
                                </td>
                            </tr>

                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>


</html>