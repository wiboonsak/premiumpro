<?php
 if($currentID!=''){
$slideDetail = $this->Project_model->list_slideData($currentID);
foreach($slideDetail->result() AS $slide){}
			$title1 = $slide->title1;
			$title2 = $slide->title2;
			$title1th = $slide->title1th;
			$title2th = $slide->title2th;
			$explore_it = $slide->explore_it;
			$img_name = $slide->img_name;
 }else{
     $img_name = '';
 }

?>
<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           
                            <h4 class="page-title">Slide Add</h4>
                            <br>
							<div class="row">
                    			<div class="col-sm-12">
									<div class="card m-b-30 card-body">
										<h5 class="card-title">
											<div class="progress mb-0" style="display: none">
										<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
										</div>
                                                                                    <div class="pull-right">
                                                             <?php //if($currentID!=''){?>
<!--								<button type="button" class="btn btn-success btn-sm" onClick="window.location.href='<?php //echo base_url('Control/slide_add')?>'"><i class="fa fa-plus"></i> Add Slide</button> 
						    &nbsp;&nbsp;-->
                                                             <?php //}?>
								<button type="button" class="btn btn-info btn-sm" onClick="window.location.href='<?php echo base_url('Control/slide_list')?>'"><i class="fa fa-arrow-left"></i> Back</button></div>
										</h5>
						<form enctype="multipart/form-data" id="slideForm" name="slideForm">
						 <div class="form-group row">
							  <label class="col-sm-3 col-form-label">Topic English</label>
								<div class="col-sm-9">
                                                                        <input type="text" id="slide_title" name="slide_title" class="form-control form-control-sm" value="<?php if($currentID!=''){echo $title1;}?>" >
								</div>
							   
						</div>
						 <div class="form-group row">
							  <label class="col-sm-3 col-form-label">Topic Thai</label>
								<div class="col-sm-9">
                                                                        <input type="text" id="slide_titleth" name="slide_titleth" class="form-control form-control-sm" value="<?php if($currentID!=''){echo $title1th;}?>" >
								</div>
							   
						</div>
						 <div class="form-group row">
							  <label class="col-sm-3 col-form-label">Text 1 English</label>
								<div class="col-sm-9">
                                                                    <input id="slide_detail" name="slide_detail" class="form-control form-control-sm" value="<?php if($currentID!=''){echo $title2;}?>" />
								</div>
						</div>	
						 <div class="form-group row">
							  <label class="col-sm-3 col-form-label">Text 1 Thai</label>
								<div class="col-sm-9">
                                                                    <input id="slide_detailth" name="slide_detailth" class="form-control form-control-sm" value="<?php if($currentID!=''){echo $title2th;}?>" />
								</div>
						</div>	
						 <div class="form-group row">
							  <label class="col-sm-3 col-form-label">Images</label>
								<div class="col-sm-9">
									<input   type="file" id="ImagesFiles" name="ImagesFiles"  /> 
                                                                        <br><a>(Supported image file extensions jpg, gif, png. File size should not exceed 2MB. Picture size 1,920 x 860 pixels.)</a>
								</div>
							  
						</div>	
                                                   <div class="form-group row">
							  <label class="col-sm-3 col-form-label">Read More</label>
								<div class="col-sm-9">
                                                                    <input type="text" id="learnMore" name="learnMore" class="form-control form-control-sm" value="<?php if($currentID!=''){echo $explore_it;}?>" placeholder="http://hatyaipremiumproperty.com"> 
								</div>
							  
						</div>	  
						<div class="form-group row" >
							<div class="col-sm-12" style="text-align: center">
							<button type="button" class="btn btn-success btn-sm" onClick="AddSlide()">Add / Edit Data</button>
                                                        <input type="hidden" name="currentID" id="currentID" value="<?php if($currentID!=''){echo $currentID;}?>">
                                                        <input type="hidden" name="img_old" id="img_old" value="<?php if($currentID!=''){echo $img_name;}?>">
							</div>
					</div>					
											
						</form>	
                                                                            <?php if(($img_name!='')&&($currentID!='')){?>
										<div id="showImage" style="margin-top: 5px;"></div>
                                                                            <?php }?>
									</div>
								</div>
								
							</div>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

            </div> <!-- end container -->
        </div>