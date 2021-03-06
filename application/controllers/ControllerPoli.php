<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerPoli extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['Model']);
		$username = $this->session->username;

		if($username == null){
			redirect('login');
		}
	}

	//halaman awal poli
	public function index()
	{	
		$getAllpoli = $this->Model->getAll('poli');
		$data = [
			'id_poli' => $this->Model->getKodePoli(),
			'getAllpoli' => $getAllpoli
		];
		$this->load->view('template/v_header');
		$this->load->view('template/v_sidebar');
		$this->load->view('v_poli',$data);
		$this->load->view('template/v_footer');	 
	}
	
	//tambah poli
	public function simpan()
	{
		$id_poli = $this->input->post('id_poli');
		$nm_poli = $this->input->post('nm_poli');
				
		$data = [
			'id_poli' => $id_poli,
			'nm_poli' => $nm_poli						
		];

		$result = $this->Model->simpan('poli',$data);

		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('poli');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('poli');
		}
	}
	
	//update poli
	public function ubah()
	{
		$id_poli = $this->input->post('id_poli');
		$nm_poli = $this->input->post('nm_poli');
		
		$data = [
			'nm_poli' => $nm_poli		
		];

		$result = $this->Model->update('id_poli',$id_poli,$data,'poli');

		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Diubah');
	   		redirect('poli');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('poli');
		}
	}
	
	//menghapus poli
	public function hapus($id)
	{
		$result = $this->Model->hapus('id_poli',$id,'poli');
		if ($result){
		   	redirect('poli');
		}else{
			$this->session->set_flashdata('pesanGagal','Poli Tidak Berhasil Dihapus');
	   		redirect('poli');
		}
	}
}