<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>ระบบเช่าเครืองมือก่อสร้าง</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

     <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

		 <!-- Plugins css-->
        <link href="assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="assets/plugins/switchery/switchery.min.css"

		
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>

    </head>

    <body>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo container-->
                    <div class="logo">
                        <!-- Text Logo -->
                        <!-- <a href="index.html" class="logo">
                            <span class="logo-small"><i class="mdi mdi-radar"></i></span>
                            <span class="logo-large"><i class="mdi mdi-radar"></i> Highdmin</span>
                        </a> -->
                        <!-- Image Logo -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/logo_sm.png" alt="" height="26" class="logo-small">
                            <img src="assets/images/logo.png" alt="" height="22" class="logo-large">
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
                        
                            

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle"> <span class="ml-1 pro-user-name">Maxine K <i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                   

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fi-head"></i> <span>My Account</span>
                                    </a>

                                   
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fi-power"></i> <span>Logout</span>
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

            <div class="navbar-custom">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <?php include('menu.php')?>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           <h4 class="page-title">หมวดสินค้า</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                            <!-- Start Page content -->
                    <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                    


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                
									
					<div class="col-12">
						  <div class="card m-b-5  bg-success text-xs-center">
                            <div class="card-body">
								  <h5 class="card-title">เพิ่มข้อมูลหมวดสินค้า</h5>
							  <div class="form-group row">
								<div class="col-md-2">
								  <label>ชื่อหมวดสินค้า</label>
								  </div>
                             	<div class="col-md-5">
									
									<input type="text" class="form-control form-control-sm">
								</div>
															  
							    <div class="col-md-1">
								    <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-plus-circle"></i> เพิ่ม</button>
								</div>   
							  </div>  
                            </div>
                          </div>
						</div>
						<div style="clear: both">&nbsp;</div>	

                                    <div class="table-responsive">
                                        <table class="table table-hover ">

                                            <thead>
                                            <tr>
                                                <th width="4%">#</th>
                                                <th width="78%">ชื่อหมวดสินค้า</th>
                                                <th width="11%">ใช้งาน</th>
                                                <th width="7%">แก้ไข </th>
                                                <th width="7%">ลบ</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    1
                                                </td>

                                                <td>
                                                    <h5 class="m-0 font-weight-normal">อุปกรณ์นั่งร้าน</h5>
                                                    
                                                </td>

                                                <td>
                                                   <input type="checkbox" checked data-plugin="switchery" data-color="#039cfd"/>
                                                </td>

                                                <td align="center"> <a href="#" class="btn btn-sm btn-success"><i class=" fa  icon-note"></i></a></td>
                                              <td align="center"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></button></td>
                                            </tr>

                                            <tr>
                                                <td>2</td>

                                                <td>
                                                    <h5 class="m-0 font-weight-normal">แบบก่อสร้าง</h5>
                                                </td>

                                                <td>
                                                   <input type="checkbox" checked data-plugin="switchery" data-color="#039cfd"/>
                                                </td>

                                                <td align="center"> <a href="#" class="btn btn-sm btn-success"><i class=" fa  icon-note"></i></a></td>
                                              <td align="center"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>

                                                <td>
                                                    <h5 class="m-0 font-weight-normal">แผ่นเหล็ก</h5>
                                                </td>

                                                <td>
                                                    <input type="checkbox" checked data-plugin="switchery" data-color="#039cfd"/>
                                                </td>

                                                <td align="center"> <a href="#" class="btn btn-sm btn-success"><i class=" fa  icon-note"></i></a></td>
                                              <td align="center"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>

                                                <td>
                                                    <h5 class="m-0 font-weight-normal">เครื่องมือก่อสร้าง</h5>
                                                </td>

                                                <td>
                                                   <input type="checkbox" checked data-plugin="switchery" data-color="#039cfd"/>
                                                </td>

                                                <td align="center"> <a href="#" class="btn btn-sm btn-success"><i class=" fa  icon-note"></i></a></td>
                                              <td align="center"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></button></td>
                                            </tr>
                                          

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- end row -->




                    </div> <!-- container -->

                </div> 
<!-- content -->
 
<!-- content -->      
				
				
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        2018 © Highdmin.
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->


      
        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>

      
		 <script src="assets/plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>