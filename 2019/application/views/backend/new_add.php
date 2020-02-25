

<div class="wrapper">
<div class="container-fluid">

<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<h4 class="page-title">News & Articles Data</h4>
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
<!--								<button type="button" class="btn btn-success btn-sm" onClick="window.location.href='<?php //echo base_url('Control/News_add')?>'"><i class="fa fa-plus"></i> Add News & Articles</button> 
						    &nbsp;&nbsp;-->
                                                             <?php //}?>
								<button type="button" class="btn btn-info btn-sm" onClick="window.location.href='<?php echo base_url('Control/News_list')?>'"><i class="fas fa-arrow-left"></i> Back</button></div>
						</h5>
						<!-------------->
                                                <?php 
                                                
                                                if($currentID!=''){
                                                $list_News = $this->Project_model->list_News($currentID);
                                                foreach($list_News->result() AS $News){}
                        $currentID = $News->id;
			$topic_th = $News->topic_th;
			$topic_en = $News->topic_en; 
			$detail_th = $News->detail_th;
			$detail_en = $News->detail_en;
			$detail2_th = $News->detail2_th;
			$detail2_en = $News->detail2_en;
                                                }
                                                ?>
						<form enctype="multipart/form-data" id="newsForm" name="newsForm">
						 <div class="form-group row">
							  <label class="col-sm-3 col-form-label">Topic English</label>
								<div class="col-sm-9">
                                                                        <input type="text" id="topic_en" name="topic_en" class="form-control form-control-sm" value="<?php if($currentID!=''){echo $topic_en;}?>">
								</div>
							   
						</div>
						 <div class="form-group row">
							  <label class="col-sm-3 col-form-label">Topic Thai</label>
								<div class="col-sm-9">
                                                                        <input type="text" id="topic_th" name="topic_th" class="form-control form-control-sm" value="<?php if($currentID!=''){echo $topic_th;}?>">
								</div>
							  
						</div>
						 <div class="form-group row">
							  <label class="col-sm-3 col-form-label">Description English</label>
								<div class="col-sm-9">
                                                                        <textarea id="detail_en" name="detail_en" class="ex"><?php if($currentID!=''){echo $detail_en;}?></textarea>
                                                                         <input type="hidden" name="commenten" id="commenten" >
								</div>
							  
						</div> 
						 <div class="form-group row">
							  <label class="col-sm-3 col-form-label">Description Thai</label>
								<div class="col-sm-9">
                                                                        <textarea id="detail_th" name="detail_th" class="ex"><?php if($currentID!=''){echo $detail_th;}?></textarea>
                                                                         <input type="hidden" name="commentth" id="commentth" >
								</div>
							  
						</div> 
						 <div class="form-group row">
							  <label class="col-sm-3 col-form-label">Description 2 English</label>
								<div class="col-sm-9">
                                                                        <textarea id="detail2_en" name="detail2_en" class="ex"><?php if($currentID!=''){echo $detail2_en;}?></textarea>
                                                                         <input type="hidden" name="commenten2" id="commenten2" >
								</div>
							  
						</div> 
						 <div class="form-group row">
							  <label class="col-sm-3 col-form-label">Description 2 Thai</label>
								<div class="col-sm-9">
                                                                        <textarea id="detail2_th" name="detail2_th" class="ex"><?php if($currentID!=''){echo $detail2_th;}?></textarea>
                                                                         <input type="hidden" name="commentth2" id="commentth2" >
								</div>
							  
						</div> 
						<div class="form-group row" >
							<div class="col-sm-12" style="text-align: center">
								
							<button type="button" class="btn btn-success btn-sm" onClick="Add()">Add / Edit Data</button>
                                                        <input type="hidden" name="currentID" id="currentID" value="<?php if($currentID!=''){echo $currentID;}?>">

							</div>
					</div>
                                                    </form>
                                                    <?php if ($currentID != '') {?>
                                                     <br>
                <hr>
                <br>
                    <div class="form-group row">
                        <label class="col-sm-3 fa fa-file-image-o" style="font-size:16px;font-weight: bold;"> News Images additional</label>
                       <form id="frm4" role="form" method="post" action="" enctype="multipart/form-data">
                            <div class="col-sm-12">
                                <label>&emsp;&emsp;If you want to add a photo Click Browse to select the image file. Then press the Add Photos button. The system can add unlimited images. The image should be no larger than ... by ... pixels high. ( .jpg .gif .png support) </label>
                                <a>choose file</a>
                                <input type="file" id="imggallery" name="imggallery[]" multiple> 
                                <input type="hidden" id="currentID2" name="currentID2" value="<?php if($currentID !=''){ echo $currentID;}?>" > 
                                <a  class="btn btn-custom waves-effect waves-light" onClick="Addimg()">Add Image</a>
                                <div id="showImage" style="margin-top: 5px;"></div>
                            </div>
                        </form>
                    </div>
                                                    <?php }?>		
						
						<!-------------->
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- end page title end breadcrumb -->

</div> <!-- end container -->
</div>