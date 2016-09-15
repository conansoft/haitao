<?php
/**
 * Created by PhpStorm.
 * User: conan
 * Date: 16/6/20
 * Time: 上午12:14
 */

namespace Home\Model;
use  Base\BaseDBModel;


class TagModel extends BaseDBModel
{
    function __construct()
    {
        parent::__construct('Tag');
    }

}