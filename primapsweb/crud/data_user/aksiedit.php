<?php 
 
include '../../koneksi.php';
$id_user = $_POST['id_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];
 
mysqli_query($koneksi,"UPDATE login SET username='$username', password='$password', level='$level'  WHERE id_user='$id_user'");
 
header("location:../../beranda.php?open=user_data");
 
?>
