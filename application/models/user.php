<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function register($post)
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('alias', 'Alias', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|valid_email|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|matches[confirm_password]|required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');	
		$this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
		
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			return false;		
		}
		else
		{
			$query = "INSERT INTO users(name, alias, email, password, dob, created_at, updated_at)
				VALUES(?,?,?,?,?, NOW(), NOW())";
			$values = array($post['name'], $post['alias'], $post['email'], $post['password'], $post['dob']);
			$this->db->query($query, $values);
			$this->session->set_flashdata('success', 'Thanks for registering!');

		}
	}

	public function login($post)
	{	
		$query = "SELECT * FROM users WHERE email =? AND password = ?";
		$values = array($post['email'], $post['password']);
		return $this->db->query($query, $values)->row_array();
	}
}