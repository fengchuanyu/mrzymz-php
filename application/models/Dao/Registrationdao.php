<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
// dao层是对独立一张表的数据库基本查询，会包括对该表的基本"增删改"操作。
ini_set('display_errors','Off');
error_reporting(NULL);
class Registrationdao extends CI_Model{
    var $table = 'registration';
//  挂号管理表
    public function selects($arrayCons){
        $res = $this->db->get_where($this->table, $arrayCons);
        return $res->result();
    }

}