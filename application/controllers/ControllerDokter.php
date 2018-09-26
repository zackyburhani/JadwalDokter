<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerDokter extends CI_Controller {

	public function index()
	{	
		$this->load->view('template/v_header');
		$this->load->view('template/v_sidebar');
		$this->load->view('v_dokter');
		$this->load->view('template/v_footer');	 
	}
}