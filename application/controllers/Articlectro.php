<?php  defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
    class Articlectro extends CI_Controller{
        public function __construct(){
            parent::__construct();
//            全局变量通过config文件中的申明达到全局使用
//            $this->config->load('config',true);
//            $this->config->item('data');
              $this->load->model('Server/pageServer/Articlpage');
        }

        /**
         * @param null
         * @return null
         * @desc 接口： 获取文章列表通过aid，不传递全查
         * @author 沈雨康（shenyukang@126.com）
         */
        public function get_articl_message(){

            $aid = $_POST['aid'];
            $aid = intval($aid);
            $res = $this->Articlpage->get_article_byid($aid);
            if (! empty($res)) {//php中注意0也表示为empty的
                echo json_encode(array(
                    'data'=>$res,
                    'code'=>EXIT_SUCCESS,
                    'message'=>"sucess"
                ));
            } elseif (empty($res)) {//基本不是第一种情况就是第二种情况了
                echo json_encode(array(
                    'data'=>0,
                    'code'=>EXIT_ERROR,
                    'message'=>"查询接口返回为空，查询错误或者无数据"
                ));
            }

        }

        /**
         * @param null
         * @return null
         * @desc 接口： 删除文章
         * @author 沈雨康（shenyukang@126.com）
         */
        public function delect_article_byid(){
            $aid = $_POST['aid'];
            $aid = intval($aid);
            $res = $this->Articlpage->delect_byid($aid);
            echo json_encode($res);

        }

        /**
         * @prams null;
         * @return null;
         * @author 沈雨康(shenyukang@126.com)
         * @desc 接口： 文章变更（文章修改）通过aid来变更对应的文章字段。
         */
        public function uparticle(){
            $aid            = $_POST['aid'];
            $articleTitle   = $_POST['article_title'];
            $articleClass   = $_POST['article_class'];
            $articleContent = $_POST['article_content'];

            $aid          = intval($aid);
            $articleClass = intval($articleClass);
            $res          = $this->Articlpage->upartic($aid, $articleTitle, $articleClass, $articleContent);
            echo json_encode($res);

        }


        /**
         * @prams null;
         * @return null;
         * @author 沈雨康(shenyukang@126.com)
         * @desc 接口：新增文章
         */
        public function insertartil(){
            $articleTitle   = $_POST['article_title'];
            $articleClass   = $_POST['article_class'];
            $articleContent = $_POST['article_content'];

            $articleClass = intval($articleClass);
            $res          = $this->Articlpage->insertarticl($articleTitle, $articleClass, $articleContent);
            echo json_encode($res);

        }
}
