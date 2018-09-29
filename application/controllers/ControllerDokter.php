<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerDokter extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model');
		$username = $this->session->username;

		if($username == null){
			redirect('login');
		}
	}

	//awal halaman dokter
	public function index()
	{	
		$getAllDokter = $this->Model->joinDokter();
		$getAllpoli   = $this->Model->getAll('poli');
		$getKode = $this->Model->getKodeDokter();
		$data= [
			'getAllDokter' => $getAllDokter,
			'getAllpoli'   => $getAllpoli,
			'getKode' => $getKode
		];
		$this->load->view('template/v_header');
		$this->load->view('template/v_sidebar');
		$this->load->view('v_dokter', $data);
		$this->load->view('template/v_footer');	 
	}
	
	//tambah dokter
	public function simpan()
	{
		$id_dokter = $this->input->post('id_dokter');
		$nm_dokter = $this->input->post('nm_dokter');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$alamat = $this->input->post('alamat');
		$id_poli = $this->input->post('id_poli');
		
		$data = [
			'id_dokter' => $id_dokter,
			'nm_dokter' => $nm_dokter,
			'tgl_lahir' => $tgl_lahir,
			'alamat' => $alamat,
			'id_poli' => $id_poli
		];
		
		$result = $this->Model->simpan('dokter',$data);

		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('dokter');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('dokter');
		}
	}
	
	//update dokter
	public function ubah()
	{
		$id_dokter = $this->input->post('id_dokter');
		$nm_dokter = $this->input->post('nm_dokter');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$alamat = $this->input->post('alamat');
		$id_poli = $this->input->post('id_poli');
		
		$data = [
			'nm_dokter' => $nm_dokter,
			'tgl_lahir' => $tgl_lahir,
			'alamat' => $alamat,
			'id_poli' => $id_poli
		];
		
		$result = $this->Model->update('id_dokter',$id_dokter,$data,'dokter');

		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('dokter');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('dokter');
		}
	}
			
	public function hapus($id)
	{
		$result = $this->Model->hapus('id_dokter',$id,'dokter');
		if ($result){
		   	redirect('dokter');
		}else{
			$this->session->set_flashdata('pesanGagal','Poli Tidak Berhasil Dihapus');
	   		redirect('dokter');
		}
	}
	
	
}