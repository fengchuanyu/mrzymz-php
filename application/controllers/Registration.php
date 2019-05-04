<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
class Registration extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('Server/pageServer/Registrationpage');
    }
    //1标示未过期，2标示过期
    public function regist_get(){
        $arrCon = $this->input->post(array('r_phone'), TRUE);
        $res    = $this->Registrationpage->get_registall($arrCon);
        echo json_encode($res);
    }

}
