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
    //menamping session id ke dalam $sid
    $sid = session_id();
    //hapus data sesuai id po dan sid
    $query_delete = mysqli_query($koneksi,"DELETE FROM pemesanan_tmp WHERE id_po='$_GET[delete]' AND sid='$sid'")or die(mysql_error());
    
    if ($query_delete == TRUE) {
      echo "<script>window.location.href='?halaman=pemesanan'</script>";
    }else{
      echo "gagal";
    } 
  }



  
  if(isset($_POST['tambah'])){
    
    $id_po=$_POST['id_po'];
    $jumlah=$_POST['jumlah'];
    $sid=$_POST['sid'];
    
    //masukkan data ke dalam tabel pemesanan_tmp
    //cari dulu nama barang nya dengan sid yang sama dengan saat ini
     $data = mysqli_query($koneksi, "SELECT * FROM pemesanan_tmp WHERE id_po='$id_po' AND sid='$sid'");
     $cari = mysqli_num_rows($data);
    if ($cari==0) {
      // jika tidak ditemykan adanya data, maka insert
        $query_add = mysqli_query($koneksi,"INSERT INTO pemesanan_tmp VALUES('$id_po','$jumlah','$sid')");
      
    }else{
      //jika sudah ada data dan session nya sama makan jumlah akan bertambah
          $query_edit = mysqli_query($koneksi,"UPDATE pemesanan_tmp SET jumlah=(jumlah + ".$jumlah.") WHERE id_po='$id_po' AND sid= '$sid' ");
      
    }
  }

  if (isset($_POST['simpan'])) {
    $sid =session_id();
    $kode_pemesanan=$_POST['kode_pemesanan'];
    $tanggal=date("Y-d-m",strtotime($_POST['tanggal']));
    // $tanggal=$_POST['tanggal'];
    $namapemesan=$_POST['namapemesan'];
    $telepon=$_POST['telepon'];
    $alamat=$_POST['alamat'];
    $id_po=$_POST['id_po'];
    $jumlah=$_POST['jumlah'];
    $total=$_POST['total'];
    $bayar=$_POST['bayar'];

    if ($namapemesan != "" && $telepon != "" && $bayar !="") {
      # code...
      
      //mendata data yang ada di pemesanan tmp dengan sid tsb
      $baca = mysqli_query($koneksi,"SELECT * FROM pemesanan_tmp WHERE sid = '$sid'");
      //kemudian di array dengan foreach dengan tujuan agar tak perlu perulangan jika data lebih dari satu
      foreach ($baca as $kolom ) {
        $id = $kolom['id_po'];
        $j = $kolom['jumlah'];
        // insert ke dalam detail
       $query_detadd = mysqli_query($koneksi,"INSERT INTO detail_pemesanan VALUES ('$kode_pemesanan','$id','$j')");      
      }

      // simpan ke transaksi
      $query_tambah= mysqli_query($koneksi,"INSERT INTO pemesanan VALUES ('$kode_pemesanan',now(),'$namapemesan','$telepon','$alamat','$total','$bayar')");
      //hapus data di tmp
      $query_deltmp = mysqli_query($koneksi,"DELETE FROM pemesanan_tmp WHERE sid = '$sid'"); 
      echo "<script>window.location.href='?halaman=laporan_pemesanan'</script>";  
    }
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
                      <label  class="col-sm-2 control-label">Kode Pemesanan</label>
                      <div class="col-sm-3 col-sm-offset-1">
                        <input type="text" class="form-control" readonly name="kode_pemesanan" placeholder="" value="<?php echo $kode_otomatis; ?>" >
                      </div>

                      
                       <div class="col-sm-3 ">
                       <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="tanggal" readonly class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php date_default_timezone_set("Asia/Jakarta"); echo date('d-m-Y'); ?>" readonly">
                          </div>
                      
                      </div>
                      <div class="col-sm-3">
                            <input type="text" class="form-control" readonly name="sid" placeholder="" value="<?php $sid = session_id(); echo $sid ?>" >
                          </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Data Pemesan</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="namapemesan" placeholder="Pemesan" id="namapemesan">  
                      </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="telepon" placeholder="Telepon" id="telepon">
                      </div>
                      <div class="col-sm-4">
                        <textarea name="alamat" row="4" placeholder="Alamat"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Nama Pesanan</label>
                      <div class="col-sm-3">
                       <select class="form-control select2" style="width: 100%;" name="id_po" id="id_po">
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
                            $query = mysqli_query($koneksi,"SELECT * FROM pemesanan_tmp JOIN po ON pemesanan_tmp.id_po=po.id_po WHERE sid='$sid'") or die(mysqli_error());
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
                                <a class="btn btn-danger " href="?halaman=pemesanan&delete=<?php echo $data['id_po'] ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')"> <li class="fa fa-close"></li> </a>

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

                      <div class="col-sm-3 col-sm-offset-1">
                        <button  type="submit" class="btn btn-warning" name="simpan" id="simpan">Simpan</button>
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
    $("#id_po").change(function(){
      var stok = $(this).find(":selected").data("stok")
      $("#stok").val(stok)
    })
    $("#jumlah").keyup(function(){
      var id_po = $("#id_po").val()
      var jumlah = $("#jumlah").val()
      if(id_po==""){
        alert("Pilih Pesanan");
      }else{
          var stok = parseInt($("#stok").val())
          var thisVal = parseInt($(this).val())
          var jumlah = $("#jumlah").val()
          if(thisVal==""){
            alert("masukkan jumlah");
          }else{
            return TRUE;
          }
      }
    })
    $("#btn").click(function(){
      var jumlah = document.getElementById('jumlah').value;
      var id_po = $("#id_po").val()
      if(jumlah =="" && id_po == ""){
        alert("Pilih Barang Dan Masukkan Jumlah")
      }else if(jumlah =="" && id_po != ""){
        alert("Masukkan Jumlah")
      }else if(jumlah !="" && id_po == ""){
        alert("Pilih Barang")
      }
    })

    $("#simpan").click(function(){
      var namapemesan = document.getElementById('namapemesan').value;
      var bayar = document.getElementById('bayar').value;
      var telepon = document.getElementById('telepon').value;
      if(telepon =="" && namapemesan == ""){
        alert("Masukkan Nama Pemesan Dan No Telefon")
      }else if((telepon =="" && namapemesan != "")){
        alert("Masukkan No Telefon")
      }else if((telepon !="" && namapemesan == "")){
        alert("Masukkan Nama Pemesan")
      }else if(jumlah !="" && id_po != "" && bayar ==""){
        alert("Cek Bayar")
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

<?php 
  
  if(isset($_POST['transaksi'])){
  
      echo "<script>window.location.href='halaman/form/cetak/cetak_pemesanan.php?val=$kode_pemesanan'</script>"; 
  
  }
?>
                            
