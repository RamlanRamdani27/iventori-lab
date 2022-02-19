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
                                        
                                           
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">



	
	 
	<?php

		foreach($report as $result){
			$bulan[] = $result->bulan; 
			$value[] = (float) $result->jumlah; 
		}


		 
	?>
	 
	<!-- Load chart dengan menggunakan ID -->
	<div class="panel-body"> 
                               <div class="col-md-12 col-sm-12 hero-feature">
	<div id="report">
	
	</div>
	</div>

                            			</div>


                                   		</div>
                                	</div>
                            	</div>
                             </div>
                        </div> <!-- End Row -->
              

<div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><?php echo $title1?>
                                        
                                           
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">



	
	 
	<?php

		foreach($report1 as $result){
			$bulan2[] = $result->bulan; 
			$value2[] = (float) $result->jumlah; 
		}


		 
	?>
	 
	<!-- Load chart dengan menggunakan ID -->
	<div class="panel-body"> 
                               <div class="col-md-12 col-sm-12 hero-feature">
	<div id="report1">
	
	</div>
	</div>

                            			</div>


                                   		</div>
                                	</div>
                            	</div>
                             </div>
                        </div> <!-- End Row -->



                    </div> <!-- container -->
                               
                </div> <!-- content -->

	<!-- END load chart -->
	 <!-- load library jquery dan highcharts -->
	 <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
	
	

	
	<!-- end load library -->
	<!-- Script untuk memanggil library Highcharts -->
	<script type="text/javascript">
	$(function () {
            
		$('#report').highcharts({
			chart: {
				type: 'column',
				margin: 75
			},
			title: {
				text: 'Report Jumlah Barang Keluar'
			},
			subtitle: {
			   text: 'Barang Masuk'
			},
			
			xAxis: {
				categories:  <?php echo json_encode($bulan);?>
			},
			exporting: { 
				enabled: true 
			},
			yAxis: {
				title: {
					text: 'Subtotal'
				},
			},
			tooltip: {
				 formatter: function() {
					 return 'The value for <b>' + this.x + '</b> is <b>' 
					 + Highcharts.numberFormat(this.y,0) + '</b>, in '+ this.series.name;
				 }
			  },
			series: [{
				name: 'Report Data',
				data: <?php echo json_encode($value);?>,
				shadow : true,
				dataLabels: {
					enabled: true,
					color: '#045396',
					align: 'center',
					formatter: function() {
						 return Highcharts.numberFormat(this.y, 0);
					}, // one decimal
					y: 0, // 10 pixels down from the top
					style: {
						fontSize: '13px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
	});
			</script>

	<script type="text/javascript">
	$(function () {
            
		$('#report1').highcharts({
			chart: {
				type: 'column',
				margin: 75
			},
			title: {
				text: 'Report Jumlah Barang Masuk'
			},
			subtitle: {
			   text: 'Barang Masuk'
			},
			
			xAxis: {
				categories:  <?php echo json_encode($bulan2);?>
			},
			exporting: { 
				enabled: true 
			},
			yAxis: {
				title: {
					text: 'Subtotal'
				},
			},
			tooltip: {
				 formatter: function() {
					 return 'The value for <b>' + this.x + '</b> is <b>' 
					 + Highcharts.numberFormat(this.y,0) + '</b>, in '+ this.series.name;
				 }
			  },
			series: [{
				name: 'Report Data',
				data: <?php echo json_encode($value2);?>,
				shadow : true,
				dataLabels: {
					enabled: true,
					color: '#045396',
					align: 'center',
					formatter: function() {
						 return Highcharts.numberFormat(this.y, 0);
					}, // one decimal
					y: 0, // 10 pixels down from the top
					style: {
						fontSize: '13px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]
		});
	});
			</script>