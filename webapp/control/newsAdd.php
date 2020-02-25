<?php
			$monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");	
		$currentDate=date("d");
		$currentMonth= date("m");
		$currentMonthname= date("m");			
		$currentYear= date("Y");	
			//------------------------------------------------------------------------
			if($_GET['currentID']){
					$_POST['currentID']=$_GET['currentID'];
			}
			//-----------------------------Date------------------------------------
			setlocale (LC_TIME, 'th');
			
			if(!$sdate) { $sdate= strftime("%Y-%m-%d"); }else{ $sdate=$sdate; }
			$time=strftime("%H:%M:%S");
			$time_sec=explode(":",$time);
			$time_array = explode(":",$time);	
		####################################################
		if($_POST['action']=='Delete'){
				 if(file_exists($path_product."/".$_POST['RmPic'])){
				 			@unlink ($path_product."/".$_POST['RmPic']);
				 }
				   $query="DELETE FROM tbl_act3_video WHERE id = '".$_POST['dataID']."' ";
					  mysql_query($query);
		}
		####################################################
			if($_POST['action']=='deletePic'){
				 if(file_exists($path_product."/thb/".$_POST['RmPic'])){
				 			@unlink ($path_product."/thb/".$_POST['RmPic']);
				 }
				 if(file_exists($path_product."/".$_POST['RmPic'])){
				 			@unlink ($path_product."/".$_POST['RmPic']);
				 }
				 $query = "DELETE FROM  tbl_act3_pic WHERE  pic_name = '".$_POST['RmPic']."' ";
				 mysql_query($query);
			}
		####################################################checkInDay.checkInMonth.checkInYear
		if($_POST['action']=='Add'){
					$dateAdd= date("Y-d-m");
					 $_POST['product_name']=htmlspecialchars($_POST['product_name']);		
					 $date_post	 = $_POST['checkInYear']."-".$_POST['checkInMonth']."-".$_POST['checkInDay'];
					$query = "INSERT INTO `tbl_act3_data`  "
					."(`id` ,`topic` ,`topic_en` ,`detail` ,`detail_en` ,`date_post`, `cate_id`  ,`first_page` , `date_start` , `refer_from`) "
					."VALUES "
					." ('' , '".$_POST['product_name']."', '".$_POST['product_name_en']."', '".$_POST['detailth']."', '".$_POST['detail_en']."', '".$date_post."' ,'".$_POST['cate_id']."', '0'  ,'".$_POST['sdate']."' ,'".$_POST['refer_from']."' ) ";
					mysql_query($query);
					$_POST['currentID']= mysql_insert_id();
			}
		####################################################
		if($_POST['action']=='update'){
			 $_POST['product_name']=htmlspecialchars($_POST['product_name']);	
			  $date_post	 = $_POST['checkInYear']."-".$_POST['checkInMonth']."-".$_POST['checkInDay'];
			$query = "UPDATE `tbl_act3_data` SET  "
					." `topic` ='".$_POST['product_name']."'  ,`topic_en` =  '".$_POST['product_name_en']."' "
					." ,`detail`='".$_POST['detailth']."' ,`detail_en`='".$_POST['detail_en']."' , `cate_id`= '".$_POST['selectCateID']."'   ,`date_post` =  '". $date_post."'  "
					." , `refer_from` ='".$_POST['refer_from']."' , `date_start` = '".$_POST['sdate']."'  WHERE id = '".$_POST['currentID']."'  ";  //selectCateID
			mysql_query($query);
		}
		
		####################################################
		if($_POST['action2']=='addpic'){		
					if($_FILES['uploadfile']['name']!=""){
					 $tempFileName = $_FILES['uploadfile']['name'];
					GetNewFileName($_FILES['uploadfile']['tmp_name'],&$_FILES['uploadfile']['name'],$i);
					move_uploaded_file($_FILES['uploadfile']['tmp_name'], $path_product.$_FILES['uploadfile']['name']);
					$query = "INSERT INTO `tbl_act3_pic` "
						." (`id` ,`pic_name` ,`model_data_id`  ,`oldFilename`,`title_img` ) "
						." VALUES ('' , '".$_FILES['uploadfile']['name']."', '".$_POST['currentID']."' ,  '".$tempFileName."', '".$_POST['title_img']."') ";
						mysql_query($query);
					}
		}	
		####################################################		
		if($_POST['action2']=='editText'){
					$query="UPDATE tbl_act3_pic SET title_img='".$_POST['title'][$_POST['dataID']]."' WHERE id = '".$_POST['dataID']."' ";
					mysql_query($query);
			}
	
		####################################################
		if($_POST['currentID']){
				$query = "SELECT * FROM tbl_act3_data WHERE id = '".$_POST['currentID']."' ";
				$result = mysql_query($query);
				$currentData=mysql_fetch_assoc($result);
				$cate_id  =$currentData['cate_id'];
				$dateStartArray=explode("-",$currentData['date_start']);
				$CurrArray=explode("-",$currentData['date_post']);
						$currentDate=$CurrArray[2];
						$currentMonth=$CurrArray[1];
						$currentYear= $CurrArray[0];	
				$query = "SELECT * FROM `tbl_act3_pic` WHERE model_data_id = '".$_POST['currentID']."' ORDER BY id  ";
				$resultPic = mysql_query($query);

		}		
		####################################################	


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
          <td width="100%" align="left" bgcolor="#ECECD9"><a href="main.php?work=articleList"><img src="images/black_icon/16x16/br_prev.png" width="16" height="16" hspace="5" border="0" align="absmiddle" />Back  </a> &nbsp;&nbsp;<a href="main.php?work=articleAdd"><img src="images/black_icon/16x16/sq_plus.png" width="16" height="16" hspace="5" border="0" align="absmiddle" />เพิ่มบทความใหม่</a></td>
          </tr>
     <tr>
       <td align="left">
       <!--8888888888888888888888888888 -->
       <form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
        <td class="txt10-black"><table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td width="22%" height="11" align="right">ชื่อหัวข้อ</td>
            <td width="78%"><span >
              <input name="product_name" type="text" id="product_name" size="60" value="<?php echo $currentData['topic']?>" />
            </span></td>
          </tr>

          <tr>
            <td height="25" align="right">รายละเอียด</td>
            <td><span >
              <textarea name="detailth" cols="55" rows="15" id="detailth"><?php echo $currentData['detail']?></textarea><script language="javascript1.2">
 			 generate_wysiwyg('detailth');
		</script>
            </span></td>
          </tr>
           <tr>
            <td height="25" align="right">วันที่</td>
            <td><select name="checkInDay" id="checkInDay">
              <?php for($i=1;$i<=31;$i++){ 
							if($i<10){ $i= "0".$i;}	
				?>
              <option value="<?php echo $i?>" <?php if($currentDate==$i) echo "selected";?>><?php echo $i?></option>
              <?php } ?>
            </select>
