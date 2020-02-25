<?php 
	$error=0; 			 $path_product="../background_img/";
    if($_POST['action']=='DelteCate'){
				//-----------------Count sub cate  & product-------------------//
				//$query="SELECT SUM(id) SumCate FROM tbl_product_cate WHERE mainCateId='".$_POST['EditID']."'  ";
				//$result=mysql_query($query);
				//$data=mysql_fetch_assoc($result);
				//if($data['SumCate'] > 0) {  $cateError='กรุณาลบหมวดย่อยก่อนจะลบหมวดนี้ ';  $error=1; }
				//$query="SELECT SUM(id) SumProduct FROM tbl_product_data WHERE MainCate = '".$_POST['EditID']."'  ";
				//$result=mysql_query($query);
				//$data=mysql_fetch_assoc($result);
				//if($data['SumProduct'] > 0) {  $proError='กรุณาลบรายการสินค้าให้หมดก่อนจะลบหมวดสินค้านี้ '; $error=1; }
				$error=0;
				if($error==1){ ?>
						<script language="javascript">
                        		alert('<?php echo $cateError?> <?php echo $proError?>');
								//window.location.href='main.php?work=addCategory1';
								window.location.href='main.php?work=addCategory1&group=1';
                        </script>
					<?php }else{
						 $query="DELETE FROM tbl_product_cate WHERE id='".$_POST['EditID']."' ";
						 mysql_query($query);
						 //------------delete background-----------//
						 if(file_exists($path_product.$_POS['backgroundImg'])){
							 		@unlink($path_product.$_POS['backgroundImg']);
							 }
						 if(file_exists($path_product."thb/".$_POS['backgroundImg'])){
							 		@unlink($path_product."thb/".$_POS['backgroundImg']);
							 }							 
						 //-----------sort new number
						    $query="SELECT * FROM  tbl_product_cate WHERE  mainCateId='0'  ORDER BY number  ASC ";
							$result=mysql_query($query);
							$n=1;
							while($cate=mysql_fetch_assoc($result))
							{
								$query="UPDATE tbl_product_cate SET number='".$n."' WHERE id ='".$cate['id']."'  ";
								mysql_query($query);
								$n++;
								}
						}
				
		}
	//-------------------------------------------------------------cate_img
       if($_POST['action']=='AddPack'){
		   
		   	 //-----------------------BACK GROUND IMG----------------------------------//

			if($_FILES['uploadfile']['name']!=""){
							// $tempFileName = $_FILES['uploadfile']['name'];
							   GetNewFileName($_FILES['uploadfile']['tmp_name'],$_FILES['uploadfile']['name'],$i);
								move_uploaded_file($_FILES['uploadfile']['tmp_name'], $path_product.$_FILES['uploadfile']['name']);
			 }
			 //-----------------------------------------------------------------------//
		   $query="SELECT MAX(number) AS maxNumber FROM tbl_product_cate ";
		   $result=mysql_query($query);
		   $max=mysql_fetch_assoc($result);
		   $numberAdd= $max['maxNumber']+1;
		   $query="INSERT INTO  `tbl_product_cate` (`id` ,`cate_name` ,`mainCateId` ,`number` ,`category_group`, `cate_bg`) VALUES ('' ,  '".$_POST['cate_name']."'  , '0',  '".$numberAdd."' , '".$_GET['group']."'  , '".$_FILES['uploadfile']['name']."' ) ";
		   mysql_query($query);
		   

		   
		}
   //-------------------------------------------------------------
         if($_POST['action']=='EditCate'){
		 		$query="UPDATE tbl_product_cate SET `cate_name` =  '".$_POST['textfield'][$_POST['num']]."'   WHERE id = '".$_POST['EditID']."' ";
				  mysql_query($query);
		 }
		 if($_POST['action']=='Sort')
	{
   //-------------------------------------------------------------	
   	 switch($_POST['toSort']) {
				case "up"  : 
						$numberUpDate=$_POST['number']-1;
						$query="UPDATE tbl_product_cate SET number = number+1 WHERE number='".$numberUpDate."'  AND mainCateId='0'   ";
						mysql_query($query);
						$query="UPDATE tbl_product_cate SET number = number-1 WHERE id='".$_POST['EditID']."'     ";
						mysql_query($query);
						break;
				case "down"  : 
						$numberUpDate=$_POST['number']+1;
						$query="UPDATE tbl_product_cate SET number =number-1 WHERE number='".$numberUpDate."'  AND mainCateId='0'   ";
						mysql_query($query);
						$query="UPDATE tbl_product_cate SET number =number+1 WHERE id='".$_POST['EditID']."'   ";
						mysql_query($query);	
						break;	
		 }
		
	}//end Sort
   //-------------------------------------------------------------	
   $query="SELECT * FROM  tbl_product_cate WHERE  mainCateId='0' AND category_group='".$_GET['group']."' ORDER BY number  ASC ";
	$result=mysql_query($query);
