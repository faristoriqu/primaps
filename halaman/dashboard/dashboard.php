
<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="data">
        <div class="col-lg-3 col-xs-2">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              
              <h3 >10</h3> 

              <p style="font-size: 18px">Data Kategori Barang</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="?halaman=data_kategori" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
          </div>
          <div class="small-box bg-green">  
            <div class="inner">
              <h3>10</h3>

              <p style="font-size: 18px">Data Barang</p>
            </div>
            <div class="icon">
              <i class="ion ion-filing"></i>
            </div>
            <a href="?halaman=barang" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
          </div>
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>10</h3>

              <p style="font-size: 18px">Data Satuan Barang</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-browsers"></i>
            </div>
            <a href="?halaman=data_satuan" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-2">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>10</h3>

              <p style="font-size: 18px">Data Supplier</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="?halaman=supplier" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
          </div>
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>10</h3>

              <p style="font-size: 18px">Data Barang Masuk</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-archive"></i>
            </div>
            <a href="?halaman=barang_masuk" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
          </div>
          <div class="small-box bg-lime">
            <div class="inner">
              <h3>10</h3>

              <p style="font-size: 18px">Transaksi</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-cart"></i>
            </div>
            <a href="?halaman=transaksi" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col col-lg-1 col-xs-2"></div>
        <div class="col-lg-4 col-xs-6">

          <div class="box box-info">
                <div class="box-header with-border">
                  <center><h3 class="box-title"> <?php date_default_timezone_set("Asia/Jakarta"); echo date('d-m-Y H:i:s'); ?></h3> </center>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="?halaman=barang" method="post"class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Nama Barang</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="namabarang" name="namabarang" placeholder="Nama Barang">
                      </div>
                    </div>

                     <div class="form-group">
                      <label  class="col-sm-2 control-label">Kategori</label>
                      <div class="col-sm-8">
                         
                       <select class="form-control select2" name="idkat" style="width: 100%;">
                         <option value="">-Pilih Kategori-</option>
                        <?php 
                      
                          $query = mysqli_query($koneksi,"SELECT * FROM kategori") or die(mysqli_error());
                          while ($data = mysqli_fetch_array($query)) {  
                        ?>
                        <option value="<?php echo $data['idkat'] ?>"><?php echo $data['kategori'] ?></option>
                        <?php } ?>    
                          
                          </select>
                      </div>
                      </div>
                   
                      <div class="form-group">
                      <label  class="col-sm-2 control-label">Satuan</label>
                      <div class="col-sm-8">
                       <select class="form-control select2" name="ids" style="width: 100%;">
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
                    <button type="submit" class="btn btn-default" id="hideform">Batal</button>
                    <button type="submit" class="btn btn-info pull-right" name="simpan">Simpan
                    </button>
                  </div>
                  <!-- /.box-footer -->
                </form>
          </div>
          <!-- small box -->
          <!-- small box -->
          
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          
        </div>

        

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          
        </div>
        <!-- ./col -->
      </div>
</section>
