<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
//可以在dataserver层进行对传递过来的数据库查询参数进行拼装成array（）规范形式，
//然后进行对数据库获取到的多张表数据进行组合合并成自自己想要的数据雏形数组。是对Dao层进一步的粒度化
class Registrationdata extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dao/Registrationdao');
    }

//    public function get_doctor_byid($did){
//        $res = $this->Doctordata->get_doctordata($did);
//        if (! empty($res)) {
//            return array(
//                'data'    => $res,
//                'code'    => EXIT_SUCCESS,
//                'message' => "查询成功"
//            );
//        } else {
//            return array(
//                'data'    => 0,
//                'code'    => EXIT_ERROR,
//                'message' => "查询结果为空"
//            );
//        }
//
//    }
    public function get_registdata($arrCon){
        if(empty($arrCon)){
            $arrCon = array(
                '1' => 1
            );
        }
        $res = $this->Registrationdao->selects($arrCon);
//        echo json_encode($res);
//        die();
//        foreach($res as $key=>$value){
////            echo $key."=>".$value."\n";
////            if($value['']=)
//        }
        if (empty($res)) {
            return array(
                'data'    => 0,
                'code'    => EXIT_DATABASE,
                'message' => "查询失败，数据库返回空"
            );
        } else {
            return array(
                'data'    => $res,
                'code'    => EXIT_SUCCESS,
                'message' => "挂号信息返回成功"
            );
        }

    }
}
