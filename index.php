<?php 
  include 'config/koneksi.php';
 ?>
<!doctype html>
<html>
    <head>
    	<?php include 'include/head.php'; ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini" background="image/grey-gradient-abstract-background.jpeg">
        <div class="wrapper">

        	<?php 
        	include 'include/header.php'; 
        	include 'include/sidebar.php'; 
        	?>
        	<div class="content-wrapper">
                <div class="row">
                    <?php 
                        
                        if(isset($_GET['halaman'])){
                            if($_GET['halaman']=='barang') {
                                include 'halaman/form/barang/barang.php';
                            }else if($_GET['halaman']=='data_kategori') {
                                include 'halaman/form/data_kategori/data_kategori.php';   
                            }else if($_GET['halaman']=='data_satuan') {
                                include 'halaman/form/data_satuan/data_satuan.php';
                            }else if($_GET['halaman']=='register') {
                                include 'halaman/register/register.php';
                            }else if($_GET['halaman']=='supplier') {
                                include 'halaman/form/supplier/data_supplier.php';
                            }else if($_GET['halaman']=='barang_masuk') {
                                include 'halaman/form/barang_masuk/barang_masuk.php';
                            }else if($_GET['halaman']=='transaksi') {
                                include 'halaman/form/transaksi/transaksi.php';
                            }
                        }else{
                            include 'halaman/dashboard/dashboard.php';
                        }
                    ?>
                
                </div>
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
