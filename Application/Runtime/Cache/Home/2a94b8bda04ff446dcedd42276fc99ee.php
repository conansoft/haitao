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
<link href="/Public/css/content.css" rel="stylesheet" type="text/css" />
<link href="/Public/css/icon.css" rel="stylesheet" type="text/css" />
<section>
<div class="section">
  <div class="leftwrap">
    <div class="leftguanggao"></div>

    <div class="jierihuod">
      <div class="value_tags"> <a><img style="width: 50px" src="/Public/images/richang.png"/></a> <a href="#" target="_blank">服饰鞋包</a> <a href="#" target="_blank">运动户外</a> <a href="#" target="_blank">电脑数码</a> <a href="#" target="_blank">家用电器</a> <a href="#" target="_blank">食品保健</a> <a href="#" target="_blank">日用百货</a> </div>
      <ul class="shangppin">

        <li><a href="#" target="_blank"><img src="/Public/images/good1.jpg"/> <span class="black">限U款赤足跑鞋</span> <span class="red">£31.44+£7.54</span></a> </li>
        <li><a href="#" target="_blank"><img src="/Public/images/good1.jpg"/> <span class="black">耐克 Free 5.0 男款赤足跑鞋</span> <span class="red">£31中国（约￥380）</span></a> </li>
        <li><a href="#" target="_blank"><img src="/Public/images/good1.jpg"/> <span class="black">限UK7：Nike 耐克 Free 5.0 男款赤足跑鞋</span> <span class="red">£31.44+£7.54直邮中国</span> </a> </li>
        <li><a href="#" target="_blank"><img src="/Public/images/good1.jpg"/> <span class="black">限UK7：Nike 耐克 Free 5.0 男款赤足跑鞋</span> <span class="red">£31.44+£7.54约￥380）</span></a> </li>
        <li><a href="#" target="_blank"><img src="/Public/images/good1.jpg"/> <span class="black">限UK7：Nike 耐克 Free 5.0 男款赤足跑鞋</span> <span class="red">£31.44+£7.5（约￥380）</span> </a> </li>
        <li><a href="#" target="_blank"><img src="/Public/images/good1.jpg"/> <span class="black">限UK7：Nike 耐克 Free 5.0 男款赤足跑鞋</span> <span class="red">£31.44+£7.54直邮￥</span></a> </li>

        <div class="clear"></div>
      </ul>
    </div>
    <div class="zhiding">
      <div class="listTitle"> <span class="redicon">置顶</span>
        <h4 class="itemName"> <a href="#" target="_blank">爆料赏金计划[第六期]活动开启<span class="red">年货征集/天猫双倍奖励</span> </a></h4>
      </div>
    </div>
    <div class="list" >
      <div class="listTitle"> <a href="#" class="grayicon">优惠</a>
        <h4 class="itemName"> <a href="#" target="_blank">限华东：阿联酋进口皇冠椰枣 250g<span class="red">13.8元</span></a></h4>
        <div class="clear"></div>
      </div>
      <a href="#" target="_blank" class="picLeft" title=""> <img src="http://y.zdmimg.com/201512/31/5684c69c42c74.jpg_d200.jpg" alt="" height="190px" width="190px"> </a>
      <div class="listRight">
        <div class="lrTop"> <span class="lrTime">14:39</span> <span> 标签： <a href="#"> 生鲜食品 </a> <a href="#">节日礼品</a> </span> </div>
        <div class="lrInfo"><a href="#" target="_blank">天猫</a>售价13.8元，凑单好价，需注意：仅配送上海，浙江，安徽，江西。此款皇冠椰枣产于阿联酋地区，由于高热、干燥的环境因素，糖份较高，口感香甜。此外还蕴含维生素C、维生素B1、维生素B2等多种维生素，营养价值较高。与普通红枣相比其脂肪及胆固醇极低，极大的满足了人...<a href="#" target="_blank">阅读全文</a></div>
        <div class="lrBot"> <a href="#" class="good"> <span class="scoreTotal"><b>值</b> <em>5</em></span> <span class="scoredInfo">已打分</span> <span class="scoreAnimate">+1</span> </a> <a href="#" class="bad"> <span class="scoreTotal">不值 <em>2</em></span> <span class="scoredInfo">已打分</span> <span class="scoreAnimate">+1</span></a> <a href="#" class="fav" title="收藏"><i class="icon-collect"></i><em>0</em></a> <a href="#" class="comment" title="评论" target="_blank"><i class="icon-comment"></i><em>2</em></a>
          <div class="botPart">
            <div class="buy"> <a href="#" target="_blank">直达链接<i>&gt;</i></a> </div>
            <a href="#" class="mall">天猫超市</a> </div>
          <div class="clear"></div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="list" >
      <div class="listTitle"> <a href="#" class="grayicon">优惠</a>
        <h4 class="itemName"> <a href="#" target="_blank">限华东：阿联酋进口皇冠椰枣 250g<span class="red">13.8元</span></a></h4>
        <div class="clear"></div>
      </div>
      <a onclick="ga('send', 'event','门户','文章图片','739205_限华东：阿联酋进口皇冠椰枣 250g');" href="http://www.smzdm.com/p/739205" target="_blank" class="picLeft" title=""> <img src="http://y.zdmimg.com/201512/31/5684c69c42c74.jpg_d200.jpg" style="margin-top:0px" alt="限华东：阿联酋进口皇冠椰枣 250g" height="190px" width="190px"> </a>
      <div class="listRight">
        <div class="lrTop"> <span class="lrTime">14:39</span> <span> 标签： <a href="#"> 生鲜食品 </a> <a href="#">节日礼品</a> </span> </div>
        <div class="lrInfo"><a href="#" target="_blank">天猫</a>售价13.8元，凑单好价，需注意：仅配送上海，浙江，安徽，江西。此款皇冠椰枣产于阿联酋地区，由于高热、干燥的环境因素，糖份较高，口感香甜。此外还蕴含维生素C、维生素B1、维生素B2等多种维生素，营养价值较高。与普通红枣相比其脂肪及胆固醇极低，极大的满足了人...<a href="#" target="_blank">阅读全文</a></div>
        <div class="lrBot"> <a href="#" class="good"> <span class="scoreTotal"><b>值</b> <em>5</em></span> <span class="scoredInfo">已打分</span> <span class="scoreAnimate">+1</span> </a> <a href="#" class="bad"> <span class="scoreTotal">不值 <em>2</em></span> <span class="scoredInfo">已打分</span> <span class="scoreAnimate">+1</span></a> <a href="#" class="fav" title="收藏"><i class="icon-collect"></i><em>0</em></a> <a href="#" class="comment" title="评论" target="_blank"><i class="icon-comment"></i><em>2</em></a>
          <div class="botPart">
            <div class="buy"> <a href="#" target="_blank">直达链接<i>&gt;</i></a> </div>
            <a href="#" class="mall">天猫超市</a> </div>
          <div class="clear"></div>
        </div>
      </div>

      <div class="clear"></div>
       <ul _hover-ignore="1" class="pagination"><li><a href="http://www.smzdm.com/p1" class="">1</a></li><li><a class="" href="http://www.smzdm.com/p2">2</a></li><li><a class="pageCurrent" href="http://www.smzdm.com/p3">3</a></li><li><a _hover-ignore="1" href="http://www.smzdm.com/p4">4</a></li><li><a href="http://www.smzdm.com/p5">5</a></li><li><a href="http://www.smzdm.com/p6">6</a></li><li><span class="dotStyle">...</span></li><li class="pagedown"><a _hover-ignore="1" href="http://www.smzdm.com/p4">下一页</a><span>&gt;</span></li></ul>
    </div>
  </div>
  <div class="rightwrap">
    <div class="rightPanel">
      <div class="userInfo"> <a href="#" class="userPic" target="_blank"><img src="/Public/images/default_small.png" alt="头像"></a>
        <div class="userRight">
          <div> Hi <em>你好</em> </div>
          <p><a class="zhiyou_login">登录</a>，发现更多精彩</p>
          <a href="#" title="值友幸运屋" target="_blank">值友幸运屋</a> &nbsp;&nbsp;
          <a href="#" title="新手入门" target="_blank">新手入门</a> </div>
        <div class="scoreBox"> <a class="signScore" target="_blank">签到领积分</a> <a class="scoreExchange" href="#" target="_blank">积分兑换</a> </div>
      </div>
    </div>
    
    <!-- 分类导航开始 -->
    <div class="rightPanel">
      <div class="mult-nav"> <span class="commodity-nav-title mult-nav-hover" >分类导航</span> </div>
      <div class="commodity-nav" style="display: block;">
        <a target="_blank" href="#"><span><i class="icon-diannaoshuma"></i>电脑数码</span></a>
        <a target="_blank" href="#"><span><i class="icon-jiayongdianqi"></i>家用电器</span></a>
        <a target="_blank" href="#"><span><i class="icon-yundonghuwai"></i>运动户外</span></a>
        <a target="_blank" href="#"><span><i class="icon-fushixiebao"></i>服饰鞋包</span></a>
        <a target="_blank" href="#"><span><i class="icon-gehuhuazhuang"></i>个护化妆</span></a>
        <a target="_blank" href="#"><span><i class="icon-muyingyongpin"></i>母婴用品</span></a>
        <a target="_blank" href="#"><span><i class="icon-riyongbaihuo"></i>日用百货</span></a>
        <a target="_blank" href="#"><span><i class="icon-shipinbaojian"></i>食品保健</span></a>
        <a target="_blank" href="#"><span><i class="icon-lipinzhongbiao"></i>礼品钟表</span></a>
        <a target="_blank" href="#"><span><i class="icon-tushuyinxiang"></i>图书音像</span></a>
        <a target="_blank" href="#"><span><i class="icon-wanmoyueqi"></i>玩模乐器</span></a>
        <a target="_blank" href="#"><span><i class="icon-bangongshebei"></i>办公设备</span></a>
        <a target="_blank" href="#"><span><i class="icon-jiajujiazhuang"></i>家居家装</span></a>
        <a target="_blank" href="#"><span><i class="icon-qicheyongpin"></i>汽车用品</span></a>
        <a target="_blank" href="#"><span>其他分类<i class="icon-right_yuanjiantou"></i></span></a>
      </div>


    </div>
    
    <!-- 最新发现开始 -->
    <div class="rightPanel beyondHide">
      <ul class="tab_nav">
        <li class="tab_faxian_li current_item">
          <h3>最新发现</h3>
        </li>
        <li class="tab_faxian_li">
          <h3>热门发现</h3>
        </li>
        <li class="more"><a href="#" target="_blank">更多 &gt;</a></li>
      </ul>
      <div class="tab_info_con">
        <ul class="ninePicBox">
          <li> <a href="#" target="_blank"> <img src="http://ym.zdmimg.com/201601/04/5689c6eb7c095.jpg_a100.jpg" alt="" style="width:94px; height:94px;">
            <div class="tabCon">
              <p>nvc-lighting 雷士照明 ESX9000/4 吸顶灯 99元（满199减100）</p>
              <span>99元（满199减100）</span> </div>
            </a></li>
          <li> <a href="#" target="_blank"> <img src="http://y.zdmimg.com/201601/04/5689cf76d34bd.jpg_a100.jpg" alt="" style="width:94px; height:94px;">
            <div class="tabCon">
              <p>Libbey 利比 无铅红酒杯 2支装 19.9</p>
              <span>19.9</span> </div>
            </a></li>
          <li class="gogo"> <a href="#" target="_blank"> <img src="http://ym.zdmimg.com/201601/04/5689c77f32f41.jpg_a100.jpg" alt="" style="width:94px; height:94px;">
            <div class="tabCon">
              <p>SUPOR 苏泊尔EC1232F03 32cm 可立盖 无涂层 炒锅 179元包邮（满200减40）</p>
              <span>179元包邮（满200减40）</span> </div>
            </a></li>
          <li> <a href="#" target="_blank" > <img src="http://ym.zdmimg.com/201601/03/56893e7a46b8a.jpg_a100.jpg" alt="" style="width:94px; height:94px;">
            <div class="tabCon">
              <p>ecco 爱步 Elaine 女款中帮靴 $83.96（需用码，约￥705）</p>
              <span>$83.96（需用码，约￥705）</span> </div>
            </a></li>
          <li> <a href="#" target="_blank"> <img src="http://ym.zdmimg.com/201601/04/5689c82d6920a.jpg_a100.jpg" alt="包邮" style="width:94px; height:94px;">
            <div class="tabCon">
              <p>THERMOS 膳魔师 500ml JNL-501-PCH 不锈钢 保温杯 199元包邮</p>
              <span>199元包邮</span> </div>
            </a></li>
          <li class="gogo"> <a href="#" target="_blank" > <img src="http://ym.zdmimg.com/201512/31/5685490245d68.jpg_a100.jpg" alt="" style="width:94px; height:94px;">
            <div class="tabCon">
              <p>JOYOUNG 九阳 JYS-A800 绞肉机 79元包邮</p>
              <span>79元包邮</span> </div>
            </a></li>
          <li class=""> <a href="#" target="_blank"> <img src="http://ym.zdmimg.com/201601/04/5689cb42a8c1a.jpg_a100.jpg" alt="" style="width:94px; height:94px;">
            <div class="tabCon">
              <p>Calvin Klein 男士 黑色 假两件样式 羊毛夹克 $60.41+$32.28直邮中国(约￥594)</p>
              <span>$60.41+$32.28直邮中国(约￥594)</span> </div>
            </a></li>
          <li> <a href="#" target="_blank"> <img src="http://y.zdmimg.com/201507/14/55a4cfeeb7077.jpeg_a100.jpg" alt="" style="width:94px; height:94px;">
            <div class="tabCon">
              <p>PEARL LIFE 珍珠生活 GP-2055 高纯铁无涂层平底炒锅 299元包邮（399-100）</p>
              <span>299元包邮（399-100）</span> </div>
            </a></li>
          <li class="gogo"> <a href="#" target="_blank" > <img src="http://ym.zdmimg.com/201601/04/5689c918c1519.jpg_a100.jpg" alt="" style="width:94px; height:94px;">
            <div class="tabCon">
              <p>JASUN 佳星1000W-2000W 电热丝取暖器 39元</p>
              <span>39元</span> </div>
            </a></li>
        </ul>
      </div>
      <div class="tab_info_con">
        <ul class="ninePicBox">
          <li class=""><a href="#" target="_blank"> <img src="http://ym.zdmimg.com/201601/03/5688b7cf37e829405.png_a100.jpg" alt="" style="width:94px; height:94px;">
            <div class="tabCon">
              <p>京东 京东金融 领取 10元白条券</p>
              <span>10元白条券</span> </div>
            </a></li>
          <li class=""><a href="#" target="_blank"> <img src="http://ym.zdmimg.com/201601/03/5688c13eefae88116.png_a100.jpg" alt="" style="width:94px; height:94px;">
            <div class="tabCon">
              <p>银联钱包 春节特惠 购火车票立减10元 每账户一次</p>
              <span>购火车票立减10元 每账户一次</span> </div>
            </a></li>
          <li class="gogo"><a href="#" target="_blank" > <img src="http://y.zdmimg.com/201502/20/54e7439558834.jpeg_a100.jpg" alt="" style="width:94px; height:94px;">
            <div class="tabCon">
              <p>SHARP 夏普 Aquos Crystal 8GB 无边框 手机 $89.99（约￥630）</p>
              <span>$89.99（约￥630）</span> </div>
            </a></li>
          <li><a href="#" target="_blank" > <img src="http://ym.zdmimg.com/201601/03/5688bc9026090.jpg_a100.jpg" alt="" style="width:94px; height:94px;">
            <div class="tabCon">
              <p>德国UHU 强力胶35ML 8.5元包邮</p>
              <span>8.5元包邮</span> </div>
            </a></li>
          <li><a href="#"  target="_blank" > <img src="http://ym.zdmimg.com/201601/03/56886b79be2e1.jpg_a100.jpg" alt="" style="width:94px; height:94px;">
            <div class="tabCon">
              <p>smartisan 锤子 坚果 32GB 蓝色 移动联通4G手机 双卡双待 799元包邮</p>
              <span>799元包邮</span> </div>
            </a></li>
          <li class="gogo"><a href="#" target="_blank" > <img src="http://y.zdmimg.com/201508/05/55c1eb920e635.jpeg_a100.jpg" alt="" style="width:94px; height:94px;">
            <div class="tabCon">
              <p>CHOETECH C0043 18W 第二代 QC2.0 充电器 29.9元</p>
              <span>29.9元</span> </div>
            </a></li>
          <li><a href="#" target="_blank"> <img src="http://ym.zdmimg.com/201601/03/5688ce0280c4a370.png_a100.jpg" alt="" style="width:94px; height:94px;">
            <div class="tabCon">
              <p>苏宁易购 十天十夜跨年狂欢 活动专场 10亿红包疯抢、买2付1</p>
              <span>10亿红包疯抢、买2付1</span> </div>
            </a></li>
          <li><a href="#" target="_blank"> <img src="http://ym.zdmimg.com/201601/03/5688b12cef19f.jpg_a100.jpg" alt="" style="width:94px; height:94px;">
            <div class="tabCon">
              <p>SAUCONY GRID 9000 复古跑步鞋 男 S70077-A  471元包邮（满500减50）</p>
              <span>471元包邮（满500减50）</span> </div>
            </a></li>
          <li class="gogo"><a href="#" target="_blank"> <img src="http://ym.zdmimg.com/201601/03/56892b6665b4a.jpg_a100.jpg" alt="" style="width:94px; height:94px;">
            <div class="tabCon">
              <p>广西荔浦芋头800g 7.9元</p>
              <span>7.9元</span> </div>
            </a></li>
        </ul>
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