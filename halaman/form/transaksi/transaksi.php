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
<section class="content">
  <div class="data">
    <div class="col-md-12">
      <div class="box">
            <div class="box-header">
                <form class="form-horizontal" action="?halaman=data_satuan" method="POST">
                  <div class="box-body">
                         
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Satuan Barang</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control"  name="namasatuan" placeholder="Satuan Barang">
                      </div>
                    </div>
                    <div class="form-group">
                      <center>
                        <button type="submit" class="btn btn-info" name="simpan">Simpan</button>
                      </center>  
                    </div> 
                  </div>
                </form>
            </div>
            <div class="box-body" style="align-self: center;">
              
              <div class="col-sm-8">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Satuan Barang</th>                
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
                      <button class="btn btn-warning click-edit" id="<?php echo $data['ids'] ?>" ><li class="fa fa-pencil"></li></button>

                      <a class="btn btn-danger " href="?halaman=data_satuan&delete=<?php echo $data['ids'] ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')"> <li class="fa fa-close"></li> </a>

                    </td>
                    
                  </tr>
                </tbody>
                <tfoot>
                
                </tfoot>
                <?php $no++; }  ?>
              </table>
              </div>
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
                url: "halaman/form/data_satuan/edit.php",
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

