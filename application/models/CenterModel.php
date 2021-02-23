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

	//================================add form============
	// public function geteditFrom1($uid){

	// 	$data = $this->db->where('UserId', $uid)->get('student');
	// 	if($data->num_rows() > 0)
	// 	{
	// 		return $data->result();
	// 	}
	// 	else
	// 	{
	// 		return false;
	// 	}
	// }
	// public function saveform1($menudata,$action,$id)
	// {
	// 	if($action=='edit'){

	// 	return	$this->db->where('id', $id)->update('student', $menudata);

	// 	}else{
	// 		return  $this->db->insert('student', $menudata);
	// 	}

	//}
	// public function getform1($uid)
	// {
	// 	$data = $this->db->where('userId',$uid)->order_by('id','DESC')->get('student');
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

}