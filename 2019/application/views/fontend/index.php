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

	<!--MAIN BODY-->
	
	<div class="container-fluid no-padd">
			<div class="row-fluid no-padd">
				<div class="col-sm-12 no-padd">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
							  
								<!-- Wrapper for slides -->
								<div class="carousel-inner">
                                   <?php $n = 1; $title1 = ''; $title2 = '';
                                   $numimg = $imglist->num_rows();
                                   foreach ($imglist->result() AS $imglist){
                                         if($this->session->userdata('weblang') == 'en'){
                                             $title1 = $imglist->title1;
                                             $title2 = $imglist->title2;
                                         }else{
                                             $title1 = $imglist->title1th;
                                             $title2 = $imglist->title2th;
                                         }
                                   ?>
                                                                  <div class="item  slider-img overlay element<?php echo $n?> <?php if($n==1){?> active<?php }?>">
								<!--You need to add new element(numerical number) class in case you want to incrase slider number, simply copy all the code and do the same with js-->		  
									<img src="<?php echo base_url('uploadfile/slide/'.$imglist->img_name)?>" alt="slider image" class="s-img-switch" />	
									
									<div class="carousel-caption d-none d-md-block overlay">
											<div class="subtitle location show"><?php echo $title1?></div>
											<h1 class="title slideTitle"><?php echo $title2?></h1>
                                                                                        <a href="<?php echo $imglist->explore_it?>" class="a-btn creative show2 border-only" target=" _blank">
												<span class=""></span><?php echo $this->lang->line('EXPLORE');?>											</a>
									</div>
								  </div>
                                   <?php $n++;}?>
								</div>
							  
								<!-- Left and right controls -->
								<a class="left carousel-control" href="#myCarousel" data-slide="prev">
								  <span class="glyphicon glyphicon-chevron-left"></span>
								  <div class="numberz"><span class="changed1">.</span><span class="length">/ <?php echo $numimg?></span></div>
								  <span class="sr-only"><?php echo $numimg?>/<?php echo $numimg?></span>
								</a>
								<a class="right carousel-control" href="#myCarousel" data-slide="next">
								  <span class="glyphicon glyphicon-chevron-right"></span>
								  <div class="numberz number-2"><span class="changed2">.</span><span class="length">/ <?php echo $numimg?></span></div>
								  <span class="sr-only">2/<?php echo $numimg?></span>
								</a>
							  </div>
				</div>
			</div>
		</div>
	
	
    <div class="container no-padd">
    <div class="row-fluid  margin-lg-40t margin-sm-40t">
        <div class="col-sm-8 col-lg-offset-0 no-padd col-lg-4 col-md-offset-0 col-md-5 col-sm-offset-2 col-xs-12  margin-lg-65t margin-sm-0t">
            <div class="vc_column-inner margin-minus-left">
                    <div class="prague-counter  alone_item no-figure">

                        <div class="figures ">
                            <!-- triangle -->
                        </div>

                        <div class="counter-outer" style="padding:15px;">

                            <img src="#" data-lazy-src="<?php echo base_url('HTML/img/slider/7.jpg')?>" alt="experience image"
                                class="prague-counter-img s-img-switch">

                            <div class="numbers">
                                <svg>
                                    <defs>
                                        <mask id="coming_mask_0" x="0" y="0">
                                            <rect class="coming-alpha" x="0" y="0" width="100%" height="100%"></rect>
                                            <text class="count number" x="50%" y="45%" text-anchor="middle"
                                                alignment-baseline="middle">19</text>
                                            <text class="count title" x="50%" y="70%" text-anchor="middle"
                                                alignment-baseline="middle"><?php echo $this->lang->line('YEARS');?></text>
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

                        <div class="subtitle "><strong><?php echo $this->lang->line('STORY');?></strong></div>
                        <h2 class="title"><?php echo $this->lang->line('CONSTRUCTING');?></h2>
                        <div class="content ">
                            <p><?php echo $this->lang->line('With_over');?></p>
                            
							<p><?php echo $this->lang->line('OurPlus');?></p>
							<p><?php echo $this->lang->line('Ourjourney');?></p>
                        </div>
                    </div>
        </div>
    </div>
</div>

	
    <div class="margin-lg-20t margin-sm-30t" style="background-color: #e8e0d5;">  
        <div class="container">
            <div class="row">

                <div class="column colum-container col-sm-12 no-padd margin-lg-20b">
                    <div class="heading  left dark">

                        <div class="subtitle "> <?php echo $this->lang->line('Premium_Property'); ?></div>
                        <h2 class="title"><?php echo $this->lang->line('News'); ?></h2>
                    </div>
                </div>

                <div class="no-padd-left no-padd-right margin-lg-20t">
                    <div class="wrapper">
                        <div data-unique-key="139714cb2b9c35c987d2544328454258" class="js-load-more" data-start-page="1"
                            data-max-page="5" data-next-link="http://prague.loc/page/2/">
                            <div class="row prague_list prague_count_col1 prague_gap_col10  no-footer-content no-figure prague-load-wrapper"
                                data-columns="prague_count_col1" data-gap="prague_gap_col10">
                                
                                  <?php  $topic = ''; $detail = '';
                                   foreach ($list_Newslimit->result() AS $Newslimit){
                                         if($this->session->userdata('weblang') == 'en'){
                                             $topic = $Newslimit->topic_en;
                                             $detail = $Newslimit->detail_en;
                                             $dateadd = $this->Project_model->GetthaiDateTimeeng($Newslimit->date_add);
                                         }else{
                                             $topic = $Newslimit->topic_th;
                                             $detail = $Newslimit->detail_th;
                                             $dateadd = $this->Project_model->GetthaiDateTime($Newslimit->date_add);
                                         }
                                         $newsimg = $this->Project_model->newsimglimit($Newslimit->id);
                                         foreach ($newsimg->result() AS $newsimg2){}
                                   ?>
                                <div class="project-list-item">
                                    <div class="project-list-outer">

                                        <div class="project-list-wrapper">

                                            <div class="project-list-img">
                                                <img src="#" data-lazy-src="<?php echo base_url('uploadfile/news/'.$newsimg2->img_name)?>" class="s-img-switch"
                                                    alt="seascape-villa image" />
                                            </div>

                                            <div class="project-list-content">

                                                <div class="project-list-category"><?php echo $dateadd?></div>
                                                <h3 class="project-list-title"><a href="#" target="_self"><?php echo $topic?></a></h3>
                                                <div class="project-list-excerpt">
                                                    <p><?php echo substr_replace($detail,'....',300)?></p>
                                                </div>
                                                <a href="#" class="project-list-link a-btn-arrow-2"
                                                    target="_self">
                                                    <span class="arrow-right"></span>
                                                    <?php echo $this->lang->line('Read_more'); ?></a>
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