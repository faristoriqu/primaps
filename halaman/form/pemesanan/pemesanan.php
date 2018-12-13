<?php 
  $carikode = mysqli_query($koneksi, "SELECT kode_pemesanan from pemesanan") or die (mysqli_error());
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
   $kode_otomatis = "PSN".str_pad($kode,6, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "PSN000001";
  }

   if(isset($_GET['delete'])){
    $query_delete = mysqli_query($koneksi,"DELETE FROM pemesanan_tmp WHERE id_po='$_GET[delete]'")or die(mysql_error());
    
    if ($query_delete == TRUE) {
      echo "<script>window.location.href='?halaman=pemesanan'</script>";
    }else{
      echo "gagal";
    } 
  }

  
  if(isset($_POST['tambah'])){
    
    $id_po=$_POST['id_po'];
    $jumlah=$_POST['jumlah'];
    

     $data = mysqli_query($koneksi, "SELECT * FROM pemesanan_tmp WHERE id_po='$id_po'");
     $cari = mysqli_num_rows($data);
    if ($cari==0) {
        $query_add = mysqli_query($koneksi,"INSERT INTO pemesanan_tmp VALUES('$id_po','$jumlah')");
      // if ($query_add==TRUE) {
      //   echo "<script>window.location.href='?halaman=transaksi'</script>";  
      // }else{
      //       echo("gagal");
      // }
    }else{
          $query_edit = mysqli_query($koneksi,"UPDATE pemesanan_tmp SET jumlah=(jumlah + ".$jumlah.") WHERE id_po='$id_po' ");
      // if ($query_edit==TRUE) {
      //   echo "<script>window.location.href='?halaman=transaksi'</script>";  
      // }else{
      //     echo("gagal");
      // }  
    }
  }

  if (isset($_POST['transaksi'])) {

    $id_po=$_POST['id_po'];
    $jumlah=$_POST['jumlah'];
    $kode_pemesanan=$_POST['kode_pemesanan'];
    $tanggal=date("Y-m-d",strtotime($_POST['tanggal']));
    $total=$_POST['total'];
    $bayar=$_POST['bayar'];
    $kembalian=$_POST['kembalian'];

    // fungsi untuk mendapatkan isi keranjang belanja
    // function isi_tmp(){
    //   include 'config/koneksi.php';
    //   $isitmp = array();
      
    //   $baca = mysqli_query($koneksi,"SELECT * FROM transaksi_tmp");
    //   while ($data = mysqli_fetch_array($baca)) {
    //     $isitmp[] = $data;
    //   }
    //   return $isitmp;
    // }

    $baca = mysqli_query($koneksi,"SELECT * FROM pemesanan_tmp");
    foreach ($baca as $kolom ) {
      $id = $kolom['id_po'];
      $j = $kolom['jumlah'];
     $query_detadd = mysqli_query($koneksi,"INSERT INTO detail_pemesanan VALUES ('$kode_pemesanan','$id','$j')");      
    }

    // simpan ke transaksi
    $query_tambah= mysqli_query($koneksi,"INSERT INTO pemesanan VALUES ('$kode_pemesanan','$tanggal','$total','$bayar')");
    if ($query_tambah==TRUE) {
        $query_deltmp = mysqli_query($koneksi,"DELETE FROM pemesanan_tmp"); 

        // echo "<script>window.location.href='halaman/form/cetak/lhk.php'</script>";
      }else{
          echo("gagal");
      }

    //panggil isi keranjang dan hitung jumlah produk yang dibeli
    // $isitmp = isi_tmp();
    // $jml = count($isitmp);

    // for ($i=0; $i < $jml ; $i++) {
     
    //   $query_detadd = mysqli_query($koneksi,"INSERT INTO detail VALUES ('$kode_transaksi','{$isitmp[$i]['id_barang']}','{$isitmp[$i]['jumlah']}')");
    // }
    //hapus data tmp
      

      echo "<script>window.location.href='?halaman=pemesanan'</script>";  
       


  }

