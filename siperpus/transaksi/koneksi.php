<?php
$connect = mysqli_connect("localhost","root","","perpus_ukl");

if(mysqli_connect_error()){
    echo"Koneksi database gagal : ". mysqli_connect_error();
}
?>