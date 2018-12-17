<?php

if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $kode_pemesanan = $_POST['kode_pemesanan'];
    $namapemesan = $_POST['namapemesan'];
    $telepon = $_POST['telepon'];
    $bayar = $_POST['bayar'];
     
    $query_edit=mysqli_query($koneksi,"UPDATE pemesanan SET namapemesan='$namapemesan', telepon='$telepon', bayar='$bayar'  WHERE kode_pemesanan='$id'");

    if($query_edit==TRUE){
      echo "<script>window.location.href='?halaman=laporan_pemesanan'</script>";
    }else{
      echo "gagal";
    }
}
    
?>
<section class="content">
  <div class="data">
    <div class="col-md-11 " >
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pesanan</h3>
            </div>
    
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Pemesanan</th>
                  <th>Tanggal</th>
                  <th>Nama Pemesan</th>
                  <th>Telepon</th>
                  <th>Total</th>
                  <th>Bayar</th>
                  <th>Kurang</th>
                  <th>Pilihan</th>           
                </tr>
                </thead>
                <tbody>
                    <?php
                      $query = mysqli_query($koneksi,"SELECT * FROM pemesanan JOIN detail_pemesanan ON pemesanan.kode_pemesanan=detail_pemesanan.kode_pemesanan ORDER BY pemesanan.kode_pemesanan DESC" ) or die(mysqli_error());
                      $no=1;
                      while ($data = mysqli_fetch_array($query)) {  
                    ?>  
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data['kode_pemesanan']; ?></td>
                    <td><?php echo $data['tanggal']; ?></td>
                    <td><?php echo $data['namapemesan']; ?></td>
                    <td><?php echo $data['telepon']; ?></td>
                    <td><?php echo $data['total']; ?></td>
                    <td><?php echo $data['bayar']; ?></td>
                    <?php
                      $kurang = $data['bayar']-$data['total'];
                    ?>
                    <td><?php 
                      if ($kurang<0) {
                        echo $kurang;
                      }else{
                        echo("0");
                      }
                       ?>
                    </td>
                    <td>
                      <?php
                        if ($kurang<0) {
                      ?>
                      <button class="btn btn-warning click-edit" id="<?php echo $data['kode_pemesanan'] ?>" data-toggle="modal" data-target="#modal-edit"><li class="fa fa-pencil"></li>tambahan</button>
                      <?php } else{ ?>
                      <button class="btn btn-success "><li class="fa fa-print"></li>DO</button>
                      <?php } ?>
                      <button class="btn btn-primary click-detail" id="<?php echo $data['kode_pemesanan'] ?>" data-toggle="modal" data-target="#modal-detail"><li class="fa fa-search"></li></button>
                    </td>
                  </tr>
                <?php $no++; }  ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
  </div>
</section>
<div class="modal fade" id="modal-edit">
    <!-- /.modal-content -->
</div>

<div class="modal fade" id="modal-detail">
    <!-- /.modal-content -->
</div>

<script src="bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".click-edit").click(function(e) {
            var m = $(this).attr("id");
            $.ajax({
                url: "halaman/form/pemesanan/edit_pemesanan.php",
                type: "POST",
                data : {id: m,},
                success: function (ajaxData){
                    $("#modal-edit").html(ajaxData);
                }
            });
        });
        $(".click-detail").click(function(e) {
            var m = $(this).attr("id");
            $.ajax({
                url: "halaman/form/pemesanan/detail_laporan.php",
                type: "POST",
                data : {id: m,},
                success: function (ajaxData){
                    $("#modal-detail").html(ajaxData);
                }
            });
        });
    });
</script>
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

