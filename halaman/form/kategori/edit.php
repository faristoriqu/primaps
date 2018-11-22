  <?php
  include '../../config/koneksi.php';
  $id = $_POST['id'];
  $query = mysqli_query($koneksi,"SELECT * FROM kategori WHERE idkat = '$id'") or die(mysqli_error());
  foreach ($query as $data) {
  ?>
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Kategori</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form class="form-horizontal" action="?halaman=register" method="POST">
              <div class="box-body">
  
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Id Kategori</label>
                  <div class="col-sm-8">
                    <input type="hidden" name="idkat" value="<?php echo $data['idkat']?>">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="text" class="form-control"  name="idkat" placeholder="Id Kategori" value="<?php echo $data['idkat']?>">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Nama Kategori</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" name="kategori" placeholder="Nama Kategori" value="<?php echo $data['kategori']?>" >
                  </div>
                </div>

                <!-- <div class="form-group">
                  <label class="col-sm-2 control-label">Level</label>
                  <div class="col-sm-8">
                    
                  <select class="form-control" name="level">
                    <option value="admin" <?php if ($data['level']=='admin') {
                       echo "Selected";
                    }?>>Admin</option>
                    <option value="karyawan" <?php if($data['level']=='karyawan') {
                      echo "Selected";
                    } ?>>Karyawan</option>
                  </select>
                  </div>
                </div> -->
                
                
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
