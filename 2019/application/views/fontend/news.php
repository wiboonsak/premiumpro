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
<style>
    
    .isDisabled {
  pointer-events: none;
  cursor: not-allowed !important;
  opacity: 0.5;
  text-decoration: none;
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
	<!--/HEADER-->

	<!--MAIN BODY-->
    <div class="container-fluid top-banner no-padd big light vindow-height">
        <span class="overlay"></span>

        <img src="<?php echo base_url('HTML/img/bg-title.jpg')?>" class="s-img-switch" alt="main banner" />
        <div class="content">
            <div class="subtitle"> <?php echo $this->lang->line('Premium_Property'); ?></div>
            <h1 class="title"><?php echo $this->lang->line('News'); ?></h1>
        </div>
    </div>

    <div class="container padd-only-xs margin-xs-10t">
        <div class="row -fluid no-padd">
            <div class="col-md-12 js-load-more margin-lg-140t margin-sm-100t margin-lg-90b margin-sm-50b"
                data-unique-key="blog-posts" data-start-page="1" data-max-page="2" data-next-link="blog-page-2.html">
                <div class="row prague-blog-grif-outer js-load-more-block">
                    <?php  $topic = ''; $detail = '';
                    $limit =''; $notUse ='';                            
                    $countAll=$this->Project_model->getNewsDetail($limit,$notUse,'-100','-100');

                    $countRow = $countAll->num_rows(); 
                    $totalRow = ceil($countRow/$perpage);
                                   foreach ($list_News->result() AS $Newslimit){
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
                    <div class="post-1443 post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized blog-post col-sm-6 col-xs-12 js-filter-simple-block">

                        <div class="prague-blog-grid-wrapper">


                            <div class="blog-grid-img">
                                <img src="<?php echo base_url('uploadfile/news/'.$newsimg2->img_name)?>" class="s-img-switch" alt="construction image" />
                            </div>

                            <div class="blog-grid-content">
                                <div class="blog-grid-post-date">
                                   <?php echo $dateadd?>
                                </div>

                                <h3 class="blog-grid-post-title"><a href="<?php echo base_url('News/news_detail/'.$Newslimit->id);?>"><?php echo $topic?></a></h3>
                                <div class="blog-grid-post-excerpt">
                                    <p><?php echo substr_replace($detail,'....',250)?></p>
                                </div>

                                <a href="<?php echo base_url('News/news_detail/'.$Newslimit->id);?>" class="blog-grid-link a-btn-arrow-2">
                                    <span class="arrow-right"></span>
                                    <?php echo $this->lang->line('Read_more'); ?> </a>

                            </div>
                        </div>
                    </div>
                                   <?php }?>

                </div>
                <div class="prague-pager">
                     <?php 
                                                    $page2 =$page-1; 
                                                    $page3 =$page+1; 
                                                    
                                                    ?>
                    <a class="prev page-numbers <?php if($page == 1){?>isDisabled<?php }?>" href="<?php echo base_url('News/Page/').$page2?>"><?php echo $this->lang->line('PREV_PAGE'); ?></a>
                      <?php for($i=1;$i<=$totalRow;$i++){ ?>     
                    <a class='page-numbers <?php if($page == $i){ echo 'current'; }?>' href='<?php echo base_url('News/Page/').$i?>'><?php echo $i?></a>
                    <?php }?> 
                    <a class="next page-numbers <?php if($totalRow == 1){?>isDisabled<?php }?>" href="<?php echo base_url('News/Page/').$page3?>"><?php echo $this->lang->line('next_PAGE'); ?></a> </div>


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