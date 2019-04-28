
<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);//防止notcie爆出
//可以在dataserver层进行对传递过来的数据库查询参数进行拼装成array（）规范形式，
//然后进行对数据库获取到的多张表数据进行组合合并成自自己想要的数据雏形数组。是对Dao层进一步的粒度化
    class Articld extends CI_Model{
        public function __construct(){
            parent::__construct();
            $this->load->model('Dao/Articldao');
            $this->load->model('Dao/Articlecategorize');
        }

        /**
         * @param $aid 文章id
         * @return array
         * @author 沈雨康(shenyukang@126.com)
         * @desc 用于文章页面的渲染数据获取接口1--文章详情
         */
        public function getArticldata($aid){

            $rs = array();
            if (! empty($aid)) {
                $arrayFileds = array(
                    'aid' => $aid
                );
            } else {
                $arrayFileds = array(
                    '1' => 1
                );
            }
            $rs['article'] = $this->Articldao->select($arrayFileds);
            $rs['categor'] = $this->Articlecategorize->select();
            $categorLength = count($rs['categor']);
            $artcilLength  = count($rs['article']);
            for ($i=0; $i<$categorLength; $i++) {
                    for ($j=0; $j<$artcilLength; $j++) {
                        if ($rs['article'][$j]->article_class === $rs['categor'][$i]->cate_id) {
                            $rs['article'][$j]->articl_class = $rs['categor'][$i]->cate_name;
                        }
                    }
            }
            return $rs;
        }

        /**
         * @param $aid 文章id
         * @author 沈雨康（shenyukang@126.com）
         * @return array
         * @desc 文章页通过aid字段删除文章
         */
        public function delect_byid($aid){
          if (empty($aid)) {
              return array(
                  'data'    => 0,
                  'code'    => EXIT_ERROR,
                  'message' => "删除失败，空的文章id"
              );
          } else {

              $arrayCon = array(
                  'aid' => $aid
              );

              $row =$this->Articldao->delectbyid($arrayCon);

              if ($row < 1) {
                  return  array(
                      'data'    => 0,
                      'code'    => EXIT_ERROR,
                      'message' => "删除失败，影响0行，未匹配到aid"
                  );
              } else {
                  return  array(
                      'data'    => $row,
                      'code'    => EXIT_SUCCESS,
                      'message' => "删除成功"
                  );
              }
          }

        }

        /**
         * @param $aid
         * @return array
         * @author 沈雨康(shenyukang@126.com)
         * @desc 文章页通过aid修改更新文章
         */
        public function upartic_byid($aid, $articleTitle, $articleClass, $articleContent){
                $arrayFiles = array(
                    'article_title'   => $articleTitle,
                    'article_class'  => $articleClass,
                    'article_content' => $articleContent
                );
                $arrayCon = array(
                    'aid' => $aid
                );

                if (empty($articleTitle) && empty($articleClass) && empty($articleContent)) {
                     return array(
                         'data'    => 0,
                         'code'    => EXIT_ERROR,
                         'message' => "更新失败，影响0行，没有更改"
                     );
                } else {
                    $row =$this->Articldao->uparticbyid($arrayFiles, $arrayCon);

                    if ($row < 1) {
                        return  array(
                            'data'    => 0,
                            'code'    => EXIT_ERROR,
                            'message' => "更新失败，影响0行，未匹配到的aid"
                        );
                    } else {
                        return  array(
                            'data'    => $row,
                            'code'    => EXIT_SUCCESS,
                            'message' => "修改成功"
                        );
                    }
                }

            }


        /**
         * @param $aid
         * @return array
         * @author 沈雨康(shenyukang@126.com)
         * @desc 文章页通过aid修改更新文章
         */
        public function insertarticle($articleTitle, $articleClass, $articleContent){

            if (empty($articleTitle) && empty($articleClass) && empty($articleContent)) {
                return array(
                    'data'    => 0,
                    'code'    => EXIT_ERROR,
                    'message' => "新增失败，文章（标题，分类，内容）不能为空"
                );
            } else {
                $time = time();
                $arrayFiles = array(
                    'article_title'   => $articleTitle,
                    'article_class'   => $articleClass,
                    'article_content' => $articleContent,
                    'article_time'    => $time
                );

                $row =$this->Articldao->insert($arrayFiles);

                if ($row < 1) {
                    return  array(
                        'data'    => 0,
                        'code'    => EXIT_DATABASE,
                        'message' => "新增失败，数据库错误"
                    );
                } else {
                    return  array(
                        'data'    => $row,
                        'code'    => EXIT_SUCCESS,
                        'message' => "新增成功"
                    );
                }
            }

        }

}
