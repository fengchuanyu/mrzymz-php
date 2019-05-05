<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
//可以在dataserver层进行对传递过来的数据库查询参数进行拼装成array（）规范形式，
//然后进行对数据库获取到的多张表数据进行组合合并成自自己想要的数据雏形数组。是对Dao层进一步的粒度化
class Officedata extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->model('Dao/Officedao');
        $this->load->model('Dao/Illclassdao');
    }

    /**
     * @param $arrConds
     * @return int | array
     * @desc 获取诊疗分类 DS层
     * @author 沈雨康（shenyukang@126.com）
     */
    public function get_illclassdata($arrConds){
        $res = $this->Illclassdao->selects($arrConds);
        if (empty($res)) {
            return EXIT_DATABASE;
        }
        return $res;
    }

    /**
     * @param $arrConds
     * @return int | array
     * @desc 获取科室分类 DS层
     * @author 沈雨康（shenyukang@126.com）
     */
    public function get_office_data($arrConds){
        $res = $this->Officedao->selects($arrConds);
        if (empty($res)) {
            return EXIT_DATABASE;
        }
        return $res;
    }

    /**
     * @param $arrFilds
     * @return int | array
     * @desc 添加诊疗分类 DS层
     * @author 沈雨康（shenyukang@126.com）
     */
    public function add_illclassdata($arrFilds){
        $res = $this->Illclassdao->inserts($arrFilds);
        if (empty($res)) {
            return EXIT_DATABASE;
        }
        return $res;
    }

    /**
     * @param $arrFilds
     * @return int | array
     * @desc 添加科室分类列表 DS层
     * @author 沈雨康（shenyukang@126.com）
     */
    public function add_office_data($arrFilds){
        $res = $this->Officedao->inserts($arrFilds);
        if (empty($res)) {
            return EXIT_DATABASE;
        }
        return $res;
    }

    /**
     * @param $arrConds
     * @param $data
     * @return int | array
     * @desc 更新诊疗分类 DS层
     * @author 沈雨康（shenyukang@126.com）
     */
    public function updata_illclassify_data($arrConds, $data){
        $iidexit = $this->Illclassdao->selects($arrConds);
        if (empty($iidexit)) {
            return 0;
        }
        $row     = $this->Illclassdao->updatas($arrConds, $data);
        if (empty($row)) {
            return EXIT_DATABASE;
        }
        return $row;
    }

    /**
     * @param $arrConds
     * @param $data
     * @return int | array
     * @desc 更新科室分类 DS层
     * @author 沈雨康（shenyukang@126.com）
     */
    public function updata_office_data($arrConds, $data){
        $oidexit = $this->Officedao->selects($arrConds);
        if (empty($oidexit)) {
            return 0;
        }
        $row     = $this->Officedao->updatas($arrConds, $data);
        if (empty($row)) {
            return EXIT_DATABASE;
        }
        return $row;
    }

    /**
     * @param $arrConds
     * @return int | array
     * @desc 删除诊疗分类列表 DS层
     * @author 沈雨康（shenyukang@126.com）
     */
    public function delect_illclassify_data($arrConds){
        $iidexit = $this->Illclassdao->selects($arrConds);
        if (empty($iidexit)) {
            return 0;
        }
        $row     = $this->Illclassdao->delectbyid($arrConds);
        if (empty($row)) {
            return EXIT_DATABASE;
        }
        return $row;
    }

    /**
     * @param $arrConds
     * @return int | array
     * @desc 删除科室分类列表 DS层
     * @author 沈雨康（shenyukang@126.com）
     */
    public function delect_office_data($arrConds){
        $oidexit = $this->Officedao->selects($arrConds);
        if (empty($oidexit)) {
            return 0;
        }
        $row     = $this->Officedao->delectbyid($arrConds);
        if (empty($row)) {
            return EXIT_DATABASE;
        }
        return $row;
    }
}
