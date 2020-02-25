<?php 
$p_tool_map_url = '';
if($currentID !=''){
foreach ($list_project->result() AS $project) {}
if($project->id ==''){
            $get_lat = "13.102218";
            $get_lng = "100.298768";
            $p_tool_map_url="";
}else{
            $get_lat = $project->map_lat;
            $get_lng = $project->map_long;
            $p_tool_map_url= $project->map;

}

$cate_data = $this->Project_model->list_cateData($project->cate_id);
foreach ($cate_data->result() AS $cate_data2) {}
$cate_datasub = $this->Project_model->list_cateDatamain($cate_data2->main_cate_id);
}
?>
 <style> 
        iframe { 
            width: 200px; 
            height: 150px; 
            border: none; 
        } 
    </style> 
<div class="wrapper">
<div class="container-fluid">

<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<h4 class="page-title">Project Data</h4>
                        <br>
			<div class="row">
				<div class="card-box col-md-12">
					<div class="pull-right">
                                              <?php //if($currentID!=''){?>
<!--								<button type="button" class="btn btn-success btn-sm" onClick="window.location.href='<?php //echo base_url('Control/Project_add')?>'"><i class="fa fa-plus"></i> Add Project</button> 
						    &nbsp;&nbsp;-->
                                                             <?php //}?>
                                <button type="button" class="btn btn-info btn-sm" onClick="window.location.href = '<?php echo base_url('Control/Project_list') ?>'"><i class="fa fa-arrow-left"></i> Back</button>
                            </div>
						<ul class="nav nav-tabs">                            
                            <li class="nav-item">
                                <a href="#project" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                   <i class="fas fa-map-marked-alt"></i> Project concept & Location
                                </a>
                            </li>	 <?php if($currentID!=''){?>						
							<li class="nav-item">
                                <a href="#facilities" data-toggle="tab" aria-expanded="false" class="nav-link">
                                   <i class="mdi mdi-account-settings-variant "></i> Facilities
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#houseplan" data-toggle="tab" aria-expanded="true" class="nav-link">
                                   <i class="fas fa-home"></i> House Plan
                                </a>
                            </li>							
			    <li class="nav-item">
                                <a href="#nearby" data-toggle="tab" aria-expanded="false" class="nav-link">
                                   <i class="fas fa-place-of-worship"></i> Nearby Places
                                </a>
                            </li>
			    <li class="nav-item">
                                <a href="#gallery" data-toggle="tab" aria-expanded="false" class="nav-link">
                                   <i class="fas fa-camera-retro"></i> Gallery
                                </a>
                            </li>
                            <?php }?>
                       </ul>
                       <div class="tab-content">
                        <div class="tab-pane show active" id="project">
                         <form id="frm1" role="form" method="post" action="" enctype="multipart/form-data">

							<div class="form-group row">
                               <label class="col-md-3 col-sm-12 col-form-label" >Main Category</label>
                               <div class="col-md-9 col-sm-12">
                                  <select class="form-control" id="maincate" name="maincate"onchange="changemain(this.value)">
                                                    <option value="-1">---Select---</option>
                                                    <?php 
                      foreach ($categorymain->result() as $maincate) {
                     
                                                        ?>
                                                        <option value="<?php echo $maincate->id ?>"<?php if(($currentID !='')&&($cate_data2->main_cate_id == $maincate->id)){echo 'selected';}?> ><?php echo $maincate->cate_name_en ?> </option>
													<?php } ?>
													
													
                                                </select>
                               </div>
                            </div>
							<?php if($currentID!=''){?>
                             <div class="form-group row">
                               <label class="col-md-3 col-sm-12 col-form-label" >Sub Category</label>
                               <div class="col-md-9 col-sm-12" id="div_destination">
                                  <select class="form-control" id="subcate" name="subcate">
                                       <option value="">---Select---</option>
                                      <?php $disableselect=''; $used = '';
                                      foreach ($cate_datasub->result() as $subcate) {
                 $list_projectbycate = $this->Project_model->list_projectbycate($subcate->id);
                $numcate = $list_projectbycate->num_rows();
                 
                                          ?>
                                                   <option value="<?php echo $subcate->id ?>"<?php if($project->cate_id == $subcate->id){echo 'selected';}else if($numcate>0){echo 'disabled';}?> ><?php echo $subcate->cate_name_en ?> <?php if(($project->cate_id != $subcate->id)&&($numcate>0)){ echo '(Used)';}?></option>
                                                    <?php } ?>
                                                </select>
                                 
                               </div>
                           </div>
                                                        <?php }else{?>
                            <div class="form-group row">
                               <label class="col-md-3 col-sm-12 col-form-label" >Sub Category</label>
                               <div class="col-md-9 col-sm-12" id="div_destination">
                                  <select class="form-control" id="subcate" name="subcate">
                                                    <option value="">---Select---</option>
                                                </select>
                                   
                               </div>
                           </div>
                                                        <?php }?>
							<div class="form-group row">
                               <label class="col-md-3 col-sm-12 col-form-label" >Description English</label>
                               <div class="col-md-9 col-sm-12" id="div_destination">
                                 <textarea id="detail_encon" name="detail_encon" class="ex"><?php if($currentID!=''){echo $project->project_concept_en;}?></textarea>
                                                                         <input type="hidden" name="commentencon" id="commentencon" >
                               </div>
                           </div>
							<div class="form-group row">
                               <label class="col-md-3 col-sm-12 col-form-label" >Description Thai</label>
                               <div class="col-md-9 col-sm-12" id="div_destination">
                                 <textarea id="detail_thcon" name="detail_thcon" class="ex"><?php if($currentID!=''){echo $project->project_concept_th;}?></textarea>
                                                                         <input type="hidden" name="commentthcon" id="commentthcon" >
                               </div>
                           </div>
                             <div class="form-group row">
                                        <label class="col-sm-3">
                                            Images Banner
                                        </label>
                                        <div class="col-sm-9">
                                            <input id="pack_img" name="pack_img" type="file" class="form-control form-control-sm" value="" > 
                                            <span>Images should be no larger than 1800 x 1078 pixels (.jpg .gif .png supported).