$queryMax = "SELECT MAX(number) MaxNumber FROM  tbl_product_cate WHERE  mainCateId='0' ";
	$resultMax=mysql_query($queryMax);
	$dataMax=mysql_fetch_assoc($resultMax);
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
		 function DeleteThis(ids,bgimg){
			 	if(confirm('ต้องการลบรายการนี้')){
			  		document.form1.EditID.value=ids;			  		
			  		document.form1.action.value = 'DelteCate';
			  		document.form1.backgroundImg.value = bgimg;					
					document.form1.submit();						
				 }else{
					 	return false;
					 }
			 
			 }
			//---------------------------------------------------			
			    function sortThis(number, toSort , ids ){
		  				document.form1.number.value=number;
						document.form1.toSort.value=toSort;
						document.form1.EditID.value=ids;
						document.form1.action.value='Sort';
						document.form1.submit();
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
          <td width="26%" align="right" class="txt10-black">ชื่อโครงการ</td>
          <td width="74%"><input name="cate_name" type="text" id="cate_name" size="40" /></td>
        </tr>
        <tr>
          <td align="right">
            <input type="hidden" name="num"  />
            <input type="hidden" name="EditID"  />        
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="toSort" id="toSort" /> 
            <input type="hidden" name="number"  />     
            <input type="hidden" name="backgroundImg"  />          
            <input name="mainCateId" type="hidden" id="mainCateId" value="0" />
            </td>
          <td><input type="submit" name="button" id="button" value="เพิมหมวดสินค้า" /></td>
        </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="txt10-black">
          <td height="30" colspan="2" align="left" bgcolor="#FFFFFF" class="txt10-black" ><img src="images/black_icon/16x16/notepad_2.png" width="16" height="16" hspace="5" align="absmiddle" />category list</td>
          </tr>
        <tr>
          <td colspan="2" align="left"><table width="100%" border="0" cellspacing="1" cellpadding="1">
             <tr>
              <td align="center" bgcolor="#E1E1E1">&nbsp;</td>
              <td bgcolor="#E1E1E1">&nbsp;</td>
              <td align="center" bgcolor="#E1E1E1" class="txt10-black">แก้ไข</td>
              <td align="center" bgcolor="#E1E1E1" class="txt10-black">ลบ</td>
            </tr>
            <?php $n=1;while($data=mysql_fetch_assoc($result)){ ?>
            <tr>
              <td width="3%" align="center"><img src="images/black_icon/16x16/rnd_br_next.png" width="16" height="16" /></td>
              <td><input name="textfield[<?php echo $n?>]" type="text" id="textfield" size="50"  value="<?php echo $data['cate_name']?>"/></td>
              <td width="6%" align="center">
                <a href="javascript:void(0)"  onclick="EditThis('<?php echo $data['id']?>','<?php echo $n?>')" title="แก้ไข <?php echo $data['cate_name']?>">
                  <img src="images/black_icon/16x16/doc_edit.png" width="16" height="16" border="0" /></a></td>
              <td width="5%" align="center">
              <a href="javascript:void(0)" onClick="DeleteThis('<?php echo $data['id']?>', '<?php echo $data['cate_bg']?>')" title="ลบ <?php echo $data['cate_name']?>">
              <img src="images/black_icon/16x16/doc_delete.png" width="16" height="16" border="0" />
             </a>
              </td>
            </tr>
         
            <tr>
              <td height="1" colspan="4" align="center" bgcolor="#E1E1E1"></td>
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