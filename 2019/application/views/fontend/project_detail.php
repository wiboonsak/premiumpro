<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>HATYAI PREMIUM PROPERTY หาดใหญ่ พรีเมียม พร๊อพเพอร์ตี้ ใกล้สนามบินหาดใหญ่ ใส่ใจทุกรายละเอียดของการสร้าง</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta name="description" content="Hatyai Premium Property โครงการบ้าน หาดใหญ่ พรีเมียม พร๊อพเพอร์ตี้ ใกล้สนามบินหาดใหญ่ ใส่ใจทุกรายละเอียดของการสร้าง ทั้งทำเลและนวัตกรรมเทคโนโลยี เพื่อยกระดับคุณภาพชีวิตคุณให้ดีกว่าเดิม">
    <meta name="keywords" content="Hatyai, Premium Property, โครงการบ้าน, หาดใหญ่, พรีเมียม พร๊อพเพอร์ตี้, ใกล้สนามบินหาดใหญ่" />

    <meta property="og:title" content="Hatyai Premium Property โครงการบ้าน หาดใหญ่ พรีเมียม พร๊อพเพอร์ตี้ ใกล้สนามบินหาดใหญ่ ใส่ใจทุกรายละเอียดของการสร้าง ทั้งทำเลและนวัตกรรมเทคโนโลยี เพื่อยกระดับคุณภาพชีวิตคุณให้ดีกว่าเดิม" />
    <meta property="og:description" content="Hatyai Premium Property โครงการบ้าน หาดใหญ่ พรีเมียม พร๊อพเพอร์ตี้ ใกล้สนามบินหาดใหญ่ ใส่ใจทุกรายละเอียดของการสร้าง ทั้งทำเลและนวัตกรรมเทคโนโลยี เพื่อยกระดับคุณภาพชีวิตคุณให้ดีกว่าเดิม" />
    <meta property="og:type" content="company" />
    <meta property="og:url" content="http://hatyaipremiumproperty.com" />
    <meta property="og:image" content="http://hatyaipremiumproperty.com/2019/img/logo-white.png" />
    <meta property="og:site_name" content="หาดใหญ่ พรีเมียม พร๊อพเพอร์ตี้" />
    <meta property="fb:admins" content="" />
	
	<link href="https://fonts.googleapis.com/css?family=Mitr&display=swap" rel="stylesheet">
	<link rel="icon" href="<?php echo base_url('HTML/img/favicon.png')?>" type="image/gif" sizes="16x10">	

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
	<link rel="stylesheet" href="<?php echo base_url('HTML/css/swiper.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('HTML/css/slick.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('HTML/css/magnific-popup.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('HTML/font-awesome/css/font-awesome.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('HTML/css/et-line-font.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('HTML/css/before-after.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('HTML/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('HTML/css/unit-test.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('HTML/css/style.css?v=9')?>">
	
	<!--<script src="https://kit.fontawesome.com/ab37079097.js" crossorigin="anonymous"></script>-->
	<script src="<?php echo base_url('HTML/font-awesome/fontawesome.js')?>" crossorigin="anonymous"></script>
	
	<!--FLAT ICON-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('HTML/font/flaticon.css')?>">

	
</head>
 <style> 
        iframe { 
            width: 100%; 
            height: 560px; 
            border: none; 
        } 
    </style> 
