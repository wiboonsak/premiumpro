<?php 
			$error=0;
	        $prefix="gallery";
			$dstdir=$path_product.$prefix.$_POST['EditID']."/";
	//-------------------------------------------------------------------------------------				
    if($_POST['action']=='addFirstPage'){	
			$query="UPDATE tbl_gallery_data SET firstpage='0' ";
			mysql_query($query);
			$query="UPDATE tbl_gallery_data SET firstpage='1' WHERE id = '".$_POST['EditID']."' ";
			mysql_query($query);
	}
	//-------------------------------------------------------------------------------------		
    if($_POST['action']=='DELETE'){
				/*$query="SELECT * FROM tbl_room_image WHERE room_id = '".$_POST['EditID']."'  ";
				$result=mysql_query($query);
				while($data=mysql_fetch_assoc($result)){
					  @unlink($dstdir.$data['img_name']);
					  @unlink($dstdir."thb/".$data['img_name']); 
				}*/
				$query="DELETE FROM tbl_gallery_data WHERE id = '".$_POST['EditID']."' ";
				mysql_query($query);	
				$query="DELETE FROM tbl_gallery_images WHERE room_id= '".$_POST['EditID']."' ";
				mysql_query($query);		
				recursive_remove_directory($dstdir);					
		}


   //-------------------------------------------------------------	
    $query="SELECT * FROM  tbl_gallery_data   ORDER BY id  DESC ";
	$result=mysql_query($query);

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
			//---------------------------------------------------
			function AddFirstPage(ids){
			  		document.form1.EditID.value=ids;			  		
			  		document.form1.action.value = 'addFirstPage';
					document.form1.submit();								
				}
			 
			
			
</script>
</head>

<body>
<form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form1" onSubmit="return FormValid();">
	<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td class="txt10-black"><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr class="txt10-black">
          <td width="100%" height="30" align="left" bgcolor="#ECECD9" class="txt10-black" ><img src="images/black_icon/16x16/notepad_2.png" width="16" height="16" hspace="5" align="absmiddle" />gallery list 
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="EditID" id="EditID" />            
            <input type="hidden" name="img" id="img" />  
            <a href="main.php?work=galleryAdd"><img src="images/black_icon/16x16/sq_plus.png" width="16" height="16" hspace="5" border="0" align="absmiddle" />เพิ่ม gallery</a></td>
        </tr>
        <tr>
          <td align="left"><table width="100%" border="0" cellspacing="1" cellpadding="1">
             <tr>
              <td align="center" bgcolor="#E1E1E1">&nbsp;</td>
              <td width="619" bgcolor="#E1E1E1">&nbsp;</td>
              <td width="2" align="center" bgcolor="#E1E1E1"><!--หน้าแรก --></td>
              <td width="89" align="center" bgcolor="#E1E1E1">รายละเอียด</td>
              <td width="74" align="center" bgcolor="#E1E1E1">ลบ</td>
              </tr>
            <?php $n=1;while($data=mysql_fetch_assoc($result)){ ?>
            <tr>
              <td width="16" align="center"><img src="images/black_icon/16x16/rnd_br_next.png" width="16" height="16" /></td>
              <td>&nbsp;<?php echo $data['gallery_name']?></td>
              <td align="center">
              <!--<input type="radio" name="radio" id="radio" value="radio" onclick="AddFirstPage('<?php echo $data['id']?>')"  <?php if($data['firstpage']=='1') echo "checked";?>/> -->
              </td>
              <td align="center">
                <a href="main.php?work=galleryAdd&currentID=<?php echo $data['id']?>"><img src="images/black_icon/16x16/zoom.png" width="16" height="16" border="0" /></a>
              </td>
              <td align="center">
              <a href="javascript:void(0)" onclick="DeleteThis('<?php echo $data['id']?>','<?php echo $data['bannerFile']?>')" title="ลบ รายการนี้">
              <img src="images/black_icon/16x16/delete.png" width="16" height="16" border="0" /></a></td>
              </tr>
         
            <tr>
              <td height="2" colspan="5" align="center" bgcolor="#E1E1E1"></td>
              </tr>
              <?php $n++; }?>
          </table></td>
          </tr>
      </table></td>
  </tr>
  </table>
</form>
</body>
</html>