<br> 
<div class="col-md-10">
<!-- Horizontal Form -->
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Siswa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="noinduk" placeholder="Kelas">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Nomor Induk</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="noinduk" placeholder="Nomor Induk">
                  </div>
                </div>
  
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Nama Siswa</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="namasiswa" name="namasiswa" placeholder="Nama Siswa">
                  </div>
                </div>


                <div class="form-group">
                  <label  class="col-sm-2 control-label" name="alamat">Tempat Lahir</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" placeholder="Tempat">
                  </div>
                  <label  class="col-sm-2 control-label" name="alamat">Tanggal</label>
                  <div class="col-sm-3">
                    <div class="input-group">
                         <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                  </div>
                  <!-- /input-group -->
                </div>
                  </div>
                

                <!-- select -->
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-8">
                    
                  <select class="form-control">
                    <option>Pria</option>
                    <option>Wanita</option>
                  </select>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label" name="alamat">Agama</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Agama">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label" name="alamat">Nama Ayah</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Ayah">
                  </div>
                  <label  class="col-sm-2 control-label" name="alamat">Nama Ibu</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Ibu">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label" name="alamat">Alamat</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Alamat">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label" name="alamat">Foto</label>

                  <div class="col-sm-8">
                    <input type="file" id="exampleInputFile">
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Batal</button>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
  </div>
</div>



