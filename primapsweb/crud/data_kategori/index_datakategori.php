<?php 
  if(isset($_GET['delete'])){
    mysqli_query($koneksi,"DELETE FROM kategori WHERE idkat='$_GET[delete]'")or die(mysql_error());
    
  }

  if(isset($_POST['simpan'])){
    $kategori = $_POST['kategori'];
     
    mysqli_query($koneksi,"INSERT INTO kategori VALUES(NULL,'$kategori')");
     
    
  } 

  if(isset($_POST['edit'])){
    $idkat = $_POST['idkat'];
    $kategori = $_POST['kategori'];
     
    mysqli_query($koneksi,"UPDATE kategori SET kategori='$kategori'  WHERE idkat='$idkat'");

    echo "<script>window.location.href='?open=kategori_data'</script>";
    }
?>
<!-- Javascript untuk popup modal Edit--> 
<script src="js/jquery-1.7.2.min.js"></script>  
<script type="text/javascript">
    $(document).ready(function () {
        $(".click-edit").click(function(e) {
            var m = $(this).attr("id");
            $.ajax({
                url: "crud/data_kategori/edit.php",
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
              <h3>Data Kategori Barang</h3>

              <button class="btn btn-info btn-sm" id="btnUserTambah" data-toggle="modal" data-target="#ModalAdd">Tambah Data</button>	

              
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts"> 

				<div class="clearfix"></div>
				<p></p>
				<div class="table-responsive">
					<table class="table table-striped table-bordered  table-condensed ">
						<tr>
							<th>Id Kategori</th>
							<th>Kategori</th>
							<th colspan="2">Pilihan</th>
						</tr>
							<?php 
							  	
							  	$qri = mysqli_query($koneksi,"SELECT * FROM kategori") or die(mysqli_error());
							  	while ($data = mysqli_fetch_array($qri)) {	
					   		?>	
						<tr>
							<td><?php echo $data['idkat']; ?></td>
							<td><?php echo $data['kategori']; ?></td>
              

                <td>
                  <button class='btn btn-warning btn-xs btnSatuanUbah click-edit' id="<?php echo $data['idkat'] ?>" href="#" data-toggle="modal" data-target="#modaledit" >
                    <span class='shortcut-icon icon-pencil'></span>
                  </button>
                </td>
              
              
              <td align='center'> 
                <a class="btn btn-danger btn-xs btnSatuanHapus" href="beranda.php?open=kategori_data&delete=<?php echo $data['idkat'] ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')">
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

  <!-- Modal Add-->
  <div class="modal fade" id="ModalAdd" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah</h4>
        </div>
        <div class="modal-body">
          <div class="account-container register">
  
      <div class="content clearfix">
        
        <form action="beranda.php?open=kategori_data" method="post">
        
                
          
          <div class="kategori-fields">
            


            <div class="field">
              <label for="kategori">Nama Kategori:</label> 
              <input type="text" id="kategori" name="kategori" value="" class="kategori" />
            </div> <!-- /field -->
            
          </div> <!-- /login-fields -->
          
          <div class="kategori-actions">
                      
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
