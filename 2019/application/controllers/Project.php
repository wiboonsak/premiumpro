<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

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
		
         $this->load->model('User_model');
         $this->load->model('Project_model');
         if($this->session->userdata('weblang')==''){
			 $this->session->set_userdata('weblang', 'en');
		 }
    }
	
	
	//---------------------------------
	public function index($projectid=NULL)
	{
            $data['maincate11'] = $this->Project_model->list_cateData($projectid);
		$this->load->view('fontend/project',$data);
	}
	//---------------------------------
	public function project_detail($projectid=NULL)
	{
                $data['list_project']=$this->Project_model->list_project($projectid);
		$this->load->view('fontend/project_detail',$data);
	}
	
	
}
