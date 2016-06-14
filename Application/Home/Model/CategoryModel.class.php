<?php

/**
 * Created by PhpStorm.
 * User: conan
 * Date: 16/4/9
 * Time: 下午3:56
 */
namespace Home\Model;
use  Base\BaseDBModel;

class CategoryModel extends BaseDBModel
{
    function __construct()
    {
        parent::__construct('Category');
    }
    public function getCategory($uid){
        $sql='select id,name,(select count(b.id) from yy_article b where b.category_id=a.id
        and b.user_id='.$uid.' and b.is_delete=0) as count from yy_category a where a.parent=0 and a.is_delete=0';
        return $this->dbQuery($sql);
    }
}