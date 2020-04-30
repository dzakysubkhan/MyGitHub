<?php
session_start();

if (!isset($_SESSION['username'])) { // Jika tidak ada session username berarti dia belum login
    header("location: http://localhost/mywebsite/index.php"); // Kita Redirect ke halaman index.php karena belum login
}

include 'koneksi.php';

$user = $_SESSION['id_user'];

$notif = mysqli_query($connect, "SELECT COUNT(*) AS jumlah from cart  WHERE id_user = '$user'");

$query = mysqli_query($connect, "SELECT * FROM user WHERE id_user = '$user'");

$data = mysqli_fetch_assoc($query);

$query2 = mysqli_query($connect, "SELECT DISTINCT tgl_beli,id_akhir FROM detail_beli WHERE id_user = '$user'");




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="http://localhost/mywebsite/home/aset/boosttrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/mywebsite/home/aset/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="http://localhost/mywebsite/profil/style.css">
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
                                            <a class="dropdown-item" href="#">Profil</a>
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
            <div class="profil">
                <div class="profil-content">
                    <table class="profil-head">
                        <tr>
                            <td>
                                <div>
                                    <img class="profil-pict" src="http://localhost/mywebsite/aset/img/profil-default.png" alt="">
                                </div>
                            </td>
                            <td>
                                <h1 class="profil-name">Hello, <?php echo $data['nama'] ?></h1>
                            </td>
                        </tr>
                    </table>

                    <div class="profil-cap">
                        <table>
                            <tr bo>
                                <td>
                                    <a href="profil.php" style="text-decoration: none">
                                        <div class="buy-now-content">
                                            <h1>BACK</h1>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                        </table>
                        <h3 class="mboh">Recent Transaction</h3>

                        <?php
                        while ($data2 = mysqli_fetch_assoc($query2)) :
                        ?>

                            <div class="recent-body">
                                <table width="100%">
                                    <tr>
                                        <td class="tgl">
                                            <h2><?= $data2["tgl_beli"] ?></h2>
                                        </td>
                                        <td class="resi">
                                            <h2><?= $data2["id_akhir"] ?></h2>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                        <?php
                        endwhile;
                        ?>
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

    <script type="text/javascript" src="script.js"></script>
    <!-- <script type="text/javascript" src="http://localhost/mywebsite/main.js"></script> -->

</body>

</html>