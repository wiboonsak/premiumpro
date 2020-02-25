<?php

		//------------------------------------------------------------------------------------------------------	
			$rowPerPage =200;
			$thisFile=basename($PHP_SELF);
				if((!$page)||($page==1)){
							$page=1;
							$startRow=0;
					}else{
							$startRow=($page-1)*$rowPerPage;
				  }	
	//------------------------------------------------------------------
	if($_POST['action']=='delete'){ 
	$query ="DELETE IGNORE FROM tbl_emp_user WHERE id = '".$_POST['key']."' ";
	mysql_query($query);
	}
	//-----------------------------------------------------------------
	if($_POST['action']=='add'){
		if(($_POST['admin_name'])&&($_POST['username'])&&($_POST['password'])){
				$query = " INSERT IGNORE INTO `tbl_emp_user` "
				."(`id` ,`admin_name` ,`username` ,`password` ,`adminType` ,`projectID` ) "
				." VALUES ('' , '".$_POST['admin_name']."', '".$_POST['username']."', '".$_POST['password']."', '2', '".$_POST['projectID']."') ";
				mysql_query($query);
			}
	}
	$query = "SELECT a.* , b.cate_name FROM  `tbl_emp_user` a  LEFT JOIN tbl_product_cate b ON a.projectID=b.id
	 ORDER BY  a.projectID  ASC  ";
	$result =mysql_query($query);
	
	 $query="SELECT * FROM  tbl_product_cate   ORDER BY id  ASC ";
	 $resultCate=mysql_query($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>  <form action="<?php $PHP_SELF?>" method="post" name="form1">
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td colspan="2" class="txt10-black"><span class="kbank"><img src="images/black_icon/32x32/users.png" alt="" width="32" height="32" hspace="5" vspace="5" align="absmiddle" />User List</span></td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="97%" align="center">
      <table width="100%" border="0" cellpadding="3" cellspacing="0"  class="tableborder_full">
        <tbody>
          <tr>
            <td 
          height="15" colspan="4"  valign="top" nowrap="nowrap" class="txt10-brown"><img src="images/black_icon/16x16/users.png" width="16" height="16" hspace="10" vspace="5" align="absmiddle" />รายชื่อ พนักงาน </td>
            </tr>
          <?php $n=1; while($data=mysql_fetch_assoc($result)){ ?>
          <?php if($chkCate!=$data['cate_name']){ ?>
          <tr>
            <td height="1" colspan="4" align="center" bgcolor="#E6E6E6" class="txt10-brown"><?php echo $data['cate_name']?></td>
            </tr>
          <?php } ?>
          <tr>
            <td width="25" align="center" bgcolor="#F7F7F7"><img src="images/black_icon/16x16/user.png" width="16" height="16" /></td>
            <td width="373" height="25" bgcolor="#F7F7F7" class="txt10-black">&nbsp;<?php echo $data['admin_name']?>
              </td>
            <td width="135" align="right" bgcolor="#F7F7F7" class="txt10-black"><input type="button" name="button2" id="button2" value="กำหนดสิทธิการใช้งาน" onclick="windowOpener('650', '550', 'windowName', 'emp_grant_menu.php?id=<?php echo $data['id']?>')" /></td>
            <td width="126" align="left" bgcolor="#F7F7F7" class="txt10-black"><input type="button" name="button" id="button" value="กำหนดสิทธิโครงการ" onclick="windowOpener('650', '550', 'windowName', 'emp_grant.php?id=<?php echo $data['id']?>')" /></td>
            </tr>
          <tr>
            <td height="1" colspan="4" align="center" ><hr size="1" noshade="noshade" /></td>
            </tr>
          
          <?php $chkCate=$data['cate_name'];  $n++; } ?>
          </tbody>
        </table>
      <br />
      <input name="loop" type="hidden" value="<?php echo $n;?>" /></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table> </form>
</body>
</html>