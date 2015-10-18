<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search extends CI_Controller{

	function __construct(){

		  parent::__construct();
		  $this->load->model('citymod');
		  $this->load->library("session");
		  $this->load->helper('form');
		  $this->load->database();

	}

	public function index(){
    $search_string = $this->input->post('search');

		$this->load->library("session");
		$this->load->helper('form');
		$this->load->database();
		$this->load->view('header');
		$this->load->view('search');
		$this->load->view('footer');

  }
}
