<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MDokter extends CI_Model {

    public function __construct()
    {
		parent::__construct();
	}

	public function tambahDokter($data)
	{
		$checkinsert = false;
		try{
			$this->db->insert('dokter',$data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}
	
	public function getAllDokter()
	{
		$result = $this->db->get('dokter');
		return $result->result();
	}
	
	public function getDokter($id)
	{
		$result = $this->db->where('id_dokter',$id)->get('dokter');
		return $result->row();
	}
	
	public function getNmpoli()
	{
		$result = $this->db->query("SELECT nm_poli,dokter.id_dokter FROM dokter JOIN poli ON dokter.id_poli = poli.id_poli GROUP BY nm_poli ORDER BY 2");
		return $result->result();
	}
	
	public function updateDokter($id,$data)
	{
		$checkupdate = false;
		try{
			$this->db->where('id_dokter',$id);
			$this->db->update('dokter',$data);
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}

	public function deleteDokter($id)
	{
		$checkupdate = false;
		try{
			$this->db->where('id_dokter',$id);
			$this->db->delete('dokter');
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}
	
	public function validasiHapus($kolom,$table,$id)
    {
     	$result = $this->db->query("SELECT $kolom FROM $table WHERE $kolom = '$id'");
     	return $result->row();
    }
	
}