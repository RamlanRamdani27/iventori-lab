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
                                        <a href="<?php echo base_url()?>/Template/get_all_masuk">
                                            <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-print"></i> </button></a>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>No  Masuk</th>
                                                            <th>Tanggal </th>
                                                            <th>Nama Penginput</th>
                                                            <th>Nama Barang </th>
                                                            <th>Jumlan Barang</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
<?php                                                                  
    if (!empty($barang)) {
    $no=1;

    foreach ($barang as $row) {
        
     
        ?>
                                                        <tr>
                                                            <td><?= $no;?></td>
                                                            <td><?= $row->nomasuk;?></td>
                                                            <td><?= date("d-m-Y", strtotime($row->tgl))?></td>
                                                            <td><?= $row->namalengkap;?></td>
                                                            <td><?= $row->nama;?> <?= $row->namamerek;?></td>
                                                            <td><?= $row->qty;?></td>
                                                        </tr>
                                                   
        <?php
        $no++;
    }
}
    ?>                                                     
                                                       
                                                        
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->


                    </div> <!-- container -->
                               
                </div> <!-- content -->
