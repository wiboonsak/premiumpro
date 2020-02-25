<?php 
	  //---------------------------------------------------------------------------------------------
	  $query="SELECT * FROM tbl_service WHERE serviceStatus='1' ORDER BY id ASC ";
	  $result1=mysql_query($query);
	  $rowz1=mysql_num_rows($result1);
	  if($rowz1==''){$rowz1=0;}
	  //---------------------------------------------------------------------------------------------	  
	   $query="SELECT * FROM tbl_service WHERE serviceStatus='0' ORDER BY id ASC ";
	   $result2=mysql_query($query);  
	   $rowz2=mysql_num_rows($result2);
	    if($rowz2==''){$rowz2=0;}
	   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
		function AddValue(duration ,  fee , keyfee , ids, pname , mainSetid){
					document.form1.selectMonth.value=duration;
					document.form1.rent_fee.value=fee;		
					document.form1.key_fee.value=keyfee;
					document.form1.currID.value=ids;	
					document.form1.packageName.value=pname;	
					document.form1.MainSetID.value = mainSetid;	
					//alert(mainSetid);
			}
			//---------------------------------
			function DeleteThis(ids){
					if(confirm('ต้องการลบรายการนี้ ?')){
							document.form1.currID.value=ids;	
							document.form1.action.value='Delete';
							document.form1.submit();
						}else{
								return false;
							}
			}
			//--------------------------------
			function changeStatus(ids,mainSetid){
							document.form1.currID.value = ids;	
							document.form1.action.value = 'ChStatus';
							document.form1.MainSetID.value = mainSetid;							
							document.form1.submit();	
			}
			//--------------------------------
			function changeStatus2(ids,mainSetid){
							document.form1.currID.value = ids;	
							document.form1.action.value = 'ChStatus2';
							document.form1.MainSetID.value = mainSetid;							
							document.form1.submit();	
			}
</script>
</head>

<body>
<form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1">
  <table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td class="txt10-black"><?php include("service_menu.php")?></td>
    </tr>
    <tr>
      <td  class="txt10-black"><dd>บริการเสริมที่เปิดใช้งาน <?php echo $rowz1?> บริการ<br />
      </dd></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
        <tr class="h3">
          <td width="13%" height="30" align="center" bgcolor="#E6E6E6">Service ID</td>
          <td width="39%" align="center" bgcolor="#E6E6E6">ชื่อบริการ</td>
          <td width="13%" align="center" bgcolor="#E6E6E6">ราคา/หน่วย</td>
          <td width="12%" align="center" bgcolor="#E6E6E6">จำนวนลดราคา</td>
          <td width="11%" align="center" bgcolor="#E6E6E6">ราคาลด</td>
          <td width="12%" align="center" bgcolor="#E6E6E6">รายละเอียด</td>
        </tr>
        <?php while($data=mysql_fetch_assoc($result1)){ ?>
        <tr class="txt10-black">
          <td align="center" bgcolor="#F4F4F4">&nbsp;
            <?php getID($data['id'])?></td>
          <td align="center" bgcolor="#F4F4F4"><?php echo $data['seviceName']?></td>
          <td align="center" bgcolor="#F4F4F4"><?php echo $data['serviceRate']?></td>
          <td align="center" bgcolor="#F4F4F4"><?php echo $data['serviceUnitDiscount']?></td>
          <td align="center" bgcolor="#F4F4F4"><?php echo $data['serviceRate2']?></td>
          <td align="center" bgcolor="#F4F4F4"><a href="main.php?work=ServiceDetail&packID=<?php echo $data['id']?>" title="ดูรายละเอียด <?php echo $data['seviceName']?>"> <img src="images/PNG/PluginGreenButton.png" alt="" width="32" height="32" hspace="0" vspace="0" border="0" /> </a></td>
        </tr>
        <?php } ?>
      </table></td>
    </tr>
    <tr>
      <td class="txt10-black"><dd>บริการเสริมที่ระงับใช้งาน <?php echo $rowz2?> บริการ<br />
      </dd></td>
    </tr>
    <tr>
      <td class="txt10-black"><table width="100%" border="0" cellspacing="1" cellpadding="1">
        <tr class="h3">
          <td width="13%" height="30" align="center" bgcolor="#E6E6E6">Service ID</td>
          <td width="39%" align="center" bgcolor="#E6E6E6">ชื่อบริการ</td>
          <td width="13%" align="center" bgcolor="#E6E6E6">ราคา/หน่วย</td>
          <td width="12%" align="center" bgcolor="#E6E6E6">จำนวนลดราคา</td>
          <td width="11%" align="center" bgcolor="#E6E6E6">ราคาลด</td>
          <td width="12%" align="center" bgcolor="#E6E6E6">รายละเอียด</td>
        </tr>
        <?php while($data=mysql_fetch_assoc($result2)){ ?>
        <tr class="txt10-black">
          <td align="center" bgcolor="#F4F4F4">&nbsp;
            <?php getID($data['id'])?></td>
          <td align="center" bgcolor="#F4F4F4"><?php echo $data['seviceName']?></td>
          <td align="center" bgcolor="#F4F4F4"><?php echo $data['serviceRate']?></td>
          <td align="center" bgcolor="#F4F4F4"><?php echo $data['serviceUnitDiscount']?></td>
          <td align="center" bgcolor="#F4F4F4"><?php echo $data['serviceRate2']?></td>
          <td align="center" bgcolor="#F4F4F4"><a href="main.php?work=ServiceDetail&packID=<?php echo $data['id']?>" title="ดูรายละเอียด <?php echo $data['seviceName']?>"> <img src="images/PNG/PluginGreenButton.png" alt="" width="32" height="32" hspace="0" vspace="0" border="0" /></a></td>
        </tr>
        <?php } ?>
      </table></td>
    </tr>
  </table>
</form>
</body>
</html>