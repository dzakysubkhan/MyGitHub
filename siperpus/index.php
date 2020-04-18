<?php
session_start();

if (isset($_SESSION['username'])) {
    header("location: http://localhost/siperpus/dashboard/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiPerpus SMK Telkom Malang</title>

    <link rel="stylesheet" href="http://localhost/siperpus/aset/boosttrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/siperpus/aset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="http://localhost/siperpus/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368814c.js"></script>
</head>


<body>
    <img class="wave" src="wave1.png" alt="">
    <div class="card" style="width: 1100px; height: 560px">
        <div class="card-body">
            <center>
                <div class="media-icon">
                    <i class="far fa-map"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-whatsapp"></i>
                </div>
            </center>
            <div class="container">
                <div class="img">
                    <img src="book.svg" alt="">
                </div>
                <div class="login-container">
                    <form method="post" action="proses-login.php">
                        <img class="avatar" src="anggota/profil-default.png" alt="">
                        <h2>Welcome</h2>

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
                        <a href="http://localhost/siperpus/indexregister.php">Create an Account</a>
                        <input type="submit" class="btn" value="Login Now">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="main.js"></script>
    <script src="http://localhost/siperpus/aset/jquery.js"></script>
    <script src="http://localhost/siperpus/aset/js/boostrap.min.js"></script>
</body>


</html>