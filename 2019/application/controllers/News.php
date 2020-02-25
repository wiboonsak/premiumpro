<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

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
	public function index($page=null)
	{
               $perpage = 6; $limit =''; $notUse = '';
               if ($page == ''){
                   $page = 1;
               }else{
                   $page = $page;
               }
              $start = ($page - 1) * $perpage;
               $data['page'] = $page;
                $data['perpage'] = $perpage;
                $data['list_News'] = $this->Project_model->getNewsDetail($limit,$notUse,$start,$perpage);
		$this->load->view('fontend/news',$data);
	}
        //---------------------------------
         public function Page($page=null)
	{
                $perpage = 6; $limit =''; $notUse = '';
               if ($page == ''){
                   $page = 1;
               }else{
                   $page = $page;
               }
               $start = ($page - 1) * $perpage;
               $data['page'] = $page;
                $data['perpage'] = $perpage;
                $data['list_News'] = $this->Project_model->getNewsDetail($limit,$notUse,$start,$perpage);
		
		//--------------------------------
		$this->load->view('fontend/news',$data);

        }
        //-----------------------------------------------------
         public function news_detail($projectid=null)
	{
                $data['list_News'] = $this->Project_model->list_News($projectid=NULL);
		
		//--------------------------------
		$this->load->view('fontend/news_detail',$data);

        }
	
	
}
