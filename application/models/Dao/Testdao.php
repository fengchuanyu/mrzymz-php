<?php defined('BASEPATH') OR exit('No direct script access allowed');
   class Testdao extends CI_Model{
    	var $table = 'users';
	public function Selectall(){
       // $this->load->model('Server/dataServer/Datatest');
        $res = $this->db->get($this->table);
        var_dump ($res->result());
        echo "<br/>《------这里是Dao输出的<br/>";
        return $res;
        //$query = $this->db->get('users');
        //return $query->result();
   }
}
