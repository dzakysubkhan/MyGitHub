<?php
include 'koneksi.php';

session_start();

if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
    header("location: http://localhost/siperpus/index.php"); // Kita Redirect ke halaman index.php karena belum login
  }
  

if (isset($_POST['simpan'])){
    $nama        = $_POST['nama'];
    $kelas       = $_POST['kelas'];
    $telp        = $_POST['telp'];
    $username    = $_POST['username'];
    $password    = $_POST['password'];
    $id_level    = $_POST['id_level'];

    $query =("INSERT INTO anggota VALUES ('' , '$nama' , '$kelas' , '$telp' , '$username' , '$password' , '$id_level')");
    
    $anggota = mysqli_query($connect,$query);

    if($anggota>0){
        echo "
            <script>
            alert('Data Berhasil Ditambahkan');
            document.location.href='index.php';
            </script>
        ";
    }
}
?>
