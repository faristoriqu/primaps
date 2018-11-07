
<div class="main">  
  <div class="main-inner">
    <div class="container">
    	<span id="dataTambahUbah"></span>

    		<div class="row">
        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-copy"></i>
              <h3>Data Supplier</h3>
              <button type="submit" class="btn btn-info btn-sm" id="btnUserTambah" onclick="location='crud/data_kandang/coba.php'">Tambah Data</button> 
              <!-- <a href="crud/data_kandang/coba.php" class="btn btn-info btn-sm">Test COy</a> -->
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts"> 

				<div class="clearfix"></div>
				<p></p>
				<div class="table-responsive">
					<table class="table table-striped table-bordered  table-condensed "> 
						<tr>
							<th>Kode Barang </th>
							<th>Nama Barang</th>
							<th>Harga</th>
							<th>Pilihan</th>
						</tr>
						<?php 
						// include "koneksi.php";
						// $query_mysql = mysqli_query($koneksi,"SELECT * FROM login")or die(mysql_error());
						// // $nomor = 1;
						// while($data = mysqli_fetch_array($query_mysql)){
						?>
						<tr>
							
							<td>
								<?php 
									// echo $data['id_user'];
							 	?>
							</td>
							<td><?php
							 // echo $data['username']; 
							 ?></td>
				            <td></td>
							<td>
								<a class="edit" href="edit.php?id=<?php 
								// echo $data['id_user']; 
								?>">Edit</a> |
								<a class="hapus" href="hapus.php?id=<?php 
								// echo $data['id_user']; 
								?>">Hapus</a>					
							</td>

						</tr>
					<?php 
						// } 
					?>
					</table>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
        </div>
        <!-- span -->
      </div>
    	
    </div> <!-- /container -->
  </div> <!-- /main-inner -->
</div> <!-- /main -->
 
