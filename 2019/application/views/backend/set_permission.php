<div class="wrapper">
<div class="container-fluid">

<!-- Page-Title -->
<div class="row">
     <?php $list_admin = $this->Project_model->list_admin($curentID);
			  			 foreach($list_admin->result() as $user2){ } ?>
	<div class="col-sm-12">
		<div class="page-title-box">
			<h4 class="page-title">Set Permission <?php echo $user2->name?></h4>
                        <br>
			<div class="row">
				<div class="col-sm-12">
					<div class="card m-b-30 card-body">
						<h5 class="card-title">
							<div class="progress mb-0" style="display: none">
						<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
						</div>

							<div class="pull-right">
								<button type="button" class="btn btn-info btn-sm" onClick="window.location.href='<?php echo base_url('Control/admin_list')?>'"><i class="fas fa-arrow-left"></i> Back</button>
                            </div>
						</h5>
				<div class="">
                                <table class="table table-hover table-centered m-0">

                                    <thead>
                                    <tr>
                                        <th><strong>Menu</strong></th>
                                        <!--<th><strong>ห้ามเข้า</strong></th>-->
                                        <th style="text-align: center"><strong>Permission</strong></th>                                        
                                    </tr>
                                    </thead>
                                    <tbody>
									<?php 	$menu_type = '1';  $cate =''; $n=1; $val2 = '1'; $txtCheck = '';
							 				$menuData = $this->User_model->get_menu($menu_type,$cate);
											foreach($menuData->result() as $menuData2){ 
										
											$permissionData5 = $this->User_model->getPermissionData($menuData2->id,$curentID);
												
											if($permissionData5 != ''){
												foreach ($permissionData5->result() as $permissionData6){}

												if(($permissionData6->menu_id == $menuData2->id) && ($permissionData6->permission==1)){ 
													$txtCheck = '';
													$val2 = '1';
												} 
												if(($permissionData6->menu_id == $menuData2->id) && ($permissionData6->permission==2)){ 
													$txtCheck = 'checked';
													$val2 = '2';
												} 
												
												//echo ">>".$permissionData->menu_id." >>".$data->id ;
											}
									?>	
                                    <tr <?php if($n >1){ ?>style="border-top: 3px solid #787878;" <?php } ?> >                         
										<td><i class="mdi mdi-checkbox-multiple-marked"></i> <strong><?php echo $menuData2->menu_name; ?></strong></td>                       
										<!--<td>
                                            <a href="#" class="btn btn-sm btn-custom"><i class="mdi mdi-plus"></i></a>             
                                        </td>-->
                                        <td align="center">
                                            <!--<a href="#" class="btn btn-sm btn-custom"><i class="mdi mdi-plus"></i></a>  -->    
											<label><input id="ch<?php echo $menuData2->id?>" type="checkbox" class="js-switch js-check-change" onClick="setPermission('<?php echo $curentID?>' , '<?php echo $menuData2->id; ?>' , this.value , '<?php echo $menuData2->menu_url; ?>')" value="<?php echo $val2?>" <?php  echo $txtCheck; ?> data-plugin="switchery" data-color="#007bff" data-size="small" /></label>
                                        </td>
									</tr>
										
									<?php 	$menu_type2 = '2';  $cate2 = $menuData2->id;  
							 				$menuData3 = $this->User_model->get_menu($menu_type2,$cate2);
											foreach($menuData3->result() as $menuData4){ 
										
											$permissionData1 = $this->User_model->getPermissionData($menuData4->id,$curentID);
												
											if($permissionData1 != ''){
												foreach ($permissionData1->result() as $permissionData){}

												if(($permissionData->menu_id == $menuData4->id) && ($permissionData->permission==1)){ 
													$txtCheck = '';
													$val2 = '1';
												} 
												if(($permissionData->menu_id == $menuData4->id) && ($permissionData->permission==2)){ 
													$txtCheck = 'checked';
													$val2 = '2';
												} 
												
												//echo ">>".$permissionData->menu_id." >>".$data->id ;
											}	
									?>		
									<tr>                         
										<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $menuData4->menu_name; ?></td>                       
										<!--<td>
                                            <a href="#" class="btn btn-sm btn-custom"><i class="mdi mdi-plus"></i></a>             
                                        </td>-->
                                        <td align="center">
                                            <!--<a href="#" class="btn btn-sm btn-custom"><i class="mdi mdi-plus"></i></a>--> 
											<label><input id="ch<?php echo $menuData4->id?>" type="checkbox" class="js-switch js-check-change" onClick="setPermission('<?php echo $curentID?>' , '<?php echo $menuData4->id; ?>' , this.value , '<?php echo $menuData4->menu_url; ?>')" value="<?php echo $val2?>" <?php  echo $txtCheck; ?> data-plugin="switchery" data-color="#007bff" data-size="small" /></label>
                                        </td>
									</tr>	
									
									<?php }  $n++;  $val2 = '1'; $txtCheck = ''; }  ?>                                  

                                    </tbody>
                                </table>
                            </div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- end page title end breadcrumb -->

</div> <!-- end container -->
</div>  
  







           




