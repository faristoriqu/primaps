<?php 
  if(isset($_GET['delete'])){
    mysqli_query($koneksi,"DELETE FROM tabelbarang WHERE id_barang='$_GET[delete]'")or die(mysql_error());
    
  }

  if(isset($_POST['simpan'])){
    $id_barang = $_POST['id_barang'];
    $namabarang = $_POST['namabarang'];
    $idkat = $_POST['idkat'];
    $stok = $_POST['stok'];
    $ids = $_POST['ids'];
    $hargab = $_POST['hargab'];
    $hargaj = $_POST['hargaj'];
    
     
    mysqli_query($koneksi,"INSERT INTO tabelbarang VALUES('$id_barang','$namabarang', '$idkat', '$stok', '$ids','$hargab','$hargaj')");
     
    echo "<script>window.location.href='?open=barang_data'</script>";
  } 

  if(isset($_POST['edit'])){
    $id_barang = $_POST['id_barang'];
    $namabarang = $_POST['namabarang'];
    $idkat = $_POST['idkat'];
    $stok = $_POST['stok'];
    $ids = $_POST['ids'];
    $hargab = $_POST['hargab'];
    $hargaj = $_POST['hargaj'];
    
     
    mysqli_query($koneksi,"UPDATE tabelbarang SET namabarang='$namabarang', idkat='$idkat', stok='$stok', ids='$ids', hargab='$hargab',hargaj='$hargaj'  WHERE id_barang='$id_barang'");

    echo "<script>window.location.href='?open=barang_data'</script>";
    }
?>
<!-- Javascript untuk popup modal Edit--> 
<script src="js/jquery-1.7.2.min.js"></script>  
<script type="text/javascript">
    $(document).ready(function () {
        $(".click-edit").click(function(e) {
            var m = $(this).attr("id");
            $.ajax({
                url: "crud/data_barang/edit.php",
                type: "POST",
                data : {id: m,},
                success: function (ajaxData){
                    $("#modaledit").html(ajaxData);
                }
            });
        });
    });
</script>
  
<div class="main">  
  <div class="main-inner">
    <div class="container">
    	<span id="dataTambahUbah"></span>

    		<div class="row">
        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-copy"></i>
              <h3>Data Barang</h3>

              <button class="btn btn-info btn-sm" id="btnBarangTambah" data-toggle="modal" data-target="#ModalAdd">Tambah </button>	

              
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
							<th>HargaB</th>
							<th>HargaJ</th>
							
						</tr>
							<?php 
							  	
							  	$qri = mysqli_query($koneksi,"SELECT * FROM tabelbarang") or die(mysqli_error());
							  	while ($data = mysqli_fetch_array($qri)) {	
					   		?>	
						<tr>
							<td><?php echo $data['id_barang']; ?></td>
							<td><?php echo $data['namabarang']; ?></td>
              <td><?php echo $data['idkat']; ?></td>
              <td><?php echo $data['stok']; ?></td>
              <td><?php echo $data['ids']; ?></td>
							<td><?php echo $data['hargab'];  ?></td>
							<td><?php echo $data['hargaj']; ?></td>
              

                <td>
                  <button class='btn btn-warning btn-xs btnSatuanUbah click-edit' id="<?php echo $data['id_barang'] ?>" href="#" data-toggle="modal" data-target="#modaledit" >
                    <span class='shortcut-icon icon-pencil'></span>
                  </button>
                </td>
              
              
              <td align='center'> 
                <a class="btn btn-danger btn-xs btnSatuanHapus" href="beranda.php?open=barang_data&delete=<?php echo $data['id_barang'] ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')">
                <span class="shortcut-icon icon-remove">
                    
                </span>
                </a>
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
    <div class="modal fade" id="modaledit" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Barang/h4>
                </div>
                <div class="modal-body">
                    <div class="hasil-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>

  <!-- Modal Add-->
  <div class="modal fade" id="ModalAdd" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Barang</h4>
        </div>
        <div class="modal-body">
          <div class="account-container tambah barang">
  
      <div class="content clearfix">
        
        <form action="beranda.php?open=barang_data" method="post">
        
                
          
          <div class="barang-fields">
            
             <div class="field">
              <label for="id_barang">Id Barang</label>
              <input type="text" id="id_barang" name="id_barang" value=""  class="barang" />
            </div> <!-- /field --> 
            
            <div class="field">
              <label for="namabarang">Nama Barang</label> 
              <input type="text" id="namabarang" name="namabarang" value="" class="barang" />
            </div> <!-- /field -->
            
            <div class="barang-fields">
            
             <div class="field">
              <label for="idkat">Idkat</label>
              <input type="text" id="idkat" name="idkat" value=""  class="barang" />
            </div> <!-- /field --> 
          
            <div class="field">
              <label for="stok">Stok</label> 
              <input type="text" id="stok" name="stok" value="" class="barang" />
            </div> <!-- /field -->
            
            <div class="field">
              <label for="ids">Ids</label>
              <input type="text" id="ids" name="ids" value=""  class="barang" />
            </div> <!-- /field --> 
          
            <div class="field">
              <label for="hargab">HargaB</label>
              <input type="text" id="hargab" name="hargab" value=""  class="barang"/>
            </div> <!-- /field -->
            
            <div class="field">
              <label for="hargaj">HargaJ</label>
              <input type="text" id="hargaj" name="hargaj" value=""  class="barang"/>
            </div> <!-- /field -->
             
          <div class="barang-actions">
                      
            <!-- <button class="button btn btn-primary btn-large" type="submit" value="Simpan">Simpan</button> -->
            <input type="submit" class="button btn btn-primary btn-large" name="simpan" id="insert" value="simpan">
          </div> <!-- .actions -->
          
        </form>
        
      </div> <!-- /content -->
      
    </div> <!-- /account-container -->

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<div class="modal fade bs-example-modal-lg" id="modaledit" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
</div>
