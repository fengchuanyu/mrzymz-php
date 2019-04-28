<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
//可以在这里进行同一个页面的多个接口的编写，然后可以在pageserver层设计相关的
//状态码和data的组装规范输出以及相关的相关的权限判断和过滤操作
    class Articlpage extends CI_Model{

        public function __construct(){
            parent::__construct();
            $this->load->model('Server/dataServer/Articld');
        }

        /**
         * @deprecated '获取数据库中信息按照文章id，默认不传id全查询'
         * @return array $res
         * @author 沈雨康(shenyukang@126.com)
         * @desc 用于获取文章信息（data层）
         */
        public function get_article_byid($aid){
            $res = $this->Articld->getArticldata($aid);
            return $res;
        }

        public function delect_byid($aid){
            return $this->Articld->delect_byid($aid);;
        }

        public function upartic($aid, $articleTitle, $articleClass, $articleContent){
            if (empty($aid)) {
                return array(
                    'data'    => 0,
                    'code'    => EXIT_ERROR,
                    'message' => "修改失败，空的文章id"
                );
            } else {
                return $this->Articld->upartic_byid($aid, $articleTitle, $articleClass, $articleContent);
            };


        }

        public function insertarticl($articleTitle, $articleClass, $articleContent){
                return $this->Articld->insertarticle($articleTitle, $articleClass, $articleContent);
        }
}

