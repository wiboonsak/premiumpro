<?php
		if($_GET['currentID']){ $_POST['currentID']=$_GET['currentID'];}
		//-------------------------- --------------------------------------------
		if($_POST['action']=='DELETE'){
					//--------------count id in data------------//
					$query="SELECT COUNT(corp_id) AS countID FROM  `tbl_yellow_card` WHERE corp_id='".$_POST['KEY']."' ";
					$result=mysql_query($query);
					$data=mysql_fetch_assoc($result);
					if($data['countID'] > 0){
							?>
                            <script language="javascript">
                            		alert('ไม่สามารถลบข้อมูลนี้ได้ กรุณาลบข้อมูลการ์ดเหลืองก่อนจะลบข้อมูลนี้');
									window.location.href='dowork.php?workID=<?php echo $_GET['workID']?>&showPage=<?php echo $_GET['showPage']?>';
                            </script>
                            <?php	
						}else{
							$query="DELETE FROM tbl_yellow_corp WHERE id='".$_POST['KEY']."' ";
							mysql_query($query);
							}
			}
		//--------------------------------------------------------------------------
		$query="SELECT * FROM  tbl_yellow_corp  ORDER BY id ASC ";	
		$resultData=mysql_query($query);
			
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style1.css" rel="stylesheet" type="text/css" />
<script language="javascript">
		function deleteCorp(ids){
				if(confirm('ต้องการลบข้อมูลนี้')){
							document.form5.action.value='DELETE';
							document.form5.KEY.value=ids;
							document.form5.submit();	
					}
		}
</script>
<table width="100%" border="0">
  <tr>
    <td>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form5">
    <input name="action" type="hidden" /><input name="KEY" type="hidden"  />
    <p> <a href="dowork.php?workID=<?php echo $_GET['workID']?>&showPage=addCompany">
        <span class="buttonMenu">เพิ่มข้อมูลบริษัท</span></a>
        <a href="dowork.php?workID=<?php echo $_GET['workID']?>&showPage=listCompany">
         <span class="buttonMenu"> ดูรายชื่อบริษัท</span>
         </a></p>
      <table width="100%" border="0" cellpadding="1" cellspacing="1">
        <tr class="txtDetail12">
          <td width="10%" height="25" align="center" bgcolor="#EBEBEB">ลำดับที่</td>
          <td colspan="2" align="center" bgcolor="#EBEBEB">ชื่อบริษัท</td>
          <td width="17%" align="center" bgcolor="#EBEBEB">โทรศัพท์</td>
          <td width="14%" align="center" bgcolor="#EBEBEB">แฟกซ์</td>
          <td width="11%" align="center" bgcolor="#EBEBEB">รายละเอียด</td>
          <td width="8%" align="center" bgcolor="#EBEBEB">ลบข้อมูล</td>
        </tr>
        <?php $n=1; while($data=mysql_fetch_assoc($resultData)){ if($n%2){$bgcolor='#FFFFFF'; }else{ $bgcolor='#F4F4F4';}?>
        <tr bgcolor="<?php echo $bgcolor?>"  onmouseover="this.style.backgroundColor='#EDEDDC'" onmouseout="this.style.backgroundColor='<?php echo $bgcolor?>'">
          <td height="25" align="center" bgcolor="<?php echo $bgcolor?>"  class="txtDetail12"><?php echo $n?></td>
          <td width="36%" bgcolor="<?php echo $bgcolor?>"  class="txtDetail12">&nbsp;
          <?php echo $data['corp_name']?>
          </td>
          <td width="4%" align="center" bgcolor="<?php echo $bgcolor?>" class="txtDetail12">&nbsp;</td>
          <td align="center" bgcolor="<?php echo $bgcolor?>" class="txtDetail12"><?php echo $data['corp_telephone']?></td>
          <td align="center" bgcolor="<?php echo $bgcolor?>" class="txtDetail12"><?php echo $data['corp_fax']?></td>
          <td align="center" bgcolor="<?php echo $bgcolor?>" class="txtDetail12">
          <a href="dowork.php?workID=<?php echo $_GET['workID']?>&showPage=addCompany&currentID=<?php echo $data['id']?>">
          <img src="control/images/black_icon/16x16/doc_lines.png" width="16" height="16" border='0' /></a></td>
          <td align="center" bgcolor="<?php echo $bgcolor?>" class="txtDetail12">
          <a href="#" onclick="deleteCorp('<?php echo $data['id']?>')">
          <img src="control/images/black_icon/16x16/delete.png" width="16" height="16"  border="0"/>
          </a>
          </td>
        </tr>
        <?php $n++; } ?>
      </table>
    </form>
    </td>
  </tr>
</table>
