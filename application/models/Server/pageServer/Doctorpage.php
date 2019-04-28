<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
//可以在这里进行同一个页面的多个接口的编写，然后可以在pageserver层设计相关的
//状态码和data的组装规范输出以及相关的相关的权限判断和过滤操作
class Doctorpage extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Server/dataServer/Doctordata');
    }

    public function get_doctor_byid($did){
        $res = $this->Doctordata->get_doctordata($did);
        if (! empty($res)) {
            return array(
                'data'    => $res,
                'code'    => EXIT_SUCCESS,
                'message' => "查询成功"
            );
        } else {
            return array(
                'data'    => 0,
                'code'    => EXIT_ERROR,
                'message' => "查询结果为空"
            );
        }

    }

}