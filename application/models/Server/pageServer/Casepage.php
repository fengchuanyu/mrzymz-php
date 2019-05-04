<?php  defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
//可以在这里进行同一个页面的多个接口的编写，然后可以在pageserver层设计相关的
//状态码和data的组装规范输出以及相关的相关的权限判断和过滤操作
class Casepage extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->model('Server/dataServer/Casedata');
    }

    /**
     * @param $arrFilds
     * @return array
     * @desc 病历创建通过传入的字段 PS层
     * @author  沈雨康（shenyukang@126.com）
     */
    public function add_casepage($arrFilds){
        if (empty($arrFilds)) {
            return array(
                'data'    => 0,
                'code'    => EXIT_ERROR,
                'message' => "创建取消，没有数据输入"
            );
        } else {
            foreach ($arrFilds as $key => $value) {
//            去掉空的字段，为传递字段。
                if (empty($value)) {
                    $arrFilds = array_diff_key($arrFilds, array($key => 'value'));
                }
            }
            //将经过过滤的字段数组传递过去
           return $this->Casedata->add_casedao($arrFilds);
        }
    }

    /**
     * @param $arrCons
     * @return array
     * @desc PS层 查询病历列表
     * @author 沈雨康（shenyukang@126.com）
     *
     */
    public function get_case_page($arrCons){
        if (empty($arrCons)) {
            $arrCons = array(
                '1' => 1
            );
        }
        $res = $this->Casedata->get_case_data($arrCons);
        return $res;
    }

    /**
     * @param $arrConf
     * @return array
     * @desc PS层 删除病历
     * @author 沈雨康（shenyukang@126.com）
     */
    public function delect_case_page($arrConf){
        if (empty($arrConf)) {
            return array(
                'data'    => 0,
                'code'    => EXIT_ERROR,
                'message' => "传递了空cid"
            );
        }
        $res = $this->Casedata->deledelect_case_data($arrConf);
        return $res;
    }

    /**
     * @param $arrFilds
     * @return array
     * @desc PS层 更新病历
     * @author 沈雨康（shenyukang@126.com）
     */
    public function updata_case_page($arrFilds){
        foreach ($arrFilds as $key => $value) {
            if (empty($value)) {
                $arrFilds = array_diff_key($arrFilds, array($key => 'value'));
            }
        }

        if (empty($arrFilds)) {
            return array(
                'data'    => 0,
                'code'    => EXIT_ERROR,
                'message' => "未更改"
            );
        }

        $cid        = $arrFilds['c_id'];
        $arrayCon   = array(
            'c_id' => $cid
        );

        $arrFilds = array_diff_key($arrFilds, array('c_id' => 'value'));
        $res      = $this->Casedata->updata_case_data($arrFilds, $arrayCon);
        return $res;
    }

    public function add_discuss_page($arrFilds){
        foreach ($arrFilds as $key => $value) {
            if (empty($value)) {
                $arrFilds = array_diff_key($arrFilds, array($key => 'value'));
            }
        }
        if (empty($arrFilds['d_content'])) {
            return array(
                'data'    => 0,
                'code'    => EXIT_ERROR,
                'message' => "评论内容为空，评论失败"
            );
        }

        $res = $this->Casedata->add_discuss_data($arrFilds);
        return $res;
    }

}
