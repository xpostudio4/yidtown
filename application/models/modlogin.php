<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Modlogin extends CI_Model{
	
	  function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->library("session");
       }
	
	function check_email($the_mail){
		$this->db->select('email');
        $this->db->from('login');
        $this->db->where('email', $the_mail );
		$query = $this->db->get();
        if ( $query->num_rows() > 0 ){ return 'exists';}else{ return 'notexists';}
		
	}
	function insert_login($datanew){
		 $this->db->insert('login', $datanew);  
		 return $this->db->insert_id();
	}
	function active_mod_email($user_id,$key){
		$query = $this->db->query("SELECT * FROM `login` WHERE `id`='".$user_id."' AND `active_key`='".$key."'");
		//echo $this->db->last_query();
		if($query->num_rows()==0){
			return false;
		}else{
			$query = $this->db->query("UPDATE `login` SET  `active_key`='', `other`='1' WHERE `id`='".$user_id."' AND `active_key`='".$key."'");
		//echo $this->db->last_query();
			return true;
		}
	}
	
	function check_username($username){
		$this->db->select('*');
		$this->db->where('username',$username); 
		$query =$this->db->get('login');
		$data = $query->num_rows();
		return $data;
	}
	
	function fetch_username($userid){
		$this->db->select('username');
		$this->db->where('id',$userid);
		$query =$this->db->get('login');
		//echo $this->db->last_query();
		$data = $query->result_array();
		return $data;
	}
	
	function check_oldpassword($pwd,$user_id){
		$this->db->select('*');
		$this->db->where('password',$pwd); 
		$this->db->where('id',$user_id); 
		$query =$this->db->get('login');
		//echo $this->db->last_query();
		$data = $query->num_rows();
		return $data;		
	}
	function update_newpassword($data,$id){
		$this->db->where('id',$id);
		$this->db->update('login',$data); 
	}
	
	function insert_password($logindata){
		$query = $this->db->query("UPDATE `login` SET  `password`='".md5($logindata['password'])."',`username`='".$logindata['username']."' WHERE `id`='".$logindata['id']."'");
		return true;
	}
	function try_to_login($logindata){
		$query = $this->db->query("SELECT * FROM `login` WHERE `email`='".$logindata['email']."' AND `active_key`='' AND `other`='1' ");
		if($query->num_rows()==0){
				$query = $this->db->query("SELECT * FROM `login` WHERE `email`='".$logindata['email']."' AND `active_key`!=''");
				if($query->num_rows()==1){
					return 'not_active_yet';
				}else{
					return 'not_exists';
				}
		}else{
				$query = $this->db->query("SELECT * FROM `login` WHERE `email`='".$logindata['email']."' AND `active_key`='' AND `other`='1' AND `password`='".md5($logindata['password'])."'");
				if($query->num_rows()==1){
					$data = $query->result_array();
					$this->session->set_userdata( 'logged_in',array(
                            'user_id'       => $data[0]['id'],
                            'email'      => $data[0]['email'],
                            'username'      => $data[0]['username'],
                    ));
					$user_log=$this->session->userdata('logged_in');

					 //print_r($this->session->userdata('logged_in'));
				return 'access_to_login';	

				}else{
					return 'pwd_not_exists';
				}
		}
	}
	
	function reset_email($logindata){
		$query = $this->db->query("SELECT * FROM `login` WHERE `email`='".$logindata['email']."'  AND `active_key`='' AND `other`='1'");
		if($query->num_rows()==0){
			return 'mail_not_exists';
		}else{
			$query = $this->db->query("UPDATE `login` SET  `password`='".md5($logindata['password'])."' WHERE `email`='".$logindata['email']."'");
			return 'pwd_reset';
		}
	}
		
}

?>