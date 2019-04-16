<?php  defined('BASEPATH') OR exit('No direct script access allowed');

    class Articlectro extends CI_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function getArticlmessage(){
            $this->load->model('Server/pageServer/Articlpage');
//             全局变量通过config文件中的申明达到全局使用
//            var_dump ($this->config->load('config',true));
//            var_dump ($this->config->item('return_data'));
            $res = $this->Articlpage->getArticle();
            echo json_encode($res);
        }
        public function pagesT(){
            $this->load->model('Server/pageServer/Pagetest');
            $res = $this->Pagetest->pageSerTest();
            die();
        }
}
