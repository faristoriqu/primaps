
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
                    
                    $query = mysqli_query($koneksi,"SELECT * FROM transaksi JOIN detail ON transaksi.kode_transaksi =detail.kode_transaksi JOIN barang ON detail.id_barang=barang.id_barang WHERE tanggal= '$tanggal'") or die(mysqli_error());
                  $no=1;
                  while ($data = mysqli_fetch_array($query)) {  
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
