<?php		header("Content-Type: text/plain; charset=utf-8");
			header("Cache-Control: no-cache,must-revalidate");
			header("Prdgma : no-cache");
			include('config.inc.php');
			//-----------------------------------------------------------
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
			//----------------------------------------------------------
			$query="SELECT * FROM tbl_product_cate WHERE mainCateId	 ='".$_POST['MainCateID']."' ";
			$result=mysql_query($query);
?>
		<select name="SubCateID" >
		 <option value=''>-----</option>
          <?php while($data=mysql_fetch_assoc($result)){?>
          <option value="<?php echo $data['id']?>" <?php if($data['id']==$_POST['SubCate']){ echo "selected";}?>><?php echo $data['cate_name']?></option>
          <?php } ?>
        </select>

<?php mysql_close();?>	
    
    
    