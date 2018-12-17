<?php
if(isset($_POST['transaksi'])){
}
 // Define relative path from this script to mPDF
$nama_dokumen='Cetak Bukti DO -'.$_GET['val'];
include '../../../config/koneksi.php';
include '../../../dist/mpdf60/mpdf.php';
$sid = $_GET['val'];
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
//Beginning Buffer to save PHP variables and HTML tags
ob_start(); 
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--CONTOH Code START-->

<h4 style="text-align: center;">
  PrimaPs
  <br>
  JL. Raya Sukowono Jember
</h4>
<h5 style="text-align: center;">
  <u>Struk Nota Pengambilan Barang</u><br>
  <u>Gudang Sebelah Bakso Urat</u><br>
</h5>
<td><?php date_default_timezone_set("Asia/Jakarta"); echo date('d-m-Y'); ?></td>



  <table cellspacing="30">
     <tr>
      <th>No</th>
      <th>Nama Barang</th>                
      <th>Jumlah</th>
      <th>Harga</th>
      <th>Subtotal</th>                
      <th>Pilihan</th>                                
    </tr>
    <?php

      $query = mysqli_query($koneksi,"SELECT * FROM pemesanan_tmp JOIN po ON pemesanan_tmp.id_po=po.id_po WHERE sid='$sid'") or die(mysqli_error());
      $no=1;
      $ttl=0;
      while ($data = mysqli_fetch_array($query)) {    
        
    ?>
    <tr>
      <td><?php echo $no ?></td>
      <td><?php echo $data['nama']; ?></td>                        
      <td><?php echo $data['jumlah']; ?></td>                       
      <td><?php echo $data['harga']; ?></td>
      <?php 
      $subtotal = $data['jumlah'] * $data['harga'];
      $ttl = $ttl + $subtotal
      ?>
      <td style="text-align: right;"><?php echo $subtotal ?></td>
      <td><a class="btn btn-danger " href="?halaman=pemesanan&delete=<?php echo $data['id_po'] ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')"> <li class="fa fa-close"></li> </a></td>
    </tr>                        
    <?php $no++;} ?>
  </table>
<?php

$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;

?>

