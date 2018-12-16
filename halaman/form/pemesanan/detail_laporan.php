<?php
include '../../../config/koneksi.php';
  $id = $_POST['id'];
  $query = mysqli_query($koneksi,"SELECT * FROM pemesanan WHERE kode_pemesanan = '$id'") or die(mysqli_error());
  foreach ($query as $data) {
?>
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Data Pemesanan</h4>
      </div>
      <div class="modal-body">
  
                <div class="form-group">
                  <label  class="col-md-3 control-label">Kode Pemesanan</label>
                  <div class="col-md-4">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="text" class="form-control"  name="kode_pemesanan" readonly="readonly" placeholder="Username" value="<?php echo $data['kode_pemesanan']?>">
                  </div>
                  <div class="col-md-4">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="text" class="form-control"  name="kode_pemesanan" readonly="readonly" placeholder="Username" value="<?php echo $data['namapemesan']?>">
                  </div>
                </div>
                <?php } ?>
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pemesanan</th>
                  <th>Jumlah</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                      $query = mysqli_query($koneksi,"SELECT * FROM pemesanan JOIN detail_pemesanan ON pemesanan.kode_pemesanan=detail_pemesanan.kode_pemesanan JOIN po ON detail_pemesanan.id_po=po.id_po WHERE pemesanan.kode_pemesanan = '$id' ORDER BY pemesanan.kode_pemesanan DESC" ) or die(mysqli_error());
                      $no=1;
                      while ($data = mysqli_fetch_array($query)) {  
                    ?>  
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['jumlah']; ?></td>
                    
                  </tr>
                <?php $no++; }  ?>
                </tbody>
              </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
        
      </div>
    </div>
    <!-- /.modal-content -->
</div>

