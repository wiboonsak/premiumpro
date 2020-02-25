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

		<!-- DataTables -->
        <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Multi Item Selection examples -->
        <link href="assets/plugins/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		
		
		
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
                                <a class="nav-link dropdown-toggle waves-effect nav-user" data-toggle="dropdown" href="print_rent_page.php" role="button"
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
                           <h4 class="page-title">รายการเช่าสินค้า</h4>
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
                                    <h4 class="header-title">รายการเช่าสินค้า
									 <div class="pull-right">
									  <a href="rent_add.php" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> เพิ่มรายการเช่า</a>	
									<!--&nbsp;
										 <a href="rent_list.php" class="btn btn-sm btn-info"><i class="icon-layers"></i> รายการเช่าทั้งหมด</a>	-->
										 
									 </div>
								  </h4>
                                  <div style="clear: both">&nbsp;</div>
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-hover table-centered m-0">

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
                                                <td align="right"> <a href="print_rent_page.php" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
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
                                                <td align="right"> <a href="print_rent_page.php" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
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
                                                <td align="right"> <a href="print_rent_page.php" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
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
                                                <td align="right"> <a href="print_rent_page.php" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>

                                                <td><h5 class="m-0 font-weight-normal">บจก.เคดีโฮมบิลเดอร์
   </td>

                                                <td> <i class="icon-phone text-primary"></i></i>  0998798920</td>

                                                <td>สมหญิง</td>

                                                <td> 28/04/2562</td>

                                                <td> 31/07/2562</td>
                                                <td align="right"> <a href="print_rent_page.php" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                            </tr>
                                            <tr>
                                              <td>6</td>
                                              <td>มายโฮม บ้านและที่ดิน</td>
                                              <td><i class="icon-phone text-primary"></i> 0998791564</td>
                                              <td>คุณ เก่ง</td>
                                              <td>15/05/2562</td>
                                              <td>10/09/2562</td>
                                              <td align="right"><a href="print_rent_page.php" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                            </tr>
 <tr>
                                              <td>7</td>
                                              <td>มายโฮม บ้านและที่ดิน</td>
                                              <td><i class="icon-phone text-primary"></i> 0998791564</td>
                                              <td>คุณ เก่ง</td>
                                              <td>15/05/2562</td>
                                              <td>10/09/2562</td>
                                              <td align="right"><a href="print_rent_page.php" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                            </tr> <tr>
                                              <td>8</td>
                                              <td>มายโฮม บ้านและที่ดิน</td>
                                              <td><i class="icon-phone text-primary"></i> 0998791564</td>
                                              <td>คุณ เก่ง</td>
                                              <td>15/05/2562</td>
                                              <td>10/09/2562</td>
                                              <td align="right"><a href="print_rent_page.php" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                            </tr> <tr>
                                              <td>9</td>
                                              <td>มายโฮม บ้านและที่ดิน</td>
                                              <td><i class="icon-phone text-primary"></i> 0998791564</td>
                                              <td>คุณ เก่ง</td>
                                              <td>15/05/2562</td>
                                              <td>10/09/2562</td>
                                              <td align="right"><a href="print_rent_page.php" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                            </tr> <tr>
                                              <td>10</td>
                                              <td>มายโฮม บ้านและที่ดิน</td>
                                              <td><i class="icon-phone text-primary"></i> 0998791564</td>
                                              <td>คุณ เก่ง</td>
                                              <td>15/05/2562</td>
                                              <td>10/09/2562</td>
                                              <td align="right"><a href="print_rent_page.php" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                            </tr> <tr>
                                              <td>11</td>
                                              <td>มายโฮม บ้านและที่ดิน</td>
                                              <td><i class="icon-phone text-primary"></i> 0998791564</td>
                                              <td>คุณ เก่ง</td>
                                              <td>15/05/2562</td>
                                              <td>10/09/2562</td>
                                              <td align="right"><a href="print_rent_page.php" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                            </tr> <tr>
                                              <td>12</td>
                                              <td>มายโฮม บ้านและที่ดิน</td>
                                              <td><i class="icon-phone text-primary"></i> 0998791564</td>
                                              <td>คุณ เก่ง</td>
                                              <td>15/05/2562</td>
                                              <td>10/09/2562</td>
                                              <td align="right"><a href="print_rent_page.php" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                            </tr> <tr>
                                              <td>13</td>
                                              <td>มายโฮม บ้านและที่ดิน</td>
                                              <td><i class="icon-phone text-primary"></i> 0998791564</td>
                                              <td>คุณ เก่ง</td>
                                              <td>15/05/2562</td>
                                              <td>10/09/2562</td>
                                              <td align="right"><a href="print_rent_page.php" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                            </tr> <tr>
                                              <td>14</td>
                                              <td>มายโฮม บ้านและที่ดิน</td>
                                              <td><i class="icon-phone text-primary"></i> 0998791564</td>
                                              <td>คุณ เก่ง</td>
                                              <td>15/05/2562</td>
                                              <td>10/09/2562</td>
                                              <td align="right"><a href="print_rent_page.php" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                            </tr> <tr>
                                              <td>15</td>
                                              <td>มายโฮม บ้านและที่ดิน</td>
                                              <td><i class="icon-phone text-primary"></i> 0998791564</td>
                                              <td>คุณ เก่ง</td>
                                              <td>15/05/2562</td>
                                              <td>10/09/2562</td>
                                              <td align="right"><a href="print_rent_page.php" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                            </tr> <tr>
                                              <td>16</td>
                                              <td>มายโฮม บ้านและที่ดิน</td>
                                              <td><i class="icon-phone text-primary"></i> 0998791564</td>
                                              <td>คุณ เก่ง</td>
                                              <td>15/05/2562</td>
                                              <td>10/09/2562</td>
                                              <td align="right"><a href="print_rent_page.php" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                            </tr> <tr>
                                              <td>17</td>
                                              <td>มายโฮม บ้านและที่ดิน</td>
                                              <td><i class="icon-phone text-primary"></i> 0998791564</td>
                                              <td>คุณ เก่ง</td>
                                              <td>15/05/2562</td>
                                              <td>10/09/2562</td>
                                              <td align="right"><a href="print_rent_page.php" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                            </tr> <tr>
                                              <td>18</td>
                                              <td>มายโฮม บ้านและที่ดิน</td>
                                              <td><i class="icon-phone text-primary"></i> 0998791564</td>
                                              <td>คุณ เก่ง</td>
                                              <td>15/05/2562</td>
                                              <td>10/09/2562</td>
                                              <td align="right"><a href="print_rent_page.php" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                            </tr> <tr>
                                              <td>19</td>
                                              <td>มายโฮม บ้านและที่ดิน</td>
                                              <td><i class="icon-phone text-primary"></i> 0998791564</td>
                                              <td>คุณ เก่ง</td>
                                              <td>15/05/2562</td>
                                              <td>10/09/2562</td>
                                              <td align="right"><a href="print_rent_page.php" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                            </tr> <tr>
                                              <td>20</td>
                                              <td>มายโฮม บ้านและที่ดิน</td>
                                              <td><i class="icon-phone text-primary"></i> 0998791564</td>
                                              <td>คุณ เก่ง</td>
                                              <td>15/05/2562</td>
                                              <td>10/09/2562</td>
                                              <td align="right"><a href="print_rent_page.php" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
                                            </tr> <tr>
                                              <td>21</td>
                                              <td>มายโฮม บ้านและที่ดิน</td>
                                              <td><i class="icon-phone text-primary"></i> 0998791564</td>
                                              <td>คุณ เก่ง</td>
                                              <td>15/05/2562</td>
                                              <td>10/09/2562</td>
                                              <td align="right"><a href="print_rent_page.php" class="btn btn-sm btn-custom"><i class=" fa fa-search"></i></a></td>
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

         <!-- Required datatable js -->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="assets/plugins/datatables/jszip.min.js"></script>
        <script src="assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="assets/plugins/datatables/buttons.print.min.js"></script>

        <!-- Key Tables -->
        <script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>

        <!-- Responsive examples -->
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Selection table -->
        <script src="assets/plugins/datatables/dataTables.select.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

       <script>
            $(document).ready(function() {

                // Default Datatable
                $('#datatable').DataTable();
			
			})
       </script>
      
    </body>
</html>