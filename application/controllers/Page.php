<?php

class Page extends CI_Controller {

    function about()
	{
		$this->load->view('front/about');
	}

	public function services() {
		$this->load->view('front/services');
	}

}
?>