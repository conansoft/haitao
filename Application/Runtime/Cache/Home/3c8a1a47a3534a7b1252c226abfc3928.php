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
<link href="/Public/css/content.css" rel="stylesheet" type="text/css"/>
<link href="/Public/css/icon.css" rel="stylesheet" type="text/css"/>
<link href="/Public/css/xiangqing.css" rel="stylesheet" type="text/css"/>

<section class="wrap">
    <!-- leftWrap-->
    <div class="leftWrap">

        <!--article-->
        <article class="article-details">
            <div class="article-top-box clearfix">
                <!--优惠精选-->
                <!--海淘精选-->
                <a href="#" class="pic-Box" target="_blank"><img src="<?php echo ($article["cover"]); ?>" alt="" style="margin-top:1px"
                                                                 height="249px" width="250px"></a>
                <!--article-right-->
                <div class="article-right">
                    <h1 class="article_title "> <?php echo ($article["title"]); ?><span class="red">
                        <?php if(!empty($article.source_price)): echo ($article["source_price"]); endif; ?></span></h1>
                    <div class="article-meta-box">
                        <div class="article_meta"><span>时间： <?php echo ($article["create_time"]); ?></span></div>
                        <?php if(!empty($article.source_name)): ?><div class="article_meta"><span>商城：<a
                                    href="<?php echo ($article["source_url"]); ?>"><?php echo ($article["source_name"]); ?></a></span></div><?php endif; ?>

                        <div class="article_meta"> <span class="tags">标签：
                            <?php if(is_array($articleTags)): $i = 0; $__LIST__ = $articleTags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?><a href="javascript:void(0)"><?php echo ($tag["tag_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                             </span></div>
                    </div>
                    <div class="clearfix">
                        <?php if(!empty($article.source_url)): ?><div class="buy"><a href="<?php echo ($article["source_url"]); ?>" target="_blank">直达链接<i>&gt;</i></a></div><?php endif; ?>
                    </div>
                </div>
                <!--article-right-->
            </div>

            <!--item-box-->
            <div class="item-box">
                <?php echo ($article["content"]); ?>
            </div>
            <input id="setWorth" value="<?php echo ($setWorth); ?>" type="hidden">
            <input id="articleID" value="<?php echo ($article["id"]); ?>" type="hidden">
            <!--item-box end-->
        </article>


        <!-- scoreWrap -->
        <div class="score_rateBox">
            <div id="details-zhi" class="details_zhi">
                <a href="javascript:void(0);" id="worthCurrent">
                    <i class="icon-worth">
                        <!--[if lt IE 8]>值<![endif]--></i>
                    <span class="addNumber add">+1</span>
                </a>
                <span class="scoredInfo">已打分</span>
            </div>
            <div class="score_rate">
                <span class="grey" id="rating_all_num">已有<?php echo $article['worth']+$article['not_worth'] ?>
                    用户参与</span>
                <meta itemprop="ratingValue" content="75%">
                <div class="progressBox">

                    <div style="width:50%" class="progressing"></div>
                </div>
                <span class="red" id="rating_worthy_num"> <?php echo ($article["worth"]); ?> </span> :
                <span class="grey" id="rating_unworthy_num"> <?php echo ($article["not_worth"]); ?>  </span></div>
            <div id="details-buzhi" class="details_buzhi">
                <a href="javascript:void(0);" id="rating_unworthy">
                    <i class="icon-Unworthy"><!--[if lt IE 8]>不值<![endif]--></i>
                    <span class="addNumber reduce">+1</span>
                </a> <span class="scoredInfo">已打分</span></div>
        </div>
        <!-- scoreWrap end -->
        <script>
            $(function () {
                $('#worthCurrent').bind('click', function () {
                    var pid = $('#articleID').val();
                    $a = $(this);
                    $.ajax({
                        url: "/Ajax/isWorth",
                        data: {pid: pid, worth: 1},
                        type: 'POST',
                        dataType: 'json',
                        success: function (msg) {
                            if (msg.status == 1) {
                                $a.find('.addNumber').show(500).hide(500);
                                setTimeout(function () {
                                    var i = $('#rating_worthy_num').html();
                                    $('#rating_worthy_num').html(parseFloat(i) + 1);
                                    $('#setWorth').val(1);

                                }, 1000);

                            }
                        },
                        error: function (ret) {
                            alert(ret.responseText);
                        }
                    });
                }).hover(function () {
                    var set = $('#setWorth').val();
                    if (set == 1) {
                        $(this).hide();
                        $('.scoredInfo').eq(0).attr('style', 'display:block');
                    }
                }, function () {
                    $(this).show();
                    $('.scoredInfo').eq(0).hide();
                });
                $('#rating_unworthy').live('click', function () {
                    var pid = $(this).data('id');
                    $a = $(this);
                    $.ajax({
                        url: "/Ajax/isWorth",
                        data: {pid: pid, worth: 0},
                        type: 'POST',
                        dataType: 'json',
                        success: function (msg) {
                            if (msg.status == 1) {
                                $a.find('.addNumber').show(500).hide(500);
                                setTimeout(function () {
                                    var i = $('#rating_unworthy_num').html();
                                    $('#rating_unworthy_num').html(parseFloat(i) + 1);
                                    $('#setWorth').val(1);
                                }, 1000);
                            }
                        },
                        error: function (ret) {
                            alert(ret.responseText);
                        }
                    });
                }).hover(function () {
                    var set = $('#setWorth').val();
                    if (set == 1) {
                        $(this).hide();
                        $('.scoredInfo').eq(1).attr('style', 'display:block');
                    }
                }, function () {
                    $(this).show();
                    $('.scoredInfo').eq(1).hide();
                });
            })
        </script>
        <!-- operate_box -->
        <div class="operate_box">
            <div class="pre_next_article"><span>上一篇<a class="a_underline" target="_blank" href="#">TSINGTAO 青岛 崂山10度
                330ml*24听 整箱装 *3箱</a></span> <span>下一篇<a class="a_underline" target="_blank" href="#">Brother 兄弟 AS1450
                多功能缝纫机</a></span></div>
            <div class="operate_icon">
                <div data-bd-bind="1452489914469" class="bdsharebuttonbox operateShare bdshare-button-style0-16"
                     data-tag="share_2"><a href="javascript:void(0);" title="分享" class="bds_more shareWords"
                                           data-cmd="more">分享 +</a></div>
                <a title="收藏" class="fav" id="collect_1_742517" href="javascript:void(0);"><i class="icon-collect">
                    <!--[if lt IE 8]>收藏<![endif]--></i><em>5</em></a> <a title="评论" class="comment" href="#comments"><i
                    class="icon-comment"><!--[if lt IE 8]>评论<![endif]--></i><em class="commentNum">2</em></a></div>
        </div>
        <!-- operate_box end -->

        <!-- guess_like -->
        <div class="guess_like" style="display: none">
            <div class="panelTitle"><span class="custom_page"></span>你可能还喜欢</div>
            <div class="slider uneven banner_page slick-initialized slick-slider">
                <div tabindex="0" class="slick-list">
                    <div style="opacity: 1; width: 4320px; transform: translate3d(-720px, 0px, 0px);"
                         class="slick-track">
                        <div style="width: 180px;" data-slick-index="-4" class="slick-slide slick-cloned"><a href="#"
                                                                                                             target="_blank"
                                                                                                             class="picBox">
                            <img src="http://y.zdmimg.com/201601/08/568f7debb9d867386.png_d200.jpg" alt=""
                                 style="margin-top:0px" height="168px" width="168px"> </a> <a href="#" target="_blank"
                                                                                              class="sliderTitle"> 上海-岘港
                            5天4晚自由行（往返含税机票+4星酒店4晚+接送机） <span class="red">1999元</span> </a></div>
                        <div style="width: 180px;" data-slick-index="-3" class="slick-slide slick-cloned"><a href="#"
                                                                                                             target="_blank"
                                                                                                             class="picBox">
                            <img src="http://y.zdmimg.com/201512/28/5680def6932d35855.png_d200.jpg" alt=""
                                 style="margin-top:0px" height="168px" width="168px"> </a> <a href="#" target="_blank"
                                                                                              class="sliderTitle">
                            宁波/温州/合肥-巴厘岛 单程含税机票 <span class="red">599元（合肥出发699元，另有回程）</span> </a></div>
                        <div style="width: 180px;" data-slick-index="-2" class="slick-slide slick-cloned"><a href="#"
                                                                                                             target="_blank"
                                                                                                             class="picBox">
                            <img src="http://y.zdmimg.com/201601/08/568f67209011330.png_d200.jpg" alt=""
                                 style="margin-top:25px" height="118px" width="168px"> </a> <a href="#" target="_blank"
                                                                                               class="sliderTitle">
                            上海-新加坡 6天4晚自由行（往返含税机票+酒店4晚） <span class="red">2599元（另有单机票2099元）</span> </a></div>
                        <div style="width: 180px;" data-slick-index="-1" class="slick-slide slick-cloned"><a href="#"
                                                                                                             target="_blank"
                                                                                                             class="picBox">
                            <img src="http://y.zdmimg.com/201512/25/567d197a063d83599.png_d200.jpg" alt=""
                                 style="margin-top:0px" height="168px" width="168px"> </a> <a href="#" target="_blank"
                                                                                              class="sliderTitle">
                            上海-日本九州 6日往返含税机票+最后一晚酒店 3月2日出发 <span class="red">1099元（大阪1299元）</span> </a></div>
                        <div style="width: 180px;" data-slick-index="0" class="slick-slide slick-active"><a href="#"
                                                                                                            target="_blank"
                                                                                                            class="picBox">
                            <img src="http://y.zdmimg.com/201601/11/569326cc773098325.png_d200.jpg" alt=""
                                 style="margin-top:0px" height="168px" width="168px"> </a> <a href="#"> 全国联运
                            北京/上海-波士顿/西雅图/芝加哥/圣何塞 30天内往返含税机票（国内机票+国际机票） <span class="red">3599元</span> </a></div>
                        <div style="width: 180px;" data-slick-index="1" class="slick-slide slick-active"><a href="#"
                                                                                                            target="_blank"
                                                                                                            class="picBox">
                            <img src="http://y.zdmimg.com/201601/11/569319171d40b547.png_d200.jpg" alt=""
                                 style="margin-top:22px" height="124px" width="168px"> </a> <a href="#" target="_blank"
                                                                                               class="sliderTitle">
                            香港-清迈 5日含税往返机票（含正春节） <span class="red">1999元（加400升级三星酒店4晚，另有普吉3599）</span> </a></div>
                        <div style="width: 180px;" data-slick-index="2" class="slick-slide slick-active"><a href="#"
                                                                                                            target="_blank"
                                                                                                            class="picBox">
                            <img src="http://y.zdmimg.com/201601/07/568e031049d361810.png_d200.jpg" alt=""
                                 style="margin-top:20px" height="128px" width="168px"> </a> <a href="#" target="_blank"
                                                                                               class="sliderTitle">
                            北京-韩国大邱 往返含税机票（含春节） <span class="red">1399元</span> </a></div>
                        <div style="width: 180px;" data-slick-index="3" class="slick-slide slick-active"><a href="#"
                                                                                                            target="_blank"
                                                                                                            class="picBox">
                            <img src="http://y.zdmimg.com/201512/24/567bed4136cbc5366.png_d200.jpg" alt=""
                                 style="margin-top:21px" height="126px" width="168px"> </a> <a href="#" target="_blank"
                                                                                               class="sliderTitle"> 全国出发
                            长沙直飞洛杉矶 9日往返含税机票（国内段机票+国际段机票，含春节） <span class="red">2999元</span> </a></div>
                        <div style="width: 180px;" data-slick-index="4" class="slick-slide"><a href="#" target="_blank"
                                                                                               class="picBox"> <img
                                src="http://y.zdmimg.com/201601/08/568f903edec5c1891.png_d200.jpg" alt=""
                                style="margin-top:29px" height="111px" width="168px"> </a> <a href="#" target="_blank"
                                                                                              class="sliderTitle"> 上海-长沙
                            3天2晚自由行（往返含税机票+四星级紫东阁华天大酒店2晚） <span class="red">699元</span> </a></div>
                        <div style="width: 180px;" data-slick-index="5" class="slick-slide"><a href="#" target="_blank"
                                                                                               class="picBox"> <img
                                src="http://y.zdmimg.com/201511/18/564c8b22ab0b93679.png_d200.jpg" alt=""
                                style="margin-top:29px" height="111px" width="168px"> </a> <a href="h#" target="_blank"
                                                                                              class="sliderTitle"> 上海-厦门
                            3天2晚自由行（往返含税机票+速八酒店2晚） <span class="red">599元</span> </a></div>
                        <div style="width: 180px;" data-slick-index="6" class="slick-slide"><a href="#" target="_blank"
                                                                                               class="picBox"> <img
                                src="http://y.zdmimg.com/201512/27/567f69ee037345183.png_d200.jpg" alt=""
                                style="margin-top:0px" height="168px" width="168px"> </a> <a href="#" target="_blank"
                                                                                             class="sliderTitle"> 上海-重庆
                            4天3晚自由行（往返机票+途家斯维登酒店3晚） <span class="red">849元</span> </a></div>
                        <div style="width: 180px;" data-slick-index="7" class="slick-slide"><a href="#" target="_blank"
                                                                                               class="picBox"> <img
                                src="http://y.zdmimg.com/201512/29/568200e6b8a2a8843.png_d200.jpg" alt=""
                                style="margin-top:0px" height="168px" width="168px"> </a> <a href="#" target="_blank"
                                                                                             class="sliderTitle"> 上海-大连
                            3天2晚自由行（往返含税机票+四星船舶丽湾2晚） <span class="red">599元</span> </a></div>
                        <div style="width: 180px;" data-slick-index="8" class="slick-slide"><a href="#" target="_blank"
                                                                                               class="picBox"> <img
                                src="http://y.zdmimg.com/201512/20/567622715a4054812.jpg_d200.jpg" alt=""
                                style="margin-top:32px" height="104px" width="168px"> </a> <a href="#" target="_blank"
                                                                                              class="sliderTitle"> 上海-青岛
                            3天2晚自由行（往返机票+锦江之星2晚）1月10日出发 <span class="red">490元</span> </a></div>
                        <div style="width: 180px;" data-slick-index="9" class="slick-slide"><a href="#" target="_blank"
                                                                                               class="picBox"> <img
                                src="http://y.zdmimg.com/201601/08/568f986f751951931.png_d200.jpg" alt=""
                                style="margin-top:0px" height="168px" width="168px"> </a> <a href="#" target="_blank"
                                                                                             class="sliderTitle">
                            最穷但最幸福国度之尼泊尔、清澈又神秘的贝加尔湖畔等 <span class="red">20160108</span> </a></div>
                        <div style="width: 180px;" data-slick-index="10" class="slick-slide"><a href="#" target="_blank"
                                                                                                class="picBox"> <img
                                src="http://y.zdmimg.com/201601/08/568f88ab11bc94308.png_d200.jpg" alt=""
                                style="margin-top:33px" height="102px" width="168px"> </a> <a href="#" target="_blank"
                                                                                              class="sliderTitle"> 上海-冲绳
                            4/5日往返含税机票+日本3年多次签证 <span class="red">1499元</span> </a></div>
                        <div style="width: 180px;" data-slick-index="11" class="slick-slide"><a href="#" target="_blank"
                                                                                                class="picBox"> <img
                                src="http://y.zdmimg.com/201601/08/568f82537f021.jpg_d200.jpg" alt=""
                                style="margin-top:28px" height="112px" width="168px"> </a> <a
                                href="http://www.smzdm.com/p/741653/" target="_blank" class="sliderTitle"> 天津-济州岛 单程含税机票
                            1月12日出发 <span class="red">99元</span> </a></div>
                        <div style="width: 180px;" data-slick-index="12" class="slick-slide"><a href="#" target="_blank"
                                                                                                class="picBox"> <img
                                src="http://y.zdmimg.com/201601/08/568f7debb9d867386.png_d200.jpg" alt=""
                                style="margin-top:0px" height="168px" width="168px"> </a> <a href="#" target="_blank"
                                                                                             class="sliderTitle"> 上海-岘港
                            5天4晚自由行（往返含税机票+4星酒店4晚+接送机） <span class="red">1999元</span> </a></div>
                        <div style="width: 180px;" data-slick-index="13" class="slick-slide"><a href="#" target="_blank"
                                                                                                class="picBox"> <img
                                src="http://y.zdmimg.com/201512/28/5680def6932d35855.png_d200.jpg" alt=""
                                style="margin-top:0px" height="168px" width="168px"> </a> <a
                                href="http://www.smzdm.com/p/741615/" target="_blank" class="sliderTitle"> 宁波/温州/合肥-巴厘岛
                            单程含税机票 <span class="red">599元（合肥出发699元，另有回程）</span> </a></div>
                        <div style="width: 180px;" data-slick-index="14" class="slick-slide"><a href="#" target="_blank"
                                                                                                class="picBox"> <img
                                src="http://y.zdmimg.com/201601/08/568f67209011330.png_d200.jpg" alt=""
                                style="margin-top:25px" height="118px" width="168px"> </a> <a href="#" target="_blank"
                                                                                              class="sliderTitle">
                            上海-新加坡 6天4晚自由行（往返含税机票+酒店4晚） <span class="red">2599元（另有单机票2099元）</span> </a></div>
                        <div style="width: 180px;" data-slick-index="15" class="slick-slide"><a href="#" target="_blank"
                                                                                                class="picBox"> <img
                                src="http://y.zdmimg.com/201512/25/567d197a063d83599.png_d200.jpg" alt=""
                                style="margin-top:0px" height="168px" width="168px"> </a> <a
                                href="http://www.smzdm.com/p/741569/" target="_blank" class="sliderTitle"> 上海-日本九州
                            6日往返含税机票+最后一晚酒店 3月2日出发 <span class="red">1099元（大阪1299元）</span> </a></div>
                        <div style="width: 180px;" data-slick-index="16" class="slick-slide slick-cloned"><a href="#"
                                                                                                             target="_blank"
                                                                                                             class="picBox">
                            <img src="http://y.zdmimg.com/201601/11/569326cc773098325.png_d200.jpg" alt=""
                                 style="margin-top:0px" height="168px" width="168px"> </a> <a href="#" target="_blank"
                                                                                              class="sliderTitle"> 全国联运
                            北京/上海-波士顿/西雅图/芝加哥/圣何塞 30天内往返含税机票（国内机票+国际机票） <span class="red">3599元</span> </a></div>
                        <div style="width: 180px;" data-slick-index="17" class="slick-slide slick-cloned"><a href="#"
                                                                                                             target="_blank"
                                                                                                             class="picBox">
                            <img src="http://y.zdmimg.com/201601/11/569319171d40b547.png_d200.jpg" alt=""
                                 style="margin-top:22px" height="124px" width="168px"> </a> <a href="#" target="_blank"
                                                                                               class="sliderTitle">
                            香港-清迈 5日含税往返机票（含正春节） <span class="red">1999元（加400升级三星酒店4晚，另有普吉3599）</span> </a></div>
                        <div style="width: 180px;" data-slick-index="18" class="slick-slide slick-cloned"><a href="#"
                                                                                                             target="_blank"
                                                                                                             class="picBox">
                            <img src="http://y.zdmimg.com/201601/07/568e031049d361810.png_d200.jpg" alt=""
                                 style="margin-top:20px" height="128px" width="168px"> </a> <a href="#" target="_blank"
                                                                                               class="sliderTitle">
                            北京-韩国大邱 往返含税机票（含春节） <span class="red">1399元</span> </a></div>
                        <div style="width: 180px;" data-slick-index="19" class="slick-slide slick-cloned"><a href="#"
                                                                                                             target="_blank"
                                                                                                             class="picBox">
                            <img src="http://y.zdmimg.com/201512/24/567bed4136cbc5366.png_d200.jpg" alt=""
                                 style="margin-top:21px" height="126px" width="168px"> </a> <a href="#" target="_blank"
                                                                                               class="sliderTitle"> 全国出发
                            长沙直飞洛杉矶 9日往返含税机票（国内段机票+国际段机票，含春节） <span class="red">2999元</span> </a></div>
                    </div>
                </div>
                <a style="display: block;" data-role="none" class="slick-prev"><span>&lt;</span></a><a
                    style="display: block;" data-role="none" class="slick-next"><span>&gt;</span></a>
                <ul style="display: block;" class="slick-dots">
                    <li class="slick-active"><a data-role="none">1</a></li>
                    <li class=""><a data-role="none">2</a></li>
                    <li class=""><a data-role="none">3</a></li>
                    <li class=""><a data-role="none">4</a></li>
                </ul>
            </div>
        </div>
        <!-- guess_like end -->
        <meta charset="utf-8">
        <section id="comments">
            <div class="panelTitle" id="panelTitle">评论<span class="greyNum">（<em class="commentNum"><?php echo(count($$commentList));?></em>）</span></div>
            <div class="comment_sendwrap">
                <div id="hidden_vote_div" style="display:none;"></div>
                <p id="comment_error" class="red"></p>
                <?php if(!empty($user)): ?><div class="comment_avatar">
                        <a href="" class="userPic" target="_blank" title="<?php echo ($user["name"]); ?> ">
                            <img alt=""src="<?php echo ($user["avatar"]); ?>"
                                 id="comment_avatar" height="60" width="60"></a>
                        <a href=" http://zhiyou.smzdm.com/user " class="comment_nickName a_underline" target="_blank"
                           title="<?php echo ($user["name"]); ?>"><?php echo ($user["name"]); ?></a>
                    </div><?php endif; ?>
                <div class="comment_sendPart">
                    <form id="commentform" class="commentform" onsubmit="return false;" method="post" action="">

                        <input id="pid" name="articleId" value="<?php echo ($article["id"]); ?>" type="hidden">

                        <div class="comment_tips zhiyou_login">发表评论请 <a href="javascript:void(0);">登录</a></div>
                        <textarea cols="70" rows="3" name="content" class="textarea_comment" id="textareaComment"
                                  default_data="欢迎对文章中提到的商品或价格进行点评，具备参考价值的评论对别人更有帮助。"></textarea>

                        <div id="error" style="display:none;"></div>
                        <div class="comment_operate">

                            <button type="submit" class="btn_sub" id="textCommentSubmit">提交</button>

                        </div>
                    </form>
                </div>
                <div class="clear"></div>
            </div>
            <div class="comment_wrap" id="comment">
                <ul class="tab_nav">
                    <li class="tab_comment_li current_item"><span>最新</span></li>

                </ul>
                <div class="tab_info" id="commentTabBlockNew">
                    <ul class="comment_listBox">
                        <span id="li_comment_new"></span>
                        <?php if(is_array($commentList)): $key = 0; $__LIST__ = $commentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($key % 2 );++$key;?><li class="comment_list" id="li_comment_62908545">
                                <div class="comment_avatar"><a class="userPic" target="_blank" href="#">
                                    <img src="<?php echo ($comment["avatar"]); ?>" height="36" width="36"></a> <span
                                        class="grey"><?php echo ($key); ?>楼</span></div>
                                <div class="comment_conBox">
                                    <div class="comment_avatar_time">
                                        <div class="time"><?php echo (time_tran($comment["add_time"])); ?></div>
                                        <a class="a_underline user_name" target="_blank" href="#" usmzdmid="2035236213"><?php echo ($comment["name"]); ?></a>
                                        <div class="rank face-stuff-level" title="2级"><i class="icon-biaoqing-star"></i><i
                                                class="icon-biaoqing-star"></i></div>
                                    </div>
                                    <div class="comment_conWrap">
                                        <div class="comment_con">
                                            <p class="p_content_62908545"><?php echo ($comment["content"]); ?></p>
                                        </div>
                                        <div class="comment_action">
                                            <a class="dingNum " href="javascript:void(0);">顶<span>(0)</span></a>
                                            <a class="caiNum" href="javascript:void(0);">踩<span>(0)</span></a>
                                        </div>
                                        <div class="blankDiv"></div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>


            </div>
            <!-- comment_wrap end -->
        </section>

    </div>
    <!-- leftWrap end-->
    <script>
        $(function () {
            $('#textCommentSubmit').click(function () {
                $.ajax({
                            url: "/Ajax/comment",
                            data: $("#commentform").serialize(),
                            type: 'POST',
                            dataType: 'json',
                            success: function (result) {
                                if (result.status == 1) {
                                    alert(result.msg);
                                }
                                else {
                                    alert(result.msg);
                                }
                            },
                            error: function (ret) {
                                alert(ret.responseText);
                            }
                        }
                )
            });
        })

    </script>
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