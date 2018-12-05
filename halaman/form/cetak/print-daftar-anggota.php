<?php
 // Define relative path from this script to mPDF
 $nama_dokumen='Cetak KTA-'.$_GET['cetak'];
include '../config/config.php';
include '../assets/mpdf60/mpdf.php';
$mpdf=new mPDF('utf-8', 'A4-L'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start(); 
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--CONTOH Code START-->
<table border="" cellspacing="0" cellpadding="0" style:"margin-bottom:3px;" style="margin-left: 18%;">
	<tr style="padding-left:-20px;">
                <td rowspan="6" width="100"><img src="../assets/img/kpri-logo.png" height="90"/></td>
                <td style="text-align: center; font-size: 17px"><b>Koperasi Simpan Pinjam</b></td>
    </tr>
            <tr>
                <td style="text-align: center; font-size: 18px"><b>KPRI Jaya Wijaya</b></td>
            </tr>
            <tr>
                <td style="font-size: 15px; text-align: center">Kantor : Jln. Panglima Besar Sudirman No. 93 - No Telp : (0334) 111 222</td>
            </tr>
</table>
<hr style="color:2px solid black">
<br>
<h4 align="center">Daftar Anggota</h4>

<table border="1" style="border-collapse: collapse;" width="100%">
	<thead>
		<tr>
			<td style="text-align: center;">No.</td>
			<td style="text-align: center;">Kode Anggota</td>
			<td style="text-align: center;">Nama Anggota</td>
			<td style="text-align: center;">TTL</td>
			<td style="text-align: center;">Jenis Kelamin</td>
			<td style="text-align: center;">No. HP</td>
			<td style="text-align: center;">Alamat</td>
		</tr>
	</thead>
	<tbody>
	<?php
	$no = 1;
	$query = mysqli_query($connect,"SELECT * FROM anggota");
	while ($data=mysqli_fetch_array($query)) {
	?>
		<tr>
			<td style="padding-left: 4px;"><?php echo $no++; ?></td>
			<td style="padding-left: 4px;"><?php echo $data['id_anggota']; ?></td>
			<td style="padding-left: 4px; width: 20%"><?php echo $data['nama']; ?></td>
			<td style="padding-left: 4px;"><?php echo $data['tmp_lahir'].', '.date("d-m-Y",strtotime($data['tgl_lahir'])); ?></td>
			<td style="padding-left: 4px;width: 8%"><?php echo $data['j_kel']; ?></td>
			<td style="padding-left: 4px;"><?php echo $data['no_hp']; ?></td>
			<td style="padding-left: 4px;"><?php echo $data['alamat']; ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<p style="font-style: italic;">** Dicetak Tanggal <?php echo date("d-m-Y"); ?></p>


<!--CONTOH Code END-->
 
<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>