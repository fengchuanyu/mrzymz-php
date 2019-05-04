<?php  defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
class Doctor extends CI_Controller{
    public function __construct(){
        parent::__construct();
//            全局变量通过config文件中的申明达到全局使用
//            $this->config->load('config',true);
//            $this->config->item('data');
              $this->load->helper(array('form', 'url'));
              $this->load->model('Server/pageServer/Doctorpage');
    }

    /**
     * @prams null;
     * @return null;
     * @author 沈雨康(shenyukang@126.com)
     * @desc 医生列表获取 通过did，没传则全部返回。
     */
    public function get_doctor(){
        $did = $_POST['did'];
        $did = intval($did);
        $res = $this->Doctorpage->get_doctor_byid($did);
        echo json_encode($res);
    }

    /**
     * @author 沈雨康(shenyukang@126.com)
     * @desc 删除医生信息通过did
     */
    public function delect_doctor_byid(){
        $did = $_POST['did'];
        $did = intval($did);
        $res = $this->Doctorpage->delect_byid($did);
        echo json_encode($res);

    }

    /**
     * @prams null;
     * @return null;
     * @author 沈雨康(shenyukang@126.com)
     * @desc 医生信息变更（医生信息变更）通过did来变更对应的医生信息。
     */
    public function updoctor(){

        $config['upload_path']      = '/home/work/uploads/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 1024;
        $config['max_width']        = 0;
        $config['max_height']       = 0;
        $this->load->library('upload', $config);
        //设置了nginx可以直接通过http://148.70.84.137/铭仁中医门诊.png访问一个图片，

        $field_name = "picname";//相当于重写了input表单中name属性为"picname"
        $data       = $this->input->post(array('did', 'doctor_name', 'doctor_message', 'doctor_image', 'doctor_place', 'doctor_office', 'doctor_job', 'doctor_price'), TRUE);
        if (! $this->upload->do_upload($field_name)) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode(array(
                'data'    => 0,
                'code'    => EXIT_ERROR,
                'message' => '图片上传失败:'.$error
            ));
        } else {

            $doctorImage    = 'http://148.70.84.137/'.$this->upload->data('file_name');
            $did            = $data['did'];
            $did            = intval($did);
            $doctorName     = $data['doctor_name'];
            $doctorMessage  = $data['doctor_message'];
            $doctorPlace    = $data['doctor_place'];
            $doctorOffice   = $data['doctor_office'];
            $doctorJob      = $data['doctor_job'];
            $doctorPrice    = $data['doctor_price'];
            $res            = $this->Doctorpage->updoc($did, $doctorName, $doctorImage, $doctorMessage, $doctorPlace, $doctorOffice, $doctorJob, $doctorPrice);
            echo json_encode($res);
        }

    }

    /**
     * @author 沈雨康(shenyukang@126.com)
     * @desc 医生信息的添加
     *
     */
    public function adddoctor(){
        $config['upload_path']      = '/home/work/uploads/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 1024;
        $config['max_width']        = 0;
        $config['max_height']       = 0;
        $this->load->library('upload', $config);

        $field_name = "picname";
        //相当于重写了input表单中name属性为"picname"
        $data       = $this->input->post(array('doctor_name', 'doctor_message', 'doctor_image', 'doctor_place', 'doctor_office', 'doctor_job', 'doctor_price'), TRUE);
        if (! $this->upload->do_upload($field_name)) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode(array(
                'data'    => 0,
                'code'    => EXIT_ERROR,
                'message' => '图片上传失败:'.$error
            ));
        } else {

            $doctorImage    = 'http://148.70.84.137/'.$this->upload->data('file_name');
            $doctorName     = $data['doctor_name'];
            $doctorMessage  = $data['doctor_message'];
            $doctorPlace    = $data['doctor_place'];
            $doctorOffice   = $data['doctor_office'];
            $doctorJob      = $data['doctor_job'];
            $doctorPrice    = $data['doctor_price'];
            $res            = $this->Doctorpage->adddoc($doctorName, $doctorImage, $doctorMessage, $doctorPlace, $doctorOffice, $doctorJob, $doctorPrice);
            echo json_encode($res);
        }
    }
}
