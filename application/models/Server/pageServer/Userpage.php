<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
//可以在这里进行同一个页面的多个接口的编写，然后可以在pageserver层设计相关的
//状态码和data的组装规范输出以及相关的相关的权限判断和过滤操作
class Userpage extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->model('Server/dataServer/Userdata');
    }

    /**
     * @param null
     * @return array
     */
    public function get_userinfrom_page(){
        $res = $this->Userdata->get_userinfrom_data();
        return $res;
    }

    /**
     * @param $arrFilds
     * @return array
     */
    public function delectuser_page($arrFilds){
        if (empty($arrFilds)) {
            return array(
                'data'    => 0,
                'code'    => EXIT_ERROR,
                'message' => "uid字段为空"
            );
        }
        return $this->Userdata->delectuser_data($arrFilds);
    }
}

