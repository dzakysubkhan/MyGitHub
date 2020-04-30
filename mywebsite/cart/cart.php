<?php
session_start();

if (!isset($_SESSION['username'])) { // Jika tidak ada session username berarti dia belum login
    header("location: http://localhost/mywebsite/index.php"); // Kita Redirect ke halaman index.php karena belum login
}

$text =
    'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
$panj = 10;
$txtl = strlen($text) - 1;
$result = '';
for ($i = 1; $i <= $panj; $i++) {
    $result .= $text[rand(0, $txtl)];
}




include 'koneksi.php';

$user = $_SESSION['id_user'];


$notif = mysqli_query($connect, "SELECT COUNT(*) AS jumlah from cart  WHERE id_user = '$user'");


$barang = "SELECT * FROM cart c INNER JOIN item i ON c.id_item=i.id_item INNER JOIN tshirt t ON t.id_tshirt= i.item INNER JOIN warna w ON w.id_warna = c.id_warna INNER JOIN ukuran u ON u.id_ukuran = c.id_ukuran WHERE c.id_user = '$user'  ";
$item = mysqli_query($connect, $barang);

// $itung = "SELECT harga AS uwek FROM tshirt t INNER JOIN item i ON t.id_tshirt = i.item INNER JOIN cart c ON c.id_item = i.item WHERE c.id_user = $user";
// $q = mysqli_query($connect,$itung);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="http://localhost/mywebsite/home/aset/boosttrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/mywebsite/home/aset/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="http://localhost/mywebsite/cart/style.css">
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
                                </li>
                            </div>
                        </div>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <form action="proses-konfirmasi.php" method="post">
            <div class="container">
                <div class="cart-head">
                    <h1>Your Cart</h1>
                </div>
                <div class="cart">

                    <?php $i = 1; ?>
                    <?php while ($out = mysqli_fetch_assoc($item)) : ?>

                        <div class="cart-container">
                            <table border="0">
                                <tr>
                                    <td rowspan="2">
                                        <img class="cart-pict" src="http://localhost/mywebsite/aset/img/<?php echo $out["gambar1"] ?>" alt="">
                                    </td>
                                    <td colspan="3">
                                        <div class="head-cap">
                                            <h1><?php echo $out["nama"] ?></h1>
                                        </div>
                                    </td>
                                    <td rowspan="2">
                                        <div>
                                            <input type="text" class="amount" value="<?php echo $out["jumlah"] ?>">
                                        </div>
                                    </td>
                                    <td rowspan="2" width="150px">
                                        <a href="hapus.php?id_cart=<?php echo $out["id_cart"] ?>">
                                            <div class="delete-button">
                                                <img class="delete-icon" src="http://localhost/mywebsite/home/aset/icon/delete.png" alt="">
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <div>
                                        <td width="70px">
                                            <h3>Colour</h3>
                                            <h3>Size</h3>
                                        </td>
                                        <td width="20px">
                                            <h3> : </h3>
                                            <h3> : </h3>
                                        </td>
                                        <td width="600px">

                                            <h3 class="cart-cap"><?php echo $out["warna"] ?></h3>
                                            <h3 class="cart-cap"><?php echo $out["ukuran"] ?></h3>
                                        </td>
                                    </div>
                                </tr>
                            </table>
                            <?php
                                $kabeh = $out['harga'] * $out["jumlah"];
                            ?>
                            <input type="hidden" name="id_item[]" value="<?php echo $out["id_item"] ?>">
                            <input type="hidden" name="id_user[]" value="<?php echo $out["id_user"] ?>">
                            <input type="hidden" name="id_warna[]" value="<?php echo $out["id_warna"] ?>">
                            <input type="hidden" name="id_ukuran[]" value="<?php echo $out["id_ukuran"] ?>">
                            <input type="hidden" name="jumlah[]" value="<?php echo $out["jumlah"] ?>">
                            <input type="hidden" name="id_final[]" value="<?= $result?>" style="text-transform: uppercase">
                            <input type="hidden" name="id_cart[]" value="<?php echo $out["id_cart"] ?>">
                            <input type="hidden" name="total_harga[]" value="<?php echo $kabeh ?>">
                        </div>

                    <?php
                    endwhile; ?>

                </div>
            </div>
            <div class="container" >
             
                <div class="buy-now " 
                <?php if ($n['jumlah'] == 0){ ?>
                style="visibility: hidden">
                <?php } ?>
            
                    <a href="" data-toggle="modal" data-target="#exampleModalConfir" style="text-decoration: none">
                        <div class="buy-now-content">
                            <h1>BUY NOW</h1>
                        </div>
                    </a>
                </div>

                
            </div>
            <?php endwhile; ?>

            <div class="modal fade" id="exampleModalConfir" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" class="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h2 hide style="color: #fafafa">Konfirmasi Pembelian</h2>
                        </center>
                        <div class="modal-body">
                            <center>
                                <div class="confirmation">
                                    <h2>Apakah Anda yakin ingin membeli barang ini?</h2>
                                    <h4>Setelah ini Anda akan diarahkan ke menu pembayaran</h4>
                                </div>
                                <button type="submit" name="confir" class=" btn nu btn-outline-warning btn-konfirmasi">KONFRIMASI PEMBELIAN</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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