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
                    <input placeholder="请输入您要的东西" type="search" />
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
<link href="/Public/css/content.css" rel="stylesheet" type="text/css"/>
<link href="/Public/css/icon.css" rel="stylesheet" type="text/css"/>
<link href="/Public/css/pagination.css" rel="stylesheet" type="text/css"/>
<section>
    <div class="section">
        <div class="leftwrap">
            <div class="leftguanggao"></div>

            <div class="jierihuod">
                <div class="value_tags"><a><img style="width: 50px" src="/Public/images/richang.png"/></a>
                    <?php if(is_array($hotTypes)): $i = 0; $__LIST__ = $hotTypes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hotType): $mod = ($i % 2 );++$i;?><a class="hot_type" href="javascript:void(0)" data-id="<?php echo ($hotType["id"]); ?>"><?php echo ($hotType["name"]); ?></a>
                        <div class="hot_product" style="display: none;" id="hot_<?php echo ($hotType["id"]); ?>">
                            <?php if(is_array($hotType['list'])): $i = 0; $__LIST__ = $hotType['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?><li><a href="/Article/detail/id/<?php echo ($article["id"]); ?>" target="_blank">
                                    <img style="height: 122px;width: 118px" src="<?php echo ($article["cover"]); ?>"/> <span
                                        class="black"><?php echo ($article["title"]); ?></span>
                                    <span class="red"><?php echo ($article["source_price"]); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <ul class="shangppin">
                    <div class="clear"></div>
                </ul>
                <script>
                    $(function () {
                        var content = $('.hot_product').eq(0).html();
                        $(".shangppin").prepend(content);
                        $('.hot_type').click(function () {
                            var id = "#hot_" + $(this).data('id');
                            var content = $(id).html() + "";
                            $(".shangppin li").remove();
                            $(".shangppin").prepend(content);
                        });
                    })
                </script>
            </div>
            <div class="zhiding">
                <div class="listTitle"><span class="redicon">置顶</span>
                    <h4 class="itemName"><a href="#" target="_blank">爆料赏金计划[第六期]活动开启<span class="red">年货征集/天猫双倍奖励</span>
                    </a></h4>
                </div>
            </div>
            <?php if(is_array($articleList["data"])): $i = 0; $__LIST__ = $articleList["data"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?><div class="list">
                    <div class="listTitle"><a href="#" class="grayicon"><?php echo ($article["countryname"]); ?></a>
                        <h4 class="itemName"><a href="/Article/detail/id/<?php echo ($article["id"]); ?>" target="_blank"><?php echo ($article["title"]); ?>
                            <?php if($article['source_price'] > 0): ?><span class="red"><?php echo ($article["source_price"]); ?>元</span><?php endif; ?>
                        </a></h4>
                        <div class="clear"></div>
                    </div>
                    <a href="/Article/detail/id/<?php echo ($article["id"]); ?>" target="_blank" class="picLeft" title="">
                        <img src="<?php echo ($article["cover"]); ?>" alt="" height="190px" width="190px"> </a>
                    <div class="listRight">
                        <div class="lrTop"><span class="lrTime">14:39</span> <span> 标签：
                            <?php if(is_array($article["tags"])): $i = 0; $__LIST__ = $article["tags"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?><a href="javascript:void(0)"> <?php echo ($tag["tag_name"]); ?> </a><?php endforeach; endif; else: echo "" ;endif; ?>
                             </span>
                        </div>
                        <div class="lrInfo">
                            <?php echo(strLL($article['content'],50)); ?>  <a href="/Article/detail/id/<?php echo ($article["id"]); ?>" target="_blank">阅读全文</a></div>
                        <div class="lrBot">
                            <a data-id="<?php echo ($article["id"]); ?>" href="javascript:void(0)" class="good">
                            <span class="scoreTotal"><b>值</b>
                            <em><?php echo ($article["worth"]); ?></em></span>
                                <span class="scoredInfo" setGood="<?php echo ($article["setGood"]); ?>">已打分</span>
                                <span class="scoreAnimate">+1</span>
                            </a>
                            <a data-id="<?php echo ($article["id"]); ?>" href="javascript:void(0)" class="bad">
                                <span class="scoreTotal">不值 <em><?php echo ($article["not_worth"]); ?></em></span>
                                <span class="scoredInfo" setGood="<?php echo ($article["setGood"]); ?>">已打分</span>
                                <span class="scoreAnimate">+1</span>
                            </a>
                            <a data-id="<?php echo ($article["id"]); ?>" href="javascript:void(0)" class="fav" title="收藏">
                                <i class="icon-collect"></i><em><?php echo ($article["collect_num"]); ?></em></a>
                            <a href="#" class="comment" title="评论" target="_blank">
                                <i class="icon-comment"></i><em><?php echo ($article["comment_num"]); ?></em></a>
                            <?php if(!empty($article['source_url'])): ?><div class="botPart">
                                    <div class="buy"><a href="<?php echo ($article["source_url"]); ?>" target="_blank">直达链接<i>&gt;</i></a>
                                    </div>
                                    <a href="#" class="mall"><?php echo ($article["source_name"]); ?></a></div><?php endif; ?>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>

            <div class="green-black"> <?php echo ($articleList['page']); ?></div>
            <script>
                $(function () {
                    $('.page').live('click', function () {
                        var url = $(this).data('href');
                        location.href = url;
                    });
                    $('.good').live('click', function () {
                        var pid = $(this).data('id');
                        $a=$(this);
                        $.ajax({
                            url: "/Ajax/isWorth",
                            data: {pid: pid, worth: 1},
                            type: 'POST',
                            dataType: 'json',
                            success: function (msg) {
                                if (msg.status == 1) {
                                    $a.find('.scoreAnimate').show(500).hide(500);
                                    setTimeout(function(){
                                        var i=$a.find('em').html();
                                        $a.find('em').html(parseFloat(i)+1);
                                        $a.parent('.lrBot').find('.scoredInfo').attr('setGood','1');
                                    },1000);

                                }
                            },
                            error: function (ret) {
                                alert(ret.responseText);
                            }
                        });
                    }).hover(function(){
                        var set=$(this).find('.scoredInfo').attr('setGood');
                        if(set==1){
                            $(this).find('.scoredInfo').show();
                        }
                    },function(){
                        $(this).find('.scoredInfo').hide();
                    });
                    $('.bad').live('click', function () {
                        var pid = $(this).data('id');
                        $a=$(this);
                        $.ajax({
                            url: "/Ajax/isWorth",
                            data: {pid: pid,worth:0},
                            type: 'POST',
                            dataType: 'json',
                            success: function (msg) {
                                if (msg.status == 1) {
                                    $a.find('.scoreAnimate').show(500).hide(500);
                                    setTimeout(function(){
                                        var i=$a.find('em').html();
                                        $a.find('em').html(parseFloat(i)+1);
                                        $a.parent('.lrBot').find('.scoredInfo').attr('setGood','1');
                                    },1000);
                                }
                            },
                            error: function (ret) {
                                alert(ret.responseText);
                            }
                        });
                    }).hover(function(){
                        var set=$(this).find('.scoredInfo').attr('setGood');
                        if(set==1){
                            $(this).find('.scoredInfo').show();
                        }
                    },function(){
                        $(this).find('.scoredInfo').hide();
                    });;
                    $('.fav').live('click', function () {
                        var pid = $(this).data('id');
                        $a=$(this);
                        $.ajax({
                            url: "/Ajax/collect",
                            data: {pid: pid},
                            type: 'POST',
                            dataType: 'json',
                            success: function (msg) {
                                if (msg.status == 1) {
                                    var i=$a.find('em').html();
                                    $a.find('em').html(parseFloat(i)+1);
                                }
                                else{
                                    alert(msg.msg);
                                }
                            },
                            error: function (ret) {
                                alert(ret.responseText);
                            }
                        });
                    });
                })
            </script>
        </div>
        <div class="rightwrap">
            <div class="rightPanel">
                <div class="userInfo"><a href="#" class="userPic" target="_blank">
                    <img src="/Public/images/default_small.png" alt="头像"></a>
                    <div class="userRight">
                        <?php if(empty($p_uid)): ?><p><a class="zhiyou_login">登录</a>，发现更多精彩</p>
                            <?php else: ?>
                            <div> Hi <em>你好</em></div>

                            <a href="#" title="值友幸运屋" target="_blank">值友幸运屋</a> &nbsp;&nbsp;
                            <a href="#" title="新手入门" target="_blank">新手入门</a>
                    </div>
                    <div class="scoreBox"><a class="signScore" target="_blank">签到领积分</a>
                        <a class="scoreExchange" href="#" target="_blank">积分兑换</a><?php endif; ?>

                    </div>
                </div>
            </div>

            <!-- 分类导航开始 -->
            <div class="rightPanel">
                <div class="mult-nav"><span class="commodity-nav-title mult-nav-hover">分类导航</span></div>
                <div class="commodity-nav" style="display: block;">
                    <?php if(is_array($productTypes)): $i = 0; $__LIST__ = $productTypes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><a target="_blank" href="#"><span><i class="icon-diannaoshuma"></i><?php echo ($item["name"]); ?></span></a><?php endforeach; endif; else: echo "" ;endif; ?>

                </div>


            </div>



        </div>

    </div>
    <div class="clear"></div>
</section>



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