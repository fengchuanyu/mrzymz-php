<?php defined('BASEPATH') OR exit('No direct script access allowed');
//可以在这里进行同一个页面的多个接口的编写，然后可以在pageserver层设计相关的
//状态码和data的组装规范输出以及相关的相关的权限判断和过滤操作
    class Articlpage extends CI_Model{
        public function getArticle(){
            $this->load->model('Server/dataServer/Articld');
            $res = $this->Articld->getArticldata();
            return $res;
        }
}

