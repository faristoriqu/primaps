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
      <td>No</td>
      <td>Nama Barang</td>
      <td>Jumlah Beli</td>
      <td>Satuan</td>
    </tr>
    <?php

      $query = mysqli_query($koneksi,"SELECT * FROM detail_pemesanan  join po on detail_pemesanan.id_po = po.id_po WHERE detail_pemesanan.kode_pemesanan='$sid'") or die(mysqli_error());
      $no=1;
      $ttl=0;
      while ($data = mysqli_fetch_array($query)) {    
        
    ?>
    <tr cellspacing="5">
      <td><?php echo $no ?></td>
      <td><?php echo $data['nama']; ?></td>
      <td><?php echo $data['jumlah']; ?></td>
      
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

