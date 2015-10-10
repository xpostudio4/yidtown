<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('citymod');
		$this->load->library("session");
		$this->load->helper('form');
		$this->load->model('businessmod');
		$this->load->model('postmod');
		$this->load->library('allencode');
	}

	function about(){
		$this->load->view('header');
		$this->load->view('miscellaneous/about');
		$this->load->view('footer');
	}

  function contact(){

    if($this->input->server('REQUEST_METHOD') == 'POST'){

      $this->load->library("form_validation");
      $this->form_validation->set_rules('contact_name', 'Full Name', 'required|xss_clean');
      $this->form_validation->set_rules('contact_email', 'Email', 'required|valid_email|xss_clean');
      $this->form_validation->set_rules('contact_message', 'Message', 'required|xss_clean');

      if($this->form_validation->run() == TRUE){

        $data['valid'] = TRUE;
        $this->load->library("email");

        $this->email->to("dimitriyivanos@outlook.com");
        $this->email->from(set_value('contact_email'), set_value('contact_name'));
        $this->email->subject("YidTown Contact Request");
        $this->email->message(set_value("contact_message"));
        $this->email->send();

      }
    }

    if(!isset($data)){
      $data['valid'] = FALSE;
    }

    $this->load->view('header');
		$this->load->view('miscellaneous/contact', $data);
    $this->load->view('footer');

  }

	function privacy(){
		$this->load->view('header');
		$this->load->view('miscellaneous/privacy');
		$this->load->view('footer');
		}

	function terms(){
		$this->load->view('header');
		$this->load->view('miscellaneous/terms');
		$this->load->view('footer');
		}


}
