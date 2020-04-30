<?php
session_start();

if (!isset($_SESSION['username'])) { // Jika tidak ada session username berarti dia belum login
    header("location: http://localhost/siperpus/index.php"); // Kita Redirect ke halaman index.php karena belum login
}

include 'koneksi.php';

$user = $_SESSION['id_user'];

$notif = mysqli_query($connect, "SELECT COUNT(*) AS jumlah from cart WHERE id_user = '$user'");




if (isset($_POST['cari'])){

    $resi = $_POST['search'];

    $barang = "SELECT * FROM detail_beli p INNER JOIN item i ON p.id_item=i.id_item INNER JOIN tshirt t ON t.id_tshirt= i.item INNER JOIN warna w ON w.id_warna = p.id_warna INNER JOIN ukuran u ON u.id_ukuran = p.id_ukuran WHERE p.id_akhir = '$resi'  ";
    $item = mysqli_query($connect, $barang);

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EINZ Catalog | Cek Resi</title>
</head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


<link rel="stylesheet" href="http://localhost/mywebsite/home/aset/boosttrap/css/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/mywebsite/home/aset/fontawesome/css/all.min.css">

<link rel="stylesheet" href="http://localhost/mywebsite/resi/style.css">
<link rel="stylesheet" href="http://localhost/mywebsite/stylehead.css">
<link rel="stylesheet" href="http://localhost/mywebsite/stylefooter.css">

<script src="https://kit.fontawesome.com/a81368814c.js"></script>

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
                            <a href="http://localhost/mywebsite/shop/index.php" class="nav-link current">Shop</a>
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
                            <a href="http://localhost/mywebsite/shop/index.php" class="nav-link ">Shop</a>
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
            <div class="resi-content">
                <div class="resi-head">
                    <h1>Track Found</h1>
                </div>
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
                                        <h4><b>Total: IDR <?php echo $out["total"] ?>.000</b> </h4>
                                        <h5>Colour: <?php echo $out["warna"] ?></h5>
                                        <h5>Size: <?php echo $out["ukuran"] ?></h5>
                                        <h5>Amount: <?php echo $out["jumlah"] ?></h5>
                                    </td>
                                </tr>
                            </table>
                        </a>

                        <?php $i++ ?>
                    <?php endwhile; ?>


                </div>
                <div class="ket">
                    <table>
                        <tr>
                            <td class="icon-kondisi" width="180px">
                                <i class="fas fa-user-check"></i>
                            </td>
                            <td class="content-kondisi" width="600px">
                                <h1><b>We Have Received Your Order</b> </h1>
                                <h3>Be patient please :)</h3>
                                <h3>If Your item still on this message on 24 Hours, Please Contact Us</h3>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <section class="footer ewe">
        <div">
            <div class="container ">
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
            </div>
    </section>

    <script src="http://localhost/mywebsite/home/aset/jquery.js"></script>
    <script src="http://localhost/mywebsite/home/aset/js/boostrap.min.js"></script>
    <script src="http://localhost/mywebsite/home/aset/nav.js"></script>


</body>

</html>