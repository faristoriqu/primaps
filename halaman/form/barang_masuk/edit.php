  <?php
  include '../../../config/koneksi.php';
  $id = $_POST['id'];
  $query = mysqli_query($koneksi,"SELECT * FROM barangmasuk WHERE idbm = '$id'") or die(mysqli_error());
  foreach ($query as $data) {
  ?>
  <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data Barang Masuk</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form class="form-horizontal" action="?halaman=barang_masuk" method="POST">
              <div class="box-body">
  
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Tanggal</label>
                  <div class="col-sm-8">
                    <input type="hidden" name="idbm" value="<?php echo $data['idbm']?>">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="date" class="form-control" id="tgl"  name="tgl" placeholder="Tanggal" value="<?php echo $data['tgl']?>">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Jumlah</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" value="<?php echo $data['jumlah']?>" >
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Harga</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" value="<?php echo $data['harga']?>" >
                  </div>
                </div>
      
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Jual</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="jual" name="jual" placeholder="Jual" value="<?php echo $data['jual']?>" >
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
