<html>
<head>
  <title>
    Barang
  </title>
</head>
<?php 
  if(isset($_GET['delete'])){
    $query_delete = mysqli_query($koneksi,"DELETE FROM barang WHERE id_barang='$_GET[delete]'")or die(mysql_error());
    
    if ($query_delete == TRUE) {
      echo "<script>window.location.href='?halaman=barang'</script>";
    }else{
      echo "gagal";
    } 
  }

  if(isset($_POST['simpan'])){
    
    $namabarang = $_POST['namabarang'];
    $idkat = $_POST['idkat'];
    $ids = $_POST['ids'];
    
    
    $query_tambah = mysqli_query($koneksi,"INSERT INTO barang (id_barang, namabarang, idkat, ids) VALUES(NULL, '$namabarang','$idkat','$ids')");
     
    if($query_tambah == TRUE){
     echo "<script>window.location.href='?halaman=barang'</script>";
    } else{
      echo "gagal";
    }
  } 

  if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $namabarang = $_POST['namabarang'];
    $idkat = $_POST['idkat'];
    $ids = $_POST['ids'];
   
     
    $query_edit=mysqli_query($koneksi,"UPDATE barang SET namabarang='$namabarang', idkat='$idkat', ids='$ids'  WHERE id_barang='$id'");

    if($query_edit==TRUE){
      echo "<script>window.location.href='?halaman=barang'</script>";
    }else{
      echo "gagal";
    }
    }
?>

 
<section class="content">
  <div class="data">
      <div class="col-md-10 col-sm-offset-1" id="tambah">
      <div class="box box-info">
                <div class="box-header with-border">
                <h3 class="box-title">Kelola Data Barang</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="?halaman=barang" method="post"class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Nama Barang</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="namabarang" name="namabarang" placeholder="Nama Barang">
                      </div>
                    </div>

                     <div class="form-group">
                      <label  class="col-sm-2 control-label">Kategori</label>
                      <div class="col-sm-8">
                         
                       <select class="form-control select2" name="idkat" style="width: 100%;">
                         <option value="">-Pilih Kategori-</option>
                        <?php 
                      
                          $query = mysqli_query($koneksi,"SELECT * FROM kategori") or die(mysqli_error());
                          while ($data = mysqli_fetch_array($query)) {  
                        ?>
                        <option value="<?php echo $data['idkat'] ?>"><?php echo $data['kategori'] ?></option>
                        <?php } ?>    
                          
                          </select>
                      </div>
                      </div>
                   
                      <div class="form-group">
                      <label  class="col-sm-2 control-label">Satuan</label>
                      <div class="col-sm-8">
                       <select class="form-control select2" name="ids" style="width: 100%;">
                        <option value="">-Pilih Satuan-</option>
                        <?php 
                        $query = mysqli_query($koneksi,"SELECT * FROM satuan") or die(mysqli_error());
                          while ($data = mysqli_fetch_array($query)) {  
                        ?>
                        <option value="<?php echo $data['ids'] ?>"><?php echo $data['namasatuan'] ?></option>
                        <?php } ?>    
                         
                        </select>
                      </div>
                      </div>                                    
                    
                    </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-default" id="hideform">Batal</button>
                    <button type="submit" class="btn btn-info pull-right" name="simpan">Simpan
                    </button>
                  </div>
                  <!-- /.box-footer -->
                </form>
      </div>
    </div>
    <div  <div class="col-md-10 col-sm-offset-1" id="edit">   
    </div>


      <div class="col-md-10 col-sm-offset-1">
      <div class="box">
            <div class="box-header">
             <button class="btn btn-info " id="click-tambah" ><li class="fa fa-plus"></li> Tambah</button> 
              <br><br>
            <h3 class="box-title">Data Semua Barang</h3>
            </div>
    
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Satuan</th>
                  <th>Pilihan</th>
                </tr>
                </thead>
                <?php 
                  $query = mysqli_query($koneksi,"SELECT * FROM barang JOIN kategori ON barang.idkat =kategori.idkat JOIN satuan ON barang.ids=satuan.ids ORDER BY namabarang") or die(mysqli_error());
                  $no=1;
                  while ($data = mysqli_fetch_array($query)) {  
                ?> 
                <tbody>
                <tr>
                  <td><?php echo $no ?></td>
                    <td><?php echo $data['namabarang']; ?></td>
                    <td><?php echo $data['kategori'] ?></td>    
                    <td ><?php echo $data['namasatuan'] ?></td> 
                    <td>

                      <button class="btn btn-warning click-edit" id="<?php echo $data['id_barang'] ?>"><li class="fa fa-pencil"></li></button>

                      <a class="btn btn-danger " href="?halaman=barang&delete=<?php echo $data['id_barang'] ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')"> <li class="fa fa-close"></li> </a>

                    </td>
                    
               </tr>
        
                
                </tbody> 
                 <?php $no++; }  ?>
              
              </table>
            </div>
            <!-- /.box-body -->
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
                url: "halaman/form/barang/edit.php",
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


</script>

</html>