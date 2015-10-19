<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search extends CI_Controller{

	function __construct(){

		  parent::__construct();
		  $this->load->model('citymod');
		  $this->load->library("session");
		  $this->load->helper('form');
      $this->load->database();
      $this->load->library('allencode');

	}

	public function index(){
    $keyword = $this->input->post('search');


    $this->load->library("session");
    $this->load->library('allencode');
		$this->load->helper('form');
    $this->load->database();
    $this->load->model('forum_module');
    $this->load->model('postmod');

    if($keyword == ""){

      $data = array(
        'keyword' => FALSE,
        'forums' => FALSE,
        'jobs' => FALSE,
        'housing' => FALSE,
        'events' => FALSE
      );

    }else{

      $data = array(
        'keyword' => $keyword,
        'forums' => $this->forum_module->search_forums($keyword),
        'jobs' => $this->postmod->search_jobs($keyword),
        'housing' => $this->postmod->search_housing($keyword),
        'events' => $this->postmod->search_events($keyword)
      );
    }

		$this->load->view('header');
		$this->load->view('search', $data);
		$this->load->view('footer');

  }
}
