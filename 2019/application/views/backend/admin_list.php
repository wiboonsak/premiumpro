  <!-- DataTables -->
        <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/datatables/select.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />


<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           
                            <h4 class="page-title">List All Admin 
<!--								<div class="pull-right">
								<button type="button" class="btn btn-success btn-sm" onClick="window.location.href='<?php //echo base_url('Control/admin_add')?>'"><i class="fa fa-plus"></i> Add New Admin</button>
								</div>-->
							</h4>
							 </div>
							
							
								
                    			<div class="col-sm-12">
									
										<h5 class="card-title">
											<div class="progress mb-0" style="display: none">
										<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
										</div>

										</h5>
										<div class="card-box table-responsive" id="showData">
										<table id="datatable" class="table table-hover">
                                <thead>
                                <tr>
                                    <th style="text-align:center" width="50">#</th>
                                    <th>Name - Surname</th>
                                    <th>Username</th>
                                    <th style="text-align:center"  width="200">Set permission </th>
                                    <th style="text-align:center"  width="50">Edit</th>
									<th style="text-align:center"  width="50">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
				<?php $n=1; foreach($list_admin->result() AS $data){ ?>	
                                <tr id="row<?php echo $data->id?>">
                                    <th style="text-align:center" scope="row"><?php echo $n?></th>
                                    <td><?php echo $data->name?></td>
                                    <td><?php echo $data->user_name?></td>
                                    <td style="text-align:center"><button type="button" class="btn btn-primary btn-sm" onClick="window.location.href='<?php echo base_url('Control/permission/'.$data->id)?>'"><i class="fa fa-check-square-o" aria-hidden="true"></i></button></td>
                                    <td style="text-align:center"><button type="button" class="btn btn-success btn-sm" onClick="window.location.href='<?php echo base_url('Control/admin_add/'.$data->id)?>'"><i class="icon-pencil"></i></button></td>
                                    <td style="text-align:center"><button type="button" class="btn btn-danger btn-sm" onClick="comfirmDelete('<?php echo $data->id?>' ,'tbl_username' , '<?php echo $data->user_name?>')"><i class="icon-trash"></i></button></td>
                                </tr>
                                <?php  $n++;  }?>
                                </tbody>
                            </table>
											
										</div>
									
								</div>
								
							
                       
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

            </div> <!-- end container -->
        </div>