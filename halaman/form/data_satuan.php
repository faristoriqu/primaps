<?php 
  if(isset($_GET['delete'])){
    $query_delete = mysqli_query($koneksi,"DELETE FROM satuan WHERE ids='$_GET[delete]'")or die(mysql_error());
    
    if ($query_delete == TRUE) {
      echo "<script>window.location.href='?halaman=data_satuan'</script>";
    }else{
      echo "gagal";
    }
  }

  if(isset($_POST['simpan'])){
    
    $namasatuan = $_POST['namasatuan'];
    
     
    $query_tambah = mysqli_query($koneksi,"INSERT INTO satuan VALUES(NULL,'$namasatuan')");
     
    if($query_tambah == TRUE){
      echo "<script>window.location.href='?halaman=data_satuan'</script>";
    } else{
      echo "gagal";
    }
  } 

  if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $namasatuan = $_POST['namasatuan'];
   
     
    $query_edit=mysqli_query($koneksi,"UPDATE satuan SET namasatuan='$namasatuan'  WHERE ids='$id'");

    if($query_edit==TRUE){
      echo "<script>window.location.href='?halaman=data_satuan'</script>";
    }else{
      echo "gagal";
    }
    }
?>


<br> 

<div class="col-md-10" id="tambah" >
<!-- Horizontal Form -->
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Satuan Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="?halaman=data_satuan" method="post">
              <div class="box-body">
                     
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Satun Barang</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="namasatuan" placeholder="satuanbarang">
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

<section class="content">
  <div class="row">
    <div class="col-md-10">
      <div class="box">
            <div class="box-header">
              <button class="btn btn-info " id="click-tambah" ><li class="fa fa-plus"></li> Tambah</button>
              <h3 class="box-title">Satuan Barang</h3>
            </div>
    
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Satun Barang</th>                
                  <th>Pilihan</th>
                                  
                </tr>
                </thead>

                <?php 
                  
                  $query = mysqli_query($koneksi,"SELECT * FROM satuan") or die(mysqli_error());
                  $no=1;
                  while ($data = mysqli_fetch_array($query)) {  
                ?>  
                <tbody>
                  <tr>
                    <td><?php echo $no ?></td>
                    
                    <td><?php echo $data['namasatuan']; ?></td>
                   
                    <td>
                      <button class="btn btn-warning " id="click-edit <?php echo $data['ids'] ?>" ><li class="fa fa-pencil"></li></button>

                      <a class="btn btn-danger " href="?halaman=data_satuan&delete=<?php echo $data['ids'] ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')"> <li class="fa fa-close"></li> </a>

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
</section>

<script src="bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
      $("#tambah").hide();
        $("#click-tambah").click(function(e) {
          e.preventDefault()
            $("#tambah").show();
        });
        $("#hideform").click(function(e) {
          e.preventDefault()
            $("#tambah").hide();
        });
    });
</script>

