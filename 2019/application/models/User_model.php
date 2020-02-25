<?php defined('BASEPATH') OR exit('No direct script access allowed');
 class User_model extends CI_Model
 {
      function can_login($username, $password)
      {
           $password = md5($password);
           $this->db->where('user_name', $username);
           $this->db->where('password', $password);
           $this->db->where('data_status', '1');
           $query = $this->db->get('tbl_username');

           //SELECT * FROM users WHERE username = '$username' AND password = '$password'
           if($query->num_rows() > 0)
           {
            foreach ($query->result() as $row);
            $userdata = array(
                 'user_id'         => $row->id,
                 'name'              => $row->name_sname,
                 'user_type'     => $row->user_type
                 );

           $this->session->set_userdata($userdata);
           //-----------last update----------//
           date_default_timezone_set('Asia/Bangkok');
           $now = date("Y-m-d H:i:s");
           $data = array(
               'last_login' => $now
            );
          $this->db->where('id', $row->id);
          $this->db->update('tbl_username', $data);
			   return true;
           }
           else
           {
                return false;
           }
      }
      //---------------------------------
      public function get_user_id_from_username($username) {
        		$this->db->select('id');
        		$this->db->from('tbl_username');
        		$this->db->where('user_name', $username);
        		return $this->db->get()->row('id');
	   }
      //-------------------------------
      function getMenuList($menu_type=NULL,$menu_cate=NULL){
		
		  $userID = $this->session->userdata('user_id');	   
		   
		  $sql = "SELECT m.menu_name , m.menu_type , m.menu_number , m.menu_cate , m.menu_url , m.id FROM `tbl_permission_data` AS p LEFT JOIN tbl_menu_data AS m ON p.menu_id = m.id WHERE p.user_id = '".$userID."' AND p.permission IN ('2','3') AND m.menu_type = '".$menu_type."' AND m.menu_cate = '".$menu_cate."' ORDER BY m.menu_number ASC ";
          $query=$this->db->query($sql);
          return $query;
	 } 
  //-------------------------------------------
     function datauser($userID=NULL){
         $sql = "SELECT * FROM tbl_username WHERE id = '".$userID."'";
          $query=$this->db->query($sql);
          return $query;
     }
          //-------------------------------------
    function doChangePass($newpass,$id) {
        $newpass = md5($newpass);
        $sql = "UPDATE tbl_username SET `password` = '" . $newpass . "' WHERE id = '".$id."' ";
        if ($this->db->query($sql)) {
            return 1;
        } else {
            return 0;
        }
    }
    //---------------------------  
		 
	function addUserData($dataID=NULL,$name_sname=NULL,$user_name=NULL,$password=NULL,$email=NULL,$hpassword=NULL){	
            if($dataID==''){
                     $password = md5($password);
                 }else{
		 if($password ==''){
			 $password = $hpassword;
			 
		 } else {
			 $password = md5($password);
		 }
                 }

		 $data = array(
         'name' => $name_sname,
         'user_name' => $user_name,         
         'password' => $password,         
         'email' => $email,                
          'data_status' => '1');
          if ($dataID == '') {

          if($this->db->insert('tbl_username', $data)){
			//$pass=1;
			$pass = $this->db->insert_id(); 
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }
        } else {
             $data1 = array(
         'name' => $name_sname,
         'user_name' => $user_name,         
         'password' => $password,         
         'email' => $email);
            $this->db->where('id', $dataID);
            if ($this->db->update('tbl_username', $data1)) {
                $pass = $dataID; 
		 }else{
			$pass=0;
            }
        }
		 return $pass;		 
	}
          //-----------------------------------------------
	  function get_menu($menu_type=NULL , $cate=NULL){
		//$userupdate=$this->session->userdata('user_id'); 
		  
		if($menu_type !=''){
		    $this->db->where('menu_type', $menu_type);
		}
		if($cate !=''){
		    $this->db->where('menu_cate', $cate);
		}
		  
		//$this->db->where('user_update', $userupdate);
		//$this->db->where('data_status', '1');
		$this->db->select('*');
		$this->db->order_by('menu_number','asc');
		$query = $this->db->get('tbl_menu_data');
		
		return $query;		
	 } 
         //----------------------------
	 
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
       //---------------------------  
	 
	 	function update_permission($userID ,$menuId ,$permission ,$menu_url){
		  $sql = "SELECT * FROM `tbl_permission_data` WHERE menu_id ='".$menuId."' AND user_id ='".$userID."' ";
          $query = $this->db->query($sql);
		  $numberCount = $query->num_rows();

		  $menu_url = '';

		  if($numberCount < 1){

			$data = array(
			  'user_id' => $userID,
			  'menu_id' => $menuId,
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
			  'menu_id' => $menuId,
			  'menu_url' => $menu_url,
			  'permission' => $permission
		   	);

		   	$this->db->where('user_id', $userID);
			$this->db->where('menu_id', $menuId);
		 	if($this->db->update('tbl_permission_data', $data)){
			 $pass=1;
		 	}else{
		   	 $pass=0;
		 	}

		  }

		  return $pass;

	  	}	 
 
 }
