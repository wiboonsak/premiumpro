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
				$_POST['password']=md5($_POST['password']);
				$query = " INSERT IGNORE INTO `tbl_emp_user` "
				."(`id` ,`admin_name` ,`username` ,`password` ,`adminType` ,`projectID` ) "
				." VALUES ('' , '".$_POST['admin_name']."', '".$_POST['username']."', '".$_POST['password']."', '2', '".$_POST['projectID']."') ";
				mysql_query($query);
			}
	}
	$query = "SELECT a.*  FROM  `tbl_emp_user` a  ORDER BY  a.projectID  ASC  ";
	$result =mysql_query($query);
	
	
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
    <td width="97%">
  
    <table width="474" border="0" cellpadding="3" cellspacing="1"  class="tableborder_full" background="images/bgcategory01.png">
      <tbody>
        <tr>
          <td 
          height="25" colspan="2"  valign="middle" nowrap="nowrap" class="navbar_selected" background="images/bgcategory01.png"><span class="txt10-black">เพิ่มผู้ใช้งาน
              <input name="action" type="hidden" id="action" />
            <input name="key" type="hidden" id="key" />
            <input name="page" type="hidden" id="page" value="<?php echo $page?>" />
            <input name="number" type="hidden" value="<?php echo $number+1;?>"/>
            <input type="hidden" name="CKEY" />
            <input name="editNum" type="hidden" />
            <input name="editType" type="hidden" />
          </span></td>
        </tr>
        <tr>
          <td height="15" colspan="2" class="table_color1"></td>
        </tr>
        <tr>
          <td width="93" class="txt10-black">ชือ</td>
          <td width="364" class="cat_desc"><span class="txt10-black">
            <input name="admin_name" type="text" id="adname" size="30" maxlength="30" />
          </span></td>
        </tr>
        <!--<tr>
          <td class="txt10-black">โครงการ</td>
          <td width="364" class="cat_desc">
          <select name="projectID" id="projectID">
          <?php while($data=mysql_fetch_assoc($resultCate)){ ?>
            <option value="<?php echo $data['id']?>"><?php echo $data['cate_name']?></option>
            <?php } ?>
          </select>
          </td>
        </tr> -->
        <tr>
          <td class="txt10-black"><span class="txt10-black">username </span></td>
          <td width="364" class="cat_desc"><span class="txt10-black">
            <input name="username" type="text" id="uname" size="20" maxlength="30" />
          </span></td>
        </tr>
        <tr>
          <td class="txt10-black"><span class="txt10-black">password</span></td>
          <td width="364" class="cat_desc"><span class="txt10-black">
            <input name="password" type="text" id="pass" size="20" maxlength="30" />
          </span></td>
        </tr>
        <!--<tr>
      <td class="table_color2">admin type </td>
      <td width="364" class="table_color2"><select name="adminType">
        <option value="1">พนักงาน</option>
        <option value="2">admin</option>
      </select>
      </td>
    </tr> -->
        <!-- <tr>
      <td class="table_color2">คำอธิบาย</td>
      <td class="table_color2"><input name="description" type="text" id="description" size="50" maxlength="50" /></td>
    </tr> -->
        <tr>
          <td colspan="2" align="center" class="cat_desc"><span class="txt10-black">
            <input type="button" name="Button" value="  เพิ่ม  " onclick=" form1.action.value='add';form1.submit(); " />
          </span></td>
        </tr>
        <tr>
          <td colspan="2" align="center" class="table_color1">&nbsp;</td>
        </tr>
      </tbody>
    </table>
 
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
      <table width="100%" border="0" cellpadding="3" cellspacing="0"  class="tableborder_full">
        <tbody>
          <tr>
            <td 
          height="15" colspan="3"  valign="top" nowrap="nowrap" class="txt10-brown"><img src="images/black_icon/16x16/users.png" width="16" height="16" hspace="10" vspace="5" align="absmiddle" />รายชื่อ พนักงาน </td>
          </tr>
          <?php $n=1; while($data=mysql_fetch_assoc($result)){ ?>
          <?php if($chkCate!=$data['cate_name']){ ?>
            <tr>
            <td height="1" colspan="3" align="center" bgcolor="#E6E6E6" class="txt10-brown"><?php echo $data['cate_name']?></td>
          </tr>
          <?php } ?>
          <tr>
            <td width="15" align="center" bgcolor="#F7F7F7"><img src="images/black_icon/16x16/user.png" width="16" height="16" /></td>
            <td height="25" bgcolor="#F7F7F7" class="txt10-black">&nbsp;<?php echo $data['admin_name']?>
              </td>
            <td width="45" align="center" bgcolor="#F7F7F7">
              <input type="button" name="Submit22" value=" ลบ "   onclick=" if(confirm('ต้องการลบ <?php echo $data['typemane']?>')) {form1.key.value='<?php echo $data['id']?>';form1.action.value='delete';form1.submit(); }else { return false;}"/>
            </td>
          </tr>
          <tr>
            <td height="1" colspan="3" align="center" bgcolor="#CCCCCC"></td>
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