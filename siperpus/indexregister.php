<?php

include 'koneksi.php';

session_start();

if (isset($_SESSION['username'])) {
    header("location: http://localhost/siperpus/dashboard/index.php");
}

if (isset($_POST['simpan'])){
    $nama     = $_POST['nama'];
    $telp     = $_POST['telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id_level = 1;

    $query =("INSERT INTO petugas VALUES ('' , '$nama' , '$username' , '$password' , '$telp' , '$id_level')");
    
    $buku = mysqli_query($connect,$query);

    if($buku>0){
        echo "
            <script>
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
                    <form method="post" action="">
                        </br>
                        </br>
                        <h2>Create Account</h2>

                        <div class="input-div one ">
                            <div class="i">
                                <i class="fas fa-font"></i>
                            </div>
                            <div>
                                <h5>Nama</h5>
                                <input class="input" type="text" name="nama">
                            </div>
                        </div>

                        <div class="input-div one ">
                            <div class="i">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <h5>Telepon</h5>
                                <input class="input" type="text" name="telp">
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
                        <input type="submit" name="simpan" class="btn" value="Create Now">
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