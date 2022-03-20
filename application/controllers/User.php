<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{



    function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('encryption');
	
		//$this->load->helper('message');
    }
    


    public function index(){
        $this->load->view('home/userheader');
        $this->load->view('home/home');
        $this->load->view('home/footer');
        $this->load->view('home/scripts');
    }

    public function aboutus(){
        $this->load->view('home/userheader');
        $this->load->view('home/aboutus');
        $this->load->view('home/footer');
        $this->load->view('home/scripts');
    }

    public function contactus(){
        $this->load->view('home/userheader');
        $this->load->view('home/contactus');
        $this->load->view('home/footer');
        $this->load->view('home/scripts');
    }

    public function user_create(){
        date_default_timezone_set("Asia/Kolkata");
        $currentTime = date('y-m-d');
    
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('number', 'number', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
    
    
    
        if ($this->form_validation->run()) {
      $password=$this->input->post('password');
            $encPassword = $this->encryption->encrypt($password);
    
            $userdata = array(
                'name' => $this->input->post('name'),
                'email' =>  $this->input->post('email'),
                'number' =>  $this->input->post('number'),
                'status' => '1',
                'createdAt' => $currentTime
            );
    
                     $userId=$this->UserModel->saveuserdata($userdata);
                     if($userId){


                        $logindata = array(
                            'userId' => $userId,
                            'userName' =>  $this->input->post('email'),
                            'password' =>$encPassword  ,
                            'userType'=>'user'
                        );
    
    
            if ($this->UserModel->savelogindata($logindata)) {
    
                $response = array('status' => 'true', 'msg' => 'Account created ');
                $this->session->set_flashdata('savemenu', $response);
                return redirect('auth/user');
            } else {
    
                $response = array('status' => 'false', 'msg' => 'Account Not created  ');
                $this->session->set_flashdata('savemenu', $response);
                return redirect('admin/viewInstitute');
            }
    
        }else{
    
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
    
    
   
    //  =======================================course

    public function view_course(){
        

       // $uid = $this->session->userdata('userSession')['id'];
        $course['details'] = $this->UserModel->getallCourse();
       
        $this->load->view('home/userheader');
        $this->load->view('home/courseview',$course);
        $this->load->view('home/footer');
        $this->load->view('home/scripts');


    }


    public function view_wallet(){
        

        $uid = $this->session->userdata('userSession')['id'];
         $wallet['amount'] = $this->UserModel->getamount($uid);
        
        
         $wallet['menu'] = $this->UserModel->getTransaction($uid);
        // print_r($wallet['amount']);
        // exit;
         $this->load->view('home/userheader');
         $this->load->view('home/userwallet',$wallet);
         $this->load->view('home/footer');
         $this->load->view('home/scripts');
 
 
     }
    

     public function view_quiz(){
        
        $title = $this->uri->segment(3);
        $uid = $this->session->userdata('userSession')['id'];

         $quiz['name'] = $this->UserModel->getcategory();
      
       
         $this->load->view('home/userheader');
         $this->load->view('home/quiz',$quiz);
         $this->load->view('home/footer');
         $this->load->view('home/scripts');
 
 
     }

     
     public function view_test(){
        
        $title = $this->uri->segment(3);
        $uid = $this->session->userdata('userSession')['id'];

         $quiz['question'] = $this->UserModel->getquiz( $title,$uid);
      
       
         $this->load->view('home/userheader');
         $this->load->view('home/test',$quiz);
         $this->load->view('home/footer');
         $this->load->view('home/scripts');
 
 
     }


     public function save_test(){
        $uid = $this->session->userdata('userSession')['id'];

        $coin= null;
        $marks = 0;
        $que = 0;
        $no = 1;
        $ans=$this->input->post('ans'.$no);
        $qId=$this->input->post('quesid');
        $questionId=$qId[$que];
        $num = count($qId);
       
    while ($no<=$num)
        {
            if ($ans)
            {
                $check=$this->UserModel->checkTest($questionId,$ans);
               
                
                if ($check)
                {
                $coin+=$check['0']->Q_coin;
                }else
                {
                    
                    $coin-=15;
                     }

                     $quizdata = array(
                        'userId' => $uid,
                        'quesId' =>  $questionId,
        
                        'sel_ans' =>  $ans
                    );

                     $this->UserModel->saveTest($quizdata);
                 
            }
            $no++;
            $que++; 
        }

        
$totalcoin=null;
$transct = random_int(0, 9999999);
$transct = str_pad($transct, 6, 0, STR_PAD_LEFT);



$tcoin=  $this->UserModel->getWallet($uid);


if ($tcoin)
{
	$totalcoin=$tcoin['0']->amount+$coin;
	$getcoins= $this->UserModel->updateWallet($uid,$totalcoin);
	
	if (!$getcoins==null)
	{

        $tradata = array(
            'userId' => $uid,
            'transactionId' =>  $questionId,
              'transactionType'=>'credit',
              'transactionFromTo'=>'Quiz',
              'amount'=>$tcoin['0']->amount
        );
        $this->UserModel->saveTrans($tradata);
}

return redirect('user/view_wallet');
}
else
{

    $walldata = array(
        'userId' => $uid,
        'amount' =>  $coin
    );
    $this->UserModel->insertWallet($walldata);

    $tradata = array(
        'userId' => $uid,
        'transactionId' =>  $questionId,
          'transactionType'=>'credit',
          'transactionFromTo'=>'Quiz',
          'amount'=>$tcoin['amount']
    );
    $this->UserModel->saveTrans($tradata);

    return redirect('user/view_wallet');


}




     }

     //check coin in the wallet to purchase the course

     public function check_coin(){

        $data = $this->input->post();
        
        $uid = $this->session->userdata('userSession')['id'];
        $tcoin=  $this->UserModel->getWallet($uid);

        if($tcoin['0']->amount>$data['fee'])
				{
                $response = array("status" => "true","data"=>"null","message"=>"Message sent succesfully");
                echo json_encode($response);

				}
				else
				{
				    $response = array("status" => "false","data"=>"null","message"=>"Message sent failed2");
                    echo json_encode($response);
				}

     }



     public function  deduct_coin(){

        $amount = $this->uri->segment(3);
        $uid = $this->session->userdata('userSession')['id']; 
        $tcoin=  $this->UserModel->getWallet($uid);
        $totalcoin=$tcoin['0']->amount-$amount;
          $getstatus= $this->UserModel->updateWallet($uid,$totalcoin);


          $transct = random_int(0, 9999999);
           $tradata = array(
        'userId' => $uid,
        'transactionId' =>   $transct,
          'transactionType'=>'Debit',
          'transactionFromTo'=>'Course',
          'amount'=> $amount
    );
    $this->UserModel->saveTrans($tradata);

        //   $getstatus= $this->UserModel->updatePurchase($uid,);
          if($this->UserModel->saveTrans($tradata)){
            $response = array('status' => 'true', 'msg' => 'course is added');
            $this->session->set_flashdata('savemenu', $response);
            return redirect('user/view_course');
          }else{
            $response = array('status' => 'flase', 'msg' => 'course is not  added');
            $this->session->set_flashdata('savemenu', $response);

            return redirect('user/view_wallet');
          }
     }



// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++==
// Talk to mentors
   public function view_mentors(){
        

    $teacher['details'] = $this->UserModel->getallteacher();
    
    
    $this->load->view('home/userheader');
    $this->load->view('home/chat',$teacher);
    $this->load->view('home/footer');
    $this->load->view('home/scripts');
    

 }

//  public function view_login(){
        

//     // $uid = $this->session->userdata('userSession')['id'];
//     // $course['details'] = $this->UserModel->getallCourse();
    
//     $this->load->view('home/chat/header');
//      $this->load->view('home/chat/login');
    


//  }


 public function view_mycourse(){
        

   
    $this->load->view('home/userheader');
    $this->load->view('home/mycourse');
    $this->load->view('home/footer');
    $this->load->view('home/scripts');
    


 }


 public function search_teacher()
 {
    $data = $this->input->post(); 
   $variable=$data['search_query'];
  
    $teacher['search'] = $this->UserModel->getSearchteacher($variable);
   
    if($teacher['search'])
    {
    $response = array("status" => "true","data"=>"null","message"=>"Message sent succesfully");
    echo json_encode($response);

    }
    else
    {
        $response = array("status" => "false","data"=>"null","message"=>"Message sent failed2");
        echo json_encode($response);
    }



 }

//  forgot password

public function forgot_password(){
    $email = $this->input->post('email'); 
    $chkemail = $this->UserModel->checkEmail($email);
    if($chkemail){
        $otp=rand ( 10000,99999);
        $updateEmail = $this->UserModel->updateOtp($email,$otp);

        if($updateEmail ){

            header("Location:../PHPMailer-master/index.php?email=$email&otp=$otp");  
            
        }
    }
}


public function verifypassword(){
    $email['mail'] = $this->input->get('email'); 
   
    $this->load->view('home/otpverify',$email);

}

public function verifyotp(){
    $email = $this->input->post('email'); 
    $data['mail']=$email;
    $otp = $this->input->post('otp'); 
    $chkotp = $this->UserModel->checkOtp($email,$otp);
if($chkotp=='true'){
    $this->load->view('home/changepassword',$data);

    // redirect(base_url('user/newpassword/'.$email), 'refresh');
    //  return redirect('user/newpassword/');
 
}
}

public function newpassword(){
    $email= $this->uri->segment(3);
    echo  $email;
   
    
    
   
    $this->load->view('home/changepassword',$email);


}

public function change_password(){
    $email = $this->input->get('email'); 
    $new=$this->input->get('new'); 
    $old=$this->input->get('old'); 
    if($new==$old){
        $encPassword = $this->encryption->encrypt($new);
        $updatePassword = $this->UserModel->updatePasssword($email,$encPassword);

        if($updatePassword=='true'){
            return redirect('auth/user');
        }
    }
    


   

}

public function view_myhistory(){
    $uid = $this->session->userdata('userSession')['id'];
    $data['menu']=$this->UserModel->getQuizHistory($uid);
   
    $this->load->view('home/userheader');
    $this->load->view('home/myhistory',$data);
    $this->load->view('home/footer');
    $this->load->view('home/scripts');
}


public function view_dashboard(){
    $uid = $this->session->userdata('userSession')['id'];
     $data['user']=$this->UserModel->getuserDash($uid);
     $data['logins']=$this->UserModel->getloginDash($uid);
    
$pass= $data['logins'][0]->password;
$data['username']=$data['logins'][0]->userName;
$data['pass']=$encPassword = $this->encryption->decrypt($pass);


   
    $this->load->view('home/userheader');
    $this->load->view('home/mydashboard',$data);
    $this->load->view('home/footer');
    $this->load->view('home/scripts');
}
















    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
