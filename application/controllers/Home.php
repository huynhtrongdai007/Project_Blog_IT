<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->model('Article_model');
		$this->load->helper('text');
		$param['offset'] = 4;
		$param['limit'] = 0; 
		$articles = $this->Article_model->getAllArticlesFront($param);
		$data['articles'] = $articles;
		
		$this->load->view('front/home',$data);
	}

}