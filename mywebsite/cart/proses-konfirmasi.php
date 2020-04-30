<?php

   include 'koneksi.php';

   session_start();

   $user = $_SESSION['id_user'];

   if (isset($_POST['confir'])){

        $id_item = $_POST['id_item'];
        $id_user = $_POST['id_user'];
        $id_warna = $_POST['id_warna'];
        $id_ukuran = $_POST['id_ukuran'];
        $jumlah = $_POST['jumlah'];
        $total_harga = $_POST['total_harga'];
        $id_final = $_POST['id_final'];
        $id_cart = $_POST['id_cart'];


        $jumlah_dipilih = count($id_cart);
        for($x=0;$x<$jumlah_dipilih;$x++)
        {
        $query =("INSERT INTO pembelian VALUES ('' , '$id_item[$x]' , '$id_user[$x]' , '$id_warna[$x]' , '$id_ukuran[$x]'  , '$total_harga[$x]' , '$jumlah[$x]' , '$id_cart[$x]' , '$id_final[$x]')");
        mysqli_query($connect,$query);
        }
        $delete=mysqli_query($connect,"DELETE FROM cart where id_user='$user'");
        
        if($delete>0){
            header("Location:pembayaran.php?id_user=$user");
        }

    }

?>