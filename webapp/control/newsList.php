<?php
		$thisFile= basename($PHP_SELF);
		$rowPerPage=20;
			if((!$_GET['page'])||($_GET['page']==1)){
						$_GET['page']=1;
						$startRow=0;
			}else{
					$startRow=($_GET['page']-1)*$rowPerPage;
			}		

		if($_POST['action']=='DELETE'){
				$query = "SELECT * FROM tbl_act3_pic WHERE model_data_id = '".$_POST['EditID']."' ";
				$result = mysql_query($query);
					while($data=mysql_fetch_assoc($result)){
								if(file_exists($path_event_model.$data['pic_name'])){
									remove_image($data['pic_name'],$path_event_model);
								}
					}
				$query = "DELETE FROM tbl_act3_pic WHERE model_data_id ='".$_POST['EditID']."'  ";
				mysql_query($query);		
					
				$query="DELETE FROM tbl_act3_data WHERE id= '".$_POST['EditID']."' ";
				mysql_query($query);

		}
		
		if($_POST['selectCateID']){ 
			$query="SELECT * FROM tbl_act3_data  WHERE cate_id='".$_POST['selectCateID']."' ORDER BY id DESC   ";
		}else{ 
			$query="SELECT * FROM tbl_act3_data   ORDER BY id DESC   ";
		}
		$queryLimit = $query." LIMIT $startRow, $rowPerPage ";
		$result=mysql_query($queryLimit);
		$result2=mysql_query($query);		
		$xrow=mysql_num_rows($result2);
		$totalPage=ceil($xrow/$rowPerPage);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
				//--------------------------------		
			function  FormValid(){
				     if(document.form1.cate_name.value==''){
						 		alert("กรุณาใส่ชื่อ หมวดสินค้า ");
								return false;
					}else { 	
							document.form1.action.value = 'AddPack';
						}
				}
			//---------------------------------------------------
	      function EditThis(ids,nums){
			  		document.form1.EditID.value=ids;			  		
			  		document.form1.num.value=nums;
			  		document.form1.action.value = 'EditCate';
					document.form1.submit();
			  }		
			//---------------------------------------------------
		 function DeleteThis(ids,img){
			 	if(confirm('ต้องการลบรายการนี้')){
			  		document.form1.EditID.value=ids;			  		
			  		document.form1.action.value = 'DELETE';
			  		document.form1.img.value = img;					
					document.form1.submit();						
				 }else{
					 	return false;
					 }
			 
			 }
			
			
</script>
</head>

<body>
<form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1" onSubmit="return FormValid();">
	<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td class="txt10-black"><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr class="txt10-black">
          <td width="100%" height="30" align="left" bgcolor="#FFFFFF" class="txt10-black" ><img src="images/black_icon/16x16/notepad_2.png" width="16" height="16" hspace="5" align="absmiddle" />ข่าวและกิจกรรม  
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="EditID" id="EditID" />            
            <input type="hidden" name="img" id="img" />  
            <a href="main.php?work=articleAdd"><img src="images/black_icon/16x16/sq_plus.png" width="16" height="16" hspace="5" border="0" align="absmiddle" />เพิ่มบทความใหม่</a></td>
        </tr>
        <tr>
          <td align="left" class="txt10-black"><table width="100%" border="0" cellspacing="1" cellpadding="1">
             <tr>
              <td align="center" bgcolor="#E1E1E1">&nbsp;</td>
              <td bgcolor="#E1E1E1">&nbsp;</td>
              <td width="66" align="center" bgcolor="#E1E1E1">รายละเอียด</td>
              <td width="39" align="center" bgcolor="#E1E1E1">ลบ</td>
              </tr>
            <?php $n=1;while($data=mysql_fetch_assoc($result)){ ?>
            <tr>
              <td width="16" align="center"><img src="images/black_icon/16x16/rnd_br_next.png" width="16" height="16" /></td>
              <td><?php echo $data['topic']?>&nbsp;</td>
              <td align="center">
                <a href="main.php?work=articleAdd&currentID=<?php echo $data['id']?>"><img src="images/black_icon/16x16/zoom.png" width="16" height="16" border="0" /></a>
              </td>
              <td align="center">
              <a href="javascript:void(0)" onclick="DeleteThis('<?php echo $data['id']?>','<?php echo $data['bannerFile']?>')" title="ลบ รายการนี้">
              <img src="images/black_icon/16x16/delete.png" width="16" height="16" border="0" /></a></td>
              </tr>
         
            <tr>
              <td height="1" colspan="4" align="center" bgcolor="#E1E1E1"></td>
              </tr>
              <?php $n++; }?>
          </table>
            <br />
            Page :
            <?php //$thisFile= $thisFile."?show=$show&selectCateID=".$_GET['selectCateID']; //PageDisplay($query,$rowPerPage,$page,$thisFile)
						for($i=1;$i<=$totalPage;$i++){ ?>
            <a href="main.php?work=newsList&page=<?php echo $i?>" >
            <?php		if($i==$_GET['page'])echo "<b><font size='+1'> ";
									         	echo  $i." ";
									          	if($i==$_GET['page'])echo "</font></b>";
										?>
            </a>
            <?php 	}  //echo "<br>".$_POST['page'];?></td>
          </tr>
      </table></td>
  </tr>
  </table>
</form>
</body>
</html>