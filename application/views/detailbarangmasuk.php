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
                                        <form role="form" class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?=base_url()?>/Masuk/nextdetail">                                    
                                           <div class="form-group">
                                                <label class="col-md-2 control-label">No Masuk</label>
                                                <div class="col-md-10">
                                                    <input type="text" value="<?=$kode->nomasuk?>" class="form-control" name="kode" readonly="">
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-sm-2 control-label">Barang</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="kodebarang">
                                                        <?php
                                                            foreach ($barang as $data ) {
                                                                echo "<option value='$data->kodebarang'>$data->nama $data->namamerek</option>";
                                                            }
                                                            ?>
                                                        
                                                    </select>
                                                    
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Jumlah Barang</label>
                                                <div class="col-md-10">
                                                    <input type="number" value="" class="form-control" name="qty" required="">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Harga Barang</label>
                                                <div class="col-md-10">
                                                    <input type="number" value="" class="form-control" name="harga" required="">
                                                </div>
                                            </div>
                                             
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Keterangan</label>
                                                <div class="col-md-10">
                                                    <input type="text" value="" class="form-control" name="ket" required="">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        
                                                        
                                                        <button type="submit" class="btn btn-success waves-effect waves-light">Next</button>
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