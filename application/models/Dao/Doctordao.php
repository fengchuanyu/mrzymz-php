<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
// dao层是对独立一张表的数据库基本查询，会包括对该表的基本"增删改"操作。
class Doctordao extends CI_Model
{
    var $table = 'doctor';

    public function select($arrayFiles){
        $res = $this->db->get_where($this->table, $arrayFiles);
        return $res->result();
    }

    public function delectbyid($arraycon){
        $this->db->delete($this->table, $arraycon);
        return $this->db->affected_rows();
    }

    public function updocdao($arrayCon, $arrayfilds){

        $this->db->update($this->table, $arrayfilds, $arrayCon);
        return $this->db->affected_rows();
    }

    public function add_docdao($arrayField){
        $this->db->insert($this->table, $arrayField);
        return $this->db->affected_rows();
    }
}

