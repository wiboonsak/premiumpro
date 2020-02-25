<?php session_start();?>
<?php include("phpconfig.php");
			
			
			//-------------------login ---------------------------//
			if($_POST['action']=='login'){
						$_POST['xpass']=md5($_POST['xpass']);
						$query="SELECT * FROM `tbl_emp_user` WHERE  username ='".$_POST['xuser']."' AND password='".$_POST['xpass']."'   ";					$result=mysql_query($query);
						$data=mysql_fetch_assoc($result);
						if($data['id']){
									$_SESSION['UserName']=$data['admin_name'];
									$_SESSION['UserID']=$data['id'];
							}else{
								?>
                                <script language="javascript">
                                	alert('กรุณาตรวจ username , password');
									window.location.href='index.php';
                                </script>
                                <?php
								}
				}
		 //-----------------config word--------------------//
			if(!$_SESSION['UserName']){ 
					$head="กรุณาเข้าสู่ระบบ";
			}else{
					$head=$_SESSION['UserName'];
			}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Document :: <?php echo $head?></title>
<link href="style1.css" rel="stylesheet" type="text/css">
</head>
<dd>
<body >
<div id="wrapper">
  <div id="header">
                <?php echo $head?> 
               <!-- <input name="btnLogout" type="button" class="buttonLogout" id="btnLogout" value="ออกจากระบบ" style="margin-left:60px"> -->
        </div>
  <div id="content">
     <hr class="hr">
		<p>
		  <?php if($_SESSION['UserName']){ 
				if($_GET['work']){
							include($_GET['work'].".php");
					}else{
							include("mainwork.php");
						}
		 }else if($_SESSION['UserName']==''){ 
				include('login.php');
		 } ?>
		  <?php  ?>
 
  </p>
		
  </div>
        <div id="footer">
           <?php include("footer.php");?>
  </div>
</div>

</body>
</html>