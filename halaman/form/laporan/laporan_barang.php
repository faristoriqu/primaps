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
                         
                       <select class="form-control select2" name="idkat" style="width: 100%;">
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
                  <button type="submit" class="btn btn-info btn-sm " name="btnCariStock" id="btnCariStock">Cari Data</button>


              </div>  
                    

               
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Jumlah</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    
                  </tr>
                </thead>                
                <body>
                <?php 
                  $query = mysqli_query($koneksi,"SELECT * FROM barangmasuk JOIN barang ON barangmasuk.id_barang =barang.id_barang JOIN supplier ON barangmasuk.id_supplier=supplier.id_supplier JOIN satuan ON barang.ids=satuan.ids ORDER BY namabarang") or die(mysqli_error());
                  $no=1;
                  while ($data = mysqli_fetch_array($query)) {  
                ?> 
               
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data['namabarang']; ?></td>
                    <td><?php echo $data['namasatuan']; ?></td>
                    <td><?php echo $data['jumlah']; ?></td>
                    <td><?php echo $data['harga']; ?></td>
                    <td><?php echo $data['jual']; ?></td>
                    
                  </tr>
                  <?php $no++;} ?>
                </tbody>
              </table>
            </div>
      </div>  
    </div>
  </div>
</section>  
<script src="bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    