<?php  defined('BASEPATH') OR exit('No direct script access allowed');
    class Testcontroller extends CI_Controller{
        public function __construct(){
            parent::__construct();
        }

	public function to_login_model(){
		$this->load->model('Test');
//		$this->load->library('Variable');
		$res = $this->Test->login_to_sql();
		echo json_encode($res);
	}
	public function pagesT(){
		$this->load->model('Server/pageServer/Pagetest');
		$res = $this->Pagetest->pageSerTest();
		die();
	}
}
