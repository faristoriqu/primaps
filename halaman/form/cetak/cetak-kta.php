<?php
 // Define relative path from this script to mPDF
 $nama_dokumen='Cetak KTA-'.$_GET['cetak'];
include '../config/config.php';
include '../assets/mpdf60/mpdf.php';
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start(); 
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--CONTOH Code START-->
<table border="" cellspacing="0" cellpadding="0" style:"margin-bottom:3px;">
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
<?php 
session_start();
error_reporting();
$id_anggota = $_GET['cetak'];
$query = mysqli_query($connect,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'");
$data = mysqli_fetch_array($query);
?>
<h4> Identitas Anggota KPRI Jaya Wijaya</h4>
<table>
	<tr>
		<td>Kode Anggota</td>
		<td>:</td>
		<td><?php echo $data['id_anggota']; ?></td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><?php echo $data['nama']; ?></td>
	</tr>
	<tr>
		<td>Tempat Tanggal Lahir</td>
		<td>:</td>
		<td><?php echo $data['tmp_lahir'].', '.date("d-m-Y",strtotime($data['tgl_lahir'])); ?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><?php echo $data['alamat']; ?></td>
	</tr>
	<tr>
		<td>No. HP</td>
		<td>:</td>
		<td><?php echo $data['no_hp']; ?></td>
	</tr>
</table>
<hr>
<!-- Ambil Simpanan Pokok -->
<?php
$query2 = mysqli_query($connect,"SELECT * FROM simpanan WHERE id_anggota='$id_anggota' AND id_jenis_simpanan='JS0001'");
$data2 = mysqli_fetch_array($query2);
?>
<h4>Bukti Pembayaran Simpanan Pokok</h4>
<table>
	<tr>
		<td>Tgl</td>
		<td>:</td>
		<td><?php echo date('d-m-Y',strtotime($data2['tgl_simpanan'])); ?></td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td>Besar Simpanan</td>
		<td>:</td>
		<td><?php echo number_format($data2['besar_simpanan'],'2',',','.'); ?></td>
	</tr>
</table>
<br><br>
<table style="margin-left:500px;">
	<tr>
		<td style="text-align: center;">Petugas</td>
	</tr>
	<tr>
		<td style="padding-top: 40px;"></td>
	</tr>
	<tr>
		<td style="text-align: center;">
			<?php  
			if ($_SESSION['hak_akses']=='Admin') {
				echo $_SESSION['username'];
			} else if($_SESSION['hak_akses']=='Petugas'){
				$id_petugas = $_SESSION['id_petugas'];
				$query1 = mysqli_query($connect,"SELECT * FROM petugas JOIN anggota ON petugas.id_anggota=anggota.id_anggota WHERE id_petugas='$id_petugas'");
				$data1 = mysqli_fetch_array($query1);
				echo $data1['nama'];
			}
		?>
		</td>
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