<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		$this->load->model('citymod');
		$this->load->library('email');
		$this->load->library("session");
		$this->load->helper('form');
		$this->load->database();
		$this->load->model('businessmod');	
		$this->load->library('allencode');
		$this->load->model('modlogin');
		$user_log=$this->session->userdata('logged_in');
		if(isset($user_log['user_id'])){
			redirect('myaccount/logout');
		}
	
       }
	public function index()
	{
		
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	
		
	}
	public function redirect(){
		$this->load->view('header');
		$this->load->view('login3');
		$this->load->view('footer');
	}
	
	function create_account(){
		$this->load->model('modlogin');
		$getmail=$this->modlogin->check_email($this->input->post("emailAddress"));
		if($getmail=='notexists'){
						$datanew = array(
						   'email' =>  $this->input->post("emailAddress"),
						   'active_key' => $this->input->post('key'),
						   'password' => $this->input->post(''),
						   'other' => $this->input->post('') 
						  );
						$use_id=$this->modlogin->insert_login($datanew);
						
						$active_url=JEWISH_URL.'/login/activate_account/'.$use_id.'/'.$this->input->post('key');
						$this->load->view('header');
						$this->load->view('alert',array('alert_type'=>'insert_account','user_email'=>$this->input->post("emailAddress")));
						/*Sending Mail to activate */
					  $this->load->library('email');
					  $email_setting  = array('mailtype'=>'html');
					   $this->email->initialize($email_setting);
								$this->email->from('info@jclassified.com', 'YidTown');
								$this->email->to($this->input->post("emailAddress")); 
								//$this->email->cc('testing.kaushik2@gmail.com'); 
								$this->email->bcc('kaushik@primediart.com'); 
								
								$this->email->subject('Jewish Classified account activation Link');
								$this->email->message("<p>Jewish site activation link, please click below</p><p><a href='".$active_url."' target='_blank'>Click Here</a></p>");	
								
								@$this->email->send();
								
								///echo $this->email->print_debugger();
						/*End of Activate mail code*/
						$this->load->view('footer');
						
		          }else{
			            $this->load->view('header');
						$this->load->view('alert',array('alert_type'=>'have_account'));
						$this->load->view('footer');
		           }
	}
	
	function activate_account(){ 
	$user_id = $this->uri->segment(3);
    $key = $this->uri->segment(4); 
		$this->load->view('header');
		if(!empty($user_id) && !empty($key)){
			$this->load->model('modlogin');
			if($this->modlogin->active_mod_email($user_id,$key)==true){
				$this->load->view('account_activation',array('user_id'=>$user_id));
			}else{
				$this->load->view('alert',array('alert_type'=>'invalid_url'));	
			}
		}else{
		$this->load->view('alert',array('alert_type'=>'invalid_url'));	
		}
		$this->load->view('footer');
	}
	
	function create_password(){
		$this->load->view('header');
		$this->load->model('modlogin');
		$logindata = array(
						   'id' =>  $this->input->post("u_id"),
						   'password' => $this->input->post('rpwd'),
						   'username' => $this->input->post('username'),
						  );
		if($this->modlogin->insert_password($logindata)==true){
			$this->load->view('alert',array('alert_type'=>'pwdset'));	
		}
		$this->load->view('footer');				  
	}
	
	function check_username(){
		
		echo $this->modlogin->check_username($_GET['username']);
	}
	
	/*function change_password(){ 
		$ret=$this->modlogin->check_oldpassword(md5($_GET['old_pwd']),$_GET['u_id']);//echo $ret;
		if($ret>0){
			$data=array('password'=>md5($_GET['rpwd']));
			$this->modlogin->update_newpassword($data,$_GET['u_id']);
			echo 'update';
		}else{
			echo 'not_found';
		}
	}*/
	function change_password(){ 
		 $this->load->view('header');
		$ret=$this->modlogin->check_oldpassword(md5($this->input->post('old_pwd')),$this->input->post('u_id'));//echo $ret;
		if($ret>0){
			$data=array('password'=>md5($this->input->post('rpwd')));
			$this->modlogin->update_newpassword($data,$this->input->post('u_id'));
			echo 'update';
		}else{
			$this->load->view('change_pwd',array('alerm'=>'notmatch'));
		}
		 $this->load->view('footer');
	}
	/*function my_account(){
		$this->load->view('header');
		$this->load->model('modlogin');
		$logindata = array(
						   'email' =>  $this->input->post("inputEmailHandle"),
						   'password' => $this->input->post('inputPassword'),
						  );
		$flag_model=$this->modlogin->try_to_login($logindata);
	    
	
		if($flag_model=='access_to_login'){
			
			$this->load->view('user_profile',array('user_name'=>$this->input->post("inputEmailHandle")));
		}else if($flag_model=='not_active_yet'){
			$this->load->view('login',array('alert'=>'not_active_yet'));
		}else if($flag_model=='not_exists'){
			
				$this->load->view('login',array('alert'=>'not_exists'));
			
		}else if($flag_model=='pwd_not_exists'){
			$this->load->view('login',array('alert'=>'pwd_not_exists'));
		}
		
		$this->load->view('footer');	
	}
	*/
	function reset_password(){
		$this->load->view('header');
		$this->load->model('modlogin');
		function generateRandomStringk($length = 10) {
						$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						$charactersLength = strlen($characters);
						$randomString = '';
						for ($i = 0; $i < $length; $i++) {
							$randomString .= $characters[rand(0, $charactersLength - 1)];
						}
						return $randomString;
					}
		$logindata = array(
						   'email' =>  $this->input->post("inputemaily"),
						   'password' => generateRandomStringk()
						  );
		$flag_model=$this->modlogin->reset_email($logindata);	
		$active_url=JEWISH_URL.'/login/';
		if($flag_model=='pwd_reset'){
							/*===============email==================*/	
		                         $this->load->library('email');
					             $email_setting  = array('mailtype'=>'html');
					             $this->email->initialize($email_setting);
								$this->email->from('info@jclassified.com', 'YidTown');
								$this->email->to($this->input->post("inputemaily")); 
								//$this->email->cc('testing.kaushik2@gmail.com'); 
								$this->email->bcc('kaushik@primediart.com'); 
								
								$this->email->subject('Jewish Classified Password');
								$this->email->message("<p>Jewish site password</p>
								<p>Your New password is : ".$logindata['password']."</p>
								<p><a href='".$active_url."' target='_blank'>Click Here</a></p>");	
								
								@$this->email->send();
								/*===============email==================*/	
			$this->load->view('login',array('alert'=>'pwd_reset'));					
		}else{
			$this->load->view('login',array('alert'=>'mail_not_exists'));
		}
		$this->load->view('footer');					  
	}
	

}

