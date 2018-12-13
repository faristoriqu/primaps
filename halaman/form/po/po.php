<?php 
  if(isset($_GET['delete'])){
    $query_delete = mysqli_query($koneksi,"DELETE FROM po WHERE id_po='$_GET[delete]'")or die(mysql_error());
    
    if ($query_delete == TRUE) {
      echo "<script>window.location.href='?halaman=po'</script>";
    }else{
      echo "gagal";
    }
  }

  if(isset($_POST['simpan'])){
    
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
     
    $query_tambah = mysqli_query($koneksi,"INSERT INTO po VALUES(NULL,'$nama','$harga')");
     
    if($query_tambah == TRUE){
      echo "<script>window.location.href='?halaman=po'</script>";
    } else{
      echo "<script>alert('gagal')</script>";
    }
    echo "<script>window.location.href='?halaman=barang'</script>";
  }

  if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $id_po = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
     
    $query_edit=mysqli_query($koneksi,"UPDATE po SET id_po='$id_po',nama='$nama', harga='$harga'  WHERE id_po='$id'");

    if($query_edit==TRUE){
      echo "<script>window.location.href='?halaman=po'</script>";
    }else{
      echo "gagal";
    }
    }
?>

<br> 
 <div class="col-md-10 col-sm-offset-1" id="tambah">
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah PO</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="?halaman=po" method="POST">
              <div class="box-body">
                
                <div class="form-group">
                  <label  class="col-sm-3 control-label">Nama</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama"  name="nama" placeholder="Nama">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-3 control-label">Harga</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id= "harga" name="harga" placeholder="Harga">
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

<section class="content">
  <div class="row">
     <div class="col-md-10 col-sm-offset-1" >
      <div class="box box-primary">
            <div class="box-header">
              <button class="btn btn-info " id="click-tambah" ><li class="fa fa-plus"></li> Tambah</button>
              <br><br>
              <h3 class="box-title">Data PO</h3>
            </div>
    
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  
                  $query = mysqli_query($koneksi,"SELECT * FROM po") or die(mysqli_error());
                  $no=1;
                  while ($data = mysqli_fetch_array($query)) {  
                ?>  
                
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['harga']; ?></td>
                    <td>
                      <button class="btn btn-warning click-edit" id="<?php echo $data['id_po'] ?>"><li class="fa fa-pencil"></li></button>

                      <a class="btn btn-danger " href="?halaman=po&delete=<?php echo $data['id_po'] ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')"> <li class="fa fa-close"></li> </a>

                    </td>
                    
                  </tr>
                   <?php $no++; }  ?>
                </tbody>
               
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
                url: "halaman/form/po/edit.php",
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

