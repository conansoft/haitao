<?php
namespace Home\Controller;

use Base\BaseController;

class IndexController extends BaseController
{

    public function index($id = 1)
    {
        $productTypeModel = D("ProductType");
        $articleModel = D("Article");
        $articleTagModel = D("ArticleTag");
        $productTypes = $productTypeModel->dbSelect(["parent_id" => 0]);
        $hotTypes = $productTypeModel->dbSelect(["parent_id" => 0, "hot" => 1]);
        foreach ($hotTypes as &$item) {
            $item['list'] = $articleModel->dbSelectTop(["product_type_id" => $item['id']], 6);
        }

        $articleList = $articleModel->getPage();
        foreach ($articleList['data'] as $key => $value) {
            $articleList['data'][$key]['tags'] = $articleTagModel->getTagByArticle($value['id']);
            $pids = $_COOKIE['user_set_good'];
            if (empty($pids)) {
                $articleList['data'][$key]['setGood']=0;
            } else {
                $pidArray = explode(',', $pids);
                if (in_array($value['id'], $pidArray)) {
                    $articleList['data'][$key]['setGood']=1;
                } else {
                    $articleList['data'][$key]['setGood']=0;
                }
            }
        }
        $this->assign('productTypes', $productTypes);
        $this->assign('hotTypes', $hotTypes);
        $this->assign('articleList', $articleList);
        $this->display();
    }
}