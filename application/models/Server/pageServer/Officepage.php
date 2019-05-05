<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
//可以在这里进行同一个页面的多个接口的编写，然后可以在pageserver层设计相关的
//状态码和data的组装规范输出以及相关的相关的权限判断和过滤操作
class Officepage extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->model('Server/dataServer/Officedata');
    }

    /**
     * @param $arrConds
     * @return array
     * @desc 获取诊疗分类列表PS层
     * @author 沈雨康（shenyukang@126.com）
     */
    public function get_illclasspage($arrConds){
        if (empty($arrConds)) {
            $arrConds = array(
                '1' => 1
            );
        }
        $res = $this->Officedata->get_illclassdata($arrConds);
        if ($res === EXIT_DATABASE){
            return array(
                'data'    => 0,
                'code'    => EXIT_DATABASE,
                'message' => '获取失败'
            );
        }
        return array(
            'data'    => $res,
            'code'    => EXIT_SUCCESS,
            'message' => '获取成功'
        );
    }

    /**
     * @param $arrFilds
     * @return array
     * @desc 添加诊疗分类 PS层
     * @author 沈雨康（shenyukang@126.com）
     */
    public function add_illclasspage($arrFilds){
        foreach ($arrFilds as $key => $value) {
            if (empty($value)) {
                $arrFilds = array_diff_key($arrFilds, array($key => 'value'));
            }
        }
        if (empty($arrFilds)) {
            return array(
                'data'    => 0,
                'code'    => EXIT_ERROR,
                'message' => '新增失败，新增数据为空'
            );
        }
        $res = $this->Officedata->add_illclassdata($arrFilds);
        if ($res == EXIT_DATABASE) {
            return array(
                'data'    => 0,
                'code'    => EXIT_DATABASE,
                'message' => '影响零行'
            );
        }
        return array(
            'data'    => $res,
            'code'    => EXIT_SUCCESS,
            'message' => '新增成功'
        );


    }

    /**
     * @param $data
     * @return array
     * @desc 更新诊疗分类列表 PS层
     * @author 沈雨康（shenyukang@126.com）
     */
    public function updata_illclassify_page($data){
        if (empty($data['iid'])){
            return array(
                'data'    => 0,
                'code'    => EXIT_ERROR,
                'message' => '更新失败，空的iid'
            );
        }
        $arrConds = array(
            'iid' => $data['iid']
        );
        foreach ($data as $key => $value) {
            if (empty($value) || $key === 'iid') {
                $data = array_diff_key($data, array($key => 'value'));
            }
        }
        $res = $this->Officedata->updata_illclassify_data($arrConds, $data);
        if (empty($res)) {
            return array(
                'data'    => 0,
                'code'    => EXIT_DATABASE,
                'message' => '当前iid不存在'
            );
        }
        if ($res === EXIT_DATABASE){
            return array(
                'data'    => 0,
                'code'    => EXIT_DATABASE,
                'message' => '更新失败'
            );
        }
        return array(
            'data'    => $res,
            'code'    => EXIT_SUCCESS,
            'message' => '修改成功'
        );

    }

    /**
     * @param $arrConds
     * @return array
     * @desc 删除诊疗分类列表 PS层
     * @author 沈雨康（shenyukang@126.com）
     */
    public function delect_illclassify_page($arrConds){
        if (empty($arrConds['iid'])){
            return array(
                'data'    => 0,
                'code'    => EXIT_ERROR,
                'message' => '更新失败，空的iid'
            );
        }
        $res = $this->Officedata->delect_illclassify_data($arrConds);
        if (empty($res)) {
            return array(
                'data'    => 0,
                'code'    => EXIT_DATABASE,
                'message' => '当前iid不存在'
            );
        }
        if ($res === EXIT_DATABASE){
            return array(
                'data'    => 0,
                'code'    => EXIT_DATABASE,
                'message' => '删除失败'
            );
        }
        return array(
            'data'    => $res,
            'code'    => EXIT_SUCCESS,
            'message' => '删除成功'
        );
    }

    /**
     * @param $arrConds
     * @return array
     * @desc 获取科室分类列表 PS层
     * @author 沈雨康（shenyukang@126.com）
     */
    public function get_office_page($arrConds){
        if (empty($arrConds)) {
            $arrConds = array(
                '1' => 1
            );
        }
        $res = $this->Officedata->get_office_data($arrConds);
        if ($res === EXIT_DATABASE){
            return array(
                'data'    => 0,
                'code'    => EXIT_DATABASE,
                'message' => '获取失败'
            );
        }
        return array(
            'data'    => $res,
            'code'    => EXIT_SUCCESS,
            'message' => '获取成功'
        );
    }

    /**
     * @param $arrFilds
     * @return array
     * @desc 添加科室分类列表 PS层
     * @author 沈雨康（shenyukang@126.com）
     */
    public function add_office_page($arrFilds){
        foreach ($arrFilds as $key => $value) {
            if (empty($value)) {
                $arrFilds = array_diff_key($arrFilds, array($key => 'value'));
            }
        }
        if (empty($arrFilds)) {
            return array(
                'data'    => 0,
                'code'    => EXIT_ERROR,
                'message' => '新增失败，新增数据为空'
            );
        }
        $res = $this->Officedata->add_office_data($arrFilds);
        if ($res == EXIT_DATABASE) {
            return array(
                'data'    => 0,
                'code'    => EXIT_DATABASE,
                'message' => '影响零行'
            );
        }
        return array(
            'data'    => $res,
            'code'    => EXIT_SUCCESS,
            'message' => '新增成功'
        );
    }

    /**
     * @param $data
     * @return array
     * @desc 更新科室分类列表 PS层
     * @author 沈雨康（shenyukang@126.com）
     */
    public function updata_office_page($data){
        if (empty($data['oid'])){
            return array(
                'data'    => 0,
                'code'    => EXIT_ERROR,
                'message' => '更新失败，空的oid'
            );
        }
        $arrConds = array(
            'oid' => $data['oid']
        );
        foreach ($data as $key => $value) {
            if (empty($value) || $key === 'oid') {
                $data = array_diff_key($data, array($key => 'value'));
            }
        }
        $res = $this->Officedata->updata_office_data($arrConds, $data);
        if (empty($res)) {
            return array(
                'data'    => 0,
                'code'    => EXIT_DATABASE,
                'message' => '当前iid不存在'
            );
        }
        if ($res === EXIT_DATABASE){
            return array(
                'data'    => 0,
                'code'    => EXIT_DATABASE,
                'message' => '更新失败'
            );
        }
        return array(
            'data'    => $res,
            'code'    => EXIT_SUCCESS,
            'message' => '修改成功'
        );
    }

    /**
     * @param $arrConds
     * @return array
     * @desc 删除科室分类列表 PS层
     * @author 沈雨康（shenyukang@126.com）
     */
    public function delect_office_page($arrConds){
        if (empty($arrConds['oid'])){
            return array(
                'data'    => 0,
                'code'    => EXIT_ERROR,
                'message' => '更新失败，空的oid'
            );
        }
        $res = $this->Officedata->delect_office_data($arrConds);
        if (empty($res)) {
            return array(
                'data'    => 0,
                'code'    => EXIT_DATABASE,
                'message' => '当前oid不存在'
            );
        }
        if ($res === EXIT_DATABASE){
            return array(
                'data'    => 0,
                'code'    => EXIT_DATABASE,
                'message' => '删除失败'
            );
        }
        return array(
            'data'    => $res,
            'code'    => EXIT_SUCCESS,
            'message' => '删除成功'
        );
    }
}

