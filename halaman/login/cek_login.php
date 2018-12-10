<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../../config/koneksi.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from login where username='$username' and password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['id_user'] = $r['id_user'];
	$_SESSION['status'] = "login";
	header("location:../../index.php");
}else{
	header("location:login.php?pesan=gagal");
}
?>
