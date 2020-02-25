<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style1.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/javascript" src="wysiwyg2.js"></script>
<script language="Javascript1.2"><!-- // load htmlarea
//_editor_url = "http://localhost/cv4/citymall/lib/htmlarea/";                     // URL to htmlarea files
_editor_url = 'htmlarea/'; 
var win_ie_ver = parseFloat(navigator.appVersion.split("MSIE")[1]);
if (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }
if (win_ie_ver >= 5.5) {
  document.write('<scr' + 'ipt src="' +_editor_url+ 'editor.js"');
  document.write(' language="Javascript1.2"></scr' + 'ipt>');  
} else { document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }
// --></script>
<!--//////////////////////////////////////////////////////////////////////////// -->

<div class="header2"><a href="dowork.php?workID=<?php echo $_GET['workID']?>" class="header2"><img src="control/images/black_icon/16x16/doc_lines.png" width="16" height="16" border="0" />ข้อมูลบันทึกประจำวัน</a> | <img src="control/images/black_icon/16x16/doc_plus.png" width="16" height="16" style="alignment-adjust:" /><a href="<?php $_SERVER['PHP_SELF']?>?workID=<?php echo $_GET['workID']?>&show=Add"  class="header2">เพิ่มข้อมูลประจำวัน</a></div>
<?php 
		$monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");	
	$CurrentYear=date("Y");
	$CurrentDate=date("d"); 
	$CurrentMonth=date("m"); 
	$yearStart=2012; 
	$RangeYear=$CurrentYear-$yearStart;
	//----------------------------------------------------//
	if($_GET['headID']){ $_POST['headID']=$_GET['headID'];}
	//------------------------------------------------//
	if($_POST['action']=='DeleteData'){
		$query="DELETE FROM tbl_daily_report_detail WHERE id = '".$_POST['EditDataID']."' ";
		 mysql_query($query);
	}
	//------------------------------------------------//	
	if($_POST['action2']=='UpdateData'){	
			 $_POST['eletric2'][$_POST['EditDataID']] =  intval($_POST['eletric2'][$_POST['EditDataID']]);
			 $_POST['color2'][$_POST['EditDataID']] =  intval($_POST['color2'][$_POST['EditDataID']]);
			 $_POST['wood2'][$_POST['EditDataID']] =  intval($_POST['wood2'][$_POST['EditDataID']]);
			 $_POST['concreat2'][$_POST['EditDataID']] =  intval($_POST['concreat2'][$_POST['EditDataID']]);
			 $_POST['iron2'][$_POST['EditDataID']] =  intval($_POST['iron2'][$_POST['EditDataID']]);		
			 $_POST['worker2'][$_POST['EditDataID']] =  intval($_POST['worker2'][$_POST['EditDataID']]);					 
			 	 
			 
			$txtTotal=( $_POST['eletric2'][$_POST['EditDataID']]+$_POST['color2'][$_POST['EditDataID']]+ $_POST['wood2'][$_POST['EditDataID']] + $_POST['concreat2'][$_POST['EditDataID']]+ $_POST['iron2'][$_POST['EditDataID']]+$_POST['worker2'][$_POST['EditDataID']]) ;
			$query="UPDATE  tbl_daily_report_detail SET  "
			." `txtDetail`= '".$_POST['txtFiled'][$_POST['EditDataID']]."' ,`eletric`='".$_POST['eletric2'][$_POST['EditDataID']]."' ,`color`='".$_POST['color2'][$_POST['EditDataID']]."' ,`wood`='".$_POST['wood2'][$_POST['EditDataID']]."' ,`concreat`='".$_POST['concreat2'][$_POST['EditDataID']]."' ,`iron`='".$_POST['iron2'][$_POST['EditDataID']]."' ,`worker`='".$_POST['worker2'][$_POST['EditDataID']]."' ,`total`='".$txtTotal."' "
			." WHERE  id = '".$_POST['EditDataID']."' ";
			
			mysql_query($query);
	}
	//------------------------------------------------//	
	if($_POST['action']=='Add'){
					$_POST['dateReport']=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
				//-----------------------INSERT head--------------------///
				if($_POST['headID']==''){ 
					$query="INSERT INTO `tbl_daily_report_head` "
					." (`id` ,`projectID` ,`report_date` ,`weather_clear_am` ,`weather_clear_pm` ,`weather_clearsun_am` , `weather_clearsun_pm` "
						." ,`weather_rain_am` ,`weather_rain_pm` ,`weather_cloud_am` ,`weather_cloud_pm` "
						." , `report_name` ,`report_user_id` ,`approve_name` ,`approve_ID` ,`total`) "
					."VALUES  "
					." ('' , '".$_POST['projectID']."', '".$_POST['dateReport']."', '".$_POST['weather_clear_am']."',  '".$_POST['weather_clear_pm']."' ,   '".$_POST['weather_clearsun_am']."' , '".$_POST['weather_clearsun_pm']."' "
						." ,  '".$_POST['weather_rain_am']."' ,   '".$_POST['weather_rain_pm']."' ,   '".$_POST['weather_cloud_am']."' ,   '".$_POST['weather_cloud_pm']."'   "
						." , '".$_POST['report_name']."', '".$_SESSION['UserID']."', '".$_POST['approve_name']."', 'approve_ID', '' ) ";
					//echo $query;
					mysql_query($query);
					$_POST['headID']=mysql_insert_id();
				}else{  //---------------update head-----------------//
					$query="UPDATE  `tbl_daily_report_head` SET "
					." `projectID`='".$_POST['projectID']."'  ,`report_date`= '".$_POST['dateReport']."'  ,`weather_clear_am`= '".$_POST['weather_clear_am']."' ,`weather_clear_pm`='".$_POST['weather_clear_pm']."' ,`weather_clearsun_am` ='".$_POST['weather_clearsun_am']."' , `weather_clearsun_pm` ='".$_POST['weather_clearsun_pm']."' "
					." ,`weather_rain_am`= '".$_POST['weather_rain_am']."'  ,`weather_rain_pm` =  '".$_POST['weather_rain_pm']."' ,`weather_cloud_am` = '".$_POST['weather_cloud_am']."' ,`weather_cloud_pm` ='".$_POST['weather_cloud_pm']."' "
					." , `report_name`= '".$_POST['report_name']."' ,`approve_name`='".$_POST['approve_name']."'  "
					." WHERE id = '".$_POST['headID']."' ";
					mysql_query($query);
					//echo $query;
				}
				//-----------------------INSERT DATA--------------------///
				
						if($_POST['txtDetail']){
									$dateTime=date("Y-m-d H:i:s");
									$query="INSERT INTO `tbl_daily_report_detail` (`id` ,`headID` ,`txtDetail` ,`eletric` "
									." ,`color` ,`wood` ,`concreat` ,`iron` ,`worker` ,`total` ,`log_user_id` ,`log_user_name` ,`log_date_time` ,`log_dotype`) "
									." VALUES "
									." ( '' , '".$_POST['headID']."' , '".$_POST['txtDetail']."' , '".$_POST['eletric']."' "
									." , '".$_POST['color']."', '".$_POST['wood']."', '".$_POST['concreat']."', '".$_POST['iron']."', '".$_POST['worker']."', '".$_POST['total']."', '".$_SESSION['UserID']."', '".$_SESSION['UserName']."', '".$dateTime."', '1') ";
									mysql_query($query);
							}
			
					
		}/// end add + edit //
	//---------------select project --------------//
	$query="SELECT a.*, b.cate_name  FROM  tbl_project_user a "
				 ." LEFT JOIN tbl_product_cate b ON a.projectID=b.id "
				 ." WHERE a.userID ='".$_SESSION['UserID']."'	";
	$resultProjectUser=mysql_query($query);
  //------------configpost----------------//
  
  //--------------Head data ------------------//
  $query="SELECT * FROM tbl_daily_report_head WHERE id = '".$_POST['headID']."' ";
  $resultHead=mysql_query($query);
  $dataHead=mysql_fetch_assoc($resultHead);
  $dateArrayHead=explode("-",$dataHead['report_date']);
   
   if($dateArrayHead[2]){ $CurrentDate=$dateArrayHead[2];}
  if($dateArrayHead[1]){ $CurrentMonth=$dateArrayHead[1];} 	
  if($dateArrayHead[0]){ $CurrentYear=$dateArrayHead[0];}
  
  //-----------daily data-------------//
  $query="SELECT * FROM tbl_daily_report_detail WHERE headID= '".$_POST['headID']."' ";
  $resultData=mysql_query($query);
  
  if($_GET['projectID']){ $dataHead['projectID']=$_GET['projectID']; }
  

