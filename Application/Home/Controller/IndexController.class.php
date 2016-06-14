<?php
namespace Home\Controller;
use Base\BaseController;

class IndexController extends BaseController {

    public function index($id=1){
        $this->assign('id',$id);
        $this->display();
    }
}