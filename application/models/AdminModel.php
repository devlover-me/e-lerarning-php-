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

	public function getCenter()
	{
		$data = $this->db->order_by('id', 'DESC')->get('user');
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



	public function updateCenterStatus($id)
	{
		$data = $this->db->where('id', $id)->get('user');
		$status = $data->row()->status;
		if ($status == 1) {
			return $this->db->where('id', $id)->set('status', '0')->update('user');
		} else {
			return $this->db->where('id', $id)->set('status', '1')->update('user');
		}
	}



	public function saveCenterLog($logindata, $userInfodata, $action, $uid, $userdata)
	{
		if ($action == 'add') {
			$log = $this->db->insert('logins', $logindata);
			$uInfo = $this->db->insert('userinfo', $userInfodata);
			if ($log &&  $uInfo) {
				return true;
			} else {
				return false;
			}
		} else {
			$user =	$this->db->where('id', $uid)->update("user", $userdata);
			$log =	$this->db->where('userId', $uid)->update("logins", $logindata);
			$uInfo = $this->db->where('userId', $uid)->update("userinfo", $userInfodata);
			if ($user &&  $uInfo && $log) {
				return true;
			} else {
				return false;
			}
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
	public function getEditCenter($uid)
	{
		$data = $this->db->where('id', $uid)->get('user');
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


	public function deleteCenter($id)
	{

		$user =	$this->db->where('id', $id)->delete('user');
		$log =	$this->db->where('userId', $id)->delete('logins');
		if ($user && $log) {
			return true;
		} else {
			return false;
		}
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
