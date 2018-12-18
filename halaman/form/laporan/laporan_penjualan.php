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
                        <option value="show-all">Semua</option>
                        <option value="hari-ini">Hari Ini</option>
                        <option value="minggu-ini">Minggu Ini</option>
                        <option value="bulan-ini">Bulan Ini</option>
                        <option value="tahun-ini">Tahun Ini</option>
                        


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
</script>
<?php  
  if(isset($_POST['semua'])){
      echo "<script>window.location.href='halaman/form/cetak/cetak_penjualan_semua.php'</script>"; 

  }else if(isset($_POST['hariini'])){
      echo "<script>window.location.href='halaman/form/cetak/cetak_penjualan_hariini.php'</script>"; 

  }else if(isset($_POST['mingguini'])){
      echo "<script>window.location.href='halaman/form/cetak/cetak_penjualan_mingguini.php'</script>"; 

  }else if(isset($_POST['bulanini'])){
      echo "<script>window.location.href='halaman/form/cetak/cetak_penjualan_bulanini.php'</script>"; 

  }else if(isset($_POST['tahunini'])){
      echo "<script>window.location.href='halaman/form/cetak/cetak_penjualan_tahunini.php'</script>"; 
  }
?>
