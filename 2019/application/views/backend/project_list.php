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
                           
                            <h4 class="page-title">List All Project 
<!--								<div class="pull-right">
								<button type="button" class="btn btn-success btn-sm" onClick="window.location.href='<?php //echo base_url('Control/Project_add')?>'"><i class="fa fa-plus"></i> Add New Project</button>
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
                                    <th style="text-align:center" width="6%">#</th>
                                    <th style="text-align:center">Project Name</th>
                                    <th style="text-align:center">Main category</th>
                                    <th style="text-align:center">Sub category</th>
                                    <th style="text-align:center">Show on web</th>
                                    <th style="text-align:center" width="10%">Edit</th>
									<th style="text-align:center" width="10%">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php $n=1; foreach($list_project->result() AS $data){ 
       $list_cateData = $this->Project_model->list_cateData($data->cate_id);
       foreach($list_cateData->result() AS $list_cateData2){}
       $maincate = $this->Project_model->list_cateData($list_cateData2->main_cate_id);
       foreach($maincate->result() AS $maincate2){}
       $list_houseplan = $this->Project_model->list_houseplan($data->id);
       $numhouse = $list_houseplan->num_rows();
       
       
       
                                                                    ?>	
                                <tr id="row<?php echo $data->id?>">
                                    <th style="text-align:center" scope="row"><?php echo $n?></th>
                                    <td><?php echo $list_cateData2->cate_name_en.' | '. $maincate2->cate_name_en?></td>
                                    <td style="text-align:center"><?php echo $maincate2->cate_name_en?></td>
                                    <td style="text-align:center"><?php echo $list_cateData2->cate_name_en?></td>
                                    <td style="text-align:center"><label>
                                                                                <input id="ch<?php echo $data->id ?>"  type="checkbox" class="js-switch js-check-change" onClick="setShow_onWeb('<?php echo $data->id ?>', this.value, 'tbl_project')" value="<?php echo $data->show_onweb ?>"  <?php
                                                                                      if ($data->show_onweb == '1') {
                                                                                           echo 'checked';
                                                                                       }
                                                                                       ?> data-plugin="switchery" data-color="#007bff" data-size="small"  /></label></td>
                                    <td style="text-align:center"><button type="button" class="btn btn-success btn-sm" onClick="window.location.href='<?php echo base_url('Control/Project_add/'.$data->id)?>'"><i class="icon-pencil"></i></button></td>
                                    <td style="text-align:center"><button type="button" class="btn btn-danger btn-sm" onClick="comfirmDelete('<?php echo $data->id?>' ,'tbl_project' , '<?php echo $list_cateData2->cate_name_en.' | '. $maincate2->cate_name_en?>')" <?php if($numhouse>0){?>disabled<?php }?>><i class="icon-trash"></i></button></td>
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