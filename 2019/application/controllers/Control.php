<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
       parent::__construct();
		 if($this->session->userdata('user_id')==''){
			    redirect(base_url('login'), 'refresh');
			    exit();
			 
		  }
			
          $this->load->model('Project_model');  
          $this->load->model('User_model');  
		 
    }
	//---------------------
	public function index()
	{
		 if($this->session->userdata('user_id')=='1'){
		$data['list_project']=$this->Project_model->list_project();
		$this->load->view('backend/header');
		$this->load->view('backend/project_list',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/project_list_script');
                 }else{
                     $this->load->view('backend/header');
		$this->load->view('backend/index');
		$this->load->view('backend/footer');
                 }
                
	}
               	//-------------------------------	
   public function cangePassForm(){
	   $this->load->view('backend/changepassform');
   }
   //-------------------------------  doChangePass') ', { newpass
    public function doChangePass(){
		$id = $this->input->post('id');
		$newpass = trim($this->input->post('newpass'));
		
		$result = $this->User_model->doChangePass($newpass,$id);
		echo $result;
	}
    //----------------------------------
    public function Facilities_list() {
            $data['list_Facilities']=$this->Project_model->list_Facilities();
		$this->load->view('backend/header');
		$this->load->view('backend/facilities_list',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/facilities_list_script');
        }
                  //-------------------
        public function set_ShowOnWeb() {
            $dataID = $this->input->post('dataID');
            $check = $this->input->post('check');
            $table = $this->input->post('table');
            $result = $this->Project_model->update_ShowOnWeb($dataID, $check, $table);
            echo $result;
    }
      //---------------------------
        public function Facilities_add($currentID=NULL){
         $data['currentID'] = $currentID;
		
		$this->load->view('backend/header');
		$this->load->view('backend/facilities_add',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/facilities_addt_script');	
	}
        //------------------------------------------
          public function addFacilities() {
        $topic_en = $this->input->post('topic_en');
        $topic_th = $this->input->post('topic_th');
        $commenten = $this->input->post('commenten');
        $commentth = $this->input->post('commentth');
        $icon_class = $this->input->post('icon_class');
        $currentID = $this->input->post('currentID');
        $result_id = $this->Project_model->addFacilities($currentID, $topic_en, $topic_th,$commenten,$commentth,$icon_class);
        echo $result_id;
    }    //----------------------------
     //-------------------
    public function delete(){
        $dataID = $this->input->post('dataID');
        $table = $this->input->post('table');
        $result = $this->Project_model->delete_data($dataID, $table);
        echo $result;
    } 
    //-------------------
    public function category(){
		$main_cate = 0;
		$data['category']= $this->Project_model->list_cateData();
		$data['categorymain']= $this->Project_model->list_cateDatamain($main_cate);
		
		$this->load->view('backend/header');
		$this->load->view('backend/category_add',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/category_add_script');
	}
     //------------------------
    public function loadcate() {
        $main_cate = 0;
        $list_cateDatamain = $this->Project_model->list_cateDatamain($main_cate);
        $numcate = $list_cateDatamain->num_rows();

        ?>
        <form name="cateForm" id="cateForm">
            <table id="table1" class="table table-hover ">
                                <thead>
                                <tr>
                                    <th style="text-align:center">#</th>
                                    <th style="text-align:center">Category English</th>
                                    <th style="text-align:center">Category Thai</th>
                                    <th style="text-align:center">Show onweb</th>
                                   <th style="text-align:center"  width="50">Edit</th>
									<th style="text-align:center" width="50">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
				<?php $n=1; foreach($list_cateDatamain->result() AS $data){ 
                                    $list_cateDatasub = $this->Project_model->list_cateDatamain($data->id);
                                $numcatesub = $list_cateDatasub->num_rows();
                                    ?>	
                                <tr id="row<?php echo $data->id?>" style="background-color: #BEBEBE">
                                    <th style="text-align:center" scope="row"><?php echo $n?></th>
                                    
							<td><input type="text" id="name_en<?php echo $data->id?>" name="name_en<?php echo $data->id?>" class="form-control"  value="<?php echo $data->cate_name_en?>"  ></td>
                                                        <td><input type="text" id="name_th<?php echo $data->id?>" name="name_th<?php echo $data->id?>" class="form-control" value="<?php echo $data->cate_name_th?>" ></td>
                                    <td style="text-align:center"><label>
                                                                                <input id="ch<?php echo $data->id ?>"  type="checkbox" class="js-switch js-check-change" onClick="setShow_onWeb('<?php echo $data->id ?>', this.value, 'tbl_category_project')" value="<?php echo $data->show_onweb ?>"  <?php
                                                                                      if ($data->show_onweb == '1') {
                                                                                           echo 'checked';
                                                                                       }
                                                                                       ?> data-plugin="switchery" data-color="#007bff" data-size="small"  /></label></td>
                                    <td style="text-align:center"><button type="button" class="btn btn-success btn-sm" onClick="updatecate('<?php echo $data->cate_lv?>','<?php echo $data->main_cate_id?>','<?php echo $data->id?>')"><i class="icon-pencil"></i></button></td>
                                    <td style="text-align:center"><button type="button" class="btn btn-danger btn-sm" onClick="comfirmDelete('<?php echo $data->id?>' ,'tbl_category_project' , '<?php echo $data->cate_name_en?>')" <?php if($numcatesub>0){echo 'disabled';}?>><i class="icon-trash"></i></button></td>
                                </tr>
                                <?php 
                                $nSub=1;
                                
        if($numcatesub > 0){
                                  foreach($list_cateDatasub->result() AS $datasub){  
                                ?>
                                <tr id="row<?php echo $datasub->id?>">
                                    <th style="text-align:center" scope="row"><?php echo $n.'.'.$nSub?></th>
                                    
							<td><input type="text" id="name_en<?php echo $datasub->id?>" name="name_en<?php echo $datasub->id?>" class="form-control"  value="<?php echo $datasub->cate_name_en?>"  ></td>
                                                        <td><input type="text" id="name_th<?php echo $datasub->id?>" name="name_th<?php echo $datasub->id?>" class="form-control" value="<?php echo $datasub->cate_name_th?>" ></td>
                                    <td style="text-align:center"><label>
                                                                                <input id="ch<?php echo $datasub->id ?>"  type="checkbox" class="js-switch js-check-change" onClick="setShow_onWeb('<?php echo $datasub->id ?>', this.value, 'tbl_category_project')" value="<?php echo $datasub->show_onweb ?>"  <?php
                                                                                      if ($datasub->show_onweb == '1') {
                                                                                           echo 'checked';
                                                                                       }
                                                                                       ?> data-plugin="switchery" data-color="#007bff" data-size="small"  /></label></td>
                                    <td style="text-align:center"><button type="button" class="btn btn-success btn-sm" onClick="updatecate('<?php echo $datasub->cate_lv?>','<?php echo $datasub->main_cate_id?>','<?php echo $datasub->id?>')"><i class="icon-pencil"></i></button></td>
                                    <td style="text-align:center"><button type="button" class="btn btn-danger btn-sm" onClick="comfirmDelete('<?php echo $datasub->id?>' ,'tbl_category_project' , '<?php echo $datasub->cate_name_en?>')"><i class="icon-trash"></i></button></td>
                                </tr>
        <?php $nSub++; }}?>
                                <?php  $n++;  }?>
                                </tbody>
                            </table>
        </form>
        <script>
            $(document).ready(function () {
               $('#table1').DataTable({
                    searching: false,
                    ordering: false,
                    pageLength: 15,
                    lengthChange: false
                });
                ///////////////////////////////////////	

                $('[data-plugin="switchery"]').each(function (idx, obj) {
                    new Switchery($(this)[0], $(this).data());
                });
            })
        </script> 
        <?php
    }
    //------------------	
  public function addcate(){
        $cate_name_en = $this->input->post('cate_name_en');
        $cate_name_th = $this->input->post('cate_name_th');
        $cate_lv = $this->input->post('cate_lv');
        $main_cate_id = $this->input->post('main_cate_id');
        $dataid = $this->input->post('dataid');
        $result_id = $this->Project_model->addcate($cate_name_en,$cate_name_th,$cate_lv,$main_cate_id,$dataid);
        echo $result_id;
  }
  public function Project_list()
	{
		
		$data['list_project']=$this->Project_model->list_project();
		$this->load->view('backend/header');
		$this->load->view('backend/project_list',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/project_list_script');
	}
        //---------------------------
        public function Project_add($currentID=NULL){
                $data['currentID'] = $currentID;
		$data['list_project']= $this->Project_model->list_project($currentID);
                $main_cate = 0;
		$data['categorymain']= $this->Project_model->list_cateDatamain($main_cate);
		$data['Facilitiesstatus']= $this->Project_model->Facilitiesstatus();
                $data['list_houseplan']= $this->Project_model->list_houseplan($currentID);
                $data['list_function']= $this->Project_model->list_function($currentID);
                $data['loadImg']= $this->Project_model->loadImg($currentID);
		$this->load->view('backend/header');
		$this->load->view('backend/project_add',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/project_add_script');	
	}
        //----------------------------------
        public  function changemain(){
		$changeValue = $this->input->post('changeValue');

		$subcate = $this->input->post('subcate');
		
		$result = $this->Project_model->list_cateDatamain($changeValue);?>


                 <option value="" >---Select---</option>
            <?php $select3 ='';$disableselect=''; $used = '';
            foreach ($result->result() as $result2){
                $list_projectbycate = $this->Project_model->list_projectbycate($result2->id);
                $numcate = $list_projectbycate->num_rows();
                 if($result2->id  == $subcate){ $select3 = 'selected';}
                 
                
                 ?>
		<option value="<?php echo $result2->id ?>"<?php echo $select3?><?php if($numcate>0){echo 'disabled';}?>><?php echo $result2->cate_name_en ?> <?php  if($numcate>0){ echo '(Used)';}?></option>
                <?php $select3 ='';  }
         }
    //------------------------------------
          public function loadImgpack(){
		 $ProID = $this->input->post('ProID');
		 $imglist = $this->Project_model->list_project($ProID);
		 echo '<table class="table table-bordered table-hover">';
		 foreach($imglist->result() AS $data){ 
			 echo '<tr id = "RowImg'.$data->id.'">';
			 echo '<td><span class="text-danger"><img src="'.base_url('uploadfile/').$data->img_name.'" style="width:150px;" class="thumbnail"></span></td>';
			 echo '<td width="30"><button type="button" class="btn btn-danger btn-sm" onclick="imgDelete(\''.$data->id.'\' , \''.$data->img_name.'\')"><i class="icon-trash"></i></button></td>';
			 echo '</tr>';
		 }
		 echo '</table>';
	 }
            //-------------------------------
	 public function deleteimg(){
             $img = '';
	 	 $DataID = $this->input->post('DataID');
	 	 $FileName = $this->input->post('FileName');
		 $result = $this->Project_model->deleteimg($DataID, $FileName,$img);
		 echo $result;
	 }
           //-------------------------
      function load_map(){
            $data["lat_p"]=$this->input->get('lat_p');
            $data["lng_p"]=$this->input->get('lng_p');
            $data["company"]=$this->input->get('company');
            $this->load->view('backend/map_edit',$data);
            	      
     }
     //--------------------------------------------------------
       function Maps(){
    	 $data["lat_p"] = $this->input->get('lat');
    	 $data["lng_p"] = $this->input->get('lng');
         $data["company"]=$this->input->get('company');

    	 $this->load->view('backend/map',$data);
    }
    //---------------------------------------------------------
     //------------------------------- 	
    public function addproject() {
        $cate_id = $this->input->post('subcate');
        $commenten = $this->input->post('commentencon');
        $commentth = $this->input->post('commentthcon');
        $tool_map_url = $this->input->post('tool_map_url');
        $get_lat = $this->input->post('get_lat');
        $get_lng = $this->input->post('get_lng');
        $currentID = $this->input->post('currentID');
                                $imgold = $this->input->post('imgold');
				$pack_img = $this->input->post('pack_img');
                                if(($pack_img!='')&&($imgold !='')){
                                    @unlink('./uploadfile/' . $imgold);
                                }
	$upload_path = './uploadfile';
				$upload_pathName = 'uploadfile';
				$config['upload_path'] = $upload_path;
				//allowed file types. * means all types
				$config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
				//allowed max file size. 0 means unlimited file size
				$config['max_size'] = '0';
				//max file name size
				$config['max_filename'] = '255';
				//whether file name should be encrypted or not
				$config['encrypt_name'] = TRUE;
				//store image info once uploaded
				$image_data = array();
				//check for errors
				$is_file_error = FALSE;
		 	
		    $this->load->library('upload', $config);         
				//---------------------------
				$_FILES['userFile']['name'] = $_FILES['pack_img']['name'];
                $_FILES['userFile']['type'] = $_FILES['pack_img']['type'];
                $_FILES['userFile']['tmp_name'] = $_FILES['pack_img']['tmp_name'];
                $_FILES['userFile']['error'] = $_FILES['pack_img']['error'];
                $_FILES['userFile']['size'] = $_FILES['pack_img']['size'];
                $this->upload->initialize($config);
        
                 if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $uploadData['file_name'] = $fileData['file_name'];
                     $result_id = $this->Project_model->addproject($currentID, $cate_id, $commenten,$commentth,$tool_map_url,$get_lat,$get_lng, $uploadData['file_name']);
                     $currentID = $currentID;
                }else{
                    $result_id = $this->Project_model->addproject($currentID, $cate_id, $commenten,$commentth,$tool_map_url,$get_lat,$get_lng, $imgold);
                    $currentID = $currentID;
                } 
        echo $result_id;
    }
     //------------------------------- 	
    public function AddFacdata() {
        $currentID = $this->input->post('currentIDFac');
        $Facilities = $this->input->post('Facilities');
        if($Facilities!=''){
                    foreach($Facilities AS $value){
                     if($value !=''){
                         $result_id = $this->Project_model->AddFacdata($currentID , $value);
                        
                     }  
                 }
                 }
        echo $result_id;
    }
    //------------------------
    public function loadFac() {
          $ProID = $this->input->post('ProID');
          $Facilitiesstatus = $this->Project_model->Facilitiesstatus();
          $Facilitiesproject = $this->Project_model->Facilitiesproject($ProID);

                        foreach ($Facilitiesproject->result() AS $Facilitiesproject2){?>
		<div class="form-group row">
                                   <label class="col-md-3 col-sm-12 col-form-label"></label>
                                         <div id="facilities_a" class="col-sm-6">
                                             <select class="form-control selectall" id="Facilities<?php echo $Facilitiesproject2->id?>" name="Facilities1[]" disabled>
                                                    <option value="">---Select---</option>
                                                    <?php
                                                        foreach ($Facilitiesstatus->result() as $Facilities) {
                                                        ?>
                                                        <option value="<?php echo $Facilities->id ?>" <?php if($Facilitiesproject2->facilities_id == $Facilities->id){echo 'selected';}?>><?php echo $Facilities->topic_en ?> </option>
													<?php } ?>
													
													
                                                </select>
                                         </div>
                                               <div class="col-sm-3">
                                                        <a  id="bt2"class="btn btn-danger entypo-cancel" onclick="deletefac('<?php echo $Facilitiesproject2->id ?>', 'tbl_facilities_project','<?php echo $ProID?>')"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                         
                                                    </div>
                                    </div>
                  <?php }
    }
      //------------------------
    public function loadFunction() {
          $ProID = $this->input->post('ProID');
          $Facilitiesstatus = $this->Project_model->Facilitiesstatus();
          $list_function = $this->Project_model->list_function($ProID);

                        foreach ($list_function->result() AS $list_function2){?>
		<div class="form-group row">
                                   <label class="col-md-3 col-sm-12 col-form-label"></label>
                                         <div id="facilities_a" class="col-sm-6">
                                             <select class="form-control functionl" id="Function<?php echo $list_function2->id?>" name="Function1[]" disabled>
                                                    <option value="">---Select---</option>
                                                    <?php
                                                        foreach ($Facilitiesstatus->result() as $Facilities) {
                                                        ?>
                                                        <option value="<?php echo $Facilities->id ?>" <?php if($list_function2->facilities_id == $Facilities->id){echo 'selected';}?>><?php echo $Facilities->topic_en ?> </option>
													<?php } ?>
													
													
                                                </select>
                                         </div>
                                               <div class="col-sm-3">
                                                        <a  id="bt2"class="btn btn-danger entypo-cancel" onclick="deletefunction('<?php echo $list_function2->id ?>', 'tbl_function_house')"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                         
                                                    </div>
                                    </div>
                  <?php }
    }
     //----------------------------------
    public function loadImg() {
        $ProID = $this->input->post('ProID');
        $imglist = $this->Project_model->loadImg($ProID);
        echo '<table class="table table-bordered table-hover">';
        foreach ($imglist->result() AS $data) {
            echo '<tr id = "RowImg' . $data->id . '">';
            echo '<td><span class="text-danger"><img src="'.base_url('uploadfile/') . $data->img_name.'" style="width:150px;" class="thumbnail"></span></td>';
            ?>
                <td style="text-align: -webkit-center;"><input style="width: 200px;" id="des<?php echo $data->id ?>" type="text" class="form-control form-control-sm " value="<?php echo $data->description ?>" onChange="updateOrder('<?php echo $data->id ?>', 'description', this.value,'<?php echo $ProID?>')" placeholder="Image description English">
                </td>
                <td style="text-align: -webkit-center;"><input style="width: 200px;" id="desth<?php echo $data->id ?>" type="text" class="form-control form-control-sm " value="<?php echo $data->description_th ?>" onChange="updateOrder('<?php echo $data->id ?>', 'description_th', this.value,'<?php echo $ProID?>')" placeholder="Image description Thai">
                </td>
            
            <td style="text-align: -webkit-center;"><input style="text-align:center;width: 200px;" id="order<?php echo $data->id ?>" type="text" class="form-control form-control-sm OrderCate" value="<?php echo $data->img_order ?>" onChange="updateOrder('<?php echo $data->id ?>', 'img_order', this.value,'<?php echo $ProID?>')">
                <input type="hidden" id="chkOrder<?php echo $data->id ?>" value="<?php echo $data->img_order ?>"></td><?php
            echo '<td width="30" style="text-align: center"><button type="button" class="btn btn-danger btn-sm" onclick="comfirmDelete(\'' . $data->id . '\' , \'' . $data->img_name . '\')"><i class="icon-trash"></i></button></td>';
            echo '</tr>';
        }
        echo '</table>';
    }
       //------------------dataID changeValue //
    public function updateOrder() {
        $dataID = $this->input->post('dataID');
        $FieldName = $this->input->post('FieldName');
        $changeValue = $this->input->post('changeValue');
        $result = $this->Project_model->updateOrder($dataID,$FieldName, $changeValue);
        echo $result;
    }
       //------------------dataID changeValue //
    public function updateOrdergall() {
        $dataID = $this->input->post('dataID');
        
        $changeValue = $this->input->post('changeValue');
        $result = $this->Project_model->updateOrdergall($dataID, $changeValue);
        echo $result;
    }
        //-------------------------------
	 public function deleteimghouse(){
             $img = '';
	 	 $DataID = $this->input->post('DataID');
	 	 $FileName = $this->input->post('FileName');
		 $result = $this->Project_model->deleteimghouse($DataID, $FileName,$img);
		 echo $result;
	 }
          //------------------------------- 	
    public function Addhouse() {
        $currentID = $this->input->post('currentID');
        $commenten = $this->input->post('commenten2');
        $commentth = $this->input->post('commentth2');
        $Function = $this->input->post('Function');
        $houseplanID = $this->input->post('houseplanID');
        $result_id = $this->Project_model->addhouse($houseplanID,$currentID, $commenten,$commentth);
        if($result_id !='0'){
            $upload_path = './uploadfile';
        $upload_pathName = 'uploadfile';
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
        $config['max_size'] = '0';
        $image_data = array();
        $is_file_error = FALSE;
        $Result = 0;
        $this->load->library('upload', $config);
        $countFiles = count($_FILES['img2']['name']);
        if ($countFiles > 0) {
            for ($i = 0; $i < $countFiles; $i++) {
                //---------------------------
                $_FILES['file_upload2']['name'] = $_FILES['img2']['name'][$i];
                $_FILES['file_upload2']['type'] = $_FILES['img2']['type'][$i];
                $_FILES['file_upload2']['tmp_name'] = $_FILES['img2']['tmp_name'][$i];
                $_FILES['file_upload2']['error'] = $_FILES['img2']['error'][$i];
                $_FILES['file_upload2']['size'] = $_FILES['img2']['size'][$i];
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file_upload2')) {
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $img = $uploadData[$i]['file_name'];
                    $result_img = $this->Project_model->addimghouse($img, $currentID);
                }
            }
        }
        if($Function!=''){
                    foreach($Function AS $value){
                     if($value !=''){
                         $result_function = $this->Project_model->AddFuncation($currentID , $value);
                        
                     }  
                 }
                 }
         $result_id = $currentID;
        }else{
         $result_id = '0';   
        }
        echo $result_id;
    }
       //------------------------
    public function loadnearby() {
        $currentID = $this->input->post('currentID');
        $list_nearby = $this->Project_model->list_nearby($currentID);
        
        ?>
        <form name="cateForm" id="cateForm">
            <table id="table1" class="table table-hover ">
                                <thead>
                                <tr>
                                    <th style="text-align:center">#</th>
                                    <th style="text-align:center">Places English</th>
                                    <th style="text-align:center">Places Thai</th>
                                    <th style="text-align:center" width="100">Minutes</th>
                                    <th style="text-align:center" width="100">Distance</th>
                                    <th style="text-align:center">Show on web</th>
                                    <th style="text-align:center"  width="50">Edit</th>
				    <th style="text-align:center" width="50">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
				<?php $n=1; foreach($list_nearby->result() AS $data){ ?>	
                                <tr id="row<?php echo $data->id?>">
                                    <th style="text-align:center" scope="row"><?php echo $n?></th>
                                    
							<td><input type="text" id="Places_en<?php echo $data->id?>" name="Places_en<?php echo $data->id?>" class="form-control form-control-sm"  value="<?php echo $data->place_eng?>"  ></td>
                                                        <td><input type="text" id="Places_th<?php echo $data->id?>" name="Places_th<?php echo $data->id?>" class="form-control form-control-sm" value="<?php echo $data->place_thai?>" ></td>
                                                        <td>
                                                            <input type="text" id="Minutes<?php echo $data->id?>" name="Minutes<?php echo $data->id?>" class="form-control form-control-sm" value="<?php echo $data->time?>" >
                                                            </td>
                                                        <td><input type="text" id="distance<?php echo $data->id?>" name="distance<?php echo $data->id?>" class="form-control form-control-sm" value="<?php echo $data->distance?>" ></td>
                                    <td style="text-align:center"><label>
                                                                                <input id="ch<?php echo $data->id ?>"  type="checkbox" class="js-switch js-check-change" onClick="setShow_onWeb('<?php echo $data->id ?>', this.value, 'tbl_project_nearby')" value="<?php echo $data->show_onweb ?>"  <?php
                                                                                      if ($data->show_onweb == '1') {
                                                                                           echo 'checked';
                                                                                       }
                                                                                       ?> data-plugin="switchery" data-color="#007bff" data-size="small"  /></label></td>
                                    <td style="text-align:center"><button type="button" class="btn btn-success btn-sm" onClick="updatenearby('<?php echo $data->id?>')"><i class="icon-pencil"></i></button></td>
                                    <td style="text-align:center"><button type="button" class="btn btn-danger btn-sm" onClick="Deletenearby('<?php echo $data->id?>' ,'tbl_project_nearby')"><i class="icon-trash"></i></button></td>
                                </tr>
                                <?php  $n++;  }?>
                                </tbody>
                            </table>
        </form>
        <script>
            $(document).ready(function () {
               $('#table1').DataTable({
                    searching: false,
                    ordering: false,
                    pageLength: 15,
                    lengthChange: false
                });
                ///////////////////////////////////////	

                $('[data-plugin="switchery"]').each(function (idx, obj) {
                    new Switchery($(this)[0], $(this).data());
                });
            })
        </script> 
        <?php
    }
      //------------------
  public function addnearby(){
        $Places_en = $this->input->post('Places_en');
        $Places_th = $this->input->post('Places_th');
        $Minutes = $this->input->post('Minutes');
        $distance = $this->input->post('distance');
        $projectID = $this->input->post('currentID');
        $dataid = $this->input->post('dataid');
        $result_id = $this->Project_model->addnearby($Places_en,$Places_th,$Minutes,$distance,$projectID,$dataid);
        echo $result_id;
  }
    //------------------------
    public function loadyoutube() {
          $ProID = $this->input->post('ProID');
          $galleryyoutube = $this->Project_model->galleryyoutube($ProID);
          echo '<table class="table table-bordered table-hover">';
		 foreach($galleryyoutube->result() AS $data){ 
			 echo '<tr id = "RowImg'.$data->id.'">';
			 echo '<td>'.$data->file_name.'</td>';
			 echo '<td width="30"><button type="button" class="btn btn-danger btn-sm" onclick="deleteyoutube(\''.$data->id.'\' , \'tbl_project_gallery\',\''.$ProID.'\')"><i class="icon-trash"></i></button></td>';
			 echo '</tr>';
		 }
		 echo '</table>';
          
    }
    //------------------------
    public function loadgallery() {
          $ProID = $this->input->post('ProID');
          $galleryimg = $this->Project_model->galleryimg($ProID);
 echo '<table class="table table-bordered table-hover">';
		 foreach($galleryimg->result() AS $data){ 
			 echo '<tr id = "RowImg'.$data->id.'">';
			 echo '<td><span class="text-danger"><img src="'.base_url('uploadfile/').$data->file_name.'" style="width:150px;" class="thumbnail"></span></td>';
            ?>
            <td style="text-align: -webkit-center;"><input style="text-align:center;width: 200px;" id="order<?php echo $data->id ?>" type="text" class="form-control form-control-sm OrderCate" value="<?php echo $data->img_order ?>" onChange="updateOrdergall('<?php echo $data->id ?>', 'img_order', this.value,'<?php echo $ProID?>')">
                <input type="hidden" id="chkOrder<?php echo $data->id ?>" value="<?php echo $data->img_order ?>"></td><?php
			 echo '<td width="30"><button type="button" class="btn btn-danger btn-sm" onclick="deletegallrey(\''.$data->id.'\' , \''.$data->file_name.'\')"><i class="icon-trash"></i></button></td>';
			 echo '</tr>';
		 }
		 echo '</table>';
    }
          //------------------------------- 	
    public function AddImages() {
        $today = date("Y-m-d H:i:s");
        $currentID = $this->input->post('currentID2');
            $upload_path = './uploadfile';
        $upload_pathName = 'uploadfile';
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
        $config['max_size'] = '0';
        $config['file_name'] = 'gallery_'.$today; 
        $image_data = array();
        $is_file_error = FALSE;
        $Result = 0;
        $this->load->library('upload', $config);
        $countFiles = count($_FILES['imggallery']['name']);
        if ($countFiles > 0) {
            for ($i = 0; $i < $countFiles; $i++) {
                //---------------------------
                $_FILES['file_upload2']['name'] = $_FILES['imggallery']['name'][$i];
                $_FILES['file_upload2']['type'] = $_FILES['imggallery']['type'][$i];
                $_FILES['file_upload2']['tmp_name'] = $_FILES['imggallery']['tmp_name'][$i];
                $_FILES['file_upload2']['error'] = $_FILES['imggallery']['error'][$i];
                $_FILES['file_upload2']['size'] = $_FILES['imggallery']['size'][$i];
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file_upload2')) {
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $img = $uploadData[$i]['file_name'];
                    $result_img = $this->Project_model->addimggallery($img, $currentID);
                }
            }
        }
         $result_id = $result_img;

        echo $result_id;
    }
      //------------------------------- 	
    public function ADDyoutube() {
        $currentID = $this->input->post('currentID3');
        $youtube = $this->input->post('youtube');
        if($youtube!=''){
                    foreach($youtube AS $value){
                     if($value !=''){
                         $result_id = $this->Project_model->ADDyoutube($currentID , $value);
                        
                     }  
                 }
                 }
        echo $result_id;
    }
      //-------------------------------
	 public function deletegallrey(){
	 	 $DataID = $this->input->post('dataID');
	 	 $FileName = $this->input->post('FileName');
		 $result = $this->Project_model->deletegallrey($DataID, $FileName);
		 echo $result;
	 }
     //---------------------------
        public function News_add($currentID=NULL){
         $data['currentID'] = $currentID;
		
		$this->load->view('backend/header');
		$this->load->view('backend/new_add',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/new_add_script');	
	}
         //----------------------------------
    public function News_list() {
            $data['list_News']=$this->Project_model->list_News();
		$this->load->view('backend/header');
		$this->load->view('backend/new_list',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/new_list_script');
        }
          //------------------------------------------
          public function addnews() {
        $topic_en = $this->input->post('topic_en');
        $topic_th = $this->input->post('topic_th');
        $commenten = $this->input->post('commenten');
        $commentth = $this->input->post('commentth');
        $commenten2 = $this->input->post('commenten2');
        $commentth2 = $this->input->post('commentth2');
        $currentID = $this->input->post('currentID');
        $result_id = $this->Project_model->addnews($currentID, $topic_en, $topic_th,$commenten,$commentth,$commenten2,$commentth2);
        echo $result_id;
    }    //----------------------------
    //----------------------------
    public function addimg() {
           $currentID = $this->input->post('currentID2');
            $upload_path = './uploadfile/news';
        $upload_pathName = 'uploadfile/news';
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
        $config['max_size'] = '0';
        $image_data = array();
        $is_file_error = FALSE;
        $Result = 0;
        $this->load->library('upload', $config);
        $countFiles = count($_FILES['imggallery']['name']);
        if ($countFiles > 0) {
            for ($i = 0; $i < $countFiles; $i++) {
                //---------------------------
                $_FILES['file_upload2']['name'] = $_FILES['imggallery']['name'][$i];
                $_FILES['file_upload2']['type'] = $_FILES['imggallery']['type'][$i];
                $_FILES['file_upload2']['tmp_name'] = $_FILES['imggallery']['tmp_name'][$i];
                $_FILES['file_upload2']['error'] = $_FILES['imggallery']['error'][$i];
                $_FILES['file_upload2']['size'] = $_FILES['imggallery']['size'][$i];
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file_upload2')) {
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $img = $uploadData[$i]['file_name'];
                    $result_img = $this->Project_model->AddImgnews($img, $currentID);
                }
            }
        }
         $result_id = $result_img;

        echo $result_id;
    }
   
     //------------------------
    public function loadimgnews() {
          $ProID = $this->input->post('ProID');
          $newsimg = $this->Project_model->newsimg($ProID);
 echo '<table class="table table-bordered table-hover">';
		 foreach($newsimg->result() AS $data){ 
			 echo '<tr id = "RowImg'.$data->id.'">';
			 echo '<td><span class="text-danger"><img src="'.base_url('uploadfile/news/').$data->img_name.'" style="width:150px;" class="thumbnail"></span></td>';
			 echo '<td width="30"><button type="button" class="btn btn-danger btn-sm" onclick="deletenewsimg(\''.$data->id.'\' , \''.$data->img_name.'\',\''.$ProID.'\')"><i class="icon-trash"></i></button></td>';
			 echo '</tr>';
		 }
		 echo '</table>';
    }
     //-------------------------------
	 public function deletenewsimg(){
	 	 $DataID = $this->input->post('dataID');
	 	 $FileName = $this->input->post('FileName');
		 $result = $this->Project_model->deletenewsimg($DataID, $FileName);
		 echo $result;
	 }
          //-------------------------------
	public function slide_add($curentID=NULL){
                  $data['currentID'] = $curentID;
		
		$this->load->view('backend/header');
		$this->load->view('backend/slide_add',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/slide_add_script');	
	}
        //-------------------------------    
	public function addSlide(){
		 $currentID =$this->input->post('currentID');
		 $slide_title =$this->input->post('slide_title');
		 $slide_titleth =$this->input->post('slide_titleth');
		 $slide_detail =$this->input->post('slide_detail');
		 $slide_detailth =$this->input->post('slide_detailth');
		 $learnMore =$this->input->post('learnMore');
                 $img = $this->input->post('img_old');
                 $ImagesFiles = $this->input->post('ImagesFiles');
		 if(($ImagesFiles!='')&&($img !='')){
                                    @unlink('./uploadfile/slide/' . $img);
                                }
	$upload_path = './uploadfile/slide';
				$upload_pathName = 'uploadfile/slide';
				$config['upload_path'] = $upload_path;
				//allowed file types. * means all types
				$config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
				//allowed max file size. 0 means unlimited file size
				$config['max_size'] = '0';
				//max file name size
				$config['max_filename'] = '255';
				//whether file name should be encrypted or not
				$config['encrypt_name'] = TRUE;
				//store image info once uploaded
				$image_data = array();
				//check for errors
				$is_file_error = FALSE;
		 	
		    $this->load->library('upload', $config);         
				//---------------------------
				$_FILES['userFile']['name'] = $_FILES['ImagesFiles']['name'];
                $_FILES['userFile']['type'] = $_FILES['ImagesFiles']['type'];
                $_FILES['userFile']['tmp_name'] = $_FILES['ImagesFiles']['tmp_name'];
                $_FILES['userFile']['error'] = $_FILES['ImagesFiles']['error'];
                $_FILES['userFile']['size'] = $_FILES['ImagesFiles']['size'];
                $this->upload->initialize($config);
        
                 if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $uploadData['file_name'] = $fileData['file_name'];
                     $result_id = $this->Project_model->addslide($currentID, $slide_title, $slide_detail,$learnMore,$uploadData['file_name'],$slide_titleth,$slide_detailth);
                     $currentID = $result_id;
                }else{
                    $result_id = $this->Project_model->addslide($currentID, $slide_title, $slide_detail,$learnMore,$img,$slide_titleth,$slide_detailth);
                    $currentID = $result_id;
                } 
		
		 echo $currentID;
		 
	}
        //-------------------------------
	public function loadSlideImages(){
		 $ProID = $this->input->post('ProID');
		 $imglist = $this->Project_model->list_slideData($ProID);
		 echo '<table class="table table-bordered table-hover">';
		 foreach($imglist->result() AS $data){ 
			 echo '<tr id = "RowImg'.$data->id.'">';
			 echo '<td><span class="text-danger"><img src="'.base_url('uploadfile/slide/').$data->img_name.'" style="width:150px;" class="thumbnail"></span></td>';
			 echo '<td width="30"><button type="button" class="btn btn-danger btn-sm" onclick="imgDelete(\''.$data->id.'\' , \''.$data->img_name.'\',\''.$ProID.'\')"><i class="icon-trash"></i></button></td>';
			 echo '</tr>';
		 }
		 echo '</table>';
	}
            //-------------------------------
	 public function deleteimgslide(){
             $img = '';
	 	 $DataID = $this->input->post('DataID');
	 	 $FileName = $this->input->post('FileName');
		 $result = $this->Project_model->deleteimgslide($DataID, $FileName,$img);
		 echo $result;
	 }
                //----------------------------------
    public function slide_list() {
            $data['list_slideData']=$this->Project_model->list_slideData();
		$this->load->view('backend/header');
		$this->load->view('backend/slide_list',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/slide_list_script');
        }
         //----------------------------------
    public function admin_list() {
            $data['list_admin']=$this->Project_model->list_admin();
		$this->load->view('backend/header');
		$this->load->view('backend/admin_list',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/admin_list_script');
        }
        //-------------------
	public function admin_add($curentID=NULL ,$change=NULL){	
		$data['curentID'] = $curentID;
		$data['change'] = $change;
		$this->load->view('backend/header');
		$this->load->view('backend/admin_add' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/admin_add_script'); 
	}
        //-------------------------------
	public function add_userData(){
		$name_sname = $this->input->post('name_sname');		
		$user_name = $this->input->post('user_name');		
		$password = $this->input->post('password');
                $hpassword = $this->input->post('hpassword');
		$email = $this->input->post('email');				
		$dataID = $this->input->post('curentID');
		$Result = $this->User_model->addUserData($dataID,$name_sname,$user_name,$password,$email,$hpassword);
		echo $Result;
	} 
        //-------------------
	public function permission($curentID=NULL ){	
		$data['curentID'] = $curentID;
		//$data['name'] = $name;, $name=NULL
		$this->load->view('backend/header');
		$this->load->view('backend/set_permission' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/admin_add_script');
	}
        //-------------------------------  
	public function do_setPermission(){
		$userID = $this->input->post('userID');		
		$menuId = $this->input->post('menuId');
		$permission = $this->input->post('permission');
		$menu_url = $this->input->post('menu_url');
		
		$Result = $this->User_model->update_permission($userID ,$menuId ,$permission ,$menu_url);
		echo $Result;
	}
         //---------------------------
        public function career_add($currentID=NULL){
         $data['currentID'] = $currentID;
		
		$this->load->view('backend/header');
		$this->load->view('backend/career_add',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/career_add_script');	
	}
          //------------------------------------------
          public function addcareer() {
        $career_name = $this->input->post('career_name');
        $career_nameth = $this->input->post('career_nameth');
        $category_name = $this->input->post('category_name');
        $category_nameth = $this->input->post('category_nameth');
        $location = $this->input->post('location');
        $propertyen = $this->input->post('propertyen');
        $propertyth = $this->input->post('propertyth');
        $Jobduty = $this->input->post('Jobduty');
        $Jobdutyth = $this->input->post('Jobdutyth');
        $quantity = $this->input->post('quantity');
        $currentID = $this->input->post('currentID');
        $result_id = $this->Project_model->addcareer($currentID, $career_name, $career_nameth,$category_name,$category_nameth,$location,$propertyen,$propertyth,$Jobduty,$Jobdutyth,$quantity);
        echo $result_id;
    }    //----------------------------
     //----------------------------------
    public function career_list() {
            $data['list_career']=$this->Project_model->list_career();
		$this->load->view('backend/header');
		$this->load->view('backend/career_list',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/career_list_script');
        }
    //----------------------------------
    public function job_opening() {
            $data['list_careerform']=$this->Project_model->list_careerform();
		$this->load->view('backend/header');
		$this->load->view('backend/job_open',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/job_open_script');
        }
    //----------------------------------
    public function job_detail($dataid=NULL) {
                if($dataid==''){
		$data['dataid'] = $this->input->post('dataid');
                }else{
                $data['dataid'] = $dataid;
                }
                $this->load->library('Pdf');
                $this->load->model("Project_model"); 
                $this->load->view('backend/career_pdf' , $data);
        }
                //-------------------------------------------------------
 public function addpdf($dataid=NULL){
                if($dataid==''){
		$data['dataid'] = $this->input->post('dataid');
                }else{
                $data['dataid'] = $dataid;
                }
                $this->load->library('Pdf');
                $this->load->model("Project_model"); 
                $this->load->view('backend/career_pdf' , $data);
//$result = 1;
		//echo $result;		
	}

 }

