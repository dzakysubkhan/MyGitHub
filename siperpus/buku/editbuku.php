<?php

session_start();

if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
    header("location: http://localhost/siperpus/index.php"); // Kita Redirect ke halaman index.php karena belum login
  }
  


include 'koneksi.php';

$id_buku = $_GET["id_buku"];

$query = mysqli_query($connect, "SELECT * FROM buku where id_buku= $id_buku");

$buku = mysqli_fetch_assoc($query);


$id = $buku["id_kategori"];

$querykat = mysqli_query($connect, "SELECT kategori FROM kategori WHERE id_kategori = $id");

$kat = mysqli_fetch_assoc($querykat);

if (isset($_POST["simpan"])) {
    $judul      = $_POST['judul'];
    $penerbit   = $_POST['penerbit'];
    $pengarang  = $_POST['pengarang'];
    $ringkasan  = $_POST['ringkasan'];
    $cover      = $_POST['cover'];
    $stok       = $_POST['stok'];
    $id_kategori = $_POST['id_kategori'];

    $qu = ("UPDATE buku SET judul = '$judul', penerbit = '$penerbit' , pengarang = '$pengarang' , ringkasan = '$ringkasan' , cover = '$cover' , stok = '$stok' , id_kategori = '$id_kategori' WHERE id_buku=$id_buku");

    $book =  mysqli_query($connect, $qu);
    if ($book > 0) {
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
                            <h2 style="text-align: center">Edit Data Buku</h2>
                        </div>
                        <div class="card-body">
                            <center>
                                <table class="input-table">
                                    <form action="" method="post">
                                        <tr>
                                            <td>
                                                <div class="input-group mb-3 input">
                                                    <div class="input-group-prepend isian">
                                                        <span class="input-group-text" id="inputGroup-sizing-lg">Judul Buku</span>
                                                    </div>
                                                    <input type="text" class="form-control isian" value="<?php echo $buku['judul']; ?>" name="judul" placeholder="judul" aria-label="judul" aria-describedby="basic-addon1">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="input-group mb-3 input">
                                                    <div class="input-group-prepend isian">
                                                        <span class="input-group-text" id="inputGroup-sizing-lg">Penerbit</span>
                                                    </div>
                                                    <input type="text" class="form-control isian" value="<?php echo $buku['penerbit']; ?>" name="penerbit" placeholder="penerbit" aria-label="penerbit" aria-describedby="basic-addon1">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                                <div class="input-group mb-3 input">
                                                    <div class="input-group-prepend isian">
                                                        <span class="input-group-text" id="inputGroup-sizing-lg">Pengarang</span>
                                                    </div>
                                                    <input type="text" class="form-control isian" value="<?php echo $buku['pengarang']; ?>" name="pengarang" placeholder="pengarang" aria-label="pengarang" aria-describedby="basic-addon1">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                                <div class="input-group mb-3 input">
                                                    <div class="input-group-prepend isian">
                                                        <span class="input-group-text" id="inputGroup-sizing-lg">Ringkasan</span>
                                                    </div>
                                                    <textarea class="form-control isian" value="<?php echo $buku['ringkasan']; ?>" aria-label="With textarea" name="ringkasan"><?php echo $buku['ringkasan']; ?></textarea>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                                <div class="input-group mb-3 input">
                                                    <div class="input-group-prepend isian">
                                                        <span class="input-group-text" id="inputGroup-sizing-lg">Cover</span>
                                                    </div>
                                                    <input type="file" class="form-control isian" value="<?php echo $buku['cover']; ?>" name="cover" placeholder="cover" aria-label="cover" aria-describedby="basic-addon1">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                                <div class="input-group mb-3 input">
                                                    <div class="input-group-prepend isian">
                                                        <span class="input-group-text" id="inputGroup-sizing-lg">Stok</span>
                                                    </div>
                                                    <input type="number" class="form-control isian" value="<?php echo $buku['stok']; ?>" name="stok" placeholder="stok" aria-label="stok" aria-describedby="basic-addon1">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                                <div class="input-group mb-3 input">
                                                    <div class="input-group-prepend isian">
                                                        <span class="input-group-text" id="inputGroup-sizing-lg">Kategori</span>
                                                    </div>
                                                    <select class="custom-select isian" id="inputGroupSelect01" name="id_kategori">
                                                        <option selected>Pilih Kategori</option>

                                                        <?php

                                                        $query = mysqli_query($connect, "SELECT * FROM kategori");
                                                        while ($kategori = mysqli_fetch_assoc($query)) :
                                                        ?>

                                                            <option value="<?php echo $kategori['id_kategori']; ?>"><?php echo $kategori['kategori']; ?></option>

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