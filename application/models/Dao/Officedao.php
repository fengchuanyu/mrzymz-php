<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
// dao层是对独立一张表的数据库基本查询，会包括对该表的基本"增删改"操作。
class Officedao extends CI_Model{
    var $table = 'offices';

    public function selects($arrConds){
        $res = $this->db->get_where($this->table, $arrConds);
        return $res->result();
    }

    public function inserts($arrFilds){
        $this->db->insert($this->table, $arrFilds);
        return $this->db->affected_rows();
    }

    public function updatas($arrConds, $data){
        $this->db->update($this->table, $data, $arrConds);
        return $this->db->affected_rows();
    }

    public function delectbyid($arraycon){
        $this->db->delete($this->table, $arraycon);
        return $this->db->affected_rows();
    }
}
