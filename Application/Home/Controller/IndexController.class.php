<?php
namespace Home\Controller;

use Base\BaseController;

class IndexController extends BaseController
{

    public function index($id = 1)
    {
        $productTypeModel = D("ProductType");
        $articleModel = D("Article");
        $productTypes = $productTypeModel->dbSelect(["parent_id" => 0]);
        $hotTypes = $productTypeModel->dbSelect(["parent_id" => 0, "hot" => 1]);
        foreach ($hotTypes as &$item) {
            $item['list'] = $articleModel->dbSelectTop(["product_type_id" => $item['id']], 6);
        }

        $articleList = $articleModel->getPage();
        $this->assign('productTypes', $productTypes);
        $this->assign('hotTypes', $hotTypes);
        $this->assign('articleList', $articleList);
        $this->display();
    }
}