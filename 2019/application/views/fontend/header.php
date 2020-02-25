<!--------- code slide to top -------->	
<?php 
$this->lang->load('content', $this->session->userdata('weblang'));
$main_cate = 0;
        $list_cateDatamain = $this->Project_model->list_cateDatamain($main_cate);
?>
<style>
		div#page {
			max-width: 900px;
			margin-left: auto;
			margin-right: auto;
			padding: 2px;
		}
		
		.back-to-top {
			position: fixed;
			bottom: 0em;
			right: 0px;
			text-decoration: none;
			color: #000000;
/*			background-color: rgba(235, 235, 235, 0.80);
*/			font-size: 12px;
			padding: 0em;
			display: none;
		}

		.back-to-top:hover {	
/*			background-color: rgba(135, 135, 135, 0.50);
*/		}	
</style>
<script src="<?php echo base_url('HTML/js/jquery.min.js')?>"></script>
<script src="<?php echo base_url('HTML/Scripts/AC_RunActiveContent.js')?>" type="text/javascript"></script>
<!--------- //code slide to top -------->


<!--HEADER-->
	<header class="prague-header simple sticky-menu sticky-mobile-menu dark" style="background-color: #c2c4b6;">
		<!--LOGO-->
		<div class="prague-logo">
                    <a href="<?php echo base_url('Welcome')?>">
				<img src="<?php echo base_url('HTML/img/LOGO_HATYAI_PREMIUM_PROPERTY.png')?>" class="image_logo" alt="logo" /></a>
		</div>
		<!--/LOGO-->

		<div class="prague-header-wrapper">

			<!--NAVIGATION-->
			<div class="prague-navigation">
				<div class="pargue-navigation-wrapper">
					<div class="prague-navigation-inner">
						<nav>
							<ul class="main-menu">								
                                                                <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent"><a href="#"><?php echo $this->lang->line('About'); ?></a>
									<ul class="sub-menu">
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a href="<?php echo base_url('Welcome/premium_brand')?>"><?php echo $this->lang->line('Premium_Property'); ?></a></li>
										<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo base_url('Welcome/corporate_award')?>"><?php echo $this->lang->line('Corporate'); ?></a></li>
										<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo base_url('Welcome/subsidiaries')?>"><?php echo $this->lang->line('Subsidiaries'); ?></a></li>					
									</ul>
								</li>
								
								<li class="menu-item menu-item-type-custom menu-item-object-custom curemenu-item-has-children"><a href="#"><?php echo $this->lang->line('Project'); ?></a>
									<ul class="sub-menu">
                                                                            <?php foreach($list_cateDatamain->result() AS $data){
                          if($this->session->userdata('weblang') == 'en'){
                            $maincate = $data->cate_name_en;
                          }else{
                            $maincate = $data->cate_name_th;  
                          }                                                  
                                                                                ?>	
                                                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a href="<?php echo base_url('Project/index/'.$data->id)?>"><?php echo $maincate?></a>
                                                                                 <?php 
                                $list_cateDatasub = $this->Project_model->list_cateDatamain($data->id);
                                $numcatesub = $list_cateDatasub->num_rows();
        if($numcatesub > 0){
                                  
                                ?>
											<ul class="sub-menu">
                         <?php  foreach($list_cateDatasub->result() AS $datasub){
                             if($this->session->userdata('weblang') == 'en'){
                            $subcate = $datasub->cate_name_en;
                          }else{
                            $subcate = $datasub->cate_name_th;  
                          }
        $list_projectbycate = $this->Project_model->list_projectbycate($datasub->id);
        $numproject = $list_projectbycate->num_rows();
        if($numproject>0){
            foreach($list_projectbycate->result() AS $projectbycate){}
                             ?>
												<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo base_url('Project/project_detail/'.$projectbycate->id)?>"><?php echo $subcate?></a></li>
                         <?php }}?>
											</ul>
                          <?php }?>
										</li>
				 <?php  }?>
									</ul>
								</li>
								<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a href="#"><?php echo $this->lang->line('Services'); ?></a>
									<ul class="sub-menu">
										<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo base_url('Welcome/homecare')?>"><?php echo $this->lang->line('Home_Care'); ?></a></li>
										<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo base_url('Welcome/innovation')?>"><?php echo $this->lang->line('Premium_Innovation'); ?></a></li>
										<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo base_url('Welcome/smart_command')?>"><?php echo $this->lang->line('Smart_command'); ?></a></li>
										<!--<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="security_system.php">SECURITY SYSTEM</a></li>-->	
									</ul>
								</li>								
								
                                                                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo base_url('News')?>"><?php echo $this->lang->line('News'); ?></a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo base_url('Career')?>"><?php echo $this->lang->line('Career'); ?></a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo base_url('Contact')?>"><?php echo $this->lang->line('ContactUs'); ?></a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<!--/NAVIGATION-->
			
			<!-- mobile icon -->
			<div class="prague-nav-menu-icon">
				<a href="#">
					<i></i>
				</a>
			</div>
			<!-- /mobile icon -->

			<!--SOCIAL-->
			<div class="prague-social-nav" style="width: 90px !important;">
                            <div class="col-md-6" ><a href="<?php echo base_url('switchLang/index/en')?>" <?php if($this->session->userdata('weblang') == 'en'){?> style="float: left; margin-right: 5px; background-color: #817465; color: #FFFFFF; cursor: none;"<?php }?>> 
					ENG
				</a>
                                </div>
                                     <div class="col-md-6">
                                <a href="<?php echo base_url('switchLang/index/th')?>" <?php if($this->session->userdata('weblang') == 'th'){?>style="float: left; margin-right: 5px; background-color: #817465; color: #FFFFFF; cursor: none;"<?php }?>>
					ไทย
				</a>
                                         </div>

			</div>
			<!--/SOCIAL-->

		</div>
	</header>
	<!--END HEADER-->
	
	
	<div class="paralax-text-share-icons">
         <div class="prague-share-icons">    
             <a href="https://www.facebook.com/HatyaiPremiumProperty/" target="_blank"><button class="icon"><i class="fab fa-facebook-f"></i></button></a>    
             <a href="https://www.facebook.com/HatyaiPremiumProperty/" target="_blank"><button class="icon"><i class="fab fa-twitter"></i></button></a>    
             <a href="https://www.facebook.com/HatyaiPremiumProperty/" target="_blank"><button class="icon"><i class="fab fa-youtube"></i></button></a>  
         </div>    
    </div>