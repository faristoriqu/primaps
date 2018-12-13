
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less --> 
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar.png" class="img-circle" alt="User Image">
        </div>  
        <div class="pull-left info">
          <p><?php echo $_SESSION ['username'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>

      </div>
      <!-- search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Home</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li class="active"><a href="?halaman=data_kategori"><i class="fa fa-circle-o"></i> Data Kategori Barang</a></li>
            <li class="active"><a href="?halaman=barang"><i class="fa fa-circle-o"></i> Data Barang</a></li>
            <li class="active"><a href="?halaman=data_satuan"><i class="fa fa-circle-o"></i> Data Satuan</a></li>
            <li class="active"><a href="?halaman=supplier"><i class="fa fa-circle-o"></i> Data Suplier</a></li>
            <li class="active"><a href="?halaman=barang_masuk"><i class="fa fa-circle-o"></i> Data Barang Masuk</a></li>
            <li class="active"><a href="?halaman=po"><i class="fa fa-circle-o"></i> PO</a></li>
            <li class="active"><a href="?halaman=transaksi"><i class="fa fa-circle-o"></i> Transaksi</a></li>
            <li class="active"><a href="?halaman=pemesanan"><i class="fa fa-circle-o"></i> Pemesanan</a></li>
          
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Menu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="halaman/login/login.php"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="?halaman=register"><i class="fa fa-circle-o"></i> Register</a></li>
            
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?halaman=laporan_barang"><i class="fa fa-circle-o"></i> Barang</a></li>
            <li><a href="?halaman=laporan_penjualan"><i class="fa fa-circle-o"></i> Penjualan</a></li>
            <li><a href="?halaman=laporan_pemesanan"><i class="fa fa-circle-o"></i> Pemesanan</a></li>
            
          </ul>
        </li>

        
        
          
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
