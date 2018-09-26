<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model {

    public function __construct()
    {
		parent::__construct();
	}

	public function auth($username,$password)
	{
   		$query = "SELECT * FROM user WHERE UPPER(username)=".$this->db->escape(strtoupper(stripslashes(strip_tags(htmlspecialchars($username,ENT_QUOTES)))))." AND password=".$this->db->escape(stripslashes(strip_tags(htmlspecialchars($password,ENT_QUOTES))));
   		$result = $this->db->query($query);
   		return $result->row();
	}

	//simpan
	public function tambahCalon($data)
	{
		$checkinsert = false;
		try{
			$this->db->insert('calon',$data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}
}