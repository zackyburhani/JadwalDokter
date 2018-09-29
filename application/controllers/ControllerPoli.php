<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerPoli extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MPoli');
	}

	//halaman awal poli
	public function index()
	{	
		$getAllpoli = $this->MPoli->getAllpoli();
		$data = [
			'getAllpoli' => $getAllpoli
		];
		
		$this->load->view('template/v_header');
		$this->load->view('template/v_sidebar');
		$this->load->view('v_poli');
		$this->load->view('template/v_footer');	 
	}
	
	//tambah poli
	public function tambahpoli()
	{
		$id_poli	 		= $this->input->post('id_poli');
		$nm_poli 			= $this->input->post('nm_poli');
				
		$data = [
			'id_poli'				=> $id_poli,
			'nm_poli' 				=> $nm_poli						
		];

		$result = $this->MPoli->tambahpoli($data);

		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('poli');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('poli');
		}
	}
	
	//update poli
	public function updatepoli()
	{
		$id_poli	 		= $this->input->post('id_poli');
		$nm_poli 			= $this->input->post('nm_poli');
				
		$data = [
			'id_poli'				=> $id_poli,
			'nm_poli' 				=> $nm_poli						
		];

		$result = $this->MPoli->updatepoli($data);

		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Diubah');
	   		redirect('poli');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('poli');
		}
	}
	
	//menghapus poli
	public function deletepoli()
	{
		$id_poli = $this->input->post('poli');
		$validasi = $this->MGuru->validasiHapus('id_poli',$id_poli);

		if($validasi->id_poli == $id_poli){
			$this->session->set_flashdata('pesanGagal','Data poli Terhubung Dengan Data Lain');
	   		redirect('poli');
		} else {
			$result = $this->MPoli->Deletepoli($id_poli);
			if ($result){
				$this->session->set_flashdata('pesan','Data Berhasil Dihapus');
		   		redirect('poli');
			}else{
				$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Dihapus');
	    		redirect('poli');
			}
		}
	}
}