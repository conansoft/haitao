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
<link href="/Public/css/post.css" rel="stylesheet" type="text/css" />
<link href="/Public/css/editor.css" rel="stylesheet" type="text/css" />


<link href="/Public/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="/Public/umeditor/third-party/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/umeditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/umeditor/umeditor.min.js"></script>
<script type="text/javascript" src="/Public/umeditor/lang/zh-cn/zh-cn.js"></script>

<script src="/Public/js/ajaxfileupload.js"></script>
<section style="" class="wrap">
    <div style="" class="wrap fabu">
        <form style="" id="article_form" name="article_form">

            <div style="" class="leftWrap">
                <img id="show_img" style="display:none;" src="" alt="">
                <input type="hidden" id="photo" name="photo" value="">
                <div class="detailed_banner">
                    <div class="upload_Img">
                        <input value="上传封面图" id="fileToUpload" name="fileToUpload" onchange="ajaxFileUpload();" type="file">
                        <span><i class="icon-tianjiashangpin"></i><a href="javascript:;">点击</a>上传文章头图（建议头图尺寸为710x300px或以上）</span> </div>
                    <div class="loading" style="display: none;"><img src="/Public/images/loading.gif"></div>
                </div>
                <div class="share_Slct">
                    <div class="slct">
                        <div class="tab_Slct" id="tab_category"> <span id="span_category"><i></i>文章类别</span> <em><i></i></em></div>
                        <ul id="ul_category" style="display:none;z-index: 1000">
                            <input type="hidden" id="category" name="category"/>
                            <input type="hidden" id="tag" name="tag"/>
                            <?php if(is_array($categoryList)): $i = 0; $__LIST__ = $categoryList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li><a class="slct_type slct_category" data-category="<?php echo ($item["id"]); ?>" href="javascript:;"><?php echo ($item["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

                        </ul>
                    </div>
                    </div>
                <div class="share_Slct">
                    <div class="slct">
                        <div class="tab_Slct" id="tab_country"> <span id="span_country"><i></i>国家</span> <em><i></i></em></div>
                        <ul id="ul_country" style="display:none;z-index: 1000">
                            <input type="hidden" id="country" name="country"/>
                            <?php if(is_array($countryList)): $i = 0; $__LIST__ = $countryList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li><a class="slct_type slct_country" data-country="<?php echo ($item["id"]); ?>" href="javascript:;"><?php echo ($item["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

                        </ul>
                    </div>
                </div>
                    <div class="edit_Tit" id="my_Share">
                        <input class="xilie_input" id="title" name="title" default_value="我的文章标题" value="我的文章标题" style="" type="text">
                    </div>
                    <div class="edit_Wrap" style="margin: 10px auto;">
                        <script type="text/plain" id="myEditor" style="width:1000px;height:240px;">
                        <p></p>
                        </script><br/>
                        <input id="submit" value="提交" class="edit_Submit lFloat" type="button">

                    </div>

            </div>
        </form>
        <aside class="guide_info">
            <div style="position: static; top: 0px;" class="rightPanel zhu">
                <div class="edt_Tit">
                    <h4>注：</h4>
                    <a href="javascript:;" class="pop-close close"><i class="icon-cross-lighter"><!--[if lt IE 8]>x
                        <![endif]--></i></a> </div>
                <p>展示消费主张，分享兴趣爱好，传播深刻体会，获取经验知识，值客原创欢迎您的投稿，请根据<a target="_blank" href="#">《投稿指引》</a>和<a target="_blank" href="http://post.smzdm.com/about/">《投稿须知》</a>了解并熟悉投稿流程和审核要求。</p>
            </div>
            <div class="rightPanel jiayi" id="xz_jianyi" style="visibility: hidden; position: static; top: 0px;">
                <div class="tishi_show" id="guide_1" style="display:none;">
                    <div class="edt_Tit">
                        <h4></h4>
                        <a href="javascript:;" class="pop-close close active"><i class="icon-down">
                            <!--[if lt IE 8]>x<![endif]--></i></a> </div>
                    <p>开箱晒物是分享购物心情和心爱产品最为简单和直接的方式，请通过图文并茂的内容展示告诉大家你买到了什么，并对产品的外观、功能以及使用等方面进行介绍，以及关于购买转运、尺码试用等方面的信息。高品质产品、高人气新品、新奇特之物的晒单将会获得更高的人气。</p>
                </div>
                <div class="tishi_show" id="guide_2" style="display:none;">
                    <div class="edt_Tit">
                        <h4></h4>
                        <a href="javascript:;" class="pop-close close active"><i class="icon-down">
                            <!--[if lt IE 8]>x<![endif]--></i></a> </div>
                    <p>使用评测分类包括产品的使用报告、深度评测、横向评比等方向： <br>
                        <br>
                        使用报告：当产品经过了一段时间的使用之后，您对它的质量、功能以及优缺点都会有更深的了解，使用报告主要对产品使用的介绍和总结，通过实际使用举例告诉大家关于更全面的信息。 <br>
                        <br>
                        深度评测：针对产品最主要功能进行针对性的评测，通过测试、拆解等方式通过试用过程和数据分析展示它的功能和特点，需要对评测过程进行详细的图文介绍。 <br>
                        <br>
                        横向评比：与同类产品进行横向评比能够更好的展现产品的功能特点和性价比，如果具备这样的条件，不妨可以通过横向评测的方式给大家更全面的信息和参考。</p>
                </div>
                <div class="tishi_show" id="guide_4" style="display:none;">
                    <div class="edt_Tit">
                        <h4></h4>
                        <a href="javascript:;" class="pop-close close active"><i class="icon-down">
                            <!--[if lt IE 8]>x<![endif]--></i></a> </div>
                    <p>在生活中，我们都有很多不同的经历、爱好和特长，比如旅游、摄影、装修、美食、DIY等等，这其中同样会涉及到消费的方方面面。无论你是玩家还是行家，通过分享你的这些生活中的经历，你会找到更多与你志同道合的伙伴。同时你也可以分享你对生活、购物等方面的心情和感受，告诉大家你精彩的每一天。如果文章中有涉及到具体的商品，请同插入卡片的方式进行展示。</p>
                </div>
                <div class="tishi_show" id="guide_5" style="display:none;">
                    <div class="edt_Tit">
                        <h4></h4>
                        <a href="javascript:;" class="pop-close close active"><i class="icon-down">
                            <!--[if lt IE 8]>x<![endif]--></i></a> </div>
                    <p>购物攻略包括所有和购物相关的经验和体验，从商城介绍、品牌知识、品类选购、转运支付等所有环节，商城推荐商品建议请通过插入卡片的方式进行展示： <br>
                        <br>
                        商城攻略：对以往经验未包含的海外在线商城的全面介绍，尽可能包含商城介绍、销售内容、特色商品、促销活动、下单流程、付款转运等方面。 <br>
                        <br>
                        商品导购：某一个品牌或品类的商品选购经验分享，请从自己使用体验、功能特点、优缺点总结和选购推荐等角度的分享购物心得。 <br>
                        <br>
                        热点搜集：主要针对一些热播影视剧、体育运动、时事热点等所包含商品分析和介绍，通过收集整理为其他人介绍品牌、功能和特点。 <br>
                        <br>
                        转运支付：关于海淘购物相关转运攻略、信用卡虚拟支付等等方面。</p>
                </div>
            </div>
        </aside>
        <div class="clear"></div>
    </div>
</section>
<script>
    function ajaxFileUpload() {
        jQuery.ajaxFileUpload
        (
                {
                    url: '/Profile/User/upload', //用于文件上传的服务器端请求地址
                    secureuri: false, //是否需要安全协议，一般设置为false
                    fileElementId: 'fileToUpload', //文件上传域的ID
                    dataType: 'json', //返回值类型 一般设置为json
                    fileFilter:'jpg,jpeg,png',
                    success: function (data)  //服务器成功响应处理函数
                    {
                        if (data.error != '') {
                            alert(data.error);
                        } else {
                            $("#show_img").attr("src", data.imgurl).show();
                            $("#photo").val(data.imgurl);
                        }

                    },
                    error: function (data, status, e)//服务器响应失败处理函数
                    {
                        alert(e);
                    }
                }
        )
    }
    var um = UM.getEditor('myEditor',
            {

                initialFrameWidth:600,
                initialFrameHeight:240,

            });


    $(function() {
        $('#tab_category').click(function(){
            $(this).next().show();
        });
        $('#tab_country').click(function(){
            $(this).next().show();
        });
        $('.slct_category').click(function(){
            $("#span_category").html("<i></i>"+$(this).text());
            $("#category").val($(this).data('category'));
            $("#tag").val($(this).text());
            $("#ul_category").hide();
        });
        $('.slct_country').click(function(){
            $("#span_country").html("<i></i>"+$(this).text());
            $("#country").val($(this).data('country'));
            $("#ul_country").hide();
        });
        $(".edit_Submit").click(function(){

            var data=$('#article_form').serialize();
            $.ajax({
                url:"/Profile/User/publish",
                data:data,
                type:"POST",
                dataType:"json"
            }).done(function(msg){
                if(msg.status=='true'){
                   alert('success');
                }else{
                    alert('error');
                }
            })
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