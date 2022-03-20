<?php

/**
 * 
 */
class AuthModel extends CI_Model
{


	public function updatePassword($encPassword, $uid)
	{
		return	$this->db->where('userId', $uid)->update("logins", array('password' => $encPassword));
	}


	public function getuserdata($username)
	{
		$checkpassword = $this->db->where('userName', $username)->get('logins');
		if ($checkpassword->num_rows() > 0) {
			return $checkpassword->result();
		} else {
			return false;
		}
	}







	public function getAdmindata($username)
	{
		$checkpassword = $this->db->where('userName', $username,)->get('logins');
		if ($checkpassword->num_rows() > 0) {
			return $checkpassword->result();
		} else {
			return false;
		}
	}
	public function getAdmin($uid)
	{
		$data = $this->db->where('userId', $uid)->get('logins');
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		}
	}
	//============================home pannel==================
	public function updatehomePassword($password, $uid)
	{
		return	$this->db->where('id', $uid)->update("home", array('password' => $password));
	}


	public function gethome($uid)
	{
		$data = $this->db->where('id', $uid)->get('home');
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		}
	}






	//=================================student============================
	public function getStudentPassword($username)
	{
		$checkpassword = $this->db->where('userName' ,$username)->get('student');
		if ($checkpassword->num_rows() > 0) {
			return $checkpassword->result();
		} else {
			return false;
		}
	}



}
