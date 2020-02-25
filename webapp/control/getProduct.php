<?php		header("Content-Type: text/plain; charset=utf-8");
			header("Cache-Control: no-cache,must-revalidate");
			header("Prdgma : no-cache");
			include('config.inc.php');
			//-----------------------------------------------------------
			$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
			mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
			//----------------------------------------------------------
			$query="SELECT * FROM tbl_product_data WHERE MainGroup ='".$_POST['cateID']."' ";
			$result=mysql_query($query);
?>
		<select name="productID">
		 <option value=''>-----</option>
          <?php while($data=mysql_fetch_assoc($result)){?>
          <option value="<?php echo $data['id']?>" <?php if($data['id']==$_POST['productID']){ echo "selected";}?>><?php echo $data['productName']?></option>
          <?php } ?>
        </select>

<?php mysql_close();?>	
    
    
    