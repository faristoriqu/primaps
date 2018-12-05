<?php
 // Define relative path from this script to mPDF
 $nama_dokumen='Cetak Bukti -'.$_GET['val'];
include '../config/koneksi.php';
include '../vendors/mpdf60/mpdf.php';
$no_regist_masuk = $_GET['val'];
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start(); 
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--CONTOH Code START-->

<h4 style="text-align: center;">
	INSTALASI PERBEKALAN FARMASI KABUPATEN LUMAJANG
	<br>
	JL. MAHAKAM NO. 103 TELP. 0334-882981 LUMAJANG
</h4>
<h5 style="text-align: center;">
	<u>Laporan Data Logistik</u><br>Per Tanggal <?php echo date("d-m-Y"); ?>
</h5>
<table border="1" style="border-collapse: collapse;width: 100%">
	<thead>
		<tr>
			<th>No.</th>
			<th style="width: 15%;text-align: center;">Kode Obat</th>
			<th>Nama Obat</th>
			<th>Stok</th>
			<th>Harga Satuan</th>
			<th>Asal Anggaran</th>
		</tr>
	</thead>

	<tbody>
		<?php
		$no = 1;
		$query = $connect->query("SELECT * FROM kat_logistik");
		foreach($query as $data){
		?>
		<tr>
			<td colspan="6" style="text-align: center;font-style: italic;"><?php echo $data['nm_kat_logistik']; ?></td>
		</tr>
		<?php
			
			$query2 = $connect->query("SELECT * FROM logistik JOIN anggaran ON logistik.id_anggaran=anggaran.id_anggaran WHERE id_kat_logistik='$data[id_kat_logistik]'");
			foreach ($query2 as $data2) {
		?>
		<tr>
			<td style="text-align: center;"><?php echo $no++."."; ?></td>
			<td style="text-align: center;"><?php echo $data2['id_logistik']; ?></td>
			<td><?php echo $data2['nm_logistik']; ?></td>
			<td style="text-align: right;"><?php echo $data2['stok']; ?></td>
			<td style="text-align: right;"><?php echo "Rp. ".number_format($data2['harga_satuan'],2,',','.'); ?></td>
			<td><?php echo $data2['asal_anggaran']; ?></td>
		</tr>
		<?php
			}
		}
		?>
		
	</tbody>
</table>




<!--CONTOH Code END-->
 
<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>