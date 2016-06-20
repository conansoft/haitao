<?php
/**
 * Created by PhpStorm.
 * User: conan
 * Date: 16/4/27
 * Time: 下午10:54
 */
namespace Home\Model;

use  Base\BaseDBModel;
use Think\Page;

class ArticleModel extends BaseDBModel
{
    function __construct()
    {
        parent::__construct('Article');
    }

    public function getPage($where = '1=1',$order="id desc")
    {

        $count = $this->dbCount($where);//获取符合条件的数据总数count
        $page = new Page($count, 10);//实例化page类，传入数据总数和每页显示10条内容
        $limit = $page->firstRow . ',' . $page->listRows;//每页的数据数和内容$limit
        $result = $this->where($where)->limit($limit)->order($order)->select();//分页查询结果
        $data['data'] = $result;
        $data['page'] = $page->show();
        return $data;
    }
}