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

	public function getform1($uid)
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

}