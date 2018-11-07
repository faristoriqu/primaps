<?php 
include '../../koneksi.php';
$id_user = $_POST['id_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];
 
mysqli_query($koneksi,"INSERT INTO login VALUES('$id_user','$username','$password','$level')");
 
header("location:../../beranda.php?open=user_data");
?>
