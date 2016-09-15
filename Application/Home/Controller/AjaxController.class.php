<?php
namespace Home\Controller;

use Base\BaseController;

class AjaxController extends BaseController
{

    public function isWorth()
    {
        //$ip = get_real_ip();
        $pid = I('post.pid');
        $worth = I('post.worth');
        if (intval($pid) > 0) {
            $pids = $_COOKIE['user_set_good'];
            if (empty($pids)) {
                setcookie("user_set_good", $pid, time() + 86400 * 7,'/');
            } else {
                $pidArray = explode(',', $pids);
                if (in_array($pid, $pidArray)) {
                    $this->ajaxReturn(['status' => 0]);
                } else {
                    setcookie("user_set_good", $pids . ',' . $pid, time() + 86400 * 7,'/');
                    $articleModel = M('Article');
                    if ($worth == 1) {
                        $articleModel->where(['id' => $pid])->setInc('worth');
                    } else {
                        $articleModel->where(['id' => $pid])->setInc('not_worth');
                    }
                    $this->ajaxReturn(['status' => 1]);
                }
            }
        } else {
            $this->ajaxReturn(['status' => 0]);
        }
    }

    public function collect()
    {
        $pid = I('post.pid');
        $uid = S('profile_uid');
        if ($uid > 0) {
            $data['user_id'] = $uid;
            $data['article_id'] = $pid;
            $count = M('Collects')->where($data)->count();
            if (!$count) {
                $data['add_time'] = date('Y-m-d H:i:s');
                $r = M('Collects')->add($data);
                if ($r) {
                    M('Article')->where(['id' => $pid])->setInc('collect_num');
                }

                $this->ajaxReturn(['status' => 1, 'msg' => '已收藏']);
            } else {
                $this->ajaxReturn(['status' => 0, 'msg' => '已收藏']);
            }
        } else {
            $this->ajaxReturn(['status' => 0, 'msg' => '请先登录']);
        }

    }

    public function comment(){
        $uid = S('profile_uid');
        if(!empty($uid)&&!empty($_POST)){
            $data['user_id']=$uid;
            $data['article_id']=$_POST['articleId'];
            $data['content']=$_POST['content'];
            $data['add_time']=date('Y-m-d H:i:s');
            $r=D('Comment')->add($data);
            if($r){
                $this->ajaxReturn(['status' => 1, 'msg' => '评论成功']);
            }else{
                $this->ajaxReturn(['status' => 0, 'msg' => '评论失败']);
            }
        }else{
            $this->ajaxReturn(['status' => 0, 'msg' => '请先登录']);
        }
    }
}