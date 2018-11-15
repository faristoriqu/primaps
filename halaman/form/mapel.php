<br> 

<div class="col-md-10" id="tambah" >
<!-- Horizontal Form -->
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Mapel</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <button class="btn btn-default" id="hideform">Hide</button>     
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="kelas" placeholder="Kelas">
                  </div>
                </div>

                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Semester</label>
                  <div class="col-sm-8">
                    
                  <select class="form-control">
                    <option value="ganjil">Ganjil</option>
                    <option value="genap">Genap</option>
                  </select>
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
              <button class="btn btn-info " id="click-tambah" ><li class="fa fa-plus"></li> Tambah</button>
              <h3 class="box-title">Data Semua Guru</h3>
            </div>
    
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kelas</th>                
                  <th>Semester</th>
                                  
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  
        `       </tr>
        
                
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

<script src="bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
      $("#tambah").hide();
        $("#click-tambah").click(function(e) {
          e.preventDefault()
            $("#tambah").show();
        });
        $("#hideform").click(function(e) {
          e.preventDefault()
            $("#tambah").hide();
        });
    });
</script>

