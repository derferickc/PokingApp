<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
		// $this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->library('form_validation');
		$this->load->view('index');
	}

	public function register()
	{
		$this->user->register($this->input->post());
		redirect('/');
	}
	
	public function login()
	{
		$this->user->login($this->input->post());
		$user = $this->user->login($this->input->post());
		if($user)
		{
			$this->session->set_userdata('userinfo', $user);
			redirect('/pokes');
		}
		else{
			$this->session->set_flashdata("login_errors", "Invalid email or password");
			redirect('/');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('/'));
	}
}