-
<select name="checkInMonth" id="checkInMonth">
  <?php
		if($_POST['stopMonth']){  $currentMonth=$_POST['stopMonth'];}
		reset($monthArray); 
		while($month=each($monthArray)){ ?>
  <option value="<?php echo $month['key']?>" <?php if($currentMonth==$month['key']) echo "selected";?>><?php echo $month['value']?></option>
  <?php }?>
</select>
-
<select name="checkInYear" id="checkInYear">
  <?php
  if($_POST['stopYear']){ $currentYear=$_POST['stopYear']; }
  $startYear=$currentYear-1; for($i=1;$i<3;$i++){ ?>
  <option value="<?php echo $startYear+$i?>"<?php if($startYear+$i==$currentYear) echo "selected";?>><?php echo ($startYear+$i)+543?></option>
  <?php } ?>
</select></td>
          </tr>
          <tr>
            <td height="25" align="right">ที่มา</td>
            <td><span class="txt-8-red">
              <input name="refer_from" type="text" id="refer_from" size="50" value="<?php echo $currentData['refer_from']?>"  />
            ใส่ http://</span></td>
          </tr>
          <tr>
            <td height="25" align="right"><span >
            <input type="hidden" name="currentID" value="<?php echo $_POST['currentID']?>"/>
            <input type="hidden" name="RmPic" />
            </span></td>
            <td><span >
              <?php if($_POST['currentID']){?>
              <input name="Submit" type="submit"  value=" แก้ไขข้อมูล " onclick="form1.action.value='update'" />
              <?php }else{ ?>
              <input name="Submit" type="submit"  value=" เพิ่ม " onclick="form1.action.value='Add'" />
              <?php } ?>
              <input name="action" type="hidden" id="action" />
            </span></td>
          </tr>
          <tr>
            <td height="25" align="right">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="25" colspan="2" align="center"><?php if($_POST['currentID']){?>
              <table class="tableborder_full" height="138" cellspacing="0" cellpadding="0"  width="100%" border="0">
              <tbody>
                <tr>
                  <td 
          height="28" colspan="2" valign="top" nowrap="nowrap"  bgcolor="#DFDFDF" class="navbar_selected"><img src="images/black_icon/32x32/picture.png" width="32" height="32" hspace="3" vspace="3" align="absmiddle" />เพิ่มไฟล์รูปภาพ / เอกสาร</td>
                </tr>
                <tr>
                  <td height="40" bgcolor="#f0f0f0" >&nbsp;</td>
                  <td align="left" bgcolor="#f0f0f0" ><span class="error">หากท่านต้องการเพิ่มไฟล์รูปภาพ / เอกสาร&nbsp; ทำได้โดยกดปุ่ม Browse เพื่อทำการเลือกไฟล์ภาพ / เอกสาร จากนั้นกดปุ่มเพิ่มรูปภาพ/ไฟล์&nbsp;&nbsp; โดยระบบสามารถเพิ่มไฟล์ได้ไม่จำกัด&nbsp; และรูปภาพควรมีขนาดไม่เกิน  กว้าง 800 สูง 600 pixel 
                    (รองรับไฟล์&nbsp; .jpg &nbsp; .gif &nbsp; ); ขนาดไฟล์ไม่เกิน 2 เมกกะไบต์</span></td>
                </tr>
                <tr>
                  <td width="19" height="50" bgcolor="#f0f0f0" ><label></label></td>
                  <td width="765" align="left" bgcolor="#f0f0f0" >เลือกไฟล์
                    <input name="uploadfile" type="file" id="uploadfile" />
                    <input type="hidden" name="action2" id="action2" />
                    
                   <!-- คำบรรยายรูปภาพ 
                    <input name="title_img" type="text" id="title_img" size="60" maxlength="100" />
                    <br /> -->
                      <input name="Button2" type="button" value=" เพิ่มรูปภาพ / ไฟล์ " onclick="document.form1.action2.value='addpic';document.form1.submit()" /></td>
                </tr>
                <tr>
                  <td height="5" bgcolor="#f0f0f0" ></td>
                  <td bgcolor="#f0f0f0" ></td>
                </tr>
                <tr>
                  <td height="5" colspan="2" align="left" bgcolor="#FFFFFF" ><!-- ////////////// -->
                      <table width="" border="0" cellpadding="0" cellspacing="0" bgcolor="">
                        <tr>
                          <td><?php if($_POST['currentID']){ ?>
                              <table width="" border="0" cellpadding="5" cellspacing="5">
                                <tr>
                                  <?php 
    		$col=3;$n=1;
			$n_width=240;$n_height=150;
			$max_x =200;
			$max_y =200;
				while($pic = mysql_fetch_assoc($resultPic)){
					
   						echo "<td bgcolor='#F8F8F8' nowarp height=25  align ='center' valign='bottom'> "; 
						
						$info =  pathinfo($path_product."/".$pic['pic_name']);
						//echo $info[extension];
						$info[extension]=strtolower($info[extension]);
						if(($info[extension]=='pjpeg')  || ($info[extension]=='gif')  ||  ($info[extension]=='png')  ||  ($info[extension]=='x-png') || ($info[extension]=='jpeg') || ($info[extension]=='jpg')){
									 if(!file_exists($path_photo."/thb/".$path_product.$pic['pic_name'])){ 
										list($width, $height, $type, $attr) = getimagesize($path_product.$pic['pic_name']);
										create_thub($path_product."/",$pic['pic_name'],$n_width,$n_height);
									 }		
									echo "<a href='".$path_product."/".$pic['pic_name']."'  target='_blank'>";
									echo  "<img src='".$path_product."/thb/".$pic['pic_name']."' border =0>";
									echo  "</a>";
									echo "<br> "; ?>
                                      <!--<input type="text" size="30" name="title[<?php echo $pic['id']?>]" value="<?php echo $pic['title_img']?>" /><br />
									  <input name="Ebidbt<?php echo $pic['id']?>" type="button" value="แก้ไข" onclick="editText('<?php echo $pic['id']?>')" /> -->
								   <?php  echo "<br> ";
						}else{
								echo "<a href='".$path_product."/".$pic['pic_name']."'  target='_blank'>";
								echo "<img src='images/PNG/folder.png'/><br>";
								echo  $pic['oldFilename'];	
								echo  "</a>";
								echo "<br> ";
								echo  $pic['title_img'];
								//echo "<br> ";
							}
							echo "<a href=# onclick=removePic('".$pic['pic_name']."'); >";
						    echo "<img src='images/black_icon/16x16/round_delete.png' border=0 align =absmiddle hspace='5' vspace='5' />&nbsp;ลบ";
						   echo "</a></td> ";
					if($n==$col){ echo "</tr>\n"; $n=0;};	
					 $n++; 
				}
			?>
                                </tr>
                            </table>
                      
                              <table width="" border="0" cellpadding="5" cellspacing="5">
                                <tr> </tr>
                            </table></td>
                        </tr>
                      </table>
                    <?php }?>
                      <!-- ////////////// -->                  </td>
                </tr>
                
              </tbody>
            </table>
              <br />
              <?php }?></td>
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