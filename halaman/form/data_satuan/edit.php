  <?php
  include '../../../config/koneksi.php';
  $id = $_POST['id'];
  $query = mysqli_query($koneksi,"SELECT * FROM satuan WHERE ids = '$id'") or die(mysqli_error());
  foreach ($query as $data) {
  ?>
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Satuan Barang </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form class="form-horizontal" action="?halaman=data_satuan" method="POST">
              <div class="box-body">
  
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Satuan Barang</label>
                  <div class="col-sm-8">
                    <input type="hidden" name="ids" value="<?php echo $data['ids']?>">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="text" class="form-control"  name="namasatuan" placeholder="Satuan Barang" value="<?php echo $data['namasatuan']?>">
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
            <?php } ?>
  </div>
