<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MPoli extends CI_Model {

    public function __construct()
    {
		parent::__construct();
	}

	public function tambahpoli($data)
	{
		$checkinsert = false;
		try{
			$this->db->insert('poli',$data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}
	
	public function getAllpoli()
	{
		$result = $this->db->get('poli');
		return $result->result();
	}
	
	public function getpoli($id)
	{
		$result = $this->db->where('id_poli',$id)->get('poli');
		return $result->row();
	}
	
	public function updatepoli($id,$data)
	{
		$checkupdate = false;
		try{
			$this->db->where('id_poli',$id);
			$this->db->update('poli',$data);
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}

	public function deletepoli($id)
	{
		$checkupdate = false;
		try{
			$this->db->where('id_poli',$id);
			$this->db->delete('poli');
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