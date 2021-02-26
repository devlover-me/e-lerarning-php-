<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->view('common/dashboard-layout/head');
		//$this->load->helper('message');
	}

	public function index()
	{
		if (!$this->session->userdata('adminSession')['logged_in']) {
			return redirect('auth/login');
		} else {
			return redirect('admin/dashboard');
		}
	}

	public function admin()
	{
		$this->load->view('admin/auth/adminlogin');
	}


	// admin login
	public function adminlogin()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run()) {

			$username = $this->input->post('username');
			$password = $this->input->post('password');
         	$admindata = $this->AuthModel->getAdmindata($username);
            //    print_r($admindata);
			// exit;
			   if($admindata[0]->userType=='admin'){
		if ($admindata) {
				$decPassword = $this->encryption->decrypt($admindata[0]->password);
            	if ($password == $decPassword) {
					foreach ($admindata as $keydata) {
						$name  = $keydata->userName;
						$id = $keydata->userId;
					}

					$sessionArray =  array(
						'id' => $id,
						'name' => $name,
						'logged_in' => TRUE
					);

					$this->session->set_userdata('adminSession', $sessionArray);

					return redirect('admin/index');
				} else {

					$sessionArray =  array(
						'id' => '',
						'name' => '',
						'logged_in' => FALSE
					);
					$response = array('status' => 'false', 'msg' => 'password is incorrect');
					$this->session->set_flashdata('toaster', $response);
					return redirect('auth/admin');
				}
			} else {

				$sessionArray =  array(
					'id' => '',
					'name' => '',
					'logged_in' => FALSE
				);
				$response = array('status' => 'false', 'msg' => 'Invalid userName');
				$this->session->set_flashdata('savemenu', $response);
				return redirect('auth/admin');
			}
		}else{
			$response = array('status' => 'false', 'msg' => 'you are not a authorised person to login as admin');
				$this->session->set_flashdata('savemenu', $response);
				return redirect('auth/admin');
		}
		} else {
			$response = array('status' => 'false', 'msg' => validation_errors());
			$this->session->set_flashdata('savemenu', $response);
			return redirect('auth/admin');
		}
	}


	// change password
	public function changeAdminPassword()
	{
		$this->form_validation->set_rules('oldpassword', 'OldPassword', 'required');
		$this->form_validation->set_rules('newpassword', 'NewPassword', 'required');

		if ($this->form_validation->run()) {
			$oldpass = $this->input->post('oldpassword');
			$password = $this->input->post('newpassword');


			$uid  = $this->session->userdata('adminSession')['id'];


			$admindata = $this->AuthModel->getadmin($uid);

			$decPassword = $this->encryption->decrypt($admindata[0]->password);


			if ($decPassword == $oldpass) {
				$encPassword = $this->encryption->encrypt($password);
				$updatepass = $this->AuthModel->updatePassword($encPassword, $uid);
				if ($updatepass) {
					$response = array('status' => 'true', 'msg' => ' passwordchange');
					$this->session->set_flashdata('changepass', $response);
					return redirect('admin/index');
				} else {
					$response = array('status' => 'false', 'msg' => ' passwordnot change');
					$this->session->set_flashdata('changepass', $response);
					return redirect('admin/index');
				}
			} else {
				$response = array('status' => 'false', 'msg' => 'password does not match');
				$this->session->set_flashdata('changepass', $response);
				return redirect('admin/index');
			}
		} else {
			echo "form not validate";
		}
	}

	//	change status
	public function changeStatus($id)
	{
		$updatestatus = $this->AdminModel->updateStatus($id);
		if ($updatestatus) {
			$response = array('status' => 'true', 'msg' => 'Status Changed');
			$this->session->set_flashdata('changestatus', $response);
			return redirect('admin/user');
		} else {
			$response = array('status' => 'false', 'msg' => 'Status Not Changed');
			$this->session->set_flashdata('changestatus', $response);
			return redirect('admin/user');
		}
	}

	// logout
	public function logout()
	{

		$this->session->userdata('adminSession')['logged_in'];
		$this->session->unset_userdata('adminSession');
		$this->session->sess_destroy();
		redirect('auth/admin');
	}

	///==============================center pannel======================================

	public function center()
	{
		$this->load->view('center/centerlogin');
	}
	public function center_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run()) {

			$username = $this->input->post('username');
			$password = $this->input->post('password');




			$centerdata = $this->AuthModel->getCenterdata($username);
			// print_r($centerdata);
			// exit;
			   if($centerdata[0]->userType=='center'){

			if ($centerdata) {
				$decPassword = $this->encryption->decrypt($centerdata[0]->password);

				if ($password == $decPassword) {
					foreach ($centerdata as $keydata) {
						$wallet  = $keydata->wallet;
						$id = $keydata->userId;
					}


					$sessionArray =  array(
						'id' => $id,
						'wallet' =>$wallet,
						'logged_in' => TRUE
					);

					$this->session->set_userdata('centerSession', $sessionArray);

					return redirect('center/index');
				} else {

					$sessionArray =  array(
						'id' => '',
						'name' => '',
						'logged_in' => FALSE
					);
					$response = array('status' => 'false', 'msg' => 'Password does not match ');
					$this->session->set_flashdata('toaster', $response);
					return redirect('auth/center1');
				}
			} else {

				$sessionArray =  array(
					'id' => '',
					'name' => '',
					'logged_in' => FALSE
				);
				$response = array('status' => 'false', 'msg' => 'invalid user');
				$this->session->set_flashdata('toaster', $response);
				return redirect('auth/center');
			}
		}else{
			$response = array('status' => 'false', 'msg' => 'You are not authorised to login as a center');
			$this->session->set_flashdata('toaster', $response);
			return redirect('auth/center');

		}
		} else {
			$response = array('status' => 'false', 'msg' => validation_errors());
			$this->session->set_flashdata('toaster', $response);
			return redirect('auth/center');
		}
	}

	public function changeCenterPassword()
	{
		$this->form_validation->set_rules('oldpassword', 'OldPassword', 'required');
		$this->form_validation->set_rules('newpassword', 'NewPassword', 'required');

		if ($this->form_validation->run()) {
			$oldpass = $this->input->post('oldpassword');
			$password = $this->input->post('newpassword');

			$uid  = $this->session->userdata('centerSession')['id'];

			$admindata = $this->AuthModel->getAdmin($uid);

			$decPassword = $this->encryption->decrypt($admindata[0]->password);

			if ($decPassword == $oldpass) {
				$encPassword = $this->encryption->encrypt($password);
				$updatepass = $this->AuthModel->updatePassword($encPassword, $uid);
				if ($updatepass) {
					$response = array('status' => 'true', 'msg' => ' password changed');
					$this->session->set_flashdata('changepass', $response);
					return redirect('admin/index');
				} else {
					$response = array('status' => 'false', 'msg' => ' password does not changed');
					$this->session->set_flashdata('changepass', $response);
					return redirect('admin/index');
				}
			} else {
				$response = array('status' => 'false', 'msg' => 'failed');
				$this->session->set_flashdata('changepass', $response);
				return redirect('admin/index');
			}
		} else {
			echo "form not validate";
		}
	}



	
	
	// logout
	public function center_logout()
	{

		$this->session->userdata('centerSession')['logged_in'];
		$this->session->unset_userdata('centerSession');
		$this->session->sess_destroy();
		redirect('auth/center');
	}

