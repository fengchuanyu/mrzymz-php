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

    public function delect_byid($did){
        return $this->Doctordata->delect_byid($did);;
    }

    public function updoc($did, $doctorName, $doctorImage, $doctorMessage, $doctorPlace, $doctorOffice, $doctorJob, $doctorPrice){
        $arryField = array(
            'did'            => $did,
            'doctor_name'    => $doctorName,
            'doctor_image'   => $doctorImage,
            'doctor_message' => $doctorMessage,
            'doctor_place'   => $doctorPlace,
            'doctor_office'  => $doctorOffice,
            'doctor_job'     => $doctorJob,
            'doctor_price'   => $doctorPrice
        );
        if (empty($did)) {
            return array(
                'data'    => 0,
                'code'    => EXIT_ERROR,
                'message' => "为选中医生，did为空"
            );
        } else {
            foreach ($arryField as $key => $value) {
//            去掉空的字段，为传递字段。
                if (empty($value)) {
                    $arryField = array_diff_key($arryField, array($key => 'value'));
                }
            }
            //将经过过滤的字段数组传递过去
            return $this->Doctordata->updoctordata($arryField);
        }



    }

    public function adddoc($doctorName, $doctorImage, $doctorMessage, $doctorPlace, $doctorOffice, $doctorJob, $doctorPrice){
        if (empty($doctorName) || empty($doctorJob) || empty($doctorOffice) || empty($doctorPrice)) {
            return array(
                'data'    => 0,
                'code'    => EXIT_ERROR,
                'message' => "医生姓名，职务，科室，挂号费用等关键字段不能为空"
            );
        } else {
            $arrayField = array(
                'doctor_name'    => $doctorName,
                'doctor_image'   => $doctorImage,
                'doctor_message' => $doctorMessage,
                'doctor_place'   => $doctorPlace,
                'doctor_office'  => $doctorOffice,
                'doctor_job'     => $doctorJob,
                'doctor_price'   => $doctorPrice
            );
            foreach ($arrayField as $key => $value) {
//            去掉空的字段，为传递字段。
                if (empty($value)) {
                    $arryField = array_diff_key($arrayField, array($key => 'value'));
                }
            }
            //将经过过滤的字段数组传递过去
            return $this->Doctordata->add_doctordata($arryField);
        }
    }

}