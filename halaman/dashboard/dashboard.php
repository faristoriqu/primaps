
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
                  <center>
                  <script type="text/javascript">
                    window.onload = function() { jam(); }

                    function jam() {
                    var e = document.getElementById('jam'),
                    d = new Date(), h, m, s;
                    h = d.getHours();
                    m = set(d.getMinutes());
                    s = set(d.getSeconds());

                    e.innerHTML = h +':'+ m +':'+ s;

                    setTimeout('jam()', 1000);
                     }

                    function set(e) {
                    e = e < 10 ? '0'+ e : e;
                    return e;
                    }
                  </script>

                  <h2 id="jam"></h2>
                  </center>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="?halaman=barang" method="post"class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Contact Person</label>
                    </div>
                      <div class="col-sm-7">
                        <label  class="col-sm-10 control-label">
                          <i class="fa fa-phone"> 081554231595</i></label>
                      </div>

                      <div class="col-sm-7">
                        <label  class="col-sm-12 control-label">
                          <i class="fa fa-envelope">  www.pandawa.com</i></label>
                      </div>
                  </div>

                     <div class="box-body">
                    <div class="form-group">
                      <label  class="col-sm-1 control-label">Instansi</label>
                    </div>
                    <div class="col-sm-8">
                        <label  class="col-sm-12 control-label">
                          <i class="fa fa-building">  Politeknik Negeri Jember</i></label>
                      </div>
                  </div>
                                                 
                    
                    </div>
                  <!-- /.box-body -->
                  
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

