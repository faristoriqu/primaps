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
        <form class="form-horizontal" action="?halaman=laporan_pemesanan" method="POST">
              <div class="box-body">
  
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Kode Pemesanan</label>
                  <div class="col-sm-8">
                    
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="text" class="form-control"  name="username" placeholder="Username" value="<?php echo $data['kode_pemesanan']?>">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="password" placeholder="Password" value="<?php echo $data['namapemesan']?>" >
                  </div>
                </div>
                
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Total</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="password" placeholder="Password" value="<?php echo $data['total']?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Bayar</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="password" placeholder="Password" value="<?php echo $data['bayar']?>" >
                  </div>
                </div>
                    <?php
                      $kurang = $data['bayar']-$data['total'];
                    ?>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Kurang</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="password" placeholder="Password" value="<?php echo $kurang?>" >
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default" id="hideforme">Batal</button>
                <button type="submit" class="btn btn-info pull-right" name="edit">Simpan</button>
              </div>
              <!-- /.box-footer -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
</div>
<?php } ?>
