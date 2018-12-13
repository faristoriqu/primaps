  <?php
  include '../../../config/koneksi.php';
  $id = $_POST['id'];
  $query = mysqli_query($koneksi,"SELECT * FROM po WHERE id_po = '$id'") or die(mysqli_error());
  foreach ($query as $data) {
  ?>
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit PO</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form class="form-horizontal" action="?halaman=po" method="POST">
              <div class="box-body">
  
                <div class="form-group">
                  <label  class="col-sm-3 control-label">Nama PO</label>
                  <div class="col-sm-7">
                    <input type="hidden" name="id_user" value="<?php echo $data['id_do']?>">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="text" class="form-control"  name="nama" placeholder="Nama" value="<?php echo $data['nama']?>">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-3 control-label">Harga</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="harga" placeholder="Harga" value="<?php echo $data['harga']?>" >
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
