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
                           <h4 class="page-title">เพิ่มรายการเช่าสินค้า</h4>
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
									   <div class="col-md-6 col-lg-6 col-sm-12">
									       <div class="form-group row">
										   <div class="col-md-3">
										        ชื่อลูกค้า
										    </div>
										    <div class="col-md-9">
										      <input type="text" class="form-control form-control-sm">						
										   </div>
										   </div>
											
										   <div class="form-group row">
										   <div class="col-md-3">
										       บริษัท/COMPANY
										    </div>
										    <div class="col-md-9">
										      <input type="text" class="form-control form-control-sm">						
										   </div>
										   </div>
										   
										   <div class="form-group row">
										   <div class="col-md-3">
										       ที่อยู่/ADDRESS
										    </div>
										    <div class="col-md-9">
										      <input type="text" class="form-control form-control-sm">						
										   </div>
										   </div>
										   
										     <div class="form-group row">
										   <div class="col-md-3">
										       โทรศัพท์/TEL
										    </div>
										    <div class="col-md-9">
										      <input type="text" class="form-control form-control-sm">						
										   </div>
										   </div>
										   
										   <div class="form-group row">
										   <div class="col-md-3">
										       เบอร์ FAX
										    </div>
										    <div class="col-md-9">
										      <input type="text" class="form-control form-control-sm">						
										   </div>
										   </div>
										   
										    <div class="form-group row">
										   <div class="col-md-3">
										       รหัสลูกค้า
										    </div>
										    <div class="col-md-9">
										     <strong>998</strong>						
										   </div>
										   </div>
											   
									   </div>
									   <div class="col-md-6 col-lg-6 col-sm-12">
									        
										   <div class="form-group row">
										   <div class="col-md-3">
										        ใบส่งสินค้าเลขที่
										    </div>
										    <div class="col-md-9">
										      <input type="text" class="form-control form-control-sm">						
										   </div>
										   </div>
											
										   <div class="form-group row">
										   <div class="col-md-3">
										      วันที่เช่า
										    </div>
										    <div class="col-md-9">
										      <input type="text" class="form-control form-control-sm">						
										   </div>
										   </div>
										   
										   <div class="form-group row">
										   <div class="col-md-3">
										       เวลา
										    </div>
										    <div class="col-md-9">
										      <input type="text" class="form-control form-control-sm">						
										   </div>
										   </div>
										   
										   
										      <div class="form-group row">
										   <div class="col-md-3">
										       เวลา
										    </div>
										    <div class="col-md-9">
										      <input type="text" class="form-control form-control-sm">						
										   </div>
										   </div>
										   
										      <div class="form-group row">
										   <div class="col-md-3">
										       วันที่จะคืน
										    </div>
										    <div class="col-md-9">
										      <input type="text" class="form-control form-control-sm">						
										   </div>
										   </div>
										   
										   
										        <div class="form-group row">
										   <div class="col-md-3">
										      ผู้ออกเอกสาร
										    </div>
										    <div class="col-md-9">
										      <input type="text" class="form-control form-control-sm">						
										   </div>
										   </div>
										   
									   </div>
								   </div>
                  
						<div class="col-12">
						  <div class="card m-b-5  bg-success text-xs-center">
                            <div class="card-body">
								  <h5 class="card-title">เพิ่มข้อมูลรายการเช่า</h5>
							  <div class="form-group row">
			
                             	<div class="col-md-5">
									<label>รายละเอียดสินค้า</label>
									<input type="text" class="form-control form-control-sm">
								</div>
								<div class="col-md-1">
									<label>จำนวน</label>
									<input type="text" class="form-control form-control-sm">
								</div> 
								 <div class="col-md-2">
									<label>หน่วย</label>
									<input type="text" class="form-control form-control-sm">
								</div>  
								  <div class="col-md-2">
									<label>ค่าเช่า/วัน/หน่วย</label>
									<input type="text" class="form-control form-control-sm">
								</div>
								  
							    <div class="col-md-1" style="padding-top: 28px;">
								    <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-plus-circle"></i> เพิ่ม</button>
								</div>   
							  </div>  
                            </div>
                          </div>
						</div>	
								
