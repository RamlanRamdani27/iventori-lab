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
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><?php echo $title?>
                                        
                                            
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                            
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            
                                                            <th>Nama</th>
                                                            <th>Nama Barang </th>
                                                            <th>Jumlah</th>
                                                            <th>Tanggal</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
<?php                                                                  
    if (!empty($barang)) {
    $no=1;

    foreach ($barang as $row) {
        
     
        ?>
                                                        <tr>
                                                           <td><?= $row->namalengkap;?> </td>
                                                            <td><?= $row->nama;?> <?= $row->namamerek;?></td>
                                                            <td><?= $row->qty?></td>
                                                            <td><?= date("d-m-Y", strtotime($row->tanggal))?></td>
                                                            
                                                            <th>
                      
                   <a class="btn btn-sm btn-danger" href="<?=base_url().'/Ambil/hapus/'. $row->kodebarang;?>" title="Hapus"> <i class="glyphicon glyphicon-trash"></i> Delete</a>
            
        </th>
                                                        </tr>
                                                   
        <?php
        $no++;
    }
}
    ?>                                                     
                                                       
                                                        
                                                    </tbody>
                                                </table>
<form role="form" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?=base_url()?>/Ambil/proses_transaksi">
                                                 <div class="form-group">
                                                <label class="col-sm-2 control-label">Ruangan</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="koderuangan">
                                                        <?php
                                                            foreach ($ruangan as $data ) {
                                                                echo "<option value='$data->koderuangan'>$data->namaruangan</option>";
                                                            }
                                                            ?>
                                                        
                                                    </select>
                                                    
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        
                                                        
                                                        <button type="submit" class="btn btn-success waves-effect waves-light">Simpan</button>
                                                    </div>
                                                </div>
                           
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->


                    </div> <!-- container -->
                               
                </div> <!-- content -->
