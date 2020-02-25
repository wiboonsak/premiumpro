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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
</head>

<body>
แก้ไขข้อมูล
<hr class="hr" />
<table width="100%" border="0" cellpadding="1" cellspacing="1">
  <tr>
    <td width="6%" height="40" rowspan="2" align="center" bgcolor="#EFEFEF"><span class="txtDetail12">วัน-เดือน-ปี
      <input type="hidden" name="action" id="action" />
    </span></td>
    <td width="25%" rowspan="2" align="center" bgcolor="#EFEFEF"><span class="txtDetail12">รายการ</span></td>
    <td width="9%" rowspan="2" align="center" bgcolor="#EFEFEF" class="txtDetail12">เลขที่เช็ค</td>
    <td width="9%" align="center" bgcolor="#EFEFEF"><span class="txtDetail12">เลขที่ใบสำคัญ</span></td>
    <td width="6%" rowspan="2" align="center" bgcolor="#EFEFEF"><span class="txtDetail12">จำนวนเงิน<br />
      รับ</span></td>
    <td width="6%" rowspan="2" align="center" bgcolor="#EFEFEF"><span class="txtDetail12">จำนวนเงิน<br />
      จ่าย</span></td>
    <td width="9%" rowspan="2" align="center" bgcolor="#EFEFEF"><span class="txtDetail12">ผู้ตรวจสอบ</span></td>
    <td width="9%" rowspan="2" align="center" bgcolor="#EFEFEF"><span class="txtDetail12">ผู้จ่าย</span></td>
    <td width="21%" rowspan="2" align="center" bgcolor="#EFEFEF"><span class="txtDetail12">ผู้รับ</span></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#EFEFEF"><span class="txtDetail12">ใบเสร็จรับเงิน</span></td>
  </tr>
  <tr>
    <td height="25"><label for="date_input"></label>
      <input name="date_input" type="text" id="date_input" size="8" autocomplete="off" /></td>
    <td><input name="txtDetail" type="text" id="txtDetail" value="" size="35" /></td>
    <td><input name="check_no" type="text" id="check_no" size="15" /></td>
    <td><input name="billing_no" type="text" id="billing_no" size="15" /></td>
    <td><input name="amt_recive" type="text" id="amt_recive" size="10" /></td>
    <td><input name="amt_payment" type="text" id="amt_payment" size="10" /></td>
    <td><input name="checker_name" type="text" id="checker_name" size="12" /></td>
    <td><input name="payment_name" type="text" id="payment_name" size="12" /></td>
    <td><input name="recive_name" type="text" id="recive_name" size="12" /></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#EFEFEF"><span class="txtDetail12">หมายเหตุ</span></td>
    <td align="left"><textarea name="remark" cols="30" rows="3" id="remark"></textarea></td>
    <td align="center" bgcolor="#EFEFEF"><span class="txtDetail12">ไฟล์สแกน<br />
      เอกสาร</span></td>
    <td colspan="3" align="left" class="error"><input name="uploadfile" type="file" id="uploadfile" size="10" />
      <br />
      ** pdf, jpg, png , ขนาดไฟล์ไม่เกิน 3 เมกกะไบต์</td>
    <td colspan="3" align="left"><input name="button" type="submit" class="buttonMenu" id="button" value="เพิ่มข้อมูล" /></td>
  </tr>
  <tr>
    <td colspan="9" align="center"><hr class="hr" /></td>
  </tr>
</table>
<p>&nbsp;</p>

</body>
</html>