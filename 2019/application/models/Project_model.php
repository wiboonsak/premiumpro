<?php defined('BASEPATH') OR exit('No direct script access allowed');
 class Project_model extends CI_Model
 {
      public function get_user_id_from_username($username) {
        		$this->db->select('id');
        		$this->db->from('tbl_username');
        		$this->db->where('user_name', $username);
        		return $this->db->get()->row('id');
	   }
                           //--------------------------- 
    function list_project($currentID=null) {
        if ($currentID != '') {
            $sql = "SELECT * FROM `tbl_project` WHERE id = '$currentID' ";
            $query = $this->db->query($sql);
        } else {
            $sql = "SELECT * FROM `tbl_project` ORDER BY date_add DESC";
            $query = $this->db->query($sql);
        }
        return $query;
    }

          //--------------------------- 
    function deletacate($dataid=null,$table=null) {
            $this->db->where('id', $dataid);
        if ($this->db->delete($table)) {
            $pass = 1;
        } else {
            $pass = 0;
        }
        return $pass;
    }
    //------------------------------------------
     function deleteimg($DataID, $fileName,$img) { 
         $data = array('img_name' => $img
        );
            $this->db->where('id', $DataID);
            if ($this->db->update('tbl_project', $data)) {
                $pass = 1;
                @unlink('./uploadfile/' . $fileName);
            } else {
                $pass = 0;
            }
        return $pass;
    }
    //---------------------------  
	function GetthaiDateeng($day){
		$dateArray = explode("-",$day);
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0] ;
		//$monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
       $monthArray=Array("01"=>"January ","02"=>"February ","03"=>"March ","04"=>"April ","05"=>"May ","06"=>"June ","07"=>"July ","08"=>"August ","09"=>"September ","10"=>"October ","11"=>"November ","12"=>"December ");
		if($date < 10){ $date = str_replace("0", "", $date); } 
		return $monthArray[$mon]."&nbsp;".$date.",&nbsp;".$year;
	}
     //---------------------------  
	function GetthaiDateTimeeng($day){
		$DateTimeArray= explode(" ",$day);
		$dateArray = explode("-",$DateTimeArray[0]);
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0] ;
		//$monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
       $monthArray=Array("01"=>"January ","02"=>"February ","03"=>"March ","04"=>"April ","05"=>"May ","06"=>"June ","07"=>"July ","08"=>"August ","09"=>"September ","10"=>"October ","11"=>"November ","12"=>"December ");
		if($date < 10){ $date = str_replace("0", "", $date); } 
		return $monthArray[$mon]."&nbsp;".$date.",&nbsp;".$year;
	}
     //---------------------------  
	function GetthaiDateTime($day){
		$DateTimeArray= explode(" ",$day);
		$dateArray = explode("-",$DateTimeArray[0]);
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0]+543 ;
		//$monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
       $monthArray=Array("01"=>"มกราคม ","02"=>"กุมภาพันธ์ ","03"=>"มีนาคม ","04"=>"เมษายน ","05"=>"พฤษภาคม ","06"=>"มิถุนายน ","07"=>"กรกฎาคม ","08"=>"สิงหาคม ","09"=>"กันยายน ","10"=>"ตุลาคม ","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		if($date < 10){ $date = str_replace("0", "", $date); } 
		return $monthArray[$mon]."&nbsp;".$date.",&nbsp;".$year;
	}
              //--------------------------- 
    function list_Facilities($currentID=null) {
        if ($currentID != '') {
            $sql = "SELECT * FROM `tbl_facilities` WHERE id = '$currentID' ORDER BY id ASC";
            $query = $this->db->query($sql);
        } else {
            $sql = "SELECT * FROM `tbl_facilities` ORDER BY date_add DESC";
            $query = $this->db->query($sql);
        }
        return $query;
    }
     //---------------------------	 
    function update_ShowOnWeb($dataID = NULL, $check = NULL, $table = NULL) {
        $data = array(
            'show_onweb' => $check
        );
        $this->db->where('id', $dataID);
        if ($this->db->update($table, $data)) {
            $pass = 1;
        } else {
            $pass = 0;
            //$this->db->_error_message(); 
        }
        return $pass;
    }
     //----------------------------------------
      function addFacilities($currentID = NULL, $topic_en = NULL, $topic_th = NULL,$commenten = NULL,$commentth = NULL,$icon_class = NULL) {
        $today = date("Y-m-d H:i:s");
        $data = array('topic_th' => $topic_th,
            'topic_en' => $topic_en,
            'detail_th' => $commentth,
            'detail_en' => $commenten,
            'icon_class' => $icon_class,
            'date_add' => $today,
            'show_onweb' => '1'
        );

        if ($currentID == '') {

            if ($this->db->insert('tbl_facilities', $data)) {
                $currentID = $this->db->insert_id();
            } else {
                $currentID = 'Error';
            }
        } else {
            $this->db->where('id', $currentID);
            if ($this->db->update('tbl_facilities', $data)) {
                $currentID = $currentID;
            } else {
                $currentID = 'Error';
            }
        }

        return $currentID;
    }
              //---------------------------------
    function delete_data($dataID = NULL, $table = NULL) {
       $this->db->where('id', $dataID);
        if ($this->db->delete($table)) {
            $pass = 1;
        } else {
            $pass = 0;
        }
    
    return $pass; 
        }
               //--------------------------- 
    function list_cateData($currentID=null) {
        if ($currentID != '') {
            $sql = "SELECT * FROM `tbl_category_project` WHERE id = '$currentID' ORDER BY id ASC";
            $query = $this->db->query($sql);
        } else {
            $sql = "SELECT * FROM `tbl_category_project` ORDER BY date_add DESC";
            $query = $this->db->query($sql);
        }
        return $query;
    }
               //--------------------------- 
    function list_cateDatamain($cate_id=NULL) {
            $sql = "SELECT * FROM `tbl_category_project` WHERE main_cate_id = $cate_id ORDER BY date_add DESC";
            $query = $this->db->query($sql);
        return $query;
    }
    //----------------------------------------
      function addcate($cate_name_en=NULL,$cate_name_th=NULL,$cate_lv=NULL,$main_cate_id=NULL,$currentID=NULL) {
        $today = date("Y-m-d H:i:s");
        $data = array('cate_lv' => $cate_lv,
            'main_cate_id' => $main_cate_id,
            'cate_name_th' => $cate_name_th,
            'cate_name_en' => $cate_name_en,
            'show_onweb' => '1',
            'date_add' => $today
        );

        if ($currentID == '') {

            if ($this->db->insert('tbl_category_project', $data)) {
                $currentID = $this->db->insert_id();
            } else {
                $currentID = 'Error';
            }
        } else {
            $data1 = array('cate_lv' => $cate_lv,
            'main_cate_id' => $main_cate_id,
            'cate_name_th' => $cate_name_th,
            'cate_name_en' => $cate_name_en,
            'date_add' => $today
        );
            $this->db->where('id', $currentID);
            if ($this->db->update('tbl_category_project', $data1)) {
                $currentID = $currentID;
            } else {
                $currentID = 'Error';
            }
        }

        return $currentID;
    }
    //-------------------------------------------------------------------
      function addproject($currentID=NULL, $cate_id=NULL, $commenten=NULL,$commentth=NULL,$tool_map_url=NULL,$get_lat=NULL,$get_lng=NULL, $img=NULL) {
        $today = date("Y-m-d H:i:s");
        $data = array('cate_id' => $cate_id,
            'project_concept_th' => $commentth,
            'project_concept_en' => $commenten,
            'img_name' => $img,
            'map' => $tool_map_url,
            'map_lat' => $get_lat,
            'map_long' => $get_lng,
            'date_add' => $today,
            'show_onweb' => '1'
        );

        if ($currentID == '') {

            if ($this->db->insert('tbl_project', $data)) {
                $currentID = $this->db->insert_id();
            } else {
                $currentID = 'Error';
            }
        } else {
            $data1 = array('cate_id' => $cate_id,
            'project_concept_th' => $commentth,
            'project_concept_en' => $commenten,
            'img_name' => $img,
            'map' => $tool_map_url,
            'map_lat' => $get_lat,
            'map_long' => $get_lng,
            'date_add' => $today

        );
            $this->db->where('id', $currentID);
            if ($this->db->update('tbl_project', $data1)) {
                $currentID = $currentID;
            } else {
                $currentID = 'Error';
            }
        }

        return $currentID;
    }
              //--------------------------- 
    function Facilitiesstatus($currentID=null) {
        if ($currentID != '') {
            $sql = "SELECT * FROM `tbl_facilities` WHERE id = '$currentID' AND show_onweb = '1' ORDER BY date_add DESC";
            $query = $this->db->query($sql);
        } else {
            $sql = "SELECT * FROM `tbl_facilities` WHERE show_onweb = '1' ORDER BY date_add DESC";
            $query = $this->db->query($sql);
        }
        return $query;
    }
              //--------------------------- 
    function Facilitiesproject($currentID=null) {
            $sql = "SELECT * FROM `tbl_facilities_project` WHERE project_id = '$currentID' AND show_onweb = '1' ORDER BY date_add DESC";
            $query = $this->db->query($sql);
        return $query;
    }
              //--------------------------- 
    function Functioninhouse($currentID=null) {
            $sql = "SELECT * FROM `tbl_function_house` WHERE project_id = '$currentID' AND show_onweb = '1' ORDER BY date_add DESC";
            $query = $this->db->query($sql);
        return $query;
    }
               //-------------------------------
    	function AddFacdata ($dataID=null , $value=null) {
       		$today = date("Y-m-d H:i:s");
        	$data = array('facilities_id' => $value,
            	'project_id' =>$dataID,
            	'date_add' => $today,
                'show_onweb'=> '1'
        	);
            if ($this->db->insert('tbl_facilities_project', $data)) {
                $dataID = $dataID;
            } else {
                $dataID = 'Error';
            }   
    	}
             //---------------------------
    function loadImg($ProID) {
        $sql = $this->db->query("SELECT * FROM `tbl_img_house_plan` WHERE project_id ='" . $ProID . "' ORDER BY img_order ASC");
        return $sql;
    }
                  //--------------------------- 
    function list_houseplan($currentID=null) {
            $sql = "SELECT * FROM `tbl_house_plan` WHERE project_id = '$currentID' AND show_onweb = '1' ORDER BY date_add DESC";
            $query = $this->db->query($sql);
        return $query;
    }
                  //--------------------------- 
    function list_function($currentID=null) {
            $sql = "SELECT * FROM `tbl_function_house` WHERE project_id = '$currentID' AND show_onweb = '1' ORDER BY date_add DESC";
            $query = $this->db->query($sql);
        return $query;
    }
         //------------------------------------
    function updateOrder($dataID,$FieldName, $changeValue) {
        $data = array($FieldName => $changeValue);
        $this->db->where('id', $dataID);
        if ($this->db->update('tbl_img_house_plan', $data)) {
            $pass = 1;
        } else {
            $pass = 0;
        }
        return $pass;
    }
         //------------------------------------
    function updateOrdergall($dataID, $changeValue) {
        $data = array('img_order' => $changeValue);
        $this->db->where('id', $dataID);
        if ($this->db->update('tbl_project_gallery', $data)) {
            $pass = 1;
        } else {
            $pass = 0;
        }
        return $pass;
    }
    //------------------------------------------
     function deleteimghouse($DataID, $fileName) { 

            $this->db->where('id', $DataID);
            if ($this->db->delete('tbl_img_house_plan')) {
                $pass = 1;
                @unlink('./uploadfile/' . $fileName);
            } else {
                $pass = 0;
            }
        return $pass;
    }
     //-------------------------------------------------------------------
      function addhouse($houseplanID=NULL,$currentID=NULL, $commenten=NULL,$commentth=NULL) {
        $today = date("Y-m-d H:i:s");
        $data = array('project_id' => $currentID,
            'detail_th' => $commentth,
            'detail_en' => $commenten,
            'date_add' => $today,
            'show_onweb' => '1'
        );

        if ($houseplanID == '') {

            if ($this->db->insert('tbl_house_plan', $data)) {
                $currentID = $this->db->insert_id();
            } else {
                $currentID = '0';
            }
        } else {
            $this->db->where('project_id', $currentID);
            if ($this->db->update('tbl_house_plan', $data)) {
                $currentID = $currentID;
            } else {
                $currentID = '0';
            }
        }

        return $currentID;
    }
    //-------------------------------------------
     function addimghouse($img = null,$currentID = null) {
         $today = date("Y-m-d H:i:s");
          $sql = $this->db->query("SELECT MAX(img_order) AS nNax FROM tbl_img_house_plan WHERE project_id  ='".$currentID."'");
        foreach ($sql->result() AS $data) {
        }
        $nMaxIns = $data->nNax + 1;
        $sql = "INSERT INTO `tbl_img_house_plan`(`project_id`, `img_name`, `img_order`,`date_add`, `show_onweb`) VALUES ('" . $currentID . "','" . $img . "','" . $nMaxIns . "','".$today."','1')";
        $query = $this->db->query($sql);
        return $query;
    }
              //-------------------------------
    	function AddFuncation ($dataID=null , $value=null) {
       		$today = date("Y-m-d H:i:s");
        	$data = array('facilities_id' => $value,
            	'project_id' =>$dataID,
            	'date_add' => $today,
                'show_onweb'=> '1'
        	);
            if ($this->db->insert('tbl_function_house', $data)) {
                $dataID = $dataID;
            } else {
                $dataID = 'Error';
            }   
    	}
                     //--------------------------- 
    function list_nearby($currentID=null) {
            $sql = "SELECT * FROM `tbl_project_nearby` WHERE project_id = '$currentID' ORDER BY date_add DESC";
            $query = $this->db->query($sql);
        return $query;
    }
      //----------------------------------------
      function addnearby($Places_en=NULL,$Places_th=NULL,$Minutes=NULL,$distance=NULL,$projectID=NULL,$currentID=NULL) {
        $today = date("Y-m-d H:i:s");
        $data = array('place_eng' => $Places_en,
            'place_thai' => $Places_th,
            'time' => $Minutes,
            'distance' => $distance,
            'project_id' => $projectID,
            'show_onweb' => '1',
            'date_add' => $today
        );

        if ($currentID == '') {

            if ($this->db->insert('tbl_project_nearby', $data)) {
                $currentID = $this->db->insert_id();
            } else {
                $currentID = 'Error';
            }
        } else {
            $data1 = array('place_eng' => $Places_en,
            'place_thai' => $Places_th,
            'time' => $Minutes,
            'distance' => $distance,
            'project_id' => $projectID,
            'date_add' => $today
        );
            $this->db->where('id', $currentID);
            if ($this->db->update('tbl_project_nearby', $data1)) {
                $currentID = $currentID;
            } else {
                $currentID = 'Error';
            }
        }

        return $currentID;
    }
                //--------------------------- 
    function galleryyoutube($currentID=null) {
            $sql = "SELECT * FROM `tbl_project_gallery` WHERE project_id = '$currentID' AND show_onweb = '1' AND typefile = '2' ORDER BY date_add DESC";
            $query = $this->db->query($sql);
        return $query;
    }
                //--------------------------- 
    function galleryimg($currentID=null) {
            $sql = "SELECT * FROM `tbl_project_gallery` WHERE project_id = '$currentID' AND show_onweb = '1' AND typefile = '1' ORDER BY img_order ASC";
            $query = $this->db->query($sql);
        return $query;
    }
     //-------------------------------------------
     function addimggallery($img = null,$currentID = null) {
         $today = date("Y-m-d H:i:s");
         $sql = $this->db->query("SELECT MAX(img_order) AS nNax FROM tbl_project_gallery WHERE project_id  ='".$currentID."' AND typefile = '1' ");
        foreach ($sql->result() AS $data) {
        }
        $nMaxIns = $data->nNax + 1;
        $sql = "INSERT INTO `tbl_project_gallery`(`project_id`, `file_name`, `typefile`,`date_add`, `show_onweb`,`img_order`) VALUES ('" . $currentID . "','" . $img . "','1','".$today."','1','.$nMaxIns.')";
        $query = $this->db->query($sql);
        return $query;
    }
             //-------------------------------
    	function ADDyoutube ($dataID=null , $value=null) {
       		$today = date("Y-m-d H:i:s");
        	$data = array('file_name' => $value,
            	'project_id' =>$dataID,
            	'date_add' => $today,
            	'typefile' => '2',
                'show_onweb'=> '1'
        	);
            if ($this->db->insert('tbl_project_gallery', $data)) {
                $dataID = $dataID;
            } else {
                $dataID = 'Error';
            }   
    	}
          //------------------------------------------
     function deletegallrey($DataID, $fileName) { 

            $this->db->where('id', $DataID);
            if ($this->db->delete('tbl_project_gallery')) {
                @unlink('./uploadfile/' . $fileName);
                $pass = 1;
            } else {
                $pass = 0;
            }
        return $pass;
    }
               //--------------------------- 
    function list_News($currentID=null) {
        if ($currentID != '') {
            $sql = "SELECT * FROM `tbl_new` WHERE id = '$currentID' ORDER BY date_add DESC";
            $query = $this->db->query($sql);
        } else {
            $sql = "SELECT * FROM `tbl_new` ORDER BY date_add DESC";
            $query = $this->db->query($sql);
        }
        return $query;
    }
     //----------------------------------------
      function addnews($currentID=null, $topic_en=null, $topic_th=null,$commenten=null,$commentth=null,$commenten2=null,$commentth2=null) {
        $today = date("Y-m-d H:i:s");
        $data = array('topic_th' => $topic_th,
            'topic_en' => $topic_en,
            'detail_th' => $commentth,
            'detail_en' => $commenten,
            'detail2_en' => $commenten2,
            'detail2_th' => $commentth2,
            'date_add' => $today,
            'show_onweb' => '1'
        );

        if ($currentID == '') {

            if ($this->db->insert('tbl_new', $data)) {
                $currentID = $this->db->insert_id();
            } else {
                $currentID = 'Error';
            }
        } else {
            $data1 = array('topic_th' => $topic_th,
            'topic_en' => $topic_en,
            'detail_th' => $commentth,
            'detail_en' => $commenten,
            'detail2_en' => $commenten2,
            'detail2_th' => $commentth2,
            'date_add' => $today
        );
            $this->db->where('id', $currentID);
            if ($this->db->update('tbl_new', $data1)) {
                $currentID = $currentID;
            } else {
                $currentID = 'Error';
            }
        }

        return $currentID;
    }
     //-------------------------------------------
     function AddImgnews($img = null,$currentID = null) {
            $today = date("Y-m-d H:i:s");
        $sql = "INSERT INTO `tbl_new_img`(`new_id`, `img_name`, `date_add`, `show_onweb`) VALUES ('" . $currentID . "','" . $img . "','".$today."','1')";
        $query = $this->db->query($sql);
        return $query;
    }
                   //--------------------------- 
    function newsimg($currentID=null) {
            $sql = "SELECT * FROM `tbl_new_img` WHERE new_id = '$currentID' AND show_onweb = '1' ORDER BY date_add DESC";
            $query = $this->db->query($sql);
        return $query;
    }
           //------------------------------------------
     function deletenewsimg($DataID, $fileName) { 

            $this->db->where('id', $DataID);
            if ($this->db->delete('tbl_new_img')) {
                @unlink('./uploadfile/news/' . $fileName);
                $pass = 1;
            } else {
                $pass = 0;
            }
        return $pass;
    }
                 //--------------------------- 
    function list_slideData($currentID=null) {
        if ($currentID != '') {
            $sql = "SELECT * FROM `tbl_slide_show` WHERE id = '$currentID' ORDER BY date_add DESC";
            $query = $this->db->query($sql);
        } else {
            $sql = "SELECT * FROM `tbl_slide_show` ORDER BY date_add DESC";
            $query = $this->db->query($sql);
        }
        return $query;
    }
       //-------------------------------------------------------------------
      function addslide($currentID=NULL, $slide_title=NULL, $slide_detail=NULL,$learnMore=NULL,$img=NULL,$slide_titleth=NULL,$slide_detailth=NULL) {
        $today = date("Y-m-d H:i:s");
        $data = array('title1' => $slide_title,
            'title2' => $slide_detail,
            'title1th' => $slide_titleth,
            'title2th' => $slide_detailth,
            'explore_it' => $learnMore,
            'img_name' => $img,
            'date_add' => $today,
            'show_onweb' => '1'
        );

        if ($currentID == '') {

            if ($this->db->insert('tbl_slide_show', $data)) {
                $currentID = $this->db->insert_id();
            } else {
                $currentID = 'Error';
            }
        } else {
            $data1 = array('title1' => $slide_title,
            'title2' => $slide_detail,
            'title1th' => $slide_titleth,
            'title2th' => $slide_detailth,
            'explore_it' => $learnMore,
            'img_name' => $img,
            'date_add' => $today
        );
            $this->db->where('id', $currentID);
            if ($this->db->update('tbl_slide_show', $data1)) {
                $currentID = $currentID;
            } else {
                $currentID = 'Error';
            }
        }

        return $currentID;
    }
     //------------------------------------------
     function deleteimgslide($DataID, $fileName,$img) { 
         $data = array('img_name' => $img
        );
            $this->db->where('id', $DataID);
            if ($this->db->update('tbl_slide_show', $data)) {
                $pass = 1;
                @unlink('./uploadfile/slide/' . $fileName);
            } else {
                $pass = 0;
            }
        return $pass;
    }
               //--------------------------- 
    function list_admin($currentID=null) {
        if ($currentID != '') {
            $sql = "SELECT * FROM `tbl_username` WHERE id = '$currentID' ORDER BY id DESC";
            $query = $this->db->query($sql);
        } else {
            $sql = "SELECT * FROM `tbl_username` WHERE user_type = '0' ORDER BY id DESC";
            $query = $this->db->query($sql);
        }
        return $query;
    }
                     //--------------------------- 
    function list_slidebyon() {

            $sql = "SELECT * FROM `tbl_slide_show` WHERE show_onweb = '1' ORDER BY date_add DESC";
            $query = $this->db->query($sql);
        return $query;
    }
                //--------------------------- 
    function list_Newsbyon() {
          $sql = "SELECT * FROM `tbl_new` WHERE show_onweb = '1' ORDER BY date_add DESC";
            $query = $this->db->query($sql);
        return $query;
    }
                //--------------------------- 
    function list_Newslimit() {
          $sql = "SELECT * FROM `tbl_new` WHERE show_onweb = '1' ORDER BY date_add DESC LIMIT 3";
            $query = $this->db->query($sql);
        return $query;
    }
                    //--------------------------- 
    function newsimglimit($currentID=null) {
            $sql = "SELECT * FROM `tbl_new_img` WHERE new_id = '$currentID' AND show_onweb = '1' ORDER BY date_add DESC LIMIT 1";
            $query = $this->db->query($sql);
        return $query;
    }
                    //--------------------------- 
    function list_projectbycate($cate_id=NULL) {
          $sql = "SELECT * FROM `tbl_project` WHERE show_onweb = '1' AND cate_id = '$cate_id' ORDER BY date_add DESC";
            $query = $this->db->query($sql);
        return $query;
    }
                      //--------------------------- 
    function list_gallerylimit($project_id=NULL) {
          $sql = "SELECT * FROM `tbl_project_gallery` WHERE show_onweb = '1' AND project_id = '$project_id' AND typefile = '1' ORDER BY img_order ASC LIMIT 1";
            $query = $this->db->query($sql);
        return $query;
    }
                   //--------------------------- 
    function list_gallery($currentID=null) {
            $sql = "SELECT * FROM `tbl_project_gallery` WHERE project_id = '$currentID' AND show_onweb = '1'  ORDER BY img_order ASC";
            $query = $this->db->query($sql);
        return $query;
    }
      //----------------------------------------
    function getNewsDetail($limit = null, $notUse = null, $start = null, $perpage = null) {
        if ($limit != '') {
            $txtWhere = 'LIMIT ' . $limit;
        } else {
            $txtWhere = '';
        }if ($notUse != '') {
            $txtNot = "AND id !='" . $notUse . "' ";
        } else {
            $txtNot = '';
        }
        if (($start >= 0) && ($perpage >= 0)) {
            $txtStart = 'LIMIT ' . $start . ',' . $perpage;
        } else {
            $txtStart = '';
        }
        $sql = $this->db->query("SELECT * FROM  tbl_new WHERE show_onweb = '1' ORDER BY date_add DESC  $txtWhere $txtNot $txtStart  " );
        return $sql;
    }
                //--------------------------- 
    function list_career($currentID=null) {
        if ($currentID != '') {
            $sql = "SELECT * FROM `tbl_career` WHERE id = '$currentID' ";
            $query = $this->db->query($sql);
        } else {
            $sql = "SELECT * FROM `tbl_career` ORDER BY date_add ASC";
            $query = $this->db->query($sql);
        }
        return $query;
    }
     //----------------------------------------
      function addcareer($currentID=null, $career_name=null, $career_nameth=null,$category_name=null,$category_nameth=null,$location=null,$propertyen=null,$propertyth=null,$Jobduty=null,$Jobdutyth=null,$quantity=null) {
        $today = date("Y-m-d H:i:s");
        $data = array('career_name' => $career_name,
            'career_nameth' => $career_nameth,
            'category_name' => $category_name,
            'category_nameth' => $category_nameth,
            'location' => $location,
            'property' => $propertyen,
            'property_thai' => $propertyth,
            'Job_duty' => $Jobduty,
            'Job_duty_th' => $Jobdutyth,
            'quantity' => $quantity,
            'date_add' => $today,
            'show_onweb' => '1'
        );

        if ($currentID == '') {

            if ($this->db->insert('tbl_career', $data)) {
                $currentID = $this->db->insert_id();
            } else {
                $currentID = 'Error';
            }
        } else {
            $this->db->where('id', $currentID);
            if ($this->db->update('tbl_career', $data)) {
                $currentID = $currentID;
            } else {
                $currentID = 'Error';
            }
        }

        return $currentID;
    }
                 //--------------------------- 
    function list_careerbyon() {

            $sql = "SELECT * FROM `tbl_career` WHERE show_onweb = '1' ORDER BY date_add DESC";
            $query = $this->db->query($sql);

        return $query;
    }
    //----------------------------------------
      function addcareerform($Title=null, $Name=null, $Lastname=null,$card_no=null,$birthday=null,$Age=null,$gender=null,$Religion=null,$Race=null,$Nationality=null,$Weight=null,$Height=null,$Marital=null,$Military=null,$Address=null,$Phone_Number=null,$Email=null,$Person_to_notify=null,$Person_phone_to=null,$Degree1=null,$Institution1=null,$Faculty1=null,$Major1=null,$From_Year1=null,$To_Year1=null,$GPA1=null,$Degree2=null,$Institution2=null,$Faculty2=null,$Major2=null,$From_Year2=null,$To_Year2=null,$GPA2=null,$Degree3=null,$Institution3=null,$Faculty3=null,$Major3=null,$From_Year3=null,$To_Year3=null,$GPA3=null,$Company1=null,$Position1=null,$Start_Date1=null,$End_Date1=null,$Salary1=null,$Your_responsibilities1=null,$Reason1=null,$Company2=null,$Position2=null,$Start_Date2=null,$End_Date2=null,$Salary2=null,$Your_responsibilities2=null,$Reason2=null,$Company3=null,$Position3=null,$Start_Date3=null,$End_Date3=null,$Salary3=null,$Your_responsibilities3=null,$Reason3=null,$Training_Course1=null,$Training_Institution1=null,$Date_of_Training1=null,$Training_Duration1=null,$Training_Course2=null,$Training_Institution2=null,$Date_of_Training2=null,$Training_Duration2=null,$Training_Course3=null,$Training_Institution3=null,$Date_of_Training3=null,$Training_Duration3=null,$LANGUAGE1=null,$Listening1=null,$Speaking1=null,$Reading1=null,$Writing1=null,$LANGUAGE2=null,$Listening2=null,$Speaking2=null,$Reading2=null,$Writing2=null,$LANGUAGE3=null,$Listening3=null,$Speaking3=null,$Reading3=null,$Writing3=null,$Position=null,$Type=null,$Expected_Salary=null,$Start_Date=null,$career_id=null) {
        $today = date("Y-m-d H:i:s");
        $data = array('career_id' => $career_id,
            'Title_name' => $Title,
            'First_name' => $Name,
            'Last_name' => $Lastname,
            'Card_no' => $card_no,
            'Birth_day' => $birthday,
            'Age' => $Age,
            'Gender' => $gender,
            'Religion' => $Religion,
            'Race' => $Race,
            'Nationality' => $Nationality,
            'Weight' => $Weight,
            'Height' => $Height,
            'Marital_status' => $Marital,
            'Military_Service' => $Military,
            'Address' => $Address,
            'Phone_Number' => $Phone_Number,
            'Email' => $Email,
            'Person_to_notify' => $Person_to_notify,
            'Person_phone_to' => $Person_phone_to,
            'Degree1' => $Degree1,
            'Degree2' => $Degree2,
            'Degree3' => $Degree3,
            'Institution1' => $Institution1,
            'Institution2' => $Institution2,
            'Institution3' => $Institution3,
            'Faculty1' => $Faculty1,
            'Faculty2' => $Faculty2,
            'Faculty3' => $Faculty3,
            'Major1' => $Major1,
            'Major2' => $Major2,
            'Major3' => $Major3,
            'From_Year1' => $From_Year1,
            'From_Year2' => $From_Year2,
            'From_Year3' => $From_Year3,
            'To_Year1' => $To_Year1,
            'To_Year2' => $To_Year2,
            'To_Year3' => $To_Year3,
            'GPA1' => $GPA1,
            'GPA2' => $GPA2,
            'GPA3' => $GPA3,
            'Company1' => $Company1,
            'Company2' => $Company2,
            'Company3' => $Company3,
            'Positionhistory1' => $Position1,
            'Positionhistory2' => $Position2,
            'Positionhistory3' => $Position3,
            'Start_Datehistory1' => $Start_Date1,
            'Start_Datehistory2' => $Start_Date2,
            'Start_Datehistory3' => $Start_Date3,
            'End_Datehistory1' => $End_Date1,
            'End_Datehistory2' => $End_Date2,
            'End_Datehistory3' => $End_Date3,
            'Salary1' => $Salary1,
            'Salary2' => $Salary2,
            'Salary3' => $Salary3,
            'Your_responsibilities1' => $Your_responsibilities1,
            'Your_responsibilities2' => $Your_responsibilities2,
            'Your_responsibilities3' => $Your_responsibilities3,
            'ReasonforLeaving1' => $Reason1,
            'ReasonforLeaving2' => $Reason2,
            'ReasonforLeaving3' => $Reason3,
            'Training_Course1' => $Training_Course1,
            'Training_Course2' => $Training_Course2,
            'Training_Course3' => $Training_Course3,
            'Training_Institution1' => $Training_Institution1,
            'Training_Institution2' => $Training_Institution2,
            'Training_Institution3' => $Training_Institution3,
            'Date_of_Training1' => $Date_of_Training1,
            'Date_of_Training2' => $Date_of_Training2,
            'Date_of_Training3' => $Date_of_Training3,
            'Training_Duration1' => $Training_Duration1,
            'Training_Duration2' => $Training_Duration2,
            'Training_Duration3' => $Training_Duration3,
            'LANGUAGE1' => $LANGUAGE1,
            'LANGUAGE2' => $LANGUAGE2,
            'LANGUAGE3' => $LANGUAGE3,
            'Listening1' => $Listening1,
            'Listening2' => $Listening2,
            'Listening3' => $Listening3,
            'Speaking1' => $Speaking1,
            'Speaking2' => $Speaking2,
            'Speaking3' => $Speaking3,
            'Reading1' => $Reading1,
            'Reading2' => $Reading2,
            'Reading3' => $Reading3,
            'Writing1' => $Writing1,
            'Writing2' => $Writing2,
            'Writing3' => $Writing3,
            'Position' => $Position,
            'Type' => $Type,
            'Expected_Salary' => $Expected_Salary,
            'Start_Date' => $Start_Date,
            'date_add' => $today
        );

            if ($this->db->insert('tbl_form_career', $data)) {
                $currentID = $this->db->insert_id();
            } else {
                $currentID = '0';
            }

        return $currentID;
    }
       //-------------------------------------------
     function addimgcareer($img = null,$currentID = null) {
         $today = date("Y-m-d H:i:s");
        $sql = "INSERT INTO `tbl_form_careerimg`(`form_career_id`, `img_name`,`date_add`) VALUES ('" . $currentID . "','" . $img . "','".$today."')";
        $query = $this->db->query($sql);
        return $query;
    }
                 //--------------------------- 
    function list_careerform($currentID=null) {
        if($currentID!=''){
            $sql = "SELECT * FROM `tbl_form_career` WHERE id = '$currentID' ";
            $query = $this->db->query($sql);
        }else{
            $sql = "SELECT * FROM `tbl_form_career` ORDER BY date_add DESC ";
            $query = $this->db->query($sql);
        }
        return $query;
    }
             //---------------------------
    function loadcareerimg($ProID) {
        $sql = $this->db->query("SELECT * FROM `tbl_form_careerimg` WHERE form_career_id ='" . $ProID . "' ORDER BY date_add ASC");
        return $sql;
    }
                              //--------------------------- 
    function list_bigadmin() {

            $sql = "SELECT * FROM `tbl_username` WHERE user_type = '1'";
            $query = $this->db->query($sql);
        
        return $query;
    }
 
 }
