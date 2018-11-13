<?php 
include '../../koneksi.php';
$id_barang = $_POST['id_barang'];
$namabarang = $_POST['namabarang'];
$idkat = $_POST['idkat'];
$stok = $_POST['stok'];
$ids = $_POST['ids'];
$hargab = $_POST['hargab'];
$hargaj = $_POST['hargaj'];
    
 
mysqli_query($koneksi,"INSERT INTO barang VALUES('$id_barang','$namabarang','$idkat', '$stok', '$ids', '$hargab','$hargaj')");
 
header("location:../../beranda.php?open=barang_data");
?>
