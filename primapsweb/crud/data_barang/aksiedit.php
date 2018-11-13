<?php 
 
include '../../koneksi.php';
$id_barang = $_POST['id_barang'];
$namabarang = $_POST['namabarang'];
$idkat = $_POST['idkat'];
$stok = $_POST['stok'];
$ids = $_POST['ids'];
$hargab = $_POST['hargab'];
$hargaj = $_POST['hargaj'];

mysqli_query($koneksi,"UPDATE barang SET namabarang='$namabarang', idkat='$idkat', stok='$stok', ids='$ids', hargab='$hargab', hargaj='$hargaj'  WHERE id_barang='$id_barang'");
 
header("location:../../beranda.php?open=barang_data");
 
?>
