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
		
		// if (!$this->session->userdata('adminSession')['logged_in']) {
		// 	return redirect('auth/admin');
		// }
        // $uid = $this->session->userdata('adminSession')['id'];
		// $count['course'] = $this->AdminModel->getCountcourse();
		// $count['institute'] = $this->AdminModel->getCountinstitute();
		// $count['center'] = $this->AdminModel->getCountcenter($uid);

		$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/sidebar');
		//$this->load->view('common/dashboard-layout/header',$header);
		$this->load->view('common/dashboard-layout/topnav');
		$this->load->view('admin/dashboard');
		$this->load->view('common/dashboard-layout/footer');
		$this->load->view('common/dashboard-layout/footer-scripts');
	}

	public function viewTeacher()
	{
		$teacher['menu'] = $this->AdminModel->getTeacher();

		$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/sidebar');
		$this->load->view('common/dashboard-layout/topnav');
		$this->load->view('admin/viewTeacher', $teacher);
		$this->load->view('common/dashboard-layout/footer');
		$this->load->view('common/dashboard-layout/footer-scripts');
	}

	public function saveteacher()
	{$uid = $this->session->userdata('adminSession')['id'];
		$data = $this->input->post('wallet');
			
		$action = $this->uri->segment(3);
        date_default_timezone_set("Asia/Kolkata");
		$currentTime = date('y-m-d');

		$this->form_validation->set_rules('name', 'Name', 'required');
		//$this->form_validation->set_rules('institute', 'Institute', 'required');
		// $this->form_validation->set_rules('phone', 'Phone', 'required|numeric|callback_check_phone');
		// $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email');
		// $this->form_validation->set_rules('address', 'Address', 'required');
		// $this->form_validation->set_rules('password', 'password', 'required');
		// $this->form_validation->set_rules('nod', 'nod', 'required');
		// $this->form_validation->set_rules('orgName', 'orgName', 'required');
		// $this->form_validation->set_rules('faName', 'faname', 'required');
		// $this->form_validation->set_rules('aadhar', 'aadhar', 'required|numeric|callback_check_aadhar');
		$this->form_validation->set_rules('special', 'special', 'required');
		if ($this->form_validation->run()) {

			

			// $int = $this->input->post('institute');
			
		// $ids= implode(",",$int);
		

			// $password = $this->input->post('password');
			// $encPassword = $this->encryption->encrypt($password);
			
			$userdata = array(
				'name' => $this->input->post('name'),
				'speciality' =>  $this->input->post('special'),
				
				'createdAt' => $currentTime,
				'status' => '1'
			);

		

			// if($data[0]=='yes'){
			// 	$logindata['wallet']='1';
			// }else{
			// 	$logindata['wallet']='0';
			// }
			
		
			if ($action == 'edit') {
				$userdata['updatedAt'] = $currentTime;
				$uid = $this->uri->segment(4);
			} else {
				// $userId = $this->AdminModel->savecenter($userdata);
				// $userInfodata['userId'] = $userId;

				// $logindata['userId'] = $userId;
			}

			if ($this->AdminModel->saveTeacher($action, $uid, $userdata)) {

				$response = array('status' => 'true', 'msg' => 'Center Added');
				$this->session->set_flashdata('savemenu', $response);
				return redirect('admin/viewTeacher');
			} else {

				$response = array('status' => 'false', 'msg' => 'Teacher Not Added');
				$this->session->set_flashdata('savemenu', $response);
				return redirect('admin/viewTeacher');
			}
		} else {

			$action = $this->uri->segment(3);
			$mainmenu['institute'] = $this->AdminModel->getInstituteInfo();
			$this->load->view('common/dashboard-layout/head');
			$this->load->view('common/dashboard-layout/sidebar');
			$this->load->view('common/dashboard-layout/topnav');
			 if ($action == 'edit') {
				$uid = $this->uri->segment(4);
				$mainmenu['user'] = $this->AdminModel->getEditCenter($uid);
				$pass = $this->AdminModel->getEditCenterLog($uid);
				$mainmenu['userInfo'] = $this->AdminModel->getEditUinfo($uid);
				$mainmenu['log'] = $this->encryption->decrypt($pass[0]->password);
				$this->load->view('admin/addcenter', $mainmenu);
			} else {
				$this->load->view('admin/addcenter', $mainmenu);
			}
			$this->load->view('common/dashboard-layout/footer');
			$this->load->view('common/dashboard-layout/footer-scripts');
		}
	}

	public function changeTeacherStatus($id)
	{

		$updatestatus = $this->AdminModel->updateTeacherStatus($id);

		if ($updatestatus) {
			$response = array('status' => 'true', 'msg' => 'Status Changed');
			$this->session->set_flashdata('changestatus', $response);
			return redirect('admin/viewTeacher');
		} else {
			$response = array('status' => 'false', 'msg' => 'Status Not Changed');
			$this->session->set_flashdata('changestatus', $response);
			return redirect('admin/viewTeacher');
		}
	}

	public function editTeacher()
	{
          $action = $this->uri->segment(3);
		$mainmenu['institute'] = $this->AdminModel->getInstituteInfo();
		$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/sidebar');
		$this->load->view('common/dashboard-layout/topnav');
         if ($action == 'edit') {
			$uid = $this->uri->segment(4);
			$mainmenu['user'] = $this->AdminModel->getEditTeacher($uid);
			// $pass = $this->AdminModel->getEditCenterLog($uid);
			// $mainmenu['userInfo'] = $this->AdminModel->getEditUinfo($uid);
			// $mainmenu['log'] = $this->encryption->decrypt($pass[0]->password);
			$this->load->view('admin/addteacher', $mainmenu);
		} else {
			$this->load->view('admin/addteacher', $mainmenu);
		}
		$this->load->view('common/dashboard-layout/footer');
		$this->load->view('common/dashboard-layout/footer-scripts');
	}

	public function deleteTeacher($id)
	{
	if ($this->AdminModel->deleteTeacher($id)) {
			$response = array('status' => 'true', 'msg' => 'Teacher Deleted');
			$this->session->set_flashdata('savemenu', $response);
			return redirect('admin/viewTeacher');
		} else {

			$response = array('status' => 'false', 'msg' => 'Teacher not Deleted');
			$this->session->set_flashdata('savemenu', $response);
			return redirect('admin/viewTeacher');
		}
	}

	//===wallet======
	public function wallet()
	{
		$uid = $this->session->userdata('adminSession')['id'];
		$wallet['wall'] = $this->AdminModel->getAmount($uid);
		$wallet['menu'] = $this->AdminModel->getTransaction($uid);
		$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/sidebar');

		$this->load->view('common/dashboard-layout/topnav');
		$this->load->view('admin/wallet', $wallet);
		$this->load->view('common/dashboard-layout/footer');
		$this->load->view('common/dashboard-layout/footer-scripts');
	}

	public function updateWallet()
	{

		date_default_timezone_set("Asia/Kolkata");
		$currentTime = date('y-m-d H:i:s');

		$uid = $this->session->userdata('adminSession')['id'];
		$this->form_validation->set_rules('amount', 'Amount', 'required|numeric');

		if ($this->form_validation->run()) {
			$amount = $this->input->post('amount');

			$oldAmount = $this->AdminModel->getoldAmount($uid);
			$wallet = $oldAmount[0]->amount + $amount;


			$walletdata = array(
				'amount' => $wallet,
				'userId' => $uid,
				'updatedAt' => $currentTime
			);

			$tid = random_string('alnum', 16);

			$trandata = array(
				'transactionId' => $tid,
				'transactionFromTo' => 'wallet',
				'transactionType' => 'credit',
				'amount' => $amount,
				'userId' => $uid,
				'updatedAt' => $currentTime

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
		} else {
			$uid = $this->session->userdata('adminSession')['id'];
			$wallet['wall'] = $this->AdminModel->getAmount($uid);
			$wallet['menu'] = $this->AdminModel->getTransaction($uid);
			$this->load->view('common/dashboard-layout/head');
			$this->load->view('common/dashboard-layout/sidebar');

			$this->load->view('common/dashboard-layout/topnav');
			$this->load->view('admin/wallet', $wallet);
			$this->load->view('common/dashboard-layout/footer');
			$this->load->view('common/dashboard-layout/footer-scripts');
		}
	}





	//========================================Institute================================
	public function institute()

	{

		$action = $this->uri->segment(3);


		$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/sidebar');

		$this->load->view('common/dashboard-layout/topnav');
		if ($action == 'add') {
			$this->load->view('admin/addinstitute');
		} else {
			$id = $this->uri->segment(4);
			$inst['data'] = $this->AdminModel->getEditInstitute($id);
			$this->load->view('admin/addinstitute', $inst);
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

		$action = $this->uri->segment(3);
		$uid = $this->session->userdata('adminSession')['id'];
		//$this->session->userdata('adminSession')['id'];
		date_default_timezone_set("Asia/Kolkata");
		$currentTime = date('y-m-d');

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('address', 'address', 'required');
	//	$this->form_validation->set_rules('month', 'Month', 'required');



		if ($this->form_validation->run()) {


			$userdata = array(
				'name' => $this->input->post('name'),
				'address' =>  $this->input->post('address'),

				'status' => '1'
			);

			if ($action == 'edit') {
				$userdata['updatedAt'] = $currentTime;
				$id = $this->uri->segment(4);
			} else {
				//$userdata['userId'] =  $uid;
				$userdata['createdAt'] = $currentTime;
			}

			if ($this->AdminModel->saveInstitute($userdata, $action, $id)) {

				$response = array('status' => 'true', 'msg' => 'Institute Added');
				$this->session->set_flashdata('savemenu', $response);
				return redirect('admin/viewInstitute');
			} else {

				$response = array('status' => 'false', 'msg' => 'Institute Not Added');
				$this->session->set_flashdata('savemenu', $response);
				return redirect('admin/viewInstitute');
			}
		} else {

			$action = $this->uri->segment(3);


			$this->load->view('common/dashboard-layout/head');
			$this->load->view('common/dashboard-layout/sidebar');

			$this->load->view('common/dashboard-layout/topnav');
			if ($action == 'add') {
				$this->load->view('admin/addinstitute');
			} else {
				$id = $this->uri->segment(4);
				$inst['data'] = $this->AdminModel->getEditInstitute($id);
				$this->load->view('admin/addinstitute', $inst);
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

		$updatestatus = $this->AdminModel->updateInstituteStatus($id);

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
          $action = $this->uri->segment(3);
     	$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/sidebar');

		$this->load->view('common/dashboard-layout/topnav');
		if ($action == 'add') {
			$this->load->view('admin/addcourse');
		} else {
			$id = $this->uri->segment(4);
			$inst['data'] = $this->AdminModel->getEditCourse($id);
			$this->load->view('admin/addcourse', $inst);
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

		$action = $this->uri->segment(3);
		$uid = $this->session->userdata('adminSession')['id'];
		//$this->session->userdata('adminSession')['id'];
		date_default_timezone_set("Asia/Kolkata");
		$currentTime = date('y-m-d');

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('price', 'price', 'required');

		if ($this->form_validation->run()) {


			$userdata = array(
				'name' => $this->input->post('name'),
				'price' =>  $this->input->post('price'),
				'status' => '1'
			);


			if ($action == 'edit') {
				$userdata['updatedAt'] = $currentTime;
				$id = $this->uri->segment(4);
			} else {
				//$userdata['userId'] =  $uid;
				$userdata['createdAt'] = $currentTime;
			}

			if ($this->AdminModel->saveCourse($userdata, $action, $id)) {

				$response = array('status' => 'true', 'msg' => 'Course Added');
				$this->session->set_flashdata('savemenu', $response);
				return redirect('admin/viewCourse');
			} else {

				$response = array('status' => 'false', 'msg' => 'Course Not Added');
				$this->session->set_flashdata('savemenu', $response);
				return redirect('admin/viewCourse');
			}
		} else {

			$action = $this->uri->segment(3);


			$this->load->view('common/dashboard-layout/head');
			$this->load->view('common/dashboard-layout/sidebar');

			$this->load->view('common/dashboard-layout/topnav');
			if ($action == 'add') {
				$this->load->view('admin/addcourse');
			} else {
				$id = $this->uri->segment(4);
				$inst['data'] = $this->AdminModel->geteditCourse($id);
				$this->load->view('admin/addcourse', $inst);
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

//================================Category===============================

public function Category()

	{
          $action = $this->uri->segment(3);
     	$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/sidebar');

		$this->load->view('common/dashboard-layout/topnav');
		if ($action == 'add') {
			$this->load->view('admin/addcategory');
		} else {
			$id = $this->uri->segment(4);
			$inst['data'] = $this->AdminModel->getEditCategory($id);
			$this->load->view('admin/addcategory', $inst);
		}
		$this->load->view('common/dashboard-layout/footer');
		$this->load->view('common/dashboard-layout/footer-scripts');
	}

	public function viewCategory()
	{


		$center['menu'] = $this->AdminModel->getCategory();

		$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/sidebar');
		//$this->load->view('common/dashboard-layout/header',$header);
		$this->load->view('common/dashboard-layout/topnav');
		$this->load->view('admin/viewCategory', $center);
		$this->load->view('common/dashboard-layout/footer');
		$this->load->view('common/dashboard-layout/footer-scripts');
	}

	public function saveCategory()
	{

		$action = $this->uri->segment(3);
		$uid = $this->session->userdata('adminSession')['id'];
		//$this->session->userdata('adminSession')['id'];
		date_default_timezone_set("Asia/Kolkata");
		$currentTime = date('y-m-d');

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('price', 'price', 'required');

		if ($this->form_validation->run()) {


			$userdata = array(
				'title' => $this->input->post('name'),
				'description' =>  $this->input->post('price'),
				'status' => '1'
			);


			if ($action == 'edit') {
				$userdata['updatedAt'] = $currentTime;
				$id = $this->uri->segment(4);
			} else {
				//$userdata['userId'] =  $uid;
				$userdata['createdAt'] = $currentTime;
			}

			if ($this->AdminModel->saveCategory($userdata, $action,$id)) {

				$response = array('status' => 'true', 'msg' => 'Category Added');
				$this->session->set_flashdata('savemenu', $response);
				return redirect('admin/viewCategory');
			} else {

				$response = array('status' => 'false', 'msg' => 'Category Not Added');
				$this->session->set_flashdata('savemenu', $response);
				return redirect('admin/viewCategory');
			}
		} else {

			$action = $this->uri->segment(3);


			$this->load->view('common/dashboard-layout/head');
			$this->load->view('common/dashboard-layout/sidebar');

			$this->load->view('common/dashboard-layout/topnav');
			if ($action == 'add') {
				$this->load->view('admin/addCategory');
			} else {
				$id = $this->uri->segment(4);
				$inst['data'] = $this->AdminModel->geteditCategory($id);
				$this->load->view('admin/addCategory', $inst);
			}
			$this->load->view('common/dashboard-layout/footer');
			$this->load->view('common/dashboard-layout/footer-scripts');
		}
	}

	public function deleteCategory($id)
	{

		if ($this->AdminModel->deleteCategory($id)) {
			$response = array('status' => 'true', 'msg' => 'Category Deleted');
			$this->session->set_flashdata('savemenu', $response);
			return redirect('admin/viewCategory');
		} else {

			$response = array('status' => 'false', 'msg' => 'Category not Deleted');
			$this->session->set_flashdata('savemenu', $response);
			return redirect('admin/viewCategory');
		}
	}
	public function changeCategoryStatus($id)
	{

		$updatestatus = $this->AdminModel->updateCategorystatus($id);

		if ($updatestatus) {
			$response = array('status' => 'true', 'msg' => 'Status Changed');
			$this->session->set_flashdata('changestatus', $response);
			return redirect('admin/viewCategory');
		} else {
			$response = array('status' => 'false', 'msg' => 'Status Not Changed');
			$this->session->set_flashdata('changestatus', $response);
			return redirect('admin/viewCategory');
		}
	}

		
//================================Question===============================

public function question()

{
	  $action = $this->uri->segment(3);
	 $this->load->view('common/dashboard-layout/head');
	$this->load->view('common/dashboard-layout/sidebar');

	$this->load->view('common/dashboard-layout/topnav');
	if ($action == 'add') {
		
		$mainmenu['category'] = $this->AdminModel->getCategory();
		$this->load->view('admin/addquestion',$mainmenu);
	} else {
		$id = $this->uri->segment(4);
		$inst['data'] = $this->AdminModel->getEditQuestion($id);
		$this->load->view('admin/addquestion', $inst);
	}
	$this->load->view('common/dashboard-layout/footer');
	$this->load->view('common/dashboard-layout/footer-scripts');
}

public function viewQuestion()
{


	$center['menu'] = $this->AdminModel->getQuestion();
	

	$this->load->view('common/dashboard-layout/head');
	$this->load->view('common/dashboard-layout/sidebar');
	//$this->load->view('common/dashboard-layout/header',$header);
	$this->load->view('common/dashboard-layout/topnav');
	$this->load->view('admin/viewquestion', $center);
	$this->load->view('common/dashboard-layout/footer');
	$this->load->view('common/dashboard-layout/footer-scripts');
}

public function save_question()
{

	$action = $this->uri->segment(3);
	$uid = $this->session->userdata('adminSession')['id'];
	//$this->session->userdata('adminSession')['id'];
	date_default_timezone_set("Asia/Kolkata");
	$currentTime = date('y-m-d');

	$this->form_validation->set_rules('question', 'question', 'required');
	$this->form_validation->set_rules('opt1', 'opt1', 'required');
	$this->form_validation->set_rules('opt2', 'opt2', 'required');
	$this->form_validation->set_rules('opt3', 'opt3', 'required');
	$this->form_validation->set_rules('opt4', 'opt4', 'required');
	$this->form_validation->set_rules('ans', 'ans', 'required');
	$this->form_validation->set_rules('coin', 'coin', 'required');

	if ($this->form_validation->run()) {


		$userdata = array(
			'category' =>  $this->input->post('category'),
			'question' => $this->input->post('question'),
			'opt1' =>  $this->input->post('opt1'),
			'opt2' =>  $this->input->post('opt2'),
			'opt3' =>  $this->input->post('opt3'),
			'opt4' =>  $this->input->post('opt4'),
			'answer' =>  $this->input->post('ans'),
			'Q_coin' =>  $this->input->post('coin'),
			'status' => '1'
		);


		if ($action == 'edit') {
			$userdata['updatedAt'] = $currentTime;
			$id = $this->uri->segment(4);
		} else {
			//$userdata['userId'] =  $uid;
			$userdata['createdAt'] = $currentTime;
		}

		if ($this->AdminModel->saveQuestion($userdata, $action,$id)) {

			$response = array('status' => 'true', 'msg' => 'Question Added');
			$this->session->set_flashdata('savemenu', $response);
			return redirect('admin/view_question');
		} else {

			$response = array('status' => 'false', 'msg' => '_question Not Added');
			$this->session->set_flashdata('savemenu', $response);
			return redirect('admin/view_question');
		}
	} else {

		$action = $this->uri->segment(3);


		$this->load->view('common/dashboard-layout/head');
		$this->load->view('common/dashboard-layout/sidebar');

		$this->load->view('common/dashboard-layout/topnav');
		if ($action == 'add') {
			$this->load->view('admin/addQuestion');
		} else {
			$id = $this->uri->segment(4);
			$inst['data'] = $this->AdminModel->geteditQuestion($id);
			$this->load->view('admin/addQuestion', $inst);
		}
		$this->load->view('common/dashboard-layout/footer');
		$this->load->view('common/dashboard-layout/footer-scripts');
	}
}

public function deleteQuestion($id)
{

	if ($this->AdminModel->deleteQuestion($id)) {
		$response = array('status' => 'true', 'msg' => 'Question Deleted');
		$this->session->set_flashdata('savemenu', $response);
		return redirect('admin/viewQuestion');
	} else {

		$response = array('status' => 'false', 'msg' => 'Question not Deleted');
		$this->session->set_flashdata('savemenu', $response);
		return redirect('admin/viewQuestion');
	}
}
public function changeQuestionStatus($id)
{

	$updatestatus = $this->AdminModel->updateQuestionstatus($id);

	if ($updatestatus) {
		$response = array('status' => 'true', 'msg' => 'Status Changed');
		$this->session->set_flashdata('changestatus', $response);
		return redirect('admin/viewQuestion');
	} else {
		$response = array('status' => 'false', 'msg' => 'Status Not Changed');
		$this->session->set_flashdata('changestatus', $response);
		return redirect('admin/viewQuestion');
	}
}









	//=====================================callback functio===================
	public 	function check_phone()
	{
		$number = $this->input->post('phone');
		$uid = $this->uri->segment(4);


		$getId = $this->AdminModel->check_phone($number);


		if ($getId) {
			if ($getId[0]->id==$uid) {
				
				return TRUE;
			} else {
				
				$this->form_validation->set_message('check_phone', 'Sorry, This phone is already used by another user please select another one');
				
				return FALSE;
			}
		} else {
			return TRUE;
		}
	}


	public 	function check_aadhar()
	{
		$aadhar = $this->input->post('aadhar');

		$uid = $this->uri->segment(4);
		$getId = $this->AdminModel->check_aadhar($aadhar);

		if ($getId) {
			if ($getId[0]->userId == $uid) {
				return TRUE;
			} else {
				$this->form_validation->set_message('check_aadhar', 'Sorry, This Aadhar is already used by another user please select another one');
				return FALSE;
			}
		} else {
			return TRUE;
		}
	}



	

	public 	function check_email()
	{
		$email = $this->input->post('email');
		$uid = $this->uri->segment(4);

		$getId = $this->AdminModel->check_email($email);

		if ($getId) {
			if ($getId[0]->id == $uid) {
				return TRUE;
			} else {
				$this->form_validation->set_message('check_email', 'Sorry, This email is already used by another user please select another one');
				return FALSE;
			}
		} else {
			return TRUE;
		}
	}
}
