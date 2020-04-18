<?php
include 'koneksi.php';
include 'fungsi-transaksi.php';

session_start();

if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
    header("location: http://localhost/siperpus/index.php"); // Kita Redirect ke halaman index.php karena belum login
  }
  

if (isset($_POST['simpan'])) {
	$id_pinjam = $_POST['id_pinjam'];
	$id_buku = $_POST['id_buku'];
	$tgl_kembali = $_POST['tgl_kembali'];
	// var_dump($tgl_kembali);die;
	if ($tgl_kembali == null) {
		$count = mysqli_affected_rows($connect);
	} else {

		$sql = "UPDATE detail_pinjam SET tgl_kembali='$tgl_kembali', status='kembali' WHERE id_pinjam=$id_pinjam";
		$res = mysqli_query($connect, $sql);
		$count = mysqli_affected_rows($connect);
	}
	$stok_update = ambilStok($connect, $id_buku) + 1;

	if ($count == 1) {
		updateStok($connect, $id_buku, $stok_update);
		$denda = hitungDenda($connect, $id_pinjam, $tgl_kembali);

		$sql = "UPDATE peminjaman SET denda=$denda WHERE id_pinjam=$id_pinjam";
		$res = mysqli_query($connect, $sql);

		header("Location: detailpinjam.php?id_pinjam=$id_pinjam");
		exit;
	}
	else{
		header("Location: detailpinjam.php?id_pinjam=$id_pinjam");
	}
} else {
	header("Location:index.php");
}
