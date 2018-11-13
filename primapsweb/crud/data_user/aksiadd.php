<?php 
include '../../koneksi.php';
$id_user = $_POST['id_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$no_telpon = $_POST['no_telpon'];
$level = $_POST['level'];
 
mysqli_query($koneksi,"INSERT INTO login VALUES('$id_user','$username','$password','$no_telpon','$level')");
 
header("location:../../beranda.php?open=user_data");
?>
