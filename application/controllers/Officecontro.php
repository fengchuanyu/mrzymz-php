<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
class Officecontro extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Server/pageServer/Officepage');
    }

    /**
     * @desc 接口：获取诊疗分类
     * @author 沈雨康（shenyukang@126.com）
     */
    public function get_illclassify(){
        $arrConds = $this->input->post(array('iid'), true);
        $res      = $this->Officepage->get_illclasspage($arrConds);
        echo json_encode($res);
    }


    /**
     * @desc 接口：新增诊疗分类
     * @author 沈雨康（shenyukang@126.com）
     */
    public function add_illclassify(){
        $arrFilds = $this->input->post(array('ill_title', 'ill_content'), true);
        $res      = $this->Officepage->add_illclasspage($arrFilds);
        echo json_encode($res);
    }

    /**
     * @desc 接口：修改诊疗分类通过iid
     * @author 沈雨康（shenyukang@126.com）
     */
    public function updata_illclassify(){
        $data = $this->input->post(array('iid', 'ill_title', 'ill_content'), true);
        $res      = $this->Officepage->updata_illclassify_page($data);
        echo json_encode($res);
    }

    /**
     * @desc 接口：删除诊疗通过iid
     * @author 沈雨康（shenyukang@126.com）
     */
    public function delect_illclassify(){
        $arrConds = $this->input->post(array('iid'), true);
        $res      = $this->Officepage->delect_illclassify_page($arrConds);
        echo json_encode($res);
    }

    /**
     * @desc 接口：获取科室信息列表
     * @author 沈雨康（shenyukang@126.com）
     */
    public function get_office(){
        $arrConds = $this->input->post(array('oid'), true);
        $res      = $this->Officepage->get_office_page($arrConds);
        echo json_encode($res);
    }

    /**
     * @desc 接口：添加科室信息
     * @author 沈雨康（shenyukang@126.com）
     */
    public function add_office(){
        $arrFilds = $this->input->post(array('o_name', 'o_content'), true);
        $res      = $this->Officepage->add_office_page($arrFilds);
        echo json_encode($res);
    }

    /**
     * @desc 接口：修改科室信息
     * @author 沈雨康（shenyukang@126.com）
     */
    public function updata_office(){
        $data = $this->input->post(array('oid', 'o_name', 'o_content'), true);
        $res      = $this->Officepage->updata_office_page($data);
        echo json_encode($res);
    }

    /**
     * @desc 接口：删除科室信息
     * @author 沈雨康（shenyukang@126.com）
     */
    public function delect_office(){
        $arrConds = $this->input->post(array('oid'), true);
        $res      = $this->Officepage->delect_office_page($arrConds);
        echo json_encode($res);
    }
}
