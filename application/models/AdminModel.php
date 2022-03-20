<?php

/**
 * 
 */
class AdminModel extends CI_Model
{
	public function getEditInstitute($id)
	{

		$data = $this->db->where('id', $id)->get('institute');
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		}
	}
	public function deleteInstitute($id)
	{

		$user =	$this->db->where('id', $id)->delete('institute');

		if ($user) {
			return true;
		} else {
			return false;
		}
	}

	public function getInstitute()
	{
		$data = $this->db->order_by('id', 'DESC')->get('institute');
		//updated =convert(varchar(10), getdate(), 102);
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		}
	}

	public function saveInstitute($userdata, $action, $id)
	{

		if ($action == 'edit') {

			return	$this->db->where('id', $id)->update('institute', $userdata);
		} else {
			return  $this->db->insert('institute', $userdata);
		}
	}

	public function updateInstituteStatus($id)
	{
		$data = $this->db->where('id', $id)->get('institute');
		$status = $data->row()->status;
		if ($status == 1) {
			return $this->db->where('id', $id)->set('status', '0')->update('institute');
		} else {
			return $this->db->where('id', $id)->set('status', '1')->update('institute');
		}
	}

	public function getCountInstitute()
	{
		return $this->db->count_all('institute');
	}
	public function getInstituteInfo()
	{
		$data = $this->db->order_by('id', 'DESC')->get('institute');

		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		}
	}

	

	//==================================center===================================	

	public function getTeacher()
	{
		$data = $this->db->order_by('id', 'DESC')->get('teacher');
		//updated =convert(varchar(10), getdate(), 102);
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		}
	}
	public function getCenterName()
	{
		$data = $this->db->select('name')->order_by('id', 'DESC')->get('user');
		//updated =convert(varchar(10), getdate(), 102);
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		}
	}



	public function updateTeacherStatus($id)
	{
		$data = $this->db->where('id', $id)->get('teacher');
		$status = $data->row()->status;
		if ($status == 1) {
			return $this->db->where('id', $id)->set('status', '0')->update('teacher');
		} else {
			return $this->db->where('id', $id)->set('status', '1')->update('teacher');
		}
	}



	public function saveTeacher( $action, $uid, $userdata)
	{
		if ($action == 'add') {
			$log = $this->db->insert('teacher', $userdata);
		
		} else {
			$user =	$this->db->where('id', $uid)->update("teacher", $userdata);
			
		}
	}




	public function getEditUinfo($uid)
	{
		$data = $this->db->where('userId', $uid)->get('userinfo');
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		}
	}


	public function saveCenter($menudata)
	{
		$this->db->insert('user', $menudata);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}
	public function getEditTeacher($uid)
	{
		$data = $this->db->where('id', $uid)->get('teacher');
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		}
	}
	public function getEditCenterLog($id)
	{
		$data = $this->db->where('userId', $id)->get('logins');
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		}
	}


	public function deleteTeacher($id)
	{

		$user =	$this->db->where('id', $id)->delete('teacher');
		
	}

	public function getCountCenter()
	{
		$query = $this->db->where('userType', 'center')->get('logins');
		return $query->num_rows();
	}

	//================================course=======================
	public function getEditCourse($id)
	{

		$data = $this->db->where('id', $id)->get('course');
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		}
	}

	public function deleteCourse($id)
	{

		$user =	$this->db->where('id', $id)->delete('course');

		if ($user) {
			return true;
		} else {
			return false;
		}
	}

	public function getCourse()
	{
		$data = $this->db->order_by('id', 'DESC')->get('course');
		//updated =convert(varchar(10), getdate(), 102);
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		}
	}

	public function saveCourse($userdata, $action, $id)
	{

		if ($action == 'edit') {

			return	$this->db->where('id', $id)->update('course', $userdata);
		} else {
			return  $this->db->insert('course', $userdata);
		}
	}

	public function updateCourseStatus($id)
	{
		$data = $this->db->where('id', $id)->get('course');
		$status = $data->row()->status;
		if ($status == 1) {
			return $this->db->where('id', $id)->set('status', '0')->update('course');
		} else {
			return $this->db->where('id', $id)->set('status', '1')->update('course');
		}
	}

	public function getCountcourse()
	{
		return $this->db->count_all('course');
	}





	//=======================Category==================
	public function getEditCategory($id)
	{

		$data = $this->db->where('id', $id)->get('Category');
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		}
	}

	public function deleteCategory($id)
	{

		$user =	$this->db->where('id', $id)->delete('Category');

		if ($user) {
			return true;
		} else {
			return false;
		}
	}

	public function getCategory()
	{
		$data = $this->db->order_by('id', 'DESC')->get('category');
		//updated =convert(varchar(10), getdate(), 102);
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		}
	}

	public function saveCategory($userdata, $action, $id)
	{

		if ($action == 'edit') {

			return	$this->db->where('id', $id)->update('Category', $userdata);
		} else {
			return  $this->db->insert('Category', $userdata);
		}
	}

	public function updateCategoryStatus($id)
	{
		$data = $this->db->where('id', $id)->get('Category');
		$status = $data->row()->status;
		if ($status == 1) {
			return $this->db->where('id', $id)->set('status', '0')->update('category');
		} else {
			return $this->db->where('id', $id)->set('status', '1')->update('category');
		}
	}

	public function getCountCategory()
	{
		return $this->db->count_all('category');
	}


		//=======================Category==================
		public function getEditQuestion($id)
		{
	
			$data = $this->db->where('id', $id)->get('quiz');
			if ($data->num_rows() > 0) {
				return $data->result();
			} else {
				return false;
			}
		}
	
		public function deleteQuestion($id)
		{
	
			$user =	$this->db->where('id', $id)->delete('quiz');
	
			if ($user) {
				return true;
			} else {
				return false;
			}
		}
	
		public function getQuestion()
		{
			$data = $this->db->order_by('id', 'DESC')->get('quiz');
			//updated =convert(varchar(10), getdate(), 102);
			if ($data->num_rows() > 0) {
				return $data->result();
			} else {
				return false;
			}
		}
	
		public function saveQuestion($userdata, $action, $id)
		{
	
			if ($action == 'edit') {
	
				return	$this->db->where('id', $id)->update('quiz', $userdata);
			} else {
				return  $this->db->insert('quiz', $userdata);
			}
		}
	
		public function updateQuestionStatus($id)
		{
			$data = $this->db->where('id', $id)->get('Question');
			$status = $data->row()->status;
			if ($status == 1) {
				return $this->db->where('id', $id)->set('status', '0')->update('quiz');
			} else {
				return $this->db->where('id', $id)->set('status', '1')->update('quiz');
			}
		}
	
		public function getCountQuestion()
		{
			return $this->db->count_all('Question');
		}
	
	

	//=========================wallet=================
	public function updateAmount($trandata, $walletdata, $uid)
	{
		$wall = $this->db->where('userId', $uid)->update('wallet', $walletdata);
		$tran = $this->db->insert('transaction', $trandata);
		if ($wall && $tran) {
			return true;
		} else {
			return false;
		}
	}

	public function getAmount($uid)
	{
		$data = $this->db->select('amount')->where('userId', $uid)->get('wallet');
		//updated =convert(varchar(10), getdate(), 102);
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		}
	}

	public function getTransaction($uid)
	{
		$data = $this->db->order_by('id', 'DESC')->where('userId', $uid)->get('transaction');
		//updated =convert(varchar(10), getdate(), 102);
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		}
	}

	public function getoldAmount()
	{
		$data = $this->db->select('amount')->get('wallet');
		//updated =convert(varchar(10), getdate(), 102);
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		}
	}

	//===========================call back function========================
	function check_phone($number)
    {

        $query = $this->db->select('id')->get_where('user',array('phone' => $number));
    
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}

	}
	
	function check_email($email)
    {
  
		$query = $this->db->select('id')->get_where('user',array('email' => $email));
        
      
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}

	}
	
	function check_aadhar($aadhar)
    {

		$query = $this->db->select('userId')->get_where('userinfo',array('aadharNumber' => $aadhar));
    
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}

	}
}
