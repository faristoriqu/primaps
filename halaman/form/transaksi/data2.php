<?php
	include '../../../config/koneksi.php';
	if(isset($_POST['tambah'])){
    
    $id_barang=$_POST['id_barang'];
    $jumlah=$_POST['jumlah'];
    $kode_transaksi=$_POST['kode_transaksi'];

     $data = mysqli_query($koneksi, "SELECT * FROM transaksi_tmp WHERE id_barang='$id_barang'");
     $cari = mysqli_num_rows($data);
    if ($cari==0) {
        $query_add = mysqli_query($koneksi,"INSERT INTO transaksi_tmp VALUES('$id_barang','$jumlah')");
      // if ($query_add==TRUE) {
      //   echo "<script>window.location.href='?halaman=transaksi'</script>";  
      // }else{
      //       echo("gagal");
      // }
    }else{
          $query_edit = mysqli_query($koneksi,"UPDATE transaksi_tmp SET jumlah=(jumlah + ".$jumlah.") WHERE id_barang='$id_barang' ");
      // if ($query_edit==TRUE) {
      //   echo "<script>window.location.href='?halaman=transaksi'</script>";  
      // }else{
      //     echo("gagal");
      // }  
    }
  }
	$query = mysqli_query($koneksi,"SELECT * FROM login ") or die(mysqli_error());
	while ($data = mysqli_fetch_array($query)) {
		echo $data['username'].;
?>
