
<?php defined('BASEPATH') OR exit('No direct script access allowed');
//可以在dataserver层进行对传递过来的数据库查询参数进行拼装成array（）规范形式，
//然后进行对数据库获取到的多张表数据进行组合合并成自自己想要的数据雏形数组。是对Dao层进一步的粒度化
    class Articld extends CI_Model{
        /**
         * @param $gets
         * @return int
         * @author shenyukang(shenyukang@126.com)
         * @desc 用于文章页面的渲染数据获取接口1--文章详情
         */
        public function getArticldata(){
            $this->load->model('Dao/Articldao');
            $this->load->model('Dao/Articlecategorize');
            $rs = array();
            $rs['article'] = $this->Articldao->select();
            $rs['categor'] = $this->Articlecategorize->select();
            $categorLength = count($rs['categor']);
            $artcilLength = count($rs['article']);
            for ($i=0 ; $i<$categorLength ; $i++) {
                    for ($j=0; $j<$artcilLength; $j++) {
                        if($rs['article'][$j]->article_class == $rs['categor'][$i]->cate_id){
                            $rs['article'][$j]->articl_class = $rs['categor'][$i]->cate_name;
                        }
                    }
            }
            return $rs;
        }
        public function gt($gets){
            if ($gets == 1) {
                $rs = "as you see , i'am ready";
                return $rs;
            } else {
                return 0;
            }
        }

}
