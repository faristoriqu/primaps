<?php
 // Define relative path from this script to mPDF
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
 $nama_dokumen='Report Barang Keluar';
include '../config/koneksi.php';
include '../vendors/mpdf60/mpdf.php';
$no_regist_masuk = $_GET['val'];
$mpdf=new mPDF('utf-8', 'A4-L'); // Create new mPDF Document
 
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
	<u>Laporan Data Logistik Keluar</u><br>Per Tanggal <?php echo date("d-m-Y"); ?>
</h5>
<table border="1" style="border-collapse: collapse;width: 100%">
	<thead>
		<tr>
			<th>No</th>
			<th>No Regist</th>
			<th style="width: 20%;text-align: center;">Tgl Keluar</th>
			<th>Penanggung Jawab</th>
			<th>Instansi Penerima</th>
			<th>Nama Penerima</th>
			<th>NIP Penerima</th>
			<th>Grand Total</th>
			<th>Status</th>
		</tr>
	</thead>

	<tbody>
		<?php
		if(isset($_GET['filter_by'])){
            if($_GET['filter_by']=="date"){
                $param = "filter_by=".$_GET['filter_by']."&tgl=".$_GET['tgl'];
                $query = $connect->query("SELECT * FROM v_tlk WHERE tgl_keluar='$_GET[tgl]'");
            }elseif ($_GET['filter_by']=="month" || $_GET['filter_by']=="year" || $_GET['filter_by']=="custom") {
                $tanggal_awal = $_GET['tgl_awal'];
                $tanggal_akhir = $_GET['tgl_akhir'];
                $param = "filter_by=".$_GET['filter_by']."&tgl_awal=".$tanggal_awal."&tgl_akhir=".$tanggal_akhir;
                $query = $connect->query("SELECT * FROM v_tlk WHERE tgl_keluar BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
            }
        }else{
            $query = $connect->query("SELECT * FROM v_tlk");
        }
		$no = 1;
		foreach($query as $data){
		?>
		<tr>
			<td style="text-align: center;"><?php echo $no++."."; ?></td>
			<td style="text-align: left;padding-left: 5px;"><?php echo $data['no_regist_keluar']; ?></td>
			<td style="text-align: left;padding-left: 5px;"><?php echo tgl_indo($data['tgl_keluar']); ?></td>
			<td style="text-align: left;padding-left: 5px"><?php echo $data['nama']; ?></td>
			<td style="text-align: left;padding-left: 5px"><?php echo $data['nm_instansi_penerima']; ?></td>
			<td style="text-align: left;padding-left: 5px"><?php echo $data['nm_penerima']; ?></td>
			<td style="text-align: left;padding-left: 5px"><?php echo $data['nip_penerima']; ?></td>
			<td style="text-align: right;"><?php echo "Rp. ".number_format($data['grand_total'],2,',','.'); ?></td>
			<?php if ($data['status']==1) {
			?>
			<td style="text-align: center;">Selesai</td>
			<?php } else if($data['status']==2) { ?>
			<td style="text-align: center;">Cancel</td>
			<?php } else { ?>
			<td style="text-align: center;">Proses</td>
		<?php } ?>
		</tr>
		<?php
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