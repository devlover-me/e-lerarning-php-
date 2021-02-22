<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Center extends CI_Controller {

	function __construct()
		{
			parent::__construct();
			$this->load->model('CenterModel');
			$this->load->library('session');
			$this->load->library('form_validation');
			$this->load->library('encryption');
			//$this->load->helper('message');
			
		}


    public function indexgf()

	{
		// if(!$this->session->userdata('centerSession')['logged_in']){
		// 	return redirect('auth/center');
		// }  
         
		date_default_timezone_set("Asia/Kolkata");
		$cdate = date('y-m-d');
		$currentRevenu = 0;
		$totalRevenu = 0;

	$header['description'] = array('page' => "Dashboard", "dashboard" => "active",'center'=>'');

		$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/centersidebar',$header);
//$this->load->view('common/dashboard-layout/header',$header);
         $this->load->view('common/dashboard-layout/centertopnav');
		$this->load->view('center/dashboard');
		$this->load->view('common/dashboard-layout/footer');
		$this->load->view('common/dashboard-layout/footer-scripts');
	}

	public function index()
	{
		$uid=$this->session->userdata('centerSession')['id'];
		$center['menu'] = $this->CenterModel->getform1($uid);
	
		$center['uid']=$uid;
		$header['description'] = array('page' => "Center", "dashboard" => "", "center" => "active");
		$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/centersidebar',$header);

          $this->load->view('common/dashboard-layout/centertopnav');
		$this->load->view('center/viewformcenter',$center);
		$this->load->view('common/dashboard-layout/footer');
		$this->load->view('common/dashboard-layout/footer-scripts');
	}


		

		}


