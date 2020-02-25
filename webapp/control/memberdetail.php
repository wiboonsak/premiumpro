<?php
			$cusID=$_GET['currentID'];
			$queryCust ="SELECT * FROM tbl_customer WHERE id = '".$cusID."'  ";
			$resultCust =mysql_query($queryCust);
			$dataCust=mysql_fetch_assoc($resultCust);
			$BdArray=explode("-",$dataCust['birthday']);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="ajax.js"></script>
<script language="javascript">
				//--------------------------------		
			function  FormValid(){
				    if((document.form1.uploadfile.value=="")&&(document.form1.currID.value=="")){
						 		alert("กรุณาใส่ไฟล์ Banner  ");
								return false;
				   }else { 	
							document.form1.action.value = 'Add';
						}
				}
		//-----------------------------------------------	
		function GetSubCate(MainCateID, SubCate){
				var str=Math.random();
				    var isNS4 = (navigator.appName=="Netscape")?1:0;
					var mydata='MainCateID='+MainCateID+'&SubCate='+SubCate+'&str='+str;	
					 ajax = new sack('getSubCate.php');
					ajax.element ="showSubCate";
					ajax.runAJAX(mydata)
	}
	//-------------------------------------------------
	function removePic(pic){
		if(confirm('ต้องการลบรุปนี้')){
				document.form1.RmPic.value=pic;
				document.form1.action.value='deletePic';
				document.form1.submit();
		}else{
				return false;
			}
	}
</script>
</head>

<body>
<form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1" onSubmit="return FormValid();" enctype="multipart/form-data">
	<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td class="txt10-black">
      <table width="100%" border="0" cellspacing="1" cellpadding="3">
     <tr>
          <td width="100%" align="left" bgcolor="#ECECD9"><a href="main.php?work=customerList"><img src="images/black_icon/16x16/br_prev.png" width="16" height="16" hspace="5" border="0" align="absmiddle" />Back  </a> &nbsp;&nbsp;</td>
          </tr>
     <tr>
       <td align="left">
       <!--8888888888888888888888888888 -->

<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
        <td class="txt10-black"><table width="100%" border="0" cellpadding="3" cellspacing="1">
          <tr>
            <td width="24%" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="76%" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td height="22" align="right" bgcolor="#FFFFFF" class="txt10-black">ชื่อ 
              - นามสกุล :</td>
            <td align="left" bgcolor="#FFFFFF" class="FNorMal"><?php echo $dataCust['cust_name']?></td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#FFFFFF" class="txt10-black">E-mail 
              :</td>
            <td align="left" valign="bottom" bgcolor="#FFFFFF" class="ms12_black"><?php echo $dataCust['email']?></td>
          </tr>
          <tr>
            <td height="22" align="right" valign="top" bgcolor="#FFFFFF" class="txt10-black">เบอร์โทรศัพท์ 
              :</td>
            <td align="left" bgcolor="#FFFFFF" class="ms12_black"><?php echo $dataCust['tel']?> ต่อ <?php echo $dataCust['tel_ext']?></td>
          </tr>
          <tr>
            <td height="5" align="right" valign="top" bgcolor="#FFFFFF" class="txt10-black">เบอร์โทรศัพท์มือถือ </td>
            <td align="left" bgcolor="#FFFFFF" class="ms12_black"><?php echo $dataCust['mobliephone']?></td>
          </tr>
          <tr>
            <td height="6" align="right" valign="top" bgcolor="#FFFFFF" class="txt10-black">วันเกิด: </td>
            <td align="left" bgcolor="#FFFFFF" class="ms12_black"><?php echo  $BdArray[2]?>-<?php echo $BdArray[1]?>-<?php echo ($BdArray[0]+543)?></td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#FFFFFF" class="txt10-black">ที่อยู่ 
              (โดยละเอียด) :</td>
            <td align="left" bgcolor="#FFFFFF" class="FNorMal"><?php echo $dataCust['addr']?></td>
          </tr>
          <tr>
            <td height="22" align="right" bgcolor="#FFFFFF" class="txt10-black">จังหวัด 
              :</td>
            <td align="left" bgcolor="#FFFFFF" class="FNorMal"><?php echo $dataCust['province'];?></td>
          </tr>
          <tr>
            <td height="22" align="right" bgcolor="#FFFFFF" class="txt10-black">รหัสไปรษณีย์ 
              :</td>
            <td align="left" bgcolor="#FFFFFF" class="FNorMal"><?php echo $dataCust['postCode']?></td>
          </tr>
          <tr>
            <td height="22" align="right" bgcolor="#FFFFFF" class="txt10-black">วันที่สมัคร</td>
            <td align="left" bgcolor="#FFFFFF" class="FNorMal"><?php GetThaiDate(substr($dataCust['date_regis'],0,10));?></td>
          </tr>
        </table></td>
  </tr>
</table>

       <!--//8888888888888888888888888888 -->      
       </td>
     </tr>
      </table></td>
  </tr>
  </table>
 
</form>
</body>
</html>