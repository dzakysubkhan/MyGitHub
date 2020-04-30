<?php
session_start();

if (!isset($_SESSION['username'])) { // Jika tidak ada session username berarti dia belum login
    header("location: http://localhost/mywebsite/index.php"); // Kita Redirect ke halaman index.php karena belum login
}

include 'koneksi.php';

$user = $_SESSION['id_user'];

$notif = mysqli_query($connect, "SELECT COUNT(*) AS jumlah from cart WHERE id_user = '$user'");

$id_item = $_GET['id_item'];

$query = "SELECT * FROM item i INNER JOIN tshirt ts ON i.item=ts.id_tshirt WHERE i.id_item = '$id_item'";

$item = mysqli_query($connect, $query);

$out = mysqli_fetch_assoc($item);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EINZ Catalog | Detail</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="http://localhost/mywebsite/home/aset/boosttrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/mywebsite/home/aset/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="http://localhost/mywebsite/shop/style.css">
    <link rel="stylesheet" href="http://localhost/mywebsite/shop/styledetail.css">
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
            <div class="detail-product">
                <table border="0" style="width: 100%">
                    <tr>
                        <td>
                            <div class="container">
                                <div class="content-pict">
                                    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active" data-interval="0">
                                                <img class="pict-product" src="http://localhost/mywebsite/aset/img/<?php echo $out["gambar1"] ?>" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item" data-interval="0">
                                                <img class="pict-product" src="http://localhost/mywebsite/aset/img/<?php echo $out["gambar2"] ?>" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item" data-interval="0">
                                                <img class="pict-product" src="http://localhost/mywebsite/aset/img/<?php echo $out["gambar3"] ?>" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item" data-interval="0">
                                                <img class="pict-product" src="http://localhost/mywebsite/aset/img/<?php echo $out["gambar4"] ?>" class="d-block w-100" alt="...">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </td>
                        <td>
                            <form action="proses-cart.php" method="post">
                                <div class="head-product">
                                    <h1><b><?php echo $out["nama"] ?></b></h1>
                                    </br>
                                    </br>
                                    <h3>IDR <?php echo $out["harga"] ?></h3>
                                    </br>
                                    </br>
                                    <label for="basic-url">
                                        <h4>Size</h4>
                                    </label>
                                    <div class="">
                                        <select class="custom-select size si" id="inputGroupSelect01" name="ukuran">
                                            <div class="ini-size">
                                                <option selected></option>
                                                <?php

                                                $size = mysqli_query($connect, "SELECT * FROM ukuran");
                                                while ($u = mysqli_fetch_assoc($size)) :
                                                ?>

                                                    <option value="<?php echo $u['id_ukuran']; ?>"><?php echo $u['ukuran']; ?></option>

                                                <?php
                                                endwhile; ?>
                                            </div>
                                        </select>
                                    </div>
                                    </br>
                                    </br>
                                    </br>
                                    <label for="basic-url">
                                        <h4>Colour</h4>
                                    </label>
                                    <div>
                                        <select class="custom-select size si" id="inputGroupSelect01" name="warna">
                                            <div class="ini-colour">
                                                <option selected></option>
                                                <?php

                                                $colour = mysqli_query($connect, "SELECT * FROM warna");
                                                while ($c = mysqli_fetch_assoc($colour)) :
                                                ?>

                                                    <option value="<?php echo $c['id_warna']; ?>"><?php echo $c['warna']; ?></option>

                                                <?php
                                                endwhile; ?>
                                            </div>
                                        </select>
                                    </div>
                                    <table>
                                        <tr>
                                            <td>
                                                <div>
                                                    <input class="amount " type="number" name="jumlah">
                                                </div>
                                            </td>
                                            <td>
                                                <a href="proses-wishlist.php?id_item=<?php echo $out['id_item'] ?>" style="text-decoration: none">
                                                    <div class="wishlist">
                                                        <h2>WISHLIST</h2>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>

                                    <input type="hidden" name="id_item" value="<?= $id_item?>">
                                    <input type="hidden" name="id_user" value="<?= $user?>">

                                    <button class="buy" type="submit" name="simpan">
                                        <h2 style="text-decoration: none">ADD TO CART</h2>
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="description">
                                <h1>DESCRIPTION</h1>
                                <h3><?php echo $out["deskripsi"] ?></h3>
                                </br>
                                </br>
                                <h4>Release Date: <?php echo $out["tgl_rilis"] ?></h4>
                                <h4>Creator :<?php echo $out["creator"] ?></h4>
                            </div>
                        </td>
                    </tr>
                </table>
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


    <script src="http://localhost/mywebsite/home/aset/jquery.js"></script>
    <script src="http://localhost/mywebsite/home/aset/js/boostrap.min.js"></script>
    <script src="http://localhost/mywebsite/home/aset/nav.js"></script>
    <script src="http://localhost/mywebsite/home/aset/num.js"></script>

</body>

</html>