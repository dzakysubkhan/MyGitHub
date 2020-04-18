
<?php 
include 'koneksi.php';

$id=$_GET["id_pinjam"];

$query=mysqli_query($connect,"DELETE FROM detail_pinjam where id_pinjam='$id'");
$query=mysqli_query($connect,"DELETE FROM peminjaman where id_pinjam='$id'");

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