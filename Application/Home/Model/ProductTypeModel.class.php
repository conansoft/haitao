<?php
/**
 * Created by PhpStorm.
 * User: conan
 * Date: 16/4/26
 * Time: 下午10:45
 */
namespace Home\Model;
use  Base\BaseDBModel;

class ProductTypeModel extends BaseDBModel
{
    function __construct()
    {
        parent::__construct('ProductType');
    }
}