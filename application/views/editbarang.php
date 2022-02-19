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
                                        <form role="form" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?=base_url()?>/Barang/update">                                    
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Kode Barang</label>
                                                <div class="col-md-10">
                                                    <input type="text" value="<?=$list->kodebarang?>" class="form-control" name="kodebarang" readonly="">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Nama Barang</label>
                                                <div class="col-md-10">
                                                    <input type="text" value="<?=$list->nama?>" class="form-control" name="namabarang">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Merek</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="kodemerek">
                                                        <option value="<?=$list->kodemerek?>"><?=$list->namamerek?></option>
                                                        <?php
															foreach ($merek as $data ) {
																echo "<option value='$data->kodemerek'>$data->namamerek</option>";
															}
															?>
                                                        
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Gambar</label>
                                                <div class="col-sm-10"> 
                                                    <div class="col-sm-4 col-md-3">
                                                        <img class="img-thumbnail img-responsive" alt="attachment" src="<?php echo base_url()?>/assets/images/barang/<?= $list->gambar ?>" > </a>
                                                    </div>
                                                    <input type="hidden" name="filelama" value="<?= $list->gambar ?>" readonly="">
                                                    <div class="fileUpload btn btn-purple waves-effect waves-light">
                                            			<span><i class="ion-upload m-r-5"></i>Upload</span>
                                                        
                                            			<input type="file" class="upload"  name="filefoto">
                                        			</div>
                                                    
                                                </div>
                                            </div>
                                            

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Nama Penginput</label>
                                                <div class="col-md-10">
                                                    <input type="text" value="<?=$list->namalengkap?>" class="form-control" readonly="">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Spesifikasi</label>
                                                <div class="col-md-10">
                                                    <input type="text" value="<?=$list->spesifikasi?>" class="form-control" name="spesifikasi">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                                                        <a href="<?php echo base_url()?>/Barang/databarang"><button type="button" class="btn btn-default waves-effect">Cancel</button></a>
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