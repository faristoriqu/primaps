<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>PrimaPS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/pages/signin.css" rel="stylesheet" type="text/css">

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
      <?php
    /* handle error */
    if (isset($_GET['error'])) : ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Warning!</strong> <?=base64_decode($_GET['error']);?>
        </div>
    
    <?php endif;?>
    
      
      <div class="nav-collapse">
        <ul class="nav pull-right">
          
          <!-- <li class="">            
            <a href="signup.html" class="">
              Don't have an account?
            </a>
             -->
          </li>
          
          <li class="">           
            <a href="index.html" class="">
              <i class="icon-chevron-left"></i>
              Back to Homepage
            </a>
            
          </li>
        </ul>
        
      </div><!--/.nav-collapse -->  
  
    </div> <!-- /container -->
    
  </div> <!-- /navbar-inner -->
  
</div> <!-- /navbar -->



<div class="account-container">
  
  <div class="content clearfix">
    
    <form action="chek-reset.php" method="post">

      <h1>Ganti Password </h1>   
      

      <div class="login-fields">
        
        <div class="field">
          
        <label for="username">username</label>
        <input type="text" name="username" value="" placeholder="username"
          required class="login username-field"</input>


        </div> <!-- /field -->
        
        <div class="field">
          
        <label for="passwordbaru">password baru</label>
        <input type="tel"  name="password" value="" placeholder="password baru"
          required class="login password-field"</input>


        </div> <!-- /field -->

        <div class="field">
          
        <label for="konfirmasipassword">konfirmasi password</label>
        <input type="tel" name="repassword" value="" placeholder="konfirmasi password"
          required class="login password-field"</input>


        </div> <!-- /field -->
        
      </div> <!-- /login-fields -->
      <!-- <div class="login-extra">
  <a href="#">Lupa Password ?</a>
  </div>  -->
      
      <div class="login-actions">
        
      <button class="button btn btn-success btn-large" type="kirim">Kirim</button>
        
      </div> <!-- .actions -->
      
      
    </form>
    
  </div> <!-- /content -->
  
</div> <!-- /account-container -->
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>

</body>

</html>
