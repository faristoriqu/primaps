<?php 
  if(isset($_GET['delete'])){
    mysqli_query($koneksi,"DELETE FROM login WHERE id_user='$_GET[delete]'")or die(mysql_error());
    
  }

  if(isset($_POST['simpan'])){
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $no_telpon = $_POST['no_telpon'];
    $level = $_POST['level'];
     
    mysqli_query($koneksi,"INSERT INTO login VALUES('$id_user','$username','$password','$no_telpon','$level')");
     
    echo "<script>window.location.href='?open=user_data'</script>";
  } 

  if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $no_telpon = $_POST['no_telpon'];
    $level = $_POST['level'];
     
    mysqli_query($koneksi,"UPDATE login SET username='$username', password='$password', no_telpon='$no_telpon', level='$level'  WHERE id_user='$id'");

    echo "<script>window.location.href='?open=user_data'</script>";
    }
?>
<!-- Javascript untuk popup modal Edit--> 
<script src="js/jquery-1.7.2.min.js"></script>  
<script type="text/javascript">
    $(document).ready(function () {
        $(".click-edit").click(function(e) {
            var m = $(this).attr("id");
            $.ajax({
                url: "crud/data_user/edit.php",
                type: "POST",
                data : {id: m,},
                success: function (ajaxData){
                    $("#modaledit").html(ajaxData);
                }
            });
        });
    });
</script>
  
<div class="main">  
  <div class="main-inner">
    <div class="container">
    	<span id="dataTambahUbah"></span>

    		<div class="row">
        <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-copy"></i>
              <h3>Data User</h3>

              <button class="btn btn-info btn-sm" id="btnUserTambah" data-toggle="modal" data-target="#ModalAdd">Tambah Data</button>	

              
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts"> 

				<div class="clearfix"></div>
				<p></p>
				<div class="table-responsive">
					<table class="table table-striped table-bordered  table-condensed ">
						<tr>
							<th>Id User</th>
							<th>Username</th>
							<th>Password</th>
              <th>No Telpon</th>
							<th>Level </th>
							<th colspan="2">Pilihan</th>
						</tr>
							<?php 
							  	
							  	$qri = mysqli_query($koneksi,"SELECT * FROM login") or die(mysqli_error());
							  	while ($data = mysqli_fetch_array($qri)) {	
					   		?>	
						<tr>
							<td><?php echo $data['id_user']; ?></td>
							<td><?php echo $data['username']; ?></td>
							<td><?php echo $data['password'];  ?></td>
              <td><?php echo $data['no_telpon'];  ?></td>
							<td><?php echo $data['level']; ?></td>
              

                <td>
                  <button class='btn btn-warning btn-xs btnSatuanUbah click-edit' id="<?php echo $data['id_user'] ?>" href="#" data-toggle="modal" data-target="#modaledit" >
                    <span class='shortcut-icon icon-pencil'></span>
                  </button>
                </td>
              
              
              <td align='center'> 
                <a class="btn btn-danger btn-xs btnSatuanHapus" href="beranda.php?open=user_data&delete=<?php echo $data['id_user'] ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')">
                <span class="shortcut-icon icon-remove">
                    
                </span>
                </a>
              </td>
						</tr>
						<?php } ?>
					</table>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
        </div>
        <!-- span -->
      </div>
    	
    </div> <!-- /container -->
  </div> <!-- /main-inner -->
</div> <!-- /main -->
    <div class="modal fade" id="ModalEdit" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Siswa</h4>
                </div>
                <div class="modal-body">
                    <div class="hasil-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>

  <!-- Modal Add-->
  <div class="modal fade" id="ModalAdd" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Register</h4>
        </div>
        <div class="modal-body">
          <div class="account-container register">
  
      <div class="content clearfix">
        
        <form action="beranda.php?open=user_data" method="post">
        
                
          
          <div class="login-fields">
            
             <div class="field">
              <label for="id_user">Id User:</label>
              <input type="text" id="id_user" name="id_user" value=""  class="login" />
            </div> <!-- /field --> 
            
            <div class="field">
              <label for="username">Username:</label> 
              <input type="text" id="username" name="username" value="" class="login" />
            </div> <!-- /field -->
            
            <div class="field">
              <label for="password">Password:</label>
              <input type="password" id="password" name="password" value=""  class="login"/>
            </div> <!-- /field -->
            
             <div class="field">
              <label for="no_telpon">No Telpon</label>
              <input type="no_telpon" id="no_telpon" name="no_telpon" value=""  class="login"/>
            </div> <!-- /field -->
           
              <div class="form-group form-group-sm">
                <label for="level" class="col-sm-3 control-label pad-right-zero">Level:</label>
                <div class="col-sm-4">
                  <select class="form-control" name="level" id="level">
                     <option value="admin">Admin</option>
                      <option value="karyawan">Karyawan</option>
                  </select>
                </div>
              </div>
          </div> <!-- /login-fields -->
          
          <div class="login-actions">
                      
            <!-- <button class="button btn btn-primary btn-large" type="submit" value="Simpan">Simpan</button> -->
            <input type="submit" class="button btn btn-primary btn-large" name="simpan" id="insert" value="simpan">
          </div> <!-- .actions -->
          
        </form>
        
      </div> <!-- /content -->
      
    </div> <!-- /account-container -->

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<div class="modal fade bs-example-modal-lg" id="modaledit" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
</div>
