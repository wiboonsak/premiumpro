<?php 
	

		if($_POST['action']=='update'){
			 //----check passs word
			 
			 $query="SELECT COUNT(id) CountID FROM tbl_admin_user  WHERE username='".$_POST['hiddenFieldUser']."'  AND password='".$_POST['old_pass']."'  ";
			
			 $result =mysql_query($query);
			 $data=mysql_fetch_assoc($result);
			 
			 if($data['CountID'] > 0 ){
			 			$_POST['new_pass']=trim($_POST['new_pass']);
						if($_POST['new_pass']==""){
							$error="กรุณาใส่รหัสผ่านใหม่ด้วยค่ะ";
						}else{
							$query = "UPDATE IGNORE tbl_admin_user SET password = '".$_POST['new_pass']."' WHERE id = '".$_SESSION['adminID']."'   ";
							mysql_query($query);
							$error="เปลี่ยนรหัสผ่านเรียบร้อยแล้วค่ะ";
						}
					
			 }else{
			 		$error="รหัสผ่าน ผิด กรุณาลองใหม่";
			 }
		}
		//------------
		$query="SELECT * FROM tbl_admin_user WHERE id = '".$_SESSION['adminID']."' ";
		$result =  mysql_query($query);
		$data=mysql_fetch_assoc($result);
	

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
    <td colspan="2" class="txt10-black"><span class="kbank"><img src="images/PNG/Users.png" alt="" width="32" height="32" hspace="5" vspace="5" align="absmiddle" />User List</span></td>
  </tr>
  
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="97%"><table width="474" border="0" cellpadding="3" cellspacing="1"  class="tableborder_full">
      <tbody>
        <tr>
          <td 
          height="15" colspan="2"  valign="top" nowrap="nowrap" class="navbar_selected" background="images/bgcategory01.png"><span class="txt10-black"><img src="images/PNG/advanced.png" width="32" height="32" align="absmiddle" />เปลี่ยนรหัสผ่าน
            <input type="hidden" name="action" />
          </span></td>
        </tr>
        <tr>
          <td height="15" colspan="2" class="table_color1"><span class="txt10-black"><?php echo $error?></span></td>
        </tr>
        <tr>
          <td width="174" class="cat_desc"><span class="txt10-black">admin name </span></td>
          <td width="285" class="cat_desc"><span class="txt10-black">&nbsp;<?php echo $data['admin_name']?></span></td>
        </tr>
        <tr>
          <td class="cat_desc"><span class="txt10-black">username </span></td>
          <td width="285" class="cat_desc"><span class="txt10-black">&nbsp;<?php echo $data['username']?>
            <input type="hidden" name="hiddenFieldUser" value="<?php echo $data['username']?>" />
          </span></td>
        </tr>
        <tr>
          <td class="cat_desc"><span class="txt10-black">password เดิม </span></td>
          <td width="285" class="cat_desc"><span class="txt10-black">
            <input name="old_pass" type="password" id="old_pass" size="15" maxlength="30" />
          </span></td>
        </tr>
        <tr>
          <td class="cat_desc"><span class="txt10-black">password ที่จะเปลี่ยน ใหม่</span></td>
          <td width="285" class="cat_desc"><span class="txt10-black">
            <input name="new_pass" type="password" id="new_pass" size="15" maxlength="30" />
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
            <input type="button" name="Button" value="  แก้ไข  " onclick="if(confirm('ต้องการเปลี่ยนรหัสผ่าน ?')){ form1.action.value='update';form1.submit(); }else{ return false; }" />
          </span></td>
        </tr>
        <tr>
          <td colspan="2" align="center" class="table_color1">&nbsp;</td>
        </tr>
      </tbody>
    </table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table> </form>
</body>
</html>