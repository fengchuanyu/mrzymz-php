<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
// dao层是对独立一张表的数据库基本查询，会包括对该表的基本"增删改"操作。
ini_set('display_errors','Off');
error_reporting(NULL);
class Casedao extends CI_Model{
    var $table = 'cases';

    public function insertcase($arrFilds){
        $this->db->insert($this->table, $arrFilds);
        return $this->db->affected_rows();
    }

    public function selects($arrCons){
        return $this->db->get_where($this->table, $arrCons);
    }

    public function delect_dao($arrConf){
        $this->db->delete($this->table, $arrConf);
        return $this->db->affected_rows();
    }

    public function updata_dao($arrFilds, $arrayCon){
        $this->db->update($this->table, $arrFilds, $arrayCon);
        return $this->db->affected_rows();
    }
}
