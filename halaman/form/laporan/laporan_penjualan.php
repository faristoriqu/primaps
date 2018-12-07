<section class="content">
  <div class="data">
      <div class="col-md-10 col-sm-offset-1">
       <form action="?halaman=laporan_penjualan" method="post">
      <div class="box box-primary">
        
            <div class="box-header">
               <center><h3 class="big-box">LAPORAN PENJUALAN BARANG</h3></center>
               <br><br>

                <div class="box-header with-border">
                  <h5 class="box-title">Pilih Tanggal</h5>
                </div>


                <div class="input-group">
                  <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                    <span>
                      <i class="fa fa-calendar"></i> Date range picker
                    </span>
                    <i class="fa fa-caret-down"></i>
                  </button>
                  </div>

            </div>  
                     

               
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>Kode Transaksi</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Potongan</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                  </tr>
                </thead>                
                <body>
                   <?php 
                  $query = mysqli_query($koneksi,"SELECT * FROM transaksi JOIN detail ON transaksi.kode_transaksi =detail.kode_transaksi  ORDER BY id_barang") or die(mysqli_error());
                  $no=1;
                  while ($data = mysqli_fetch_array($query)) {  
                ?> 
               
                  
               
                
               
                  <tr>
                    <td><?php echo $data['tanggal']; ?></td>
                    <td><?php echo $data['kode_transaksi']; ?></td>
                    <td><?php echo $data['total']; ?></td>
                    <td><?php echo $data['id_barang']; ?></td>
                    <td><?php echo $data['potongan']; ?></td>
                    <td><?php echo $data['bayar']; ?></td>
                    <td><?php echo $data['kembalian']; ?></td>
    
                    
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
