<?php defined('BASEPATH') OR exit('No direct script access allowed');
   class Pagetest extends CI_Model{
	//$this->load->model('Datatest');
    public function pageSerTest(){
	$this->load->model('Server/dataServer/Datatest');
	$res = $this->Datatest->getdataTest(1);
	var_dump ($res);
	echo "这里是pageserver输出的<br/>";
	return $res;
	//$query = $this->db->get('users');
        //return $query->result();
   }
}

