<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
			//------------------------project memeber list-------------------//userID 	projectID 
	$query="SELECT a.*,  m.admin_name, p.id MenuID, p.txtGet , p.menuName FROM tbl_menu_user a "
	." LEFT JOIN tbl_emp_user m ON a.userID=m.id "
	." LEFT JOIN tbl_work_menu p ON a.projectID=p.id "
	." WHERE a.userID ='".$_SESSION['UserID']."'  ";
	$resultProject=mysql_query($query);
?>
<p class="header2" >กรุณาเลือกเมนูการทำงาน</p>
<?php $n=1; while($menu=mysql_fetch_assoc($resultProject)){ ?>

<a href="dowork.php?workID=<?php echo $menu['MenuID']?>">
<span class="buttonMenu"><img src="images/icons/brown_dark/arrow_right_alt1_12x12.png" width="12" height="12" border='0' align="absmiddle" /> 
<?php echo $menu['menuName']?></span>&nbsp;
<?php if($n==5){ echo "<br><br>";$n=0;}?>
</a>
<?php $n++; } ?>
