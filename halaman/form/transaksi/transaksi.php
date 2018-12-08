<?php 
  $carikode = mysqli_query($koneksi, "SELECT kode_transaksi from transaksi") or die (mysqli_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  $jumlah_data = mysqli_num_rows($carikode);
  // jika $datakode
  if ($datakode) {
   // membuat variabel baru untuk mengambil kode barang mulai dari 1
   $nilaikode = substr($jumlah_data[0], 1);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $jumlah_data + 1;
   // hasil untuk menambahkan kode 
   // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
   // atau angka sebelum $kode
   $kode_otomatis = "TRS".str_pad($kode, 6, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "TRS0001";
  }

   if(isset($_GET['delete'])){
    $query_delete = mysqli_query($koneksi,"DELETE FROM transaksi_tmp WHERE id_barang='$_GET[delete]'")or die(mysql_error());
    
    if ($query_delete == TRUE) {
      echo "<script>window.location.href='?halaman=transaksi'</script>";
    }else{
      echo "gagal";
    } 
  }

  
  if(isset($_POST['tambah'])){
    
    $id_barang=$_POST['id_barang'];
    $jumlah=$_POST['jumlah'];
    $kode_transaksi=$_POST['kode_transaksi'];
    $stok=$_POST['stok'];



     $data = mysqli_query($koneksi, "SELECT * FROM transaksi_tmp WHERE id_barang='$id_barang'");
     $cari = mysqli_num_rows($data);
     
    
      if ($cari==0 ) {
        if ($stok >= $jumlah) {
      $query_add = mysqli_query($koneksi,"INSERT INTO transaksi_tmp VALUES('$id_barang','$jumlah')");
      if ($query_add==TRUE) {
        echo "<script>window.location.href='?halaman=transaksi'</script>";  
      }else{
          echo("gagal");
      }  
      }else{
        echo "<script>window.location.href='?halaman=transaksi'</script>";  
      }
    }else{
      if ($stok >= $jumlah) {
          $query_edit = mysqli_query($koneksi,"UPDATE transaksi_tmp SET jumlah=(jumlah + ".$jumlah.") WHERE id_barang='$id_barang' ");
      if ($query_edit==TRUE) {
        echo "<script>window.location.href='?halaman=transaksi'</script>";  
      }else{
          echo("gagal");
      }  
        }else{
          echo "<script>window.location.href='?halaman=transaksi'</script>";  
        }
    }
    
  }

  if (isset($_POST['transaksi'])) {

    $id_barang=$_POST['id_barang'];
    $jumlah=$_POST['jumlah'];
    $kode_transaksi=$_POST['kode_transaksi'];
    $tanggal=date("Y-d-m",strtotime($_POST['tanggal']));
    $total=$_POST['total'];
    $bayar=$_POST['bayar'];
    $potongan=$_POST['potongan'];
    


    $baca = mysqli_query($koneksi,"SELECT * FROM transaksi_tmp");
    foreach ($baca as $kolom ) {
      $id = $kolom['id_barang'];
      $j = $kolom['jumlah'];
     $query_detadd = mysqli_query($koneksi,"INSERT INTO detail VALUES ('$kode_transaksi','$id','$j')");      
    }

    // simpan ke transaksi
    $query_tambah= mysqli_query($koneksi,"INSERT INTO transaksi VALUES ('$kode_transaksi','$tanggal','$total','$potongan','$bayar')");
    
        $query_deltmp = mysqli_query($koneksi,"DELETE FROM transaksi_tmp"); 

      echo "<script>window.location.href='?halaman=transaksi'</script>";  
       


  }

?> 
<section class="content">
  <div class="data">
    <div class="col-md-10 col-sm-offset-1">
      <div class="box box-info">
            <div class="box-header">
                <form class="form-horizontal" action="?halaman=transaksi" method="POST" >
                  <div class="box-body">
                         
                    <div class="form-group">
                      <div class="col-sm-3 col-sm-offset-8">
                       <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="tanggal" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php date_default_timezone_set("Asia/Jakarta"); echo date('d-m-Y'); ?>" readonly">
                          </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Kode Transaksi</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" readonly name="kode_transaksi" placeholder="" value="<?php echo $kode_otomatis ?>" >
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Nama Barang</label>
                      <div class="col-sm-3">
                       <select class="form-control select2" style="width: 100%;" name="id_barang" id="id_barang">
                        <option value="">---Select---</option>
                          <?php 
                          $query = mysqli_query($koneksi,"SELECT * FROM barang") or die(mysqli_error());
                          foreach ($query as $data){  
                          ?>
                        <option data-stok="<?php echo $data['stok'] ?>" value="<?php echo $data['id_barang'] ?>"><?php echo $data['namabarang'] ?></option>
                        <?php } ?>
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  id="stok" name="stok">
                        <input type="number" class="form-control"  name="jumlah" placeholder="Jumlah" id="jumlah" >
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-3 col-sm-offset-5">
                        <button type="submit" class="btn btn-info" name="tambah" id="btn">Tambah</button>
                      </div>
                    </div>
                    <div class="form-group" >
                      <div class="col-sm-8" col-sm-offset-1>
                        <table class="table table-striped table-bordered" >
                          <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Barang</th>                
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Subtotal</th>                
                            <th>Pilihan</th>          
                          </tr>
                          </thead>
                          <tbody >
                                <?php 
                            $query = mysqli_query($koneksi,"SELECT * FROM transaksi_tmp JOIN barang ON transaksi_tmp.id_barang=barang.id_barang") or die(mysqli_error());
                            $no=1;
                            $ttl=0;
                            while ($data = mysqli_fetch_array($query)) {  
                          ?>  
                            <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $data['namabarang']; ?></td>
                              <td><?php echo $data['jumlah']; ?></td>
                              <td><?php echo $data['hargaj']; ?></td>
                              <?php 
                              $subtotal = $data['jumlah'] * $data['hargaj'];
                              $ttl = $ttl + $subtotal
                              ?>
                              <td style="text-align: right;"><?php echo $subtotal ?></td>
                              <td>
                                <a class="btn btn-danger " href="?halaman=transaksi&delete=<?php echo $data['id_barang'] ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')"> <li class="fa fa-close"></li> </a>

                              </td>
                            </tr>
                          <?php $no++; }  ?>  

                          </tbody>
                          <tfoot> 
                            <tr>
                              <th colspan="4" style="text-align: right;">Total</th>
                              <td colspan="2" style="text-align: center;"><?php echo $ttl ?> </td>
                            </tr>               
                          </tfoot> 
                        </table>
                       </div> 
                    </div>

                    <div class="form-group">
                      <div class="col-sm-3">
                        <input type="text" class="form-control" onkeyup="totalan(<?php echo $ttl ?>);" id="potongan" name="potongan" placeholder="Potongan">
                      </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="total"  name="total" value="<?php echo $ttl ?>">
                        
                      </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" onkeyup="hitung();" id="bayar" name="bayar" placeholder="Bayar">
                      </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  id="kembalian" name="kembalian" placeholder="Kembalian">
                      </div>
                      <div class="col-sm-3">
                        <button  type="submit" class="btn btn-warning" name="transaksi"  href="">Transaksi</button>
                      </div>
                    </div>   
                  </div>
                </form>
            </div>
            
          </div>
    </div>
  </div>
</section>

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
</script>
<script type="text/javascript">
      //kembalian dan total bayar  
        function hitung() {
          var total = document.getElementById('total').value;
          var bayar = document.getElementById('bayar').value;

          var result = parseInt(bayar) - parseInt(total);
          
          if (bayar=="") {
            document.getElementById('kembalian').value = "";
          }else{
            document.getElementById('kembalian').value = result;
            if (result == 0) {
                document.getElementById('kembalian').value = "";
            }  
          }
        }
        function totalan(ttl) {
          var potongan = document.getElementById('potongan').value;
          var bayar = document.getElementById('bayar').value;
          var result = parseInt(ttl) - parseInt(potongan);
          
          if (potongan=="") {
            document.getElementById('total').value = ttl;   
            
          }else {
            document.getElementById('total').value =result;
            
          }
          hitung();
        }
</script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>


                            
