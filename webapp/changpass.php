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
				
		//----------------------chpass----------------------//
		echo $_POST['action'];
		if($_POST['action']=='chpass'){
					$query="SELECT * FROM   `tbl_emp_user` WHERE  id ='".$_SESSION['UserID']."' AND password='".md5($_POST['oldpasschk'])."' ";
					echo $query."<br>";
					$result=mysql_query($query);
					$data=mysql_fetch_assoc($result);
					if($data['id']){
								$query="UPDATE `tbl_emp_user` SET password='".md5($_POST['oldpasschk2'])."' WHERE    id ='".$_SESSION['UserID']."'  ";  
								if(mysql_query($query)){
										$msg="เปลียนรหัสผ่านเรียบร้อย";
									}else{
											$msg="ไม่สามารถเปลียนรหัสได้ กรุณาติดต่อ Admin";
										}
						}else{
							$msg="รหัสเดิมไม่ถูกต้อง ไม่สามารถเปลียนรหัสได้ ";
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
<script language="javascript">
		function chekForm(){
					if(document.chpass.oldpasschk.value==''){
								alert('กรุณาใส่รหัสผ่านเดิม');
								return false;
						}else if(document.chpass.oldpasschk2.value==''){
								alert('กรุณาใส่รหัสผ่านใหม่');
								return false;
						} else if(document.chpass.oldpasschk3.value==''){
								alert('กรุณายืนยันรหัสผ่านใหม่');
								return false;
						}else if(document.chpass.oldpasschk3.value!=document.chpass.oldpasschk2.value){
								alert('รหัสผ่านใหม่และยืนยันรหัสผ่านใหม่ไม่ตรงกัน กรุณาลองใหม่');
								return false;
						} 						
						else {
								document.chpass.action.value='chpass';
							}
			}
</script>
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
		  <?php if($_SESSION['UserName']){ ?>
	<form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="chpass" onSubmit="return chekForm();"	>
			<span class="header2">เปลียนรหัสผ่าน</span><input name="action" type="hidden" value="">  
			<?php if($msg){ ?><span class="error" style="margin-left:20px;">[***<?php echo $msg?>]</span><?php }?>
            <br>
			<br>
			password เดิม <input name="oldpasschk" type="password" class="textinputRequire" >
			<br>
			<br>
			password ใหม่  <input name="oldpasschk2" type="password" class="textinputRequire" >
            ยืนยัน password อีกครั้ง	 <input name="oldpasschk3" type="password" class="textinputRequire">   
	  <input name="Submit" type="submit" class="button1" value="เปลียน password	">	
	  </form>
	<?	 }else{ 
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