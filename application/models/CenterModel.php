<?php

/**
 * 
 */
class CenterModel extends CI_Model
{


    public function getcenter()
    {
		$data = $this->db->order_by('id','DESC')->get('student');
		//updated =convert(varchar(10), getdate(), 102);
			if($data->num_rows() > 0)
			{
				return $data->result();
			}
			else
			{
				return false;
			}
	}
	public function getInstituteId($uid)
    {
		$data = $this->db->select('instituteId')->where('id',$uid)->get('user');
		//updated =convert(varchar(10), getdate(), 102);
			if($data->num_rows() > 0)
			{
				return $data->result();
				
			}
			else
			{
				
				return false;
			}
	}

	public function getInstitute($intId)
    {
		$data = $this->db->where_in('id',$intId)->get('institute');
		//updated =convert(varchar(10), getdate(), 102);
			if($data->num_rows() > 0)
			{
				return $data->result();
				
			}
			else
			{
				
				return false;
			}
	}

	//================================add form============

	public function saveform1($menuData)
	{
	

		$data = $this->db->insert('student', $menuData);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	

	}

	public function saveQualification($qualiData)
	{
	
		return $this->db->insert('qualification', $qualiData);
		

	}

	
	public function getStudentData($uid)
	{
	
		$data = $this->db->where('userId',$uid)->order_by('id','DESC')->get('student');
		//updated =convert(varchar(10), getdate(), 102);
			if($data->num_rows() > 0)
			{
				return $data->result();
			}
			else
			{
				return false;
			}
	}
	public function getQualificationData($uid)
	{
		$data = $this->db->where('userId',$uid)->order_by('id','DESC')->get('qualification');
		//updated =convert(varchar(10), getdate(), 102);
			if($data->num_rows() > 0)
			{
				return $data->result();
			}
			else
			{
				return false;
			}
	}
	// public function getform1Uid($name)
	// {
	// 	$data = $this->db->select('id')->where('name',$name)->get('user');
	// 	//updated =convert(varchar(10), getdate(), 102);
	// 		if($data->num_rows() > 0)
	// 		{
	// 			return $data->result();
	// 		}
	// 		else
	// 		{
	// 			return false;
	// 		}
	// }
//=======================================students===========================
public function getStudents($instituteId)
    {
		// echo $instituteId;
		$query = $this->db->where('instituteId',$instituteId)->get('student');
		return $query->num_rows();
			
	}
	//==========================wallet=====================
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

	public function getOldAmount($uid)
	{
		$data = $this->db->where('userId',$uid)->select('amount')->get('wallet');
		//updated =convert(varchar(10), getdate(), 102);
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		}
	}

	public function updateAmount($tranData, $walletData, $uid)
	{
		$wall = $this->db->where('userId', $uid)->update('wallet', $walletData);
		$tran = $this->db->insert('transaction', $tranData);
		if ($wall && $tran) {
			return true;
		} else {
			return false;
		}
	}
	public function getFee($cId)
	{
		$data = $this->db->select('courseFee')->where('id',$cId)->get('course');
		//updated =convert(varchar(10), getdate(), 102);
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		}
	}

	public function updateFee($uid,$total,$tranData)
	{
		$data =$this->db->where('userId',$uid)->set('amount',$total)->update('wallet');
		$tran = $this->db->insert('transaction', $tranData);
		if ($data && $tran) {
			return true;
		} else {
			return false;
		}
	}

	//======================course================
	public function getCourseData()
	{
		$data = $this->db->order_by('id','DESC')->get('course');
		//updated =convert(varchar(10), getdate(), 102);
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