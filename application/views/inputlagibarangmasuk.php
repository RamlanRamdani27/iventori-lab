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
                                        <form role="form" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?=base_url()?>/Masuk/detail">
                                            <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        
                                                        <a href="<?php echo base_url()?>/Masuk/daftarbarang"><button type="button" class="btn btn-default waves-effect">Cancel</button></a>
                                                        <button type="submit" class="btn btn-success waves-effect waves-light">Input Lagi</button>
                                                    </div>
                                                </div>
                           
                                        </form>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                        </div>
            </div>
        </div>
</div>