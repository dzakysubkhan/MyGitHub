<?php

include 'koneksi.php';

session_start();

if (!isset($_SESSION['username'])) { // Jika tidak ada session username berarti dia belum login
    header("location: http://localhost/siperpus/index.php"); // Kita Redirect ke halaman index.php karena belum login
}


$query_buku = mysqli_query($connect, "SELECT COUNT(*) AS jumlah from buku");
$query_anggota = mysqli_query($connect, "SELECT COUNT(*) AS jumlah from anggota");
$query_pinjam = mysqli_query($connect, "SELECT COUNT(*) AS jumlah from peminjaman");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="http://localhost/siperpus/aset/boosttrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/siperpus/aset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="http://localhost/siperpus/aset/stylehead.css">
    <link rel="stylesheet" href="http://localhost/siperpus/dashboard/styledashboard.css">

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
                        <a href="http://localhost/siperpus/dashboard/index.php" class="nav-link current"><b>Dashboard</b> </a>
                    </li>
                    <li class="nav-item">
                        <a href="http://localhost/siperpus/buku/index.php" class="nav-link"><b> Buku</b></a>
                    </li>
                    <li class="nav-item">
                        <a href="http://localhost/siperpus/anggota/index.php" class="nav-link"><b>Anggota</b></a>
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


    <main>
        <section class="hero">
            <div class="container">
                <div class="row mt-4">
                    <div class="col-md">
                        <h2><i class="fas fa-chart-line mr-2"></i>Dashboard</h2>
                        <hr class="bg-light">
                    </div>
                </div>
                </br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card bg-danger">
                            <div class="card-body text-white">
                                <h5 class="card-title"><b>Jumlah Buku</b></h5>
                                <?php while ($buku = mysqli_fetch_array($query_buku)) : ?>
                                    <p class="card-text" style="font-size:60px"><?= $buku['jumlah'] ?></p>
                                <?php endwhile; ?>
                                <a href="http://localhost/siperpus/buku/index.php" class="text-white caption">Lebih detail <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-4">
                        <div class="card bg-warning">
                            <div class="card-body text-white ">
                                <h5 class="card-title"><b> Jumlah Anggota</b></h5>
                                <?php while ($anggota = mysqli_fetch_array($query_anggota)) : ?>
                                    <p class="card-text" style="font-size:60px"><?= $anggota['jumlah'] ?></p>
                                <?php endwhile; ?>
                                <a href="http://localhost/siperpus/anggota/index.php" class="text-white caption">Lebih detail <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card bg-info">
                            <div class="card-body text-white">
                                <h5 class="card-title"><b>Jumlah Transaksi</b></h5>
                                <?php while ($peminjaman = mysqli_fetch_array($query_pinjam)) : ?>
                                    <p class="card-text" style="font-size:60px"><?= $peminjaman['jumlah'] ?></p>
                                <?php endwhile; ?>
                                <a href="http://localhost/siperpus/transaksi/index.php" class="text-white caption">Lebih detail <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Welcome</h4>
                            </div>
                            <div class="modal-body">
                                <p><img src="http://mampirlah.com/logo.png"></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                </br>
                </br>
                </br>
            </div>

        </section>


        <section class="book">
            <div class="container">
                <div class="books">
                    <div class="tabel-isi">
                        <div class="filosofi">
                            <table>
                                <tr>
                                    <td width="100px">
                                        <img src="aset/book/senja.png" alt="" class="book-cover">

                                    </td>
                                    <td>
                                        <div class="isi-buku">
                                            <h4>Kelahiranku adalah ketika sang mentari akan meninggalkan peraduannya. Sore hari menjelang malam, karena itulah aku dinamakan Senja. Ini hanya sebuah kebetulan saja! Atau memang maksud Tuhan atas kehidupanku lewat alam! Entahlah, aku hanya bisa mensyukuri kehadiranku ini yang disambut dengan pergantian waktu. </h4>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="recent-book">
                            <div class="content-book">
                                <div class="z buku-tersedia">
                                    <h3>Buku Tersedia</h3>
                                    <hr width="305px" size="1" noshade>
                                    <table>
                                        <tr>
                                            <?php
                                            $query = "SELECT cover FROM buku";

                                            $buku = mysqli_query($connect, $query);

                                            $i = 1;

                                            ?>
                                            <?php while ($out = mysqli_fetch_assoc($buku)) : ?>
                                                <td><img src="aset/book/<?= $out["cover"]; ?>" alt="" class="cover-book-content"></td>
                                                <?php $i++ ?>
                                            <?php endwhile; ?>
                                        </tr>
                                    </table>

                                </div>
                                <div class="z disukai">
                                    <h3>Paling Banyak Disukai</h3>
                                    <hr width="305px" size="1" noshade>
                                    <table>
                                        <tr>
                                            <td><img src="aset/book/negeri5menara.png" alt="" class="cover-book-content"></td>
                                            <td><img src="aset/book/mariposa.png" alt="" class="cover-book-content"></td>
                                            <td><img src="aset/book/senja.png" alt="" class="cover-book-content"></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="z sering-dipinjam">
                                    <h3>Paling Sering Dipinjam</h3>
                                    <hr width="305px" size="1" noshade>
                                    <table>
                                        <tr>
                                            <td><img src="aset/book/senja.png" alt="" class="cover-book-content"></td>
                                            <td><img src="aset/book/negeri5menara.png" alt="" class="cover-book-content"></td>
                                            <td><img src="aset/book/mariposa.png" alt="" class="cover-book-content"></td>
                                        </tr>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="footer">
            <div class="container">
                <div class="footers">
                    <div class="content-footer">
                        <table class="the-footer">
                            <tr width="1120px" class="head-footer">
                                <td class="find">
                                    <h3><b>VISIT OUR LIBRARY</b></h3>
                                </td>
                                <td class="best">
                                    <h3><b>BEST OF THE YEAR</b></h3>
                                </td>
                                <td class="testimoni">
                                    <h3><b>OUR TESTIMONIALS</b></h3>
                                </td>
                            </tr>
                            <tr class="body-footer">
                                <td width="360px" class="find">
                                    <div class="map">
                                        <h5>Jl. RA Kartini No.11, Kampungdalem, Kec. Tulungagung,</h5>
                                        <h5> Kabupaten Tulungagung, Jawa Timur 66212</h5>
                                        <div>
                                            <div>
                                                <iframe class="map-content" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.365016872952!2d111.89900301432948!3d-8.06419988281411!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78e2e085f6be4b%3A0x2584f6046c125550!2sPerpustakaan%20Tulungagung!5e0!3m2!1sid!2sid!4v1587188829476!5m2!1sid!2sid" width="350px" height="100px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                    </br>
                                </td>
                                <td width="380px" class="best">
                                    <center>
                                        <table>
                                            <tr>
                                                <td>
                                                    <img src="aset/book/mariposa.png" alt="">
                                                </td>
                                                <td>
                                                    <img src="aset/book/senja.png" alt="">
                                                </td>
                                                <td>
                                                    <img src="aset/book/negeri5menara.png" alt="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="nama-buku">Mariposa</td>
                                                <td class="nama-buku">Senja</td>
                                                <td class="nama-buku">Negeri 5 Menara</td>
                                            </tr>
                                            </br>
                                        </table>
                                    </center>
                                </td>
                                <td width="360px" class="testimoni">

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
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: center">
                                    </br>
                                    </br>
                                    </br>
                                    </br>
                                    </br>
                                    <div class="media-icon">
                                        <i class="far fa-map"></i>
                                        <i class="fab fa-instagram"></i>
                                        <i class="fab fa-whatsapp"></i>
                                    </div>
                                    </br>
                                    <h5>&copy; 2020, All Right Reserved</h5>
                                </td>
                        </table>

                    </div>
                </div>
            </div>
        </section>

    </main>

    <script>
        $('#myModal').modal({
            show: true
        });
    </script>

    <script src="http://localhost/siperpus/aset/jquery.js"></script>
    <script src="http://localhost/siperpus/aset/js/boostrap.min.js"></script>


</body>

</html>