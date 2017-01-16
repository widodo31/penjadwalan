<?php

function paginate($base_url, $total_rows, $per_page, $uri_segment)
{
	$config = array(
			"base_url"  	=> $base_url,
			"total_rows" 	=> $total_rows,
			"per_page"		=> $per_page,
			"uri_segment"	=> $uri_segment 
		);

	$config['anchor_class'] = "class='page_numbers'";

	$config['first_link'] = 'First';
	$config['first_tag_open'] = '<li>';
	$config['first_tag_close'] = '</li>';

	$config['last_link'] = 'Last';
	$config['last_tag_open'] = '<li>';
	$config['last_tag_close'] = '</li>';

	$config['next_link'] = 'Next';
	$config['next_tag_open'] = '<li>';
	$config['next_tag_close'] = '</li>';

	$config['prev_link'] = 'Prev';
	$config['prev_tag_open'] = '<li>';
	$config['prev_tag_close'] = '</li>';

	$config['cur_tag_open'] = '<li><span class="active">';
	$config['cur_tag_close'] = '</span></li>';

	$config['num_tag_open'] = '<li>';
	$config['num_tag_close'] = '</li>';

	return $config;
}


?>