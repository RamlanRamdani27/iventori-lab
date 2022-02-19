<div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                    <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title"><?php echo $title?></h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Iventori Lab</a></li>
                                    
                                    <li class="active"><?php echo $title?></li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Form <?php echo $title?>
                                    <div class="panel-body">
                                        <div class="row">
                                        
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                           
                                                            <th>Nama Barang</th>
                                                            <th>Jumlah Barang </th>
                                                            <th>Harga Barang</th>
                                                          
                                                            <th>Spesifikasi</th>
                                                            <th>Gambar</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
<?php                                                                  
       if (!empty($row)) {
    $no=1;

    foreach ($row as $barang) {
        
     
        ?>
                                                        <tr>
                                                            <td><?=$barang->nama ?> <?=$barang->namamerek ?></td>
                                                            <td><?=$barang->qty?></td>
                                                            <td><?='Rp ' .number_format($barang->hargabeli,2,',','.') ?></td>
                                                            
                                                            <td><?=$barang->ket?></td>
                                                           <td><img class="img-thumbnail img-responsive" alt="attachment" src="<?php echo base_url()?>/assets/images/barang/<?= $barang->gambar ?>" height="100px" width="100px"></td>
                                                        </tr>
                                                   
        <?php
        // $no++;
    }
}
    ?>                                                     
                                                       
                                                        
                                                    </tbody>
                                                </table>
                                        <div class="col-sm-4 col-md-3">
                                                        <a href="<?php echo base_url()?>/Masuk/daftarbarang"><button type="button" class="btn btn-default waves-effect">Cancel</button></a>
                                                    </div> 
                                         
                                                           
                                         </div>
                                  </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->


                    </div> <!-- container -->
                               
                </div> <!-- content -->
