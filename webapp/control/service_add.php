<?php 
    if($_POST['action']=='ChStatus'){
		}
	//-------------------------------------------------------------
       if($_POST['action']=='ChStatus2'){
		}
   //-------------------------------------------------------------
	if($_POST['action']=='AddPack'){
		            $query="INSERT IGNORE INTO `tbl_service` (`id` ,`seviceName` ,`serviceDesc` ,`serviceRate` ,`serviceUnitDiscount` ,`serviceRate2` ,`serviceStatus`) "
					." VALUES "
					." ( '' ,  '".$_POST['seviceName']."',  '".$_POST['serviceDesc']."',  '".$_POST['serviceRate']."',  '".$_POST['serviceUnitDiscount']."',  '".$_POST['serviceRate2']."',   '".$_POST['serviceStatus']."') ";
						if(mysql_query($query)){
				?>
					     <script language="javascript">window.location.href='main.php?work=Service';</script>
					<?php }else{ ?>
							 <script language="javascript">window.location.href='main.php?work=errService&error=cannotInsert';</script>
					<?php }

		}
		//------------------------------------------------------------------------------------------------------------------------	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
			//--------------------------------
			function changeStatus(ids,mainSetid){
							document.form1.currID.value = ids;	
							document.form1.action.value = 'ChStatus';
							document.form1.MainSetID.value = mainSetid;							
							document.form1.submit();	
			}
			//--------------------------------		
			function  FormValid(){
				     if(document.form1.seviceName.value==''){
						 		alert("กรุณาใส่ชื่อ บริการ ");
								return false;
						 }
				     else if(document.form1.serviceDesc.value==''){
						 		alert("กรุณาใส่รายละเอียด");
								return false;
						 }	
					else if(document.form1.serviceRate.value==''){
						 		alert("กรุณาใส่ราคา/หน่วย ");
						}else { 	
							document.form1.action.value = 'AddPack';
						}
				}
			//---------------------------------------------------
			
			function numbersonly(e, decimal) {
					var key;
					var keychar;

				if (window.event) {
				   key = window.event.keyCode;
				} else if (e) {   key = e.which; }
				else {
				   return true;
				}
				keychar = String.fromCharCode(key);

				if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
				   return true;
				}else if ((("0123456789").indexOf(keychar) > -1)) {
  					 return true;
				}else if (decimal && (keychar == ".")) { 
 					 return true;
				}
			else
  		 return false;
		}
			
</script>
</head>

<body>
<form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1" onSubmit="return FormValid();">
	<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td colspan="2" class="txt10-black"><?php include("service_menu.php")?></td>
  </tr>
   <tr>
     <td width="2%"></td>
     <td><table width="100%" border="0" cellpadding="3" cellspacing="3" class="txt10-black">
       <tr>
         <td width="22%" align="right">ระบุชื่อ บริการเสริม</td>
         <td width="78%"><input name="seviceName" type="text" id="seviceName" size="40" maxlength="50" /></td>
       </tr>
       <tr>
         <td align="right">ระบุรายละเอียด</td>
         <td><textarea name="serviceDesc" cols="40" rows="5" id="serviceDesc"></textarea></td>
       </tr>
       <tr>
         <td colspan="2" align="right"><table width="100%" border="0" cellspacing="5" cellpadding="5">
           <tr>
             <td width="37%" align="right">ราคา/หน่วย 
               <input name="serviceRate" type="text" id="serviceRate" size="10" maxlength="13" onKeyPress="return numbersonly(event, true)" /></td>
             <td width="63%" align="left">บาท</td>
             </tr>
           <tr>
             <td align="right">จำนวนที่จะลดราคา
               <input name="serviceUnitDiscount" type="text" id="serviceUnitDiscount"  onKeyPress="return numbersonly(event, false)" value="0" size="10" maxlength="13"/></td>
             <td align="left">&nbsp;</td>
             </tr>
           <tr>
             <td align="right">ราคาลด
               <input name="serviceRate2" type="text" id="serviceRate2"  onkeypress="return numbersonly(event, true)" value="0" size="10" maxlength="13"/></td>
             <td align="left">บาท</td>
           </tr>
           <tr>
             <td align="right">สถานะ </td>
             <td align="left"><select name="serviceStatus" id="serviceStatus">
                 <option value="1">แสดงทันที</option>
                 <option value="0">ระงับการแสดง</option>
               </select></td>
             </tr>
           <tr>
             <td height="50" colspan="2" align="center"><input type="hidden" name="action" id="action" />
               <input type="button" name="button" id="button" value="กลับหน้าหลัก" onClick="window.location.href='main.php?work=Service';" />&nbsp;&nbsp;&nbsp;
             <input type="submit" name="button2" id="button2" value="บันทึกข้อมูล" />&nbsp;&nbsp;&nbsp;
             <input type="reset" name="button3" id="button3" value=" ล้างค่า " /></td>
             </tr>
         </table></td>
         </tr>
     </table></td>
   </tr>

    <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>

</table>
</form>
</body>
</html>