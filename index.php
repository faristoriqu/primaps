<?php 
  include 'config/koneksi.php';
 ?>
<!doctype html>
<html>
    <head>
    	<?php include 'include/head.php'; ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
        	<?php 
        	include 'include/header.php'; 
        	include 'include/sidebar.php'; 
        	?>
        	<div class="content-wrapper">
                <?php 
                    
                if(isset($_GET['halaman'])){
                    if($_GET['halaman']=='siswa') {
                        include 'halaman/form/siswa.php';
                        // include 'pages/tables/data.html';
                        include 'halaman/table/data_siswa.php';
                    }else if($_GET['halaman']=='barang') {
                        include 'halaman/form/barang/barang.php';
                        
                    }else if($_GET['halaman']=='data_satuan') {
                        include 'halaman/form/data_satuan.php';
                    }else if($_GET['halaman']=='data_siswa') {
                        include 'halaman/table/data_siswa.php';
                    }else if($_GET['halaman']=='barang') {
                        include 'halaman/form/barang/barang.php';
                    }else if($_GET['halaman']=='data_siswa_kelas1') {
                        include 'halaman/table/data_siswa_kelas1.php';
                    }else if($_GET['halaman']=='data_siswa_kelas2') {
                        include 'halaman/table/data_siswa_kelas2.php';
                    }else if($_GET['halaman']=='data_siswa_kelas3') {
                        include 'halaman/table/data_siswa_kelas3.php';
                    }else if($_GET['halaman']=='data_siswa_kelas4') {
                        include 'halaman/table/data_siswa_kelas4.php';
                    }else if($_GET['halaman']=='data_siswa_kelas5') {
                        include 'halaman/table/data_siswa_kelas5.php';
                    }else if($_GET['halaman']=='data_siswa_kelas6') {
                        include 'halaman/table/data_siswa_kelas6.php';
                    }else if($_GET['halaman']=='cetak1') {
                        include 'halaman/table/cetak1.php';
                    }else if($_GET['halaman']=='cetaksemua') {
                        include 'halaman/table/cetaksemua.php';
                    }else if($_GET['halaman']=='register') {
                        include 'halaman/register/register.php';
                    }else if($_GET['halaman']=='nilai') {
                        include 'halaman/form/nilai.php';
                    }else if($_GET['halaman']=='supplier') {
                        include 'halaman/form/supplier/data_supplier.php';
                    }

            }
                ?>
        	</div>
	        <?php 	
	        	include 'include/footer.php';
	        ?>
	        <div class="control-sidebar-bg"></div>
        </div>

            <?php  
                include 'include/script.php';
            ?>
    </body>
</html>
