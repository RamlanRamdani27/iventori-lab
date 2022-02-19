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
                                        <form role="form" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?=base_url()?>/User/insert">                                    
                                            <div class="form-group ">
                                                <label class="col-md-2 control-label">Username</label>
                                                <div class="col-md-10">
                                                    <input class="form-control input-lg" type="email"  placeholder="Username" name="username" required="">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Pasword</label>
                                                <div class="col-md-10">
                                                    <input class="form-control input-lg" type="password" required="" placeholder="Password" name="password" required="">
                                                    </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Level</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="level">
                                                    <?php
                                                        if ($this->session->userdata('SESS_LEVEL')=='Administrator') {
                                                            # code...

                                                            ?>
                                                            <option>Administrator</option>
                                                            <option>Admin</option>
                                                            <option>Staf</option>
                                                        </select>
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <option>Admin</option>
                                                            <option>Staf</option>
                                                           <?php 
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Nama Lengkap</label>
                                                <div class="col-md-10">
                                                    <input type="text" value="" placeholder="Nama Lengkap" class="form-control" name="namalengkap" required="">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Gambar</label>
                                                <div class="col-sm-10">
                                                    <div class="fileUpload btn btn-purple waves-effect waves-light">
                                            			<span><i class="ion-upload m-r-5"></i>Upload</span>
                                            			<input type="file" class="upload" name="userfile" required="">
                                        			</div>
                                                    
                                                </div>
                                            </div>
                                            

                                            <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                                                        <a href="<?php echo base_url()?>/User/datauser"><button type="button" class="btn btn-default waves-effect">Cancel</button></a>
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