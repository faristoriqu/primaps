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
                      $query = mysqli_query($koneksi,"SELECT * FROM pemesanan JOIN detail_pemesanan ON pemesanan.kode_pemesanan=detail_pemesanan.kode_pemesanan") or die(mysqli_error());
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
                    <td><?php echo $kurang; ?></td>
                    <td>
                      <button class="btn btn-warning click-edit" id="<?php echo $data['kode_pemesanan'] ?>" data-toggle="modal" data-target="#modal-detail"><li class="fa fa-pencil"></li></button>
                      <a class="btn btn-danger " href="?halaman=data_satuan&delete=<?php echo $data['ids'] ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')"> <li class="fa fa-close"></li> </a>
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
<div class="modal fade" id="modal-detail">
    <!-- /.modal-content -->
</div>
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
                    $("#modal-detail").html(ajaxData);
                }
            });
        });
    });
</script>
