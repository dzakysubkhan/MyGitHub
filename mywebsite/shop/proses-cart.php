<?php
    include 'koneksi.php';

    session_start();



    if(isset($_POST['simpan'])){

        $id_item = $_POST['id_item'];
        $id_user = $_POST['id_user'];
        $id_ukuran = $_POST['ukuran'];
        $id_warna = $_POST['warna'];
        $jumlah = $_POST['jumlah'];

        $query =("INSERT INTO cart VALUES ('' , '$id_item' , '$id_user' , '$id_ukuran' , '$id_warna' , '$jumlah')");
    
        $cart = mysqli_query($connect,$query);

        if($cart > 0){
            echo "
            <script>
            alert('Barang Berhasil Ditambahkan');
            document.location.href='index.php';
            </script>
            ";
        }
    }

?>