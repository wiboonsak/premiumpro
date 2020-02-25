<?php
		if($_GET['currentID']){ $_POST['currentID']=$_GET['currentID'];}
		//-------------------------- --------------------------------------------
		if($_POST['action']=='Add'){
				$lastUpdate=date("Y-m-d");
				if($_POST['currentID']==''){ 
					$query="INSERT INTO `tbl_yellow_corp` "
					." (`id` ,`corp_name` ,`sale_name` ,`sale_telephone` ,`corp_acc_name` ,`corp_acc_number` ,`corp_acc_bank` "
					." ,`corp_telephone` ,`corp_fax` ,`corp_web` ,`userID`,`lastUpdate` ) "
					." VALUES "
					." ( '' , '".$_POST['corp_name']."', '".$_POST['sale_name']."', '".$_POST['sale_telephone']."', '".$_POST['corp_acc_name']."', '".$_POST['corp_acc_number']."', '".$_POST['corp_acc_bank']."'  "
					." , '".$_POST['corp_telephone']."', '".$_POST['corp_fax']."', '".$_POST['corp_web']."', '".$_SESSION['UserID']."' , '".$lastUpdate."' ) ";
					mysql_query($query);
					$_POST['currentID']=mysql_insert_id();
					//echo $query;
				}else{
					 $query="UPDATE  `tbl_yellow_corp` SET  "
					 ." `corp_name`= '".$_POST['corp_name']."'  ,`sale_name`='".$_POST['sale_name']."'  ,`sale_telephone`='".$_POST['sale_telephone']."' ,`corp_acc_name`='".$_POST['corp_acc_name']."'  ,`corp_acc_number`= '".$_POST['corp_acc_number']."'  ,`corp_acc_bank`='".$_POST['corp_acc_bank']."'  "
					 ." ,`corp_telephone`='".$_POST['corp_telephone']."' ,`corp_fax`='".$_POST['corp_fax']."'  ,`corp_web`='".$_POST['corp_web']."' ,`userID` ='".$_SESSION['UserID']."' ,`lastUpdate` = '".$lastUpdate."' "
					 ." WHERE id = '".$_POST['currentID']."'  ";
					 mysql_query($query);
					
					}
			}
		//--------------------------------------------------------------------------
		$query="SELECT * FROM  tbl_yellow_corp WHERE id = '".$_POST['currentID']."' ";	
		$result=mysql_query($query);
		$data=mysql_fetch_assoc($result);
			
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style1.css" rel="stylesheet" type="text/css" />
<script language="javascript">
		function CheckForm(){
					if(document.form5.corp_name.value==''){
								alert('กรุณาใส่ชื่อ ชื่อบริษัท ');
								return false;
						}else if(document.form5.corp_telephone.value==''){
								alert(' กรุณาใส่ หมายเลขโทรศัพท์');
								return false;
						}else if(document.form5.corp_fax.value==''){
								alert('กรุณาใส่ หมายเลขแฟกซ์');
								return false;
								
						}else if(document.form5.corp_acc_name.value==''){
								alert('กรุณาใส่ ชื่อบัญชีธนาคาร ');
								return false;
								
						}else if(document.form5.corp_acc_number.value==''){
								alert('กรุณาใส่ หมายเลขบัญชีธนาคาร ');
								return false;
								
						}else if(document.form5.corp_acc_bank.value==''){
								alert('กรุณาใส่ ชื่อธนาคาร ');
								return false;
								
						}else if(document.form5.sale_name.value==''){
								alert('กรุณาใส่ ชื่อผู้ติดต่อ ');
								return false;

						}else if(document.form5.sale_telephone.value==''){
								alert('กรุณาใส่ โทรศัพท์ผู้ติดต่อ ');
								return false;
								
						}else{
								document.form5.action.value='Add';
							}				
						
					
			}
