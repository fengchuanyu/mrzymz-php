<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
//可以在这里进行同一个页面的多个接口的编写，然后可以在pageserver层设计相关的
//状态码和data的组装规范输出以及相关的相关的权限判断和过滤操作
class Registrationpage extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->model('Server/dataServer/Registrationdata');
    }
    public function get_registall($arrCon){
        $res = $this->Registrationdata->get_registdata($arrCon);
        return $res;
    }

}
