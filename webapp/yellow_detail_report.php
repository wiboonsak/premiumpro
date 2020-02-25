<?php
		if($_POST['action']=='DELETE'){	
					@unlink($path_product.$_POST['IMG'])	;
					$query="DELETE FROM tbl_yellow_data WHERE id = '".$_POST['KEY']."' ";
					mysql_query($query);
		}
	///-------------------------------------------------------------------------
		if($_POST['action']=='Add'){
				$dateArray=explode('-',$_POST['date_input']);
				$dateAdd=$dateArray[2]."-".$dateArray[1]."-".$dateArray[0];
				if($_POST['editID']==''){ 
					if($_FILES['uploadfile']['name']!=""){
							$tempFileName = $_FILES['uploadfile']['name'];
							GetNewFileName($_FILES['uploadfile']['tmp_name'],$_FILES['uploadfile']['name'],$i);
							move_uploaded_file($_FILES['uploadfile']['tmp_name'], $path_product.$_FILES['uploadfile']['name']);
					}				
					$query="INSERT INTO `tbl_yellow_data` (`id` ,`card_id` ,`txtDetail` ,`check_no` ,`billing_no`  "
					." ,`recive_name` ,`payment_name` ,`checker_name` ,`remark` ,`file_scan` ,`amt_recive` "
					." ,`amt_payment` ,`balance` ,`date_input` ,`userID` ) "
					." VALUES  "
					." ( '' , '".$_GET['yellowID']."', '".$_POST['txtDetail']."', '".$_POST['check_no']."', '".$_POST['billing_no']."' "
					." , '".$_POST['recive_name']."', '".$_POST['payment_name']."', '".$_POST['checker_name']."', '".$_POST['remark']."', '".$_FILES['uploadfile']['name']."', '".$_POST['amt_recive']."' "
					." , '".$_POST['amt_payment']."', 'balance', '".$dateAdd."', '".$_SESSION['UserID']."' )";		
					mysql_query($query)	;
				}else{
								if($_FILES['uploadfile']['name']!=""){
									$tempFileName = $_FILES['uploadfile']['name'];
									GetNewFileName($_FILES['uploadfile']['tmp_name'],$_FILES['uploadfile']['name'],$i);
									move_uploaded_file($_FILES['uploadfile']['tmp_name'], $path_product.$_FILES['uploadfile']['name']);
									@unlink($path_product.$_POST['oldIMG'])	;
								}else{
									$_FILES['uploadfile']['name']=$_POST['oldIMG'];
								}	
							$query="UPDATE `tbl_yellow_data` SET "
							."  `txtDetail`='".$_POST['txtDetail']."'  ,`check_no`='".$_POST['check_no']."'  ,`billing_no` ='".$_POST['billing_no']."'  "
							."  , `recive_name`= '".$_POST['recive_name']."' ,`payment_name`='".$_POST['payment_name']."'   "
							."    ,`checker_name` ='".$_POST['checker_name']."' ,`remark`='".$_POST['remark']."'  ,`file_scan`='".$_FILES['uploadfile']['name']."'  "
							."  ,`amt_recive`='".$_POST['amt_recive']."'  "
							."  ,   `amt_payment`='".$_POST['amt_payment']."'   ,`date_input`='".$dateAdd."'  ,`userID`='".$_SESSION['UserID']."'  "
							."  WHERE id = '".$_POST['editID']."' ";
							//echo $query;
							if(mysql_query($query)){ ?>
								<script language="javascript">
                                	window.location.href='dowork.php?workID=<?php echo $_GET['workID']?>&showPage=<?php echo $_GET['showPage']?>&yellowID=<?php echo $_GET['yellowID']?>';
                                </script>
								<?php }
					}
					
			}

	
		//--------------LIST---- `tbl_yellow_corp` ,  `tbl_product_cate`
		 $queryHead="SELECT a.* , p.cate_name , c.corp_name FROM  `tbl_yellow_card` a "
		 ." LEFT JOIN `tbl_product_cate` p ON a.card_project_id = p.id "
		 ." LEFT JOIN `tbl_yellow_corp` c ON a.corp_id=c.id "
		 ." WHERE a.id= '".$_GET['yellowID']."' ";
		 $resulHeadData=mysql_query($queryHead);
		 $corp=mysql_fetch_assoc($resulHeadData);
		 
		 //----------SELECT DATA-------------------
		 $queryList="SELECT * FROM tbl_yellow_data WHERE card_id='".$_GET['yellowID']."' ORDER BY date_input ASC ";
		 $resultListData=mysql_query($queryList);
		 //------------select data to edit
		 if($_GET['editID']){
			 $querySelect="SELECT * FROM tbl_yellow_data WHERE id='".$_GET['editID']."' ";
			 $resultSelect=mysql_query($querySelect);
			 $selectData=mysql_fetch_assoc($resultSelect);
			 $dateArray=explode('-',$selectData['date_input']);
			 $selectData['date_input']=$dateAdd=$dateArray[2]."-".$dateArray[1]."-".$dateArray[0];
		 }
		 
		 
