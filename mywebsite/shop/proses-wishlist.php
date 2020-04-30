<?php
    include 'koneksi.php';

    session_start();

    $id_item = $_GET['id_item'];

    $user = $_SESSION['id_user'];

    $ceknik   = mysqli_num_rows (mysqli_query($connect,"SELECT id_item, id_user FROM wishlist WHERE id_user = '$user' AND id_item='$_GET[id_item]'"));
    if ($ceknik > 0) {
        echo "<script>
              alert ('Barang Sudah Ada di Wishlist');
              document.location.href='index.php';
              </script>
              ";
        exit();
    } else {

    $query =("INSERT INTO wishlist VALUES ('' , '$id_item' , '$user')");
    
    $anggota = mysqli_query($connect,$query);

    if($anggota>0){
        echo "
            <script>
            alert('Barang Telah Ditambahkan ke Wishlist');
            document.location.href='index.php';
            </script>
        ";
    }
    }