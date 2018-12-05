<!DOCTYPE html>
<html>
<head>
  <title>ajaxtes</title>
</head>
<body>
  <div class="data" id="content">
    </div>
                    <form action="data2.php" method="POST">
                      <div class="form-group">
                        <label  class="col-sm-2 control-label">Nama Barang</label>
                        <div class="col-sm-3">
                         <select class="form-control select2" style="width: 100%;" name="id_barang" id="id_barang">
                          <option value="">---Select---</option>
                            <?php 
                            $query = mysqli_query($koneksi,"SELECT * FROM barang") or die(mysqli_error());
                            foreach ($query as $data){  
                            ?>
                          <option data-stok="<?php echo $data['stok'] ?>" value="<?php echo $data['id_barang'] ?>"><?php echo $data['namabarang'] ?></option>
                          <?php } ?>
                          </select>
                      </div>
                      <div class="col-sm-3">
                        <input type="hidden" class="form-control"  id="stok">
                        <input type="number" class="form-control"  name="jumlah" placeholder="Jumlah" id="jumlah">
                      </div>
                    </div>
                    <br>
                    <div class="form-group">
                      <div class="col-md-3 col-sm-offset-5">
                        <button type="submit" class="btn btn-info" name="tambah" id="submit">Tambah</button>
                      </div>
                    </div>
                  </form>
  
</body>

  <script src="bower_components/jquery/dist/jquery.js"></script>
  <script src="bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    loadData();
    $('form').on('submit',function(e){
      e.preventDefault();
      $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: $(this).serialize(),
        success:function(){
          loadData();
        }
      })
    })
  });
  function loadData(){
    $.get('data2.php', function(data){
      $('#content').html(data);  
    })
  }
</html>

