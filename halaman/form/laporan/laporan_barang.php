<section class="content">
  <div class="data">
      <div class="col-md-10 col-sm-offset-1">
       <form action="?halaman=laporan_barang" method="post">
      <div class="box box-primary">
           <div class="box-header">
               <center><h3 class="big-box">LAPORAN BARANG</h3></center>
               <br>

                <div class="form-group">
                      <label  class="col-sm-1 control-label">Kategori</label>
                      <div class="col-sm-3">
                         
                       <select class="form-control select2" name="idkat" style="width: 100%;" id="idkat">
                         <option value="">-Pilih Kategori-</option>
                        <?php 
                      
                          $query = mysqli_query($koneksi,"SELECT * FROM kategori") or die(mysqli_error());
                          while ($data = mysqli_fetch_array($query)) {  
                        ?>
                        <option value="<?php echo $data['idkat'] ?>"><?php echo $data['kategori'] ?></option>
                        <?php } ?>    
                        </select>
                      </div>  
                              
                      <label  class="col-sm-1 control-label">Stok</label>
                      <div class="col-sm-3"> 
                       <select class="form-control select2" name="idkat" style="width: 100%;">
                         <option value="">-Pilih Stok-</option>
                         <option value="1">0</option>
                         <option value="2">dibawah 50</option>                                                                
                        </select>
                      </div>
                </div>  
                    

               
            <div class="box-body table" id="">
              
            </div>
      </div>  
    </div>
  </div>
</section>  
<script src="bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#idkat").change(function(e) {
            var m = $("#idkat").val();
            $.ajax({
                url: "halaman/form/laporan/barang.php",
                type: "POST",
                data : {id: m,},
                success: function (ajaxData){
                    $(".table").html(ajaxData);
                }
            });
        });
    });  
</script>
    
