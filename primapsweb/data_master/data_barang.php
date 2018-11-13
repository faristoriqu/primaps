

<div class="main">  
  <div class="main-inner">
    <div class="container">
    	<span id="dataTambahUbah"></span>

    		<div class="row">
        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-copy"></i>
              <h3>Data Barang</h3>
              <button type="submit" class="btn btn-info btn-sm" id="btnBarangTambah">Tambah Data Barang</button>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts"> 

				<div class="clearfix"></div>
				<p></p>
				<div class="table-responsive">
					<table class="table table-striped table-bordered  table-condensed ">
						<tr>
							<th>Id Barang</th>
							<th>Nama Barang</th>
							<th>Idkat</th>
							<th>Stok</th>
							<th>Ids</th>
							<th>Hargab</th>
							<th >Hargaj</th>
						</tr>
						<?php 
						include "koneksi.php";
						$query_mysql = mysqli_query($koneksi,"SELECT * FROM tabelbarang")or die(mysql_error());
						// $nomor = 1;
						while($data = mysqli_fetch_array($query_mysql)){
						?>
						<tr>
							
							<td><?php echo $data['id_barang']; ?></td>
							<td><?php echo $data['namabarang']; ?></td>
							<td><?php echo $data['idkat']; ?></td>

				            <td><?php echo $data['stok']; ?></td>
				            <td><?php echo $data['ids']; ?></td>
				            <td><?php echo $data['hargab']; ?></td>
				            <td><?php echo $data['hargaj']; ?></td>
				            
							<td>
								<a class="edit" href="edite.php?id=<?php
								 echo $data['id_barang']; ?>">Edit</a> |
								<a class="hapus" href="hapus.php?id=<?php 
								echo $data['id_barang']; ?>">Hapus</a>					
							</td>

						</tr>
					<?php } ?>
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
