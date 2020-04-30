<?php
$connect = mysqli_connect("localhost","root","","mywebsite");

if(mysqli_connect_error()){
    echo"Koneksi database gagal : ". mysqli_connect_error();
}
?>