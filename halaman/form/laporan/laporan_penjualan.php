<section class="content">
  <div class="data">
      <div class="col-md-10 col-sm-offset-1">
       <form action="?halaman=laporan_penjualan" method="post">
      <div class="box box-primary">
            <div class="box-header">
               <h3 class="box-title">Laporan Penjualan</h3>
               <br><br>

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
                    <th>No</th>
                    <th>No Faktur</th>
                    <th>Tanggal</th>
                    <th>Barang</th>
                    <th>Supplier</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Jual</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>                
                <body>
                <?php 
                  $query = mysqli_query($koneksi,"SELECT * FROM barangmasuk JOIN barang ON barangmasuk.id_barang =barang.id_barang JOIN supplier ON barangmasuk.id_supplier=supplier.id_supplier ORDER BY namabarang") or die(mysqli_error());
                  $no=1;
                  while ($data = mysqli_fetch_array($query)) {  
                ?> 
               
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data['nofaktur']; ?></td>
                    <td><?php echo $data['tgl']; ?></td>
                    <td><?php echo $data['namabarang']; ?></td>
                    <td><?php echo $data['namasupplier']; ?></td>
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
