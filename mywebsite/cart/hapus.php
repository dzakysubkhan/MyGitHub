<?php

include 'koneksi.php';

session_start();

if (!isset($_SESSION['username'])) { // Jika tidak ada session username berarti dia belum login
    header("location: http://localhost/mywebsite/index.php"); // Kita Redirect ke halaman index.php karena belum login
}
 

$id_cart = $_GET["id_cart"];

$query = mysqli_query($connect, "DELETE FROM cart where id_cart=$id_cart");

//var_dump($query);7

if($query > 0)
{
    echo
    "
    <script>
        alert('Barang Berhasil Dihapus');
        document.location.href = 'cart.php';
    </script>
    ";
}





?>