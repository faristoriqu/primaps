<section class="content">
  <div class="data">
      <div class="col-md-10 col-sm-offset-1">
       <form action="?halaman=laporan_penjualan" method="post">
      <div class="box box-primary">
        
            <div class="box-header">
               <center><h3 class="big-box">LAPORAN PENJUALAN BARANG</h3></center>
               <br><br>

                <div class="box-header with-border">
                  
                  <div class="col-md-3">
                    <div class="form-group">
                      
                      <select class="form-control select2" style="width: 100%;" name="tanggal" id="tanggal">
                        <option selected="selected">Pilih Tanggal</option>
                        <?php date_default_timezone_set("Asia/Jakarta"); echo $tanggal=date('d-m-Y');?>
                        <option > Hari ini</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                      </select>
                    </div>
                  </div>
                </div>
            </div>  
            <div class="box-body hari_ini">
            </div>
      </div>  
    </div>
  </div>
</section>  
<script src="bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#tanggal").change(function(e) {
            var m = $("#tanggal").val();
            $.ajax({
                url: "halaman/form/laporan/penjualan_hariini.php",
                type: "POST",
                data : {id: m,},
                success: function (ajaxData){
                    $(".hari_ini").html(ajaxData);
                }
            });
        });
    });
    // $(document).ready(function(){
    // $("#tanggal").change(function(e){
    //   $.ajax({
    //   url : "halaman/form/laporan/penjualan_hariini.php",
    //   success:function(data){
    //   $('.tambah').html(data);  
    //   }
    // }) 
    // }) 
  // });
</script>
