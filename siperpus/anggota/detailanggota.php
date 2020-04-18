<?php
include 'koneksi.php';

session_start();

if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
    header("location: http://localhost/siperpus/index.php"); // Kita Redirect ke halaman index.php karena belum login
  }
  

$id_anggota = $_GET["id_anggota"];

$query = mysqli_query($connect, "SELECT * FROM anggota where id_anggota= $id_anggota");

$sql =  mysqli_query($connect, "SELECT level FROM level l INNER JOIN anggota a ON l.id_level=a.id_level and a.id_anggota='$id_anggota'");

$anggota = mysqli_fetch_assoc($query);

$level = mysqli_fetch_assoc($sql)
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="http://localhost/siperpus/aset/boosttrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/siperpus/aset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="http://localhost/siperpus/aset/stylehead.css">
    <link rel="stylesheet" href="http://localhost/siperpus/anggota/styledetail.css">


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
                        <a href="http://localhost/siperpus/anggota/index.php" class="nav-link current"><b>Anggota</b></a>
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
                <div class="card" style="width: 1100px; height:500px">
                    <div class="card-header kepala">
                        <h3>Detail <?= $anggota['nama'] ?></h3>
                    </div>
                    <div class="card-body">

                        <table>
                            <tr>
                                <td rowspan="8" colspan="5">
                                    <img src="profil-default.png" alt="" width="430px">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4><b>Nama Lengkap </b> </h4>
                                    <h4><?= $anggota['nama'] ?></h4>
                                    </br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4><b>Kelas </b> </h4>
                                    <h4><?= $anggota['kelas'] ?></h4>
                                    </br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4><b>Telepon </b> </h4>
                                    <h4><?= $anggota['telp'] ?></h4>
                                    </br>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <hr width="300px" size="1" noshade>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4><b>Username </b> </h4>
                                    <a class="btn btn-primary disabled" style="color: white">
                                        <?= $anggota['username'] ?>
                                    </a>
                                    </br>
                                </td>
                                <td>
                                    <h4><b>Password </b> </h4>
                                    <a class="btn btn-primary disabled" style="color: white">
                                        <?= $anggota['password'] ?>
                                        </br>


                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <hr width="300px" size="1" noshade>
                                </td>
                            </tr>
                            <tr>

                                <td>
                                    </br>
                                    <h4><b>Level</b> </h4>
                                    <button type="button" class="btn btn-outline-secondary disabled">
                                        <h4><?= $level['level'] ?></h4>
                                    </button>
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