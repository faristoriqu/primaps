<?php 
  include 'config/koneksi.php';
 ?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>PrimaPS</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
    <link href="css/pages/dashboard.css" rel="stylesheet">

   


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

<body>

<div class="navbar navbar-fixed-top">
  
  <div class="navbar-inner">
    
    <div class="container">
      
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      
      <a class="brand" href="index.html">
        PrimaPS        
      </a>    
      
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown">           
          
          <li class="dropdown">           
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="icon-user"></i> 
              <?php 
              // echo $_SESSION['username']; 
              ?>
              <b class="caret"></b>
            </a>
            
            <ul class="dropdown-menu">
              
              <li><a href="phplogout.php">Logout</a></li>
            </ul>           
          </li>
        </ul>
      
        
        
      </div><!--/.nav-collapse -->  
  
    </div> <!-- /container -->
    
  </div> <!-- /navbar-inner -->
  
</div> <!-- /navbar -->
    



    
<div class="subnavbar">

  <div class="subnavbar-inner">
  
    <div class="container">

      <ul class="mainnav">
      
        <li class="active">
          <a href="beranda.php">
            <i class="icon-dashboard"></i>
            <span>Dashboard</span>
          </a>              
        </li>
        
        
        
<!--         <li>
          <a href="reports.html">
            <i class="icon-list-alt"></i>
            <span>Reports</span>
          </a>            
        </li>
        
        <li>          
          <a href="guidely.html">
            <i class="icon-facetime-video"></i>
            <span>App Tour</span>
          </a>                    
        </li>
                
                
                <li>          
          <a href="charts.html">
            <i class="icon-bar-chart"></i>
            <span>Charts</span>
          </a>                    
        </li>
                
                
                <li class="">         
          <a href="shortcodes.html">
            <i class="icon-code"></i>
            <span>Shortcodes</span>
          </a>                    
        </li> -->
        <!-- 
        <li class="dropdown">         
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
            <i class="icon-long-arrow-down"></i>
            <span>Drops</span>
            <b class="caret"></b>
          </a>  
        
          <ul class="dropdown-menu">
                        <li><a href="icons.html">Icons</a></li>
            <li><a href="faq.html">FAQ</a></li>
                        <li><a href="pricing.html">Pricing Plans</a></li>
                        <li><a href="login.html">Login</a></li>
            <li><a href="signup.html">Signup</a></li>
            <li><a href="error.html">404</a></li>
                    </ul>           
        </li> -->
      
      </ul>

    </div> <!-- /container -->
  
  </div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    
    

<div class="main">
  
  <div class="main-inner">

      <div class="container">
  
        <?php
           if(!isset($_GET['open'])){
             include 'pages/menu.php';
           }
           else if ($_GET['open']=='satuan_data') {
          include 'crud/data_satuan/index_datasatuan.php';
          }else if ($_GET['open']=='barang_data') {
            include 'crud/data_barang/index_databarang.php';
          }else if ($_GET['open']=='kategori_data') {
              include 'crud/data_kategori/index_datakategori.php';
          }else if ($_GET['open']=='supplier_data') {
              include 'crud/data_supplier/index_datasupplier.php';
          }else if ($_GET['open']=='user_data') {
              include 'crud/data_user/index_datauser.php';
          }
        ?>
  
      </div> <!-- /container -->
      
  </div> <!-- /main-inner -->
    
</div> <!-- /main -->
    
    
    
 
<div class="extra">

  <div class="extra-inner">

    <div class="container">

      <div class="row">
                    <div class="span3">
                        <h4>
                            Tentang Pembuat Aplikasi</h4>
                        <ul>
                            <li><a href="javascript:;">PandawaTechnoCraft</a></li>
                            <li><a href="javascript:;">ig:PandawaTechnoCraft</a></li>
                            <li><a href="javascript:;">wa:089633150084</a></li>
                            <li><a href="javascript:;">JEMBER</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                    <div class="span3">
                        <h4>
                            Support</h4>
                        <ul>
                            <li><a href="javascript:;">Politeknik Negeri Jember</a></li>
                            <li><a href="javascript:;">Jurusan Teknologi Informasi</a></li>
                            <li><a href="javascript:;">Prodi Teknik Informatika</a></li>
                            <li><a href="javascript:;">2017</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                    <div class="span3">
                        <h4>
                            Something Legal</h4>
                        <ul>
                            <li><a href="javascript:;">Read License</a></li>
                            <li><a href="javascript:;">Terms of Use</a></li>
                            <li><a href="javascript:;">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                    <div class="span3">
                        <h4>
                            Open Source jQuery Plugins & Tempale</h4>
                        <ul>
                            <li><a href="http://www.egrappler.com">Open Source jQuery Plugins</a></li>
                            <li><a href="http://www.egrappler.com;">HTML5 Responsive Tempaltes</a></li>
                            <li><a href="http://www.egrappler.com;">Free Contact Form Plugin</a></li>
                            <li><a href="http://www.egrappler.com;">Flat UI PSD</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                </div> <!-- /row -->

    </div> <!-- /container -->

  </div> <!-- /extra-inner -->

</div> <!-- /extra -->


    
    
<div class="footer"> 
  
  <div class="footer-inner">
    
    <div class="container">
      
      <div class="row">
        
          <div class="span12"><center>
            &copy; 2018 <a href="http://www.egrappler.com/">PandawaTechnoCraft</a>.</center>
          </div> <!-- /span12 -->
          
        </div> <!-- /row -->
        
    </div> <!-- /container -->
    
  </div> <!-- /footer-inner -->
  
</div> <!-- /footer -->
    


<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>
  </body>

</html>
