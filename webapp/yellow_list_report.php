<?php
	if($_POST['action']=='DELETE'){
		//------COUNT----------------------------
		$query="SELECT COUNT(card_id) AS numCount FROM tbl_yellow_data WHERE card_id= '".$_POST['KEY']."' ";
		$result=mysql_query($query);
		$data=mysql_fetch_assoc($result);
			if($data['numCount'] > 0){
							?>
                            <script language="javascript">
                            		alert('ไม่สามารถลบข้อมูลนี้ได้ กรุณาลบข้อมูลรายละเอียดการ์ดเหลืองก่อนจะลบข้อมูลนี้');
									window.location.href='dowork.php?workID=<?php echo $_GET['workID']?>&showPage=<?php echo $_GET['showPage']?>';
                            </script>
                            <?php	
						}else{
							$query="DELETE FROM tbl_yellow_card WHERE id='".$_POST['KEY']."' ";
							mysql_query($query);
							}
	}

	//-----------------------------------------------------------------------
	if($_POST['action']=='Add'){
				$daeCreate=date("Y-m-d");
				$query="INSERT INTO `tbl_yellow_card` ( `id` ,`corp_id` ,`card_name` ,`card_project_id` ,`card_type` ,`card_type_name` ,`card_create` ,`userID`) "
				." VALUES "
				." ( '' , '".$_POST['corp_id']."', '".$_POST['card_name']."', '".$_POST['card_project_id']."', '1', '".$_POST['card_type_name']."', '".$daeCreate."', '".$_SESSION['UserID']."' );";
				mysql_query($query);
		}


	//---------------select project --------------//
	$query="SELECT a.*, b.cate_name  FROM  tbl_project_user a "
				 ." LEFT JOIN tbl_product_cate b ON a.projectID=b.id "
				 ." WHERE a.userID ='".$_SESSION['UserID']."'	";
	  $resultProjectUser=mysql_query($query);
	//-------------select company-------------//
		$query="SELECT * FROM  tbl_yellow_corp  ORDER BY id ASC ";	
		$resultCorpData=mysql_query($query);
 	//--------------LIST---- `tbl_yellow_corp` ,  `tbl_product_cate`
		 $queryList="SELECT a.* , p.cate_name, p.id projectID , c.corp_name FROM  `tbl_yellow_card` a "
		 ." LEFT JOIN `tbl_product_cate` p ON a.card_project_id = p.id "
		 ." LEFT JOIN `tbl_yellow_corp` c ON a.corp_id=c.id "
		 ." ORDER BY p.id ,   a.card_project_id ASC  ";
		 $resultListData=mysql_query($queryList);
		
?>
<script language="javascript">
		function chNewForm(){
				if(document.NewForm.corp_id.value=='x'){
							alert('กรุณาเลือก  ชื่อบริษัท/ห้างหุ้นส่วน ');
							return false;
				}else  if(document.NewForm.card_name.value==''){
							alert('กรุณาใส่ชื่อ บัญชี');
							return false;
					}else if(document.NewForm.card_project_id.value=='x'){
							alert('กรุณาเลือกโครงการ');
							return false;
					}else{
						document.NewForm.action.value='Add';
						}
			}
				function deleteCard(ids){
				if(confirm('ต้องการลบข้อมูลนี้')){
							document.ListForm.action.value='DELETE';
							document.ListForm.KEY.value=ids;
							document.ListForm.submit();	
					}
		}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style1.css" rel="stylesheet" type="text/css">
  <table width="100%" border="0">
    
    
    <tr>
      <td>
       <form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="ListForm">
         <table width="100%" border="0" cellpadding="1" cellspacing="1">
           <tr class="txtDetail12">
             <td width="6%" height="25" align="center" bgcolor="#EBEBEB">ลำดับที่</td>
             <td width="22%" align="center" bgcolor="#EBEBEB">ชื่อบริษัท/ห้างหุ้นส่วน
               <input type="hidden" name="action" id="action" />
               <input type="hidden" name="KEY" id="KEY" /></td>
             <td width="20%" align="center" bgcolor="#EBEBEB">ชื่อบัญชี</td>
             <td width="18%" align="center" bgcolor="#EBEBEB">ลูกหนี้ / เจ้าหนี้</td>
             <td width="23%" align="center" bgcolor="#EBEBEB">โครงการ</td>
             <td width="11%" align="center" bgcolor="#EBEBEB">ดูรายละเอียด</td>
             <td width="0%" align="center" bgcolor="#EBEBEB">&nbsp;</td>
           </tr>
           <?php $n=1; while($data=mysql_fetch_assoc($resultListData)){ if($n%2){$bgcolor='#FFFFFF'; }else{ $bgcolor='#F4F4F4';}?>
           <?php if($projectChk!=$data['projectID']){ ?>
           <tr bgcolor="<?php echo $bgcolor?>"  onmouseover="this.style.backgroundColor='#EDEDDC'" onmouseout="this.style.backgroundColor='<?php echo $bgcolor?>'">
             <td height="25" colspan="7" align="center" bgcolor="#FFEAD5"  class="txtDetail12"><img src="control/images/black_icon/16x16/notepad_2.png" alt="" width="16" height="16" align="absmiddle" /> <?php echo $data['cate_name']?></td>
           </tr>
           <?php }?>
           <tr bgcolor="<?php echo $bgcolor?>"  onmouseover="this.style.backgroundColor='#EDEDDC'" onmouseout="this.style.backgroundColor='<?php echo $bgcolor?>'">
             <td height="25" align="center"  class="txtDetail12"><?php echo $n?></td>
             <td class="txtDetail12"><?php echo $data['corp_name']?></td>
             <td class="txtDetail12"><?php echo $data['card_name']?></td>
             <td class="txtDetail12"><?php echo $data['card_type_name']?></td>
             <td align="center" class="txtDetail12">&nbsp;<?php echo $data['cate_name']?></td>
             <td align="center" class="txtDetail12"><a href="dowork.php?workID=<?php echo $_GET['workID']?>&amp;showPage=showData&amp;yellowID=<?php echo $data['id']?>" title="ดูรายละเอียด <?php echo $data['card_type_name']?>"> <img src="control/images/black_icon/16x16/zoom.png" alt="" width="16" height="16" border="0"/> </a></td>
             <td align="center" class="txtDetail12">&nbsp;</td>
             <?php $n++; $projectChk=$data['projectID']; } ?>
           </tr>
         </table>
       </form>
      </td>
    </tr>
  </table>

