<br> 
<div class="col-md-10" id="tambah">
<!-- Horizontal Form -->
  <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title">Kelola Data Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <button class="btn btn-default" id="hideform">Hide</button>              
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Nama Barang</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="namabarang" name="namabarang" placeholder="Nama Barang">
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
            <h3 class="box-title">Data Semua Barang</h3>
            </div>
    
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Barang</th>
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Stok</th>
                  <th>Satuan</th>
                  <th>Harga Beli</th> 
                  <th>Harga Jual</th>                
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>01</td>
                  <td>Obat</td>
                  <td>30</td>
                  <td>50</td>
                  <td>20</td>
                  <td>20000</td>
                  <td>21000</td>
        `       </tr>
        
                <tr>
                  <td>02</td>
                  <td>Pakan</td>
                  <td>40</td>
                  <td>60</td>
                  <td>50</td>
                  <td>30000</td>
                  <td>31000</td>
                </tr>
        
                <tr>
                  <td>03</td>
                  <td>Vaksin</td>
                  <td>30</td>
                  <td>20</td>
                  <td>50</td>
                  <td>10000</td>
                  <td>11000</td>
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

