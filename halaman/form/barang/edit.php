  <?php
  include '../../../config/koneksi.php';
  $id = $_POST['id'];
  $query = mysqli_query($koneksi,"SELECT * FROM barang WHERE id_barang = '$id'") or die(mysqli_error());
  foreach ($query as $data) {
  ?>
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form class="form-horizontal" action="?halaman=barang" method="POST">
              <div class="box-body">
  
                <div class="form-group">
                  <label  class="col-sm-3 control-label">Nama Barang</label>
                  <div class="col-sm-7">
                    <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']?>">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="text" class="form-control"  name="namabarang" placeholder="namabarang" value="<?php echo $data['namabarang']?>">
                  </div>
                </div>

                <div class="form-group"> 
                  <label class="col-sm-3 control-label">Kategori</label>
                  <div class="col-sm-7" >
                    <select  name="idkat" id="idkat" class="form-control" class="form-control select2"  >
                      <option value="">-Pilih Kategori-</option>
                    <?php 
                    $querykat = mysqli_query($koneksi,"SELECT * FROM kategori") or die(mysqli_error());
                    foreach ($querykat as $kat ) {  
                    ?>
                    <option value="<?php echo $data['idkat'] ?>"
                      
                      <?php if($kat['idkat']==$data['idkat']){ 
                        echo "Selected";
                      } ?>
                      >
                      <?php echo $kat['kategori'] ?>
                        
                      </option>
                    
                    <?php } ?>    
                    
                    </select>
                  </div>
                  </div>
    
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Satuan</label>
                  <div class="col-sm-7">
                  <select name="ids" id="ids" class="form-control" >
                    <option value="">-Pilih Satuan-</option>
                    <?php 
                  
                      $query = mysqli_query($koneksi,"SELECT * FROM satuan") or die(mysqli_error());
                      while ($data = mysqli_fetch_array($query)) {  
                    ?>
                    <option value="<?php echo $data['ids'] ?>"><?php echo $data['namasatuan'] ?></option>
                    <?php } ?>    
                                       
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
