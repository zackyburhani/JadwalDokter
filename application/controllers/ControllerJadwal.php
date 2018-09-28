<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerJadwal extends CI_Controller {

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
		$dokter = $this->Model->getAll('dokter');
		$jadwal = $this->Model->joinJadwal();
		$data = [
			'dokter' => $dokter,
			'jadwal' => $jadwal
		];	
		$this->load->view('template/v_header');
		$this->load->view('template/v_sidebar');
		$this->load->view('v_jadwal',$data);
		$this->load->view('template/v_footer');	 
	}

	public function simpan()
	{
		$id_dokter = $this->input->post('id_dokter');
		$hari = $this->input->post('hari');
		$jam_awal = $this->input->post('jam_awal');
		$jam_akhir = $this->input->post('jam_akhir');
		$status_hadir = "0";
		$hari_janji = $this->input->post('hari_janji');
		$waktu_awal = substr($jam_awal, 6,2);

		$baris = count($hari);
		$q=0;
		for($i=0; $i<$baris; $i++){

			$time_awal = date("H:i", strtotime($jam_awal));
			$time_akhir = date("H:i", strtotime($jam_akhir));

			$praktek = $time_awal." - ".$time_akhir;

			if($waktu_awal == "AM"){
				//pagi
				$data = [
					'hari' => $hari[$q++],
					'pagi' => $praktek,
					'status_hadir' => $status_hadir,
					'id_dokter' => $id_dokter,
					'perjanjian' => $hari_janji
				];
			} else {
				//sore
				$data = [
					'hari' => $hari[$q++],
					'sore' => $praktek,
					'status_hadir' => $status_hadir,
					'id_dokter' => $id_dokter,
					'perjanjian'=> $hari_janji
				];
			}
			$result = $this->Model->simpan('jadwal',$data);		
		}

		if ($result){
			$this->session->set_flashdata('pesan','Jadwal Berhasil Disimpan');
	   		redirect('Jadwal');
		}else{
			$this->session->set_flashdata('pesanGagal','Jadwal Tidak Berhasil Disimpan');
	   		redirect('Jadwal');
		}

	}

	public function ubah()
	{
		$id = $this->input->post('id');
		$id_dokter = $this->input->post('id_dokter');
		$hari = $this->input->post('hari');
		$jam_awal = $this->input->post('jam_awal');
		$jam_akhir = $this->input->post('jam_akhir');
		$hari_janji = $this->input->post('hari_janji');

		$waktu_awal = substr($jam_awal, 6,2);

		$time_awal = date("H:i", strtotime($jam_awal));
		$time_akhir = date("H:i", strtotime($jam_akhir));

		$praktek = $time_awal." - ".$time_akhir;

		if($waktu_awal == "AM"){
			//pagi
			$data = [
				'id_dokter' => $id_dokter,
				'hari' => $hari,
				'pagi' => $praktek,
				'sore' => "",
				'perjanjian' => $hari_janji
			];
		} else {
			//sore
			$data = [
				'id_dokter' => $id_dokter,
				'hari' => $hari,
				'pagi' => "",
				'sore' => $praktek,
				'perjanjian' => $hari_janji
			];
		}

		$result = $this->Model->update('id',$id,$data,'jadwal');

		if ($result){
			// $this->session->set_flashdata('pesan','Jadwal Berhasil Disimpan');
	   		redirect('Jadwal');
		}else{
			$this->session->set_flashdata('pesanGagal','Jadwal Tidak Berhasil Disimpan');
	    	redirect('Jadwal');
		}
	}

	public function hapus($id)
	{
		$result = $this->Model->hapus('id',$id,'jadwal');
		if ($result){
		   	redirect('Jadwal');
		}else{
			$this->session->set_flashdata('pesanGagal','Jadwal Tidak Berhasil Dihapus');
	   		redirect('Jadwal');
		}
	}



}