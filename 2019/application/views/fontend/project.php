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
<?php foreach($maincate11->result() AS $data){}
if($this->session->userdata('weblang') == 'en'){
                            $maincategory = $data->cate_name_en;
                          }else{
                            $maincategory = $data->cate_name_th;  
                          }   

?>
	<!--MAIN BODY-->
	<div class="container-fluid top-banner no-padd big light vindow-height">
        <span class="overlay"></span>

        <img src="<?php echo base_url('HTML/img/h_project3.jpg')?>" class="s-img-switch" alt="main banner" />
        <div class="content">
            <div class="subtitle"><?php echo $this->lang->line('Project'); ?></div>
            <h2 class="title"><?php echo $maincategory?> | <?php echo $this->lang->line('GRANDIOSE'); ?></h2>
        </div>
    </div>

	 <div class="container-fluid top-banner no-padd simple dark vindow-height no-padd">
            <div class="content">

                <div class="subtitle">
                    <?php echo $maincategory?> </div>

                <h1 class="title"><?php echo $this->lang->line('GRANDIOSE'); ?></h1>
                <div class="description">
                    <p><?php echo $this->lang->line('architecture'); ?></p>
                </div>

           </div>
    </div>
	
    <div class="container padd-only-xs margin-xs-10t">
        <div class="row -fluid no-padd">
            <div class="col-md-12 js-load-more margin-lg-40t margin-sm-30t margin-lg-20b margin-sm-20b"
                data-unique-key="blog-posts" data-start-page="1" data-max-page="2" data-next-link="blog-page-2.html">
                <div class="row prague-blog-grif-outer js-load-more-block">
                    
                    <?php  $n='A';
                    $list_cateDatasub = $this->Project_model->list_cateDatamain($data->id);
                     $numcatesub = $list_cateDatasub->num_rows();
        if($numcatesub > 0){
            foreach($list_cateDatasub->result() AS $datasub){
                             if($this->session->userdata('weblang') == 'en'){
                            $subcate = $datasub->cate_name_en;
                          }else{
                            $subcate = $datasub->cate_name_th;  
                          }
        $list_projectbycate = $this->Project_model->list_projectbycate($datasub->id);
        $numproject = $list_projectbycate->num_rows();
        if($numproject>0){
        foreach($list_projectbycate->result() AS $projectbycate){}
        $list_gallerylimit = $this->Project_model->list_gallerylimit($projectbycate->id);
        foreach($list_gallerylimit->result() AS $gallerylimit){}
         if($this->session->userdata('weblang') == 'en'){
                            $concept = $projectbycate->project_concept_en;
                          }else{
                            $concept = $projectbycate->project_concept_th;  
                          }
        
                    ?>
                    
                    <div class="post-1443 post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized blog-post col-sm-4 col-xs-12 js-filter-simple-block">
                        <div class="prague-blog-grid-wrapper">


                            <div class="blog-grid-img">
                                <img src="<?php echo base_url('uploadfile/'.$gallerylimit->file_name)?>" class="s-img-switch" alt="construction image" />
                            </div>

                            <div class="blog-grid-content">
                                <div class="blog-grid-post-date">
                                   TYPE <?php echo $n?>
                                </div>

                                <h3 class="blog-grid-post-title"><a href="#"><?php echo $subcate?></a></h3>
                                <div class="blog-grid-post-excerpt">
                                   
                                    <p><?php echo substr_replace($concept,'....',100)?></p>
                                  
                                </div>
                                <a href="<?php echo base_url('Project/index/'.$projectbycate->id)?>" class="blog-grid-link a-btn-arrow-2">
                                    <span class="arrow-right"></span>
                                     <?php echo $this->lang->line('Read_more'); ?> </a>

                            </div>
                        </div>
                    </div>
                      <?php }?>
        <?php $n++;}}?>
                    
                </div>
				
               <!-- <div class="prague-pager">
                    <span class='page-numbers current'>1</span>
                    <a class='page-numbers' href='blog-page-2.html'>2</a>
                    <a class="next page-numbers" href="blog-page-2.html">NEXT PAGE</a> 
				</div>-->


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
	
	
    <script src="<?php echo base_url('HTML/js/vivus.min.js')?>"></script>
    <script src="<?php echo base_url('HTML/js/isotope.pkgd.min.js')?>"></script>
   
</body>

</html>