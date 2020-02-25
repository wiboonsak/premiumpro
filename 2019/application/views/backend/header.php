<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>HATYAI PREMIUM PROPERTY หาดใหญ่ พรีเมียม พร๊อพเพอร์ตี้ ใกล้สนามบินหาดใหญ่ ใส่ใจทุกรายละเอียดของการสร้าง</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
       

        <!-- App css -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url('HTML/css/magnific-popup.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('HTML/font-awesome/css/font-awesome.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('HTML/css/et-line-font.css')?>">
         <link href="<?php echo base_url('assets/plugins/sweet-alert/sweetalert2.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/switchery/switchery.min.css')?>" rel="stylesheet" />
         <!-- Custom box css -->
       
        <link href="<?php echo base_url('assets/plugins/summernote/summernote-bs4.css') ?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/css/icons.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet" type="text/css" />
       <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url('assets/js/modernizr.min.js')?>"></script>
        <script src="<?php echo base_url('HTML/font-awesome/fontawesome.js')?>" crossorigin="anonymous"></script>
	
	<!--FLAT ICON-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('HTML/font/flaticon.css')?>">
    </head>

    <body>
        <header id="topnav">
            <div class="topbar-main" style="background-color: #26AB93">
                <div class="container-fluid">

                    <!-- Logo container-->
                    <div class="logo">
                       
                        <a href="<?php echo base_url('control')?>" class="logo">
                            <img src="<?php echo base_url('HTML/img/LOGO_HATYAI_PREMIUM_PROPERTY.png')?>" alt="" height="26" class="logo-small">
                            <img src="<?php echo base_url('HTML/img/LOGO_HATYAI_PREMIUM_PROPERTY.png')?>" alt="" height="40" class="logo-large">
                        </a>

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">

                        <ul class="list-unstyled topbar-right-menu float-right mb-0">
                            
                            <?php 
                            $userID = $this->session->userdata('user_id'); 
                            $username = $this->session->userdata('name'); 
                            $user_type = $this->session->userdata('user_type'); 
                             ?>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="<?php echo base_url('assets/images/avatar-1.jpg')?>" alt="user" class="rounded-circle"> <span class="ml-1 pro-user-name"><?php echo $username?> <i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
      <div class="dropdown-item noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="<?php echo base_url('Control/admin_add/'.$userID.'/1')?>"  class="dropdown-item notify-item">
                                        <i class="fi-head"></i> <span>Change Password</span>
                                    </a>
                                    <!-- item-->
                                    <a href="<?php echo base_url('logout')?>" class="dropdown-item notify-item">
                                      <span class="text-danger"><i class="fi-power"></i> <span>Logout</span></span>
                                    </a>

                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <div class="navbar-custom" style="background-color: #dbdbdb;">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
 <?php   $getMenuCate = $this->User_model->getMenuList('1','0');
		 						   foreach($getMenuCate->result() AS $MenuCate){ 
							?>
                            <li class="has-submenu" >
                                <a href="#"><i class="icon-layers"></i><?php echo $MenuCate->menu_name?></a>
                                <ul class="submenu">
                                    <?php   $getMenuSub = $this->User_model->getMenuList('2',$MenuCate->id);
		 							foreach($getMenuSub->result() AS $MenuSub){ 
										//if($MenuSub->menu_url!=''){ 
							    ?>   
                                   
                                    <li><a href="<?php echo base_url($MenuSub->menu_url)?>"><?php echo $MenuSub->menu_name?></a></li>
                                    <?php } ?>
                                    

                                </ul>
                            </li>
                              <?php } ?>  
                            
                           
                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        
        
        
        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo container-->
                    <div class="logo">
                        <!-- Text Logo -->
                        <!-- <a href="<?php echo base_url()?>" class="logo">
                            <span class="logo-small"><i class="mdi mdi-radar"></i></span>
                            <span class="logo-large"><i class="mdi mdi-radar"></i> Highdmin</span>
                        </a> -->
                        <!-- Image Logo -->
                        <a href="<?php echo base_url('control')?>" class="logo">
                            <img src="<?php echo base_url('HTML/img/LOGO_HATYAI_PREMIUM_PROPERTY.png')?>" alt="" height="26" class="logo-small">
                            <img src="<?php echo base_url('HTML/img/LOGO_HATYAI_PREMIUM_PROPERTY.png')?>" alt="" height="40" class="logo-large">
                        </a>

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">

                        <ul class="list-unstyled topbar-right-menu float-right mb-0">

                            <li class="menu-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>
                            

                            

                            <?php 
                            $userID = $this->session->userdata('user_id'); 
                            $username = $this->session->userdata('name'); 
                            $user_type = $this->session->userdata('user_type'); 
                             ?>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="<?php echo base_url('assets/images/avatar-1.jpg')?>" alt="user" class="rounded-circle"> <span class="ml-1 pro-user-name"><?php echo $username?> <i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
      <div class="dropdown-item noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="<?php echo base_url('Control/admin_add/'.$userID.'/1')?>"  class="dropdown-item notify-item">
                                        <i class="fi-head"></i> <span>Change Password</span>
                                    </a>
                                    <!-- item-->
                                    <a href="<?php echo base_url('logout')?>" class="dropdown-item notify-item">
                                      <span class="text-danger"><i class="fi-power"></i> <span>Logout</span></span>
                                    </a>

                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <div class="navbar-custom" style="background-color: #696969;">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                              <?php   $getMenuCate = $this->User_model->getMenuList('1','0');
		 						   foreach($getMenuCate->result() AS $MenuCate){ 
							?>
                            <li class="has-submenu" >
                                <a href="#"><i class="icon-layers"></i><?php echo $MenuCate->menu_name?></a>
                                <ul class="submenu">
                                    <?php   $getMenuSub = $this->User_model->getMenuList('2',$MenuCate->id);
		 							foreach($getMenuSub->result() AS $MenuSub){ 
										//if($MenuSub->menu_url!=''){ 
							    ?>   
                                   
                                    <li><a href="<?php echo base_url($MenuSub->menu_url)?>"><?php echo $MenuSub->menu_name?></a></li>
                                    <?php } ?>
                                    

                                </ul>
                            </li>
                              <?php } ?>  
                            

                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->
