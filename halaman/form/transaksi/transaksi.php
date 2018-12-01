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
    $sid=session_id();
    $id_barang=$_POST['id_barang'];
    $id=$_POST['id_barang'];
    $jumlah=$_POST['jumlah'];
    $kode_transaksi=$_POST['kode_transaksi'];

    // $query_add = mysqli_query($koneksi,"INSERT INTO transaksi VALUES('$kode_transaksi','$jumlah','$kode_transaksi')");

    $query_add = mysqli_query($koneksi,"INSERT INTO transaksi_tmp VALUES('$id_barang','$jumlah','$kode_transaksi')");

      //di cek dulu apakah barang yang di beli sudah ada di tabel keranjang
       //$sql = mysqli_query($koneksi,"SELECT * FROM transaksi WHERE id_barang='$id' AND kode_transaksi='$sid'");
      // $ketemu=mysqli_num_rows($sql);
      // if ($ketemu==0){
      //   // kalau barang belum ada, maka di jalankan perintah insert
       
        
      // } else {
      //     //  kalau barang ada, maka di jalankan perintah update
      //     $query_edit=mysqli_query($koneksi,"UPDATE transaksi_tmp SET jumlah=jumlah + '$jumlah' WHERE kode_transaksi='$sid' AND id_barang='$id'");
      // }   
    if ($query_add==TRUE) {
        echo "<script>window.location.href='?halaman=transaksi'</script>";  
        }else{
          echo("gagal");
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
                            <input type="text" name="tgl_lahir" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php $tgl=date('d-m-Y'); echo $tgl; ?>" disabled="disabled">
                          </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Kode Transaksi</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" readonly name="kode_transaksi" placeholder="" value="<?php echo $kode_otomatis ?>" >
                      </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="karyawan" placeholder="nama karyawan">
                      </div>
                      <label  class="col-sm-1 control-label">Karyawan</label>
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
                  
                  $query = mysqli_query($koneksi,"SELECT * FROM transaksi_tmp ") or die(mysqli_error());
                  $no=1;
                  while ($data = mysqli_fetch_array($query)) {  
                ?>  
                <tbody>
                  <tr>
                    <td><?php echo $no ?></td>
                    
                    <td><?php echo $data['id_barang']; ?></td>
                   
                    <td>
                      
                      <a class="btn btn-danger " href="?halaman=transaksi&delete=<?php echo $data['id_barang'] ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')"> <li class="fa fa-close"></li> </a>

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

