<?php
/**
 * Created by PhpStorm.
 * User: conan
 * Date: 16/4/27
 * Time: 下午11:47
 */
namespace Profile\Model;
use  Base\BaseDBModel;

class CountryModel extends BaseDBModel
{
    function __construct()
    {
        parent::__construct('Country');
    }
}