?>
<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"date_input",
			dateFormat:"%d-%m-%Y"
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"beige",
			dateFormat:"%m-%d-%Y",
			imgPath:"img/",
			weekStartDay:1*/
		});
	};
</script>
<script language="javascript">
			function checkForm(){
						if(document.form6.date_input.value==''){
									alert('กรุณาระบุวันที่');
									return false;
							}else if(document.form6.txtDetail.value==''){
									alert('กรุณาใส่รายการ');
									return false;
							}else {
								document.form6.action.value='Add';
							}
				}
			//-------------------------------------
			function deleteThis(ids,img){
						if(confirm('ต้องการลบรายการนี้')){
								document.ListForm.action.value='DELETE';
								document.ListForm.IMG.value=img;
								document.ListForm.KEY.value=ids;
								document.ListForm.submit();											
							}
				
				}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style1.css" rel="stylesheet" type="text/css"><p>
<a href="dowork.php?workID=<?php echo $_GET['workID']?>" class="button1"> <img src="control/images/black_icon/16x16/br_prev.png" width="16" height="16" border="0" aligh="absmiddle" /> กลับ</a></p>
<table width="100%" border="0">
  <tr>
      <td><div class="boxWhite">
        <table width="100%" border="0">
         
          <tr>
            <td width="26%" align="right"><strong>ชื่อบริษัท/ห้างหุ้นส่วน</strong></td>
            <td width="74%"><?php echo $corp['corp_name']?></td>
          </tr>
          <tr>
            <td align="right">&nbsp;</td>
            <td><strong>
              <?php if($corp['card_type']==1){?>
ลูกหนี้
  <?php }else  if($corp['card_type']==2){ ?>
เจ้าหนี้
<?php  }?>
            </strong></td>
          </tr>
          <tr>
            <td align="right"><strong>ชื่อบัญชี</strong></td>
            <td><?php echo $corp['cate_name']?></td>
          </tr>
          <tr>
            <td align="right"><strong>โครงการ</strong></td>
            <td><?php echo $corp['cate_name']?></td>
          </tr>
        
        </table>

      </div></td>
    </tr>
    <tr>
      <td>
      
      
      <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td bgcolor="#CCCCCC">
   <!-- /////////////////// -->
   <form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="ListForm">
   <table width="100%" border="0" cellspacing="1">
        <tr>
          <td width="7%" rowspan="2" align="center" bgcolor="#EFEFEF"><span class="txtDetail12">วัน-เดือน-ปี
            <input type="hidden" name="action" id="action" /> <input type="hidden" name="IMG" id="IMG" /><input type="hidden" name="KEY" id="KEY" />
          </span></td>
          <td width="22%" rowspan="2" align="center" nowrap="nowrap" bgcolor="#EFEFEF"><span class="txtDetail12">รายการ</span></td>
          <td width="7%" rowspan="2" align="center" nowrap="nowrap" bgcolor="#EFEFEF" class="txtDetail12">เลขที่เช็ค</td>
          <td width="9%" align="center" nowrap="nowrap" bgcolor="#EFEFEF"><span class="txtDetail12">เลขที่ใบสำคัญ</span></td>
          <td width="7%" rowspan="2" align="center" nowrap="nowrap" bgcolor="#EFEFEF"><span class="txtDetail12">จำนวนเงิน<br />
            รับ</span></td>
          <td width="7%" rowspan="2" align="center" nowrap="nowrap" bgcolor="#EFEFEF"><span class="txtDetail12">จำนวนเงิน<br />
            จ่าย</span></td>
          <td width="7%" rowspan="2" align="center" nowrap="nowrap" bgcolor="#EFEFEF" class="txtDetail12">จำนวนเงิน<br />
            คงเหลือ</td>
          <td width="8%" rowspan="2" align="center" nowrap="nowrap" bgcolor="#EFEFEF"><span class="txtDetail12">ผู้ตรวจสอบ</span></td>
          <td width="7%" rowspan="2" align="center" nowrap="nowrap" bgcolor="#EFEFEF"><span class="txtDetail12">ผู้จ่าย</span></td>
          <td width="7%" rowspan="2" align="center" nowrap="nowrap" bgcolor="#EFEFEF"><span class="txtDetail12">ผู้รับ</span></td>
          <td width="6%" rowspan="2" align="center" nowrap="nowrap" bgcolor="#EFEFEF"><span class="txtDetail12">หมายเหตุ</span></td>
          <td rowspan="2" align="center" nowrap="nowrap" bgcolor="#EFEFEF"><span class="txtDetail12">ไฟล์สแกน<br />
            เอกสาร</span></td>
          </tr>
        <tr>
          <td align="center" nowrap="nowrap" bgcolor="#EFEFEF"><span class="txtDetail12">ใบเสร็จรับเงิน</span></td>
        </tr>
      <?php $n=1; while($data=mysql_fetch_assoc($resultListData)){ if($n%2){$bgcolor='#FFFFFF'; }else{ $bgcolor='#F4F4F4';}
	  				        $recieve[$n]=$data['amt_recive'];
							$payment[$n]=$data['amt_payment'];
							$totalN[$n]= $totalN[$n-1]+$recieve[$n]-$payment[$n];
	  ?>
        <tr class="txtDetail12" bgcolor="<?php echo $bgcolor?>"  onMouseover="this.style.backgroundColor='#EDEDDC'" onmouseout="this.style.backgroundColor='<?php echo $bgcolor?>'">
          <td nowrap="nowrap"><?php $dateArray=explode('-',$data['date_input']); $dateAdd=$dateArray[2]."-".$dateArray[1]."-".$dateArray[0]; echo $dateAdd?></td>
          <td height="25"><?php echo $data['txtDetail']?></td>
          <td><?php echo $data['check_no']?></td>
          <td><?php echo $data['billing_no']?></td>
          <td align="right"><?php DisplayNumberFormat($data['amt_recive'])?></td>
          <td align="right"><?php DisplayNumberFormat($data['amt_payment'])?></td>
          <td align="right"><?php DisplayNumberFormat($totalN[$n])?></td>
          <td><?php echo $data['checker_name']?></td>
          <td><?php echo $data['payment_name']?></td>
          <td><?php echo $data['recive_name']?></td>
          <td><?php echo $data['remark']?></td>
          <td width="6%" align="center">
            <?php if($data['file_scan']){ ?> 
            <a href="<?php echo $path_product.$data['file_scan']?>" target="_blank" title="คลิกเพื่อดูไฟล์">
              <img src="control/images/black_icon/16x16/picture.png" width="16" height="16" border="0" /></a>
            <?php }?>
          </td>
          </tr>
        <?php $n++; } ?>
        
      </table>
    </form>
    <!-- /////////////////// -->				
    </td>
  </tr>
</table>

      
      
      </td>
    </tr>
  </table>

