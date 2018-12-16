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
                  <div class="col-md-8">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="text" class="form-control"  name="kode_pemesanan" readonly="readonly" placeholder="Username" value="<?php echo $data['kode_pemesanan']?>">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-md-2 control-label">Nama</label>
                  <div class="col-md-4">
                    <input type="text" class="form-control" name="namapemesan" id="namapemesan"  value="<?php echo $data['namapemesan']?>" >
                  </div>
                  <div class="col-md-4">
                    <input type="text" class="form-control" name="telepon" id="telepon"  value="<?php echo $data['telepon']?>" >
                  <label  class="col-md-2 control-label">Telefon</label>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-md-2 control-label">Total</label>
                  <div class="col-md-4">
                    <input type="text" class="form-control" name="total" id="total" placeholder="Password" value="<?php echo $data['total']?>" >
                  </div>
                  <div class="col-md-4">
                    <input type="text" class="form-control" name="bayar" onkeyup="hitung();" id="bayar" placeholder="Password" value="<?php echo $data['bayar']?>" >
                  <label  class="col-md-2 control-label">Bayar</label>
                  </div>
                </div>
                
                <?php
                  $kurang = $data['bayar']-$data['total'];
                ?>
                <div class="form-group">
                  <label  class="col-md-2 control-label">Sisa</label>
                  <div class="col-md-4">
                    <input type="text" class="form-control"  name="kurang" id="kurang" placeholder="Password" value="<?php echo $kurang?>" >
                  </div>
                </div>
                <!-- <div class="form-group">
                </div>
                <div class="form-group">
                </div> -->
              <!-- /.box-body -->
              
              <!-- /.box-footer -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
</div>
<?php } ?>
