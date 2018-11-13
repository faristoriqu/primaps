<?php 
include '../../koneksi.php';
$kategori = $_POST['kategori'];
    
 
mysqli_query($koneksi,"INSERT INTO kategori VALUES('$kategori')");
 
header("location:../../beranda.php?open=kategori_data");
?>
