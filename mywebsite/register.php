<?php
include 'koneksi.php';

session_start();

if (isset($_SESSION['username'])) {
    header("location: http://localhost/mywebsite/home/home.php");
}

if (isset($_POST['simpan'])){
    $nama     = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query =("INSERT INTO user VALUES ('', '$nama' , '$username' , '$password' , '' , '')");
    
    $user = mysqli_query($connect,$query);

    if($user>0){
        echo "
            <script>
            alert('Registrasi Berhasil');
            document.location.href='index.php';
            </script>
        ";
    }
}
?>
