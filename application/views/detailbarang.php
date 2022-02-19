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
                                    <div class="panel-heading"><h3 class="panel-title">Form <?php echo $title?></h3></div>
                                    <div class="panel-body">

                                        <div class="about-info-p">
                                                    <strong>Kode Barang</strong>
                                                    <br>
                                                    <p class="text-muted"><?=$list->kodebarang?></p>
                                         </div>
                                         <div class="about-info-p">
                                                    <strong>Nama Barang</strong>
                                                    <br>
                                                    <p class="text-muted"><?=$list->nama?></p>
                                         </div>
                                         <div class="about-info-p">
                                                    <strong>Merek</strong>
                                                    <br>
                                                    <p class="text-muted"><?=$list->namamerek?></p>
                                         </div>
                                         <div class="about-info-p">
                                                    <strong>Nama Lengkap</strong>
                                                    <br>
                                                    <p class="text-muted"><?=$list->namalengkap?></p>
                                         </div>
                                         <div class="about-info-p">
                                                    <strong>Spesifikasi</strong>
                                                    <br>
                                                    <p class="text-muted"><?=$list->spesifikasi?></p>
                                         </div>
                                         <div class="about-info-p">
                                                    <strong>Tanggal Input</strong>
                                                    <br>
                                                    <p class="text-muted"><?=date("d-m-Y", strtotime($list->tanggalinput));?></p>
                                         </div>
                                         <div class="about-info-p">
                                                    <strong>Gambar</strong>
                                                    <br>
                                                    <p class="text-muted"><div class="col-sm-10"> 
                                                    <div class="col-sm-4 col-md-3">
                                                        <img class="img-thumbnail img-responsive" alt="attachment" src="<?php echo base_url()?>/assets/images/barang/<?= $list->gambar ?>" > </a>
                                                    </div> 
                                                </div></p>
                                         </div>
                                         <div class="about-info-p">
                                                    <strong></strong>
                                                    <br>
                                                    <p class="text-muted"><div class="col-sm-10"> 
                                                    <div class="col-sm-4 col-md-3">
                                                        <a href="<?php echo base_url()?>/Barang/databarang"><button type="button" class="btn btn-default waves-effect">Cancel</button></a>
                                                    </div> 
                                                </div></p>
                                         </div>                                    
                                        
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                        </div>
            </div>
        </div>
</div>