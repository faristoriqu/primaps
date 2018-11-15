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
<section class="content">
  <div class="row">
    <div class="col-md-10">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Semua Guru</h3>
            </div>
    
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Mata Pelajaran</th>
                  <th>Kelas</th>
                  <th>Alamat</th>
                  <th>Status</th> 
                  <th>Nomor HP</th>                
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>Khafidurrohman </td>
                  <td>Interaksi Manusia Komputer</td>
                  <td> 5</td>
                  <td> Perumahan Mastrib Blok H.12</td>
                  <td>PNS</td>
                  <td>086473846574</td>
        `       </tr>
        
                <tr>
                  <td>2</td>
                  <td>Elly Antika</td>
                  <td>Managemen Basis Data</td>
                  <td> 6</td>
                  <td>Jl. Melati 60 Sumbersari -  Jember</td>
                  <td>PNS</td>
                  <td>081928736546</td>
                </tr>
        
                <tr>
                  <td>3</td>
                  <td>Winarko Wedyodiningrat</td>
                  <td>Matematika Dasar</td>
                  <td> 1</td>
                  <td>Jl. PB Sudirman Gang Mawar 29 Jember</td>
                  <td>Honorer</td>
                  <td>087656374827</td>
                </tr>
                
                </tbody>
                <tfoot>
                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
  </div>
</section>