?>
<script language="javascript">
		function DchForm(){
					if(document.dailyForm.projectID.value=='x'){
								alert('กรุณาเลือกโครงการ');
								return false;
						}else if(document.dailyForm.report_name.value==''){
								alert('กรุณาใส่ชื่อผู้รายงาน');
								return false;
						}else if(document.dailyForm.approve_name.value==''){
								alert('กรุณาใส่ชื่อผู้ตรวจสอบ');
								return false;
							}else{
									document.dailyForm.action.value='Add';
								}
			}
			//-----------------------------------eletric .  color  . wood .concreat .  worker
			function calculateThis(){
					var electric = parseInt(document.dailyForm.eletric.value);
					var color = parseInt(document.dailyForm.color.value);
					var concreat = parseInt(document.dailyForm.concreat.value);
					var worker = parseInt(document.dailyForm.worker.value);
					var wood = parseInt(document.dailyForm.wood.value);
					var iron = parseInt(document.dailyForm.iron.value);
					var totalWork=(electric+color+concreat+worker+wood+iron);
					document.dailyForm.total.value=totalWork;
				}
			//-------------------------------------
			function deleteThisData(ids){
						if(confirm('ต้องการลบข้อมูลนี้')){
									document.dailyForm.action.value='DeleteData';
									document.dailyForm.EditDataID.value=ids;
									document.dailyForm.submit();
							}else{
										return false;
									}			
				}
			//-------------------------------------				
			function EditThisData(ids){
									document.dailyForm.action2.value='UpdateData';
									document.dailyForm.EditDataID.value=ids;
									document.dailyForm.submit();
				}
			
			
