<?php

/**
 * 
 */
class StudentModel extends CI_Model
{
    public function getStudentInfo($studentId)
	{
	
		$data = $this->db->where('id',$studentId)->order_by('id','DESC')->get('student');
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
	public function getQualificationInfo($studentId)
	{
		$data = $this->db->where('studentId',$studentId)->order_by('id','DESC')->get('qualification');
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