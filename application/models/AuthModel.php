<?php

/**
 * 
 */
class AuthModel extends CI_Model
{


	public function updatepassword($encPassword,$uid)
	{
	 return	$this->db->where('userId', $uid)->update("logins", array('password' => $encPassword));
	 
	}
	

	public function getcenterdata($username)
    {
        $checkpassword = $this->db->where(["userName"=>$username,"status"=>'1'])->get('logins');
			if($checkpassword->num_rows() > 0)
			{
				return $checkpassword->result();
			}
			else
			{
				return false;
			}
    }







 public function getadmindata($username)
    {
        $checkpassword = $this->db->where('userName',$username,)->get('logins');
			if($checkpassword->num_rows() > 0)
			{
				return $checkpassword->result();
			}
			else
			{
				return false;
			}
    }
    public function getadmin($uid)
	{
		$data = $this->db->where('userId',$uid)->get('logins');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		else
		{
			return false;
		}
	}
//============================center pannel==================
	public function updateCenterpassword($password,$uid)
	{
	 return	$this->db->where('id', $uid)->update("center", array('password' => $password));
	 
	}
	

    public function getcenter($uid)
	{
		$data = $this->db->where('id',$uid)->get('center');
		if($data->num_rows() > 0)
		{
			return $data->result();
		}
		else
		{
			return false;
		}
	}
}