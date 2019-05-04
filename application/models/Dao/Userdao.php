<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
// dao层是对独立一张表的数据库基本查询，会包括对该表的基本"增删改"操作。
class Userdao extends CI_Model{
    var $table = 'users';

    public function select($arrConds){
        $res = $this->db->get_where($this->table, $arrConds);
        return $res->result();
    }

    public function delect_byid($arrConds){
        $this->db->delete($this->table, $arrConds);
        return $this->db->affected_rows();
    }
}
