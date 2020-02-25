
<style>
	.icon-click {
		cursor: pointer;
		padding: 0 7px 0 7px;
	}
	
	.select-icon {
		font-size: 50px;
		padding: 0 10px 0 10px;
		color: #1d70af;
	}
/*        [class^="flaticon-"]:before, [class*=" flaticon-"]:before, [class^="flaticon-"]:after, [class*=" flaticon-"]:after{
            color: red;
            font-size: 50px;
        }*/

</style> 
<div class="wrapper">
<div class="container-fluid">

<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<h4 class="page-title">Facilities Data</h4>
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
								<button type="button" class="btn btn-info btn-sm" onClick="window.location.href='<?php echo base_url('Control/Facilities_list')?>'"><i class="fas fa-arrow-left"></i> Back</button></div>
						</h5>
						<!-------------->
                                                <?php 
                                                
                                                if($currentID!=''){
                                                $list_Facilities = $this->Project_model->list_Facilities($currentID);
                                                foreach($list_Facilities->result() AS $Facilities){}
                        $currentID=$Facilities->id;
			$topic_th=$Facilities->topic_th;
			$topic_en=$Facilities->topic_en; 
			$detail_th=$Facilities->detail_th;
			$detail_en=$Facilities->detail_en;
			$icon_class=$Facilities->icon_class;
                                                }
                                                ?>
						<form enctype="multipart/form-data" id="FacilitiesForm" name="FacilitiesForm">
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
                                         <label class="col-sm-3 col-form-label">ICON :</label>
                                        <div class="col-md-9 col-sm-12" style="color: #343a40; font-size: x-large;">
											<i class="fab fa-fort-awesome icon-click" ></i>
											<i class="fas fa-swimming-pool icon-click"></i>
											<i class="fas fa-biking icon-click"></i>
											<i class="fas fa-tree icon-click"></i>
											<i class="fas fa-user-shield icon-click"></i>
											<i class="fas fa-user-secret icon-click"></i>
                                                                                        <i class="flaticon-area icon-click" aria-hidden="true" onclick="test('flaticon-area')"></i>
                                                                                        <i class="flaticon-area-1 icon-click" aria-hidden="true" onclick="test('flaticon-area-1')"></i>
											<i class="flaticon-map icon-click" aria-hidden="true" onclick="test('flaticon-map')"></i>
											<i class="flaticon-address icon-click" aria-hidden="true" onclick="test('flaticon-address')"></i>
											<i class="flaticon-maps-and-location icon-click" aria-hidden="true" onclick="test('flaticon-maps-and-location')"></i>
											<i class="flaticon-travel icon-click" aria-hidden="true" onclick="test('flaticon-travel')"></i>
											<i class="flaticon-parking icon-click" aria-hidden="true" onclick="test('flaticon-parking')"></i>
											<i class="flaticon-parking-1 icon-click" aria-hidden="true" onclick="test('flaticon-parking-1')"></i>
											<i class="flaticon-room icon-click" aria-hidden="true" onclick="test('flaticon-room')"></i>
											<i class="flaticon-swim icon-click" aria-hidden="true" onclick="test('flaticon-swim')"></i>
											<i class="flaticon-swim-1 icon-click" aria-hidden="true" onclick="test('flaticon-swim-1')"></i>
											<i class="flaticon-abacus icon-click" aria-hidden="true" onclick="test('flaticon-abacus')"></i>
											<i class="flaticon-furniture-and-household icon-click" aria-hidden="true" onclick="test('flaticon-furniture-and-household')"></i>
											<i class="flaticon-workplace icon-click" aria-hidden="true" onclick="test('flaticon-workplace')"></i>
											<i class="flaticon-living-room icon-click" aria-hidden="true" onclick="test('flaticon-living-room')"></i>
											<i class="flaticon-park icon-click" aria-hidden="true" onclick="test('flaticon-park')"></i>
											<i class="flaticon-park-1 icon-click" aria-hidden="true" onclick="test('flaticon-park-1')"></i>
											<i class="flaticon-leisure icon-click" aria-hidden="true" onclick="test('flaticon-leisure')"></i>
											<i class="flaticon-gym icon-click" aria-hidden="true" onclick="test('flaticon-gym')"></i>
											<i class="flaticon-gym-1 icon-click" aria-hidden="true" onclick="test('flaticon-gym-1')"></i>
											<i class="flaticon-sofa icon-click" aria-hidden="true" onclick="test('flaticon-sofa')"></i>
											<i class="flaticon-family icon-click" aria-hidden="true" onclick="test('flaticon-family')"></i>
											<i class="flaticon-dog icon-click" aria-hidden="true" onclick="test('flaticon-dog')"></i>
											<i class="flaticon-group icon-click" aria-hidden="true" onclick="test('flaticon-group')"></i>
											<i class="flaticon-group-1 icon-click" aria-hidden="true" onclick="test('flaticon-group-1')"></i>
											<i class="flaticon-waiter icon-click" aria-hidden="true" onclick="test('flaticon-waiter')"></i>
											<i class="flaticon-dinner icon-click" aria-hidden="true" onclick="test('flaticon-dinner')"></i>
											<i class="flaticon-gift icon-click" aria-hidden="true" onclick="test('flaticon-gift')"></i>
											<i class="flaticon-gift-1 icon-click" aria-hidden="true" onclick="test('flaticon-gift-1')"></i>
											<i class="flaticon-wishlist icon-click" aria-hidden="true" onclick="test('flaticon-wishlist')"></i>
											<i class="flaticon-shirt icon-click" aria-hidden="true" onclick="test('flaticon-shirt')"></i>
											<i class="flaticon-support icon-click" aria-hidden="true" onclick="test('flaticon-support')"></i>
											<i class="flaticon-question icon-click" aria-hidden="true" onclick="test('flaticon-question')"></i>
											<i class="flaticon-talk icon-click" aria-hidden="true" onclick="test('flaticon-talk')"></i>
											<i class="flaticon-talk-1 icon-click" aria-hidden="true" onclick="test('flaticon-talk-1')"></i>
											<i class="flaticon-political icon-click" aria-hidden="true" onclick="test('flaticon-political')"></i>
											<i class="flaticon-university icon-click" aria-hidden="true" onclick="test('flaticon-university')"></i>
											<i class="flaticon-hand icon-click" aria-hidden="true" onclick="test('flaticon-hand')"></i>
											<i class="flaticon-shield icon-click" aria-hidden="true" onclick="test('flaticon-shield')"></i>
											<i class="flaticon-cctv icon-click" aria-hidden="true" onclick="test('flaticon-cctv')"></i>
											<i class="flaticon-land icon-click" aria-hidden="true" onclick="test('flaticon-land')"></i>
											<i class="flaticon-guard icon-click" aria-hidden="true" onclick="test('flaticon-guard')"></i>
											<i class="flaticon-wifi icon-click" aria-hidden="true" onclick="test('flaticon-wifi')"></i>
											<i class="flaticon-wifi-1 icon-click" aria-hidden="true" onclick="test('flaticon-wifi-1')"></i>
											<i class="flaticon-wifi-2 icon-click" aria-hidden="true" onclick="test('flaticon-wifi-2')"></i>
											<i class="flaticon-tap icon-click" aria-hidden="true" onclick="test('flaticon-tap')"></i>
											<i class="flaticon-click icon-click" aria-hidden="true" onclick="test('flaticon-click')"></i>
											<i class="flaticon-shield-1 icon-click" aria-hidden="true" onclick="test('flaticon-shield-1')"></i>
											<i class="flaticon-farming-and-gardening icon-click" aria-hidden="true" onclick="test('flaticon-farming-and-gardening')"></i>
											<i class="flaticon-food icon-click" aria-hidden="true" onclick="test('flaticon-food')"></i>
											<i class="flaticon-horse icon-click" aria-hidden="true" onclick="test('flaticon-horse')"></i>
											<i class="flaticon-horse-1 icon-click" aria-hidden="true" onclick="test('flaticon-horse-1')"></i>
											<i class="flaticon-horse-2 icon-click" aria-hidden="true" onclick="test('flaticon-horse-2')"></i>
											<i class="flaticon-horse-3 icon-click" aria-hidden="true" onclick="test('flaticon-horse-3')"></i>
											<i class="flaticon-plane icon-click" aria-hidden="true" onclick="test('flaticon-plane')"></i>
											<i class="flaticon-cocktail icon-click" aria-hidden="true" onclick="test('flaticon-cocktail')"></i>
											<i class="flaticon-landmark icon-click" aria-hidden="true" onclick="test('flaticon-landmark')"></i>
											<i class="flaticon-map-1 icon-click" aria-hidden="true" onclick="test('flaticon-map-1')"></i>
											<i class="flaticon-beach icon-click" aria-hidden="true" onclick="test('flaticon-beach')"></i>
											<i class="flaticon-gift-2 icon-click" aria-hidden="true" onclick="test('flaticon-gift-2')"></i>
											<i class="flaticon-shopper icon-click" aria-hidden="true" onclick="test('flaticon-shopper')"></i>
											<i class="flaticon-bag icon-click" aria-hidden="true" onclick="test('flaticon-bag')"></i>
											<i class="flaticon-shopping-cart icon-click" aria-hidden="true" onclick="test('flaticon-shopping-cart')"></i>
											<i class="flaticon-school icon-click" aria-hidden="true" onclick="test('flaticon-school')"></i>
											<i class="flaticon-school-1 icon-click" aria-hidden="true" onclick="test('flaticon-school-1')"></i>
											<i class="flaticon-strand icon-click" aria-hidden="true" onclick="test('flaticon-strand')"></i>
											<i class="flaticon-beach-1 icon-click" aria-hidden="true" onclick="test('flaticon-beach-1')"></i>
											<i class="flaticon-twitter icon-click" aria-hidden="true" onclick="test('flaticon-twitter')"></i>
											<i class="flaticon-facebook icon-click" aria-hidden="true" onclick="test('flaticon-facebook')"></i>
											<i class="flaticon-heart icon-click" aria-hidden="true" onclick="test('flaticon-heart')"></i>
											<i class="flaticon-doctor icon-click" aria-hidden="true" onclick="test('flaticon-doctor')"></i>
											<i class="flaticon-hospital icon-click" aria-hidden="true" onclick="test('flaticon-hospital')"></i>
											<i class="flaticon-hospital icon-click" aria-hidden="true" onclick="test('flaticon-hospital')"></i>
											<i class="flaticon-pharmacy icon-click" aria-hidden="true" onclick="test('flaticon-pharmacy')"></i>
											<i class="flaticon-banking icon-click" aria-hidden="true" onclick="test('flaticon-banking')"></i>
											<i class="flaticon-money icon-click" aria-hidden="true" onclick="test('flaticon-money')"></i>
											<i class="flaticon-bank icon-click" aria-hidden="true" onclick="test('flaticon-bank')"></i>
											<i class="flaticon-money-1 icon-click" aria-hidden="true" onclick="test('flaticon-money-1')"></i>
											<i class="flaticon-growth icon-click" aria-hidden="true" onclick="test('flaticon-growth')"></i>
											
                                        </div>
                                       
                                    </div>   
                                                    
						

						<div class="form-group row" >
							<div class="col-sm-12" style="text-align: center">
								
							<button type="button" class="btn btn-success btn-sm" onClick="Add()">Add / Edit Data</button>
                                                        <input type="hidden" name="currentID" id="currentID" value="<?php if($currentID!=''){echo $currentID;}?>">
                                                        <input type="hidden" id="icon_class" name="icon_class" value="<?php  if($currentID!=''){echo $icon_class;}?>" >

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