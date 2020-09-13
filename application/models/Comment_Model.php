<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Comment_Model extends CI_Model
{
	
	// day la phuong thuc them  comment vao DB

    public function create($formArray)
	{
		$this->db->insert('tbl_comments',$formArray);
	}

	public function getComents($article_id,$status=null) {
		$this->db->where('article_id',$article_id);

		if ($status==true) {
			$this->db->where('status',1);
		}
		$this->db->order_by('created_at','DESC');
		$comments = $this->db->get('tbl_comments')->result_array();
		return $comments;
	}


}