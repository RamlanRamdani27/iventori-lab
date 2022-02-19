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

                        <div class="row pricing-plan">
                        <div class="col-md-12">
                            <div class="row">
                                 <?php                                                                  
    if (!empty($row)) {
    $no=1;

    foreach ($row as $barang) {
        
     
        ?>
                                <div class="col-sm-6 col-md-6 col-lg-3" px">
                                    <div class="price_card text-center">
                                        <div class="pricing-header bg-primary">
                                           
                                            <span class="name" style="font-size: 12px"><?=$barang->nama ?> <?=$barang->namamerek ?></span>
                                        </div>
                                        <ul class="price-features" >
                                            <li><img class="img-thumbnail img-responsive" alt="attachment" src="<?php echo base_url()?>/assets/images/barang/<?= $barang->gambar ?>" width="100px" height="100px"></li>
                                            <li style="font-size: 12px">Jumlah Barang <?=$barang->qty?></li>
                                            
                                            <form role="form" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?=base_url()?>/Barang/insert">  
                                         
                                            </form>
                                        </ul>
                                         <a href="<?=base_url().'/Ambil/ambil/'. $barang->kodebarang;?>"><button class="btn btn-primary waves-effect waves-light w-md" style="font-size: 12px">Ambil</button></a>
                                        
                                    </div> <!-- end Pricing_card -->
                                </div> <!-- end col -->
                                                                                   <?php
        $no++;
    }
}
    ?>    
         
                                

                                

                               

                            </div> <!-- end row -->
                        </div> <!-- end Col-10 -->
                    </div>


                    </div> <!-- container -->
                               
                </div> <!-- content -->
