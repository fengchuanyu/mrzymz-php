<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
//可以在dataserver层进行对传递过来的数据库查询参数进行拼装成array（）规范形式，
//然后进行对数据库获取到的多张表数据进行组合合并成自自己想要的数据雏形数组。是对Dao层进一步的粒度化
class Casedata extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->model('Dao/Casedao');
        $this->load->model('Dao/Discussdao');
    }

    /**
     * @param $arrFilds
     * @return array
     * @desc DS层 添加病历通过arrFilds字段
     * @author 沈雨康（shenyukang@126.com）
     */
    public function add_casedao($arrFilds){
        $row = $this->Casedao->insertcase($arrFilds);
        if (empty($row)) {
            return array(
                'data'    => 0,
                'code'    => EXIT_DATABASE,
                'message' => "影响零行数据"
            );
        } else {
            return array(
                'data'    => $row,
                'code'    => EXIT_SUCCESS,
                'message' => "添加病历成功"
            );
        }
    }

    /**
     * @param $arrCons
     * @return array
     * @desc DS层 查询病历列表
     * @author 沈雨康（shenyukang@126.com）
     */
    public function get_case_data($arrCons){
        $res = $this->Casedao->selects($arrCons);
        if (empty($res)) {
            return array(
                'data'    => 0,
                'code'    => EXIT_DATABASE,
                'message' => "未查询到一行数据"
            );
        } else {
            return array(
                'data'    => $res,
                'code'    => EXIT_SUCCESS,
                'message' => "查询病历列表成功"
            );
        }
    }


    /**
     * @param $arrConf
     * @return array
     * @desc DS层 删除病历通过cid字段
     * @author 沈雨康（shenyukang@126.com）
     */
    public function deledelect_case_data($arrConf){
        $row = $this->Casedao->delect_dao($arrConf);
        if (empty($row)) {
            return array(
                'data'    => 0,
                'code'    => EXIT_DATABASE,
                'message' => "影响行数为0"
            );
        }
        return array(
            'data'    => $row,
            'code'    => EXIT_SUCCESS,
            'message' => "删除成功"
        );
    }

    /**
     * @param $arrFilds
     * @param $arrayCon
     * @return array
     * @desc DS层 更新病历
     * @author 沈雨康（shenyukang@126.com）
     */
    public function updata_case_data($arrFilds, $arrayCon){
        $row = $this->Casedao->updata_dao($arrFilds, $arrayCon);
        if (empty($row)) {
            return array(
                'data'    => 0,
                'code'    => EXIT_DATABASE,
                'message' => "修改失败，影响0行"
            );
        }
        return array(
            'data'    => $row,
            'code'    => EXIT_SUCCESS,
            'message' => "修改成功"
        );
    }

    public function add_discuss_data($arrFilds){
        $row = $this->Discussdao->inserts($arrFilds);
        if (empty($row)) {
            return array(
                'data'    => 0,
                'code'    => EXIT_DATABASE,
                'message' => "影响零行数据,新增失败"
            );
        } else {
            return array(
                'data'    => $row,
                'code'    => EXIT_SUCCESS,
                'message' => "添加评论成功"
            );
        }
    }
}
