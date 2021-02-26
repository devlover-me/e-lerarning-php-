<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Center extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('CenterModel');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->helper('string');
	}




	public function index()
	{
		if (!$this->session->userdata('centerSession')['logged_in']) {
			return redirect('auth/center');
		}

		$wallet['status'] = $this->session->userdata('centerSession')['wallet'];
		
		date_default_timezone_set("Asia/Kolkata");
		$center['currentTime'] = date('20' . 'y');

		// echo $currentTime ;
		// exit;
		$uid = $this->session->userdata('centerSession')['id'];
		$data = $this->CenterModel->getInstituteId($uid);
		
		$intId = explode(',',$data[0]->instituteId);
		

		$center['institute'] = $this->CenterModel->getInstitute($intId);
	
		$center['year'] = $center['institute'][0]->phaseYear;
		$center['month'] = $center['institute'][0]->phaseMonth;
		$time = strtotime($center['month']);
		  $center['final'] = date("F", strtotime("+6 month", $time));
		  $centerData =array();

		  foreach($intId as $instituteId){
			//   echo $instituteId;
			 
			$centerData[] = $this->CenterModel->getStudents($instituteId);
		  }

		 
		$center['students'] =$centerData;
		

		$center['uid'] = $uid;
			$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/centersidebar');

		$this->load->view('common/dashboard-layout/centertopnav',$wallet);
		$this->load->view('center/dashboard', $center);
		$this->load->view('common/dashboard-layout/footer', $center);
		$this->load->view('common/dashboard-layout/footer-scripts');
		
		
	}

	//=====================================form================================

	public function add_form()
	{
		$wallet['status'] = $this->session->userdata('centerSession')['wallet'];
		$data['intId'] = $this->input->post('intId');
		$data['batch'] = $this->input->post('batch');
		$data['month'] = $this->input->post('month');
		$data['course'] = $this->CenterModel->getCourseData();

		$action = $this->uri->segment(3);
		//$data['name'] = $this->uri->segment(3);

		$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/centersidebar');
		$this->load->view('common/dashboard-layout/centertopnav',$wallet);
		$this->load->view('center/form1', $data);
		$this->load->view('common/dashboard-layout/footer');
		$this->load->view('common/dashboard-layout/footer-scripts');
	}


	public function view_form()
	{
		$wallet['status'] = $this->session->userdata('centerSession')['wallet'];
		$uid = $this->session->userdata('centerSession')['id'];
		$center['uid']=$uid;
		$stdId = $this->uri->segment(3);
		$center['student'] = $this->CenterModel->getStudentData($uid);
		// print_r($center['student']);
		//  exit;

		$center['qualification'] = $this->CenterModel->getQualificationData($uid);
		// 

		// $center['menu'] = $this->CenterModel->getform1($uid);
		

		$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/centersidebar');
		//$this->load->view('common/dashboard-layout/header',$header);
		$this->load->view('common/dashboard-layout/centertopnav',$wallet);
		$this->load->view('center/viewformcenter', $center);
		$this->load->view('common/dashboard-layout/footer');
		$this->load->view('common/dashboard-layout/footer-scripts');
	}
	public function saveForm()
	{
		$wallet['status'] = $this->session->userdata('centerSession')['wallet'];

		
		date_default_timezone_set("Asia/Kolkata");
		$currentTime = date('y-m-d');
		$cId = $this->input->post('course');

		$uid = $this->session->userdata('centerSession')['id'];
	
		 $this->form_validation->set_rules('fname', 'firstName', 'required');
		$this->form_validation->set_rules('phone', 'phone', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		//	$this->form_validation->set_rules('batch', 'Batch', 'required');
		$this->form_validation->set_rules('lname', 'lastName', 'required');
		//$this->form_validation->set_rules('month', 'month', 'required');
		$this->form_validation->set_rules('gender', 'gender', 'required');
		// $this->form_validation->set_rules('university', 'university', 'required');

		$this->form_validation->set_rules('fathername', 'fathername', 'required');
		$this->form_validation->set_rules('course', 'course', 'required');
		$this->form_validation->set_rules('aadhar', 'aadhar', 'required');
		$this->form_validation->set_rules('dob', 'dob', 'required');
		$this->form_validation->set_rules('pincode', 'pincode', 'required');


		if ($this->form_validation->run()) {

			$password = $this->input->post('password');
			$encPassword = $this->encryption->encrypt($password);

			$userId = $this->session->userdata('centerSession')['id'];
			$menuData = array(
				'userName' => $this->input->post('userName'),
				'password' => $encPassword,
				'firstName' => $this->input->post('fname'),
				'phone' =>  $this->input->post('phone'),
				'email' =>  $this->input->post('email'),
				'address' =>  $this->input->post('address'),
				'lastName' => $this->input->post('lname'),
				'batch' =>  $this->input->post('batch'),
				'userId' =>  $userId,
				'gender' =>  $this->input->post('gender'),
				'fatherName' => $this->input->post('fathername'),
				'motherName' =>  $this->input->post('mothername'),
				'course' =>  $this->input->post('course'),
				'aadharNo' =>  $this->input->post('aadhar'),
				'DOB' =>  $this->input->post('dob'),
				'postalcode' =>  $this->input->post('pincode'),
				'createdAt' => $currentTime,
				'status' => '1'
			);
			

  if($wallet['status']){
// checking the amount available in the wallet or not
			$wallet['wall'] = $this->CenterModel->getAmount($uid);
		
			$amo = $wallet['wall'][0]->amount;
			$amount = intval($amo);
			$fee = $this->CenterModel->getFee($cId);
				$course = $fee[0]->courseFee;
				$courseFee = intval($course);
				if($amount>=$courseFee){
	
			$stuId = $this->CenterModel->saveForm1($menuData);
			

			
			$examination = $this->input->post('tenth');
				$institution = $this->input->post('institution');
				$rollNo = $this->input->post('roll');
				$year = $this->input->post('passing');
				$board = $this->input->post('board');
				$marks = $this->input->post('marks');
				$max = $this->input->post('maxMarks');
				$percent = $this->input->post('percent');
				$division = $this->input->post('division');
				
          for($i=0;3>=$i;$i++){
			$qualiData = array(
				'userId' => $userId ,
				'examination' =>$examination[$i] ,
				'institution' => $institution[$i],
				'rollNo' => $rollNo[$i],
				'yearOfPassing' => $year[$i],
				'boardUniversity' => $board[$i],
				'marksObtained' => $marks[$i],
				'maxMarks' => $max[$i],
				'percentage' =>  $percent [$i],
				'division' => $division[$i],
				'instituteId' =>$this->input->post('intId'),
			     'studentId' => $stuId,
				'createdAt' => $currentTime,
				'status' => '1'

			);

		


			$qualiData=$this->CenterModel->saveQualification($qualiData);
		}

           	if ($qualiData) {

				

				$total =	$amount - $courseFee;
				$tid = random_string('alnum', 16);

				$tranData = array(
					'userId' => $uid,
					'transactionId' => $tid,
					'transactionFromTo' => 'Course',
					'transactionType' => 'Debit',
					'amount' => $courseFee,
					'status' => '1',
					'createdAt' => $currentTime,


				);

				$data = $this->CenterModel->updateFee($uid, $total, $tranData);


				if ($data) {


					$response = array('status' => 'true', 'msg' => 'student Added');
					$this->session->set_flashdata('savemenu', $response);
					return redirect('center/view_form/');
				} else {
					$response = array('status' => 'false', 'msg' => 'student  Not Added');
					$this->session->set_flashdata('savemenu', $response);
					return redirect('center/view_form/');
				}
			} else {

				$response = array('status' => 'false', 'msg' => 'Center Not Added');
				$this->session->set_flashdata('savemenu', $response);
				return redirect('center/view_form/');
			}

		}else{
			$response = array('status' => 'false', 'msg' => 'Insufficient amount');
				$this->session->set_flashdata('savemenu', $response);
				return redirect('center/add_form');
		}

	}else{
		$stuId = $this->CenterModel->saveForm1($menuData);
		$examination = $this->input->post('tenth');
			$institution = $this->input->post('institution');
			$rollNo = $this->input->post('roll');
			$year = $this->input->post('passing');
			$board = $this->input->post('board');
			$marks = $this->input->post('marks');
			$max = $this->input->post('maxMarks');
			$percent = $this->input->post('percent');
			$division = $this->input->post('division');
			
	  for($i=0;3>=$i;$i++){
		$qualiData = array(
			'userId' => $userId ,
			'examination' =>$examination[$i] ,
			'institution' => $institution[$i],
			'rollNo' => $rollNo[$i],
			'yearOfPassing' => $year[$i],
			'boardUniversity' => $board[$i],
			'marksObtained' => $marks[$i],
			'maxMarks' => $max[$i],
			'percentage' =>  $percent [$i],
			'division' => $division[$i],
			'instituteId' =>$this->input->post('intId'),
			 'studentId' => $stuId,
			'createdAt' => $currentTime,
			'status' => '1'

		);

		

		$qualiData=$this->CenterModel->saveQualification($qualiData);
	}
	if ($qualiData) {
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.example.com', 
			'smtp_port' => 465,
			'smtp_user' => 'bhavya.kumari208@gmail.com',
			'smtp_pass' => 'MostUseFull@ccount',
			'smtp_crypto' => 'ssl', 
			'mailtype' => 'text', 
			'smtp_timeout' => '60', 
			'charset' => 'utf-8',
			'wordwrap' => TRUE
		);
		$this->load->initialize($config);
        $this->load->library('email');
        
        $from = $this->config->item('smtp_user');
        $to = $this->input->post('email');
        $subject = 'Details';
        $message = 'username'.$this->input->post('userName').'password'.$password;

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
		if ($this->email->send()) {
			$response = array('status' => 'true', 'msg' => 'student Added');
			$this->session->set_flashdata('savemenu', $response);
			return redirect('center/view_form/');
        } else {
			$response = array('status' => 'false', 'msg' => show_error($this->email->print_debugger()));
		$this->session->set_flashdata('savemenu', $response);
		return redirect('center/view_form/');
            
        }

		
	} else {
		$response = array('status' => 'false', 'msg' => 'student  Not Added');
		$this->session->set_flashdata('savemenu', $response);
		return redirect('center/view_form/');
	}

	}

		} else {
			// $response = array('status' => 'false', 'msg' => validation_errors());
			// $this->session->set_flashdata('savemenu', $response);
			$wallet['wall'] = $this->session->userdata('centerSession')['wallet'];
			$data['intId'] = $this->input->post('intId');
			$data['batch'] = $this->input->post('batch');
			$data['month'] = $this->input->post('month');
			$data['course'] = $this->CenterModel->getCourseData();

			$action = $this->uri->segment(3);
			//$data['name'] = $this->uri->segment(3);

			$this->load->view('common/dashboard-layout/head');
			$this->load->view('common/dashboard-layout/centersidebar');
			$this->load->view('common/dashboard-layout/centertopnav',$wallet);
			$this->load->view('center/form1', $data);
			$this->load->view('common/dashboard-layout/footer');
			$this->load->view('common/dashboard-layout/footer-scripts');
		}
	}
	//========================wallet=====================
	public function wallet()
	{    
		$wallet['status'] = $this->session->userdata('centerSession')['wallet'];
		$uid = $this->session->userdata('centerSession')['id'];
		$wallet['wall'] = $this->CenterModel->getAmount($uid);
		$wallet['menu'] = $this->CenterModel->getTransaction($uid);
		$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/centersidebar');

		$this->load->view('common/dashboard-layout/centertopnav',$wallet);
		$this->load->view('center/centerwallet', $wallet);
		$this->load->view('common/dashboard-layout/footer');
		$this->load->view('common/dashboard-layout/footer-scripts');
	}
	public function update_wallet()
	{

		date_default_timezone_set("Asia/Kolkata");
		$currentTime = date('y-m-d H:i:s');

		$uid = $this->session->userdata('centerSession')['id'];

		$this->form_validation->set_rules('amount', 'Amount', 'required|numeric');

		if ($this->form_validation->run()) {
			$amount = $this->input->post('amount');

			$oldAmount = $this->CenterModel->getOldAmount($uid);

			$wallet = $oldAmount[0]->amount + $amount;


			$walletData = array(
				'amount' => $wallet,
				'userId' => $uid,
				'updatedAt' => $currentTime
			);

			$tid = random_string('alnum', 16);

			$tranData = array(
				'transactionId' => $tid,
				'transactionFromTo' => 'wallet',
				'transactionType' => 'credit',
				'amount' => $amount,
				'userId' => $uid,
				'updatedAt' => $currentTime

			);
			if ($this->CenterModel->updateAmount($tranData, $walletData, $uid)) {

				$response = array('status' => 'true', 'msg' => 'wallet updated');
				$this->session->set_flashdata('savemenu', $response);
				return redirect('Center/wallet');
			} else {

				$response = array('status' => 'false', 'msg' => 'wallet  Not updated');
				$this->session->set_flashdata('savemenu', $response);
				return redirect('Center/wallet');
			}
		} else {
			$wallet['status'] = $this->session->userdata('centerSession')['wallet'];
			$uid = $this->session->userdata('CenterSession')['id'];
			$wallet['wall'] = $this->CenterModel->getAmount($uid);
			$wallet['menu'] = $this->CenterModel->getTransaction($uid);
			$this->load->view('common/dashboard-layout/head');
			$this->load->view('common/dashboard-layout/centersidebar');

			$this->load->view('common/dashboard-layout/centertopnav',$wallet);
			$this->load->view('Center/wallet', $wallet);
			$this->load->view('common/dashboard-layout/footer');
			$this->load->view('common/dashboard-layout/footer-scripts');
		}
	}
}
