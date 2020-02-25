<?php
		if($_POST['action']=='Sort'){
					if($_POST['toSort']=='up'){
							$numberUpdate=$_POST['number']-1;   //hiddenLoops[<?php echo $n
							$query="UPDATE tbl_product_data SET no='".$_POST['number']."' WHERE  id = '".$_POST['hiddenID'][$numberUpdate]."'   ";
							mysql_query($query);
							$query="UPDATE tbl_product_data SET  no = '".$numberUpdate."'  WHERE  id = '".$_POST['ids']."'   ";	
							mysql_query($query);
						}
					if($_POST['toSort']=='down'){
							$numberUpdate=$_POST['number']+1;
							$query="UPDATE tbl_product_data SET no='".$_POST['number']."' WHERE  id = '".$_POST['hiddenID'][$numberUpdate]."'   ";
							mysql_query($query);
							$query="UPDATE tbl_product_data SET  no = '".$numberUpdate."'  WHERE  id = '".$_POST['ids']."'   ";						
							mysql_query($query);						
						}						
			}
		
		///////////////////////////////////////////
		$queryMain = "SELECT * FROM tbl_category WHERE cate_lv='1' ORDER BY cate_name ";
		$resultMain = mysql_query($queryMain);
		 
		 if($_POST['MainCate']){
			$query="SELECT * FROM tbl_category WHERE main_cate_id='".$_POST['MainCate']."'  "; 
			$resultx=mysql_query($query);
			$subid='';
			while($subCateid=mysql_fetch_assoc($resultx)){
							$subid=$subid.",".$subCateid['id'];
				}
			//$subid=	 substr($subid, 1, -1);
			$subid= $_POST['MainCate'].$subid;
		 $queryProduct ="SELECT * FROM tbl_product_data WHERE cate_id IN( $subid ) ORDER BY no ASC ";
		 $resultProduct = mysql_query($queryProduct);
		 
		 $queryMax = "SELECT MAX(no) Maxx FROM tbl_product_data WHERE cate_id IN( $subid ) ";
		 $resultMax=mysql_query($queryMax);
		 $datamax=mysql_fetch_assoc($resultMax);
		 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<LINK 
href="images/style.css" type=text/css 
rel=stylesheet>
<style type="text/css">
<!--
body {
	margin-left: 1px;
	margin-top: 10px;
}
-->
</style>


<script language="JavaScript">
<!--
	function ChForm(){
			if(form1.product_name.value==''){
					alert("กรุณาใส่ชื่อข่าวสารด้วยคุ่ะ");
					return false;
		//	}
			//else if(form1.cate_id.value=='0'){
			//		alert("กรุณาเลือกหมวดสินค้าด้วยค่ะ");
			//		return false;
			//}
			// else if(form1.detail.value==''){
			//		alert("กรุณาใส่รายละเอียดด้วยคุ่ะ");
			//		return false;
			}else {
				form1.action.value='Add';
				form1.submit()
			}
	}
	function toDelete(id,act){
		 if(confirm('ต้องการหัวฃ้อนี้')){
		 		form2.action.value='delete';
				form2.KEY.value=id;
				form2.submit();
		 }else{
		 		return false();
		 }
	}
//-->
</script><script language="JavaScript" type="text/javascript" src="wysiwyg2.js"></script>
<LINK href="calendar.css" rel=stylesheet>
<SCRIPT language=JavaScript src="simplecalendar.js"></SCRIPT>
<script language="javascript">
      function sortThis(number, toSort , ids ){
		  				form2.number.value=number;
						form2.toSort.value=toSort;
						form2.ids.value=ids;
						form2.action.value='Sort';
						form2.submit();
		  }
</script>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body class="cat_desc">
<form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="form2" enctype="multipart/form-data">
  <table width="780" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td width="18%" height="25" align="right">กรุณาเลือกหมวด </td>
      <td width="82%">
      <select name="MainCate" id="MainCate" onchange="form2.submit()">
       <option>-------</option>
       <?php while($mainCate=mysql_fetch_assoc($resultMain)){?>
         			<option value="<?php echo $mainCate['id']?>" <?php if($_POST['MainCate']==$mainCate['id']) echo "selected";?>><?php echo $mainCate['cate_name']?></option>   
          <?php } ?>
      </select>
      <input type="hidden" name="number" id="number" />
      <input type="hidden" name="toSort" id="toSort" /> <input type="hidden" name="ids" id="ids" /> <input type="hidden" name="action" id="action" /></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#CCCCCC">
      <table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr class="navbar_selected">
          <td height="25" align="center" bgcolor="#FFFFCC">&nbsp;</td>
          <td height="25" colspan="2" align="center" bgcolor="#FFFFCC" class="txt10-black">ไทย</td>
          <td colspan="2" align="center" bgcolor="#FFFFCC" class="txt10-black">อังกฤษ</td>
          <td height="25" align="center" bgcolor="#FFFFCC" class="txt10-black">เลื่อนขึ้น</td>
          <td height="25" align="center" bgcolor="#FFFFCC" class="txt10-black">เลื่อนลง</td>
        </tr>
      <?php if($_POST['MainCate']){  $n=1; 
	  						while($data=mysql_fetch_assoc($resultProduct)){ 
	  						if($data['no']==0){
										$query="UPDATE tbl_product_data SET no ='".$n."' WHERE id = '".$data['id']."'  ";
										mysql_query($query);
								}	
	  ?>
        <tr onMouseOver="this.bgColor = '#E0E0C2'"  onMouseOut ="this.bgColor = '#FFFFFF'" bgcolor="#FFFFFF">
          <td width="4%" height="25" align="center" ><img src="images/bullet4.gif" width="13" height="13" /></td>
          <td width="30%" height="25"><?php echo $data['topic']?> 
          <input name="hiddenID[<?php echo $data['no']?>]" type="hidden" value="<?php echo $data['id']?>" /></td>
          <td width="9%"><?php echo $data['id']?></td>
          <td width="32%" ><?php echo $data['topic_en']?></td>
          <td width="8%" align="center"> [<?php echo $data['no']?>]</td>
          <td width="9%" height="25" align="center" >
          <?php if($data['no'] >1){ ?>
          <a href="#" onclick="sortThis('<?php echo $data['no']?>','up', '<?php echo $data['id']?>' )">
          <img src="images/uparrow-1.png" width="12" height="12" border="0" /></a>
          <?php }?>
          </td>
          <td width="8%" height="25" align="center" >
            <?php if($data['no'] < $datamax['Maxx']){ ?>
            <a href="#" onclick="sortThis('<?php echo $data['no']?>','down', '<?php echo $data['id']?>' )">
          <img src="images/downarrow-1.png" width="12" height="12" border="0" /></a>
          <?php } ?>
          </td>
        </tr>
        
        <?php $n++; }  }?>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;<?php //echo $_POST['MainCate']?></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form></body>
</html>
<?php mysql_close($link);?>