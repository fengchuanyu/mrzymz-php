<?php  defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
class Doctor extends CI_Controller{
    public function __construct(){
        parent::__construct();
//            全局变量通过config文件中的申明达到全局使用
//            $this->config->load('config',true);
//            $this->config->item('data');
              $this->load->model('Server/pageServer/Doctorpage');
    }

    public function get_doctor(){

        $did = $_GET['did'];
        $did = intval($did);
        $res = $this->Doctorpage->get_doctor_byid($did);
        echo json_encode($res);
    }
//    public function delect_article_byid(){
//        $aid = $_GET['aid'];
//        $aid = intval($aid);
//        $res = $this->Articlpage->delect_byid($aid);
//        echo json_encode($res);
//
//    }
//
//    /**
//     * @prams null;
//     * @return null;
//     * @author 沈雨康(shenyukang@126.com)
//     * @desc 文章变更（文章修改）通过aid来变更对应的文章字段。
//     */
//    public function uparticle(){
//        $aid            = $_GET['aid'];
//        $articleTitle   = $_GET['article_title'];
//        $articleClass   = $_GET['article_class'];
//        $articleContent = $_GET['article_content'];
//
//        $aid          = intval($aid);
//        $articleClass = intval($articleClass);
//        $res          = $this->Articlpage->upartic($aid, $articleTitle, $articleClass, $articleContent);
//        echo json_encode($res);
//
//    }
//
//
//    /**
//     * @prams null;
//     * @return null;
//     * @author 沈雨康(shenyukang@126.com)
//     * @desc 文章变更（文章修改）通过aid来变更对应的文章字段。
//     */
//    public function insertartil(){
//        $articleTitle   = $_GET['article_title'];
//        $articleClass   = $_GET['article_class'];
//        $articleContent = $_GET['article_content'];
//
//        $articleClass = intval($articleClass);
//        $res          = $this->Articlpage->insertarticl($articleTitle, $articleClass, $articleContent);
//        echo json_encode($res);
//
//    }
}
