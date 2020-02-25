<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
                $data['imglist'] = $this->Project_model->list_slidebyon();
                $data['list_Newslimit'] = $this->Project_model->list_Newslimit();
		$this->load->view('fontend/index',$data);
	}
	//---------------------------------
	public function premium_brand()
	{
            
		$this->load->view('fontend/premium_brand');
	}
	//---------------------------------
	public function corporate_award()
	{
		$this->load->view('fontend/corporate_award');
	}
	//---------------------------------
	public function subsidiaries()
	{
		$this->load->view('fontend/subsidiaries');
	}
	//---------------------------------
	public function homecare()
	{
		$this->load->view('fontend/homecare');
	}
	//---------------------------------
	public function innovation()
	{
		$this->load->view('fontend/innovation');
	}
	//---------------------------------
	public function smart_command()
	{
		$this->load->view('fontend/smart_command');
	}
	
}