?> 
<section class="content">
  <div class="data">
    <div class="col-md-10 col-sm-offset-1">
      <div class="box box-info">
            <div class="box-header">
                <form class="form-horizontal" action="?halaman=pemesanan" method="POST" >
                  <div class="box-body">
                         
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Kode Transaksi</label>
                      <div class="col-sm-3 col-sm-offset-1">
                        <input type="text" class="form-control" readonly name="kode_pemesanan" placeholder="" value="<?php echo $kode_otomatis ?>" >
                      </div>

                      <div class="col-sm-3 col-sm-offset-2">
                       <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="tanggal" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php $tgl=date('d-m-Y'); echo $tgl; ?>" readonly">
                          </div>
                          
                      </div>
                      <div class="col-sm-3">
                            <input type="text" class="form-control" readonly name="sid" placeholder="" value="<?php $sid = session_id(); echo $sid ?>" >
                          </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Data Pembeli</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="namapembeli" placeholder="Pembeli" id="jumlah">  
                      </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="telepon" placeholder="Telepon" id="jumlah">
                      </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="namapembeli" placeholder="Alamat" id="jumlah">  
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Nama Barang</label>
                      <div class="col-sm-3">
                       <select class="form-control select2" style="width: 100%;" name="id_po" id="id_barang">
                        <option value="">---Select---</option>
                          <?php 
                          $query = mysqli_query($koneksi,"SELECT * FROM po") or die(mysqli_error());
                          foreach ($query as $data){  
                          ?>
                        <option  value="<?php echo $data['id_po'] ?>"><?php echo $data['nama'] ?></option>
                        <?php } ?>
                        </select>
                      </div>
                      <div class="col-sm-3">
                        
                        <input type="number" class="form-control"  name="jumlah" placeholder="Jumlah" id="jumlah">
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
                            $query = mysqli_query($koneksi,"SELECT * FROM pemesanan_tmp JOIN po ON pemesanan_tmp.id_po=po.id_po") or die(mysqli_error());
                            $no=1;
                            $ttl=0;
                            while ($data = mysqli_fetch_array($query)) {  
                          ?>  
                            <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $data['nama']; ?></td>
                              <td><?php echo $data['jumlah']; ?></td>
                              <td><?php echo $data['harga']; ?></td>
                              <?php 
                              $subtotal = $data['jumlah'] * $data['harga'];
                              $ttl = $ttl + $subtotal
                              ?>
                              <td style="text-align: right;"><?php echo $subtotal ?></td>
                              <td>
                                <a class="btn btn-danger " href="?halaman=transaksi&delete=<?php echo $data['id_po'] ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')"> <li class="fa fa-close"></li> </a>

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
                        <input type="text" class="form-control" id="total" onkeyup="totalan();" name="total" value="<?php echo $ttl ?>">
                        <!-- <input type="text" class="form-control" onkeyup="totalan();hitung();" id="totals" name="totals" value="" placeholder="tot"> -->
                      </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" onkeyup="totalan();" id="bayar" name="bayar" placeholder="Bayar">
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
  //print
  $( document ).ready(function() {
    $('#trs').click(function()
     {
         window.print();
         
     });
});

  //load crud dengan ajax
  $(document).ready(function(){
    loadData();
  });
  function loadData(){
    $.get('data.php', function(data){
      $('#table').html(data);  
    })
  }

  $(document).ready(function(){
    loadData();
  });
  function loadData(){
    $.get('data.php', function(data){
      $('#table').html(data);  
    })
  }

</script>
<script type="text/javascript">
      //kembalian dan total bayar  
        function hitung() {
          var total = document.getElementById('total').value;
          var bayar = document.getElementById('bayar').value;

          var result = parseInt(bayar) - parseInt(total);
          
          if (isNaN(result)) {
            
          }
          document.getElementById('kembalian').value = result;
        }
        function totalan(ttl) {
          var potongan = document.getElementById('potongan').value;
          var bayar = document.getElementById('bayar').value;
          var result = parseInt(ttl) - parseInt(potongan);
          var kembaliannya = parseInt(ttl) - parseInt(potongan);
          if (potongan=="") {
            document.getElementById('total').value = ttl;   
          }else{
            document.getElementById('total').value =result;
          }
        }
</script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>


                            
