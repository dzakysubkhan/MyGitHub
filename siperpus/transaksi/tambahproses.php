<?php  
include 'koneksi.php';
include 'fungsi-transaksi.php';
include 'http://localhost/siperpus/proses-login.php';

session_start();

if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
    header("location: http://localhost/siperpus/index.php"); // Kita Redirect ke halaman index.php karena belum login
  }
  

if(isset($_POST['simpan'])){
	
	$id_anggota 		= $_POST['id_anggota'];
	$id_buku 			= $_POST['id_buku'];
	$tgl_pinjam 		= $_POST['tgl_pinjam'];
	$tgl_jatuh_tempo 	= date('Y-m-d', strtotime($tgl_pinjam.'+ 7 days'));
	$id_petugas 		= $_SESSION['id'];

	$sql = "INSERT INTO peminjaman VALUES('' , '$id_anggota', '$tgl_pinjam', '$tgl_jatuh_tempo', '$id_petugas')";
	
	$stok = ambilStok($connect, $id_buku); //ambil data stok buku

	if(cekPinjam($connect, $id_anggota) && $stok > 0){
		$res = mysqli_query($connect, $sql);
		$querp=mysqli_query($connect,"SELECT id_pinjam FROM peminjaman WHERE tgl_pinjam='$tgl_pinjam' AND id_anggota='$id_anggota' AND tgl_jatuh_tempo='$tgl_jatuh_tempo' AND id_petugas='$id_petugas' ");
		$wd=mysqli_fetch_assoc($querp);
		$idp=$wd["id_pinjam"];
		$sql1 = mysqli_query($connect,"INSERT INTO detail_pinjam(id_pinjam,id_buku) values('$idp','$id_buku')");
		$count = mysqli_affected_rows($connect);
		$stok_update = $stok - 1;
		if($count == 2){
			updateStok($connect, $id_buku, $stok_update);
			header("Location:index.php");
		}
	  
	}
	if(cekPinjam($connect, $id_anggota)==false){
		updateStok($connect, $id_buku, $stok_update);
		header("Location:index.php");
	}
}else{
	header("Location:tambahpinjam.php");
}
?>