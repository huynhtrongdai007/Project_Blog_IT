<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {
	
public function __construct()
	{
		parent::__construct();
		$admin = $this->session->userdata('admin');
		if (empty($admin)) {
			$this->session->set_flashdata('msg','Your session has been exprired');
			redirect(base_url().'admin/login/index');
		}
	}
	// this method will show acticles listing page
	public function index($page = 1) 
	{
		$parpege = 5;
		$param['offset'] = $parpege;
		$param['limit']  = ($page * $parpege) - $parpege;
		$param['q'] = $this->input->get('q');

		$this->load->model('Article_model');
		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/article/index');
		$config['total_rows'] = $this->Article_model->getArticlesCount($param);
		
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
		$articles =  $this->Article_model->getAllArticles($param);

		$data['q'] = $this->input->get('q');
		$data['articles'] =$articles;
		$data['pagination_links'] = $pagination_links;
		$data['mainModule'] = 'article';
		$data['subModule'] = 'viewArticle';
		$this->load->view('admin/article/list',$data);
	}	 
	// day la phuong thuc tao acticle
	public function create() 
	{
		$this->load->model('Category_model');
		$this->load->model('Article_model');
		$this->load->helper('common_helper');
		$data['mainModule'] = 'article';
		$data['subModule'] = 'createArticle';
		$data['category'] = $this->Category_model->getAllCategorys();
		// file upload settings
		$config['upload_path']          = './public/uploads/articles/';
	    $config['allowed_types']        = 'gif|jpg|png';
	    $config['encrypt_name']         = true;

	    $this->load->library('upload', $config);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules('category_id','Category','required');
		$this->form_validation->set_rules('title','Title','required|min_length[5]');
		$this->form_validation->set_rules('author','Author','required');

		if ($this->form_validation->run() == TRUE) {
			//from validated seccess and we can proceed

			if (!empty($_FILES['image']['name'])) {
					//save image
				if ($this->upload->do_upload('image')) {
					// upload image here success
					$data = $this->upload->data();
					resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb_front/'.$data['file_name'],1120,800);	
					resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb_admin/'.$data['file_name'],300,250);

						$formArray['image'] = $data['file_name'];
						$formArray['title'] = $this->input->post('title');
						$formArray['category'] = $this->input->post('category_id');
						$formArray['description'] = $this->input->post('description');
						$formArray['author'] = $this->input->post('author');
						$formArray['status'] = $this->input->post('status');
						$formArray['created_at'] = date('Y-m-d H:i:s');
						$this->Article_model->create($formArray);
						$this->session->set_flashdata('success','Article added SuccessFully');

						redirect(base_url().'admin/article/index');

						} else {
							// image select some errors
							$errors = $this->upload->display_errors('<p class="invalid-feedback">','</p>');
							$data['imageError'] = $errors;
							$this->load->view('admin/article/create',$data);
						}
				}
				 else 
				 {
						$formArray['title'] = $this->input->post('title');
						$formArray['category'] = $this->input->post('category_id');
						$formArray['description'] = $this->input->post('description');
						$formArray['author'] = $this->input->post('author');
						$formArray['status'] = $this->input->post('status');
						$formArray['created_at'] = date('Y-m-d H:i:s');
						$this->Article_model->create($formArray);
						$this->session->set_flashdata('success','Article added SuccessFully');
						redirect(base_url().'admin/article/index');
				}

		} else {
			$this->load->view('admin/article/create',$data);
		}
	}


	// day la phuong thuc show edit acticle page
	public function edit($id) 
	{	
		$this->load->library('form_validation');
		$this->load->model('Article_model');
		$this->load->model('Category_model');
		$this->load->helper('common_helper');
		
		$article = $this->Article_model->getById($id);

		if (empty($article)) {
			$this->session->set_flashdata('error','Article not found');
			redirect(base_url('admin/article/index'));
		}

		$categorys = $this->Category_model->getAllCategorys();
		$data['categorys'] = $categorys;
		$data['article'] = $article;


		// file upload settings
		$config['upload_path']          = './public/uploads/articles/';
	    $config['allowed_types']        = 'gif|jpg|png';
	    $config['encrypt_name']         = true;

	    $this->load->library('upload', $config);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
		$this->form_validation->set_rules('category_id','Category','required');
		$this->form_validation->set_rules('title','Title','required|min_length[5]');
		$this->form_validation->set_rules('author','Author','required');

		if ($this->form_validation->run() == TRUE) {
			//from validated seccess and we can proceed

			if (!empty($_FILES['image']['name'])) {
					//save image
				if ($this->upload->do_upload('image')) {
					// upload image here success
					$data = $this->upload->data();

					  	$path = './public/uploads/articles/thumb_admin/'.$article['image'];
						  if ($article['image'] != "" && file_exists($path)) {
						  	unlink($path); // this method will remove old image in thumb_admin foder
						  }

					    $path = './public/uploads/articles/thumb_front/'.$article['image'];
						  if ($article['image'] != "" && file_exists($path)) {
						  	unlink($path); // this method will remove old image in thumb_front foder
						  }


   				    	$path = './public/uploads/articles/'.$article['image'];
						  if ($article['image'] != "" && file_exists($path)) {
						  	unlink($path); // this method will remove old image in foder
						  }

					resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb_front/'.$data['file_name'],1120,800);	
					resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb_admin/'.$data['file_name'],300,250);

						$formArray['image'] = $data['file_name'];
						$formArray['title'] = $this->input->post('title');
						$formArray['category'] = $this->input->post('category_id');
						$formArray['description'] = $this->input->post('description');
						$formArray['author'] = $this->input->post('author');
						$formArray['status'] = $this->input->post('status');
						$formArray['updated_at'] = date('Y-m-d H:i:s');
						$this->Article_model->update($id,$formArray);
						$this->session->set_flashdata('success','Article updated SuccessFully');

						redirect(base_url().'admin/article/index');

						} else {
							// image select some errors
							$errors = $this->upload->display_errors('<p class="invalid-feedback">','</p>');
							$data['imageError'] = $errors;
							$this->load->view('admin/article/edit',$data);
						}
				}
				 else 
				 {
						$formArray['title'] = $this->input->post('title');
						$formArray['category'] = $this->input->post('category_id');
						$formArray['description'] = $this->input->post('description');
						$formArray['author'] = $this->input->post('author');
						$formArray['status'] = $this->input->post('status');
						$formArray['updated_at'] = date('Y-m-d H:i:s');
						$this->Article_model->update($id,$formArray); 
						$this->session->set_flashdata('success','Article updated SuccessFully');
						redirect(base_url().'admin/article/index');
				}

		} else {
					
		$this->load->view('admin/article/edit',$data);
		}

	}
	// day la phuong thuc show acticle page
	public function delete($id) 
	{	
		$this->load->model('Article_model');
		$article = $this->Article_model->getById($id);
		if (empty($article)) {
			$this->session->set_flashdata('error','Article not found');
			redirect(base_url('admin/acticle/index'));
		}
			$path = './public/uploads/articles/thumb_admin/'.$article['image'];
						  if ($article['image'] != "" && file_exists($path)) {
						  	unlink($path); // this method will remove old image in thumb_admin foder
						  }

					    $path = './public/uploads/articles/thumb_front/'.$article['image'];
						  if ($article['image'] != "" && file_exists($path)) {
						  	unlink($path); // this method will remove old image in thumb_front foder
						  }


   				    	$path = './public/uploads/articles/'.$article['image'];
						  if ($article['image'] != "" && file_exists($path)) {
						  	unlink($path); // this method will remove old image in foder
						  }

		$this->Article_model->deleteArticle($id); // this will delete article
		$this->session->set_flashdata('success','Deleted Article SuccessFully');
						redirect(base_url().'admin/article/index');
	}

}