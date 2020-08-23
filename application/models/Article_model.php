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
		if (isset($param['offset']) && isset($param['limit'])) {
			$this->db->limit($param['offset'],$param['limit']);
		}

		if (isset($param['q'])) {
			$this->db->or_like('title',$param['q']);
			$this->db->or_like('author',$param['q']);
		}

		$count = $this->db->count_all_results('tbl_articles');
		return $count;
	}

	public function getById($id)
	{
		$this->db->where('id',$id);
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
}
