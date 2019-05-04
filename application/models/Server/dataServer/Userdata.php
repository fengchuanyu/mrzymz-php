<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
//可以在dataserver层进行对传递过来的数据库查询参数进行拼装成array（）规范形式，
//然后进行对数据库获取到的多张表数据进行组合合并成自自己想要的数据雏形数组。是对Dao层进一步的粒度化
class Userdata extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->model('Dao/Userdao');

    }

    /**
     * @return array
     */
    public function get_userinfrom_data(){
        if (empty($arrayFiles)) {
            $arrayFiles = array(
                '1' => 1
            );
        }

        $res = $this->Userdao->select($arrayFiles);
        if (empty($res)) {
            return array(
                'data'    => 0,
                'code'    => EXIT_DATABASE,
                'message' => "数据库查询失败"
            );
        }
        return array(
            'data'    => $res,
            'code'    => EXIT_SUCCESS,
            'message' => "获取数据成功"
        );
    }

    /**
     * @param $arrConds
     * @return array
     */
    public function delectuser_data($arrConds){
        $row = $this->Userdao->delect_byid($arrConds);
        $res = $this->Userdao->select($arrConds);
        if (empty($res)) {
            return array(
                'data'    => 0,
                'code'    => EXIT_ERROR,
                'message' => "当前用户uid不存在"
            );
        }
        if (empty($row)) {
            return array(
                'data'    => 0,
                'code'    => EXIT_DATABASE,
                'message' => "删除失败"
            );
        }
        return array(
            'data'    => $row,
            'code'    => EXIT_SUCCESS,
            'message' => "删除成功"
        );
    }
}