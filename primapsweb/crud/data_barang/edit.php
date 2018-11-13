<?php
  include '../../config/koneksi.php';
        $id = $_POST['id'];      
        $sql = mysqli_query($koneksi,"SELECT * FROM barang WHERE id_barang = '$id'");
        while ($ql = mysqli_fetch_array($sql)){
?>
 <div class="modal-dialog modal-lg modal-dialog-centered">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button " class="close"  data-dismiss="modal" >&times;</button>
          <h4 class="modal-title">Edit Barang</h4> 
        </div>
        <div class="modal-body">
        
            <div class="tab-pane" id="formcontrols">
                                
                                <form name="input-barang" method="POST" action="beranda.php?open=barang_data" class="form-control">
                                    <fieldset>
                                  
                                        <input type="hidden" name="id" value="<?php echo $id ?>">
                                        <div class="control-group"> 
                                         <label class="control-label" >Id Barang</label>                                        
                                            <div class="controls">
                                                <input type="text"  name="id_barang" placeholder="ID Barang" value="<?php echo $ql['id_barang'] ?>">
                                                
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group"> 
                                         <label class="control-label" >Nama Barang</label>                                        
                                            <div class="controls">
                                                <input type="text"  name="namabarang" placeholder="namabarang" value="<?php echo $ql['namabarang'] ?>">
                                                
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                        <div class="control-group">            
                                         <label class="control-label" >Idkat</label>                             
                                            <div class="controls">
                                                <input type="text"  name="idkat" placeholder="idkat" value="<?php 
                                                echo $ql['idkat'] ?>">
                                                
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->

                                         <div class="control-group">            
                                         <label class="control-label" >Stok</label>                             
                                            <div class="controls">
                                                <input type="text"  name="stok" placeholder="stok" value="<?php 
                                                echo $ql['stok'] ?>">
                                                
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                         <div class="control-group">            
                                         <label class="control-label" >Ids</label>                             
                                            <div class="controls">
                                                <input type="text"  name="ids" placeholder="idsds" value="<?php 
                                                echo $ql['ids'] ?>">
                                                
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->

                                         <div class="control-group">            
                                         <label class="control-label" >Hargab</label>                             
                                            <div class="controls">
                                                <input type="text"  name="hargab" placeholder="hargab" value="<?php 
                                                echo $ql['hargab'] ?>">
                                                
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                         <div class="control-group">            
                                         <label class="control-label" >Hargaj</label>                             
                                            <div class="controls">
                                                <input type="text"  name="hargaj" placeholder="hargaj" value="<?php 
                                                echo $ql['hargaj'] ?>">
                                                
                                            </div> <!-- /controls -->               
                                        </div> <!-- /control-group -->
                                        
                                        
                                        
                                            <br>
                                            <div class="controls" align="center">
                                                <button type="submit" class="btn btn-primary" name="edit">Save changes</button>           
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

