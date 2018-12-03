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
   $kode_otomatis = "TRS".str_pad($kode, 4, "0", STR_PAD_LEFT);
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

     $data = mysqli_query($koneksi, "SELECT * FROM transaksi_tmp WHERE id_barang='$id_barang'");
     $cari = mysqli_num_rows($data);
    if ($cari==0) {
        $query_add = mysqli_query($koneksi,"INSERT INTO transaksi_tmp VALUES('$id_barang','$jumlah')");
      if ($query_add==TRUE) {
        echo "<script>window.location.href='?halaman=transaksi'</script>";  
      }else{
            echo("gagal");
      }
    }else{
          $query_edit = mysqli_query($koneksi,"UPDATE transaksi_tmp SET jumlah=(jumlah + ".$jumlah.") WHERE id_barang='$id_barang' ");
      if ($query_edit==TRUE) {
        echo "<script>window.location.href='?halaman=transaksi'</script>";  
      }else{
          echo("gagal");
      }  
    }
  }

  if (isset($_POST['transaksi'])) {

    $id_barang=$_POST['id_barang'];
    $jumlah=$_POST['jumlah'];
    $kode_transaksi=$_POST['kode_transaksi'];
    $tanggal=$_POST['tanggal'];
    $total=$_POST['total'];
    $bayar=$_POST['bayar'];
    $potongan=$_POST['potongan'];
    $kembalian=$_POST['kembalian'];

    // fungsi untuk mendapatkan isi keranjang belanja
    function isi_tmp(){
      include 'config/koneksi.php';
      $isitmp = array();
      $baca = mysqli_query($koneksi,"SELECT * FROM transaksi_tmp WHERE id_barang= '$id_barang'");
      while ($baca = mysqli_fetch_array($data)) {
        $isitmp[] = $data;
      }
      return $isikeranjang;
    }
    // simpan ke transaksi
    $query_tambah= mysqli_query($koneksi,"INSERT INTO transaksi VALUES ('$kode_transaksi','$tanggal','$total','$potongan','$bayar','$kembalian')");

    //panggil isi keranjang dan hitung jumlah produk yang dibeli
    $isitmp = isi_tmp();
    $jml = count($isitmp);

    for ($i=0; $i < $jml ; $i++) { 
      $query_detadd = mysqli_query($koneksi,"INSERT INTO detail VALUES ('$kode_transaksi','{$isitmp[$i]['id_barang']}','{$isitmp[$i]['jumlah']}')");
    }
    //hapus data tmp
    for ($i=0 ; $i < $jml ; $i++ ) { 
      $query_deltmp = mysqli_query($koneksi,"DELETE FROM transaksi_tmp WHERE id_barang = '{$isitmp[$i]['id_barang']}'"); 
    }
  }

?> 
<section class="content">
  <div class="data">
    <div class="col-md-10 col-sm-offset-1">
      <div class="box box-info">
            <div class="box-header">
                <form class="form-horizontal" action="?halaman=transaksi" method="POST">
                  <div class="box-body">
                         
                    <div class="form-group">
                      <div class="col-sm-3 col-sm-offset-8">
                       <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="tanggal" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php $tgl=date('d-m-Y'); echo $tgl; ?>" readonly">
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
                       <select class="form-control select2" style="width: 100%;" name="id_barang">
                          <?php 
                          $query = mysqli_query($koneksi,"SELECT * FROM barang") or die(mysqli_error());
                          foreach ($query as $data){  
                          ?>
                        <option value="<?php echo $data['id_barang'] ?>"><?php echo $data['namabarang'] ?></option>
                        <?php } ?>
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <input type="number" class="form-control"  name="jumlah" placeholder="Jumlah">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-3 col-sm-offset-5">
                        <button type="submit" class="btn btn-info" name="tambah">Tambah</button>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-8 col-sm-offset-1">
                        <table class="table table-striped table-bordered">
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
                          <tbody>
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
                              <td colspan="2" style="text-align: center;"> <?php echo $ttl ?> </td>
                            </tr>               
                          </tfoot> 
                        </table>
                       </div> 
                    </div>

                    <div class="form-group">
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="total" value="<?php echo $ttl ?>">
                      </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="potongan" placeholder="Potongan">
                      </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="bayar" placeholder="Bayar">
                      </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="kembalian" placeholder="Kembalian">
                      </div>
                      <div class="col-sm-3">
                        <button type="submit" class="btn btn-warning" name="transaksi">Transaksi</button>
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

