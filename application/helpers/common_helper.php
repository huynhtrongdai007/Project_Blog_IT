<?php 

function resizeImage($soure_path,$new_path,$with,$height)
{

	$CI =& get_instance(); 
	$config['image_library'] = 'gd2';
	$config['source_image'] = $soure_path;
	$config['new_image'] = $new_path;
	$config['create_thumb'] = TRUE;
	$config['maintain_ratio'] = TRUE;
	$config['width']         = $with;
	$config['height']       = $height;
	$config['thumb_marker'] = '';
	
	$CI->load->library('image_lib', $config);
	$CI->image_lib->initialize($config);
	$CI->image_lib->resize();
	$CI->image_lib->clear();
}