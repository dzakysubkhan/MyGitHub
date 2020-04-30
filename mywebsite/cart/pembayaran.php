<?php
session_start();

if (!isset($_SESSION['username'])) { // Jika tidak ada session username berarti dia belum login
    header("location: http://localhost/mywebsite/index.php"); // Kita Redirect ke halaman index.php karena belum login
}

include 'koneksi.php';

$user = $_SESSION['id_user'];


$notif = mysqli_query($connect, "SELECT COUNT(*) AS jumlah from cart  WHERE id_user = '$user'");

$barang = "SELECT * FROM pembelian p INNER JOIN item i ON p.id_item=i.id_item INNER JOIN tshirt t ON t.id_tshirt= i.item INNER JOIN warna w ON w.id_warna = p.id_warna INNER JOIN ukuran u ON u.id_ukuran = p.id_ukuran WHERE p.id_user = '$user'  ";
$item = mysqli_query($connect, $barang);

$t = "SELECT SUM(total_harga) AS total_harga FROM pembelian WHERE id_user = $user";
$qq = mysqli_query($connect, $t);
$total = mysqli_fetch_assoc($qq);

$kondisi = "SELECT * FROM kondisi";
$k = mysqli_query($connect, $kondisi);
$o = mysqli_fetch_assoc($k);

$profil = "SELECT * FROM user WHERE id_user = '$user'";
$orang = mysqli_query($connect, $profil);

$out2 = mysqli_fetch_assoc($orang);

date_default_timezone_set('Asia/Jakarta');




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="http://localhost/mywebsite/home/aset/boosttrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/mywebsite/home/aset/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="http://localhost/mywebsite/cart/stylepembayaran.css">
    <link rel="stylesheet" href="http://localhost/mywebsite/stylehead.css">
    <link rel="stylesheet" href="http://localhost/mywebsite/stylefooter.css">

    <script src="https://kit.fontawesome.com/a81368814c.js"></script>
</head>