</script>
<table width="100%" border="0">
  <tr>
    <td>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form5" onSubmit=" return CheckForm()">
    <table width="100%" border="0" cellpadding="2" cellspacing="2">
       <tr>
        <td height="40" colspan="2" align="left" bgcolor="#EBEBEB">
        <a href="dowork.php?workID=<?php echo $_GET['workID']?>&showPage=addCompany">
        <span class="buttonMenu">เพิ่มข้อมูลบริษัท</span></a>
        <a href="dowork.php?workID=<?php echo $_GET['workID']?>&showPage=listCompany">
         <span class="buttonMenu"> ดูรายชื่อบริษัท</span>
         </a>
         </td>
        </tr>
      <tr>
        <td width="25%" align="right"><span class="txtDetail12">ชื่อบริษัท</span></td>
        <td width="75%"><span class="txtDetail12">
          <input name="corp_name" type="text" id="corp_name" size="50" maxlength="100" value="<?php echo $data['corp_name']?>">
        **</span></td>
      </tr>
      <tr>
        <td align="right"><span class="txtDetail12">หมายเลขโทรศัพท์</span></td>
        <td><span class="txtDetail12">
          <input name="corp_telephone" type="text" id="corp_telephone" size="50" maxlength="50"  value="<?php echo $data['corp_telephone']?>">
        **</span></td>
      </tr>
      <tr>
        <td align="right"><span class="txtDetail12">แฟกซ์</span></td>
        <td><span class="txtDetail12">
          <input name="corp_fax" type="text" id="corp_fax" size="50" maxlength="50"  value="<?php echo $data['corp_fax']?>">
        **</span></td>
      </tr>
      <tr>
        <td align="right"><span class="txtDetail12">ชื่อบัญชีธนาคาร</span></td>
        <td><span class="txtDetail12">
          <input name="corp_acc_name" type="text" id="corp_acc_name" size="50" maxlength="100"   value="<?php echo $data['corp_acc_name']?>">
        **</span></td>
      </tr>
      <tr>
        <td align="right"><span class="txtDetail12">หมายเลขบัญชีธนาคาร</span></td>
        <td><span class="txtDetail12">
          <input name="corp_acc_number" type="text" id="corp_acc_number" size="50" maxlength="100"    value="<?php echo $data['corp_acc_number']?>">
        **</span></td>
      </tr>
      <tr>
        <td align="right"><span class="txtDetail12">ชื่อธนาคาร</span></td>
        <td><span class="txtDetail12">
          <input name="corp_acc_bank" type="text" id="corp_acc_bank" size="50" maxlength="100"  value="<?php echo $data['corp_acc_bank']?>">
        **</span></td>
      </tr>
      <tr>
        <td align="right"><span class="txtDetail12">ชื่อผู้ติดต่อ</span></td>
        <td><span class="txtDetail12">
          <input name="sale_name" type="text" id="sale_name" size="50" maxlength="100"  value="<?php echo $data['sale_name']?>">
        **</span></td>
      </tr>
      <tr>
        <td align="right"><span class="txtDetail12">โทรศัพท์ผู้ติดต่อ</span></td>
        <td><span class="txtDetail12">
          <input name="sale_telephone" type="text" id="sale_telephone" size="50" maxlength="100"  value="<?php echo $data['sale_telephone']?>">
        **</span></td>
      </tr>
      <tr>
        <td align="right"><span class="txtDetail12">e-mail</span></td>
        <td><span class="txtDetail12">
          <input name="corp_web" type="text" id="corp_web" size="50" maxlength="100"  value="<?php echo $data['corp_web']?>">
        </span></td>
      </tr>
      <tr>
        <td align="right"><input type="hidden" name="currentID" id="currentID" value="<?php echo $_POST['currentID']?>" >
                  <input type="hidden" name="action" id="action"></td>
        <td class="error"><input type="submit" name="button" id="button" value="เพิ่ม / แก้ไข ข้อมูล">
          **กรุณาใส่ข้อมูลทุกช่อง</td>
      </tr>
     
    </table>
    </form>
    </td>
  </tr>
</table>
