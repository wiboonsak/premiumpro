<?php 
			$monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");	
	$CurrentYear=date("Y");
	$CurrentDate=date("d"); 
	$CurrentMonth=date("m"); 
	$yearStart=2011; 
	$RangeYear=$CurrentYear-$yearStart;
		//---------------select project --------------//
	$query="SELECT a.*, b.cate_name  FROM  tbl_project_user a "
				 ." LEFT JOIN tbl_product_cate b ON a.projectID=b.id "
				 ." WHERE a.userID ='".$_SESSION['UserID']."'	";
	$resultProjectUser=mysql_query($query);
 //--------------Head data ------------------//
 if($_POST['day']==''){
	 		$_POST['day']=$CurrentDate;
	 }
 if($_POST['month']==''){
	 		$_POST['month']=$CurrentMonth;
	 }	 
 if($_POST['year']==''){
	 		$_POST['year']=$CurrentYear;
	 }
  $selectReportDate=	 	$_POST['year']."-" .$_POST['month']."-".$_POST['day'];
	
  $query="SELECT * FROM tbl_daily_report_head WHERE projectID = '".$_POST['projectID']."' AND  report_date ='".$selectReportDate."' ";
  $resultHead=mysql_query($query);
  $dataHead=mysql_fetch_assoc($resultHead);
  //-----------daily data-------------//
  $query="SELECT * FROM tbl_daily_report_detail WHERE headID= '".$dataHead['id']."' ";
  $resultData=mysql_query($query);
  
  if($_POST['day']){ $CurrentDate=$_POST['day'];}
  if($_POST['month']){ $CurrentMonth=$_POST['month'];} 	
  if($_POST['year']){ $CurrentYear=$_POST['year'];}
	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript">
		function gotoUrl(){
						if(document.form3.projectID.value=='x'){
								return false;
							}	
			}
</script>

<link href="style1.css" rel="stylesheet" type="text/css">

<p>
<div class="header2">กรุณาเลือกโครงการ  <strong>
<form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form3" onSubmit="return gotoUrl()">
  <select name="projectID" id="projectID">
    <option value="x">---กรุณาเลือกโครงการ---</option>
    <?php while($project=mysql_fetch_assoc($resultProjectUser)){ ?>
    <option value="<?php echo $project['projectID']?>" <?php if( $_POST['projectID']==$project['projectID']) echo "selected";?> > <?php echo $project['cate_name']?></option>
    <?php } ?>
  </select>
 &nbsp;
  <select name="day" id="day">
    <option value="x">เลือกวัน</option>
    <?php for($i=1;$i<32;$i++){   if($i<10){ $value="0".$i;}else{ $value=$i; }?>
    <option value="<?php echo $value?>" <?php if($value==$CurrentDate){ echo "selected";}?>><?php echo $i?></option>
    <?php }?>
  </select>
  &nbsp;
  <select name="month" id="month">
    <option value="x">เลือกเดือน</option>
    <?php  while($month=each($monthArray)){ ?>
    <option value="<?php echo $month['key']?>" <?php if($month['key']==$CurrentMonth){ echo "selected";}?>><?php echo $month['value']?></option>
    <?php }?>
  </select>
  &nbsp;
  <select name="year" id="year">
    <option value="x">เลือกปี</option>
    <?php for($i=0;$i <= $RangeYear;$i++){ 
									$yearValue= $yearStart+$i;
									$yearShow=($yearStart+$i)+543;
					?>
    <option value="<?php echo $yearValue?>" <?php if($yearValue==$CurrentYear){ echo "selected";}?>><?php echo $yearShow?></option>
    <?php } ?>
  </select>
 
  <input type="submit" name="button" id="button" value="  ค้นหา ">
</form>
</strong></div>

