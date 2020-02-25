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
                           
                            <h4 class="page-title">List All Job opening 
<!--								<div class="pull-right">
								<button type="button" class="btn btn-success btn-sm" onClick="window.location.href='<?php //echo base_url('Control/Facilities_add')?>'"><i class="fa fa-plus"></i> Add New Facilities</button>
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
                                    <th>#</th>
                                    <th>Name - Surname</th>
                                    <th>Position</th>
                                    <th>Date</th>
                                    <th style="text-align:center">Detail</th>
                                    <th style="text-align:center">Attrach File</th>
                                    <th  width="50">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
				<?php $n=1; foreach($list_careerform->result() AS $data){ 
                                    $list_career = $this->Project_model->list_career();
                                    foreach ($list_career->result() AS $career){}
                                     $loadcareerimg = $this->Project_model->loadcareerimg($data->id);
                                     $numimg = $loadcareerimg->num_rows();
                                     $datedata = $this->Project_model->GetthaiDateTimeeng($data->date_add);
                                    ?>	
                                <tr id="row<?php echo $data->id?>">
                                    <th scope="row"><?php echo $n?></th>
                                    <td><?php echo $data->First_name.' '.$data->Last_name?></td>
                                    <td><?php echo $career->career_name?></td>
                                    <td><?php echo $datedata?></td>
                                    <td style="text-align:center"><button type="button" class="btn btn-info btn-sm" onclick="window.open('<?php echo base_url();?>Control/job_detail/<?php echo $data->id;?>')">Detail</button></td>
                                    
                                    <td style="text-align:center">
                                        <?php if($numimg>0){?>
                                        <button type="button" class="btn btn-success btn-sm" onclick="upload('<?php echo $n?>')">Detail</button>
                                    <div id="modal-upload<?php echo $n?>" class="modal fade" role="dialog" >
									<div class="modal-dialog modal-lg ">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													Resume
												</div>
											</div>

											<div class="modal-body">
												<!-- PAGE CONTENT BEGINS -->
												<form enctype="multipart/form-data" id="imgForm<?php echo $n?>" name="imgForm" method="post">
													<div class="row" id="showdata<?php echo $n?>">
														
														
 <?php $f = 1;

 if($numimg>0){
     foreach($loadcareerimg->result() AS $file){
 ?>
<label class="col-sm-4 text-left" style="line-height: 30px;"><?php if($f==1){?>Resume<?php } ?></label>
<div class="col-md-6" style="text-align:left">
    <p onclick="window.open('<?php echo base_url('uploadfile/career/');?><?php echo $file->img_name?>','_blank');" style="color:blue; cursor:pointer"><u><?php echo $file->img_name?></u></p>    
</div>
<div class="col-md-2">
</div>
<div class="clear"></div>
     <?php $f++;}}?>
<br>
<div class="col-md-12" style="text-align:center">
		   <button type="button" onclick="window.open('<?php echo base_url();?>uploadfile/career/gbN8hF_6Vpcd-ScJw6k.php?id=<?php echo $data->id?>', '_blank');" class="btn btn-info" style="text-align:right">Download All</button>
	</div>	
</div>
                </form> 
           </div>							<div class="modal-footer no-margin-top">
												<button class="btn btn-lg btn-danger pull-right" data-dismiss="modal">close</button>	
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>
                                        <?php }?>
                                    </td>
                                    <td><button type="button" class="btn btn-danger btn-sm" onClick="comfirmDelete('<?php echo $data->id?>' ,'tbl_form_career' )"><i class="icon-trash"></i></button></td>
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