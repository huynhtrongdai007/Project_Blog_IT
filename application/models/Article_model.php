<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model  {

	public function getAllArticles($param = array())
	{
		if (isset($param['offset']) && isset($param['limit'])) {
			$this->db->limit($param['offset'],$param['limit']);
		}

		if (isset($param['q'])) {
			$this->db->or_like('title',$param['q']);
			$this->db->or_like('author',$param['q']);
		}
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbl_articles')->result_array();
		return $result;
	}

	public function getArticlesCount($param = array())
	{
		// if (isset($param['offset']) && isset($param['limit'])) {
		// 	$this->db->limit($param['offset'],$param['limit']);
		// 	
		// }

		if (isset($param['q'])) {
			$this->db->or_like('title',$param['q']);
			$this->db->or_like('author',$param['q']);
		}

		if (isset($param['category_id'])) {
			$this->db->where('category',$param['category_id']);
		}

		$count = $this->db->count_all_results('tbl_articles');
		return $count;
	}

	public function getById($id)
	{
		$this->db->select('tbl_articles.*,tbl_categorys.name as category_name');
		$this->db->where('tbl_articles.id',$id);
		$this->db->join('tbl_categorys','tbl_categorys.id=tbl_articles.category','left');
		$query =  $this->db->get('tbl_articles');
	    $result =  $query->row_array();
	    return $result;
	}

	public function create($formArray)
	{
		$this->db->insert('tbl_articles',$formArray);
		return $this->db->insert_id();
	}

	public function update($id,$formArray)
	{
		$this->db->where('id',$id);
		$this->db->update('tbl_articles',$formArray);
	}

	public function deleteArticle($id)
	{	
		$this->db->where('id',$id);
		$this->db->delete('tbl_articles');
	}


	// Front Mothod 

	public function getAllArticlesFront($param = array())
	{
		if (isset($param['offset']) && isset($param['limit'])) {
			$this->db->limit($param['offset'],$param['limit']);
		}

		if (isset($param['q'])) {
			$this->db->or_like('title',$param['q']);
			$this->db->or_like('author',$param['q']);
		}

		if (isset($param['category_id'])) {
			$this->db->where('category',$param['category_id']);
		}
		$this->db->select('tbl_articles.*,tbl_categorys.name as category_name');
		$this->db->order_by('tbl_articles.created_at','DESC');
		$this->db->where('tbl_articles.status',1);
		$this->db->join('tbl_categorys','tbl_categorys.id = tbl_articles.category','left');
		$query = $this->db->get('tbl_articles');

		$articles = $query->result_array();

		return $articles;
	}

}
