<?php 
  if(isset($_GET['delete'])){
    $query_delete = mysqli_query($koneksi,"DELETE FROM barangmasuk WHERE nofaktur='$_GET[delete]'")or die(mysql_error());
    
    if ($query_delete == TRUE) {
      echo "<script>window.location.href='?halaman=barang_masuk'</script>";
    }else{
      echo "gagal";
    }
  }

  if(isset($_POST['simpan'])){
    $nofaktur = $_POST['nofaktur'];
    $tgl = $_POST['tgl'];    
    $id_barang = $_POST['id_barang'];
    $id_supplier = $_POST['id_supplier'];
    $jumlah= $_POST['jumlah'];
    $harga = $_POST['harga'];
    $jual = $_POST['jual'];
      
    $query_tambah = mysqli_query($koneksi,"INSERT INTO barangmasuk (nofaktur, tgl, id_barang, id_supplier, jumlah, harga, jual) VALUES('$nofaktur', '$tgl', '$id_barang', '$id_supplier', '$jumlah', '$harga', '$jual')");
     
    if($query_tambah == TRUE){
     echo "<script>window.location.href='?halaman=barang_masuk'</script>";
    } else{
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
                  <label  class="col-sm-2 control-label">No Faktur</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nofaktur" name="nofaktur" placeholder="No Faktur">
                  </div>
                </div>
                <br><br>
                   

                <div class="form-group">
                      <label  class="col-sm-2 control-label">Tanggal</label>
                  <div class="col-sm-8">  
                       <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" id="tgl" name="tgl" class="form-control" data-inputmask="'alias':'yyyy/mm/dd'" data-mask ">
                          </div>
                      </div>
                    </div>
                 <br><br> 

               
                <div class="form-group">
                  <label class="col-sm-2 control-label">Barang</label>
                  <div class="col-sm-8">
                  <select class="form-control select2" id="id_barang" name="id_barang" style="width: 100%;">
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
                  <label class="col-sm-2 control-label">Supplier</label>
                  <div class="col-sm-8">
                  <select class="form-control select2" id="id_supplier" name="id_supplier" style="width: 100%;">  <option value="">-Pilih Supplier-</option>
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
                    <th>Nama Barang</th>
                    <th>Nama Supplier</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Sub Total</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>                
                <body>
                <?php 
                  $query = mysqli_query($koneksi,"SELECT * FROM barangmasuk JOIN barang ON barangmasuk.id_barang =barang.id_barang JOIN supplier ON barangmasuk.id_supplier=supplier.id_supplier ORDER BY namabarang") or die(mysqli_error());
                  $no=1;
                    $ttl=0;
                  while ($data = mysqli_fetch_array($query)) {  
                ?> 
               
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data['namabarang']; ?></td>
                    <td><?php echo $data['namasupplier']; ?></td>
                    <td><?php echo $data['harga']; ?></td>
                    <td><?php echo $data['jumlah']; ?></td>
                    <?php 
                      $subtotal = $data['jumlah'] * $data['harga'];
                      $ttl = $ttl + $subtotal
                      ?>
                      <td style="text-align: right;"><?php echo $subtotal ?></td>
                             
                    <td>
                      <a class="btn btn-danger " href="?halaman=barang_masuk&delete=<?php echo $data['nofaktur'] ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')"> <li class="fa fa-close"></li> </a>

                    </td>
                    
                  </tr>
                  <?php $no++;} ?>
                </tbody>
                <tfoot> 
                          <tr>
                            <td colspan='4' align='left'><b>Total</b></td>
                              <td> </td>
                              <td align='right'><b><?php echo $ttl ?> </td>

                              </tr>               
                          </tfoot> 
                        
              </table>
            </div>
      </div>  
    </div>
  </div>
</section>  
<script src="bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
   

  
    
                         
                    