//================================================student=======================
public function student()
	{
		$this->load->view('student/studentlogin');
	}
	public function student_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run()) {

			$username = $this->input->post('username');
			$password = $this->input->post('password');




			$studentdata = $this->AuthModel->getStudentPassword($username);
			// print_r($studentdata);
			// exit;
			   

			if ($studentdata) {
				$decPassword = $this->encryption->decrypt($studentdata[0]->password);

				if ($password == $decPassword) {
					foreach ($studentdata as $keydata) {
						$studentId  = $keydata->studentId;
						$id = $keydata->userId;
					}


					$sessionArray =  array(
						'id' => $id,
						'studentId' =>$studentId,
						'logged_in' => TRUE
					);

					$this->session->set_userdata('studentSession', $sessionArray);

					return redirect('student/index');
				} else {

					$sessionArray =  array(
						'id' => '',
						'studentId' => '',
						'logged_in' => FALSE
					);
					$response = array('status' => 'false', 'msg' => 'failed');
					$this->session->set_flashdata('toaster', $response);
					return redirect('auth/student1');
				}
			} else {

				$sessionArray =  array(
					'id' => '',
					'name' => '',
					'logged_in' => FALSE
				);
				$response = array('status' => 'false', 'msg' => 'failed');
				$this->session->set_flashdata('toaster', $response);
				return redirect('auth/student2');
			}
		
		} else {
			$response = array('status' => 'false', 'msg' => validation_errors());
			$this->session->set_flashdata('toaster', $response);
			return redirect('auth/student3');
		}
	}

	

}
