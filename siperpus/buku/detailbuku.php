<?php

session_start();

if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
    header("location: http://localhost/siperpus/index.php"); // Kita Redirect ke halaman index.php karena belum login
  }
  


include 'koneksi.php';

$id_buku = $_GET["id_buku"];

$query = mysqli_query($connect, "SELECT * FROM buku where id_buku= $id_buku");

$sql =  mysqli_query($connect, "SELECT kategori FROM kategori k INNER JOIN buku b ON k.id_kategori=b.id_kategori and b.id_buku='$id_buku'");

$buku = mysqli_fetch_assoc($query);

$kategori = mysqli_fetch_assoc($sql)
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="http://localhost/siperpus/aset/boosttrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/siperpus/aset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="http://localhost/siperpus/aset/stylehead.css">
    <link rel="stylesheet" href="http://localhost/siperpus/buku/styledetail.css">


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
                        <a href="http://localhost/siperpus/buku/index.php" class="nav-link current"><b> Buku</b></a>
                    </li>
                    <li class="nav-item">
                        <a href="http://localhost/siperpus/anggota/index.php" class="nav-link "><b>Anggota</b></a>
                    </li>
                    <li class="nav-item">
                        <a href="http://localhost/siperpus/transaksi/index.php" class="nav-link"><b>Peminjam</b></a>
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
                <div class="card" style="width: 1100px; height:800px">
                    <div class="card-header kepala">
                        <h3>Detail Buku <?= $buku['judul'] ?></h3>
                    </div>
                    <div class="card-body">

                        <section>
                            <div class="grid">
                                <div class="isi">
                                    <table>
                                        <tr>
                                            <td rowspan="5" colspan="8">
                                                <img src="../dashboard/aset/book/<?= $buku['cover']?>" alt="" width="250px" class="book">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="detail-buku">
                                                <h4><b>Judul Buku </b> </h4>
                                                <h4><?= $buku['judul'] ?></h4>
                                                </br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="detail-buku">
                                                <h4><b>Penerbit </b> </h4>
                                                <h4><?= $buku['penerbit'] ?></h4>
                                                </br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="detail-buku">
                                                <h4><b>Pengarang </b> </h4>
                                                <h4><?= $buku['pengarang'] ?></h4>
                                                </br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="detail-buku">
                                                <h4><b>Kategori</b> </h4>
                                                <h4><?= $kategori['kategori'] ?></h4>
                                                </br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="600px" colspan="10" rowspan="10">
                                                <div class="tabel-ringkasan">
                                                    <h4><b>Ringkasan</b> </h4>
                                                    </br>
                                                    <h4 class="ringkasan"><?= $buku['ringkasan'] ?></h4>
                                                </div>
                                            </td>
                                        </tr>


                                    </table>
                                    </br>
                                    </br>
                                    </br>
                                </div>


                                <div class="ruang-netijen">
                                    <div class="like">
                                        <table>
                                            <tr>
                                                <td>
                                                    <i class="fas fa-heart"></i>
                                                </td>
                                            </tr>
                                            <tr class="angka">
                                                <td>
                                                    <h5>0</h5>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="komentar">
                                        <div class="content-comment">
                                            <div class="z ">
                                                <h3 class="head">Komentar Netijen</h3>
                                            </div>
                                            <div class="z isi-komen">
                                                <div class="text-komen">
                                                    <h5>Mantap Gan</h5>
                                                    <h6>Rating : 9.0</h6>
                                                </div>
                                            </div>

                                            <div class="z isi-komen">
                                                <div class="text-komen">
                                                    <h5>Mayan Lah</h5>
                                                    <h6>Rating : 7.0</h6>
                                                </div>
                                            </div>

                                            <div class="z isi-komen">
                                                <div class="text-komen">
                                                    <h5>Nangis oy bacanya T_T</h5>
                                                    <h6>Rating : 9.5</h6>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>


</html>