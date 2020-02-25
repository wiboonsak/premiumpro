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
	
	<script src="<?php echo base_url('HTML/font-awesome/fontawesome.js')?>" crossorigin="anonymous"></script>
	

</head>

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
	<!--/HEADER-->
<div >
    <!--MAIN BODY-->
    <div class="container-fluid no-padd">
        <div class="row-fluid no-padd">
            <div class="col-sm-12 no-padd">
                <div class="container-fluid top-banner no-padd  big  light no-marg-bottom vindow-height">
                    <span class="overlay"></span> <img src="<?php echo base_url('HTML/img/bg-career-2.jpg')?>" class="s-img-switch"
                        alt="banner image">
                    <div class="content">
                        <div class="prague-svg-animation-text">
                        </div>

                        <div class="subtitle" style="color: #eba476"> <?php echo $this->lang->line('Premium_Property'); ?></div>
                        <h1 class="title" style="color: #eba476"><?php echo $this->lang->line('weare'); ?></h1>
                    </div>
                    <div class="top-banner-cursor"></div>
                </div>
            </div>
        </div>
    </div>



    <div class="container no-padd  margin-lg-0t margin-sm-20t">
        <div class="row-fluid ">
            <div class="col-sm-12 padd-only-xs">
                <div class="column-inner ">
                    <div class="heading  left dark">
                        <div class="subtitle"><?php echo $this->lang->line('Premium_Property'); ?></div>
                        <h2 class="title"><?php echo $this->lang->line('JOB_OPENING'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container no-padd">
        <div class="row-fluid">
            <div class="vc_column_container col-sm-12 col-md-12 no-padd">
                <div class="no-padd-left no-padd-right">
                    <div class="awards-list ">
                        <?php 
                        foreach ($list_career->result() AS $career){
                             if($this->session->userdata('weblang') == 'en'){
                                             $career_name = $career->career_name;
                                             $category_name = $career->category_name;
                                             $property = $career->property;
                                             $Job_duty = $career->Job_duty;
                                             $location = $career->location;
                                             $quantity = $career->quantity;
                                             $dateadd = $this->Project_model->GetthaiDateTimeeng($career->date_add);
                                         }else{
                                             $career_name = $career->career_nameth;
                                             $category_name = $career->category_nameth;
                                             $property = $career->property_thai;
                                             $Job_duty = $career->Job_duty_th;
                                             $location = $career->location;
                                             $quantity = $career->quantity;
                                             $dateadd = $this->Project_model->GetthaiDateTime($career->date_add);
                                         }
                        
                        ?>
                        <div class="awards-item">
                            <div class="awards-date"><?php echo $dateadd?></div>

                            <span class="awards-separator"></span>


                            <div class="awards-info ">
                                <a class="awards-title-link" href="#" data-toggle="modal" data-target="#JobDetail<?php echo $career->id?>">
                                    <h4 class="awards-title" style="color:#9e6522"><?php echo $career_name?></h4>
                                </a>

                                <div class="awards-subtitle"><?php echo $this->lang->line('Category')?>: <?php echo $category_name?></div>
								<div class="awards-subtitle"><?php echo $this->lang->line('LOCAcareer')?>: <?php echo $location?></div>
								<div class="awards-subtitle">  									
                                                                    <a class="a-btn-2 creative" href="<?php echo base_url('Career/form_career/'.$career->id);?>">
										<span class="a-btn-line"></span>
									    <?php echo $this->lang->line('Apply')?></a>
								</div>
                            </div>
							
							<!-- Modal - Job Details -->
							  <div class="modal fade" id="JobDetail<?php echo $career->id?>">
								<div class="modal-dialog modal-xl">
								  <div class="modal-content">

									<!-- Modal Header -->
									<div class="modal-header">
									  <h4 class="modal-title"><?php echo $this->lang->line('position')?> : <?php echo $career_name?></h4>
									  <button type="button" class="close" data-dismiss="modal" style="margin-top: -25px;">&times;</button>
									</div>

									<!-- Modal body -->
									<div class="modal-body">
									  <div class="row">
										  <div class="col-md-3">
											  <h5><?php echo $this->lang->line('property')?></h5>
										  </div>
										  <div class="col-md-9">										
									<?php echo $property?>
										  </div>
									  </div>  
										
									  <hr style="border-top:2px solid #bbae98; padding: 5px 0px;">
									  <div class="row">	  										  
										  <div class="col-md-3">
											  <h5><?php echo $this->lang->line('Job_duty')?></h5>
										  </div>
										  <div class="col-md-9">									<?php echo $Job_duty?>
										  </div>
									  </div>	  
										  
									  <hr style="border-top:2px solid #bbae98; padding: 5px 0px;">
									  <div class="row">	 
										  <div class="col-md-3">
											  <h5><?php echo $this->lang->line('LOCAcareer')?></h5>
										  </div>
										  <div class="col-md-9">										
									<?php echo $location?>
										  </div>
									  </div>	
										
									  <hr style="border-top:2px solid #bbae98; padding: 5px 0px;">
									  <div class="row">	
										  <div class="col-md-3">
											  <h5><?php echo $this->lang->line('quantity')?></h5>
										  </div>
										  <div class="col-md-9">										
											 <?php echo $quantity?> <?php echo $this->lang->line('quantity')?>
										  </div>
									  </div>
										
										
									</div>

									<!-- Modal footer -->
									<div class="modal-footer">
									  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</div>

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
</body>

</html>