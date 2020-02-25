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
                           <h4 class="page-title">สรุปรายการเช่าสินค้า</h4>
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
                                  
                                 <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                     
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <div class="clearfix">
                                <div class="pull-left mb-3">
                                    <img src="assets/images/logo.png" alt="" height="28">
                                </div>
                                <div class="pull-right">
                                    <h4 class="m-0 d-print-none">ใบเช่าสินค้า/ใบเสร็จรับเงิน</h4>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-6">
                                    <div class="pull-left mt-3">
                                      <p><b>3D FormWork (สามดี แบบเหล็กนั่งร้านเหล็ก</b></p>
                                        <p class="text-muted">23/32 หมู่ 8 ต.บ้านส้อง อ.เวียงสระ จ.สุราษฏร์ธานี <br>
                                        Tel 084-563-7895 &nbsp;&nbsp;&nbsp;&nbsp;
											Fax 076-666-777</p>
                                    </div>

                                </div><!-- end col -->
                              
                            </div>
                            <!-- end row -->

                          <div class="row">
                                <div class="col-12">
                                    <table width="100%" cellpadding="5" cellspacing="0" border="0">
									 <tr>
									   <td width="16%">ชื่อลูกค้า</td>	
									   <td width="55%">คุณ ภูมิพล ดวงขวัญ</td>
									   <td width="17%" align="right">ใบส่งสินค้าเลขที่</td>
									   <td width="12%">P01-09097</td>	
									 </tr>
									 <tr>
									   <td>บริษัท/COMPANY</td>	
									   <td>บริษัท เจริญ คอนสทรัคชั่น (2017) จำกัด</td>
									   <td align="right">วันที่เช่า</td>
									   <td>15/05/2019</td>	
									 </tr>
									<tr>
									   <td>ที่อยู่/Address</td>	
									   <td>3/1 หมู่ที่ 3 ต.นางสวรรค์ อ.พระแสง จ.สุราษฏร์ธานี</td>
									   <td align="right">เวลา</td>
									   <td>10:15:34</td>	
									 </tr>
									<tr>
									  <td>โทรศัพท์/TEL</td>
									  <td>087-0911390</td>
									  <td align="right">วันที่คืน</td>
									  <td>15/08/2019</td>
									  </tr>
									<tr>
									  <td>เบอร์ FAX</td>
									  <td>&nbsp;</td>
									  <td align="right">ผู้ออกเอกสาร</td>
									  <td>&nbsp;</td>
									  </tr>	
									</table>
									
									
                              </div>

                                
                          </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table mt-4">
                                            <thead>
                                            <tr>
                                              <th width="10%">ลำดับ</th>
                                                <th width="39%">รายละเอียดสินค้า</th>
                                                <th width="14%">จำนวน</th>
                                                <th width="12%">หน่วย</th>
                                                <th width="14%" class="text-right">ค่าเช่า/วัน/หน่วย</th>
                                                <th width="11%" class="text-right">จำนวนเงิน</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                   แป๊บกลม 1 1/2. ยาว 1.5 ม.
                                                </td>
                                                <td align="center">130</td>
                                                <td align="center">ท่อน</td>
                                                <td class="text-right">0.55</td>
                                                <td class="text-right">71.50</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>
                                                   แป๊บกลม 1 1/2. ยาว 2.0 ม.
                                                </td>
                                                <td align="center">130</td>
                                                <td align="center">ท่อน</td>
                                                <td class="text-right">0.79</td>
                                                <td class="text-right">102.70</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>
                                                   แป๊บกลม 1 1/2. ยาว 0.9 ม.
                                                </td>
                                                <td align="center">20</td>
                                                <td align="center">ท่อน</td>
                                                <td class="text-right">0.36</td>
                                                <td class="text-right">7.20</td>
                                            </tr>
                                            <tr>
                                              <td>4</td>
                                              <td>เหล็กฉาก 1.20 ม.</td>
                                              <td align="center">76</td>
                                              <td align="center">แผ่น</td>
                                              <td class="text-right">1.79</td>
                                              <td class="text-right">136.65</td>
                                            </tr>
                                            <tr>
                                              <td>5</td>
                                              <td>เหล็กฉากมุมใน 0.60 ม</td>
                                              <td align="center">135</td>
                                              <td align="center">ท่อน</td>
                                              <td class="text-right">0.79</td>
                                              <td class="text-right">45.36</td>
                                            </tr>
                                            <tr>
                                              <td>6</td>
                                              <td>ตัวหนอน (UCLIP)</td>
                                              <td align="center">1,000</td>
                                              <td align="center">ตัว</td>
                                              <td class="text-right">1.26</td>
                                              <td class="text-right">45.36</td>
                                            </tr>
                                            <tr>
                                              <td colspan="5" align="right"><strong>รวม</strong></td>
                                              <td class="text-right"><strong>403.41</strong></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6" style="vertical-align:baseline">
                                  <div class="clearfix"  >
                                    <h4>เงื่อนไขการเช่า:</h4>

                                      <small>
                                          1. การชำระเงิน : ชำระค่าเช่า+ค่าประกันสินค้า ก่อนรับสินค้า<br>
                                          2. ค่าขนส่ง : ค่าเช่าไม่รวมค่าขนส่ง<br>
                                          3. ค่าประกันสินค้า : ผู้เช่าจะได้รับค่าประกันคืน เมื่อสินค้าครบทั้งหมดตามรายการ</small>
                                    </div>

                                </div>
								 <div class="col-6">
									 <table width="100%" cellpadding="5" cellspacing="0">
									     <tr>
										 	<td width="74%">รวมค่าเช่า/วัน</td>
										 	<td width="20%" align="right">403.41</td>
											<td width="6%">บาท</td>
										 </tr>
										 <tr>
										 	<td>จำนวนวันใช้งาน</td>
										 	<td align="right">90</td>
											<td>วัน</td>
										 </tr> 
										 <tr>
										 	<td>รวมค่าเช่าทั้งหมด</td>
										 	<td align="right">36,306.9‬0</td>
										 	<td>บาท</td>
										 </tr>
										 <tr>
										 	<td>ค่าขนส่ง</td>
										 	<td align="right">0</td>
										 	<td>บาท</td>
										 </tr>
										 <tr>
										 	<td>ค่าประกันสินค้า</td>
										 	<td align="right">9,112.50</td>
										 	<td>บาท</td>
										 </tr>
										 <tr>
										 	<td>ส่วนลด(26.29%)</td>
										 	<td align="right">2,100</td>
										 	<td>บาท</td>
										 </tr>
										  <tr>
										 	<td>*ค่าประกันสินค้าสุทธิ</td>
										 	<td align="right">7,012.50</td>
										 	<td>บาท</td>
										 </tr>
										  <tr>
										 	<td><strong>สรุปยอดรวมสินค้าทั้งหมด</strong></td>
										 	<td align="right"><strong>43,319.40</strong></td>
										 	<td><strong>บาท</strong></td>
										 </tr>
										  <tr>
										 	<td></td>
										 	<td></td>
										 	<td></td>
										 </tr>
									 </table>
									
                                </div>
                                
                            </div>

                            <div class="hidden-print mt-4 mb-4">
                                <div class="text-right">
                                    <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> Print</a>
                                    
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- end row -->


            </div>
								  </div>
                                  
                               
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