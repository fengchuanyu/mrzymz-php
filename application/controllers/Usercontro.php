<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
class Usercontro extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Server/pageServer/Userpage');
    }

    /**
     * @param null
     * @return null
     * @desc 接口：获取用户列表
     * @author 沈雨康（shenyukang@126.com）
     *
     */
    public function get_userinfrom(){
        $res = $this->Userpage->get_userinfrom_page();
        echo json_encode($res);
    }

    /**
     * @param null
     * @return null
     * @desc 接口：删除用户
     * @author 沈雨康（shenyukang@126.com）
     */
    public function delectuser(){
        $arrFilds = $this->input->post(array('uid'), true);
        $res      = $this->Userpage->delectuser_page($arrFilds);
        echo json_encode($res);
    }
}