</span>
                                             
                                        </div>
                                    </div>
                  <?php if(($currentID != '')&&($project->img_name !='')){?>
                                    <div class="row">
							<div class="col-lg-12">
								<div class="card m-b-30">
									<h6 class="card-header">Images</h6>
									<div class="card-body">
										<div id="showImagepack" style="margin-top: 5px;"></div>
                                                                                <input type="hidden" id="imgold" name="imgold" value="<?php echo $project->img_name?>" />
									</div>
								</div>
							</div>

							
					</div>	
                                    <?php }else{?>
                             <input type="hidden" id="imgold" name="imgold" value="" />
                                    <?php }?>
                             <div class="form-group row">
                               <label class="col-md-3 col-sm-12 col-form-label" >Location</label>
                               <div class="col-md-6 col-sm-12" >
                                  <input class = "form-control form-control-sm" readonly value="<?php if($currentID !=''){echo $p_tool_map_url;}?>" type = "text" id = "tool_map_url" name="tool_map_url">
                        <input type="hidden" class="form-control form-control-sm" id="get_lat" name="get_lat" value="<?php if($currentID !=''){echo $get_lat;}else{echo '13.102218';}?>">
                        <input type="hidden" class="form-control form-control-sm" id="get_lng" name="get_lng" value="<?php if($currentID !=''){echo$get_lng;}else{echo '100.298768';}?>">
                            <span>Click to select the map and click Close.
