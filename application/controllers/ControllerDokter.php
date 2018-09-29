<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerDokter extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MDokter');
	}

	//awal halaman dokternya
	public function index()
	{	
		$getAllDokter = $this->MDokter->getAllDokter();
		$data= [
			'getAllDokter' => $getAllDokter
		];
		$this->load->view('template/v_header');
		$this->load->view('template/v_sidebar');
		$this->load->view('v_dokter');
		$this->load->view('template/v_footer');	 
	}
	
	//tambah dokter
	public function tambahDokter()
	{
		$id_dokter = $this->input->post('id_dokter');
		$nm_dokter = $this->input->post('nm_dokter');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$alamat = $this->input->post('alamat');
		$data = [
			'id_dokter' => $id_dokter,
			'nm_dokter' => $nm_dokter,
			'tgl_lahir' => $tgl_lahir,
			'alamat' => $alamat
		];
		
		$result = $this->MDokter->tambahDokter($data);

		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('dokter');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('dokter');
		}
	}
	
	//update dokter
	public function updateDokter()
	{
		$id_dokter = $this->input->post('id_dokter');
		$nm_dokter = $this->input->post('nm_dokter');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$alamat = $this->input->post('alamat');
		$data = [
			'id_dokter' => $id_dokter,
			'nm_dokter' => $nm_dokter,
			'tgl_lahir' => $tgl_lahir,
			'alamat' => $alamat
		];

		$result = $this->MDokter->updateDokter($data);

		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Diubah');
	   		redirect('dokter');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('dokter');
		}
	}
	
	//hapus dokternya
	public function deleteDokter()
	{
		$id_dokter = $this->input->post('dokter');
		$validasi = $this->MDokter->validasiHapus('id_dokter',$id_dokter);

		if($validasi->id_dokter == $id_dokter){
			$this->session->set_flashdata('pesanGagal','Data dokter Terhubung Dengan Data Lain');
	   		redirect('dokter');
		} else {
			$result = $this->MDokter->Deletedokter($id_dokter);
			if ($result){
				$this->session->set_flashdata('pesan','Data Berhasil Dihapus');
		   		redirect('dokter');
			}else{
				$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Dihapus');
	    		redirect('dokter');
			}
		}
	}
	
}