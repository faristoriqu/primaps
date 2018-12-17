<?php
include '../../../config/koneksi.php';
  $id = $_POST['id'];
  $query = mysqli_query($koneksi,"SELECT * FROM pemesanan WHERE kode_pemesanan = '$id'") or die(mysqli_error());
  foreach ($query as $data) {
    
?>
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Data Pemesanan</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="?halaman=laporan_pemesanan" method="POST">
              <div class="box-body"> 
  
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Kode Pemesanan</label>
                  <div class="col-sm-8">
                    
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="text" class="form-control"  name="kode_pemesanan" readonly="readonly" placeholder="Username" value="<?php echo $data['kode_pemesanan']?>">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="namapemesan" id="namapemesan"  value="<?php echo $data['namapemesan']?>" >
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Telefon</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="telepon" id="telepon"  value="<?php echo $data['telepon']?>" >
                  </div>
                </div>
                
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Total</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="total" id="total" readonly="readonly" placeholder="Password" value="<?php echo $data['total']?>">
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Bayar</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="bayar" onkeyup="hitung();" id="bayar" placeholder="Password" value="<?php echo $data['bayar']?>" >
                  </div>
                </div>
                    <?php
                      $kurang = $data['bayar']-$data['total'];
                    ?>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Sisa</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="kurang" id="kurang" readonly="readonly"  placeholder="Password" value="<?php echo $kurang?>" >
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <button type="submit" class="btn btn-primary" name="edit">Save changes</button>
              <!-- /.box-footer -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        
      </div>
    </div>
    <!-- /.modal-content -->
</div>
<?php } ?>

<script src="bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
      //kembalian dan total bayar  
        function hitung() {
          var total = document.getElementById('total').value;
          var bayar = document.getElementById('bayar').value;

          var result = parseInt(bayar) - parseInt(total);
          
          if (bayar=="") {
            document.getElementById('kurang').value = "";
          }else{
            document.getElementById('kurang').value = result;
            
          }
        }
        function totalan(ttl) {
          var potongan = document.getElementById('potongan').value;
          var bayar = document.getElementById('bayar').value;
          var result = parseInt(ttl) - parseInt(potongan);
          
          if (potongan=="") {
            document.getElementById('total').value = ttl;   
            
          }else {
            document.getElementById('total').value =result;
            
          }
          hitung();
        }
</script>
