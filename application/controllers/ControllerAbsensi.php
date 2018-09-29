<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerAbsensi extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Model');
		$username = $this->session->username;

		if($username == null){
			redirect('login');
		} 
	}

	public function index()
	{	
		$data = [
			'absen'=> $this->Model->joinAbsen()
		];

		$this->load->view('template/v_header');
		$this->load->view('template/v_sidebar');
		$this->load->view('v_absensi',$data);
		$this->load->view('template/v_footer');	 
	}

	public function simpan()
	{
		$jumlahDokter = $this->Model->joinAbsen();

		//ambil keterangan
		$b = "b";
		for($i=1; $i<=count($jumlahDokter); $i++){
			$keterangan = $this->input->post($b.$i);
			$absensi[] = $keterangan;
		}

		//ambil id_dokter
		$d = "id_dokter";
		for($i=1; $i<=count($jumlahDokter); $i++){
			$id_dokter = $this->input->post($d.$i);
			$dokter[] = $id_dokter;
		}

		//simpan keterangan
		$a=0;
		for($i=0; $i<count($jumlahDokter); $i++){
			$result = $this->Model->update_absen($absensi[$i],$dokter[$a++]);
		}

		if ($result){
			$this->session->set_flashdata('pesan','Absensi Berhasil');
	   		redirect('absensi');
		}else{
			$this->session->set_flashdata('pesanGagal','Gagal Melakukan Absensi');
	   		redirect('absensi');
		}
	}

	public function status_hadir()
	{
		$id = $this->input->post('id');
		$status_hadir = $this->input->post('status_hadir');

		$data = [
			'status_hadir' => $status_hadir
		];

		$result = $this->Model->update('id',$id,$data,'jadwal');
		if ($result){
			// $this->session->set_flashdata('pesan','Jadwal Berhasil Disimpan');
	   		redirect('absensi');
		}else{
			$this->session->set_flashdata('pesanGagal','Jadwal Tidak Berhasil Disimpan');
	    	redirect('absensi');
		}
	}

	public function reset()
	{	
		$data = [
			'status_hadir' => '0'
		];
		$result = $this->Model->reset($data);
		redirect('absensi');
	}
}