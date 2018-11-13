<?php
  include '../../config/koneksi.php';
        $id = $_POST['id'];      
        $sql = mysqli_query($koneksi,"SELECT * FROM kategori WHERE idkat = '$id'");
        while ($ql = mysqli_fetch_array($sql)){
?>
 <div class="modal-dialog modal-lg modal-dialog-centered">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button " class="close"  data-dismiss="modal" >&times;</button>
          <h4 class="modal-title">Edit Kategori Barang</h4> 
        </div>
        <div class="modal-body">
        
            <div class="tab-pane" id="formcontrols">
                                
                                <form name="input-barang" method="POST" action="beranda.php?open=kategori_data" class="form-control">
                                    <fieldset>
                                  
                                        <input type="hidden" name="id" value="<?php echo $id ?>">
                                        <div class="control-group"> 
                                         <label class="control-label" >Id Kategori</label>                                        
                                            <div class="controls">
                                                <input type="text"  name="idkat" placeholder="idkat" value="<?php echo $ql['idkat'] ?>">
                                                
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group"> 
                                         <label class="control-label" >Kategori Barang</label>                                        
                                            <div class="controls">
                                                <input type="text"  name="kategori" placeholder="kategori" value="<?php echo $ql['kategori'] ?>">
                                                
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->

                                            <br>
                                            <div class="controls" align="center">
                                                <button type="submit" class="btn btn-primary" name="edit">Save Changes</button>           
                                            </div>

                                        </div> <!-- /controls -->
                                        </div> <!-- /control-group -->
                                        
                                    </fieldset>
                                </form>
                                
                                </div>
        </div>

      <?php } ?>
    </div>
  </div>

