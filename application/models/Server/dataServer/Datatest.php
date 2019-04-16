<?php defined('BASEPATH') OR exit('No direct script access allowed');
   class Datatest extends CI_Model{
   	 public function getdataTest($gets){
		$this->load->model('Dao/Testdao');
		if ($gets == 1) {
			//$rs = "as you see , i'am ready";	
			$rs = $this->Testdao->Selectall();
			return $rs;
		} else {
			return 0;
		}
	//$query = $this->db->get('users');
        //return $query->result();
 	}
	public function gt($gets){
        if ($gets == 1) {
                $rs = "as you see , i'am ready";
                return $rs;
        } else {
                return 0;
        }
        //$query = $this->db->get('users');
        //return $query->result();
   }

}

