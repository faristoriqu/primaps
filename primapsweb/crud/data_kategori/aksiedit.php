<?php 
 
include '../../koneksi.php';
$kategori = $_POST['kategori'];

mysqli_query($koneksi,"UPDATE kategori SET kategori='$kategori' WHERE idkat='$idkat'");
 
header("location:../../beranda.php?open=kategori_data");
 
?>
