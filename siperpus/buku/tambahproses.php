<?php
include 'koneksi.php';

session_start();

if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
    header("location: http://localhost/siperpus/index.php"); // Kita Redirect ke halaman index.php karena belum login
  }
  

if (isset($_POST['simpan'])){
    $judul      = $_POST['judul'];
    $penerbit   = $_POST['penerbit'];
    $pengarang  = $_POST['pengarang'];
    $ringkasan  = $_POST['ringkasan'];
    $cover      = $_POST['cover'];
    $stok       = $_POST['stok'];
    $id_kategori= $_POST['id_kategori'];

    $query =("INSERT INTO buku VALUES ('' , '$judul' , '$penerbit' , '$pengarang' , '$ringkasan' , '$cover' , '$stok' , '$id_kategori')");
    
    $buku = mysqli_query($connect,$query);

    if($buku>0){
        echo "
            <script>
            alert('Data Berhasil Ditambahkan');
            document.location.href='index.php';
            </script>
        ";
    }
}
?>
