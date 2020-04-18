<?php

include 'koneksi.php';

session_start();


$username = mysqli_real_escape_string($connect, $_POST['username']);
$password = mysqli_real_escape_string($connect, $_POST['password']);

$sql = mysqli_query($connect,"SELECT * from petugas where username='".$username."' and password='".$password."'");

// $count = mysqli_affected_rows($koneksi);
// $data_login = mysqli_fetch_assoc($sql);

$data = mysqli_fetch_array($sql);

// if($count == 1){

//     $_SESSION['id'] = $data_login['id_petugas'];

//     $_SESSION['nama'] = $data_login['nama_petugas'];

//     header("location: http://localhost/siperpus/dashboard/index.php");
// }

if( ! empty($data)) {

    $_SESSION['id'] = $data['id_petugas'];
    $_SESSION['nama'] = $data['nama_petugas'];
    $_SESSION['username'] = $data['username'];
    setcookie("message","delete",time()-1);
    header("location: http://localhost/siperpus/dashboard/index.php");

}else{

    setcookie("message", "Maaf, Username atau Password salah", time()+3600);

    header("location:index.php");
}
?>