</span>
                        
                               </div>
                               <div class="col-md-1 col-sm-12" >
                                   <button class="btn btn-primary" type="button" onclick="add_map('<?php if($currentID !=''){echo $get_lat;}else{echo '13.102218';}?>','<?php if($currentID !=''){echo$get_lng;}else{echo '100.298768';}?>')">ADD MAP</button>
                                   
                               </div>
                               <?php if($p_tool_map_url!=''){?>
                               <div class="col-md-2 col-sm-12" >
                                <a href="<?php echo $p_tool_map_url?>" target="_blank"><button class="btn btn-success" type="button" >VIEW MAP</button></a>
		</div>
            <?php }?>
                           </div>

						   <br>
						   <div class="form-group row" >
                              <div class="col-12" style="text-align: center">
                                 <button type="button" class="btn btn-primary" onClick="Add()" >Add / Edit Data</button>
                              </div>
							  <input type="hidden" id="currentID" name="currentID" value="<?php if($currentID !=''){ echo $currentID;}?>" > 
                           </div>						
							
					</form>
                            
                            
			
				</div>
			<div class="tab-pane" id="facilities">
                            <form id="frm2" role="form" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group row">
                               <label class="col-md-3 col-sm-12 col-form-label" >Facilities</label>
                               <div class="col-md-6 col-sm-12" id="facilities_a">
                                  <select class="form-control selecta" id="Facilities" name="Facilities[]" >
                                                    <option value="">---Select---</option>
                                                    <?php
                                                        foreach ($Facilitiesstatus->result() as $Facilities) {
                                                        ?>
                                                        <option value="<?php echo $Facilities->id ?>"><?php echo $Facilities->topic_en ?> </option>
													<?php } ?>
													
													
                                                </select>
                               </div>
                               <div class="col-sm-3">	
                                        <a  id="bt1" class="btn btn-info" onclick="ADDFacilities()">Add Facilities</a>
                                        </div>
                            </div>
                                <div id="showFacilitiesproject">
                                                        
                                </div>
                            <div class="form-group row" >
                              <div class="col-12" style="text-align: center">
                                 <button type="button" class="btn btn-primary" onClick="AddFacdata()" >Add / Edit Data</button>
                                  <input type="hidden" id="currentIDFac" name="currentIDFac" value="<?php if($currentID !=''){ echo $currentID;}?>" > 
                              </div>
                           </div>
                            </form>
				</div>
                        <div class="tab-pane" id="houseplan" >
                            <?php 
                            $numimg = $loadImg->num_rows();
                            $numhouseplan = $list_houseplan->num_rows();
                            foreach ($list_houseplan->result() AS $list_houseplan2){}?>
                        <form id="frm3" role="form" method="post" action="" enctype="multipart/form-data">
							<div class="form-group row">
                               <label class="col-md-3 col-sm-12 col-form-label" >Description English</label>
                               <div class="col-md-9 col-sm-12" id="div_destination">
                                 <textarea id="detail_en" name="detail_en" class="ex"><?php if($numhouseplan!=''){echo $list_houseplan2->detail_en;}?></textarea>
                                                                         <input type="hidden" name="commenten2" id="commenten2" >
                               </div>
                           </div>
							<div class="form-group row">
                               <label class="col-md-3 col-sm-12 col-form-label" >Description Thai</label>
                               <div class="col-md-9 col-sm-12" id="div_destination">
                                 <textarea id="detail_th" name="detail_th" class="ex"><?php if($numhouseplan!=''){echo $list_houseplan2->detail_th;}?></textarea>
                                                                         <input type="hidden" name="commentth2" id="commentth2" >
                               </div>
                           </div>
                            <div class="form-group row">
                               <label class="col-md-3 col-sm-12 col-form-label" >Function in the house</label>
                               <div class="col-md-6 col-sm-12" id="facilities_a2">
                                  <select class="form-control functionl" id="Function" name="Function[]" >
                                                    <option value="">---Select---</option>
                                                    <?php
                                                        foreach ($Facilitiesstatus->result() as $Facilities) {
                                                        ?>
                                                        <option value="<?php echo $Facilities->id ?>"><?php echo $Facilities->topic_en ?> </option>
													<?php } ?>
													
													
                                                </select>
                               </div>
                               <div class="col-sm-3">	
                                        <a  id="bt1" class="btn btn-info" onclick="ADDFunction()">Add Function</a>
                                        </div>
                            </div>
                                <div id="showFunction">
                                                        
                                </div>
                            <div class="form-group row">
                                        <label class="col-sm-3">
                                            House Plan Images 
                                        </label>
                                        <div class="col-sm-9">
                                           <input id="img2" name="img2[]" multiple type="file" class="form-control form-control-sm" value="" > 
                                            <span>Images should be no larger than 960 x 960 pixels (.jpg .gif .png supported).
