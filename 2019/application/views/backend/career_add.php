
<div class="wrapper">
<div class="container-fluid">

<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<h4 class="page-title">Career Data</h4>
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
<!--								<button type="button" class="btn btn-success btn-sm" onClick="window.location.href='<?php //echo base_url('Control/Facilities_add')?>'"><i class="fa fa-plus"></i> Add Facilities</button> 
						    &nbsp;&nbsp;-->
                                                             <?php //}?>
								<button type="button" class="btn btn-info btn-sm" onClick="window.location.href='<?php echo base_url('Control/career_list')?>'"><i class="fas fa-arrow-left"></i> Back</button></div>
						</h5>
						<!-------------->
                                                <?php 
                                                
                                                if($currentID!=''){
                                                $list_career = $this->Project_model->list_career($currentID);
                                                foreach($list_career->result() AS $Career){}
                        $currentID = $Career->id;
			$career_name = $Career->career_name;
			$career_nameth = $Career->career_nameth; 
			$category_name = $Career->category_name;
			$category_nameth = $Career->category_nameth;
			$location = $Career->location;
			$property = $Career->property;
			$property_th = $Career->property_thai;
                        $Job_duty = $Career->Job_duty;
                        $Job_duty_th = $Career->Job_duty_th;
                        $quantity = $Career->quantity;
                                                }
                                                ?>
						<form enctype="multipart/form-data" id="careerForm" name="careerForm">
						 <div class="form-group row">
							  <label class="col-sm-3 col-form-label">Career English</label>
								<div class="col-sm-9">
                                                                        <input type="text" id="career_name" name="career_name" class="form-control form-control-sm" value="<?php if($currentID!=''){echo $career_name;}?>">
								</div>
							   
						</div>
						 <div class="form-group row">
							  <label class="col-sm-3 col-form-label">Career Thai</label>
								<div class="col-sm-9">
                                                                        <input type="text" id="career_nameth" name="career_nameth" class="form-control form-control-sm" value="<?php if($currentID!=''){echo $career_nameth;}?>">
								</div>
							  
						</div>
						 <div class="form-group row">
							  <label class="col-sm-3 col-form-label">Category Thai</label>
								<div class="col-sm-9">
                                                                        <input type="text" id="category_name" name="category_name" class="form-control form-control-sm" value="<?php if($currentID!=''){echo $category_name;}?>">
								</div>
							  
						</div>
						 <div class="form-group row">
							  <label class="col-sm-3 col-form-label">Category Thai</label>
								<div class="col-sm-9">
                                                                        <input type="text" id="category_nameth" name="category_nameth" class="form-control form-control-sm" value="<?php if($currentID!=''){echo $category_nameth;}?>">
								</div>
							  
						</div>
						 <div class="form-group row">
							  <label class="col-sm-3 col-form-label">Location</label>
								<div class="col-sm-9">
                                                                        <input type="text" id="location" name="location" class="form-control form-control-sm" value="<?php if($currentID!=''){echo $location;}?>">
								</div>
						</div>
                                                <div class="form-group row">
							  <label class="col-sm-3 col-form-label">Property English</label>
								<div class="col-sm-9">
                                                                        <textarea id="property" name="property" class="ex"><?php if($currentID!=''){echo $property;}?></textarea>
                                                                         <input type="hidden" name="propertyen" id="propertyen" >
								</div>
							  
						</div> 
                                                <div class="form-group row">
							  <label class="col-sm-3 col-form-label">Property Thai</label>
								<div class="col-sm-9">
                                                                        <textarea id="property_th" name="property_th" class="ex"><?php if($currentID!=''){echo $property_th;}?></textarea>
                                                                         <input type="hidden" name="propertyth" id="propertyth" >
								</div>
							  
						</div> 
                                                <div class="form-group row">
							  <label class="col-sm-3 col-form-label">Job Duty English</label>
								<div class="col-sm-9">
                                                                        <textarea id="Job_duty" name="Job_duty" class="ex"><?php if($currentID!=''){echo $Job_duty;}?></textarea>
                                                                         <input type="hidden" name="Jobduty" id="Jobduty" >
								</div>
							  
						</div> 
                                                <div class="form-group row">
							  <label class="col-sm-3 col-form-label">Job Duty Thai</label>
								<div class="col-sm-9">
                                                                        <textarea id="Job_duty_th" name="Job_duty_th" class="ex"><?php if($currentID!=''){echo $Job_duty_th;}?></textarea>
                                                                         <input type="hidden" name="Jobdutyth" id="Jobdutyth" >
								</div>
							  
						</div> 
                                                    <div class="form-group row">
							  <label class="col-sm-3 col-form-label">Quantity</label>
								<div class="col-sm-9">
                                                                    <input type="number" id="quantity" name="quantity" class="form-control form-control-sm" value="<?php if($currentID!=''){echo $quantity;}?>">
								</div>
							  
						</div>
						<div class="form-group row" >
							<div class="col-sm-12" style="text-align: center">
								
							<button type="button" class="btn btn-success btn-sm" onClick="Add()">Add / Edit Data</button>
                                                        <input type="hidden" name="currentID" id="currentID" value="<?php if($currentID!=''){echo $currentID;}?>">

							</div>
					</div>
					
						
						<!-------------->
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