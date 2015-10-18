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

    $data['keyword'] = $keyword;
    $data['forums'] = $this->forum_module->search_forums($keyword);
    $data['jobs'] = $this->postmod->search_jobs($keyword);
    $data['housing'] = $this->postmod->search_housing($keyword);
    //$data['events'] = $this->postmod->search_events($keyword);

		$this->load->view('header');
		$this->load->view('search', $data);
		$this->load->view('footer');

  }
}
