<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mains extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('main');
		// $this->output->enable_profiler();
	}

	public function poke_user($id)
	{
		$this->main->poke_user($id);
		redirect('pokes');
	}

	public function pokes()
	{
		$user_info = $this->session->userdata('userinfo');
		$result = $this->main->fetch_all_pokes();
		$this->load->view('pokes', array('user' => $user_info,
										'allpokeinfo' => $result));
	}
}