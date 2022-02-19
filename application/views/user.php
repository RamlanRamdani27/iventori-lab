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
                                        <a href="<?php echo base_url()?>/User/index">
                                            <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Add</button></a>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Kode Login</th>
                                                            <th>Username</th>
                                                            <th>Password </th>
                                                            <th>Level</th>
                                                            <th>Nama Lengkap</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
<?php                                                                  
    if (!empty($list)) {
    // $no=1;

    foreach ($list as $row) {
        
     
        ?>
                                                        <tr>
                                                            <td><?= $row->kodelogin;?></td>
                                                            <td><?= $row->username;?></td>
                                                            <td><?= $row->password;?></td>
                                                            <td><?= $row->level;?></td>
                                                            <td><?= $row->namalengkap;?></td>
                                                            <th>
                      <a class="btn btn-sm btn-primary" href="<?=base_url().'/User/detail/'. $row->kodelogin;?>" title="Detail" ><i class=" md-open-in-new"></i> Detail</a>
                   <a class="btn btn-sm btn-danger" href="<?=base_url().'/User/hapus/'. $row->kodelogin;?>" title="Hapus"> <i class="glyphicon glyphicon-trash"></i> Delete</a>
            
        </th>
                                                        </tr>
                                                   
        <?php
        // $no++;
    }
}
    ?>                                                     
                                                       
                                                        
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->


                    </div> <!-- container -->
                               
                </div> <!-- content -->

