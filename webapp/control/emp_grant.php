<?php
	require_once("config.inc.php");
			include("function.inc.php");
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
	#################### PROJECT ##############################################	
	//-----------------------------------------------------------------------------------
	if($_POST['action']=='Add'){
				$query="INSERT INTO `tbl_project_user` (`id` ,`userID` ,`projectID`)VALUES ('' , '".$_GET['id']."', '".$_POST['projectID']."') ";
				mysql_query($query);
		}
		if($_POST['action']=='delete'){
			$query="DELETE FROM tbl_project_user WHERE id =  '".$_POST['editID']."' ";
				mysql_query($query);
		}
	//------------------------project memeber list-------------------//userID 	projectID 
	$query="SELECT a.*,  m.admin_name , p.cate_name FROM tbl_project_user a "
	." LEFT JOIN tbl_emp_user m ON a.userID=m.id "
	." LEFT JOIN tbl_product_cate p ON a.projectID=p.id "
	." WHERE a.userID ='".$_GET['id']."'  ";
	$resultProject=mysql_query($query);
	//-----------------------project list----------------------------------------------//	
	 $query="SELECT * FROM  tbl_product_cate   ORDER BY id  ASC ";
	 $resultCate=mysql_query($query);
	 
	 ################### USER MENU #######################
		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>รายละเอียดโครงการ</title>
<link href="../style1.css" rel="stylesheet" type="text/css" />
<script language="javascript">
		function deleteThis(ids){
						if(confirm('ต้องการลบโครงการนี้')){
									document.form1.action.value='delete';
									document.form1.editID.value=ids;
									document.form1.submit();
							}else{
									return false;
								}
			}
		function addThis(){
									document.form1.action.value='Add';
									document.form1.submit();			
			}
</script>
</head>

<body>
<form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1">
<input type="hidden" name="action" />
<input type="hidden"  name="editID" />
<span class="header1">รายละเอียดโครงการ</span>
<hr size="1" class="hr"  width="98%"/>
เพิ่มโครงการ <select name="projectID" id="projectID">
          <?php while($data=mysql_fetch_assoc($resultCate)){ ?>
            <option value="<?php echo $data['id']?>"><?php echo $data['cate_name']?></option>
            <?php } ?>
          </select> <input type="button" value="เพิ่มโครงการ"  onclick="addThis()"/>
          <br /><br />
          
  <span class="memberTxt">รายชื่อโครงการที่ใช้งานได้</span>
<table width="520" border="0" cellpadding="0" cellspacing="0">
  <tr class="txtDetail12">
    <td width="459" height="25" align="center" bgcolor="#DADADA">ชื่อโครงการ</td>
    <td width="61" align="center" bgcolor="#DADADA">ลบ</td>
  </tr>
  <?php while($data=mysql_fetch_assoc($resultProject)){ ?>
  <tr>
    <td height="30" class="txtDetail12">&nbsp;<?php echo $data['cate_name']?></td>
    <td align="center"><a href="#" onclick="deleteThis('<?php echo $data['id']?>')">
    <img src="images/black_icon/16x16/delete.png" width="16" height="16" border="0" /></a>
    </td>
  </tr>
  <tr>
    <td height="1" colspan="2" bgcolor="#CCCCCC"></td>
  </tr>
  <?php } ?>
</table>
</form>


</body>
</html>