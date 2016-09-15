<?php

namespace Home\Model;
use  Base\BaseDBModel;

class CommentModel extends BaseDBModel
{
    function __construct()
    {
        parent::__construct('Comment');
    }
    public function getCommentByArticle($id){
        $sql='select b.name,b.avatar,a.content,a.praise,a.un_praise,a.add_time from yy_comment a join yy_users b on a.user_id=b.id where a.article_id='.$id;
        return $this->dbQuery($sql);
    }
}