<body class="">
	

		
		
	 <!--PRELOADER-->
	 <div class="prague-loader">
        <div class="prague-loader-wrapper">
            <div class="prague-loader-bar">
                  <?php echo $this->lang->line('Premium_Property'); ?>
            </div>
        </div>
    </div>
    <!--/PRELOADER-->

	<!--HEADER-->
		<?php include("header.php"); ?>
        <?php 
        foreach($list_project->result() AS $data){ }
       $list_cateData = $this->Project_model->list_cateData($data->cate_id);
       foreach($list_cateData->result() AS $list_cateData2){}
       $maincate = $this->Project_model->list_cateData($list_cateData2->main_cate_id);
       foreach($maincate->result() AS $maincate2){}
       $list_houseplan = $this->Project_model->list_houseplan($data->id);
       $numhouseplan = $list_houseplan->num_rows();
 $Functioninhouse = $this->Project_model->Functioninhouse($data->id);
 $numFunctioninhouse = $Functioninhouse->num_rows();
           $Facilitiesproject = $this->Project_model->Facilitiesproject($data->id);
            $numFacilitiesproject = $Facilitiesproject->num_rows();
        $list_gallerylimit = $this->Project_model->list_gallerylimit($data->id);
        foreach($list_gallerylimit->result() AS $gallerylimit){}
         $list_nearby = $this->Project_model->list_nearby($data->id);
         $numlist_nearby = $list_nearby->num_rows();
         $galleryimg = $this->Project_model->list_gallery($data->id);
         $numgalleryimg = $galleryimg->num_rows();
          if($this->session->userdata('weblang') == 'en'){
                            $name = $list_cateData2->cate_name_en.' | '. $maincate2->cate_name_en;
                            $concept = $data->project_concept_en;
                          }else{
                            $name = $list_cateData2->cate_name_th.' | '. $maincate2->cate_name_th;
                            $concept = $data->project_concept_th; 
                          }
        ?>
	<!--/HEADER-->
  	<!--MAIN BODY-->
    <div class="container-fluid no-padd">
        <div class="row">
            <div class="col-xs-12 padd-only-xs">
                <div class="container-fluid top-banner no-padd  big fullheight light">
                    <span class="overlay"></span>
                    <img src="<?php echo base_url('uploadfile/'.$data->img_name)?>" class="s-img-switch" alt="banner image">
                    <div class="content">
                        <div class="prague-svg-animation-text"></div>
                        <div class="subtitle"><?php echo $this->lang->line('Project'); ?></div>
                        <h1 class="title"><?php echo $name?></h1>
                        <a href="#" onclick="Goto('project_info')" class="a-btn creative">  
                            <span class="a-btn-line"></span><?php echo $this->lang->line('Projectinfo'); ?>
						</a>
                    </div>
                    <div class="top-banner-cursor"></div>
                </div>
            </div>
        </div>
    </div>
	<!--NAVIGATION-->
	<div class="clearfix"></div>
	<div class="container no-padd" style="margin: 50px auto 0px; z-index: 999999;">			
		<ul class="main-menu">
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu_house"><a href="#" onclick="Goto('project_concept')" style="color: #2f2a24"><?php echo $this->lang->line('concept'); ?></a></li>
                        <?php if($numFacilitiesproject>0){?>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu_house"><a href="#" onclick="Goto('facilities')" style="color: #2f2a24"><?php echo $this->lang->line('Facilities'); ?></a></li>
                        <?php }?>
                         <?php if($numhouseplan>0){?>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu_house"><a href="#" onclick="Goto('house_plan')" style="color: #2f2a24"><?php echo $this->lang->line('HOUSE_PLAN'); ?></a></li>
                         <?php }?>
                        <?php if($numlist_nearby>0){?>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu_house"><a href="#" onclick="Goto('nearby_places')" style="color: #2f2a24"><?php echo $this->lang->line('NEARBY_PLACES'); ?></a></li>
                        <?php }?>
                        
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu_house"><a href="#" onclick="Goto('location')" style="color: #2f2a24"><?php echo $this->lang->line('LOCATION'); ?></a></li>
                        <?php if($numgalleryimg>0){?>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu_house"><a href="#" onclick="Goto('gallery')" style="color: #2f2a24"><?php echo $this->lang->line('GALLERY'); ?></a></li>
                        <?php }?>
		</ul>
								
	</div>
	<!--/NAVIGATION-->
	
	
	<!-- Project Concept  -->
	<div class="clearfix"></div>
	<div id="project_concept"></div>
    <div class="container no-padd">
	<div class="row-fluid  margin-lg-40t margin-sm-40t">
        <div class="col-sm-8 col-lg-offset-0 no-padd col-lg-4 col-md-offset-0 col-md-5 col-sm-offset-2 col-xs-12  margin-lg-65t margin-sm-0t">
            <div class="vc_column-inner margin-minus-left">
                    <div class="prague-counter  alone_item no-figure">

                        <div class="figures ">
                            <!-- triangle -->
                        </div>

                        <div class="counter-outer" style="padding:15px;">
                            <img src="#" data-lazy-src="<?php echo base_url('uploadfile/'.$data->img_name)?>" alt="experience image" class="prague-counter-img s-img-switch">
                            <div class="numbers">
                                <svg>
                                    <defs>
                                        <mask id="coming_mask_0" x="0" y="0">
                                            <rect class="coming-alpha" x="0" y="0" width="100%" height="100%"></rect>
                                            <text class="count number" x="50%" y="45%" text-anchor="middle"
                                                alignment-baseline="middle">19</text>
                                            <text class="count title" x="50%" y="70%" text-anchor="middle"
                                                alignment-baseline="middle"><?php echo $this->lang->line('YEARS'); ?></text>
                                        </mask>
                                    </defs>
                                    <rect style="-webkit-mask: url(#coming_mask_0); mask: url(#coming_mask_0);" class="base"
                                        x="0" y="0" width="100%" height="100%"></rect>
                                </svg>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class=" no-padd col-sm-12 col-lg-offset-1 col-lg-7 col-md-offset-0 col-md-7 col-sm-offset-0 col-xs-12  margin-sm-20t">
              <div class="heading  left dark">

                        <div class="subtitle "><strong><?php echo $name?></strong></div>
                        <h2 class="title"><?php echo $this->lang->line('concept'); ?></h2>
                        <div class="content ">
                           <?php echo $concept?>
                        </div>
              </div>
        </div>
    </div>
    </div>
	<!-- /Project Concept  -->	
	
	 <?php if($numFacilitiesproject>0){?>
	<!-- Failities -->
	<div class="clearfix"></div>
  	<div id="facilities"></div>
    <div class="row-fluid margin-lg-40t margin-sm-40t">
        <div class="no-padd col-sm-12 ">
            <div class="column-inner ">
                    <div class="prague-shortcode-parent ">
                        <div class="prague-shortcode-parent-img">
                            <span class="overlay"></span>
                            <img src="#" data-lazy-src="<?php echo base_url('HTML/img/facility.jpg')?>" class="s-img-switch" alt="middle-banner image" />
                        </div>

                        <div class="prague-shortcode-content-wrapp">
                            <div class="prague-shortcode-heading  light left">
                                <div class="parent-subtitle "><?php echo $this->lang->line('Facilities'); ?></div>

                                <h2 class="parent-title"><?php echo $name?></h2>
                            </div>

                            <div data-unique-key="0bf3c8aa9017e52dd041b7e2c3327621" class="js-load-more"
                                data-start-page="1" data-max-page="2" data-next-link="onepage-home.html">
                                <div class="row prague_services prague_count_col3 prague_gap_col15  no-footer-content prague-load-wrapper"
                                    data-columns="prague_count_col3" data-gap="prague_gap_col15">
                                    <?php 
                                   
                                    foreach ($Facilitiesproject->result() AS $Facilitiesproject2){
                                       $list_Facilities = $this->Project_model->list_Facilities($Facilitiesproject2->facilities_id); 
                                       foreach ($list_Facilities->result() AS $list_Facilities2){}
                                         if($this->session->userdata('weblang') == 'en'){
                            $topic = $list_Facilities2->topic_en;
                            $detail = $list_Facilities2->detail_en;
                          }else{
                            $topic = $list_Facilities2->topic_th;
                            $detail = $list_Facilities2->detail_th; 
                          }
                                    ?>
                                    <div class="portfolio-item-wrapp prague_filter_class">
                                        <div class="portfolio-item">

                                            <div class="prague-services-wrapper">
                                                <span class="services-item-icon">
													<i class="<?php echo $list_Facilities2->icon_class?>" style="font-size: 48px; line-height: 48px; margin-bottom: 18px; color: #837364;"></i>
												</span>

                                                <h3 class="services-item-title"><?php echo $topic?></h3>
                                                <div class="services-item-description">
                                                    <?php echo $detail?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <?php }?>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
        </div>
    </div>
    <!-- /Failities -->	
         <?php }?>
	 <?php if($numhouseplan>0){?>
	<!-- House Plan -->	
	<div class="clearfix"></div>
	<div id="house_plan" style="padding:1em 0;"></div>
	<div class="container no-padd margin-lg-135t margin-xs-100t margin-lg-40b margin-sm-40b">
        <div class="row-fluid no-padd ">
            <div class="vc_column_container col-sm-5 no-padd">
                <div class="padd-right-only-lg">
                    <div class="heading left dark no-padd-top">
                    <?php 
                   
                            foreach ($list_houseplan->result() AS $list_houseplan2){}
                            if($this->session->userdata('weblang') == 'en'){
                            $detailhouse = $list_houseplan2->detail_en;
                          }else{
                            $detailhouse = $list_houseplan2->detail_th; 
                          }
                    ?>
                        <div class="subtitle  align-left"><?php echo $name?></div>
                        <h2 class="title  align-left"><?php echo $this->lang->line('HOUSE_PLAN'); ?></h2>
                        <div class="content align-left">
                            <?php echo $detailhouse?>
							
							<h6><?php echo $this->lang->line('FUNCTIONS'); ?></h6>
					<?php foreach ($Functioninhouse->result() AS $Functioninhouse2){
                                           $list_Facilitieshome = $this->Project_model->list_Facilities($Functioninhouse2->facilities_id); 
                                       foreach ($list_Facilitieshome->result() AS $list_Facilitieshome2){}
                                         if($this->session->userdata('weblang') == 'en'){
                            $topicfunction = $list_Facilitieshome2->topic_en;
                          }else{
                            $topicfunction = $list_Facilitieshome2->topic_th;
                          }
                                            ?>		
							<div style="text-align: left"><i class="<?php echo $list_Facilitieshome2->icon_class?>"></i><?php echo $topicfunction?></div>
                                        <?php }?>

							<p></p>

                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="vc_column_container col-sm-7  margin-xs-50t no-padd">
                

				<div class="project-detail-splitted-info" style="padding-right: 0px;">
                                    <?php $imglist = $this->Project_model->loadImg($data->id);
 foreach ($imglist->result() AS $imglist2){
                          if($this->session->userdata('weblang') == 'en'){
                            $description = $imglist2->description;
                          }else{
                            $description = $imglist2->description_th;
                          }
                                    ?>
								<div class="project-detail-block-outer" style="float: left;">
									<div class="project-detail-block-wrapper">
										<div class="project-detail-block-item" style="max-width: 100% !important">											
                                                                                        <div class="project-detail-block-title"><?php if($description!=''){echo $description;}else{echo $name;}?></div>
											<div class="project-detail-block-descr">
												<p>
													<img src="<?php echo base_url('uploadfile/'.$imglist2->img_name)?>" style="width:100%;cursor:zoom-in" data-toggle="modal" data-target="#img<?php echo $imglist2->id?>">			
													<div class="modal fade" id="img<?php echo $imglist2->id?>">
														<div class="modal-dialog modal-dialog-centered">
														  <div class="modal-content">
															<!-- Modal Header -->
															<div class="modal-header" style="border-bottom: 0px !important">
																<h4 class="modal-title"><?php if($description!=''){echo $description;}else{echo $name;}?></h4>
															  	<button type="button" class="close" data-dismiss="modal" style="margin-top: -24px">&times;</button>
															</div>
															<!-- Modal body -->
															<div class="modal-body">
															  <img src="<?php echo base_url('uploadfile/'.$imglist2->img_name)?>" style="width: 100%">
															</div>

														  </div>
														</div>
													</div>
												</p>
											</div>	
										</div>
									</div>
								</div>
 <?php }?>
				</div>

				
            </div>
			
        </div>
    </div>
	<!-- /House Plan -->	
         <?php }?>
	 <?php if($numlist_nearby>0){?>
	<!-- NEARBY PLACES -->
	<div class="clearfix"></div>
	<div id="nearby_places" style="padding:2em 0;"></div>
	<div class="container-fluid no-padd">
        <img src="<?php echo base_url('HTML/img/location.jpg')?>" alt="background image" class="s-img-switch"/>
        <div  class="row-fluid no-padd">
            <!--<span class="enable_overlay no-padd"></span>-->
            <div class="col-sm-12 no-padd">
                        <div class="container-fluid top-banner no-padd  simple  light no-marg-bottom vindow-height">
                            <div class="content">
                                <div class="prague-svg-animation-text">
                                </div>

                                <div class="subtitle"><?php echo $name?></div>
                                <h2 class="title"><?php echo $this->lang->line('NEARBY_PLACES'); ?></h2>
                            </div>
                            <div class="top-banner-cursor"></div>
                        </div>
            </div>
      
            <div class="container no-padd">
                <?php 
               
                foreach ($list_nearby->result() AS $list_nearby2){
                     if($this->session->userdata('weblang') == 'en'){
                            $place = $list_nearby2->place_eng;
                          }else{
                            $place = $list_nearby2->place_thai;
                          }
                ?>
            <div class="col-sm-6 col-md-3 col-xs-12 ">

                <div class="prague-pricing-wrapper  simple">
                    <div class="prague-pricing-content-wrapper">

                        <div class="prague-pricing-subtitle">
                            <?php echo $this->lang->line('only'); ?></div>

                        <h3 class="prague-pricing-price">
                            <?php echo $list_nearby2->time?> <?php echo $this->lang->line('minutes'); ?> </h3>


                        <div class="prague-pricing-description">
                            <p><?php echo $place?></p>
                        </div>

                        <a class="prague-pricing-link a-btn-2 creative" href="contact-us.html"
                            target=" _blank">
                            <span class="a-btn-line"></span>
                            5.2 <?php echo $this->lang->line('km'); ?> </a>
                    </div>
                </div>

            </div>
                <?php }?>
            </div>
        </div>
    </div>
	<!-- /NEARBY PLACES-->
         <?php }?>
	
    <!--MAP LOCATION OF THE PROJECT -->
	<div class="clearfix"></div>
	<div id="location" style="padding:3em 0;"></div>
  	<div class="container no-padd">
        <div class="row-fluid  margin-lg-15t margin-sm-20t">
            <div class="col-sm-12 no-padd">
                <div class="heading left dark" style="padding: 25px 0 30px 0 !important">
                    <div class="subtitle "><?php echo $name?></div>
                    <h2 class="title"> <?php echo $this->lang->line('LOCATION'); ?></h2>
                </div>
            </div>
        </div>
    </div>
	
    <div class="container-fluid no-padd">
        <div data-vc-full-width='true' data-vc-full-width-init="true" data-vc-stretch-content="true"
            class="contact_map row-fluid no-padd no-padd" style="position:relative; box-sizing: border-box;">
            <div class="col-sm-12 no-padd">                
                <iframe src="<?php echo $data->map?>" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
    <!--/MAP LOCATION OF THE PROJECT-->
	
	 <?php if($numgalleryimg>0){?>
	<!-- Gallery -->
	<div class="clearfix"></div>
	<div id="gallery" style="padding:3em 0;"></div>
    <div class="container no-padd">
        <div class="row-fluid  margin-lg-15t margin-sm-20t">
            <div class="col-sm-12 no-padd">
                <div class="heading left dark" style="padding: 25px 0 30px 0 !important">
                    <div class="subtitle "><?php echo $name?></div>
                    <h2 class="title"><?php echo $this->lang->line('GALLERY'); ?></h2>
                </div>
            </div>
        </div>
    </div>

	<div class="container-fluid no-padd margin-lg-10t  margin-lg-120b margin-sm-80b margin-xs-50b">
        <div class="row-fluid no-padd">
            <div class="col-sm-12 no-padd">

                <div class="banner-slider-wrap andra ">
                    <div class="swiper-container swiper  " data-mouse="0" data-autoplay="0" data-loop="1" data-speed="500"
                        data-center="1" data-space-between="30" data-pagination-type="fraction" data-mode="horizontal">
                        <div class="swiper-wrapper">
                            <?php 
                            
                            foreach ($galleryimg->result() AS $galleryimg2){
                            ?>
                            <div class="swiper-slide swiper-no-swiping full-height-window-hard">
                                <?php if($galleryimg2->typefile=='2'){?>
								<?php echo $galleryimg2->file_name?>
                                <?php }else{?>
                                   <img src="<?php echo base_url('uploadfile/'.$galleryimg2->file_name)?>" class="s-img-switch" alt="banner image">                             
                                <?php }?>
                            </div>
                            <?php }?>

                        </div>
                        <div class="pag-wrapper">
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

	<!-- /Gallery -->
         <?php }?>

	<!--/MAIN BODY-->
	
	<!--START FOOTER-->
	<?php include("footer.php"); ?>
	<!--/END FOOTER-->

    <script src="<?php echo base_url('HTML/js/jquery.js')?>"></script>
	<script src="<?php echo base_url('HTML/js/jquery-ui.js')?>"></script>
	<script src="<?php echo base_url('HTML/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('HTML/js/hammer.min.js')?>"></script>
    <script src="<?php echo base_url('HTML/js/foxlazy.min.js')?>"></script>
    <script src="<?php echo base_url('HTML/js/all.js?v=8')?>"></script>
    <script src="<?php echo base_url('HTML/js/split-slider.js')?>"></script>
    <script src="<?php echo base_url('HTML/js/kenburn.js')?>"></script>
    <script src="<?php echo base_url('HTML/js/jquery.multiscroll.js')?>"></script>
    <script src="<?php echo base_url('HTML/js/countTo.js')?>"></script>
    <script src="<?php echo base_url('HTML/js/skills.js')?>"></script>
	<script src="<?php echo base_url('HTML/js/banner_slider.js')?>"></script>
	<script src="<?php echo base_url('HTML/js/revolution-slider.js')?>"></script>
	<script src="<?php echo base_url('HTML/js/jquery.magnific-popup.min.js')?>"></script>
    <script src="<?php echo base_url('HTML/js/vivus.min.js')?>"></script>
    <script src="<?php echo base_url('HTML/js/isotope.pkgd.min.js')?>"></script>
    <script src="<?php echo base_url('HTML/js/swiper.min.js')?>"></script>
    
	<script>
		 function Goto(eleName){
		  $('html, body').animate({
		   scrollTop: ($('#'+eleName).offset().top)
		  },800)
		 }
	</script>
	
</body>

</html>