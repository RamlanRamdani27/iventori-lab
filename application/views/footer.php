 <footer class="footer text-right">
                 Iventori Lab   2017 © Muhamad Ramlan Ramdani
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->


    
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?php echo base_url()?>/assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url()?>/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>/assets/js/waves.js"></script>
        <script src="<?php echo base_url()?>/assets/js/wow.min.js"></script>
        <script src="<?php echo base_url()?>/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>/assets/js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/chat/moment-2.2.1.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/jquery-detectmobile/detect.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/fastclick/fastclick.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/jquery-blockui/jquery.blockUI.js"></script>

        <!-- sweet alerts -->
        <script src="<?php echo base_url()?>/assets/assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/sweet-alert/sweet-alert.init.js"></script>

        <!-- flot Chart -->
        
        
    <script src="<?php echo base_url();?>assets/js/highcharts.js"></script>
    <script src="<?php echo base_url();?>assets/js/exporting.js"></script>

        <!-- Counter-up -->
        <script src="<?php echo base_url()?>/assets/assets/counterup/waypoints.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>/assets/assets/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        
        <!-- CUSTOM JS -->
        <script src="<?php echo base_url()?>/assets/js/jquery.app.js"></script>

        <!-- Notifikasi -->
        <script src="<?php echo base_url()?>/assets/assets/notifications/notify.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/notifications/notify-metro.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/notifications/notifications.js"></script>

        <!-- Datepicker -->
        <script src="<?php echo base_url()?>/assets/assets/timepicker/bootstrap-datepicker.js"></script>
       

        <!-- data Tabel -->   

        <script src="<?php echo base_url()?>/assets/assets/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url()?>/assets/assets/datatables/dataTables.bootstrap.js"></script>

        <!-- Dashboard -->
        <script src="<?php echo base_url()?>/assets/js/jquery.dashboard.js"></script>

        <!-- Chat -->
        <script src="<?php echo base_url()?>/assets/js/jquery.chat.js"></script>

        <!-- Todo -->
        <script src="<?php echo base_url()?>/assets/js/jquery.todo.js"></script>

        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });

            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
            
             $(document).ready(function() {
                $('#datatable1').dataTable();
            } );

           // Date Picker
                $('#datepicker').datepicker()
                
                ({
                    autoclose: true,
                    format: "yyyy-mm-dd",
                    todayHighlight: true,
                    orientation: "top auto",
                    todayBtn: true,
                    todayHighlight: true,  

                })
        </script>
    
    </body>
</html>