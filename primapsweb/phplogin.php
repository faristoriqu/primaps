<?php 
include 'koneksi.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
 
$login = mysqli_query($koneksi,"select * from login where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);
if($cek == 1){
	session_start();
	$data = mysqli_fetch_array($login);
	$_SESSION['username'] = $username;
	$_SESSION['level'] = $data['level'];
	header("location:menu_all.php");
}else{
	header("location:login.php");
	
}
 
?>
