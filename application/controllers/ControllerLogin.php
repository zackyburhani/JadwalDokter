<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerLogin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model');
	}

	public function index()
	{	
		$username = $this->session->username;
		if($username != null){
			redirect('ControllerDashboard');
		} 
		$this->load->view('v_login');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$checkUsername = $this->Model->auth($username,$password);

		if($checkUsername==NULL){

			echo "<script type='text/javascript'>
               alert ('Maaf Username Dan Password Anda Salah !');
               window.location.replace('');
      			</script>";

		}else{
			$newdata = array(
				'id' => $checkUsername->id,
				'username'  => $checkUsername->username,
				'nm_user'  => $checkUsername->nm_user,
				'email'  => $checkUsername->email,
			  );
			//set seassion
			$this->session->set_userdata($newdata);
			redirect('ControllerDashboard');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('ControllerLogin');
	}
}