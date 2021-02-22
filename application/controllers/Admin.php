<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModel');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->helper('string');

	}


	public function index()

	{
		if(!$this->session->userdata('adminSession')['logged_in']){
			return redirect('auth/admin');
		}  

		
		

	$uid=$this->session->userdata('adminSession')['id'];
		 $count['course'] = $this->AdminModel->getCountcourse();
		 $count['institute'] = $this->AdminModel->getCountinstitute();
		 $count['center'] = $this->AdminModel->getCountcenter($uid);


		
		$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/sidebar');
		//$this->load->view('common/dashboard-layout/header',$header);
		$this->load->view('common/dashboard-layout/topnav');
		$this->load->view('admin/dashboard',$count);
		$this->load->view('common/dashboard-layout/footer');
		$this->load->view('common/dashboard-layout/footer-scripts');
	}


	


	public function viewCenter()
	{


		$center['menu'] = $this->AdminModel->getcenter();
	
		$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/sidebar');
		//$this->load->view('common/dashboard-layout/header',$header);
		$this->load->view('common/dashboard-layout/topnav');
		$this->load->view('admin/viewCenter', $center);
		$this->load->view('common/dashboard-layout/footer');
		$this->load->view('common/dashboard-layout/footer-scripts');
	}

	public function savecenter()
	{
		$action=$this->uri->segment(3);
		
		date_default_timezone_set("Asia/Kolkata");
		$currentTime = date('y-m-d');

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('institute', 'Institute', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required|is_unique[user.phone]|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('nod', 'nod', 'required');
		$this->form_validation->set_rules('orgName', 'orgName', 'required');
		$this->form_validation->set_rules('faName', 'faname', 'required');
		$this->form_validation->set_rules('aadhar', 'aadhar', 'required|is_unique[userinfo.aadharNumber]|numeric');
		$this->form_validation->set_rules('dob', 'dob', 'required');


		if ($this->form_validation->run()) {

			$password = $this->input->post('password');
			$encPassword = $this->encryption->encrypt($password);
			

			$userdata = array(
				'userName' => $this->input->post('name'),
				'phone' =>  $this->input->post('phone'),
				'email' =>  $this->input->post('email'),
				'institute' =>  $this->input->post('institute'),
				'createdAt' => $currentTime,
				'status' => '1'
			);

			

			$logindata = array(
				'password' =>  $encPassword,
				'userName' =>  $this->input->post('name'),
				'createdAt' => $currentTime,
				'status' => '1',
				'userType' => 'center'
			);

			$userInfodata= array(
				'nameOfDirector' => $this->input->post('nod'),
				'oraganizationName' =>  $this->input->post('orgName'),
				'directorfather' =>  $this->input->post('faName'),
				'dob' =>  $this->input->post('dob'),
				'address' =>  $this->input->post('address'),
				'aadharNumber' =>  $this->input->post('aadhar'),
				'createdAt' => $currentTime,
				'status' => '1',
				
			);


			if($action=='edit'){
				$userdata['updatedAt']=$currentTime;
				$uid=$this->uri->segment(4);
			}else{
				$userId = $this->AdminModel->savecenter($userdata);
				$userInfodata['userId']=$userId;

				$logindata['userId']=$userId;
			}

			
			if ($this->AdminModel->savecenterLog($logindata,$userInfodata,$action,$uid,$userdata)) {

				$response = array('status' => 'true', 'msg' => 'Center Added');
				$this->session->set_flashdata('savemenu', $response);
				return redirect('admin/viewCenter');
			} else {

				$response = array('status' => 'false', 'msg' => 'Center Not Added');
				$this->session->set_flashdata('savemenu', $response);
				return redirect('admin/viewCenter');
			}
		} else {
			// $response = array('status' => 'false', 'msg' => validation_errors());
			// $this->session->set_flashdata('savemenu', $response);
			
			$this->load->view('common/dashboard-layout/head');
			$this->load->view('common/dashboard-layout/sidebar');

			$this->load->view('common/dashboard-layout/topnav');
			$this->load->view('admin/addcenter');
			$this->load->view('common/dashboard-layout/footer');
			$this->load->view('common/dashboard-layout/footer-scripts');
		}
	}

	public function changeCenterStatus($id)
	{

		$updatestatus = $this->AdminModel->updateCenterstatus($id);

		if ($updatestatus) {
			$response = array('status' => 'true', 'msg' => 'Status Changed');
			$this->session->set_flashdata('changestatus', $response);
			return redirect('admin/viewCenter');
		} else {
			$response = array('status' => 'false', 'msg' => 'Status Not Changed');
			$this->session->set_flashdata('changestatus', $response);
			return redirect('admin/viewCenter');
		}
	}

	public function editCenter()
	{

		$action=$this->uri->segment(3);
		$mainmenu['institute']=$this->AdminModel->getInstituteinfo();
		

		$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/sidebar');
	   $this->load->view('common/dashboard-layout/topnav');


	   if($action=='edit')
	   {
		$uid=$this->uri->segment(4);
		$mainmenu['user'] = $this->AdminModel->getEditcenter($uid);
		$pass = $this->AdminModel->getEditcenterLog($uid);
		$mainmenu['userInfo']=$this->AdminModel->getEditUinfo($uid);
		$mainmenu['log'] = $this->encryption->decrypt($pass[0]->password);
		$this->load->view('admin/addcenter',$mainmenu);
	}else{
		$this->load->view('admin/addcenter',$mainmenu);
	}
		$this->load->view('common/dashboard-layout/footer');
		$this->load->view('common/dashboard-layout/footer-scripts');
	  
	}

	
	public function deleteCenter($id)
	{

		if ($this->AdminModel->deleteCenter($id)) {
			$response = array('status' => 'true', 'msg' => 'Center Deleted');
			$this->session->set_flashdata('savemenu', $response);
			return redirect('admin/viewCenter');
		} else {

			$response = array('status' => 'false', 'msg' => 'Center not Deleted');
			$this->session->set_flashdata('savemenu', $response);
			return redirect('admin/viewCenter');
		}
	}

	//===wallet======
	public function wallet()
	{    $uid=$this->session->userdata('adminSession')['id'];
		$wallet['wall']=$this->AdminModel->getAmount($uid);
		$wallet['menu']=$this->AdminModel->getTransaction($uid);
		$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/sidebar');

		$this->load->view('common/dashboard-layout/topnav');
		$this->load->view('admin/wallet',$wallet);
		$this->load->view('common/dashboard-layout/footer');
		$this->load->view('common/dashboard-layout/footer-scripts');
	}

 public function updateWallet(){

	date_default_timezone_set("Asia/Kolkata");
		$currentTime = date('y-m-d H:i:s');
		
		$uid=$this->session->userdata('adminSession')['id'];
	$this->form_validation->set_rules('amount', 'Amount', 'required');

	if ($this->form_validation->run()) {
	 $amount= $this->input->post('amount');

	 $oldAmount=$this->AdminModel->getoldAmount($uid);
	 $wallet=$oldAmount[0]->amount +$amount;
	

	 $walletdata=array(
		   'amount'=> $wallet,
		   'userId'=>$uid,
             'updatedAt'=>$currentTime
	 );

	 $tid= random_string('alnum', 16);
	 
	 $trandata=array(
		'transactionId'=> $tid,
		'transactionFromTo'=>'wallet',
		'transactionType'=>'credit',
		'amount'=> $amount,
		'userId'=>$uid,
		'updatedAt'=>$currentTime

  );
  if ($this->AdminModel->updateAmount($trandata, $walletdata, $uid)) {

	$response = array('status' => 'true', 'msg' => 'wallet updated');
	$this->session->set_flashdata('savemenu', $response);
	return redirect('admin/wallet');
} else {

	$response = array('status' => 'false', 'msg' => 'wallet  Not updated');
	$this->session->set_flashdata('savemenu', $response);
	return redirect('admin/wallet');
}

  

	}else{
		$uid=$this->session->userdata('adminSession')['id'];
		$wallet['wall']=$this->AdminModel->getAmount($uid);
		$wallet['menu']=$this->AdminModel->getTransaction($uid);
		$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/sidebar');

		$this->load->view('common/dashboard-layout/topnav');
		$this->load->view('admin/wallet',$wallet);
		$this->load->view('common/dashboard-layout/footer');
		$this->load->view('common/dashboard-layout/footer-scripts');
	}
	 
 }


	

	
//========================================Institute================================
public function institute()

	{

 $action=$this->uri->segment(3);

		 
		$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/sidebar');
		
		$this->load->view('common/dashboard-layout/topnav');
 if($action=='add'){
		$this->load->view('admin/addinstitute');
 }else{
	 $id=$this->uri->segment(4);
	$inst['data']=$this->AdminModel->geteditInstitute($id);
	$this->load->view('admin/addinstitute',$inst);
 }
		$this->load->view('common/dashboard-layout/footer');
		$this->load->view('common/dashboard-layout/footer-scripts');
		
	
	}

	public function viewInstitute()
	{


		$center['menu'] = $this->AdminModel->getInstitute();
		
		$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/sidebar');
		//$this->load->view('common/dashboard-layout/header',$header);
		$this->load->view('common/dashboard-layout/topnav');
		$this->load->view('admin/viewinstitute', $center);
		$this->load->view('common/dashboard-layout/footer');
		$this->load->view('common/dashboard-layout/footer-scripts');
	}

	public function saveInstitute()
	{

		$action=$this->uri->segment(3);
		$uid=$this->session->userdata('adminSession')['id'];
		//$this->session->userdata('adminSession')['id'];
		date_default_timezone_set("Asia/Kolkata");
		$currentTime = date('y-m-d');

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('year', 'Year', 'required|numeric');
		$this->form_validation->set_rules('month', 'Month', 'required');
		


		if ($this->form_validation->run()) {

			
			$userdata = array(
				'instituteName' => $this->input->post('name'),
				'phaseYear' =>  $this->input->post('year'),
				'phaseMonth' =>  $this->input->post('month'),
				
				'status' => '1'
			);

			

			

			if($action=='edit'){
				$userdata['updatedAt']=$currentTime;
				$id=$this->uri->segment(4);
			}else{
			$userdata['userId'] =  $uid;
			$userdata['createdAt']=$currentTime;

			}
		
			if ($this->AdminModel->saveInstitute($userdata,$action,$id)) {

				$response = array('status' => 'true', 'msg' => 'Institute Added');
				$this->session->set_flashdata('savemenu', $response);
				return redirect('admin/viewInstitute');
			} else {

				$response = array('status' => 'false', 'msg' => 'Institute Not Added');
				$this->session->set_flashdata('savemenu', $response);
				return redirect('admin/viewInstitute');
			}
		} else {
			
				$action=$this->uri->segment(3);

						
				$this->load->view('common/dashboard-layout/head');
				$this->load->view('common/dashboard-layout/sidebar');
				
				$this->load->view('common/dashboard-layout/topnav');
				if($action=='add'){
				$this->load->view('admin/addinstitute');
				}else{
				$id=$this->uri->segment(4);
				$inst['data']=$this->AdminModel->geteditInstitute($id);
				$this->load->view('admin/addinstitute',$inst);
				}
				$this->load->view('common/dashboard-layout/footer');
				$this->load->view('common/dashboard-layout/footer-scripts');
						}
					}	

	public function deleteInstitute($id)
	{

		if ($this->AdminModel->deleteInstitute($id)) {
			$response = array('status' => 'true', 'msg' => 'Institute Deleted');
			$this->session->set_flashdata('savemenu', $response);
			return redirect('admin/viewInstitute');
		} else {

			$response = array('status' => 'false', 'msg' => 'Institute not Deleted');
			$this->session->set_flashdata('savemenu', $response);
			return redirect('admin/viewInstitute');
		}
	}

	public function changeInstituteStatus($id)
	{

		$updatestatus = $this->AdminModel->updateInstitutestatus($id);

		if ($updatestatus) {
			$response = array('status' => 'true', 'msg' => 'Status Changed');
			$this->session->set_flashdata('changestatus', $response);
			return redirect('admin/viewInstitute');
		} else {
			$response = array('status' => 'false', 'msg' => 'Status Not Changed');
			$this->session->set_flashdata('changestatus', $response);
			return redirect('admin/viewInstitute');
		}
	}
//===============================Course=====================================

public function Course()

	{

 $action=$this->uri->segment(3);

		 
		$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/sidebar');
		
		$this->load->view('common/dashboard-layout/topnav');
			if($action=='add'){
					$this->load->view('admin/addcourse');
			}else{
				$id=$this->uri->segment(4);
				$inst['data']=$this->AdminModel->geteditCourse($id);
				$this->load->view('admin/addcourse',$inst);
			}
		$this->load->view('common/dashboard-layout/footer');
		$this->load->view('common/dashboard-layout/footer-scripts');
		
	
	}

	public function viewCourse()
	{


		$center['menu'] = $this->AdminModel->getCourse();
	
		$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/sidebar');
		//$this->load->view('common/dashboard-layout/header',$header);
		$this->load->view('common/dashboard-layout/topnav');
		$this->load->view('admin/viewcourse', $center);
		$this->load->view('common/dashboard-layout/footer');
		$this->load->view('common/dashboard-layout/footer-scripts');
	}

	public function saveCourse()
	{

		$action=$this->uri->segment(3);
		$uid=$this->session->userdata('adminSession')['id'];
		//$this->session->userdata('adminSession')['id'];
		date_default_timezone_set("Asia/Kolkata");
		$currentTime = date('y-m-d');

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('fee', 'Fee', 'required');
		
		


		if ($this->form_validation->run()) {

			
			$userdata = array(
				'courseName' => $this->input->post('name'),
				'courseFee' =>  $this->input->post('fee'),
				'status' => '1'
			);

			

			

			if($action=='edit'){
				$userdata['updatedAt']=$currentTime;
				$id=$this->uri->segment(4);
			}else{
			$userdata['userId'] =  $uid;
			$userdata['createdAt']=$currentTime;

			}
		
			if ($this->AdminModel->saveCourse($userdata,$action,$id)) {

				$response = array('status' => 'true', 'msg' => 'Course Added');
				$this->session->set_flashdata('savemenu', $response);
				return redirect('admin/viewCourse');
			} else {

				$response = array('status' => 'false', 'msg' => 'Course Not Added');
				$this->session->set_flashdata('savemenu', $response);
				return redirect('admin/viewCourse');
			}
		} else {
			
			$action=$this->uri->segment(3);

					
			$this->load->view('common/dashboard-layout/head');
			$this->load->view('common/dashboard-layout/sidebar');
			
			$this->load->view('common/dashboard-layout/topnav');
				if($action=='add'){
						$this->load->view('admin/addcourse');
				}else{
					$id=$this->uri->segment(4);
					$inst['data']=$this->AdminModel->geteditCourse($id);
					$this->load->view('admin/addcourse',$inst);
				}
			$this->load->view('common/dashboard-layout/footer');
			$this->load->view('common/dashboard-layout/footer-scripts');
			
		}
	}	

	public function deleteCourse($id)
	{

		if ($this->AdminModel->deleteCourse($id)) {
			$response = array('status' => 'true', 'msg' => 'Course Deleted');
			$this->session->set_flashdata('savemenu', $response);
			return redirect('admin/viewCourse');
		} else {

			$response = array('status' => 'false', 'msg' => 'Course not Deleted');
			$this->session->set_flashdata('savemenu', $response);
			return redirect('admin/viewCourse');
		}
	}
	public function changeCourseStatus($id)
	{

		$updatestatus = $this->AdminModel->updateCoursestatus($id);

		if ($updatestatus) {
			$response = array('status' => 'true', 'msg' => 'Status Changed');
			$this->session->set_flashdata('changestatus', $response);
			return redirect('admin/viewCourse');
		} else {
			$response = array('status' => 'false', 'msg' => 'Status Not Changed');
			$this->session->set_flashdata('changestatus', $response);
			return redirect('admin/viewCourse');
		}
	}


}

