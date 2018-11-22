<?php 
  if(isset($_GET['delete'])){
    $query_delete = mysqli_query($koneksi,"DELETE FROM kategori WHERE idkat='$_GET[delete]'")or die(mysql_error());
    
    if ($query_delete == TRUE) {
      echo "<script>window.location.href='?halaman=kategori'</script>";
    }else{
      echo "gagal";
    }
  }

  if(isset($_POST['simpan'])){
    $kategori = $_POST['kategori'];
     
    $query_tambah = mysqli_query($koneksi,"INSERT INTO kategori VALUES('$idkat')");
     
    if($query_tambah == TRUE){
      echo "<script>window.location.href='?halaman=kategori'</script>";
    } else{
      echo "gagal";
    }
  } 

  if(isset($_POST['each(array)dit'])){
    $id = $_POST['id'];
    $kategori = $_POST['kategori'];
     
    $query_edit=mysqli_query($koneksi,"UPDATE login SET kategori='$kategori'  WHERE idkat='$id'");

    if($query_edit==TRUE){
      echo "<script>window.location.href='?halaman=register'</script>";
    }else{
      echo "gagal";
    }
    }
?>

<br> 
<div class="col-md-8" id="tambah">
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Kategori</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="?halaman=register" method="POST">
              <div class="box-body">

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Nama Kategori</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="kategori" placeholder="Nama Kategori">
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

<div class="col-md-8" id="edit">   
</div>

<section class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="box box-primary">
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
                    <th>Nama Kategori</th>
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
                      <button class="btn btn-warning click-edit" id="<?php echo $data['idkat'] ?>"><li class="fa fa-pencil"></li></button>

                      <a class="btn btn-danger " href="?halaman=register&delete=<?php echo $data['idkat'] ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')"> <li class="fa fa-close"></li> </a>

                    </td>
                    
                  </tr>
                </tbody>
                <?php $no++; }  ?>
              </table>
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
                url: "halaman/register/edit.php",
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

