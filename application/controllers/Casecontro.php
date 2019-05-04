<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
class Casecontro extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Server/pageServer/Casepage');
    }

    /**
     * @param null
     * @return null
     * @desc 接口：添加病历
     * @author 沈雨康（shenyukang@126.com）
     */
    public function add_case_bydid(){
//      $did = 12;
        if (empty($did)) {
           echo json_encode(array(
                'data'    => 0,
                'code'    => EXIT_ERROR,
                'message' => "当前医生id为空，请确认身份，已归属管理的医生才能创建病历"
            ));
        } else {
            $data = $this->input->post(array('c_name', 'c_time', 'c_did', 'c_describe', 'c_diagnosis', 'c_solve', 'c_attention', 'c_uid'), TRUE);
            $res  = $this->Casepage->add_casepage($data);
            echo json_encode($res);
        }

    }

    /**
     * @param null
     * @return null
     * @desc 接口：获取病历列表
     * @author 沈雨康（shenyukang@126.com）
     */
    public function get_case(){
        $arrConf = $this->input->post(array('c_did', 'c_oid'),true);
        $res     = $this->Casepage->get_case_page($arrConf);
        echo json_encode($res);
    }

    /**
     * @param null
     * @return null
     * @desc 接口：删除病历
     * @author 沈雨康（shenyukang@126.com）
     */
    public function delect_case(){
        $arrConf = $this->input->post(array('c_id'),true);
        $res     = $this->Casepage->delect_case_page($arrConf);
        echo json_encode($res);
    }

    /**
     * @param null
     * @return null
     * @desc 接口：更新病历信息
     * @author 沈雨康（shenyukang@126.com）
     */
    public function updata_case(){
        $arrConf = $this->input->post(array('c_id', 'c_name', 'c_time', 'c_did', 'c_describe', 'c_diagnosis', 'c_solve', 'c_attention', 'c_uid'),true);
        $res     = $this->Casepage->updata_case_page($arrConf);
        echo json_encode($res);
    }

    public function add_discuss(){
        $arrFilds = $this->input->post(array('d_sign', 'd_pid', 'd_content'), true);
        $res     = $this->Casepage->add_discuss_page($arrFilds);
        echo json_encode($res);
    }
}
