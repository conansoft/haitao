<?php
/**
 * Created by PhpStorm.
 * User: conan
 * Date: 16/6/20
 * Time: 下午10:37
 */
namespace Home\Model;

use  Base\BaseDBModel;

class ArticleTagModel extends BaseDBModel
{
    function __construct()
    {
        parent::__construct('ArticleTag');
    }

    public  function getTagByArticle($articleId){
        return $this->join('yy_tag on yy_article_tag.tag_id=yy_tag.id')->field('yy_tag.tag_name')
            ->where(['yy_article_tag.article_id' => $articleId])->select();
    }

}