<?php
include 'koneksi.php';

session_start();

if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
    header("location: http://localhost/siperpus/index.php"); // Kita Redirect ke halaman index.php karena belum login
  }
  

$sql = "SELECT * FROM peminjaman INNER JOIN anggota ON peminjaman.id_anggota=anggota.id_anggota INNER JOIN detail_pinjam dp USING(id_pinjam) INNER JOIN petugas ON peminjaman.id_petugas=petugas.id_petugas ORDER BY peminjaman.tgl_pinjam";

$res = mysqli_query($connect, $sql);

$pinjam = array();

while ($data = mysqli_fetch_assoc($res)) {
    $pinjam[] = $data;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjam</title>

    <link rel="stylesheet" href="http://localhost/siperpus/aset/boosttrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/siperpus/aset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="http://localhost/siperpus/aset/stylehead.css">
    <link rel="stylesheet" href="http://localhost/siperpus/transaksi/styletransaksi.css">
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
                        <a href="http://localhost/siperpus/buku/index.php" class="nav-link"><b> Buku</b></a>
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
                        <table width="1200px">
                            <tr>
                                <td>
                                    <h2 class="card-title"> <i class="fas fa-edit"></i> Data Peminjaman</h2>
                                </td>
                                <td>
                                    <a href="tambahpinjam.php">
                                        <h2 type="button" class="card-icon"><i class="fas fa-plus "></i></h2>
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
                                        <th scope="col" width="250px" height="30px">Nama Peminjam</th>
                                        <th scope="col" width="150px" height="30px">Tanggal Pinjam</th>
                                        <th scope="col" width="150px" height="30px">Tanggal Jatuh Tempo</th>
                                        <th scope="col" width="150px" height="30px">Petugas</th>
                                        <th scope="col" width="150px" height="30px">Status</th>
                                        <th scope="col" width="200px" height="30px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pinjam as $p) { ?>
                                            <tr>
                                                <th scope="row"><?= $no ?></th>
                                                <td class="re"><?= $p['nama'] ?></td>
                                                <td class="re"><?= date('d F Y', strtotime($p['tgl_pinjam'])) ?></td>
                                                <td class="re"><?= date('d F Y', strtotime($p['tgl_jatuh_tempo'])) ?></td>
                                                <td class="re"><?= $p['nama_petugas'] ?></td>
                                                <td class="re">
                                                    <?php
                                                    if ($p['status'] == "dipinjam") {
                                                        echo '<h5><span class="badge badge-info">Dipinjam</span></h5>';
                                                    } else {
                                                        echo '<h5><span class="badge badge-info">Kembali</span></h5>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="re">
                                                    <a href="detailpinjam.php?id_pinjam=<?php echo $p['id_pinjam'] ?>" class="btn btn-success btn-sm">Detail</a>
                                                    <a href="editpinjam.php?id_pinjam=<?php echo $p['id_pinjam'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="hapuspinjam.php?id_pinjam=<?php echo $p['id_pinjam'] ?>" type="button" class="btn btn-danger btn-sm">Hapus</a>
                                                </td>
                                            </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
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