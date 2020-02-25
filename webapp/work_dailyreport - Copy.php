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

<div class="header2">รายงานประจำวัน</div>
<?php 
	$monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");	
$CurrentYear=date("Y");
$CurrentDate=date("d"); 
$CurrentMonth=date("m"); 
$yearStart=2012; 
$RangeYear=$CurrentYear-$yearStart;
//------------------------------------------------------------------------------

?>
<div class="txtDetail12">
<p><strong>โตรงการ </strong><strong>
  <select name="projectID" id="projectID">
    <option value="x">---กรุณาเลือกโครงการ---</option>
    <option value="--">---</option>
  </select>
  <br />
  ประจำวันที่</strong>&nbsp;&nbsp;
  <select name="day" id="day">
    <option value="x">---เลือกวัน---</option>
    <?php for($i=1;$i<32;$i++){   if($i<10){ $value="0".$i;}else{ $value=$i; }?>
    <option value="<?php echo $value?>" <?php if($value==$CurrentDate){ echo "selected";}?>><?php echo $i?></option>
    <?php }?>
  </select>
  <select name="month" id="month">
    <option value="x">--เลือกเดือน--</option>
    <?php  while($month=each($monthArray)){ ?>
    <option value="<?php echo $month['key']?>" <?php if($month['key']==$CurrentMonth){ echo "selected";}?>><?php echo $month['value']?></option>
    <?php }?>
  </select>
  <select name="year" id="year">
    <option value="x">---เลือกปี---</option>
    <?php for($i=0;$i <= $RangeYear;$i++){ 
									$yearValue= $yearStart+$i;
									$yearShow=($yearStart+$i)+543;
					?>
    <option value="<?php echo $yearValue?>" <?php if($yearValue==$CurrentYear){ echo "selected";}?>><?php echo $yearShow?></option>
    <?php } ?>
  </select>
  <br />
  <br />
  <strong>สภาพอากาศ</strong><br />
</p>
<table width="432" border="1" cellpadding="1" cellspacing="1">
  <tr>
    <td width="55" height="25" bgcolor="#F4F4F4">&nbsp;</td>
    <td width="88" align="center" bgcolor="#F4F4F4" class="txtDetail12">ท้องฟ้าโปร่ง</td>
    <td width="80" align="center" bgcolor="#F4F4F4" class="txtDetail12">มีแดดจัด</td>
    <td width="87" align="center" bgcolor="#F4F4F4" class="txtDetail12">ฝนตก</td>
    <td width="88" align="center" bgcolor="#F4F4F4" class="txtDetail12">ท้องฟ้ามีเมฆ</td>
    </tr>
  <tr>
    <td align="center"><strong>เช้า</strong></td>
    <td align="center"><input type="checkbox" name="checkbox" id="checkbox" /></td>
    <td align="center"><input type="checkbox" name="checkbox3" id="checkbox3" /></td>
    <td align="center"><input type="checkbox" name="checkbox5" id="checkbox5" /></td>
    <td align="center"><input type="checkbox" name="checkbox7" id="checkbox7" /></td>
    </tr>
  <tr>
    <td align="center" bgcolor="#FFF9F2"><strong>บ่าย</strong></td>
    <td align="center" bgcolor="#FFF9F2"><input type="checkbox" name="checkbox2" id="checkbox2" /></td>
    <td align="center" bgcolor="#FFF9F2"><input type="checkbox" name="checkbox4" id="checkbox4" /></td>
    <td align="center" bgcolor="#FFF9F2"><input type="checkbox" name="checkbox6" id="checkbox6" /></td>
    <td align="center" bgcolor="#FFF9F2"><input type="checkbox" name="checkbox8" id="checkbox8" /></td>
  </tr>
</table>
<br />
ผู้รายงาน 
<input name="textfield" type="text" id="textfield" size="40" />
<br />
ผู้ตรวจสอบ
<input name="textfield2" type="text" id="textfield2" size="40" />
<br />
<br />
<br />
<table width="450" border="0" cellpadding="1" cellspacing="1">
  <tr>
    <td width="281" bgcolor="#F4F4F4" class="header2">รายการ</td>
    </tr>
  <tr>
    <td><textarea name="xxxx" cols="40" id="xxxx" rows="3"></textarea><script language="javascript1.2">
 			 generate_wysiwyg('xxxx');
		</script></td>
    </tr>
  <tr>
    <td bgcolor="#F4F4F4">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#F4F4F4">&nbsp;</td>
  </tr>
</table>
</div>