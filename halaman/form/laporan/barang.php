<head>
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
</head>
  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Nama Barang</th>
                      <th>Satuan</th>
                      <th>Jumlah</th>
                      <th>Harga Beli</th>
                      <th>Harga Jual</th>
                    </tr>
                  </thead>                
                  <tbody>
                    <?php 
                  include '../../../config/koneksi.php';
                    $id=$_POST['id'];
                    // $ids=$_POST['ids'];
                    if ($id != "" ) {
                      $query = mysqli_query($koneksi,"SELECT * FROM barang JOIN satuan ON barang.ids=satuan.ids   WHERE idkat='$id'  ORDER BY barang.namabarang ASC") or die(mysqli_error());
                    }
                      while ($data = mysqli_fetch_array($query)) {  
                  ?> 
                 
                    <tr>
                      
                      <td><?php echo $data['namabarang']; ?></td>
                      <td><?php echo $data['namasatuan']; ?></td>
                      <td><?php echo $data['stok']; ?></td>
                      <td><?php echo $data['hargab']; ?></td>
                      <td><?php echo $data['hargaj']; ?></td>
                      
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  </tfoot>
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
