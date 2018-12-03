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
    <div class="col-md-10 col-sm-offset-1">
      <div class="box box-info">
            <div class="box-header">
                <form class="form-horizontal" action="?halaman=data_satuan" method="POST">
                  <div class="box-body">
                         
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Karyawan</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="karyawan" placeholder="nama karyawan">
                      </div>
                      <div class="col-sm-3 col-sm-offset-1">
                       <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="tgl_lahir" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                          </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Kode Transaksi</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="kode" placeholder="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Nama Barang</label>
                      <div class="col-sm-3">
                       <select class="form-control select2" style="width: 100%;">
                          <option>Alabama</option>
                          <option>Alaska</option>
                          <option>California</option>
                          <option>Delaware</option>
                          <option>Tennessee</option>
                          <option>Texas</option>
                          <option>Washington</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Jumlah</label>
                      <div class="col-sm-3">
                        <input type="number" class="form-control"  name="kode" placeholder="">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-3 col-sm-offset-5">
                        <button type="submit" class="btn btn-info" name="tambah">Tambah</button>
                      </div>
                    </div> 
                  </div>
                </form>
            </div>
            <div class="box-body">
              <div class="col-sm-8 col-sm-offset-2">
              <table class="table table-striped table-bordered">
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
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>

