<?php
session_start();

if (isset($_SESSION['username'])) {
    header("location: http://localhost/mywebsite/home/home.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,
    maximum-scale=1.0, minimum-scale-1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page</title>


    <!-- Boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a81368814c.js"></script>
    <link rel="stylesheet" href="http://localhost/siperpus/aset/fontawesome/css/all.min.css">

    <!-- Icon -->
    <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito5display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aldrich5display=swap">


    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleform.css">

</head>

<body>

    <header>
        <div class="container">
            <nav>
                <div class="nav-brand">
                    <a href="home.php">
                        <img src="aset/img/logo2.png " width="50px" heigth="100%" alt="">
                    </a>
                </div>

                <div class="menu-icons open">
                    <i class="icon ion-md-menu"></i>
                </div>

                <ul class="nav-list">
                    <div class="menu-icons close">
                        <i class="icon ion-md-close"></i>
                    </div>
                    <li class="nav-item">
                        <a href="index.php" class="nav-link current">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.php" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-toggle="modal" data-target="#exampleModalLogin" class="btn">LOGIN</a>
                    </li>
                    <!-- <li class="nav-item media-icon">
                        <a href="#" class=""><i class="fab fa-instagram"></i></a>
                        <a href="#" class=""><i class="fab fa-whatsapp"></i></a>
                    </li> -->

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
                <div class="main-message">
                    <h4></h4>
                    <h1>MAKE YOUR STYLE,</h1>
                    <h1>MAKE YOUR DAY.</h1>
                    <img src="aset/img/line.png" alt="" class="line">
                    <p>
                        The Official EINZ Catalog,
                    </p>
                    <p>
                        Check It Out Now!
                    </p>
                    <div class="">
                        <a href="#get-started" class="btn nu">GET STARTED</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="article">
            <div class="container">
                <div class="content-article">
                    <table>
                        <tr>
                            <td colspan="5">
                                <h1 class="article-head">SLAUGTHED HAS ARRIVED</h1>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="5">
                                <img class="cloth" src="aset/img/model-baju.png" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>TODAY HUMAN IS ONLY A PUPPET PLAYED BY HIS OWN CREATION.
                                    HUMANS MAKE WORLDY THINGS TO BE MANAGED BY THEMSELVES.
                                    BUT THE FACT THAT WHAT HE WAS CREATED
                                    IS WHAT GOVERNS HIM.</h5>
                                <div>
                                    <a href="#get-started" class="btn-3">SEE DETAIL</a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>

        <section class="best-seller">
            <div class="container">
                <div class="content-best">
                    <h1 class="best-head">BEST SELLER</h1>
                    <div class="car-body">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="kotak one1">
                                                    <img class="barang" src="aset/img/belakang.png" alt="">
                                                    <h4><b>EINZ SLAUGTHED</b></h4>
                                                    <h5>M | L | XL</h5>
                                                    </br>
                                                    <h5>IDR 100.000</h5>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="kotak two2">
                                                    <!-- <img class="barang" src="aset/img/belakang.png" alt="">
                                                    <h4><b>EINZ SLAUGTHED</b></h4>
                                                    <h5>M | L | XL</h5>
                                                    </br>
                                                    <h5>SOLD OUT!</h5> -->
                                                </div>
                                            </td>
                                            <td>
                                                <div class="kotak three3">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="kotak four4">

                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="carousel-item">
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="kotak two22">

                                                </div>
                                            </td>

                                            <td>
                                                <div class="kotak two2">

                                                </div>
                                            </td>

                                            <td>
                                                <div class="kotak three3">

                                                </div>
                                            </td>

                                            <td>
                                                <a href="#get-started">
                                                    <div class="four44">
                                                        <div class="see-more">
                                                        </div>
                                                        <h3>SEE MORE</h3>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="car-left">
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </div>
                            <div class="car-right">
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="register" id="get-started">
            <div class="container">
                <div class="title-heading">
                    <h4></h4>
                    <h1>Doesn't Have an Account Yet?</h1>
                    <div class="">
                        <a href="" class="btn-2" data-toggle="modal" data-target="#exampleModalRegister">CREATE NOW</a>
                    </div>
                    <h5>Have an Account? <a href="" data-toggle="modal" data-target="#exampleModalLogin">Login Now</a></h5>
                </div>
            </div>
            </div>
        </section>




        <!-- Modal -->

        <div class="modal fade" id="exampleModalRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h2 style="color: #fafafa">Register</h2>
                        <img src="aset/img/profil-default.png" alt="" class="profil" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    </center>
                    <div class="modal-body">
                        <center>
                            <form action="register.php" method="post">
                                <div class="input-div one ">
                                    <div class="i">
                                        <i class="fas fa-font"></i>
                                    </div>
                                    <div>
                                        <h5>Name</h5>
                                        <input class="input" type="text" name="nama">
                                    </div>
                                </div>

                                <div class="input-div one ">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div>
                                        <h5>Username</h5>
                                        <input class="input" type="text" name="username">
                                    </div>
                                </div>

                                <div class="input-div two ">
                                    <div class="i">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                    <div>
                                        <h5>Password</h5>
                                        <input class="input" type="password" name="password">
                                    </div>
                                </div>
                                <button type="submit" name="simpan" class=" btn nu btn-outline-warning">REGISTER NOW</button>
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="exampleModalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h2 style="color: #fafafa">Login</h2>
                        <img src="aset/img/profil-default.png" alt="" class="profil" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    </center>
                    <div class="modal-body">
                        <center>
                            <form action="proses-login.php" method="post">
                                <div class="input-div one ">
                                    <div class="i">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div>
                                        <h5>Username</h5>
                                        <input class="input" type="text" name="username">
                                    </div>
                                </div>

                                <div class="input-div two ">
                                    <div class="i">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                    <div>
                                        <h5>Password</h5>
                                        <input class="input" type="password" name="password">
                                    </div>
                                </div>
                                <button type="submit" name="login" class=" btn nu btn-outline-warning">LOGIN NOW</button>
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>

    </main>


    <section class="footer">
        <div class="container">
            <table>
                <tr>
                    <td width="450px" class="left">
                        <h2>OUR LOCATION</h2>
                    </td>
                    <td width="480px" class="right">
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
    <script type="text/javascript" src="main.js"></script>
</body>

</html>