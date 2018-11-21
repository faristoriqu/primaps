  <?php
  include '../../../config/koneksi.php';
  $id = $_POST['id'];
  $query = mysqli_query($koneksi,"SELECT * FROM supplier WHERE id_supplier = '$id'") or die(mysqli_error());
  foreach ($query as $data) {
  ?>
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Supplier</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form class="form-horizontal" action="?halaman=supplier" method="POST">
              <div class="box-body">
  
                <div class="form-group">
                  <label  class="col-sm-3 control-label">Nama Supplier</label>
                  <div class="col-sm-7">
                    <input type="hidden" name="id_user" value="<?php echo $data['id_supplier']?>">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="text" class="form-control"  name="namasupplier" placeholder="Username" value="<?php echo $data['namasupplier']?>">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-3 control-label">Alamat</label>
                  <div class="col-sm-7">

                    <textarea name="alamat" class="form-control"><?php echo $data['alamat']?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-3 control-label">Telefon</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="telefon" placeholder="Telefon" value="<?php echo $data['telefon']?>" >
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
