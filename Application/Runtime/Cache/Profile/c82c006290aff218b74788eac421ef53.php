<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/Public/css/header.css" rel="stylesheet" type="text/css" />
    <link href="/Public/css/footer.css" rel="stylesheet" type="text/css" />
    <script src="/Public/js/jquery.js"></script>
    <script src="/Public/js/common.js"></script>
    <title>海淘首页</title>
</head>

<body>
<header>
    <div class="headtop">
        <div class="headtop1">
            <div class="headlogo"><a href="#"><img src="/Public/images/logo.png" width="159" height="50" /></a></div>
            <div class="headsearch">
                <form>
                    <input value="请输入您要的东西" type="search" />
                    <button type="submit" value="search">搜索</button>
                </form>
            </div>
            <div class="headguanlian">咨询电话：400-000-0000</div>
        </div>
    </div>
    <div class="navBarWrap">
        <div class="navBar">
            <nav>
                <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; if($item["id"] == $id): ?><a class="active" href="<?php echo ($item["url"]); ?>"> <?php echo ($item["name"]); ?></a>
                        <?php else: ?>
                        <a  href="<?php echo ($item["url"]); ?>"> <?php echo ($item["name"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
               </nav>

            <div class="navlogin">
                <?php if(!empty($p_uid)){ ?>
                <a href="<?= U('Profile/User/index') ?>" class="navBarRegister"><?=$p_uname?></a>|<a href="javascript:void(0)" class="navBarRegister">退出</a>
                <?php } else {?>
                <a href="<?= U('Profile/User/register') ?>" class="navBarRegister">注册</a>|
                <a href="<?= U('Profile/User/login') ?>"  class="zhiyou_login">登录<span class="line"></span></a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</header>
<link href="/Public/css/Personal.css" rel="stylesheet" type="text/css" />
<section class="wrap">
    <!-- pop-title -->
    <div class="pop-title">
        <div class="pop_name">登录</div><a href="<?= U('Profile/User/register') ?>" class="a_underline">注册</a>    </div>
    <!-- pop-title end -->

    <!-- pop-content -->
    <div class="pop-content">
        <form class="form-content" id="login_form">
            <!-- form-item -->
            <div class="form-item">
                <div class="item-tip">用户名/邮箱</div>
                <input class="form-input" name="email" value="" id="email" tabindex="1" type="text" placeholder="请输入邮箱" >
                <span class="error"></span>
            </div>
            <!-- form-item end -->
            <!-- form-item -->

            <div class="form-item">
                <div class="item-tip">密码</div>
                <input id="pwd" class="form-input" name="pwd" type="password" placeholder="请输入密码">
                <span class="error"></span>
            </div>
            <div class="twoWeeks"><input class="ckeckBox" checked="checked" tabindex="6" type="checkbox"><label for="agreement"><a href="#" class="a_underline" target="_blank">一个月内免登录</a>     <a href="#" class="a_underline" target="_blank">忘记密码？</a></label></div>


            <p class="notice_error notice_error_300 "></p>
            <!-- form-item end -->
            <input class="btn_reg btn_regred" value="登&nbsp;&nbsp;录" tabindex="7" type="button" onclick="login()">
        </form>

        <!--<div class="co_login">联合登录<a href="http://zhiyou.smzdm.com/user/third/sina?redirect_to=http%3A%2F%2Fzhiyou.smzdm.com%2F" class="a_underline">新浪微博</a>-->
        <!--<a href="http://zhiyou.smzdm.com/user/third/tencent?redirect_to=http%3A%2F%2Fzhiyou.smzdm.com%2F" class="a_underline">腾讯微博</a>-->
        <!--<a href="http://zhiyou.smzdm.com/user/third/qq?redirect_to=http%3A%2F%2Fzhiyou.smzdm.com%2F" class="a_underline">腾讯QQ</a>-->
        <!--<a href="http://zhiyou.smzdm.com/user/third/wmw?redirect_to=http%3A%2F%2Fzhiyou.smzdm.com%2F" class="a_underline">我买网</a>-->
        <!--</div>-->
    </div>
    <!-- pop-content end -->

</section>
<script>
    function login() {
        if($("#email").val().isEmpty()){
            $("#email").next(".error").html('请填写登陆邮箱');
            return;
        }
        else{
            if(!$("#email").val().isEmail())
            {
                $("#email").next(".error").html('邮箱格式不正确');return;
            }
            else{
                $("#email").next(".error").html('');
            }

        }
        if($("#pwd").val().isEmpty()){
            $("#pwd").next(".error").html('请填写登陆密码');
            return;
        }
        else{
            $("#pwd").next(".error").html('');
        }
        $.ajax({
            url: "<?= U('Profile/User/login') ?>",
            data: $("#login_form").serialize(),
            type: "POST",
            dataType: "json"
        }).done(function (result) {
            $(".notice_error").html(result.msg);
            if(result.status==true){
                setTimeout(function () {
                    location.href = "<?= U('/') ?>";
                }, 2000);
            }

        })

    }
</script>

<footer>
    <div class="footer">
        <div class="lFloat">
            <div _hover-ignore="1" class="footerTop"> <a href="#" target="_blank">关于我们</a> <a href="#" target="_blank">联系我们</a> <a href="#">招聘专区</a> <a href="#" class="sitemap">网站地图</a> <a href="#">海淘攻略</a> <a href="#">海淘资讯</a> <a href="#">海淘晒物</a> </div>
            <div class="footerLink">
                <div class="linkTitle">友情链接<span>（<a href="http://www.smzdm.com/links">申请</a>）</span></div>
                <ul>
                    <li><a href="http://www.zazhipu.com" target="_blank">杂志铺</a></li>
                    <li><a href="http://bbs.mumayi.com/" target="_blank">安卓论坛</a></li>
                    <li><a href="http://ufo-1.cn/" target="_blank">外星探索网</a></li>
                    <li><a href="http://www.newegg.cn/" target="_blank">新蛋网</a></li>
                    <li><a href="http://www.yougou.com/" target="_blank">优购网</a></li>
                    <li><a href="http://www.zbird.com/" target="_blank">婚戒</a></li>
                    <li><a href="http://www.ebrun.com/" target="_blank">亿邦动力</a></li>
                    <li><a href="http://www.tao3c.com/" target="_blank">高鸿商城</a></li>
                    <li><a href="http://www.sssc.cn" target="_blank">盛世收藏网</a></li>
                    <li><a href="http://www.hi-pda.com/forum/" target="_blank">Hi-pda论坛</a></li>
                    <li><a href="http://www.moonbasa.com/" target="_blank">梦芭莎</a></li>
                    <li><a href="http://www.gome.com.cn/" target="_blank">国美在线</a></li>
                    <li><a href="http://erji.hao123.com/xiaoqingxin" target="_blank">hao123</a></li>
                    <li><a href="http://www.xintian.org/index.html" target="_blank">信天谨游</a></li>
                    <li><a href="http://digi.163.com/" target="_blank">网易数码</a></li>
                </ul>
            </div>
            <div class="info"> 版权所有 本站内容未经书面许可，禁止一切形式的转载。<br>
                © copyright 2010-2016 什么值得买. All rights reserved. 京ICP备12048526号-2 京公网安备 11010602100083 </div>
        </div>
        <div class="rFloat">
            <div class="f_weiXin">
                <div><img src="http://res.smzdm.com/style/images/weixin.png"></div>
                <span><span><i class="icon-weixin"><!--[if lt IE 8]>微信<![endif]--></i></span>smzdm_smzdm</span> </div>
            <div class="f_weiBo"> <span><span><i class="icon-weibo"><!--[if lt IE 8]>微博<![endif]--></i></span><a href="http://weibo.com/smzdm" target="_blank">关注什么值得买微博</a></span> </div>
            <div class="f_Rss"> <span><span><i class="icon-rss"><!--[if lt IE 8]>订阅中心<![endif]--></i></span><a href="http://www.smzdm.com/dingyue" target="_blank">Rss 订阅中心</a></span> </div>
        </div>
    </div>
</footer>
</body>
</html>