</span>
                                        </div>
                                    </div>
                            <?php if(($numhouseplan != '')&&($numimg !='')){?>
                                    <div class="row">
							<div class="col-lg-12">
								<div class="card m-b-30">
									<h6 class="card-header">Images</h6>
									<div class="card-body">
										<div id="showImage" style="margin-top: 5px;"></div>
                                                                                
									</div>
								</div>
							</div>

							
					</div>	
                                    <?php }?>

						   <br>
						   <div class="form-group row" >
                              <div class="col-12" style="text-align: center">
                                 <button type="button" class="btn btn-primary" onClick="Addhouse()" >Add / Edit Data</button>
                              </div>
							  <input type="hidden" id="currentID" name="currentID" value="<?php if($currentID !=''){ echo $currentID;}?>" > 
							  <input type="hidden" id="houseplanID" name="houseplanID" value="<?php if($numhouseplan !=''){ echo $list_houseplan2->id;}?>" > 
                           </div>						
							
					</form>
                           </div>
                        <div class="tab-pane" id="nearby" >
                            <div class="col-sm-12">
										<h5 class="card-title">
											<div class="progress mb-0" style="display: none">
										<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
										</div>

										</h5>
                                             <div class="card-box">
                                            <div class="col-12">
                                                <h5 class="card-title">Nearby Places Add</h5>
						  <div class="card m-b-5  text-xs-center" style="background-color: #BEBEBE">
                            <div class="card-body">
							  <div class="form-group row">
                                                              <div class="col-md-2">
								  <label>Places English</label>
								  </div>
                             	<div class="col-md-4">
									
                                    <input type="text" class="form-control form-control-sm" id="Places_en" name="Places_en">
								</div>
								<div class="col-md-2">
								  <label>Places Thai</label>
								  </div>
                             	<div class="col-md-4">
									
                                    <input type="text" class="form-control form-control-sm" id="Places_th" name="Places_th">
								</div>
								<br>
								<br>
								<div class="col-md-2">
								  <label>Times</label>
								  </div>
                             	<div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm" id="Minutes" name="Minutes">
								</div>
								<div class="col-md-2">
								  <label>Distance</label>
								  </div>
                             	<div class="col-md-2">
                                      <input type="text" class="form-control form-control-sm" id="distance" name="distance">
								</div>
                                                                <div class="col-md-1" style="text-align: center">
                                                                    <label >KM.</label>
								  </div>
							    <div class="col-md-1">
                                                              
                                                                <button type="button" class="btn btn-warning btn-sm" onclick="addnearby()"><i class="fa fa-plus-circle"></i> Add</button>
								</div>   
							  </div>  
                            </div>
                          </div>
						</div>
						<div style="clear: both">&nbsp;</div>
                                            
										<div id="shownearby">
										</div>
										</div>
									
								</div>
                           </div>
                        <div class="tab-pane" id="gallery" >
                            <div class="row">
							<div class="col-lg-6">
								<div class="card m-b-30">
									<h6 class="card-header">Images</h6>
									<div class="card-body">
                                                                             <form id="frm4" role="form" method="post" action="" enctype="multipart/form-data">
									 <input type="file" id="imggallery" name="imggallery[]" multiple> 
										<a href="#" class="btn btn-custom waves-effect waves-light btn-sm" onclick="AddImages()">Add Images</a>
                                                                                <input type="hidden" id="currentID2" name="currentID2" value="<?php if($currentID !=''){ echo $currentID;}?>" > 
                                                                             </form>
                                                                            <br>
                                                                               <div class="col-sm-12" >	
                                                (Images should be no larger than 960 x 960 pixels (.jpg .gif .png supported).)
                                        </div>
                                                                            <br>
										<div id="showgallery" style="margin-top: 5px;"><table class="table table-bordered table-hover"></table></div>
									</div>
								</div>
							</div>

							<div class="col-lg-6">
                                                            <form id="frm5" role="form" method="post" action="" enctype="multipart/form-data">
								<div class="card m-b-30">
                                                                    <h6 class="card-header">Youtube</h6>
									
									<div class="card-body">
										<div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Link youtube : </label>
                                       
<!--                                            <input id="linkyoutube" name="linkyoutube" class="form-control form-contol-sm" >-->
                                          
                                             <div id="linkyoutube_a" class="col-sm-5">
                                                 
                                                                                                      <input id="youtube" name="youtube[]" type="text" class="form-control form-control-sm youtube"  autocomplete="off"   >
                                                                                                      <input type="hidden" id="currentID3" name="currentID3" value="<?php if($currentID !=''){ echo $currentID;}?>" > 
                                                                                                     
                                             </div>
                                            <div class="col-sm-1">	
                                        <a  id="bt1" class="btn btn-info waves-effect waves-light btn-sm" onclick="ADDyoutubeinput()">Add</a>
                                        
                                        </div>
                                       
                                        <div class="col-sm-3" style="text-align:center;font-size: 14px">	
                                                <a href="<?php echo base_url('HTML/img/youtube.jpg')?>" target="_blank">How to add youtube</a>
                                        </div>
                                          
                                    </div> 
                                                                            <div class="col-sm-12" style="text-align:center;">	
                                                 <a  id="bt1" class="btn btn-custom waves-effect waves-light btn-sm" onclick="ADDyoutube()">Add / Edit Data</a>
                                        </div>
                                                                            <br>
                                           <div id="showyoutube">
                                                        
                                </div>
                                                                            
									</div>
								</div>
                                                                </form>
							</div>
					</div>
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