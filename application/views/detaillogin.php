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
                                                    <strong>Kode Login</strong>
                                                    <br>
                                                    <p class="text-muted"><?=$list->kodelogin?></p>
                                         </div>
                                         <div class="about-info-p">
                                                    <strong>Username</strong>
                                                    <br>
                                                    <p class="text-muted"><?=$list->username?></p>
                                         </div>
                                         <div class="about-info-p">
                                                    <strong>Password</strong>
                                                    <br>
                                                    <p class="text-muted"><?=$list->password?></p>
                                         </div>
                                         <div class="about-info-p">
                                                    <strong>Level</strong>
                                                    <br>
                                                    <p class="text-muted"><?=$list->level?></p>
                                         </div>
                                         <div class="about-info-p">
                                                    <strong>Nama Lengkap</strong>
                                                    <br>
                                                    <p class="text-muted"><?=$list->namalengkap?></p>
                                         </div>
                                         
                                         <div class="about-info-p">
                                                    <strong>Gambar</strong>
                                                    <br>
                                                    <p class="text-muted"><div class="col-sm-10"> 
                                                    <div class="col-sm-4 col-md-3">
                                                        <img class="img-thumbnail img-responsive" alt="attachment" src="<?php echo base_url()?>/assets/images/users/<?= $list->gambar ?>" > </a>
                                                    </div> 
                                                </div></p>
                                         </div>
                                         <div class="about-info-p">
                                                    <strong></strong>
                                                    <br>
                                                    <p class="text-muted"><div class="col-sm-10"> 
                                                    <div class="col-sm-4 col-md-3">
                                                        <a href="<?php echo base_url()?>/User/datauser"><button type="button" class="btn btn-default waves-effect">Cancel</button></a>
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