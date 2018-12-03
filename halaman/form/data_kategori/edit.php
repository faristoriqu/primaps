  <?php
  include '../../../config/koneksi.php';
  $id = $_POST['id'];
  $query = mysqli_query($koneksi,"SELECT * FROM kategori WHERE idkat = '$id'") or die(mysqli_error());
  foreach ($query as $data) {
  ?>  
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Kategori Barang </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form class="form-horizontal" action="?halaman=data_kategori" method="POST">
              <div class="box-body">
  
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Kategori Barang</label>
                  <div class="col-sm-8">
                    <input type="hidden" name="idkat" value="<?php echo $data['idkat']?>">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="text" class="form-control"  name="kategori" placeholder="Kategori Barang" value="<?php echo $data['kategori']?>">
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
