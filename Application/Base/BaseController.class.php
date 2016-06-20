<?php
/**
 * Created by PhpStorm.
 * User: conan
 * Date: 16/4/9
 * Time: 下午4:18
 */
namespace Base;
use Think\Controller;

class BaseController extends Controller
{
    public $category=null;
    public function __construct()
    {
        parent::__construct();
//        if(!empty(S('category'))){
//            $this->category=S('category');
//        }
//        else{
            $categoryMode=D('Home/Category');
            $where=array("is_delete"=>0,"parent"=>0);
            $this->category=$categoryMode->dbSelect($where);
            S('category',$this->category,3600);
        //}
        if(!empty(S('profile_uid'))&&!empty( S('profile_uname')))
        {
            $this->assign('p_uid',S('profile_uid'));
            $this->assign('p_uname',S('profile_uname'));
        }
        $this->assign('category',$this->category);

    }

}