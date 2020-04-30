<?php

   include 'koneksi.php';

   session_start();

   $user = $_SESSION['id_user'];

   if (isset($_POST['simpan'])){

        $id_pembelian = $_POST['id_pembelian'];
        $id_user = $_POST['id_user'];
        $id_item = $_POST['id_item'];
        $id_warna = $_POST['id_warna'];
        $id_ukuran = $_POST['id_ukuran'];
        $total_harga = $_POST['total_harga'];
        $jumlah = $_POST['jumlah'];
        $tanggal = $_POST['tanggal'];
        $id_akhir = $_POST['id_akhir'];
        $id_kondisi = $_POST['id_kondisi'];

        $jumlah_dipilih = count($id_pembelian);
        for($x=0;$x<$jumlah_dipilih;$x++)
        {
        $query =("INSERT INTO detail_beli VALUES (''  , '$id_pembelian[$x]' , '$id_user[$x]' , '$id_item[$x]'  , '$id_warna[$x]' , '$id_ukuran[$x]'  , '$jumlah[$x]' , '$tanggal[$x]' , '$total_harga[$x]' , '$id_akhir[$x]' , '$id_kondisi[$x]')");
        mysqli_query($connect,$query);
        }
        $delete=mysqli_query($connect,"DELETE FROM pembelian where id_user='$user'");
        
        if($delete>0){
            echo "
            <script>
            alert('Pembelian Berhasil, Silahkan cek pada menu Resi untuk mengetahui perkembangan pembelian Anda');
            document.location.href='http://localhost/mywebsite/home/home.php';
            </script>
            ";
        }

    }

?>