<?php 
  if(isset($_GET['delete'])){
     $sid = session_id();
    $query_delete = mysqli_query($koneksi,"DELETE FROM barangmasuk_tmp WHERE nofaktur='$_GET[delete]' AND sid ='$sid'")or die(mysql_error());
    
    if ($query_delete == TRUE) {
      echo "<script>window.location.href='?halaman=barang_masuk'</script>";
    }else{
      echo "gagal";
    }
  }
  if(isset($_POST['tambah'])){
    $id_barang = $_POST['id_barang'];
    $jumlah= $_POST['jumlah'];
    $harga = $_POST['harga'];
    $jual = $_POST['jual'];
    $sid = session_id();


     $data = mysqli_query($koneksi, "SELECT * FROM barangmasuk_tmp WHERE id_barang='$id_barang'AND sid = '$sid'");
     $cari = mysqli_num_rows($data);
     
      if ($cari==0 ) {
        
      $query_tambah = mysqli_query($koneksi,"INSERT INTO barangmasuk_tmp ( id_barang, jumlah, harga, jual, sid) VALUES('$id_barang', '$jumlah', '$harga', '$jual', '$sid')");
     
    }else{
      
          $query_edit = mysqli_query($koneksi,"UPDATE barangmasuk_tmp SET jumlah=(jumlah + ".$jumlah."), harga='$harga', jual='$jual' WHERE id_barang='$id_barang' AND sid = '$sid'");
    }
    
  }

  if (isset($_POST['transaksi'])) {
    $nofaktur= $_POST['nofaktur'];
    $tgl= date("Y-d-m",strtotime($_POST['tgl']));
    $id_barang = $_POST['id_barang'];    
    $id_supplier= $_POST['id_supplier'];    
    $jumlah= $_POST['jumlah'];
    $harga = $_POST['harga'];
    $jual = $_POST['jual'];
    $sid = session_id();    

    $baca = mysqli_query($koneksi,"SELECT * FROM barangmasuk_tmp WHERE sid = '$sid'");
    foreach ($baca as $kolom ) {
      $id_barang = $kolom['id_barang'];
      $jumlah = $kolom['jumlah'];
      $harga = $kolom['harga'];
      $jual = $kolom['jual'];
    

    // simpan ke barangmasuk
    $query_add= mysqli_query($koneksi,"INSERT INTO barangmasuk VALUES ('$nofaktur', '$tgl', '$id_barang', '$id_supplier', '$jumlah', '$harga', '$jual')");
    
    $query_deltmp = mysqli_query($koneksi,"DELETE FROM barangmasuk_tmp"); 
}
  }

  
?>


