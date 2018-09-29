<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerDokter extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['MDokter', 'MPoli', 'Model']);
	}

	//awal halaman dokternya
	public function index()
	{	
		$getAllDokter = $this->MDokter->getAllDokter();
		$getAllpoli   = $this->MPoli->getAllpoli();
		$getNmpoli	  = $this->MDokter->getNmpoli();
		$data= [
			'getAllDokter' => $getAllDokter,
			'getAllpoli'   => $getAllpoli,
			'getNmpoli'	   => $getNmpoli
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
	public function ubah()
	{
		$id_dokter = $this->input->post('id_dokter');
		$nm_dokter = $this->input->post('nm_dokter');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$alamat = $this->input->post('alamat');
		
		$data = [
			'nm_dokter' => $nm_dokter,
			'tgl_lahir' => $tgl_lahir,
			'alamat' => $alamat
		];

		//$result = $this->MDokter->updateDokter($data);
		$result = $this->Model->update('id_dokter',$id_dokter,$data,'dokter');

		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Diubah');
	   		redirect('dokter');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('dokter');
		}
	}
	
	//hapus dokternya
	/*public function deleteDokter()
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
	}*/
			
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