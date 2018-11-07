<?php
  include '../../config/koneksi.php';
        $id = $_POST['id'];      
        $sql = mysqli_query($koneksi,"SELECT * FROM login WHERE id_user = '$id'");
        while ($ql = mysqli_fetch_array($sql)){
?>
 <div class="modal-dialog modal-lg modal-dialog-centered">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button " class="close"  data-dismiss="modal" >&times;</button>
          <h4 class="modal-title">Edit Peternak</h4> 
        </div>
        <div class="modal-body">
        
            <div class="tab-pane" id="formcontrols">
                                
                                <form name="input-user" method="POST" action="beranda.php?open=user_data" class="form-control">
                                    <fieldset>
                                  
                                        <input type="hidden" name="id" value="<?php echo $id ?>">
                                        <div class="control-group"> 
                                         <label class="control-label" >Id User</label>                                        
                                            <div class="controls">
                                                <input type="text"  name="id_user" placeholder="ID User" value="<?php echo $ql['id_user'] ?>">
                                                
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group"> 
                                         <label class="control-label" >Username</label>                                        
                                            <div class="controls">
                                                <input type="text"  name="username" placeholder="Username" value="<?php echo $ql['username'] ?>">
                                                
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">            
                                         <label class="control-label" >Password</label>                             
                                            <div class="controls">
                                                <input type="text"  name="password" placeholder="Password" value="<?php echo $ql['password'] ?>">
                                                
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">                                         
                                            <label class="control-label" >Level</label>
                                            
                                            <div class="controls">
                                              
                                                    <select name="level" class="form-control">
                                                        <option value="admin" <?php if($ql['level']=='admin'){echo "Selected";} ?>>Admin</option>
                                                        <option value="karyawan" <?php if($ql['level']=='karyawan'){echo "Selected";} ?>>Karyawan</option>
                                                    </select>
                                            </div>
                                            <br>
                                            <div class="controls" align="center">
                                                <button type="submit" class="btn btn-primary" name="edit">Save changes</button>           
                                            </div>

                                        
                                        </div> <!-- /control-group -->
                                        
                                    </fieldset>
                                </form>
                                
                                </div>
        </div>

      <?php } ?>
    </div>
  </div>

