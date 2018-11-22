<?php 
  if(isset($_GET['delete'])){
    $query_delete = mysqli_query($koneksi,"DELETE FROM login WHERE id_user='$_GET[delete]'")or die(mysql_error());
    
    if ($query_delete == TRUE) {
      echo "<script>window.location.href='?halaman=register'</script>";
    }else{
      echo "gagal";
    }
  }

  if(isset($_POST['simpan'])){
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
     
    $query_tambah = mysqli_query($koneksi,"INSERT INTO login VALUES('$id_user','$username','$password','$level')");
     
    if($query_tambah == TRUE){
      echo "<script>window.location.href='?halaman=register'</script>";
    } else{
      echo "gagal";
    }
  } 

  if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
     
    $query_edit=mysqli_query($koneksi,"UPDATE login SET id_user='$id_user',username='$username', password='$password',level='$level'  WHERE id_user='$id'");

    if($query_edit==TRUE){
      echo "<script>window.location.href='?halaman=register'</script>";
    }else{
      echo "gagal";
    }
    }
?>

<br> 
<div class="col-md-8" id="tambah">
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="?halaman=register" method="POST">
              <div class="box-body">
                
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Id User</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="id_user" placeholder="Id User">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="username" placeholder="Username">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Level</label>
                  <div class="col-sm-8">
                    
                  <select class="form-control" name="level">
                    <option value="admin">Admin</option>
                    <option value="karyawan">Karyawan</option>
                  </select>
                  </div>
                </div>
                
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default" id="hideform">Batal</button>
                <button type="submit" class="btn btn-info pull-right" name="simpan">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
  </div>
</div>

<div class="col-md-8" id="edit">   
</div>

<section class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="box box-primary">
            <div class="box-header">
              <button class="btn btn-info " id="click-tambah" ><li class="fa fa-plus"></li> Tambah</button>
              <br><br>
              <h3 class="box-title">Data Semua Siswa</h3>
            </div>
    
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <?php 
                  
                  $query = mysqli_query($koneksi,"SELECT * FROM login") or die(mysqli_error());
                  $no=1;
                  while ($data = mysqli_fetch_array($query)) {  
                ?>  
                <tbody>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['password']; ?></td>
                    <td><?php echo $data['level']; ?></td>
                    <td>
                      <button class="btn btn-warning click-edit" id="<?php echo $data['id_user'] ?>"><li class="fa fa-pencil"></li></button>

                      <a class="btn btn-danger " href="?halaman=register&delete=<?php echo $data['id_user'] ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')"> <li class="fa fa-close"></li> </a>

                    </td>
                    
                  </tr>
                </tbody>
                <?php $no++; }  ?>
              </table>
            </div>
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
        $(document).ready(function () {
        $(".click-edit").click(function(e) {
            var m = $(this).attr("id");
            $.ajax({
                url: "halaman/register/edit.php",
                type: "POST",
                data : {id: m,},
                success: function (ajaxData){
                    $("#edit").html(ajaxData);
                }
            });
        });
    });
        $("#hideform").click(function(e) {
          e.preventDefault()
            $("#tambah").hide();
        });
        $("#hideforme").click(function(e) {
          e.preventDefault()
            $("#edit").hide();
        });
    });
</script>

