<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model {

    public function __construct()
    {
		parent::__construct();
	}

	//untuk login
	public function auth($username,$password)
	{
   		$query = "SELECT * FROM user WHERE UPPER(username)=".$this->db->escape(strtoupper(stripslashes(strip_tags(htmlspecialchars($username,ENT_QUOTES)))))." AND password=".$this->db->escape(stripslashes(strip_tags(htmlspecialchars($password,ENT_QUOTES))));
   		$result = $this->db->query($query);
   		return $result->row();
	}

	//ambil semua data
	public function getAll($table)
	{
		$result = $this->db->get($table);
		return $result->result();
	}

	//simpan
	public function simpan($table,$data)
	{
		$checkinsert = false;
		try{
			$this->db->insert($table,$data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}

	//update
	public function update($pk,$id,$data,$table)
	{
		$checkupdate = false;
		try{
			$this->db->where($pk,$id);
			$this->db->update($table,$data);
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}

	//hapus
	public function hapus($pk,$id,$table)
	{
		$checkdelete = false;
		try{
			$this->db->where($pk,$id);
			$this->db->delete($table);
			$checkdelete = true;
		}catch (Exception $ex) {
			$checkhapus = false;
		}
		return $checkdelete;
	}

	//join
	public function joinJadwal()
	{
		try{

			$this->db->select('*');
			$this->db->from('jadwal');
			$this->db->join('dokter', 'jadwal.id_dokter = dokter.id_dokter');
			$query = $this->db->get();

			return $query->result();

		}catch (Exception $ex) {
			$check = false;
		}
	}

	//join dokter dan poli
	public function joinDokter()
	{
		try{

			$this->db->select('*');
			$this->db->from('dokter');
			$this->db->join('poli', 'poli.id_poli = dokter.id_poli');
			$query = $this->db->get();

			return $query->result();

		}catch (Exception $ex) {
			$check = false;
		}
	}	

	//kode
	public function kode()
    {
       	$q  = $this->db->query("select MAX(RIGHT(id,1)) as kd_max from jadwal");
       	$kd = "";
    	if($q->num_rows() > 0) {
        	foreach ($q->result() as $k) {
          		$tmp = ((int)$k->kd_max)+1;
           		$kd = sprintf("%01s",$tmp);
        	}
    	} else {
         $kd = "1";
    	}
       	return $kd;
    }

    //join absen
    public function joinAbsen()
	{
		try{
			$hari = hari_indo(date("Y-m-d"));
			$this->db->select('*');
			$this->db->from('jadwal');
			$this->db->join('dokter', 'jadwal.id_dokter = dokter.id_dokter');
			$this->db->join('poli', 'poli.id_poli = dokter.id_poli');
			$this->db->where('hari', $hari);
			$this->db->group_by('nm_dokter');
			$query = $this->db->get();
			return $query->result();
		}catch (Exception $ex) {
			$check = false;
		}
	}

	public function update_absen($status_hadir,$id_dokter)
	{
		$checkupdate = false;
		try{
				$hari = hari_indo(date("Y-m-d"));
				$result = $this->db->query("UPDATE jadwal set status_hadir = '$status_hadir' where id_dokter = '$id_dokter' and hari = '$hari'");
			$checkupdate = true;		
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}

	public function reset($data)
	{
		$checkupdate = false;
		try{
			$this->db->update('jadwal',$data);
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;	
	}

	//kode poli
	public function getKodePoli()
    {
       	$q  = $this->db->query("SELECT MAX(RIGHT(id_poli,6)) as kd_max from poli");
       	$kd = "";
    	if($q->num_rows() > 0) {
        	foreach ($q->result() as $k) {
          		$tmp = ((int)$k->kd_max)+1;
           		$kd = sprintf("%06s",$tmp);
        	}
    	} else {
         $kd = "000001";
    	}
       	return "POLI".$kd;
    }

    //kode poli
	public function getKodeDokter()
    {
       	$q  = $this->db->query("SELECT MAX(RIGHT(id_dokter,6)) as kd_max from dokter");
       	$kd = "";
    	if($q->num_rows() > 0) {
        	foreach ($q->result() as $k) {
          		$tmp = ((int)$k->kd_max)+1;
           		$kd = sprintf("%06s",$tmp);
        	}
    	} else {
         $kd = "000001";
    	}
       	return "DKTR".$kd;
    }

}