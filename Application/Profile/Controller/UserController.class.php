<?php
namespace Profile\Controller;

use Base\BaseController;
use Think\Page;

class UserController extends BaseController
{

    public function index()
    {
        if (empty(S("profile_uid"))) {
            $this->redirect("/");
        } else {
            $uid = S("profile_uid");
            $user = D('Users')->dbGet($uid);
            if (IS_POST && intval($_POST['cid']) > 0) {
                $categoryId = $_POST['cid'];
                $where['category_id'] = $categoryId;
                $article = D("Home/Article");
                $data = $article->getPage($where);
                $this->ajaxReturn($data);
            } else {
                $category = D('Home/Category');
                $categoryList = $category->getCategory($uid);
                $article = D("Home/Article");
                foreach ($categoryList as &$category) {
                    $where['category_id'] = $category['id'];
                    $category['article'] = $article->getPage($where);
                }
                $starUsers = D('Users')->getStarUsers();
                $this->assign('user', $user);
                $this->assign('categoryList', $categoryList);
                $this->assign('starUsers', $starUsers);
                $this->display();
            }
        }
    }

    public function register()
    {
        if (IS_POST) {
            if (empty($_POST['captcha']) || empty($_SESSION['authcode'])) {
                $this->ajaxReturn(array("status" => false, "msg" => '请填写验证码'));
            } else {
                if ($_SESSION['authcode'] !== $_POST['captcha']) {
                    $this->ajaxReturn(array("status" => false, "msg" => '验证码有误'));
                }
            }
            $User = D("Users"); // 实例化User对象
            if (!$User->create()) {
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                $this->ajaxReturn(array("status" => false, "msg" => $User->getError()));
            } else {
                $User->pwd = md5_encrypt($User->pwd);
                $uid = $User->add();
                if ($uid) {
                    $this->ajaxReturn(array("status" => true, "msg" => '注册成功!'));
                } else {
                    $this->ajaxReturn(array("status" => false, "msg" => '用户创建失败,请联系管理员'));
                }
            }
        } else {
            $this->display();
        }
    }

    public function login()
    {
        if (IS_POST) {
            if (isset($_POST['email']) && isset($_POST['pwd'])) {
                $where = array("email" => $_POST['email']);
                $User = D("Users"); // 实例化User对象
                $data = $User->dbFind($where);
                if ($data['pwd'] == md5_encrypt($_POST['pwd'])) {
                    S('profile_uid', $data['id'], 3600 * 24);
                    S('profile_uname', $data['name'], 3600 * 24);
                    $this->ajaxReturn(array("status" => true, "msg" => "登录成功"));
                } else {
                    $this->ajaxReturn(array("status" => false, "msg" => '用户名或密码错误'));
                }
            } else {

            }
        } else {
            $this->display();
        }
    }

    public function publish()
    {
        if (IS_POST) {
            $post = $_POST;
            $article = D('Home/Article');
            $data['title'] = $post['title'];
            $data['tag'] = $post['tag'];
            $data['category_id'] = $post['category'];
            $data['country_id'] = $post['country'];
            $data['user_id'] = S('profile_uid');
            $data['content'] = $post['editorValue'];
            $data['cover'] = $post['photo'];
            $data['create_time'] = date('Y-m-d H:i:s');
            if($post['check_source']=='on'){
                $data['source_name'] =$post['source_name'];
                $data['source_url'] =$post['source_url'];
                $data['source_price'] =$post['source_price'];
            }
            if(!empty($post['tags'])){
                $tagModel=D("Home/Tag");
                $tag_array=explode(',',$post['tags']);
                for($i=0;$i<count($tag_array);$i++){
                    $where['tag_name']=$tag_array[$i];
                   $tag=$tagModel->dbFind($where);
                    if($tag){

                    }
                }
            }
            $r = $article->add($data);
            if ($r) {
                $this->ajaxReturn(array("status" => 'true'));
            } else {
                $this->ajaxReturn(array("status" => 'false', 'message' => '保存失败'));
            }
        } else {
            $category = D('Home/Category');
            $where = array("parent_id" => 0, "is_delete" => 0);
            $categoryList = $category->dbSelect($where);
            $country = D('Country');
            $country_where = array("parent_id" => 0, "is_delete" => 0);
            $countryList = $country->dbSelect($country_where);
            $this->assign("countryList", $countryList);
            $this->assign("categoryList", $categoryList);
            $this->display();
        }
    }

    public function upload()
    {
        $res["error"] = "";//错误信息
        $res["msg"] = "";//提示信息
        $file = date('y') . '/' . date('m') . '/' . date('d') . '/';
        $path = realpath(__ROOT__) . C('UPLOAD_PATH') . $file;
        $web_path = C('UPLOAD_PATH') . $file;
        if (!is_dir($path)) {
            mkdir(iconv("UTF-8", "GBK", $path), 0777, true);
        }
        $filename = uniqid(date('z')) . strrchr($_FILES['fileToUpload']['name'], '.');
        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $path . $filename)) {
            $res["imgurl"] = $web_path . $filename;
        } else {
            $res["error"] = "error";
        }
        echo json_encode($res);
    }
}