</p>
<div class="boxWhite">วัน 
<?php if($_POST['projectID']){?>
<?php
			$num = cal_days_in_month(CAL_GREGORIAN, $_POST['month'], $_POST['year']); // 31
			 for($i=1;$i<=$num;$i++){   if($i<10){ $value="0".$i;}else{ $value=$i; }?>
  <a href="#" onclick="document.form3.day.value='<?php echo $value?>';document.form3.submit(); ">
                    <span  class="buttonDay"> <?php echo $i?> </span></a>
                    &nbsp;
			<?php   }
  }?><br /><br />
  <table width="100%" border="0">
    <tr>
      <td width="49%"><div class="boxWhite">        <span class="header2">ผู้รายงาน   : <?php echo  $dataHead['report_name']?></span><br />
          <span class="header2"> ผู้ตรวจสอบ   : <?php echo  $dataHead['approve_name']?></span><br><br>
      </div></td>
      <td width="51%"><table width="432" border="0" cellpadding="1" cellspacing="1" >
        <tr>
          <td width="92" height="25" bgcolor="#F4F4F4">สภาพอากาศ</td>
          <td width="91" align="center" bgcolor="#F4F4F4">ท้องฟ้าโปร่ง</td>
          <td width="65" align="center" bgcolor="#F4F4F4">มีแดดจัด</td>
          <td width="64" align="center" bgcolor="#F4F4F4">ฝนตก</td>
          <td width="92" align="center" bgcolor="#F4F4F4">ท้องฟ้ามีเมฆ</td>
        </tr>
        <tr>
          <td align="center"><strong>เช้า</strong></td>
          <td align="center"><input name="weather_clear_am" type="checkbox" id="weather_clear_am" value="1" <?php if($dataHead['weather_clear_am']=='1') echo "checked";?>  disabled="disabled" /></td>
          <td align="center"><input name="weather_clearsun_am" type="checkbox" value="1"  <?php if($dataHead['weather_clearsun_am']=='1') echo "checked";?>  disabled="disabled"/></td>
          <td align="center"><input name="weather_rain_am" type="checkbox" i value="1"  <?php if($dataHead['weather_rain_am']=='1') echo "checked";?>  disabled="disabled"/></td>
          <td align="center"><input name="weather_cloud_am" type="checkbox"  value="1" <?php if($dataHead['weather_cloud_am']=='1') echo "checked";?>  disabled="disabled" /></td>
        </tr>
        <tr>
          <td align="center" bgcolor="#FFF9F2"><strong>บ่าย</strong></td>
          <td align="center" bgcolor="#FFF9F2"><input name="weather_clear_pm" type="checkbox" value="1" <?php if($dataHead['weather_clear_pm']=='1') echo "checked";?>   disabled="disabled" /></td>
          <td align="center" bgcolor="#FFF9F2"><input name="weather_clearsun_pm" type="checkbox" value="1" <?php if($dataHead['weather_clearsun_pm']=='1') echo "checked";?>   disabled="disabled" /></td>
          <td align="center" bgcolor="#FFF9F2"><input name="weather_rain_pm" type="checkbox" value="1"  <?php if($dataHead['weather_rain_pm']=='1') echo "checked";?>  disabled="disabled" /></td>
          <td align="center" bgcolor="#FFF9F2"><input name="weather_cloud_pm" type="checkbox" value="1"  <?php if($dataHead['weather_cloud_pm']=='1') echo "checked";?>  disabled="disabled" /></td>
        </tr>
      </table></td>
    </tr>
    
    <tr>
      <td colspan="2" class="header2">รายละเอียดของรายการ : <?php GetThaiDate($selectReportDate)?></td>
    </tr>
    <tr>
      <td colspan="2"><table width="100%" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td width="6%" height="25" align="center" bgcolor="#EBEBEB">ลำดับที่</td>
          <td width="43%" align="center" bgcolor="#EBEBEB">รายการ</td>
          <td width="6%" align="center" bgcolor="#EBEBEB">ช่างไฟ </td>
          <td width="5%" align="center" bgcolor="#EBEBEB">ช่างสี</td>
          <td width="6%" align="center" bgcolor="#EBEBEB">ช่างไม้</td>
          <td width="6%" align="center" bgcolor="#EBEBEB">ช่างปูน</td>
          <td width="7%" align="center" bgcolor="#EBEBEB">ช่างเหล็ก</td>
          <td width="6%" align="center" bgcolor="#EBEBEB">กรรมกร</td>
          <td width="6%" align="center" bgcolor="#EBEBEB">รวม</td>
          </tr>
        <?php $n=1; while($data=mysql_fetch_assoc($resultData)){ if($n%2){$bgcolor='#FFF'; }else{ $bgcolor='#F4F4F4';}?>
        <tr bgcolor="<?php echo $bgcolor?>"  onMouseover="this.style.backgroundColor='#EDEDDC'" onmouseout="this.style.backgroundColor='<?php echo $bgcolor?>'">
          <td height="25" align="center"  class="txtDetail12"><?php echo $n?></td>
          <td class="txtDetail12">&nbsp;<?php echo $data['txtDetail']?></td>
            <td align="right" class="txtDetail12"><?php echo $data['eletric']?>&nbsp;</td>
        <td align="right" class="txtDetail12"><?php echo $data['color']?>&nbsp;</td>
        <td align="right" class="txtDetail12"><?php echo $data['wood']?>&nbsp;</td>
        <td align="right" class="txtDetail12"><?php echo $data['concreat']?>&nbsp;</td>
        <td align="right" class="txtDetail12"><?php echo $data['iron']?>&nbsp;</td>
        <td align="right" class="txtDetail12"<?php echo $data['worker']?>>&nbsp;</td>
        <td align="right" class="txtDetail12">
          <?php  echo $data['total'];//echo ($data['txtDetail']+$data['eletric']+$data['color']+$data['wood']+ $data['concreat']+$data['iron']+$data['worker'])?>
          &nbsp;
        </td>
          </tr>
        <?php $n++; } ?>
      </table></td>
    </tr>
  </table>
</div>