<div class="col-12" style="padding-top: 10px;">
	<div class="table-responsive">
<table class="table table-bordered" width="100%" border="1" cellspacing="3" cellpadding="3">
  <tbody>
    <tr style="background-color:lightgray">
      <th width="10" nowrap="nowrap">ลำดับ</th>
      <th nowrap="nowrap">รายละเอียดสินค้า</th>
      <th width="100" nowrap="nowrap">จำนวน</th>
      <th width="100" nowrap="nowrap">หน่วย</th>
      <th width="120" nowrap="nowrap">ค่าเช่า/วัน/หน่วย</th>
      <th width="80" nowrap="nowrap">จำนวนเงิน</th>
      <th width="100" nowrap="nowrap">ลบรายการ</th>
    </tr>
    <tr>
      <td>1</td>
      <td>แป๊บกลม 1 1/2. ยาว 1.5 ม.</td>
      <td><input type="text" class="form-control form-control-sm"></td>
      <td><input type="text" class="form-control form-control-sm"></td>
      <td><input type="text" class="form-control form-control-sm"></td>
      <td>&nbsp;</td>
      <td align="center"a><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></button></td>
    </tr>
    <tr>
      <td>2</td>
      <td>แป๊บกลม 1 1/2. ยาว 2.0 ม.</td>
      <td><input type="text" class="form-control form-control-sm"></td>
      <td><input type="text" class="form-control form-control-sm"></td>
      <td><input type="text" class="form-control form-control-sm"></td>
      <td>&nbsp;</td>
      <td align="center"a><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></button></td>
    </tr>
    <tr>
      <td>3</td>
      <td>แป๊บกลม 1 1/2. ยาว 0.9 ม.</td>
      <td><input type="text" class="form-control form-control-sm"></td>
      <td><input type="text" class="form-control form-control-sm"></td>
      <td><input type="text" class="form-control form-control-sm"></td>
      <td>&nbsp;</td>
     <td align="center"a><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></button></td>
    </tr>
    <tr>
      <td>4</td>
      <td>เหล็กฉาก 1.20 ม.</td>
      <td><input type="text" class="form-control form-control-sm"></td>
      <td><input type="text" class="form-control form-control-sm"></td>
      <td><input type="text" class="form-control form-control-sm"></td>
      <td>&nbsp;</td>
      <td align="center"a><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></button></td>
    </tr>
    <tr>
      <td>5</td>
      <td>เหล็กฉากมุมใน 0.60 ม</td>
      <td><input type="text" class="form-control form-control-sm"></td>
      <td><input type="text" class="form-control form-control-sm"></td>
      <td><input type="text" class="form-control form-control-sm"></td>
      <td>&nbsp;</td>
      <td align="center"a><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></button></td>
    </tr>
    <tr>
      <td>6</td>
      <td>ตัวหนอน (UCLIP)</td>
      <td><input type="text" class="form-control form-control-sm"></td>
      <td><input type="text" class="form-control form-control-sm"></td>
      <td><input type="text" class="form-control form-control-sm"></td>
      <td>&nbsp;</td>
      <td align="center"a><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></button></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>

		
		
    </div>
	<div class="form-group row">
		<div class="col-md-2">
			<label class="text-danger"><strong>เงินมัดจำ</strong></label>
			<input type="text" class="form-control form-control-sm">
		</div>
		<div class="col-md-2">
			<label class="text-danger"><strong>ค่าขนส่ง</strong></label>
			<input type="text" class="form-control form-control-sm">
		</div>
		<div class="col-md-8"></div>
	</div> 
	<div align="center" class="col-12">
		<button type="button" class="btn btn-success btn-sm">บันทึกข้อมูล</button>
		&nbsp;
		
		<button type="button" class="btn btn-info btn-sm" onClick="window.location.href='print_rent_page.php'">พิมพ์</button>
		
	</div>
</div>	
									
                                    <!-- end row -->
                               
                            </div> <!-- end box -->
                        </div>
                        <!-- end row -->
						

                        <div class="row"></div>
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