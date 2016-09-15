<?php
namespace Home\Controller;

use Base\BaseController;

class ArticleController extends BaseController
{

    public function alist($t, $kw = null)
    {

        if(IS_POST){
            $where['title'] = array('like', '%' . $kw . '%');
        }else{
            $where['category_id'] = $t;
            $where['title'] = array('like', '%' . $kw . '%');
        }
        $articleModel = D('Article');
        $articleList = $articleModel->getPage($where);
        foreach ($articleList['data'] as $key => $value) {
            $pids = $_COOKIE['user_set_good'];
            if (empty($pids)) {
                $articleList['data'][$key]['setGood'] = 0;
            } else {
                $pidArray = explode(',', $pids);
                if (in_array($value['id'], $pidArray)) {
                    $articleList['data'][$key]['setGood'] = 1;
                } else {
                    $articleList['data'][$key]['setGood'] = 0;
                }
            }
        }
        $this->assign('articleList', $articleList);
        $this->display('list');
    }

    public function detail($id)
    {
        if (intval($id) > 0) {
            $articleModel = D('Article');
            $articleTagModel = D('ArticleTag');
            $commentModel=D('Comment');
            $article = $articleModel->find($id);
            $tags = $articleTagModel->getTagByArticle($id);
            $commentList=$commentModel->getCommentByArticle($id);
            $pids = $_COOKIE['user_set_good'];
            if (empty($pids)) {
                $setWorth = 0;
            } else {
                $pidArray = explode(',', $pids);
                if (in_array($id, $pidArray)) {
                    $setWorth=1;
                } else {
                    $setWorth=0;
                }
            }
            if(!empty(S('profile_uid'))){
                $user=D('Users')->find(S('profile_uid'));
                $this->assign('user', $user);
            }
            $this->assign('setWorth', $setWorth);
            $this->assign('article', $article);
            $this->assign('articleTags', $tags);
            $this->assign('commentList', $commentList);
            $this->display();
        }

    }
}