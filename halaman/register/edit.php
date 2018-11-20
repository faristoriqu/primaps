  <?php
  include '../../config/koneksi.php';
  $id = $_POST['id'];
  $query = mysqli_query($koneksi,"SELECT * FROM login WHERE id_user = '$id'") or die(mysqli_error());
  foreach ($query as $data) {
  ?>
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form class="form-horizontal" action="?halaman=register" method="POST">
              <div class="box-body">
  
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-8">
                    <input type="hidden" name="id_user" value="<?php echo $data['id_user']?>">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="text" class="form-control"  name="username" placeholder="Username" value="<?php echo $data['username']?>">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $data['password']?>" >
                  </div>
                </div>

                <div class="form-group">
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
