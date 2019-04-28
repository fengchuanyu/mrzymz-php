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

}