</script><?php if($_GET['show']=='Add'){?>
<form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="dailyForm" onsubmit="return DchForm()">
<input type="hidden" name="action" />
<input type="hidden" name="action2" />
<input type="hidden" name="headID" value="<?php echo $_POST['headID']?>" />
<input type="hidden" name="EditDataID" />
<div class="txtDetail12">

<table width="100%" border="0">
  <tr>
    <td width="49%">
    <div class="boxWhite">
    <strong>โตรงการ </strong><strong>
    <select name="projectID" id="projectID">
      <option value="x">---กรุณาเลือกโครงการ---</option>
      <?php while($project=mysql_fetch_assoc($resultProjectUser)){ ?>
      <option value="<?php echo $project['projectID']?>" <?php if( $dataHead['projectID']==$project['projectID']) echo "selected";?> > <?php echo $project['cate_name']?></option>
      <?php } ?>
    </select>
    **<br />
    </strong><strong>ประจำวันที่</strong>&nbsp;&nbsp;
      <select name="day" id="day">
        <option value="x">เลือกวัน</option>
        <?php for($i=1;$i<32;$i++){   if($i<10){ $value="0".$i;}else{ $value=$i; }?>
        <option value="<?php echo $value?>" <?php if($value==$CurrentDate){ echo "selected";}?>><?php echo $i?></option>
        <?php }?>
      </select>
      <select name="month" id="month">
        <option value="x">เลือกเดือน</option>
        <?php  while($month=each($monthArray)){ ?>
        <option value="<?php echo $month['key']?>" <?php if($month['key']==$CurrentMonth){ echo "selected";}?>><?php echo $month['value']?></option>
        <?php }?>
      </select>
      <select name="year" id="year">
        <option value="x">เลือกปี</option>
        <?php for($i=0;$i <= $RangeYear;$i++){ 
									$yearValue= $yearStart+$i;
									$yearShow=($yearStart+$i)+543;
					?>
        <option value="<?php echo $yearValue?>" <?php if($yearValue==$CurrentYear){ echo "selected";}?>><?php echo $yearShow?></option>
        <?php } ?>
      </select>
      <br />
      ผู้รายงาน
      <input name="report_name" type="text" id="report_name" size="40" value="<?php echo  $dataHead['report_name']?>" />
      **<br />
ผู้ตรวจสอบ
<input name="approve_name" type="text" id="approve_name" size="40" value="<?php echo  $dataHead['approve_name']?>"  />
**</div></td>
    <td width="51%">
    
      <table width="432" border="0" cellpadding="1" cellspacing="1" >
        <tr>
          <td width="92" height="25" bgcolor="#F4F4F4" class="boxWhite">สภาพอากาศ</td>
          <td width="91" align="center" bgcolor="#F4F4F4" class="boxWhite">ท้องฟ้าโปร่ง</td>
          <td width="65" align="center" bgcolor="#F4F4F4" class="boxWhite">มีแดดจัด</td>
          <td width="64" align="center" bgcolor="#F4F4F4" class="boxWhite">ฝนตก</td>
          <td width="92" align="center" bgcolor="#F4F4F4" class="boxWhite">ท้องฟ้ามีเมฆ</td>
          </tr>
        <tr>
          <td align="center" class="boxWhite"><strong>เช้า</strong></td>
          <td align="center" class="boxWhite">
            <input name="weather_clear_am" type="checkbox" id="weather_clear_am" value="1" <?php if($dataHead['weather_clear_am']=='1') echo "checked";?> />
            </td>
          <td align="center" class="boxWhite">
            <input name="weather_clearsun_am" type="checkbox" value="1"  <?php if($dataHead['weather_clearsun_am']=='1') echo "checked";?>/>
            </td>
          <td align="center" class="boxWhite">
            <input name="weather_rain_am" type="checkbox" i value="1"  <?php if($dataHead['weather_rain_am']=='1') echo "checked";?>/>
            </td>
          <td align="center" class="boxWhite">
            <input name="weather_cloud_am" type="checkbox"  value="1" <?php if($dataHead['weather_cloud_am']=='1') echo "checked";?> />
            </td>
          </tr>
        <tr>
          <td align="center" bgcolor="#FFF9F2" class="boxWhite"><strong>บ่าย</strong></td>
          <td align="center" bgcolor="#FFF9F2" class="boxWhite">
            <input name="weather_clear_pm" type="checkbox" value="1" <?php if($dataHead['weather_clear_pm']=='1') echo "checked";?>  />
            </td>
          <td align="center" bgcolor="#FFF9F2" class="boxWhite">
            <input name="weather_clearsun_pm" type="checkbox" value="1" <?php if($dataHead['weather_clearsun_pm']=='1') echo "checked";?> />
            </td>
          <td align="center" bgcolor="#FFF9F2" class="boxWhite">
            <input name="weather_rain_pm" type="checkbox" value="1"  <?php if($dataHead['weather_rain_pm']=='1') echo "checked";?> />
            </td>
          <td align="center" bgcolor="#FFF9F2" class="boxWhite">
            <input name="weather_cloud_pm" type="checkbox" value="1"  <?php if($dataHead['weather_cloud_pm']=='1') echo "checked";?> />
            </td>
          </tr>
      </table>
      		
      </td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <td width="418" height="25" bgcolor="#F4F4F4" class="header2">รายการ</td>
        <td width="429" bgcolor="#F4F4F4" class="header2">จำนวนคนงาน</td>
      </tr>
      <tr>
        <td><textarea name="txtDetail" cols="40" id="txtDetail" rows="3"></textarea>
          <script language="javascript1.2" type="text/javascript">
 			 generate_wysiwyg('txtDetail');
		</script></td>
        <td align="center" valign="top"><table width="100%" border="0" cellpadding="1" cellspacing="1">
          <tr class="txtDetail12">
            <td height="25" align="center" bgcolor="#F4F4F4">ช่างไฟ</td>
            <td align="center" bgcolor="#F4F4F4">ช่างสี</td>
            <td align="center" bgcolor="#F4F4F4">ช่างไม้</td>
            <td align="center" bgcolor="#F4F4F4">ช่างปูน</td>
            <td align="center" bgcolor="#F4F4F4">ช่างเหล็ก</td>
            <td align="center" bgcolor="#F4F4F4">กรรมกร</td>
            <td align="center" bgcolor="#F4F4F4">รวม</td>
          </tr>
          <tr>
            <td height="25" align="center" class="boxWhite">
              <input name="eletric" type="text" class="textinputNormal" id="eletric" onblur="calculateThis()" onkeyup="calculateThis()"  onclick="this.select();" value="0" size="5" maxlength="5" />
            </td>
            <td height="25" align="center" class="boxWhite">
              <input name="color" type="text" class="textinputNormal" id="color" onblur="calculateThis()" onkeyup="calculateThis()"  onclick="this.select();"value="0" size="5" maxlength="5" />
            </td>
            <td height="25" align="center" class="boxWhite">
              <input name="wood" type="text" class="textinputNormal" id="wood" onblur="calculateThis()" onkeyup="calculateThis()"  onclick="this.select();"value="0" size="5" maxlength="5" />
            </td>
            <td height="25" align="center" class="boxWhite">
              <input name="concreat" type="text" class="textinputNormal" id="concreat" onblur="calculateThis()" onkeyup="calculateThis()" onclick="this.select();" value="0" size="5" maxlength="5" />
            </td>
            <td height="25" align="center" class="boxWhite">
              <input name="iron" type="text" class="textinputNormal" id="iron" onblur="calculateThis()" onkeyup="calculateThis()" onclick="this.select();" value="0" size="5" maxlength="5" />
            </td>
            <td height="25" align="center" class="boxWhite">
              <input name="worker" type="text" class="textinputNormal" id="worker" onblur="calculateThis()" onkeyup="calculateThis()" onclick="this.select();" value="0" size="5" maxlength="5"  />
            </td>
            <td height="25" align="center"><input name="total" type="text" class="textinputNormal" id="total" value="0" size="5" maxlength="5" readonly="readonly" /></td>
          </tr>
        </table>
          <br />
          <input name="button" type="submit" class="button1" id="button" value="เพิ่ม/แก้ไข  รายละเอียด" />
          <br /></td>
      </tr>
      <tr>
        <td bgcolor="#F4F4F4">&nbsp;</td>
        <td bgcolor="#F4F4F4">&nbsp;</td>
      </tr>
    </table></td>
 
  </tr>
  <tr>
    <td>รายละเอียดของรายการ</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <td width="4%" height="25" align="center" bgcolor="#EBEBEB">ลำดับที่</td>
        <td width="45%" align="center" bgcolor="#EBEBEB">รายการ</td>
        <td width="6%" align="center" bgcolor="#EBEBEB">ช่างไฟ </td>
        <td width="5%" align="center" bgcolor="#EBEBEB">ช่างสี</td>
        <td width="6%" align="center" bgcolor="#EBEBEB">ช่างไม้</td>
        <td width="6%" align="center" bgcolor="#EBEBEB">ช่างปูน</td>
        <td width="7%" align="center" bgcolor="#EBEBEB">ช่างเหล็ก</td>
        <td width="6%" align="center" bgcolor="#EBEBEB">กรรมกร</td>
        <td width="6%" align="center" bgcolor="#EBEBEB">รวม</td>
        <td width="5%" align="center" bgcolor="#EBEBEB">แก้ไข</td>
        <td width="4%" align="center" bgcolor="#EBEBEB">ลบ</td>
      </tr>
      <?php $n=1; while($data=mysql_fetch_assoc($resultData)){ if($n%2){ $bgcolor='#FFFFFF'; }else{ $bgcolor='#F4F4F4';}?>
        <tr bgcolor="<?php echo $bgcolor?>" onMouseover="this.style.backgroundColor='#EDEDDC'" onmouseout="this.style.backgroundColor='<?php echo $bgcolor?>'">
        <td height="25" align="center" bgcolor="<?php echo $bgcolor?>"><?php echo $n?></td>
        <td class="txtDetail12">&nbsp;<?php //echo $data['txtDetail']?>
          <textarea name="txtFiled[<?php echo $data['id']?>]" cols="40" rows="5" id="txtFiled[<?php echo $data['id']?>]"><?php echo $data['txtDetail']?></textarea> <script language="javascript1.2" type="text/javascript">
 			 generate_wysiwyg('txtFiled[<?php echo $data['id']?>]');
		</script></td>
        <td align="right" class="txtDetail12">
          <input name="eletric2[<?php echo $data['id']?>]" type="text"   value="<?php echo $data['eletric']?>"  onclick="this.select();" size="4" maxlength="5" />
       </td>
        <td align="right" class="txtDetail12">
          <input name="color2[<?php echo $data['id']?>]" type="text"   value="<?php echo $data['color']?>"   onclick="this.select();" size="4" maxlength="5" />
    </td>
        <td align="right" class="txtDetail12">
          <input name="wood2[<?php echo $data['id']?>]" type="text" class="textinputNormal" value="<?php echo $data['wood']?>"  onclick="this.select();" size="4" maxlength="5" />
       </td>
        <td align="right" class="txtDetail12">
          <input name="concreat2[<?php echo $data['id']?>]" type="text" class="textinputNormal" onclick="this.select();" value="<?php echo $data['concreat']?>" size="4" maxlength="5" />
      </td>
        <td align="right" class="txtDetail12">
          <input name="iron2[<?php echo $data['id']?>]" type="text" class="textinputNormal"  onclick="this.select();" value="<?php echo $data['iron']?>" size="4" maxlength="5" />
      </td>
        <td align="right" class="txtDetail12">
          <input name="worker2[<?php echo $data['id']?>]" type="text" class="textinputNormal"  onclick="this.select();" value="<?php echo $data['worker']?>" size="4" maxlength="5"  />
       </td>
        <td align="right" class="txtDetail12">
          <?php  echo $data['total'];?>
       </td>
        <td align="center"><input name="Submit" type="submit" onclick="document.dailyForm.action2.value='UpdateData';							document.dailyForm.EditDataID.value=<?php echo $data['id']?>;" value="แก้ไข" />
        <!--<a href="#" onclick="EditThisData('<?php echo $data['id']?>')" title="แก้ไข">
        <img src="images/icons/brown_dark/wrench_16x16.png" width="16" height="16"  border="0"/></a> --></td>
        <td align="center">
        <a href="#" onclick="deleteThisData('<?php echo $data['id']?>')" title="ลบ">
        <img src="images/icons/brown_dark/x_alt_16x16.png" width="16" height="16" border="0" /></a></td>
      </tr>
      <?php $n++; } ?>
    </table></td>
    </tr>
</table></div>
</form>
<?php }else{
			include('work_dailylist.php');
	}?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#EDEDDC">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
