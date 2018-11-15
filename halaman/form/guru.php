<br> 
<div class="col-md-10">
<!-- Horizontal Form -->
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Kelola Data Guru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                
                <div class="form-group">
                  <label  class="col-sm-2 control-label">NIP Guru</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="namaguru" name="nipguru" placeholder="NIP Guru">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Nama Guru</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="namaguru" name="namaguru" placeholder="Nama Guru">
                  </div>
                </div>

                <!-- select -->
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-9">
                    
                  <select class="form-control">
                    <option>Pria</option>
                    <option>Wanita</option>
                  </select>
                  </div>
                </div>

                <div class="form-group">
                <label  class="col-sm-2 control-label" >Tgl. Lahir</label>
                <div class="col-sm-9">

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>

                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                  <label class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-9">
                    
                  <select class="form-control">
                    <option>Pegawai negeri Sipil (PNS)</option>
                    <option>Guru Tidak Tetap (GTT)</option>
                    <option>Guru Belum Tetap (GBT)</option>
                    <option>Guru Wiyata Bhakti (GWB)</option>
                  </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label  class="col-sm-2 control-label" name="alamat">Upload Foto</label>

                  <div class="col-sm-9">
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