<body>

    <header>
        <div id="navbar">
            <div class="container-fluid">
                <nav>
                    <div class="nav-list">
                        <div class="nav-brand">
                            <p><img class="icon-brand" src="http://localhost/mywebsite/aset/img/logo3.png" alt=""></p>
                        </div>
                        <div class="menu-icons close">
                            <i class="icon ion-md-close"></i>
                        </div>
                        <li class="nav-item">
                            <a href="http://localhost/mywebsite/home/home.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/mywebsite/shop/index.php" class="nav-link">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/mywebsite/resi/index.php" class="nav-link">Cek Resi</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/mywebsite/help/index.php" class="nav-link">Help Center</a>
                        </li>
                    </div>

                    <ul>
                        <div class="nav-list">
                            <div class="menu-icon menu-button">
                                <li class="nav-item">
                                    <a href="">
                                        <img class="icon i1" src="http://localhost/mywebsite/home/aset/icon/search.png" alt="">
                                    </a>
                                    <a href="http://localhost/mywebsite/wishlist/wishlist.php">
                                        <img class="icon i2" src="http://localhost/mywebsite/home/aset/icon/like.png" alt="">
                                    </a>
                                    <a href="" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img class="icon i3" src="http://localhost/mywebsite/home/aset/icon/user.png" alt="">
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="http://localhost/mywebsite/profil/profil.php">Profil</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="http://localhost/mywebsite/logout.php">Logout</a>
                                        </div>
                                    </a>
                                    <?php while ($n = mysqli_fetch_array($notif)) : ?>
                                        <a href="http://localhost/mywebsite/cart/cart.php" class="badge-notif" data-badge="<?= $n['jumlah'] ?>">
                                            <img class="icon i4" src="http://localhost/mywebsite/home/aset/icon/supermarket.png" alt="">
                                        </a>
                                </li>
                            </div>
                        </div>
                    </ul>
                </nav>
            </div>
        </div>
        <div id="navbar2">
            <div class="container-fluid">
                <nav>
                    <div class="nav-list">
                        <div class="nav-brand">
                            <p><img class="icon-brand" src="http://localhost/mywebsite/aset/img/logo3.png" alt=""></p>
                        </div>
                        <div class="menu-icons close">
                            <i class="icon ion-md-close"></i>
                        </div>
                        <li class="nav-item">
                            <a href="http://localhost/mywebsite/home/home.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/mywebsite/shop/index.php" class="nav-link">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/mywebsite/resi/index.php" class="nav-link">Cek Resi</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/mywebsite/help/index.php" class="nav-link">Help Center</a>
                        </li>
                    </div>

                    <ul>
                        <div class="nav-list">
                            <div class="menu-icon menu-button">
                                <li class="nav-item">
                                    <a href="">
                                        <img class="icon i1" src="http://localhost/mywebsite/home/aset/icon/search.png" alt="">
                                    </a>
                                    <a href="http://localhost/mywebsite/wishlist/wishlist.php">
                                        <img class="icon i2" src="http://localhost/mywebsite/home/aset/icon/like.png" alt="">
                                    </a>
                                    <a href="" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img class="icon i3" src="http://localhost/mywebsite/home/aset/icon/user.png" alt="">
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="http://localhost/mywebsite/profil/profil.php">Profil</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="http://localhost/mywebsite/logout.php">Logout</a>
                                        </div>
                                    </a>
                                    <a href="http://localhost/mywebsite/cart/cart.php" class="badge-notif" data-badge="<?= $n['jumlah'] ?>">
                                        <img class="icon i4" src="http://localhost/mywebsite/home/aset/icon/supermarket.png" alt="">
                                    </a>
                                <?php endwhile; ?>
                                </li>
                            </div>
                        </div>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="pembayaran">
                <div class="pembayaran-content">
                    <div class="pembayaran-head">
                        <h1>Pembayaran</h1>
                    </div>
                    <div class="pembayaran-body">
                        <form action="proses-pembayaran.php" method="post">
                            <h3>Item yang Anda Beli</h3>
                            <div class="product-content">
                                <?php $i = 1; ?>
                                <?php while ($out = mysqli_fetch_assoc($item)) :
                                    

                                ?>


                                    <a href="" style="text-decoration:none">
                                        <table class="product-grid" border="0">
                                            <tr>
                                                <td>
                                                    <img class="product-pict" src="http://localhost/mywebsite/aset/img/<?php echo $out["gambar1"] ?>" alt="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="product-name">
                                                    <h3><?php echo $out["nama"] ?></h3>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="product-price">
                                                    <h4><b>IDR <?php echo $out["harga"] ?></b> </h4>
                                                    <h5>Colour: <?php echo $out["warna"] ?></h5>
                                                    <h5>Size: <?php echo $out["ukuran"] ?></h5>
                                                    <h5>Amount: <?php echo $out["jumlah"] ?></h5>
                                                </td>
                                            </tr>
                                        </table>
                                    </a>

                                    <input type="hidden" name="id_pembelian[]" value="<?php echo $out["id_pembelian"] ?>">
                                    <input type="hidden" name="id_user[]" value="<?php echo $out["id_user"] ?>">
                                    <input type="hidden" name="id_item[]" value="<?php echo $out["id_item"] ?>">
                                    <input type="hidden" name="id_warna[]" value="<?php echo $out["id_warna"] ?>">
                                    <input type="hidden" name="id_ukuran[]" value="<?php echo $out["id_ukuran"] ?>">
                                    <input type="hidden" name="total_harga[]" value="<?php echo $out["total_harga"] ?>">
                                    <input type="hidden" name="jumlah[]" value="<?php echo $out["jumlah"] ?>">
                                    <input type="hidden" name="tanggal[]" value="<?php echo date("d/m/Y h:i:s") ?>">
                                    <input type="hidden" name="total[]" value="<?php echo $total ?>">
                                    <input type="hidden" name="id_akhir[]" value="<?php echo $out["id_akhir"] ?>">
                                    <input type="hidden" name="id_kondisi[]" value="1">

                                    <?php $i++ ?>
                                <?php endwhile; ?>
                            </div>
                            <div class="alamat">
                                <div class="alamat-content">
                                    <h3>Alamat Anda</h3>
                                    <h4><b><?php echo $out2["alamat"] ?></b> </h4>
                                </div>
                            </div>
                            <div class="rek">
                                <div class="rek-content">
                                    <h3>No Rekening</h3>
                                    <h4><b><?php echo $out2["norek"] ?></b> </h4>
                                </div>
                            </div>
                            <div class="duwit">
                                <div class="duwit-content">
                                    <h3>Total</h3>
                                    <h4>IDR <b><?= $total["total_harga"] ?>.000</b> </h4>
                                </div>
                            </div>



                            <button class="buy" type="submit" name="simpan">
                                <h2 style="text-decoration: none">PROCESS</h2>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <section class="footer">
        <div class="container">
            <table>
                <tr>
                    <td width="555px" class="left">
                        <h2>OUR LOCATION</h2>
                    </td>
                    <td width="555px" class="right">
                        <h2>CONTACT</h2>
                    </td>
                </tr>
                <tr class="ngisor">
                    <td class="left">
                        <div class="ngisor">
                            <h5>
                                Perum Permata Kota 2 Blok AA3
                                Kel.Kedungsoko Kec.Tulungagung
                            </h5>
                            <h5>Tulungagung</h5>
                            </br>
                            </br>
                        </div>
                        <div class="copyright">
                            <h5>&copy; EINZ Immortality. All Right Reserved</h5>
                        </div>
                    </td>
                    <td class="right">
                        <div class="media-icon-2">
                            <i class="fab fa-instagram"></i>
                            <i class="fab fa-whatsapp"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">

                    </td>
                </tr>
            </table>
        </div>
    </section>



</body>

</html>