<section class="content">
  <div class="data">
    <div class="col-md-10 col-sm-offset-1">
      <div class="box box-info">

            <div class="box-header">
                <!-- <form class="form-horizontal" action="?halaman=transaksi" method="POST" > -->
              <form class="form-horizontal" method="POST" action="?halaman=barang_masuk">
                  <div class="box-body">
                         
                    <div class="form-group">
                    <label  class="col-sm-2 control-label"></label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" id="nofaktur" name="nofaktur" placeholder="No Faktur">
                    </div>
                       <div class="col-sm-3">
                        <!-- <input type="text" class="form-control" readonly name="sid" placeholder="" value="<?php $sid = session_id(); echo $sid ?>" >
                         --><input type="text" class="form-control" readonly name="username" placeholder="" value=" <?php echo $_SESSION['username'] ?>" >

                      </div>
                      <div class="col-sm-3 ">
                       <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="tgl" readonly class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php date_default_timezone_set("Asia/Jakarta"); echo date('d-m-Y'); ?>" readonly">
                          </div>
                      </div>
                    </div>

                  
                      
                   
                    <div class="form-group">
                      <label  class="col-sm-2 control-label"></label>
                      <div class="col-sm-3">
                       <select class="form-control select2" style="width: 100%;" name="id_supplier" id="id_supplier">
                        <option value="">---Pilih Supplier---</option>
                          <?php 
                  
                      $query = mysqli_query($koneksi,"SELECT * FROM supplier") or die(mysqli_error());
                      while ($data = mysqli_fetch_array($query)) {  
                    ?>
                    <option value="<?php echo $data['id_supplier'] ?>"><?php echo $data['namasupplier'] ?></option>
                    <?php } ?>                        
                   
                          </select>
                      </div>

                    

                    
                      <div class="col-sm-3">
                       <select class="form-control select2" style="width: 100%;" name="id_barang" id="id_barang">
                        <option value="">---Pilih Barang---</option>
                          <?php 
                          $query = mysqli_query($koneksi,"SELECT * FROM barang") or die(mysqli_error());
                          foreach ($query as $data){  
                          ?>
                        <option data-stok="<?php echo $data['stok'] ?>" value="<?php echo $data['id_barang'] ?>"><?php echo $data['namabarang'] ?></option>
                        <?php } ?>
                        </select>
                      </div>


                      <div class="col-sm-3">
                        <input type="hidden" class="form-control"  id="stok" name="stok">
                        <input type="number" class="form-control"  name="jumlah" placeholder="Jumlah" id="jumlah" >
                      </div>
                    </div>
                      <!-- <label  class="col-sm-2 control-label"> No Faktur </label> -->
                    
                    <div class="form-group">
                      <label  class="col-sm-2 control-label"></label>
                      <!-- <label  class="col-sm-2 control-label"></label> -->
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga">
                        </div>

                        <div class="col-sm-3">
                        <input type="text" class="form-control" id="jual" name="jual" placeholder="Jual">
                        </div>

  
                    <br><br><br>    
                    <div class="form-group">
                      <div class="col-md-3 col-sm-offset-5">
                        <button type="submit" class="btn btn-info" name="tambah" id="btn">Tambah</button>
                      </div>
                    </div>

                    <div class="form-group" >
                      <div class="col-sm-8 col-sm-offset-2">
                        <table  class="table table-striped table-bordered" >
                          <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Barang</th>                
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Jual</th>
                            <th>Subtotal</th>                
                            <th>Pilihan</th>          
                          </tr>
                          </thead>
                          <tbody >
                                <?php 
                            $query = mysqli_query($koneksi,"SELECT * FROM barangmasuk_tmp JOIN barang ON barangmasuk_tmp.id_barang=barang.id_barang JOIN satuan ON barang.ids=satuan.ids JOIN kategori ON barang.idkat=kategori.idkat ") or die(mysqli_error());
                            $no=1;
                            $ttl=0;
                            while ($data = mysqli_fetch_array($query)) {  
                          ?>  
                            <tr>
                              <td><?php echo $no ?></td>
                    <td><?php echo $data['namabarang']; ?></td>
                    <td><?php echo $data['jumlah']; ?></td>                    
                    <td><?php echo $data['harga']; ?></td>
                    <td><?php echo $data['jual']; ?></td>
                   
                    <?php 
                      $subtotal = $data['jumlah'] * $data['harga'];
                      $ttl = $ttl + $subtotal
                      ?>
                      <td style="text-align: right;"><?php echo $subtotal ?></td>
                             
                    <td>
                                <a class="btn btn-danger " href="?halaman=barang_masuk&delete=<?php echo $data['nofaktur']?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')"> <li class="fa fa-close"></li> </a>
                                </td>
                            </tr>
                          <?php $no++; }  ?>  

                          </tbody>
                          <tfoot> 
                            <tr>
                              <th colspan="4" style="text-align: right;">Total</th>
                              <td colspan="2" style="text-align: center;"><?php echo $ttl ?>                             </tr>               
                          </tfoot> 
                        </table>
                       </div> 
                    </div>

                    
                      <div class="col-sm-3 col-sm-offset-1">
                        <label  class="col-sm-2 control-label"></label>
                        <label  class="col-sm-2 control-label"></label>
                        <button  type="submit" class="btn btn-warning" name="transaksi">Transaksi</button>
                      </div>
                    </div>   
                  </div>
                </form>
            </div>
            
          </div>
    </div>
  </div>
</section>
<?php 


?>
<script src="bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
    $("#id_barang").change(function(){
      var stok = $(this).find(":selected").data("stok")
      $("#stok").val(stok)
    })
    $("#jumlah").change(function(){
      var id_barang = $("#id_barang").val()
      var jumlah = $("#jumlah").val()
      if(id_barang==""){
        alert("pilih barang");
      }else{
          var stok = parseInt($("#stok").val())
          var thisVal = parseInt($(this).val())
          var jumlah = $("#jumlah").val()
          
          if(thisVal > stok){
            alert("Stok tidak mecukupi, tersedia = " +stok);
          }else if(thisVal==""){
            alert("masukkan jumlah");
          }else{
            return TRUE;
          }
      }
    })
  })

  
    
                         
                    
