<?php
include 'koneksi.php';

session_start();

if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
    header("location: http://localhost/siperpus/index.php"); // Kita Redirect ke halaman index.php karena belum login
  }
  

$id_anggota = $_GET["id_anggota"];

$query = mysqli_query($connect, "SELECT * FROM anggota where id_anggota= $id_anggota");

$anggota = mysqli_fetch_assoc($query);


$id = $anggota["id_level"];

$querylvl = mysqli_query($connect, "SELECT level FROM level WHERE id_level = $id");

$lvl = mysqli_fetch_assoc($querylvl);

if (isset($_POST["simpan"])) {
    $nama        = $_POST['nama'];
    $kelas       = $_POST['kelas'];
    $telp        = $_POST['telp'];
    $username    = $_POST['username'];
    $password    = $_POST['password'];
    $id_level    = $_POST['id_level'];

    $qu = ("UPDATE anggota SET nama = '$nama', kelas = '$kelas' , telp = '$telp' , username = '$username' , password = '$password' ,  id_level = '$id_level' WHERE id_anggota=$id_anggota");

    $member =  mysqli_query($connect, $qu);
    if ($member > 0) {
        echo
            "
             <script>
                 alert('Data Berhasil Dirubah');
                 document.location.href='index.php';
            </script>
             ";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>

    <link rel="stylesheet" href="http://localhost/siperpus/aset/boosttrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/siperpus/aset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="http://localhost/siperpus/aset/stylehead.css">
    <link rel="stylesheet" href="http://localhost/siperpus/buku/styletambah.css">

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
                    <div class="card-table">
                        <div class="card-header">
                            <h2 style="text-align: center">Edit Data Anggota</h2>
                        </div>
                        <div class="card-body">
                            <center>
                                <table class="input-table">
                                    <form action="" method="post">
                                        <tr>
                                            <td>
                                                <div class="input-group mb-3 input">
                                                    <div class="input-group-prepend isian">
                                                        <span class="input-group-text" id="inputGroup-sizing-lg">Nama</span>
                                                    </div>
                                                    <input type="text" class="form-control isian" value="<?php echo $anggota['nama']; ?>" name="nama" placeholder="nama" aria-label="nama" aria-describedby="basic-addon1">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="input-group mb-3 input">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-lg">Kelas</span>
                                                    </div>
                                                    <input type="text" class="form-control isian" value="<?php echo $anggota['kelas']; ?>" name="kelas" placeholder="kelas" aria-label="kelas" aria-describedby="basic-addon1">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                                <div class="input-group mb-3 input">
                                                    <div class="input-group-prepend isian">
                                                        <span class="input-group-text" id="inputGroup-sizing-lg">Telepon</span>
                                                    </div>
                                                    <input type="text" class="form-control isian" value="<?php echo $anggota['telp']; ?>" name="telp" placeholder="telp" aria-label="telp" aria-describedby="basic-addon1">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                                <div class="input-group mb-3 input">
                                                    <div class="input-group-prepend isian">
                                                        <span class="input-group-text" id="inputGroup-sizing-lg">Username</span>
                                                    </div>
                                                    <input type="text" class="form-control isian" value="<?php echo $anggota['username']; ?>" name="username" placeholder="username" aria-label="username" aria-describedby="basic-addon1">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                                <div class="input-group mb-3 input">
                                                    <div class="input-group-prepend isian">
                                                        <span class="input-group-text" id="inputGroup-sizing-lg">Password</span>
                                                    </div>
                                                    <input type="password" class="form-control isian" value="<?php echo $anggota['password']; ?>" name="password" placeholder="password" aria-label="password" aria-describedby="basic-addon1">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                                <div class="input-group mb-3 input">
                                                    <div class="input-group-prepend isian">
                                                        <span class="input-group-text" id="inputGroup-sizing-lg">ID Level</span>
                                                    </div>
                                                    <select class="custom-select isian" id="inputGroupSelect01" name="id_level">
                                                        <option selected>Pilih Level</option>

                                                        <?php

                                                        $query = mysqli_query($connect, "SELECT * FROM level");
                                                        while ($level = mysqli_fetch_assoc($query)) :
                                                        ?>

                                                            <option value="<?php echo $level['id_level']; ?>"><?php echo $level['level']; ?></option>

                                                        <?php
                                                        endwhile;
                                                        ?>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button type="submit" name="simpan" class="btn btn-primary btn-lg">Simpan Perubahan</button>
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