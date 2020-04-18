<?php

include 'koneksi.php';

session_start();

if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
    header("location: http://localhost/siperpus/index.php"); // Kita Redirect ke halaman index.php karena belum login
  }
  

$id_anggota = $_GET["id_anggota"];

$query = mysqli_query($connect, "DELETE FROM anggota where id_anggota=$id_anggota");

//var_dump($query);7

if($query > 0)
{
    echo
    "
    <script>
        alert('Data Berhasil Dihapus, Kapok!');
        document.location.href = 'index.php';
    </script>
    ";
}





?>