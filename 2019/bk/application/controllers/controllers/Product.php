<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

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
	public function index()
	{
		
		
		
	}
	//-------------------
    public function category(){
		
		$data['titleTopbar']="หมวดเครืองมือ";
		
		$this->load->view('backend/header');
		$this->load->view('backend/top_bar' , $data);
		$this->load->view('backend/css_main');
		$this->load->view('backend/product_cate_body');
		$this->load->view('backend/footer');
		$this->load->view('backend/script_main');
	}
	//-----------------
	public function tools(){
		$data['titleTopbar']="ข้อมูลเครืองมือ";
		
		$this->load->view('backend/header');
		$this->load->view('backend/top_bar' , $data);
		$this->load->view('backend/css_main');
		$this->load->view('backend/product_tools_body');
		$this->load->view('backend/footer');
		$this->load->view('backend/script_main');
	}
	//-----------------
}