<?php defined('BASEPATH') OR exit('No direct script access allowed');
// dao层是对独立一张表的数据库基本查询，会包括对该表的基本"增删改"操作。
class Articldao extends CI_Model{
    var $table = 'article';
    public function select(){
        $res = $this->db->get($this->table);
        return $res->result();
    }
}

