<?php
 // Define relative path from this script to mPDF
 $nama_dokumen='Cetak Bukti -'.$_GET['val'];
include '../config/koneksi.php';
include '../vendors/mpdf60/mpdf.php';
$no_regist_keluar = $_GET['val'];
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
	<u>Surat Bukti Barang Keluar</u><br>SBBK
</h5>
<?php
//Query Untuk Menampilkan Isi Table Logistik Masuk
$query = $connect->query("SELECT * FROM v_tlk WHERE no_regist_keluar='$no_regist_keluar'");
foreach ($query as $data) {
	$tgl_regist = $data['tgl_keluar'];
	$tgl_indo = date('d-m-Y',strtotime($tgl_regist));
?>
<table>
	<tr>
		<td>Penerima : </td>
		<td><?php echo $data['nm_penerima']; ?></td>
		<td style="width: 350px;"></td>
		<td>Tanggal : </td>
		<td><?php echo $tgl_indo; ?></td>
	</tr>
	<tr>
		<td colspan="2"></td>
		<td></td>
		<td>Nomor :</td>
		<td><?php echo $no_regist_keluar; ?></td>
	</tr>
</table>
<?php } ?>
<br>
<?php 
$query2 = $connect->query("SELECT * FROM trx_detail_logistik_keluar tdlk JOIN logistik ON tdlk.id_logistik=logistik.id_logistik JOIN anggaran ON logistik.id_anggaran=anggaran.id_anggaran WHERE no_regist_keluar='$no_regist_keluar' ");
$no = 1;
foreach($query2 as $data2){
?>
<table border="1" style="border-collapse: collapse;">
	<tr>
		<td style="text-align: center;">No.</td>
		<td style="text-align: center;">Nama Obat</td>
		<td style="text-align: center;">Satuan Kemasan</td>
		<td style="text-align: center;">Jumlah Diberikan</td>
		<td style="text-align: center;">Harga Per Unit+PPN</td>
		<td style="text-align: center;">Jumlah Harga</td>
		<td style="text-align: center;">KET/ETD</td>
	</tr>
	<tr>
		<td><?php echo $no++; ?> </td>
		<td><?php echo $data2['nm_logistik']; ?></td>
		<td><?php echo $data2['satuan']; ?></td>
		<td><?php echo $data2['qty']; ?></td>
		<td><?php echo $data2['harga_satuan']+($data2['harga_satuan']/10); ?></td>
		<td><?php echo $data2['subtotal']; ?></td>
		<td><?php echo $data2['asal_anggaran']; ?></td>
	</tr>
</table>
<?php } ?>
<p style="text-align: right;">Lumajang, <?php echo $tgl_indo; ?></p>
<table align="center">
	<tr>
		<td style="text-align: center;">Kepala Instansi</td>
		<td width="150px;"></td>
		<td style="text-align: center;">Yang Menyerahkan</td>
		<td width="150px;"></td>
		<td style="text-align: center">Penerima</td>
	</tr>
	<tr style="">
		<td colspan="5" style="height: 80px;"></td>
	</tr>
	<tr>
		<?php
		$query3 = $connect->query("SELECT nama as nm_pegawai,nip,nm_penerima,nip_penerima FROM trx_logistik_keluar tlk JOIN pegawai ON tlk.id_pegawai_pimpinan=pegawai.id_pegawai WHERE no_regist_keluar='$no_regist_keluar'");
		foreach($query3 as $data3){
			$nip_pimpinan = $data3['nip'];
		?>
		<td style="text-align: center;"><?php echo $data3['nm_pegawai'];; ?></td>
		<?php } ?>
		<td rowspan="3"></td>
		<?php
		$query4 = $connect->query("SELECT nama as nm_pegawai,nip,nm_penerima,nip_penerima FROM trx_logistik_keluar tlk JOIN pegawai ON tlk.id_pegawai_pen_jawab=pegawai.id_pegawai WHERE no_regist_keluar='$no_regist_keluar'");
		foreach($query4 as $data4){
			$nip_penanggung_jawab = $data4['nip'];
			$nip_penerima = $data4['nip_penerima'];
		?>
		<td style="text-align: center;"><?php echo $data4['nm_pegawai']; ?></td>
		<td rowspan="3"></td>
		<td style="text-align: center"><?php echo $data4['nm_penerima']; ?></td>
		<?php } ?>
	</tr>
	
	<tr>
		<td><hr style="color: black;"></td>
		<td><hr style="color: black;"></td>
		<td><hr style="color: black"></td>
	</tr>
	<tr>
		<td style="text-align: center;"><?php echo $nip_pimpinan; ?></td>
		<td style="text-align: center;"><?php echo $nip_penanggung_jawab; ?></td>
		<td style="text-align: center"><?php echo $nip_penerima; ?></td>

	</tr> 
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