<div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <div class="wraper container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div style="background-image:url('<?php echo base_url()?>/assets/images/big/bg.jpg')" class="bg-picture text-center">
                                <div class="bg-picture-overlay"></div>
                                <div class="profile-info-name">
                                    <img alt="profile-image" class="thumb-lg img-circle img-thumbnail" src="<?php echo base_url()?>/assets/images/users/<?= $list->gambar ?>">
                                    <h3 class="text-white"><?= $this->session->userdata('SESS_NAME');?></h3>
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                    <div class="row user-tabs">
                        <div class="col-lg-6 col-md-9 col-sm-9">
                            <ul class="nav nav-tabs tabs" style="width: 100%;">
                            <li class="active tab" style="width: 25%;">
                                <a class="active" aria-expanded="false" data-toggle="tab" href="#home-2"> 
                                    <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                    <span class="hidden-xs">Tentang Saya</span> 
                                </a> 
                            </li> 
                            
                            <li class="tab" style="width: 25%;"> 
                                <a aria-expanded="true" data-toggle="tab" href="#messages-2"> 
                                    <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                                    <span class="hidden-xs">Barang Di Ambil </span> 
                                </a> 
                            </li> 
                            <li class="tab" style="width: 25%;"> 
                                <a aria-expanded="false" data-toggle="tab" href="#settings-2"> 
                                    <span class="visible-xs"><i class="fa fa-cog"></i></span> 
                                    <span class="hidden-xs">Settings</span> 
                                </a> 
                            </li> 
                        <div class="indicator" style="right: 394px; left: 0px;"></div><div class="indicator" style="right: 394px; left: 0px;"></div></ul> 
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-12"> 
                        
                        <div class="tab-content profile-tab-content"> 
                            <div id="home-2" class="tab-pane active"> 
                                <div class="row">

                                    <div class="col-md-8">
                                        <!-- Personal-Information -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title"><?php echo $title?></h3> 
                                            </div> 
                                            <div class="panel-body"> 
                                                
                                                
                                                <div class="about-info-p">
                                                    <strong>Username</strong>
                                                    <br>
                                                    <p class="text-muted"><?=$list->username?></p>
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

                                            </div> 
                                        </div>
                                       

                                    </div>

                                </div>
                            </div> 



                            <div id="messages-2" class="tab-pane" style="display: none;">
                                <!-- Personal-Information -->
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title"><?php echo $title?> Barang Yang di Ambil</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <div class="table-responsive">
                                                            <table id="datatable" class="table table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No Keluar</th>
                                                                        <th>Nama</th>
                                                                        <th>Tanggal Keluar</th>
                                                                        <th>Total Barang</th>
                                                                        
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
                                                                     <td><?= $row->nokeluar;?></td>
                                                                    <td><?= $this->session->userdata('SESS_NAME');?></td>
                                                                    <td><?= $row->tanggalkeluar;?></td>
                                                                    <td><?= $row->totalbarangkeluar;?></td>
                                                                    <td>
                                                                    <a class="btn btn-sm btn-primary" href="<?=base_url().'/Ambil/printdata/'. $row->nokeluar;?>"><i class="glyphicon glyphicon-print"></i> </a>
                                                                    </td>
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
                                <!-- Personal-Information -->
                            </div> 


                            <div id="settings-2" class="tab-pane" style="display: none;">
                                <!-- Personal-Information -->
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Edit <?php echo $title?></h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <form role="form" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?=base_url()?>/User/update">   

                                        <div class="form-group">
                                                <label class="col-sm-2 control-label"></label>
                                                <div class="col-sm-10">
                                                    <div class="col-sm-4 col-md-3">
                                                        <img class="img-thumbnail img-responsive" alt="attachment" src="<?php echo base_url()?>/assets/images/users/<?= $list->gambar ?>" > 
                                                    </div>
                                                    <input type="hidden" name="filelama" value="<?= $list->gambar ?>" readonly="">
                                                    <div class="fileUpload btn btn-purple waves-effect waves-light">
                                                        <span><i class="ion-upload m-r-5"></i>Upload</span>
                                                        
                                                        <input type="file" class="upload"  name="filefoto">
                                                    </div>
                                                    
                                                </div>
                                            </div>                                 
                                            <div class="form-group ">
                                                <label class="col-md-2 control-label">Username</label>
                                                <div class="col-md-10">
                                                    <input class="form-control input-lg" type="email" required="" value="<?=$list->username?>" placeholder="Username" name="username">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Nama Lengkap</label>
                                                <div class="col-md-10">
                                                    <input type="text" placeholder="Nama Lengkap" class="form-control" name="namalengkap" value="<?=$list->namalengkap?>">
                                                </div>
                                            </div>

                                            
                                            

                                            <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                                                        <a href="<?php echo base_url()?>/User/edit"><button type="button" class="btn btn-default waves-effect">Cancel</button></a>
                                                    </div>
                                                </div>
                           
                                        </form>

                                    </div> 
                                </div>
                                <!-- Personal-Information -->
                            </div> 
                        </div> 
                    </div>
                    </div>
                </div> <!-- container -->
                               
                </div>
            </div>
        </div>