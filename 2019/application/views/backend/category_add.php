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
                           
                            <h4 class="page-title">List All Category</h4>
			</div>

                    			<div class="col-sm-12">
										<h5 class="card-title">
											<div class="progress mb-0" style="display: none">
										<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
										</div>

										</h5>
                                             <div class="card-box">
                                            <div class="col-12">
                                                <div class="card m-b-5  text-xs-center" style="background-color: #BEBEBE">
                            <div class="card-body">
								  <h5 class="card-title">Category Add</h5>
							  <div class="form-group row">
                                                              <div class="col-md-2">
								  <label>Category English</label>
								  </div>
                             	<div class="col-md-2">
									
                                    <input type="text" class="form-control form-control-sm" id="cate_name_en" name="cate_name_en">
								</div>
								<div class="col-md-2">
								  <label>Category Thai</label>
								  </div>
                             	<div class="col-md-2">
									
                                    <input type="text" class="form-control form-control-sm" id="cate_name_th" name="cate_name_th">
								</div>
								
								<div class="col-md-2">
								  <label>Main Category</label>
								  </div>
                             	<div class="col-md-2">
                                     <select class="form-control form-control-sm" id="main_cate_id">
										<option value="0">--Select--</option>
                                                                                <?php foreach ($categorymain->result() as $maincate){?>
                                                                                <option value="<?php echo $maincate->id?>"><?php echo $maincate->cate_name_en?></option>
                                                                                <?php }?>
									</select>
								</div>
                                                              <br>
                                                              <br>
							    <div class="col-md-2">
                                                                <button type="button" class="btn btn-warning btn-sm" onclick="addcate(0,0)"><i class="fa fa-plus-circle"></i> Add</button>
								</div>   
							  </div>  
                            </div>
                          </div>
						</div>
						<div style="clear: both">&nbsp;</div>
                                            
										<div id="showData">
										</div>
										</div>
									
								</div>
								
							
                       
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

            </div> <!-- end container -->
        </div>