<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerPoli extends CI_Controller {

	public function index()
	{	
		$this->load->view('template/v_header');
		$this->load->view('template/v_sidebar');
		$this->load->view('v_poli');
		$this->load->view('template/v_footer');	 
	}
}