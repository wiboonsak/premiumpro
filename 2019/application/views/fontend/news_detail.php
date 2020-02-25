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
    <div class="top-banner big light vindow-height">
        <span class="overlay"></span>
        <img src="<?php echo base_url('HTML/img/bg-title.jpg')?>" class="s-img-switch" alt="banner image" />
        <div class="content">
            <div class="subtitle"><?php echo $this->lang->line('Premium_Property'); ?></div>
            <h1 class="title"><?php echo $this->lang->line('News'); ?></h1>
        </div>
    </div>

    <div class="container padd-only-xs margin-xs-20t margin-md-0t">
        <div class="row">
            <div class="col-xs-12 padd-only-xs">
                <!-- Post content -->
                <?php 
                foreach ($list_News->result() AS $News){}
                                         if($this->session->userdata('weblang') == 'en'){
                                             $topic = $News->topic_en;
                                             $detail = $News->detail_en;
                                             $detail2 = $News->detail2_en;
                                             
                                         }else{
                                             $topic = $News->topic_th;
                                             $detail = $News->detail_th;
                                             $detail2 = $News->detail2_th;
                                            
                                         }
                                        
                ?>
                <div class="services-detailed">

                    <div class="post-content">
                        <h3><?php echo $topic?></h3>
                        <?php echo $detail?>
                        <div id='gallery-1' class='gallery galleryid-915 gallery-columns-2 gallery-size-full flex'>
                            <?php  $newsimg = $this->Project_model->newsimg($News->id);
                            $numimg = $newsimg->num_rows();
                            if($numimg>0){
                                         foreach ($newsimg->result() AS $newsimg2){?>
                            <figure class='gallery-item'>
                                <div class='gallery-icon landscape'>
                                    <img  src="#" data-lazy-src="<?php echo base_url('uploadfile/news/'.$newsimg2->img_name)?>" class="attachment-full size-full"
                                        alt="planning image" />
                                </div>
                            </figure>
                            <?php }}?>
                        </div>

                        <?php echo $detail2?>
						
                       
                    </div>

                    <a class="a-btn-2 creative" href="<?php echo base_url('News');?>">
                        <span class="a-btn-line"></span>
                       <?php echo $this->lang->line('allNews');?> </a>
                </div>
                <!-- End post content -->
            </div>
        </div>
    </div>
    <!--/MAIN BODY-->

	
	
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