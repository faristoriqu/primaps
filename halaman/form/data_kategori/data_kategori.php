<?php 
  if(isset($_GET['delete'])){
    $query_delete = mysqli_query($koneksi,"DELETE FROM kategori WHERE idkat='$_GET[delete]'")or die(mysql_error());
    
    if ($query_delete == TRUE) {
      echo "<script>window.location.href='?halaman=data_kategori'</script>";
    }else{
      echo "gagal";
    }
  }

  if(isset($_POST['simpan'])){
    
    $kategori = $_POST['kategori'];
    
     
    $query_tambah = mysqli_query($koneksi,"INSERT INTO kategori VALUES(NULL,'$kategori')");
     
    if($query_tambah == TRUE){
      echo "<script>window.location.href='?halaman=data_kategori'</script>";
    } else{
      echo "gagal";
    }
  } 

  if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $kategori = $_POST['kategori'];
   
     
    $query_edit=mysqli_query($koneksi,"UPDATE kategori SET kategori='$kategori'  WHERE idkat='$id'");

    if($query_edit==TRUE){
      echo "<script>window.location.href='?halaman=data_kategori'</script>";
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
                  <h3 class="box-title">Kategori Barang</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="?halaman=data_kategori" method="POST">
                  <div class="box-body">
                         
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Kategori Barang</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control"  name="kategori" placeholder="Kategori Barang">
                      </div>
                    </div>

                    
                    
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-default" id="hideform">Batal</button>
                    <button type="submit" class="btn btn-info pull-right" name="simpan">Simpan</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
      </div>
    </div>
     <div class="col-md-10 col-sm-offset-1" id="edit">   
    </div>


    <div  <div class="col-md-10 col-sm-offset-1" >
      <div class="box">
            <div class="box-header">
              <button class="btn btn-info " id="click-tambah" ><li class="fa fa-plus"></li> Tambah</button>
              <br><br>
              <h3 class="box-title">Kategori Barang</h3>
            </div>
    
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kategori Barang</th>                
                  <th>Pilihan</th>
                                  
                </tr>
                </thead>

                <?php 
                  
                  $query = mysqli_query($koneksi,"SELECT * FROM kategori") or die(mysqli_error());
                  $no=1;
                  while ($data = mysqli_fetch_array($query)) {  
                ?>  
                <tbody>
                  <tr>
                    <td><?php echo $no ?></td>
                    
                    <td><?php echo $data['kategori']; ?></td>
                   
                    <td>
                      <button class="btn btn-warning click-edit" id="<?php echo $data['idkat'] ?>" ><li class="fa fa-pencil"></li></button>

                      <a class="btn btn-danger " href="?halaman=data_kategori&delete=<?php echo $data['idkat'] ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')"> <li class="fa fa-close"></li> </a>

                    </td>
                    
                  </tr>
                </tbody>
                <tfoot>
                
                </tfoot>
                <?php $no++; }  ?>
              </table>
            </div>
            <!-- /.box-body -->
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
                url: "halaman/form/data_kategori/edit.php",
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

