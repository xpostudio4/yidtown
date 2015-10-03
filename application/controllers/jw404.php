<?php 
class Jw404 extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct(); 
    } 

    public function index() 
    { 

		//$this->load->view('404/header404');
		//$this->output->set_status_header('404');
       // $this->output->set_status_header('404'); 
// $data['content'] = 'error_404'; // View name 
		$data='There is seems to be nothing!!';
        $this->load->view('404/404',array('data'=>$data));//loading in my template 
		$this->load->view('footer');	
    } 
} 
?> 