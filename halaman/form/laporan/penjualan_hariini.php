<head>
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
</head>
              <div class="form-group">
                <div class="col-md-3 ">
                  <?php
                   include '../../../config/koneksi.php';
                   $id=$_POST['id']; 
                   if ($id == "show-all") {
                  ?>
                    <button class="btn btn-success" name="semua" ><li class="fa fa-print"></li>DO</button>
                  <?php
                    }else if ($id == "hari-ini"){    
                  ?>  
                    <button class="btn btn-success" name="hariini"><li class="fa fa-print"></li>DO</button>  
                  <?php 
                    }else if ($id == "minggu-ini"){
                  ?>
                    <button class="btn btn-success" name="mingguini"><li class="fa fa-print"></li>DO</button>  
                  <?php
                    }else if ($id == "bulan-ini"){
                  ?>
                    <button class="btn btn-success" name="bulanini"><li class="fa fa-print"></li>DO</button>  
                  <?php  
                    }else if ($id == "tahun-ini"){
                  ?>
                    <button class="btn btn-success" name="tahunini"><li class="fa fa-print"></li>DO</button>  
                  <?php  
                    }
                  ?>
                </div>
              </div>
              <br><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>Kode Transaksi</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Potongan</th>
                    <th>Total Harga</th>
                  </tr>
                </thead>                
                <tbody>
                   <?php 
                    include '../../../config/koneksi.php';
                    $id=$_POST['id'];
                    date_default_timezone_set("Asia/Jakarta");
                    $tanggal=date('Y-m-d');
                    

                    if ($id == "show-all") {
                      $query = mysqli_query($koneksi,"SELECT * FROM transaksi JOIN detail ON transaksi.kode_transaksi =detail.kode_transaksi JOIN barang ON detail.id_barang=barang.id_barang ORDER BY transaksi.kode_transaksi ASC") or die(mysqli_error());
                    }else if ($id == "hari-ini"){
                      $query = mysqli_query($koneksi,"SELECT * FROM transaksi JOIN detail ON transaksi.kode_transaksi =detail.kode_transaksi JOIN barang ON detail.id_barang=barang.id_barang WHERE tanggal= DATE(NOW()) ORDER BY transaksi.kode_transaksi ASC ") or die(mysqli_error());
                    }
                    else if ($id == "minggu-ini"){
                      $query = mysqli_query($koneksi,"SELECT * FROM transaksi JOIN detail ON transaksi.kode_transaksi =detail.kode_transaksi JOIN barang ON detail.id_barang=barang.id_barang WHERE YEARWEEK(tanggal)=YEARWEEK(NOW()) ORDER BY transaksi.kode_transaksi ASC ") or die(mysqli_error());
                    }else if ($id == "bulan-ini"){
                      $query = mysqli_query($koneksi,"SELECT * FROM transaksi JOIN detail ON transaksi.kode_transaksi =detail.kode_transaksi JOIN barang ON detail.id_barang=barang.id_barang WHERE MONTH(tanggal)=MONTH(NOW()) ORDER BY transaksi.kode_transaksi ASC ") or die(mysqli_error());
                    }
                    else if ($id == "tahun-ini"){
                      $query = mysqli_query($koneksi,"SELECT * FROM transaksi JOIN detail ON transaksi.kode_transaksi =detail.kode_transaksi JOIN barang ON detail.id_barang=barang.id_barang WHERE YEAR(tanggal)=YEAR(NOW()) ORDER BY transaksi.kode_transaksi ASC ") or die(mysqli_error());
                    }
                    
                  $no=1;
                  foreach ($query as $data) {  
                ?> 
                  <tr>
                    <td><?php echo $data['tanggal']; ?></td>
                    <td><?php echo $data['kode_transaksi']; ?></td>
                    <td><?php echo $data['total']; ?></td>
                    <td><?php echo $data['namabarang']; ?></td>
                    <td><?php echo $data['potongan']; ?></td>
                    <td><?php echo $data['bayar']; ?></td> 
                  </tr>
                  <?php $no++;} ?>
                </tbody>
              </table>
              <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'responsive'  : true,
    })
  })
</script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

