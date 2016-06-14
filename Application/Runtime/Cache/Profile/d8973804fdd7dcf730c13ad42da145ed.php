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
        <div class="pop_name">注册<span class="grey">与网友进行讨论及互动；收藏您喜欢的文章和内容；积累积分兑换商家优惠券；爆料并获取金币奖励，兑换礼品</span></div><a href="<?=U('Profile/User/login')?>" class="a_underline">登录</a>    </div>
    <!-- pop-title end -->

    <!-- pop-content -->
    <div class="pop-content">
        <form class="form-content" id="reg_form">
            <!-- form-item -->
            <div class="form-item">
                <div class="item-tip">邮箱</div>
                <input class="form-input" name="email" value="" tabindex="1" type="text" placeholder="请输入邮箱" >
                <span class="error"></span>
            </div>
            <!-- form-item end -->
            <!-- form-item -->

            <div class="form-item">
                <div class="item-tip">密码</div>
                <input id="password" class="form-input" name="pwd" tabindex="2"  type="password" placeholder="请输入密码">
                <span style="display:none;" class="error">不能为空</span>
                <span class="grey">6 - 20位</span>
            </div>
            <!-- form-item end -->
            <!-- form-item -->
            <div class="form-item">
                <div class="item-tip">确认密码</div>
                <input id="password2" class="form-input" name="repwd" tabindex="3" type="password" placeholder="请确认密码">
                <span class="error"></span>
            </div>
            <!-- form-item end -->
            <!-- form-item -->
            <div class="form-item">
                <div class="item-tip">用户昵称</div>
                <input id="nickname" class="form-input" name="name" value="" tabindex="4" type="text" placeholder="请输入用户昵称">
                <span class="error"></span>
                <span class="grey">允许用中英文、数字、下划线，提交后不可修改</span>
            </div>
            <!-- form-item end -->
            <!-- form-item -->

            <div class="captchaBox">
                <div class="form-item">
                    <div class="item-tip">验证码</div>
                    <input class="form-input" name="captcha" autocomplete="off" tabindex="5" type="text" placeholder="请输入验证码">
                </div>
                <div class="captcha_imgBox">
                    <img id="captcha_img" src="/captcha.php?r=<?php echo rand();?>" title="看不清?点击更换" alt="看不清?点击更换">
                </div>
                <span class="refresh">看不清?<a href="javascript:void(0);" onclick="document.getElementById('captcha_img').src='/captcha.php?r='+Math.random()" class="a_underline">点击更换</a></span>

            </div>


            <div class="twoWeeks"><input class="ckeckBox" checked="checked" tabindex="6" type="checkbox"><label for="agreement">同意"<a href="#" class="a_underline" target="_blank">什么值得买用户使用协议</a>"</label></div>

            <!-- form-item end -->
            <input class="btn_reg btn_reggreen" value="注&nbsp;&nbsp;册" tabindex="7" onclick="register()" type="button">
            <p class="notice_error notice_error_300 "></p>
        </form>
    </div>
    <!-- pop-content end -->

</section>
<script>
    function register() {
        $.ajax({
            url: "<?= U('Profile/User/register') ?>",
            data: $("#reg_form").serialize(),
            type: "POST",
            dataType: "json"
        }).done(function (result) {
            $('#captcha_img').attr('src','/captcha.php?r='+Math.random());
            $(".notice_error").html(result.msg);
            if(result.status==true){
                setTimeout(function () {
                    location.href = "<?= U('Profile/User/login') ?>";
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