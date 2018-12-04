<section class="content">
  <div class="data">
    <div class="col-md-10 col-sm-offset-1">
      <div class="box box-info">
            <div class="box-header">
                <form class="form-horizontal" action="?halaman=transaksi" method="POST">
                  <div class="box-body">
                         
                    <div class="form-group">
                      <div class="col-sm-3 col-sm-offset-8">
                       <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="tanggal" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php $tgl=date('d- v m-Y'); echo $tgl; ?>" readonly">
                          </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Kode Transaksi</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" readonly name="kode_transaksi" placeholder="" value="<?php echo $kode_otomatis ?>" >
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Nama Barang</label>
                      <div class="col-sm-3">
                       <select class="form-control select2" style="width: 100%;" name="id_barang">
                          <?php 
                          $query = mysqli_query($koneksi,"SELECT * FROM barang") or die(mysqli_error());
                          foreach ($query as $data){  
                          ?>
                        <option value="<?php echo $data['id_barang'] ?>"><?php echo $data['namabarang'] ?></option>
                        <?php } ?>
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <input type="number" class="form-control"  name="jumlah" placeholder="Jumlah">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-3 col-sm-offset-5">
                        <button type="submit" class="btn btn-info" name="tambah">Tambah</button>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-8 col-sm-offset-1">
                        <table class="table table-striped table-bordered">
                          <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Barang</th>                
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Subtotal</th>                
                            <th>Pilihan</th>          
                          </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $query = mysqli_query($koneksi,"SELECT * FROM transaksi_tmp JOIN barang ON transaksi_tmp.id_barang=barang.id_barang") or die(mysqli_error());
                            $no=1;
                            $ttl=0;
                            while ($data = mysqli_fetch_array($query)) {  
                          ?>  
                            <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $data['namabarang']; ?></td>
                              <td><?php echo $data['jumlah']; ?></td>
                              <td><?php echo $data['hargaj']; ?></td>
                              <?php 
                              $subtotal = $data['jumlah'] * $data['hargaj'];
                              $ttl = $ttl + $subtotal
                              ?>
                              <td style="text-align: right;"><?php echo $subtotal ?></td>
                              <td>
                                <a class="btn btn-danger " href="?halaman=transaksi&delete=<?php echo $data['id_barang'] ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')"> <li class="fa fa-close"></li> </a>
                              </td>
                            </tr>
                          <?php $no++; }  ?>  
                          </tbody>
                          <tfoot> 
                            <tr>
                              <th colspan="4" style="text-align: right;">Total</th>
                              <td colspan="2" style="text-align: center;"> <?php echo $ttl ?> </td>
                            </tr>               
                          </tfoot> 
                        </table>
                       </div> 
                    </div>

                    <div class="form-group">
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="total" value="<?php echo $ttl ?>">
                      </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="potongan" placeholder="Potongan">
                      </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="bayar" placeholder="Bayar">
                      </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="kembalian" placeholder="Kembalian">
                      </div>
                      <div class="col-sm-3">
                        <button type="submit" class="btn btn-warning" name="transaksi">Transaksi</button>
                      </div>
                    </div>   
                  </div>
                </form>
            </div>
            
          </div>
    </div>
  </div>
</section>

<script src="bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
      $("#tambah").hide();
      
        $("#click-tambah").click(function(e) {
          e.preventDefault()
            $("#tambah").show();
  });
  $(document).ready(function () {
        $(".click-edit").click(function(e) {
            var m = $(this).attr("id");
            $.ajax({
                url: "halaman/form/data_satuan/edit.php",
                type: "POST",
                data : {id: m,},
                success: function (ajaxData){
                    $("#edit").html(ajaxData);
                }
            });
        });
  });
        $("#hideform").click(function(e) {
          e.preventDefault()
            $("#tambah").hide();
        });
        $("#hideforme").click(function(e) {
          e.preventDefault()
            $("#edit").hide();
        });

    });
</script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>

