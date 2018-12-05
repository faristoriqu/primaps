<?php
 // Define relative path from this script to mPDF
 $nama_dokumen='Cetak LHK-';
include "../config/koneksi.php";
include '../mpdf60/mpdf.php';
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start(); 
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--CONTOH Code START-->
<!-- <table border="" cellspacing="0" cellpadding="0" style:"margin-bottom:3px;">
	<tr style="padding-left:-20px;">
                <td rowspan="6" width="100"><img src="" height="90"/></td>
                <td style="text-align: center; font-size: 17px"><b>Koperasi Simpan Pinjam</b></td>
    </tr>
            <tr>
                <td style="text-align: center; font-size: 18px"><b>KPRI Jaya Wijaya</b></td>
            </tr>
            <tr>
                <td style="font-size: 15px; text-align: center">Kantor : Jln. Panglima Besar Sudirman No. 93 - No Telp : (0334) 111 222</td>
            </tr>
</table> -->
<?php
$no_lhk = $_GET['lhk'];
?>
<table>
	<tr>
		<td><img height="100" width="200" src="../img/japfa.jpeg" alt=""></td>
		<td style="padding-left: 300px;"></td>
		<td style="padding-top: 0px;">No. LHK : 0001603</td>
	</tr>
</table>
<table width="100%" style="border:1px solid black;">
	<tr>
		<td style="text-align: center"><b>LAPORAN HARIAN PEMELIHARAAN AYAM BROILER</b></td>
	</tr>
</table>
<br>


	<table>
		<tr>
			<td>Nama Peternak :</td>	
			<td>Ahmad Junaidi</td>
		</tr>
		<tr>
			<td>Alamat :</td>
			<td>Sukowono</td>
		</tr>
	</table>	
</div>


<!--CONTOH Code END-->

