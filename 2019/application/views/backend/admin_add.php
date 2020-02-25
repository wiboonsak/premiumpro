<div class="wrapper">
<div class="container-fluid">

<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<h4 class="page-title"><?php if($curentID ==''){ echo 'Add New Admin';  }  else {  echo 'Edit Admin'; } ?></h4>
                        <br>
			<div class="row">
				<div class="col-sm-12">
					<div class="card m-b-30 card-body">
						<h5 class="card-title">
							<div class="progress mb-0" style="display: none">
						<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
						</div>
<?php if($change !='1'){?>
							<div class="pull-right">
                                
                                                             <?php //if($curentID!=''){?>
<!--								<button type="button" class="btn btn-success btn-sm" onClick="window.location.href='<?php //echo base_url('Control/admin_add')?>'"><i class="fa fa-plus"></i> Add New Admin</button> 
						    &nbsp;&nbsp;-->
                                                             <?php //}?>
								<button type="button" class="btn btn-info btn-sm" onClick="window.location.href='<?php echo base_url('Control/admin_list')?>'"><i class="fas fa-arrow-left"></i> Back</button>
                            </div>
<?php }?>
						</h5>
						<!-------------->
                                                  <?php   if($curentID !=''){
									
							$user = $this->Project_model->list_admin($curentID);
			  				foreach($user->result() as $user2){	}	
				} ?>   
						<form class="form-horizontal" role="form" enctype="multipart/form-data" id="frm1" name="frm1" >
										
								<div class="form-group row">
									<label class="col-3 col-form-label">Name - Surname</label>
									<div class="col-9">
										<input type="text" id="name_sname" name="name_sname" class="form-control" value="<?php if($curentID !=''){ echo $user2->name;}?>">
									</div>
								 </div>
								 <div class="form-group row">
									<label class="col-3 col-form-label">Username</label>
									<div class="col-9">
										<input type="text" id="user_name" name="user_name" <?php if($this->session->userdata('user_type') == '0'){ echo 'disabled'; } ?> class="form-control" value="<?php if($curentID !=''){ echo $user2->user_name;}?>">
									</div>
								 </div>
								 <div class="form-group row">
									<label class="col-3 col-form-label">Password</label>
									<div class="col-9">
										<input type="password" id="password" name="password" class="form-control">
										<small class="text-danger">**If you don't want to change your password, leave it blank.</small>
										<input type="hidden" id="hpass" name="hpassword" value="<?php if($curentID !=''){ echo $user2->password;}?>">
									</div>
								 </div>
								 <div class="form-group row">
									<label class="col-3 col-form-label">E-mail</label>
									<div class="col-9">
										<input type="text" id="email" name="email" class="form-control" value="<?php if($curentID !=''){ echo $user2->email;}?>">
									</div>
								 </div>		
                                    
                                    		
									<br><br>
                                    <div class="form-group row">
										<div class="col-12" style="text-align: center">
											<button type="button"  class="btn btn-primary btn-sm" id="btnAdd" onClick="check_frmUser()">Add / Edit Data</button>								
										</div>
                                    <input type="hidden" id="curentID" name="curentID" value="<?php if($curentID !=''){ echo $curentID;}?>" >
                                    
                                    </div>	
										
									</form>	
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- end page title end breadcrumb -->

</div> <!-- end container -->
</div>  
  
