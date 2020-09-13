<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller
{
	// day la phuong thuc show page blog
	public function index($page = 1) {

		$this->load->model('Article_model');
		$this->load->helper('text');
		$this->load->library('pagination');

		$parpege = 5;
		$param['offset'] = $parpege;
		$param['limit']  = ($page * $parpege) - $parpege;

		$config['base_url'] = base_url('blog/index');
		$config['total_rows'] = $this->Article_model->getArticlesCount();
			
		$config['per_page'] = $parpege;
		$config['use_page_numbers'] = true;

		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';

		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = "</ul>";
		$config['num_tag_open'] = "<li class='page-item'>";
		$config['num_tag_close'] = "</li>";
		$config['cur_tag_open'] = "<li class='disabled page-item'><li class='active page-item'><a heft='#' class='page-link' > ";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li class=\"page-item\">";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li class=\"page-item\">"; 
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li class=\"page-item\">";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li class=\"page-item\">";
		$config['last_tagl_close'] = "</li>";
		$config['attributes'] = array('class' => 'page-link');
		$this->pagination->initialize($config);
		$pagination_links = $this->pagination->create_links();
		$article = $this->Article_model->getAllArticlesFront($param);
		$data['article'] = $article;
		$data['pagination_links']=$pagination_links; 
		$this->load->view('front/blog',$data);
	}

	function categorys() {
		$this->load->model('category_model');
		$categorys = $this->category_model->getAllCategorysFront();	
		$data['categorys'] = $categorys;
		$this->load->view('front/categorys',$data);
	}


	function detail($id) {
		$this->load->model('Article_model');
		$this->load->model('Comment_Model');
		$this->load->library('form_validation');

		$article = $this->Article_model->getById($id);
		if (empty($article)) {
			redirect(base_url('blog'));
		}

		$data['article'] = $article;
		$comments = $this->Comment_Model->getComents($id,true);
		$data['comments'] = $comments;
		$this->form_validation->set_rules('name','Name','required|min_length[5]');
		$this->form_validation->set_rules('comment','Comment','required|min_length[20]');
		$this->form_validation->set_error_delimiters('<p class="mb-0">','</p>');
		if ($this->form_validation->run()) {
			//insert comment
			$formArray = [];
			$formArray['name'] = $this->input->post('name');
			$formArray['comment'] = $this->input->post('comment');
			$formArray['article_id'] = $id;
			$formArray['created_at'] = date('Y-m-d H:i:s');

			$this->Comment_Model->create($formArray);
			$this->session->set_flashdata('message','Your comment has been posterd successFully.');
			redirect(base_url('blog/detail/',$id));
		} else {
			$this->load->view('front/detail',$data);
		}
	}

	function category($category_id,$page=1) {

		$this->load->model('category_model');
		$this->load->model('Article_model');
		$this->load->helper('text');
		$this->load->library('pagination');

		$category = $this->category_model->getById($category_id);
		if (empty($category)) {
		 	redirect(base_url('blog'));
		}
		$parpege = 5;
		$param['offset'] = $parpege;
		$param['limit']  = ($page * $parpege) - $parpege;
		$param['category_id'] = $category_id;

		$config['base_url'] = base_url('blog/category/'.$category_id);
		$config['total_rows'] = $this->Article_model->getArticlesCount($param);
		$config['uri_segment'] = 4;
		$config['per_page'] = $parpege;
		$config['use_page_numbers'] = true;

		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';

		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = "</ul>";
		$config['num_tag_open'] = "<li class='page-item'>";
		$config['num_tag_close'] = "</li>";
		$config['cur_tag_open'] = "<li class='disabled page-item'><li class='active page-item'><a heft='#' class='page-link' > ";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li class=\"page-item\">";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li class=\"page-item\">"; 
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li class=\"page-item\">";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li class=\"page-item\">";
		$config['last_tagl_close'] = "</li>";
		$config['attributes'] = array('class' => 'page-link');
		$this->pagination->initialize($config);
		$pagination_links = $this->pagination->create_links();
		$article = $this->Article_model->getAllArticlesFront($param);
		$data['article'] = $article;
		$data['pagination_links']=$pagination_links; 
		$data['category'] = $category;
		$this->load->view('front/category_articles',$data);
	}
}
