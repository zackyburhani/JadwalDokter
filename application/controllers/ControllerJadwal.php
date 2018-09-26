<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerJadwal extends CI_Controller {

	//halaman dashboard
	public function index()
	{	
		$this->load->view('template/v_header');
		$this->load->view('template/v_sidebar');
		$this->load->view('v_jadwal');
		$this->load->view('template/v_footer');	 
	}
}