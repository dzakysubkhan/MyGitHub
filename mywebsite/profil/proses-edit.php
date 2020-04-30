<?php

session_start();

if (!isset($_SESSION['username'])) { // Jika tidak ada session username berarti dia belum login
    header("location: http://localhost/mywebsite/index.php"); // Kita Redirect ke halaman index.php karena belum login
}

$user = $_SESSION['id_user'];


include 'koneksi.php';

if(isset($_POST['simpan'])){

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$alamat = $_POST['alamat'];
$norek = $_POST['norek'];

$qu = ("UPDATE user SET nama = '$nama', username = '$username' , password = '$password' , alamat = '$alamat' , norek = '$norek' WHERE id_user='$user'");

$apdet = mysqli_query($connect,$qu);

if($apdet > 0){
    echo "
    <script>
    alert('Data Berhasil Dirubah');
    document.location.href='http://localhost/mywebsite/profil/profil.php';
    </script>
    ";
}
}

?>

