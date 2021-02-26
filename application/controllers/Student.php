<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{

    function __construct()
	{
		parent::__construct();
		$this->load->model('StudentModel');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->helper('string');
		
	}


 public function index(){

	
	if (!$this->session->userdata('studentSession')['logged_in']) {
		return redirect('auth/student');
	}
	$studentId = $this->session->userdata('studentSession')['studentId'];
	$student['details']=$this->StudentModel->getStudentInfo($studentId);
	$student['qualification']=$this->StudentModel->getQualificationInfo($studentId);
 
	$this->load->view('common/dashboard-layout/head');

	$this->load->view('student/viewstudent', $student);
	$this->load->view('common/dashboard-layout/footer');
	$this->load->view('common/dashboard-layout/footer-scripts');

 }

//  public function view_details(){

// 		$student['menu'] = $this->StudentModel->getStudent();

// 		$this->load->view('common/dashboard-layout/head');
// 		$this->load->view('common/dashboard-layout/sidebar');
// 		$this->load->view('common/dashboard-layout/topnav');
// 		$this->load->view('admin/viewCenter', $student);
// 		$this->load->view('common/dashboard-layout/footer');
// 		$this->load->view('common/dashboard-layout/footer-scripts');
	
//  }

public function forgot_password(){
 



}









}