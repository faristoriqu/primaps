<?php 
  if(isset($_GET['delete'])){
    $query_delete = mysqli_query($koneksi,"DELETE FROM supplier WHERE id_supplier='$_GET[delete]'")or die(mysql_error());
    
    if ($query_delete == TRUE) {
      echo "<script>window.location.href='?halaman=supplier'</script>";
    }else{
      echo "gagal";
    }
  }

  if(isset($_POST['simpan'])){
    
    $namasupplier = $_POST['namasupplier'];
    $alamat = $_POST['alamat'];
    $telefon = $_POST['telefon'];
     
    $query_tambah = mysqli_query($koneksi,"INSERT INTO supplier VALUES(NULL,'$namasupplier','$alamat','$telefon')");
     
    if($query_tambah == TRUE){
      
    } else{
      echo "gagal";
    }
  } 

  if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $id_supplier = $_POST['id'];
    $namasupplier = $_POST['namasupplier'];
    $alamat = $_POST['alamat'];
    $telefon = $_POST['telefon'];
     
    $query_edit=mysqli_query($koneksi,"UPDATE supplier SET id_supplier='$id_supplier',namasupplier='$namasupplier', alamat='$alamat',telefon='$telefon'  WHERE id_supplier='$id'");

    if($query_edit==TRUE){
      echo "<script>window.location.href='?halaman=supplier'</script>";
    }else{
      echo "gagal";
    }
    }
?>


<section class="content">
  <div class="data">
    <div class="col-sm-13">
      <div class="box box-primary">
            
            <div class="box-header">
	            	<form class="form-horizontal" action="?halaman=supplier" method="POST">
	                
		                <div class="form-group">
		                  <label  class="col-sm-2 control-label">Nama Supplier</label>
		                  <div class="col-sm-6">
		                    <input type="text" class="form-control" id="namasupplier"  name="namasupplier" placeholder="Nama Supplier">
		                  </div>
		                </div>

		                <div class="form-group">
		                  <label  class="col-sm-2 control-label">Alamat</label>
		                  <div class="col-sm-6">
		                    <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat"></textarea>
		                  </div>
		                </div>

		                <div class="form-group">
		                  <label  class="col-sm-2 control-label">Telefon</label>
		                  <div class="col-sm-6">
		                    <input type="text" class="form-control" id= "telefon" name="telefon" placeholder="Telefon">
		                  </div>
		                </div>

		                <div class="form-group">
			                <center>
			                	
			                	<button type="submit" class="btn btn-info" name="simpan">Simpan</button>
			                </center>
			            </div>
	            	</form>
           	</div >
            <div class="box-body">
            	<div class="container">
	            	<div class="col-sm-8 " >
			            <table id="example2" class="table table-bordered table-striped table-center">
				                <thead>
				                  <tr>
				                    <th>No</th>
				                    <th>Nama Supplier</th>
				                    <th>Alamat</th>
				                    <th>Telefon</th>
				                    <th>Pilihan</th>
				                  </tr>
				                </thead>
				                <?php 
				                  
				                  $query = mysqli_query($koneksi,"SELECT * FROM supplier") or die(mysqli_error());
				                  $no=1;
				                  while ($data = mysqli_fetch_array($query)) {  
				                ?>  
				                <tbody>
				                  <tr>
				                    <td><?php echo $no ?></td>
				                    <td><?php echo $data['namasupplier']; ?></td>
				                    <td><?php echo $data['alamat']; ?></td>
				                    <td><?php echo $data['telefon']; ?></td>
				                    <td>
				                      <button class="btn btn-warning click-edit" id="<?php echo $data['id_supplier'] ?>"><li class="fa fa-pencil"></li></button>

				                      <a class="btn btn-danger " href="?halaman=supplier&delete=<?php echo $data['id_supplier'] ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')"> <li class="fa fa-close"></li> </a>

				                    </td>
				                    
				                  </tr>
				                </tbody>
				                <?php $no++; }  ?>
			            </table>
			        </div>
		        </div>    
            </div>
      </div>
    </div>
  </div>
</section>  
<script src="bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
      $("#tambah").hide();
        $("#click-tambah").click(function(e) {
          e.preventDefault()
            $("#tambah").show();
        });
        $(document).ready(function () {
        $(".click-edit").click(function(e) {
            var m = $(this).attr("id");
            $.ajax({
                url: "halaman/form/supplier/edit.php",
                type: "POST",
                data : {id: m,},
                success: function (ajaxData){
                    $("#edit").html(ajaxData);
                }
            });
        });
    });
        $("#hideform").click(function(e) {
          e.preventDefault()
            $("#tambah").hide();
        });
        $("#hideforme").click(function(e) {
          e.preventDefault()
            $("#edit").hide();
        });
    });
</script>

