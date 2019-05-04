<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
//可以在dataserver层进行对传递过来的数据库查询参数进行拼装成array（）规范形式，
//然后进行对数据库获取到的多张表数据进行组合合并成自自己想要的数据雏形数组。是对Dao层进一步的粒度化
class Doctordata extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->model('Dao/Doctordao');
        $this->load->model('Dao/Officedao');

    }

    /**
     * @param $did
     * @return array
     * @desc 获取医生列表通过did，没有did则全部输出
     * @author  沈雨康（shenyukang@126.com）
     */
    public function get_doctordata($did){
        $rs = array();
        if (! empty($did)) {
            $arrayFileds = array(
                'did' => $did
            );
        } else {
            $arrayFileds = array(
                '1' => 1
            );
        }
        $rs['Doctordata']  = $this->Doctordao->select($arrayFileds);
        $rs['office']  = $this->Officedao->select();
        $officeclassLength = count($rs['office']);
        $doctorLength  = count($rs['Doctordata']);
        for ($i=0; $i<$officeclassLength; $i++) {
            for ($j=0; $j<$doctorLength; $j++) {
                if ($rs['Doctordata'][$j]->doctor_office === $rs['office'][$i]->oid) {
                    $rs['Doctordata'][$j]->doctor_office = $rs['office'][$i]->o_name;
                }
            }
        }
        return $rs;
    }

    /**
     * @param $did 医生id
     * @author 沈雨康（shenyukang@126.com）
     * @return array
     * @desc 删除医生通过did字段
     */
    public function delect_byid($did){
        if (empty($did)) {
            return array(
                'data'    => 0,
                'code'    => EXIT_ERROR,
                'message' => "删除失败，空的医生id"
            );
        } else {

            $arrayCon = array(
                'did' => $did
            );

            $row =$this->Doctordao->delectbyid($arrayCon);

            if ($row < 1) {
                return  array(
                    'data'    => 0,
                    'code'    => EXIT_ERROR,
                    'message' => "删除失败，影响0行，未匹配到did"
                );
            } else {
                return  array(
                    'data'    => $row,
                    'code'    => EXIT_SUCCESS,
                    'message' => "删除成功"
                );
            }
        }

    }

    /**
     * @param $arrayFilds
     * @desc data层更新医生信息
     * @author 沈雨康（shenyukang@126.com）
     * @return array
     *
     */
    public function updoctordata($arrayFilds){
        $did        = $arrayFilds['did'];
        $arrayCon   = array(
            'did' => $did
        );

        //将过滤掉did字段掉剩余需要写进数据库掉数据重新组合字段传递下去
        $arrayfilds = array_diff_key($arrayFilds, array('did' => 'value'));
        $row        = $this->Doctordao->updocdao($arrayCon, $arrayfilds);
        if(! empty($row)){
            return array(
                'data'    => $row,
                'code'    => EXIT_SUCCESS,
                'message' => "修改医生信息和成功"
            );
        } else {
            return array(
                'data'    => 0,
                'code'    => EXIT_DATABASE,
                'message' => "修改失败，操作数据库失败"
            );
        }

    }

    /**
     * @param $arrayField
     * @return array
     * @desc 医生新增
     * @author 沈雨康（shenyukang@126.com）
     */
    public function add_doctordata($arrayField){
        $row = $this->Doctordao->add_docdao($arrayField);
        if(! empty($row)){
            return array(
                'data'    => $row,
                'code'    => EXIT_SUCCESS,
                'message' => "新增成功"
            );
        } else {
            return array(
                'data'    => 0,
                'code'    => EXIT_DATABASE,
                'message' => "新增失败，操作数据库错误"
            );
        }
    }


}

