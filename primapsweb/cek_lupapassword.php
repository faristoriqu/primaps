<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$username 	  = $_POST['username'];
$no_telpon 	  = $_POST['no_telpon'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from login where username='$username' and no_telpon='$no_telpon'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){

	header("location:tampilpassword.php");
}else{
	
	header("location:lupapassword.php");

}
?>