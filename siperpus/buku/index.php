<?php

session_start();

if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
    header("location: http://localhost/siperpus/index.php"); // Kita Redirect ke halaman index.php karena belum login
  }
  

include 'koneksi.php';

$query = "SELECT * FROM buku";

$buku = mysqli_query($connect, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku</title>

    <link rel="stylesheet" href="http://localhost/siperpus/aset/boosttrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/siperpus/aset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="http://localhost/siperpus/aset/stylehead.css">
    <link rel="stylesheet" href="http://localhost/siperpus/buku/stylebuku.css">
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


    <div class="container">
        <div class="row mt-4">
            <div class="col-md">
                <div class="card-table">
                    <div class="card-header">
                        <table width="1200px">
                            <tr>
                                <td>
                                    <h2 class="card-title"> <i class="fas fa-edit"></i> Data Buku</h2>
                                </td>
                                <td>
                                    <a href="tambahbuku.php">
                                        <h2 type="button" class="card-icon"><i  class="fas fa-plus "></i></h2>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped table-active">
                                <thead>
                                    <tr>
                                        <th scope="col" width="50px" height="30px">No</th>
                                        <th scope="col" width="450px" height="30px">Judul</th>
                                        <th scope="col" width="250px" height="30px">Pengarang</th>
                                        <th scope="col" width="50px" height="30px">Stok</th>
                                        <th scope="col" width="300px" height="30px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php while ($out = mysqli_fetch_assoc($buku)) : ?>

                                        <tr style="text-align: center">
                                            <td><b><?php echo $i ?></b></td>
                                            <td><?php echo $out["judul"] ?></td>
                                            <td><?php echo $out["pengarang"] ?></td>
                                            <td><?php echo $out["stok"] ?></td>
                                            <td>
                                            <a href="detailbuku.php?id_buku=<?php echo $out['id_buku']?>"class="btn btn-success btn-sm">Detail</a>
                                            <a href="editbuku.php?id_buku=<?php echo $out['id_buku']?>"class="btn btn-warning btn-sm">Edit</a>
                                            <a href="hapusbuku.php?id_buku=<?php echo $out['id_buku']?>" type="button" class="btn btn-danger btn-sm">Hapus</a>
                                            </td>
                                        </tr>

                                        <?php $i++ ?>
                                    <?php endwhile; ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="http://localhost/siperpus/aset/jquery.js"></script>
    <script src="http://localhost/siperpus/aset/js/boostrap.min.js"></script>

</body>

</html>