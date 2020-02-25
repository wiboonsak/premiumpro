<?php
  class main_model extends CI_Model{
	  //---------------------------
	   function addbranch($branch_name){
		   $userupdate=$this->session->userdata('user_id');
		   $data = array(
				'branch_name' => $branch_name,
				'user_update' =>  $userupdate
		   	);

		   	if($this->db->insert('tbl_branch_data', $data)){
				$pass=1;
			}else{
				$pass=0;
			}
		   return $pass;
	   }
	  //---------------------------
	  function getBranchList($branchType=NULL){
	    $this->db->select('id,branch_name , last_update , branch_status ');
        $this->db->from('tbl_branch_data');
		$this->db->where('branch_status',$branchType);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
		 return $query;

	  }
	  //---------------------------
	  function getBranchList2($branchType=NULL){
	    $this->db->select('id,branch_name , last_update , branch_status ');
        $this->db->from('tbl_branch_data');
		$this->db->where('branch_status','0');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
		 return $query;

	  }
	  //--------------------------
	  function getBranchDetail($branchID){
		 $sql=$this->db->query("SELECT * FROM tbl_branch_data WHERE id = '".$branchID."' ");
		 return $sql;
	  }
	  //---------------------------
	  function getDepart($usedata){
		  $query =  $this->db->query("SELECT * FROM tbl_depart_data WHERE data_status='".$usedata."' ");
		  return $query;
	  }
	  //---------------------------
	 function EditBranch($branchName, $dataID , $branchStatus){
		 $data = array(
		 'branch_name' => $branchName,
		 'branch_status' => $branchStatus,
		 'user_update' => $this->session->userdata('user_id'));
		 $this->db->where('id', $dataID);
		 if($this->db->update('tbl_branch_data', $data)){
			 echo "1";
		 }else{
		   echo "x";
		 }
	 }
	  //-----------------------
	  function DeleteBranch($dataID){
		// $dataID = $this->input->post('dataID');
		 $data = array(
		 'branch_status' => '0',
		 'user_update' => $this->session->userdata('user_id'));
		 $this->db->where('id', $dataID);

		 if($this->db->update('tbl_branch_data', $data)){
		  		$pass=1;
			}else{
				$pass=0;
		    }

		   return $pass;
	  }
	  //-----------------
	  function getDealerBranch(){
          $sql = "SELECT * FROM `tbl_branch_data` WHERE branch_status = '1' ORDER BY id ASC ";
          $query=$this->db->query($sql ,'1');
          return $query;
      }
	  //-----------------
	  function AddPark($branch_id , $rowname , $totalRow , $startNum){
		  if($startNum==''){
			  $startNum=0;
		  }else{
			  $startNum=$startNum-1;
		  }

		  for($i=1;$i<=$totalRow;$i++){
			  $nRow=$i+$startNum;
			  $rowNameAdd = $rowname.$nRow;
			  $userupdate=$this->session->userdata('user_id');
		   $data = array(
				'branch_id' => $branch_id,
				'prefix_name' => $rowname ,
				'park_name' =>  $rowNameAdd ,
				'park_no' =>  $nRow ,
			    'user_update'=>$this->session->userdata('user_id')
		   	);

		   	if($this->db->insert('tbl_park_no', $data)){
				$pass=1;
			}else{
				$pass=0;
			}

		  }
		   return $pass;
	  }
	  //-----------------
	  function parkListByID($branch_id){
		 // $sql = "SELECT * FROM `tbl_park_no` WHERE branch_id ='".$branch_id."' ORDER BY  prefix_name ASC , park_name ASC ";
		  $sql = "SELECT * FROM `tbl_park_no` WHERE branch_id ='".$branch_id."' ORDER BY prefix_name ASC , park_no ASC ";
          $query=$this->db->query($sql  );
          return $query;
	  }
	  //-----------------
	  function EditParkData($parkID, $parkName,$reamark){
		   $data = array(
		 	'park_name' => $parkName,
		 	'reamark' => $reamark,
		 	'user_update' => $this->session->userdata('user_id'));
		 	$this->db->where('id', $parkID);
		 	if($this->db->update('tbl_park_no', $data)){
			 echo "1";
		 	}else{
		   	echo "x";
		 	}
	  }
	  //-------------------
	  function DoDeletePark($dataID){
		  $this->db->where('id', $dataID);
		  if($this->db->delete('tbl_park_no')){
			   echo "1";
		  }else{
			  echo "x";
		  }
	  }
	  //----------------
	  function addEnployee($name_sname=NULL, $user_name=NULL, $password=NULL, $position_level=NULL, $branch_id=NULL ,$depart_id=NULL){
		  $password =md5($password);
		  $data = array(
				'name_sname' => $name_sname,
				'user_name' => $user_name ,
				'password' =>  $password ,
				'position_level' =>  $position_level ,
			     'depart_id' => $depart_id,
				'brach_id' =>  $branch_id ,
			    'user_update'=>$this->session->userdata('user_id')
		   	);

		   	if($this->db->insert('tbl_user_data', $data)){
				$pass=1;
			}else{
				$pass=0;
			}
		   return $pass;
	  }
	    //----------------$this->db->where_in('username', $names); 
	  function listemployee($datatype=NULL,$wherein=NULL){
		    //$sql = "SELECT * FROM `tbl_user_data` WHERE data_status ='".$datatype."' AND position_level IN (".$wherein.") ORDER BY   position_level ASC ,  id ASC   ";
		    //$sql= "SELECT a.* , b.depart_name , b.id AS departID , (SELECT COUNT(tbl_user_network.id) FROM tbl_user_network WHERE tbl_user_network.main_user_id=a.id ) AS staffMember FROM tbl_user_data a LEFT JOIN tbl_depart_data b ON a.depart_id = b.id WHERE a.data_status = '".$datatype."' AND position_level IN (".$wherein.") ORDER BY a.depart_id ASC , a.position_level ASC , a.id ASC ";
		    $sql= "SELECT a.* , b.depart_name , b.id AS departID FROM tbl_user_data a LEFT JOIN tbl_depart_data b ON a.depart_id = b.id WHERE a.data_status = '".$datatype."' AND position_level IN (".$wherein.") ORDER BY a.depart_id ASC , a.position_level ASC , a.id ASC ";		  
            $query=$this->db->query($sql);
          return $query;
	  }
	  //--------------- $this->session->userdata('user_id')
	  function checkIfHeader($user_id){
		//  $sql="SELECT COUNT(tbl_user_network.id) AS CountNetWork FROM tbl_user_network WHERE tbl_user_network.main_user_id='".$user_id."' ";
		//  $resultData = $this->db->query($sql);
		//  foreach($resultData->result() AS $data){ }
		//  if($data->CountNetWork > 0){
		//	  $isHeader ='1';
		//  }else{
			  $isHeader = '0';
		//  }
		  return $isHeader;
		  
	  }
	  //---------------
	  function listemployeeReport($datatype=NULL,$wherein=NULL,$brancID=NULL){
		    //$sql = "SELECT * FROM `tbl_user_data` WHERE data_status ='".$datatype."' AND position_level IN (".$wherein.") ORDER BY   position_level ASC ,  id ASC   "; a.data_status = '".$datatype."' AND
		  if($brancID=='all'){
			  $txtBranch ="";
		  }else{
			  $txtBranch =" AND a.brach_id = '".$brancID."' ";
		  }

		 // $sql= "SELECT a.* , b.depart_name , b.id AS departID , c.branch_name , c.id AS BranchID FROM tbl_user_data a "
		//		." LEFT JOIN tbl_depart_data b ON a.depart_id = b.id "
		//		." LEFT JOIN tbl_branch_data c ON a.brach_id=c.id"
		//		." WHERE  position_level IN (".$wherein.") $txtBranch AND a.data_status ='1' ORDER BY a.depart_id ASC , a.position_level ASC , a.id ASC ";
		  
		   $sql= "SELECT a.* , b.depart_name , b.id AS departID , c.branch_name , c.id AS BranchID FROM tbl_user_data a "
				." LEFT JOIN tbl_depart_data b ON a.depart_id = b.id "
				." LEFT JOIN tbl_branch_data c ON a.brach_id=c.id"
				." WHERE  a.position_level IN (".$wherein.") $txtBranch AND a.data_status ='1' ORDER BY a.depart_id ASC , a.position_level ASC , a.id ASC ";
           $query=$this->db->query($sql);
          return $query;
	  }  
	  //--------------------- 
  function listSaleOther($datatype=NULL,$wherein=NULL,$brancID=NULL, $selectmonth=NULL,$selectyear=NULL,$branchID){
		 
		  if($branchID=='all'){
			  $txtBranch ="";
		  }else{
			  $txtBranch =" AND b.brach_id = '".$branchID."' ";
		  }

		 // $sql= "SELECT a.* , b.depart_name , b.id AS departID , c.branch_name , c.id AS BranchID FROM tbl_user_data a "
		//	." LEFT JOIN tbl_depart_data b ON a.depart_id = b.id "
		//		." LEFT JOIN tbl_branch_data c ON a.brach_id=c.id"
		//		." WHERE  a.position_level IN (".$wherein.") $txtBranch AND a.data_status ='1' ORDER BY a.depart_id ASC , a.position_level ASC , a.id ASC ";
	     
	      
	       $sql="SELECT  a.id AS BookingID , b.id AS id , b.name_sname , d.branch_name, b.data_status , c.id AS CarID , c.recive_crm_date , c.car_step "
			   ." FROM  tbl_booking_car a "
			   ." LEFT JOIN tbl_user_data b ON a.sale_id = b.id  "
			   ." LEFT JOIN tbl_car_data c ON a.car_id = c.id  "  			
			   ." LEFT JOIN tbl_branch_data d ON a.branch_id = d.id "
			   ." WHERE a.booking_status='1' AND MONTH(c.recive_crm_date)='".$selectmonth."'  AND YEAR(c.recive_crm_date)='".$selectyear."' $txtBranch "
			   ." AND b.id NOT IN (SELECT id FROM tbl_user_data WHERE b.depart_id = '2' AND b.position_level='5' )"
			   ." GROUP BY  a.sale_id ORDER BY  b.id ASC "
			   ."";
           $query=$this->db->query($sql);
           return $query;
	  } 	  
	   //---------------
	  function listSaleOutID($selectyear,$selectmonth,$branchID){
		    //$sql= "SELECT a.* , b.depart_name , b.id AS departID , c.branch_name , c.id AS BranchID FROM tbl_user_data a "
			//	." LEFT JOIN tbl_depart_data b ON a.depart_id = b.id "
			//	." LEFT JOIN tbl_branch_data c ON a.brach_id=c.id"
			//	." WHERE  position_level IN (".$wherein.") $txtBranch AND a.data_status ='0' ORDER BY a.depart_id ASC , a.position_level ASC , a.id ASC ";
		   
		 if($branchID=='all'){
			  $txtBranch ="";
		  }else{
			  $txtBranch =" AND a.branch_id = '".$branchID."' ";
		  }
		  
		
		     $sql="SELECT a.sale_id AS id, a.sale_name , b.recive_crm_date  , c.id AS SaleID , c.name_sname , c.data_status "
				 ." FROM tbl_booking_car a "
				 ." LEFT JOIN tbl_car_data b ON a.car_id = b.id "
				 ." LEFT JOIN tbl_user_data c ON a.sale_id = c.id "
				 ." WHERE b.car_step='8' $txtBranch  AND  MONTH(b.recive_crm_date)='".$selectmonth."' AND YEAR(b.recive_crm_date)='".$selectyear."' AND c.data_status='0' GROUP BY a.sale_id ";
		  
           $query=$this->db->query($sql);
		  
		  
           $query=$this->db->query($sql);
           return $query;
	  }
	   //---------------
	  function listemployeeReportCancel($datatype=NULL,$wherein=NULL,$brancID=NULL){
		    //$sql = "SELECT * FROM `tbl_user_data` WHERE data_status ='".$datatype."' AND position_level IN (".$wherein.") ORDER BY   position_level ASC ,  id ASC   "; a.data_status = '".$datatype."' AND
		  if($brancID=='all'){
			  $txtBranch ="";
		  }else{
			  $txtBranch =" AND a.brach_id = '".$brancID."' ";
		  }
		   //----select cancel user------------
		    $sql= "SELECT a.* , b.depart_name , b.id AS departID , c.branch_name , c.id AS BranchID FROM tbl_user_data a "
				." LEFT JOIN tbl_depart_data b ON a.depart_id = b.id "
				." LEFT JOIN tbl_branch_data c ON a.brach_id=c.id"
				." LEFT JOIN  tbl_booking_car d ON d.sale_id=a.id "
				." WHERE  a.position_level IN (".$wherein.") $txtBranch AND a.data_status='0' ORDER BY a.depart_id ASC , a.position_level ASC , a.id ASC ";
         
		  
		  $query=$this->db->query($sql);
          return $query;
	  }  
	    //----------------
	  function getEmDetail($dataID=NULL){
		  $sql = "SELECT * FROM `tbl_user_data` WHERE id ='".$dataID."' ";
          $query=$this->db->query($sql);
          return $query;
	  }
	  //----------------
	  function getUserDetail($dataID=NULL){
 		$this->db->select('*');
        $this->db->from('tbl_user_data');
		$this->db->where('id',$dataID);
        $query = $this->db->get();
		 return $query;


		  return $query;
	  }

	    //----------------deleteEmployee($dataID)
	   function deleteEmployee($dataID=NULL,$status=NULL){

		$data = array(
		 'data_status' => $status,
         'user_update' =>$this->session->userdata('user_id'));
         $this->db->where('id', $dataID);
         if($this->db->update('tbl_user_data', $data)){
			  //$this->db->query("DELETE FROM tbl_user_network WHERE main_user_id ='".$dataID."' ");
			  ///$this->db->delete('tbl_user_network', array('main_user_id' => $dataID));
			  echo "1";
		  }else{
			  echo "x";
		  }
	   }
	    //----------------
	  	function getPermission($dataID=NULL){
		  $sql = "SELECT * FROM `tbl_menu_data` WHERE menu_type ='1' ORDER BY menu_number ASC ";
          $query=$this->db->query($sql);
          return $query;
	  	}
	    //----------------
	  	function getSubMenu($menuID=NULL){
		  $sql = "SELECT * FROM `tbl_menu_data` WHERE menu_type ='2' AND menu_cate ='".$menuID."' ORDER BY menu_number ASC ";
          $query=$this->db->query($sql);
          return $query;
	  	}
	    //----------------
	 	function Do_setPermissionMenu($permission=NULL,$menuID=NULL,$userID=NULL){
		  $sql = "SELECT * FROM `tbl_permission_data` WHERE menu_id ='".$menuID."' AND user_id ='".$userID."' ";
          $query = $this->db->query($sql);
		  $numberCount = $query->num_rows();

		  $menu_url = '';

		  if($numberCount < 1){

			$data = array(
			  'user_id' => $userID,
			  'menu_id' => $menuID,
			  'menu_url' => $menu_url,
			  'permission' => $permission
		   	);


		   	if($this->db->insert('tbl_permission_data', $data)){
				$pass=1;
			}else{
				$pass=0;
			}

		  }

		  if($numberCount > 0){

			$data = array(
			  'user_id' => $userID,
			  'menu_id' => $menuID,
			  'menu_url' => $menu_url,
			  'permission' => $permission
		   	);

		   	$this->db->where('user_id', $userID);
			$this->db->where('menu_id', $menuID);
		 	if($this->db->update('tbl_permission_data', $data)){
			 $pass=1;
		 	}else{
		   	 $pass=0;
		 	}

		  }

		  return $pass;

	  	}
		//----------------
	  	function getPermissionData($menuID=NULL,$userID=NULL){
		  $sql2 = "SELECT * FROM `tbl_permission_data` WHERE menu_id ='".$menuID."' AND user_id ='".$userID."' ";
          $query2 = $this->db->query($sql2);
		  $numberCount = $query2->num_rows();

		  if($numberCount > 0){
			   $sql = "SELECT * FROM `tbl_permission_data` WHERE menu_id ='".$menuID."' AND user_id ='".$userID."' ";
			   $query=$this->db->query($sql);
			   return $query;
		  }
	  	}
	    //----------------
	    function Do_updatePassword($password=NULL,$userID=NULL){
		  $password =md5($password);
		  $data = array(
				'password' =>  $password ,
				'user_update'=>$this->session->userdata('user_id')
		   	);

			$this->db->where('id', $userID);
            if($this->db->update('tbl_user_data', $data)){
				$pass=1;
			}else{
				$pass=0;
			}
		   return $pass;
	   }
	   //---------------------------
	   function check_username($username=NULL){
		  $sql2 = "SELECT * FROM `tbl_user_data` WHERE user_name = '".$username."' ";
          $query2 = $this->db->query($sql2);
		  $numberCount = $query2->num_rows();

		  return $numberCount;
	  }
	  //---------------------------
	   function getMenuList($menu_type=NULL,$menu_cate=NULL){

		  $userID = $this->session->userdata('user_id');

		  $sql = "SELECT m.menu_name , m.menu_type , m.menu_number , m.menu_cate , m.menu_url , m.id FROM `tbl_permission_data` AS p LEFT JOIN tbl_menu_data AS m ON p.menu_id = m.id WHERE p.user_id = '".$userID."' AND p.permission = '2' AND m.menu_type = '".$menu_type."' AND m.menu_cate = '".$menu_cate."' ORDER BY m.menu_number ASC ";
          $query=$this->db->query($sql);
          return $query;
	  }
	  //-----------------
	  function getBranchName($dataID=NULL){
          $this->db->where('id', $dataID);
		  $this->db->select('branch_name');
		  $query = $this->db->get('tbl_branch_data');
		  $row=$query->row();
		  $branch_name=$row->branch_name;
		  return $branch_name;
      }
	  //---------------------
	  function getallSale($userID=NULL){
		  //------select head group id------------

		  //--------------------------------------
		  $sql=$this->db->query("SELECT * FROM tbl_user_data WHERE depart_id='2' AND position_level <>'2' AND data_status='1' AND id<>'".$userID."' AND id NOT IN(SELECT main_user_id FROM tbl_user_network) AND id NOT IN (SELECT sub_user_id FROM tbl_user_network) ORDER BY id ASC ");
		  return $sql;
	  }
	  //-------------------
	  function getSaleNetwork($userID){
		   $query="SELECT a.* , b.name_sname AS HostName , c.name_sname AS subName "
			  ." FROM tbl_user_network a "
			  ." LEFT JOIN tbl_user_data b ON a.main_user_id=b.id "
			  ." LEFT JOIN tbl_user_data c ON a.sub_user_id=c.id "
			  ." WHERE a.main_user_id ='".$userID."' ";
		  $sql=$this->db->query($query);
		  return $sql;
	  }
	  //-----------------
	  function findsubnetwork($SaleID=NULL){
		  $query="SELECT a.* , b.name_sname AS HostName , c.name_sname AS subName "
			  ." FROM tbl_user_network a "
			  ." LEFT JOIN tbl_user_data b ON a.main_user_id=b.id "
			  ." LEFT JOIN tbl_user_data c ON a.sub_user_id=c.id "
			  ." WHERE a.sub_user_id ='".$SaleID."' ";
		  $sql=$this->db->query($query);
		  return $sql;
	  }
	  //---------------------
	  function addSubNetwork($hostId=NULL,$SaleID=NULL){
		  $today=date("Y-m-d");
		  $data= array(
		  	'main_user_id'=>$hostId ,
			'sub_user_id'=>$SaleID ,
			'date_add'=> $today ,
			'user_update' =>$this->session->userdata('user_id')
		  );

			if($this->db->insert('tbl_user_network', $data)){
				$pass=1;
			}else{
				$pass=0;
			}
		  return $this->db->insert_id();;
	  }
	 //------------------
	  function removeNetwork($dataID){
		  $this->db->where('id', $dataID);
		  if($this->db->delete('tbl_user_network')){
			   $pass=1;
		  }else{
			  $pass=0;
		  }
		 return $pass;
	  }
    //--------------------
    function thaiMonthList(){
      $monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
      return $monthArray;
    }
    //-------------------
    function thaiYearList(){
      $startYear='2018';
      $currentYear=date("Y");
      $loopYear =   ($currentYear-$startYear)+1;
      $listYear = array();
      for($i=0;$i<=$loopYear;$i++){
        $yearValue=$startYear+$i;
        $thaiYearValue=$startYear+$i+543;
        $listYear[] = $yearValue;
      }
      return $listYear;
    }
	//---------------------
	 function getBranchName2(){
		 $sql=$this->db->query("SELECT * FROM tbl_branch_data WHERE id = '".$this->session->userdata('branch_id')."' ");
		 foreach($sql->result() AS $data){}
		 return $data->branch_name;
	 }
	 //-----------------------
	 function isHeaderSale($UserID){
		 $sql="SELECT COUNT(id) AS CountStaff FROM tbl_user_network WHERE  main_user_id ='".$UserID."' ";
		 $resultData = $this->db->query($sql);
		 foreach($resultData->result() AS $data){ }
		 return $data->CountStaff;
	 }
	//-----------------------
	  function doLocation($dataID, $location_name , $location_status , $doType){
		  switch($doType){
			  case  "ADD" :
				  
				  $data= array('location_name'=>$location_name, 'location_status'=>$location_status, 'user_id'=>$this->session->userdata('user_id'));
				  
				  if($this->db->insert('tbl_carbooth_location', $data)){
				 		$pass = '1';
					}else{
						 $pass = 'Error';
					}
		   		  return $pass;
			  break;
				  
			  case "EDIT" :
				  
				  $data= array('location_name'=>$location_name, 'location_status'=>$location_status, 'user_id'=>$this->session->userdata('user_id'));
				  
				 $this->db->where('id', $dataID);
				 if($this->db->update('tbl_carbooth_location', $data)){ 
						$pass='1';
				 }else{
						 $pass='Error';
				 }
				 return $pass;
			  break;
				  
			  case "CH_STATUS" :
				  $sql="UPDATE tbl_carbooth_location SET location_status ='".$location_status."' WHERE id = '".$dataID."' ";
				  if($this->db->query($sql)){
					  $pass=1;
				  }else{
					  $pass=0;
				  }
				  return $pass;
				  
			  break;
				  
		  }
	  }
	//-------------------------getListCarboothLocation($whereisValue)
	  function getListCarboothLocation($whereisValue){
		  $sql= "SELECT * FROM tbl_carbooth_location WHERE location_status = '".$whereisValue."' ";
		  $result = $this->db->query($sql);
		  return $result;
	  }
	  //-------------------------
	  function countCustomerSource($countType,$locationID){
		  switch($countType){
			  case "booking" :
				  $saleStatus="   tbl_booking_car.booking_status IN ('1','3') ";//tbl_booking_car.sale_status IN('1','2','3')  AND
			  break;
				  
			  case "downpayment" :
				   $saleStatus=" tbl_booking_car.downpay_check IN('1') ";
			  break;
				  
		  }
		  $sql="SELECT COUNT(tbl_customer_soruce.id) AS CountID FROM tbl_customer_soruce "
			  ." LEFT JOIN tbl_booking_car ON tbl_customer_soruce.booking_id=tbl_booking_car.id "
			  ." WHERE $saleStatus AND tbl_customer_soruce.source_id='".$locationID."' "
			  ." ";
		  $result = $this->db->query($sql);
		  foreach($result->result() AS $data);
		  return $data->CountID;
	  }
	  //-------------------------
	  function getCustomerSource(){
		  
	  }
	  //-------------------------
	  function sum_totalPP_test($locationID=NULL){/*
		  
		  
  total = SELECT COUNT(id) AS numPP FROM  tbl_pp_data WHERE  (insterest_model_id='selectModelID' AND insterest_subModel_id ='selectSubModel'  AND insterest_trim ='selectTrim' AND insterest_color_exterior='selectColorID') OR (insterest_model_id2='selectModelID' AND insterest_subModel_id2 ='selectSubModel'  AND insterest_trim2 ='selectTrim' AND insterest_color_exterior2='selectColorID') OR (insterest_model_id3='selectModelID' AND insterest_subModel_id3 ='selectSubModel'  AND insterest_trim2 ='selectTrim' AND insterest_color_exterior3='selectColorID') AND ='Location_id'
	  
	  
	 
	  if(selectModelID!='x'){
		  $txt1 = insterest_model_id='selectModelID';
	  }
	
	  if(selectSubModel!='x'){
		  $txt11 = insterest_subModel_id ='selectSubModel';
	  }
		  
	  
	   (insterest_model_id='selectModelID' AND insterest_subModel_id ='selectSubModel'  AND insterest_trim ='selectTrim' AND insterest_color_exterior='selectColorID') */
		  
	/*	$selectModelID
			
		
		if(selectModelID!='x'){
		    
		    
		
		}
		
		  
		  $sql = "SELECT COUNT(a.source_id) AS numLocationPP FROM  tbl_pp_customer_soruce AS a
     LEFT JOIN tbl_pp_data AS b ON a.pp_id = b.id

	 WHERE  (a.insterest_model_id='selectModelID' 
	 
	 
	 AND a.insterest_subModel_id ='selectSubModel'
	 
	 
	 
	 AND a.insterest_trim ='selectTrim'
	 
	 
	 AND a.insterest_color_exterior='selectColorID') OR
	 
	 
	 
	 
	 (a.insterest_model_id2='selectModelID'
	 
	 
	 AND a.insterest_subModel_id2 ='selectSubModel' 
	 
	 
	 
	 
	 AND a.insterest_trim2 ='selectTrim' 
	 
	 
	 
	 AND a.insterest_color_exterior2='selectColorID') OR (a.insterest_model_id3='selectModelID' AND a.insterest_subModel_id3 ='selectSubModel'  
	 
	 
	 AND a.insterest_trim3 ='selectTrim' 
	 
	 
	 AND a.insterest_color_exterior3='selectColorID') 
	 
	 
	 AND 
	 
	 a.source_id ='".$locationID."' ";*/
		  
		  
		  $sql= "SELECT COUNT(a.source_id) AS numLocationPP FROM  tbl_pp_customer_soruce AS a  LEFT JOIN tbl_pp_data AS b ON a.pp_id = b.id	 WHERE a.source_id ='".$locationID."' ";
		  
		  $result = $this->db->query($sql);
		  foreach($result->result() AS $data);
		  return $data->numLocationPP;
		  
	  }
	  //-------------------------
	  function getLocation_forChart($date_start=NULL, $date_end=NULL, $selectModelID=NULL, $body_id=NULL, $trim_id=NULL, $color_id=NULL){
		  
		  
//		  SELECT * FROM `tbl_carbooth_location` WHERE location_status='1' UNION SELECT a.* FROM tbl_carbooth_location AS a LEFT JOIN tbl_pp_customer_soruce b ON b.source_id=a.id WHERE (MONTH(b.date_add) <= '".$selectmonth2."' AND YEAR(b.date_add) <= '".$selectyear2."') AND (MONTH(b.date_add) >= '".$selectmonth."' AND YEAR(b.date_add) >= '".$selectyear."')
		  
		  
		//  SELECT * FROM `tbl_carbooth_location` WHERE location_status='1' UNION SELECT a.* FROM tbl_carbooth_location AS a LEFT JOIN tbl_pp_customer_soruce b ON b.source_id=a.id WHERE (MONTH(b.date_add) <= '2019-05-10' ) AND (MONTH(b.date_add) >= '2019-02-01')
		  
		  $sql= "SELECT * FROM `tbl_carbooth_location` WHERE location_status = '1' UNION SELECT a.* FROM tbl_carbooth_location AS a LEFT JOIN tbl_pp_customer_soruce b ON b.source_id = a.id WHERE (MONTH(b.date_add) <= '".$date_start."' AND YEAR(b.date_add) <= '".$date_start."') AND (MONTH(b.date_add) >= '".$date_end."' AND YEAR(b.date_add) >= '".$date_end."') ";
		  $result = $this->db->query($sql);
		  return $result;
		  
	  }
	  //-------------------------
	  function sum_totalBooking($locationID=NULL, $selectModelID=NULL, $trim_id=NULL, $body_id=NULL, $color_id=NULL, $date_start=NULL, $date_end=NULL){
	  
	 // $totalLocation = SELECT COUNT(id) AS countBook FROM tbl_customer_soruce a LEFT JOIN tbl_booking_car b ON a.booking_id = b.id  WHERE b.booking_model_id ='selectModelID' AND b.booking_body_id ='selectSubModel' AND b.booking_trim_id ='selectTrim' AND b.booking_color_id ='selectColorID' AND a.source_id = 'locationID' 		 
		  
		  if($selectModelID != 'x'){
			  
			  $txt_model = "b.booking_model_id = '".$selectModelID."' AND ";
			  
		  } else {
			  $txt_model = ""; 
		  } 
		  
		  if($trim_id != 'x'){
			  
			  $txt_trim = "b.booking_trim_id = '".$trim_id."' AND ";
			  
		  } else {
			  $txt_trim = ""; 
		  } 
		  
		  if($body_id != 'x'){
			  
			  $txt_body = "b.booking_body_id = '".$body_id."' AND "; 
			  
		  } else {
			  $txt_body = ""; 
		  } 
		  
		  if($color_id != 'x'){
			  
			  $txt_color = "b.booking_color_id = '".$color_id."' AND ";	
			  
		  } else {
			  $txt_color = ""; 
		  }	
		  
		  if($date_start != 'x'){
			  
			  $txtDate_start = "(MONTH(b.booking_date) <= '".$date_start."' AND YEAR(b.booking_date) <= '".$date_start."') AND ";
			  
		  } else {
			  $txtDate_start = ""; 
		  }
		  
		  if($date_end != 'x'){
			  
			  $txtDate_end = "(MONTH(b.booking_date) <= '".$date_end."' AND YEAR(b.booking_date) <= '".$date_end."') AND ";	
			  
		  } else {
			  $txtDate_end = ""; 
		  }		  
		  
		  $sql= "SELECT COUNT(a.id) AS countBook FROM tbl_customer_soruce a LEFT JOIN tbl_booking_car b ON a.booking_id = b.id WHERE $txt_model $txt_trim $txt_body $txt_color $txtDate_start $txtDate_end a.source_id ='".$locationID."' ";  
		  $result = $this->db->query($sql);
		  foreach($result->result() AS $data);
		  return $data->countBook;
		  
	  }
	  //-------------------------
	  function sum_totalPP($locationID=NULL, $date_start=NULL, $date_end=NULL){
		  
		  if($date_start != 'x'){
			  
			  $txtDate_start = "(MONTH(a.date_add) <= '".$date_start."' AND YEAR(a.date_add) <= '".$date_start."') AND ";
			  
		  } else {
			  $txtDate_start = ""; 
		  }
		  
		  if($date_end != 'x'){
			  
			  // $txtDate_end = "(MONTH(a.date_add) <= '".$date_end."' AND YEAR(a.date_add) <= '".$date_end."') AND ";	
			  $txtDate_end = "(MONTH(b.date_document) <= '".$date_end."' AND YEAR(b.date_document) <= '".$date_end."') AND ";	
			  
		  } else {
			  $txtDate_end = ""; 
		  }
		  
		  $sql= "SELECT COUNT(a.source_id) AS numLocationPP FROM  tbl_pp_customer_soruce AS a  LEFT JOIN tbl_pp_data AS b ON a.pp_id = b.id	WHERE $txtDate_start $txtDate_end a.source_id ='".$locationID."' ";
		  
		  $result = $this->db->query($sql);
		  foreach($result->result() AS $data);
		  return $data->numLocationPP;
		  
	  }
	  //-------------------------
	  function sum_totalSale($locationID=NULL, $selectModelID=NULL, $trim_id=NULL, $body_id=NULL, $color_id=NULL, $date_start=NULL, $date_end=NULL){
		  
		  if($selectModelID != 'x'){
			  
			  $txt_model = "b.booking_model_id = '".$selectModelID."' AND ";
			  
		  } else {
			  $txt_model = ""; 
		  } 
		  
		  if($trim_id != 'x'){
			  
			  $txt_trim = "b.booking_trim_id = '".$trim_id."' AND ";
			  
		  } else {
			  $txt_trim = ""; 
		  } 
		  
		  if($body_id != 'x'){
			  
			  $txt_body = "b.booking_body_id = '".$body_id."' AND "; 
			  
		  } else {
			  $txt_body = ""; 
		  } 
		  
		  if($color_id != 'x'){
			  
			  $txt_color = "b.booking_color_id = '".$color_id."' AND ";	
			  
		  } else {
			  $txt_color = ""; 
		  }	
		  
		  if($date_start != 'x'){
			  
			  $txtDate_start = "(MONTH(b.booking_date) <= '".$date_start."' AND YEAR(b.booking_date) <= '".$date_start."') AND ";
			  
		  } else {
			  $txtDate_start = ""; 
		  }
		  
		  if($date_end != 'x'){
			  
			  $txtDate_end = "(MONTH(b.booking_date) <= '".$date_end."' AND YEAR(b.booking_date) <= '".$date_end."') AND ";	
			  
		  } else {
			  $txtDate_end = ""; 
		  }		  
		  
		  $sql = "SELECT COUNT(b.id) AS countBook FROM tbl_customer_soruce a LEFT JOIN tbl_booking_car b ON a.booking_id = b.id WHERE $txt_model $txt_trim $txt_body $txt_color $txtDate_start $txtDate_end  a.source_id ='".$locationID."' AND b.sale_status IN('5', '6', '7') ";		  
		  $result = $this->db->query($sql);
		  foreach($result->result() AS $data);
		  return $data->countBook;
		  
	  }
       //----------------
	  function UpdateEmployee($name_sname=NULL,$user_name=NULL,$password=NULL,$position_level=NULL,$branch_id=NULL,$depart_id=NULL,$dataID=NULL){
                if($password!=''){
			  $password=md5($password);
		  }else{
			  $password=$password;
		  }
		  $data = array(
				'name_sname' => $name_sname,
				'user_name' => $user_name ,
				'password' =>  $password ,
				'position_level' =>  $position_level ,
			     'depart_id' => $depart_id,
				'brach_id' =>  $branch_id ,
			    'user_update'=>$this->session->userdata('user_id')
		   	);
                $this->db->where('id', $dataID);
            if ($this->db->update('tbl_user_data', $data)) {
				$pass=1;
			}else{
				$pass=0;
			}
		   return $pass;
	  }
	  
	//----------------------
  }///end class model
