<?php 
  if(isset($_GET['delete'])){
    $query_delete = mysqli_query($koneksi,"DELETE FROM barangmasuk WHERE idbm='$_GET[delete]'")or die(mysql_error());
    
    if ($query_delete == TRUE) {
      echo "<script>window.location.href='?halaman=barang_masuk'</script>";
    }else{
      echo "gagal";
    }
  }

  
  if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $tgl = $_POST['tgl'];
    $id_supplier = $_POST['id_supplier'];
    $id_barang = ['id_barang'];
    $jumlah= $_POST['jumlah'];
    $harga = $_POST['harga'];
    $jual = $_POST['jual'];
   
    $query_edit=mysqli_query($koneksi,"UPDATE barangmasuk SET tgl='$tgl',id_supplier='id_supplier',id_barang='id_barang',jumlah='$jumlah',harga='$harga',jual='$jual'  WHERE idbm='$id'");

    if($query_edit==TRUE){
      echo "<script>window.location.href='?halaman=barang_masuk'</script>";
    }else{
      echo "gagal";
    }
    }
?>


<section class="content">
  <div class="data">
      <div class="col-md-10 col-sm-offset-1">
       <form action="?halaman=barang_masuk" method="post">
      <div class="box box-primary">
            <div class="box-header">
               <h3 class="box-title">Tambah Data Barang Masuk</h3>
               <br><br>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Tanggal</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Tanggal">
                  </div>
                </div>
                 <br><br> 

                <div class="form-group">
                  <label class="col-sm-2 control-label">Supplier</label>
                  <div class="col-sm-8">
                  <select class="form-control select2" style="width: 100%;">  <option value="">-Pilih Supplier-</option>
                    <?php 
                  
                      $query = mysqli_query($koneksi,"SELECT * FROM supplier") or die(mysqli_error());
                      while ($data = mysqli_fetch_array($query)) {  
                    ?>
                    <option value="<?php echo $data['id_supplier'] ?>"><?php echo $data['namasupplier'] ?></option>
                    <?php } ?>    
                                       
                    </select>
                  </div>
                </div>
                <br><br>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Barang</label>
                  <div class="col-sm-8">
                  <select class="form-control select2" style="width: 100%;">
                    <option value="">-Pilih Barang-</option>
                    <?php 
                  
                      $query = mysqli_query($koneksi,"SELECT * FROM barang") or die(mysqli_error());
                      while ($data = mysqli_fetch_array($query)) {  
                    ?>
                    <option value="<?php echo $data['id_barang'] ?>"><?php echo $data['namabarang'] ?></option>
                    <?php } ?>    
                                       
                    </select>
                  </div>
                </div>


                <br><br> 
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Jumlah</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah">
                  </div>
                </div>
                <br><br> 
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Harga</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga">
                  </div>
                </div>
                <br><br> 
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Jual</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="jual" name="jual" placeholder="Jual">
                  </div>
                </div>
                <br><br> 
                         
    <button  type="simpan" class="btn btn-info pull-left" name="simpan">Simpan</button>
              </div>   
                    
              <h3 class="box-title">Data Semua Barang Masuk</h3>
            
                <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Supplier</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Jual</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <body>
                <?php 
                  
                  $query = mysqli_query($koneksi,"SELECT * FROM barangmasuk ORDER BY tgl ASC") or die(mysqli_error());
                  $no=1;
                  while ($data = mysqli_fetch_array($query)) {  
                ?>  
                
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data['tgl']; ?></td>
                    <td><?php echo $data['id_supplier']; ?></td>
                    <td><?php echo $data['id_barang']; ?></td>
                    <td><?php echo $data['jumlah']; ?></td>
                    <td><?php echo $data['harga']; ?></td>
                    <td><?php echo $data['jual']; ?></td>
                    <td>
                      <button class="btn btn-warning click-edit" id="<?php echo $data['idbm'] ?>"><li class="fa fa-pencil"></li></button>

                      <a class="btn btn-danger " href="?halaman=barang_masuk&delete=<?php echo $data['idbm'] ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')"> <li class="fa fa-close"></li> </a>

                    </td>
                    
                  </tr>
                  <?php $no++;} ?>
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
                url: "halaman/form/barang_masuk/edit.php",
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

