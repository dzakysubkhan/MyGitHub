<?php
include 'koneksi.php';
include 'fungsi-transaksi.php';

session_start();

if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
    header("location: http://localhost/siperpus/index.php"); // Kita Redirect ke halaman index.php karena belum login
  }
  

$buku         = ambilBuku($connect);
$anggota     = ambilAnggota($connect);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjaman</title>

    <link rel="stylesheet" href="http://localhost/siperpus/aset/boosttrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/siperpus/aset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="http://localhost/siperpus/aset/stylehead.css">
    <link rel="stylesheet" href="http://localhost/siperpus/buku/styletambah.css">

</head>

<body>

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
                            <a href="http://localhost/siperpus/anggota/index.php" class="nav-link"><b>Anggota</b></a>
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
                    <div class="card-table">
                        <div class="card-header">
                            <h2 style="text-align: center">Tambah Data Peminjaman</h2>
                        </div>
                        <div class="card-body">
                            <center>
                                <table class="input-table">
                                    <form action="tambahproses.php" method="post">
                                        <tr>
                                            <td>
                                                <div class="input-group mb-3 input">
                                                    <div class="input-group-prepend isian">
                                                        <span class="input-group-text" id="inputGroup-sizing-lg">Nama</span>
                                                    </div>
                                                    <select class="custom-select isian" id="inputGroupSelect01" name="id_anggota">
                                                        <option selected>Pilih Nama</option>
                                                        <?php
                                                        foreach ($anggota as $a) { ?>
                                                            <option value="<?= $a['id_anggota'] ?>"><?= $a['nama'] ?></option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="input-group mb-3 input">
                                                    <div class="input-group-prepend isian">
                                                        <span class="input-group-text" id="inputGroup-sizing-lg">Judul Buku</span>
                                                    </div>
                                                    <select class="custom-select isian" id="inputGroupSelect01" name="id_buku">
                                                        <option selected>Pilih Buku</option>
                                                        <?php
                                                        foreach ($buku as $b) { ?>
                                                            <option value="<?= $b['id_buku'] ?>"><?= $b['judul'] ?></option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                                <div class="input-group mb-3 input">
                                                    <div class="input-group-prepend isian">
                                                        <span class="input-group-text" id="inputGroup-sizing-lg">Tanggal Pinjam</span>
                                                    </div>
                                                    <input type="date" class="form-control isian" name="tgl_pinjam" placeholder="date" aria-label="date" aria-describedby="basic-addon1">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="submit" name="simpan" class="btn btn-primary btn-lg">Tambah</button>
                                            </td>
                                        </tr>


                                    </form>
                                </table>
                            </center>

                        </div>

                    </div>

                </div>
            </div>
        </div>


        <script src="http://localhost/siperpus/aset/jquery.js"></script>
        <script src="http://localhost/siperpus/aset/js/boostrap.min.js"></script>
    </body>

</html>