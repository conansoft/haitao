<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/Public/css/header.css" rel="stylesheet" type="text/css" />
    <link href="/Public/css/footer.css" rel="stylesheet" type="text/css" />
    <link href="/Public/css/list.css" rel="stylesheet" type="text/css" />
    <link href="/Public/css/info.min.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/css/icon.css" rel="stylesheet" type="text/css"/>
    <script src="/Public/js/jquery-1.6.1.min.js"></script>
    <title>个人中心</title>
</head>

<body>
<header>
    <div class="navBarWrap fixed">
        <div class="navBar">
            <nav>
                <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; if($item["id"] == $id): ?><a class="active" href="<?php echo ($item["url"]); ?>"> <?php echo ($item["name"]); ?></a>
                        <?php else: ?>
                        <a  href="<?php echo ($item["url"]); ?>"> <?php echo ($item["name"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </nav>
            <div class="navbaoliao"><a href="<?= U('Profile/User/publish') ?>">爆料投稿</a></div>
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
    <div class="headtop pertop">
        <div class="headtop1">
            <div class="headlogo"><a href="#"><img src="/Public/images/logo.png" width="159" height="50" /></a></div>
            <div class="persearch">
                <form>
                    <input value="请输入您要的东西" type="search" />
                    <button type="submit" value="search">搜索</button>
                </form>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</header>
<link href="/Public/css/content.css" rel="stylesheet" type="text/css"/>
<link href="/Public/css/pagination.css" rel="stylesheet" type="text/css"/>
<div class="container">
    <div class="cont-left">
        <!-- self-info start 个人简介 -->
        <div class="self-info">
            <div class="face-stuff">
                <div class="face-stuff-img"><a href="#">
                    <div style="display:none;" class="change-face"><span>更换头像</span></div>
                </a>
                    <!-- <a href="javascript:void(0);" style="cursor: default;"><div class="change-face" style="display: none;"><span>Lv2可更换</span></div></a> -->
                    <img src="<?=(!empty($user['icon'])?$user['icon']:'/Public/images/default_middle.png')?>"></div>
            </div>
            <div class="cut-line"></div>
            <div class="info-stuff">
                <div class="info-stuff-set"><span class="info-stuff-nickname" style="max-width: 143px;"><a
                        href="#"> <?=$user['name']?> </a></span> <span class="special-adjust">
          <!-- <i class="icon-xiaobian" title="官方编辑"></i> -->
          <a class="info-stuff-action my-massage-tip" href="#"><i class="icon-wodexiaoxi"></i><span>我的消息</span></a> <a
                        class="info-stuff-action" href="#"><i class="icon-jifenduihuan"></i><span>积分兑换</span></a> <a
                        class="info-stuff-action" href="#"><i
                        class="icon-zhanghushezhi"></i><span>账户设置</span></a> </span></div>
                <div class="info-stuff-assets">
                    <div class="assets-part assets-points"><span class="assets-part-element assets-num">20</span> <span
                            class="assets-part-element assets-title">积分</span></div>
                    <div class="assets-part assets-experience"><span class="assets-part-element assets-num">20</span>
                        <span class="assets-part-element assets-title">经验</span></div>
                    <div class="assets-part assets-gold"><span class="assets-part-element assets-num">0</span> <span
                            class="assets-part-element assets-title">金币</span></div>
                    <div class="assets-part assets-prestige"><span class="assets-part-element assets-num">0</span> <span
                            class="assets-part-element assets-title">威望</span></div>
                </div>
                <div class="info-stuff-words" style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">
                    LV3等级用户可以编辑个人简介，参考<a href="#" target="_blank" title="用户积分计划">用户积分计划</a>。
                </div>
            </div>
        </div>
        <!-- self-info end 个人简介 --> <!-- navtab start tab导航栏 navtab-selected 选中状态 -->
        <ul class="navtab" data-selecttab="index">
            <?php if(is_array($categoryList)): $k = 0; $__LIST__ = $categoryList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($k % 2 );++$k;?><li data-id="<?php echo ($category["id"]); ?>" class="navtab-title <?php echo ($k==1?'index navtab-selected':''); ?>"><a
                        href="javascript:void(0)"><?php echo ($category["name"]); ?>&nbsp;<?php echo ($category["count"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            <li data-id="998" class="navtab-title comment"><a href="#">评论&nbsp;0</a></li>
            <li data-id="999" class="navtab-title favorite"><a href="#">收藏&nbsp;0</a></li>
        </ul>
        <!-- navtab start tab导航栏 -->
        <?php if(is_array($categoryList)): $i = 0; $__LIST__ = $categoryList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?><div class="article_list" style="display: none">
                <?php if(is_array($category["article"]["data"])): $i = 0; $__LIST__ = $category["article"]["data"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?><div class="search-list" style="padding-left: 10px;">
                        <div class="search-list-left"><a href="#" target="_blank" title=""> <span></span><img
                                src="<?php echo ($article["cover"]); ?>" alt=""></a></div>
                        <div class="search-list-right">
                            <div class="list-title"><a href="#" target="_blank" title=""><?php echo ($article["title"]); ?></a></div>
                            <div class="list-detail"><?php echo ($article["content"]); ?></div>
                            <div class="list-stuff">

                            </div>
                        </div>
                    </div>
                    <div class="list-line"></div><?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="green-black"><?php echo ($category['article']['page']); ?></div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <script>$(function () {
            $('.article_list:eq(0)').show();
            $('.navtab-title').click(function () {
                $('.article_list').hide();
                $('.article_list').eq($(this).index()).show();
                $('.navtab-title').removeClass('navtab-selected');
                $(this).addClass('navtab-selected');
            });
        })</script>
    </div>
    <div class="cont-right">
        <!-- top start 原创达人排行榜 -->
        <div class="top-title">原创达人榜</div>
        <div class="line-solid"></div>
        <?php if(is_array($starUsers)): $k = 0; $__LIST__ = $starUsers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$starUser): $mod = ($k % 2 );++$k;?><div class="top-element">
                <div class="top-number"><?php echo ($k); ?>
                    <div class="top-number-part"></div>
                </div>
                <div class="leftPicBlock">
                    <a href="#" target="_blank">
                        <img alt="" title=""
                             src="http://res-c1.smzdm.com/smzdm_user_manager/data/avatar/003/27/58/43_avatar_small.jpg?1429785364"
                             class="avatar avatar-36 photo avatar-default">
                    </a>
                </div>
                <div class="top-nikename"><a href="#" target="_blank"><?php echo ($starUser["name"]); ?></a></div>
                <div class="top-action"><i class="icon-zan2"><!--[if lt IE 8]>赞<![endif]--></i><?php echo ($starUser["like_num"]); ?> <i
                        class="icon-collect">
                    <!--[if lt IE 8]>收藏<![endif]--></i><?php echo ($starUser["collect_num"]); ?>
                </div>
            </div>
            <div class="line-dashed"></div><?php endforeach; endif; else: echo "" ;endif; ?>
        <!-- top end 原创达人排行榜 -->

    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('.page').live('click', function () {
            var url = $(this).data('href');
            var categoryId = $('.navtab-selected').data('id');
            $.ajax({
                type: "POST",
                url: url,
                data: {cid: categoryId},
                dataType: "json",
                success: function (data) {
                    var list = data.data;
                    var listHtml = '';
                    for (var i = 0; i < list.length; i++) {
                        listHtml += '<div class="search-list" style="padding-left: 10px;">'
                                + '<div class="search-list-left"><a href="#" target="_blank" title=""> ' +
                                '<span></span><img src="' + list[i]["cover"] + '" alt=""></a></div>'
                                + '<div class="search-list-right">'
                                + '<div class="list-title"><a href="#" target="_blank" title="">' + list[i]["title"] + '</a></div>'
                                + ' <div class="list-detail">' + list[i]["content"] + '</div>'
                                + '<div class="list-stuff"></div></div></div>'
                                + '<div class="list-line"></div>';
                    }
                    listHtml += ' <div class="green-black">' + data.page + '</div>';
                    $('.article_list:visible').html(listHtml);
                    var pos = $('.navtab-selected').offset().top - 50;
                    $("html,body").animate({scrollTop: pos}, 500);
                }
            });
        })
    })
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