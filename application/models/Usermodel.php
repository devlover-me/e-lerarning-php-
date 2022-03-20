

<?php

/**
 * 
 */
class UserModel extends CI_Model
{








public function saveuserdata($userdata){
	$this->db->insert('user', $userdata);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
}

public function savelogindata($logindata)
{
 return $this->db->insert('logins', $logindata);
}



public function getallCourse(){
	$query=$this->db->query("select * from course");
	return $query->result(); 
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


public function getcategory(){
	$data = $this->db->select('title')->get('category');
		//updated =convert(varchar(10), getdate(), 102);
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		} 
}


public function getquiz($title,$uid){

	// select * from quiz where id NOT IN (select quesId from used_ques where userId ='".$uid."') && category='".$title."' order by rand() limit 5
	
$sql=" select * from quiz where category='".$title."'";

$query = $this->db->query($sql);
return $query->result();
}

public function checkTest($questionId,$ans){
	$sql="select * from quiz where id='".$questionId."' and answer='".$ans."'";
	$query = $this->db->query($sql);
	return $query->result();

}



public function saveTest($quizdata){
	return  $this->db->insert('used_ques', $quizdata);

}


public function getWallet($uid){
	$data = $this->db->where('userId',$uid)->get('wallet');
		
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		} 
}


public function updateWallet($uid,$totalcoin) {
	return $this->db->where('userId', $uid)->set('amount',$totalcoin )->update('wallet');
}


public function saveTrans($tradata){
	return  $this->db->insert(' transaction ', $tradata);

}
public function insertWallet($walldata){
	return  $this->db->insert('wallet ', $walldata);

}


public function getallteacher()
	{
		$query=$this->db->query("select * from teacher limit 5");
		return $query->result(); 
	}



	 public function getSearchteacher($variable){
		$where = "name LIKE '%".$variable."%'";

		$this->db->where($where);
	  
		return $this->db->get('teacher');
	   
	 }


	 public function checkEmail($email){

		$data = $this->db->where('email', $email)->get('user');
		//updated =convert(varchar(10), getdate(), 102);
		if ($data->num_rows() > 0) {
			return true;
		} else {
			return false;
		}    

	 }


	 public function updateOtp($email,$otp){
		return $this->db->where('email', $email)->set('otp',$otp )->update('user'); 
	 }


	 public function checkOtp($email,$otp){
		$data = $this->db->where('email', $email)->where('otp', $otp)->get('user');
		//updated =convert(varchar(10), getdate(), 102);
		if ($data->num_rows() > 0) {
			return true;
		} else {
			return false;
		}    

	 }



	 public function updatePasssword($email,$encPassword){
		return $this->db->where('userName', $email)->set('password',$encPassword )->update('logins');  
	 }


	 public function getQuizHistory($uid){
		$data = $this->db->where('userId', $uid)->limit(5)->get('used_ques');
		//updated =convert(varchar(10), getdate(), 102);
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		}    
	 }

	 public function getuserDash($uid){

		$data = $this->db->where('id', $uid)->get('user');
		//updated =convert(varchar(10), getdate(), 102);
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		}    

	 }

	 public function getloginDash($uid){

		$data = $this->db->where('userId', $uid)->get('logins');
		//updated =convert(varchar(10), getdate(), 102);
		if ($data->num_rows() > 0) {
			return $data->result();
		} else {
			return false;
		}    

	 }

}