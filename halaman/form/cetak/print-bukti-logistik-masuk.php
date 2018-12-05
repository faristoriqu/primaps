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
	Laporan Gudang Pengadaan Barang
</h5>
<?php
//Query Untuk Menampilkan Isi Table Logistik Masuk
$query = $connect->query("SELECT * FROM v_tlm WHERE no_regist_masuk='$no_regist_masuk'");
foreach ($query as $data) {
	$tgl_regist = date("d-m-Y",strtotime($data['tgl_regist']));
?>
<table>
	<tr>
		<td>Supplier : </td>
		<td><?php echo $data['nm_supplier']; ?></td>
		<td style="width: 350px;"></td>
		<td>Tanggal : </td>
		<td><?php echo $tgl_regist; ?></td>
	</tr>
	<tr>
		<td colspan="2"></td>
		<td></td>
		<td>Nomor :</td>
		<td><?php echo $no_regist_masuk; ?></td>
	</tr>
</table>
<?php } ?>
<br>
<?php 
$query2 = $connect->query("SELECT * FROM trx_detail_logistik_masuk tdlm JOIN logistik ON tdlm.id_logistik=logistik.id_logistik JOIN anggaran ON logistik.id_anggaran=anggaran.id_anggaran WHERE no_regist_masuk='$no_regist_masuk' ");
$no = 1;
foreach($query2 as $data2){
?>
<table border="1" style="border-collapse: collapse;">
	<tr>
		<td>No.</td>
		<td>Nama Obat</td>
		<td>Satuan Kemasan</td>
		<td>Jumlah Diberikan</td>
		<td>Harga Per Unit</td>
		<td>Jumlah Harga</td>
		<td>KET/ETD</td>
	</tr>
	<tr>
		<td><?php echo $no++; ?> </td>
		<td><?php echo $data2['nm_logistik']; ?></td>
		<td><?php echo $data2['satuan']; ?></td>
		<td><?php echo $data2['qty']; ?></td>
		<td><?php echo $data2['harga_satuan']; ?></td>
		<td><?php echo $data2['subtotal']; ?></td>
		<td><?php echo $data2['asal_anggaran']; ?></td>
	</tr>
</table>
<?php } ?>
<p style="text-align: right;">Lumajang, <?php echo $tgl_regist; ?></p>
<table align="center">
	<tr>
		<td style="text-align: center;">Kepala Instansi</td>
		<td width="150px;"></td>
		<td style="text-align: center;">Penanggung Jawab Transaksi</td>
	</tr>
	<tr style="">
		<td colspan="3" style="height: 80px;"></td>
	</tr>
	<tr>
		<?php
		$query3 = $connect->query("SELECT nama as nm_pegawai,nip FROM trx_logistik_masuk tlm JOIN pegawai ON tlm.id_pegawai_pimpinan=pegawai.id_pegawai WHERE no_regist_masuk='$no_regist_masuk'");
		foreach($query3 as $data3){
			$nip_pimpinan = $data3['nip'];
		?>
		<td style="text-align: center;"><?php echo $data3['nm_pegawai'];; ?></td>
		<?php } ?>
		<td rowspan="3"></td>
		<?php
		$query4 = $connect->query("SELECT nama as nm_pegawai,nip FROM trx_logistik_masuk tlm JOIN pegawai ON tlm.id_pegawai_pen_jawab=pegawai.id_pegawai WHERE no_regist_masuk='$no_regist_masuk'");
		foreach($query4 as $data4){
			$nip_penanggung_jawab = $data4['nip'];
		?>
		<td style="text-align: center;"><?php echo $data4['nm_pegawai']; ?></td>
		<?php } ?>
	</tr>
	<tr>
		<td><hr style="color: black;"></td>
		<td><hr style="color: black;"></td>
	</tr>
	<tr>
		<td style="text-align: center;"><?php echo $nip_pimpinan; ?></td>
		<td style="text-align: center;"><?php echo $nip_penanggung_jawab; ?></td>
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