<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?php echo base_url()?>/assets/images/favicon_1.ico">

        <title>Iventori lab</title>

        <!-- Base Css Files -->
        <link href="<?php echo base_url()?>/assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="<?php echo base_url()?>/assets/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php echo base_url()?>/assets/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="<?php echo base_url()?>/assets/css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="<?php echo base_url()?>/assets/css/animate.css" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="<?php echo base_url()?>/assets/css/waves-effect.css" rel="stylesheet">

        <!-- sweet alerts -->
        <link href="<?php echo base_url()?>/assets/assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

        <!-- Plugins css -->
        <link href="<?php echo base_url()?>/assets/assets/notifications/notification.css" rel="stylesheet" />

        <!-- Datepicker -->
        <link href="<?php echo base_url()?>/assets/assets/timepicker/bootstrap-datepicker.min.css" rel="stylesheet" />
        

        <!-- Custom Files -->
        <link href="<?php echo base_url()?>/assets/css/helper.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/assets/css/style.css" rel="stylesheet" type="text/css" />

          <!-- DataTables -->
        <link href="<?php echo base_url()?>/assets/assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url()?>/assets/js/modernizr.min.js"></script>
        
    </head>



    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="<?php echo base_url()?>/Template/index" class="logo"><i class="md md-terrain"></i> <span>Iventori Lab </span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li>

                                <a class="waves-effect" href="<?php echo base_url()?>/Ambil/display"><i class=" md-add-shopping-cart"></i><span></span></a>
                            </li>
                                
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>
                               
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo base_url()?>/assets/images/users/<?= $this->session->userdata('SESS_GAMBAR');?>" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?=base_url()?>/User/edit"><i class="md md-face-unlock"></i> Profile</a></li>
                                        
                                        <li><a href="<?=base_url()?>/Login/logout/"><i class="md md-settings-power"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="<?php echo base_url()?>/assets/images/users/<?= $this->session->userdata('SESS_GAMBAR');?>" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?= $this->session->userdata('SESS_NAME');?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=base_url()?>/User/edit"><i class="md md-face-unlock"></i> Profile</a></li>
                                        
                                     <li><a href="<?=base_url()?>/Login/logout/"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0"><?= $this->session->userdata('SESS_LEVEL');?></p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            
                            <?php if($this->session->userdata('SESS_LEVEL')=='Administrator'){
                                ;?>
                             <li>
                                <a  href="<?php echo base_url()?>/Template/index"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>   
                            <li class="has_sub">
                                <a class="waves-effect" href="#">
                                            <i class="md md-view-list"></i>
                                            <span> Master </span>
                                            <span class="pull-right">
                                            </a>
                                <ul class="list-unstyled">
                                    
                                    <li><a href="<?php echo base_url()?>/merek/index">Merek</a></li>
                                    <li><a href="<?php echo base_url()?>/ruangan/index">Ruangan</a></li>
                                </ul>

                            </li>
                             <li>
                                <a href="<?php echo base_url()?>/User/datauser"><i class=" md-group-add"></i><span> User </span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>/Barang/databarang"><i class=" md-playlist-add"></i><span> Daftar Nama Barang </span></a>
                            </li>
                           
                            <li class="has_sub">
                                <a class="waves-effect" href="#">
                                            <i class="md md-store"></i>
                                            <span> Barang Masuk </span>
                                            <span class="pull-right">
                                            </a>
                                <ul class="list-unstyled">

                                    <li><a href="<?php echo base_url()?>/Masuk/index"> Input Barang Masuk</a></li>
                                    <li><a href="<?php echo base_url()?>/Masuk/daftarbarang">Daftar Barang</a></li>
                                </ul>

                            </li>
                            <li>
                                <a href="<?php echo base_url()?>/Ambil/index"><i class=" md-layers"></i><span> Barang </span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>/Masuk/kartustok"><i class="  md-payment"></i><span> Kartu Stok </span></a>
                            </li>

                             <li class="has_sub">
                                <a class="waves-effect" href="#">
                                            <i class="md md-store"></i>
                                            <span> Laporan Barang  </span>
                                            <span class="pull-right">
                                            </a>
                                <ul class="list-unstyled">

                                    <li><a href="<?php echo base_url()?>/Template/masuk">  Masuk</a></li>
                                    <li><a href="<?php echo base_url()?>/Template/keluar">Keluar</a></li>
                                </ul>

                            </li>
                            <?php 
                        }else if ($this->session->userdata('SESS_LEVEL')=='Admin') {
                            # code...
                            ?>
                            <li>
                                <a  href="<?php echo base_url()?>/Template/index"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>   
                            
                             <li>
                                <a href="<?php echo base_url()?>/User/datauser"><i class=" md-group-add"></i><span> User </span></a>
                            </li>
                           
                            <li class="has_sub">
                                <a class="waves-effect" href="#">
                                            <i class="md md-store"></i>
                                            <span> Barang Masuk </span>
                                            <span class="pull-right">
                                            </a>
                                <ul class="list-unstyled">

                                    <li><a href="<?php echo base_url()?>/Masuk/index"> Input Barang Masuk</a></li>
                                    <li><a href="<?php echo base_url()?>/Masuk/daftarbarang">Daftar Barang</a></li>
                                </ul>

                            </li>
                            <li>
                                <a href="<?php echo base_url()?>/Ambil/index"><i class=" md-layers"></i><span> Barang </span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>/Masuk/kartustok"><i class="  md-payment"></i><span> Kartu Stok </span></a>
                            </li>

                             <li class="has_sub">
                                <a class="waves-effect" href="#">
                                            <i class="md md-store"></i>
                                            <span> Laporan Barang  </span>
                                            <span class="pull-right">
                                            </a>
                                <ul class="list-unstyled">

                                    <li><a href="<?php echo base_url()?>/Template/masuk">  Masuk</a></li>
                                    <li><a href="<?php echo base_url()?>/Template/keluar">Keluar</a></li>
                                </ul>

                            </li>

                       <?php 
                            }else{


                                ?>
                            <li>
                                <a  href="<?php echo base_url()?>/Template/index"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>   
                        
                            <li>
                                <a href="<?php echo base_url()?>/Ambil/index"><i class=" md-layers"></i><span> Barang </span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>/Masuk/kartustok"><i class="  md-payment"></i><span> Kartu Stok </span></a>
                            </li>

                             <li class="has_sub">
                                <a class="waves-effect" href="#">
                                            <i class="md md-store"></i>
                                            <span> Laporan Barang  </span>
                                            <span class="pull-right">
                                            </a>
                                <ul class="list-unstyled">

                                    <li><a href="<?php echo base_url()?>/Template/masuk">  Masuk</a></li>
                                    <li><a href="<?php echo base_url()?>/Template/keluar">Keluar</a></li>
                                </ul>

                            </li>

                           <?php } ?>
                            
 
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 