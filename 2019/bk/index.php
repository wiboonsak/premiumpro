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
                           <h4 class="page-title"></h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                            <!-- Start Page content -->
                    <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                  

                                    <div class="row">
										
										 <div class="col-sm-6 col-lg-6 col-xl-3">
                                            <div class="card-box mb-0 widget-chart-two">
                                                <div class="float-right"></div>
                                                <div class="widget-chart-two-content">
                                                    <p class="text-muted mb-0 mt-2">จำนวนลูกค้า</p>
                                                    <h3 class="">235</h3>
                                                </div>

                                            </div>
                                        </div>
										
                                        <div class="col-sm-6 col-lg-6 col-xl-3">
                                            <div class="card-box mb-0 widget-chart-two">
                                                
                                                <div class="widget-chart-two-content">
                                                    <p class="text-muted mb-0 mt-2">จำนวนสินค้าทั้งหมด</p>
                                                    <h3 class="">400</h3>
                                                </div>

                                            </div>
                                        </div>

                                       

                                        <div class="col-sm-6 col-lg-6 col-xl-3">
                                            <div class="card-box mb-0 widget-chart-two">
                                                
                                                <div class="widget-chart-two-content">
                                                    <p class="text-muted mb-0 mt-2">จำนวนสินค้าพร้อมให้เช่า</p>
                                                    <h3 class="">350</h3>
                                                </div>

                                            </div>
                                        </div>
										
										 <div class="col-sm-6 col-lg-6 col-xl-3">
                                            <div class="card-box mb-0 widget-chart-two">
                                                
                                                <div class="widget-chart-two-content">
                                                    <p class="text-muted mb-0 mt-2">จำนวนสินค้าชำรุด/ซ่อม</p>
                                                    <h3 class="">50</h3>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card-box">
                                    <h4 class="header-title">รายการเช่าสินค้า
									 <div class="pull-right">
									  <a href="rent_add.php" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> เพิ่มรายการเช่า</a>	
									&nbsp;
										 <a href="rent_list.php" class="btn btn-sm btn-info"><i class="icon-layers"></i> รายการเช่าทั้งหมด</a>	
										 
									 </div>
								  </h4>

                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered m-0">

                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ชื่อ</th>
                                                <th>โทรศัพท์</th>
                                                <th>ผู้ติดต่อ</th>
                                                <th>วันที่เช่า</th>
                                                <th>วันครบกำหนด</th>
                                                <th>รายละเอียด</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    1
                                                </td>

                                                <td>
                                                    <h5 class="m-0 font-weight-normal">บริษัท ยูดี คอนสตรัคชั่น จำกัด</h5>
                                                    
                                                </td>

                                                <td>
                                                     <i class="icon-phone text-primary"></i>  083 604 4677
                                                </td>

                                                <td>
                                                    คุณ เอ
                                                </td>

                                                <td>
                                                    01/04/2562
                                                </td>

                                                <td>
                                                    01/06/2562
                                                </td>
                                                <td align="right"> <a href="#" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                            </tr>

                                            <tr>
                                                <td>2</td>

                                                <td>
                                                    <h5 class="m-0 font-weight-normal">บริษัท ที.ที.เอส เอ็นจิเนียริ่ง (2004) จำกัด  
                                                </td>

                                                <td>
                                                      <i class="icon-phone text-primary"></i>  083 604 4678 
                                                </td>

                                                <td>
                                                  คุณ เค
                                                </td>

                                                <td>
                                                     10/04/2562
                                                </td>

                                                <td>
                                                     01/08/2562
                                                </td>
                                                <td align="right"> <a href="#" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>

                                                <td>
                                                    <h5 class="m-0 font-weight-normal">บจก.เอนกก่อสร้าง(2015)
                                                </td>

                                                <td>
                                                    <i class="icon-phone text-primary"></i> 063 595 5450
                                                </td>

                                                <td>
                                                   คุณณภัทร์
                                                </td>

                                                <td>
                                                     15/04/2562
                                                </td>

                                                <td>
                                                    01/05/2562
                                                </td>
                                                <td align="right"> <a href="#" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>

                                                <td>
                                                    <h5 class="m-0 font-weight-normal">หจก.ทองเซอร์วิสคอนสตรัคชั่น
                                                </td>

                                                <td>
                                                    <i class="icon-phone text-primary"></i> 0998791564
                                                </td>

                                                <td>
                                                    คุณกิม
                                                </td>

                                                <td>
                                                   20/04/2562
                                                </td>

                                                <td>
                                                    15/09/2562
                                                </td>
                                                <td align="right"> <a href="#" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>

                                                <td><h5 class="m-0 font-weight-normal">บจก.เคดีโฮมบิลเดอร์
   </td>

                                                <td> <i class="icon-phone text-primary"></i></i>  0998798920</td>

                                                <td>สมหญิง</td>

                                                <td> 28/04/2562</td>

                                                <td> 31/07/2562</td>
                                                <td align="right"> <a href="#" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                            </tr>
                                            <tr>
                                              <td>6</td>
                                              <td>มายโฮม บ้านและที่ดิน</td>
                                              <td><i class="icon-phone text-primary"></i> 0998791564</td>
                                              <td>คุณ เก่ง</td>
                                              <td>15/05/2562</td>
                                              <td>10/09/2562</td>
                                              <td align="right"><a href="#" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-4" >
                                <div class="card-box" >
                                  <h4 class="m-t-0 header-title">ลูกค้าเพิ่มล่าสุด</h4>
                                    <table class="table table-hover table-centered">
                                      <thead>
                                        <tr>
                                          <th>#</th>
                                          <th>ชื่อ</th>
                                          <th>ข้อมูล</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td> 1 </td>
                                          <td><h5 class="m-0 font-weight-normal">บริษัท ยูดี คอนสตรัคชั่น จำกัด</h5></td>
                                          <td><a href="#" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                        </tr>
                                        <tr>
                                          <td>2</td>
                                          <td><h5 class="m-0 font-weight-normal">
                                            บริษัท ที.ที.เอส เอ็นจิเนียริ่ง (2004) จำกัด </td>
                                          <td><a href="#" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                        </tr>
                                        <tr>
                                          <td>3</td>
                                          <td><h5 class="m-0 font-weight-normal">
                                            บจก.เอนกก่อสร้าง(2015) </td>
                                          <td><a href="#" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                        </tr>
                                        <tr>
                                          <td>4</td>
                                          <td><h5 class="m-0 font-weight-normal">
                                            หจก.ทองเซอร์วิสคอนสตรัคชั่น </td>
                                          <td><a href="#" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                        </tr>
                                        <tr>
                                          <td>5</td>
                                          <td><h5 class="m-0 font-weight-normal">
                                            บจก.เคดีโฮมบิลเดอร์ </td>
                                          <td><a href="#" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                        </tr>
                                        <tr>
                                          <td>6</td>
                                          <td>มายโฮม บ้านและที่ดิน</td>
                                          <td><a href="#" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                        </tr>
                                      </tbody>
                                    </table>


                                  

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

        <!-- Flot chart
        <script src="../plugins/flot-chart/jquery.flot.min.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.resize.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.pie.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.crosshair.js"></script>
        <script src="../plugins/flot-chart/curvedLines.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.axislabels.js"></script> -->

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="../plugins/jquery-knob/excanvas.js"></script>
        <![endif]
        <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>-->

        <!-- Dashboard Init
        <script src="assets/pages/jquery.dashboard.init.js"></script> -->

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>