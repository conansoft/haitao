<?php

/**
 * Created by PhpStorm.
 * User: conan
 * Date: 16/4/9
 * Time: 下午8:48
 */
namespace Profile\Model;

use  Base\BaseDBModel;

class UsersModel extends BaseDBModel
{
    function __construct()
    {
        parent::__construct('Users');
    }

    protected $_validate = array(
        array('email', 'email', 'Email格式错误！', 1), // 如果输入则验证Email格式是否正确
        array('email', '', '邮箱已经存在！', 1, 'unique', 1), // 验证用户名是否已经存在
        array('name', 'require', '昵称必须！'), // 用户名必须
        array('pwd', '6,30', '密码长度不正确', 0, 'length'), // 验证密码是否在指定长度范围
        array('repwd', 'pwd', '确认密码不一致', 0, 'confirm'), // 验证确认密码是否和密码一致
    );
    protected $_auto = array(
        array('last_time', 'getDate', 2, 'callback'),
        array('reg_time', 'getDate', 1, 'callback'),
    );

    protected function getDate()
    {
        return date("Y-m-d H:i:s");
    }

    public function getStarUsers()
    {
        $sql = "select a.id,a.name,a.collect_num,a.like_num from yy_users a,"
            . "(select user_id from yy_article group by user_id "
            . "order by count(id) desc limit 5) b where a.id=b.user_id";
        return $this->dbQuery($sql);
    }
}