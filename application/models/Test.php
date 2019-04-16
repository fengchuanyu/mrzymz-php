<?php defined('BASEPATH') OR exit('No direct script access allowed');
   class Test extends CI_Model{
    public function login_to_sql(){
	$query = $this->db->get('users');
        return $query->result();
   }
}
