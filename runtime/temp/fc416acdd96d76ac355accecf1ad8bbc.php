<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:87:"E:\phpstudy2018\PHPTutorial\WWW\newtp\public/../application/shop\view\user\address.html";i:1535974921;s:78:"E:\phpstudy2018\PHPTutorial\WWW\newtp\application\shop\view\public\header.html";i:1535967627;s:75:"E:\phpstudy2018\PHPTutorial\WWW\newtp\application\shop\view\public\nav.html";i:1535976227;s:85:"E:\phpstudy2018\PHPTutorial\WWW\newtp\application\shop\view\public\personal-left.html";i:1535975208;s:78:"E:\phpstudy2018\PHPTutorial\WWW\newtp\application\shop\view\public\footer.html";i:1535975239;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>首页</title>
    <link href="/static/shop/css/style.reset.css" rel="stylesheet" type="text/css" />
    <link href="/static/shop/css/font-color-size.css" rel="stylesheet" type="text/css" />
    <link href="/static/shop/css/table.select.style.css" rel="stylesheet" type="text/css" />
    <link href="/static/shop/css/top-style.css" rel="stylesheet" type="text/css" />
    <link href="/static/shop/css/index-body-style.css" rel="stylesheet" type="text/css" />
    <link href="/static/shop/css/css3style.css" rel="stylesheet" type="text/css" />
    <script src="/static/shop/js/top-city-check.js"></script>
</head>
<link href="/static/shop/css/user.css" rel="stylesheet" type="text/css"/>
<body>
<!-- 顶部 -->
<div class="index-top-box">
    <div class="index-top center">
        <?php if(\think\Session::get('shopUserId')): ?>
        <!--我的订单-->
        <?php else: ?>

        <div class="fr noneAny"><a href="<?php echo url('user/index'); ?>">个人中心</a></div>
        <!--免费注册-->
        <div class="fr noneAny"><a href="<?php echo url('open/login'); ?>">[免费注册]</a></div>
        <!--登录-->
        <div class="fr noneAny"><a href="<?php echo url('open/register'); ?>">[登录]</a></div>
        <?php endif; ?>
        <div class="fr noneAny">亲，欢迎来<?php echo $cfg['site_name']; ?>！</div>
    </div>
</div>

<!-- 顶部结束-->
<div class="clear"></div>
<!-- logo开始-->
<div class="logoBox center">
    <!--左侧logo-->
    <div class="logo fl">
        <span class="fl"><img src="<?php echo (isset($cfg['site_log']) && ($cfg['site_log'] !== '')?$cfg['site_log']:'/static/shop/img/login/logo.jpg'); ?>" /></span>
    </div>

    <!--右侧search-->
    <div class="searchBox fl">

        <!--搜索BOX-->
        <div class="searchinput fr">
            <!--搜索-->
            <div class="S-bg">
                <form action="<?php echo url('index/search'); ?>" method="post">
                    <input type="text" class="S-text fl" name="keywords" placeholder="请输入关键词搜索" style="color:#c4c4c4" />
                    <a href=""><input type="submit" class="S-submit size14 fl" value="搜索"></a>
                </form>
            </div>
            <!--热词-->
            <div class="hot-words">
                <a href="allsearch.html">潮流男装</a>
            </div>
        </div>

    </div>
</div>
<!-- logo结束-->
<div class="clear"></div>
<!-- 导航开始-->
<div class="navBox">
    <div class="nav center">
        <!--商品分类-->
        <div class="classification fl">
            <div class="hd size14-b">商品分类</div>
        </div>
        <!--导航栏目-->
        <div class="bigNav fl">
            <ul>
                <li><a href="<?php echo url('/shop'); ?>">商城首页</a></li>
                <?php if(is_array($nav) || $nav instanceof \think\Collection || $nav instanceof \think\Paginator): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo url('product/cate',['id'=>$item['id']]); ?>"><?php echo $item['name']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <li><a href="<?php echo url('index/about'); ?>">关于我们</a></li>
            </ul>
        </div>
        <?php if(\think\Session::get('shopUserId')): ?>
        <!--购物车-->
        <div class="shopping-cart fr size14">购物车 ( <a href="user.html">0</a> ) 件</div>
        <?php endif; ?>
    </div>
</div>
<!--导航结束-->
<div class="clear"></div>
<!--位置-->
<div class="user_here center">所在的位置：中国美博城 > 收货地址</div>
<!--用户管理中心-->
<div class="user_center center">
    <!--左侧-->
<div class="user_left fl">
    <div class="user_head"><img src="/static/shop/img/user/user_head.gif" /></div>
    <div class="user_menu">
        <ul>
            <h2><img src="/static/shop/img/user/menu04.jpg" /><span class="" style="display:none">个人信息</span></h2>
            <li><a href="<?php echo url('user/index'); ?>">&gt;&gt;&nbsp;编辑资料</a></li>
        </ul>
        <ul>
            <h2><img src="/static/shop/img/user/menu03.jpg" /><span class="" style="display:none">账户信息</span></h2>
            <li><a href="<?php echo url('user/address'); ?>" >&gt;&gt;&nbsp;收货地址</a></li>
        </ul>

        <ul>
            <h2><img src="/static/shop/img/user/menu01.jpg" /><span class="" style="display:none">订单查询</span></h2>
            <li><a href="<?php echo url('user/carts'); ?>">&gt;&gt;&nbsp;我的购物车</a></li>
            <li><a href="<?php echo url('user/order'); ?>">&gt;&gt;&nbsp;我的订单</a></li>
        </ul>
        <ul>
            <h2><img src="/static/shop/img/user/menu02.jpg" /><span class="" style="display:none">自助服务</span></h2>
            <li><a href="<?php echo url('index/help'); ?>">&gt;&gt;&nbsp;帮助中心</a></li>
        </ul>
    </div>
</div>
    <!--右侧-->
    <div class="user_right fr">
        <div class="user_dingdan">
            <span class="fr"><a href=""></a></span>
            <p>我的订单</p>
        </div>

        <div class="dingdan_state">
            <div class="state_step fl"><a href=""><p class="step-lv"></p><p>新增地址</p></a></div>
        </div>

        <div class="shopping_list">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="table_manu" width="40">全选</td>
                    <td class="table_manu">商品</td>
                    <td class="table_manu" width="100">价格</td>
                    <td class="table_manu" width="100">优惠</td>
                    <td class="table_manu" width="100">
                        <select class="oto_select">
                            <option value="安徽">安徽</option>
                            <option value="北京">北京</option>
                            <option value="上海">上海</option>
                            <option value="江苏">江苏</option>
                        </select>
                    </td>
                    <td class="table_manu" width="100">数量</td>
                    <td class="table_manu" width="100">操作</td>
                </tr>
                <tr class="goodsbg">
                    <td valign="top">
                        <div class="fuxuan"><input type="checkbox" name="checkbox" value="checkbox"/></div>
                    </td>
                    <td>
                        <div class="goods">
                            <img src="img/user/goods.jpg" class="fl"/>
                            <a href="#">撒旦法斯蒂芬斯蒂芬斯蒂芬斯蒂芬撒旦法斯蒂芬斯蒂芬斯蒂斯蒂芬斯蒂芬斯蒂芬</a>
                        </div>
                    </td>
                    <td><p class="jiage">￥99.05</p></td>
                    <td>&nbsp;</td>
                    <td>有货</td>
                    <td>
                        <div class="shuliang"><a class="jianqu" href="#">-</a><a class="zhi" href="#">1</a><a
                                class="jiashang" href="#">+</a></div>
                    </td>
                    <td>
                        <div class="caozuo"><p><a href="#">删除</a></p>
                            <p><a href="#">修改优惠</a></p></div>
                    </td>
                </tr>
                <tr class="goodsbg">
                    <td valign="top">
                        <div class="fuxuan"><input type="checkbox" name="checkbox" value="checkbox"/></div>
                    </td>
                    <td>
                        <div class="goods">
                            <img src="img/user/goods.jpg" class="fl"/>
                            <a href="#">撒旦法斯蒂芬斯蒂芬斯蒂芬斯蒂芬撒旦法斯蒂芬斯蒂芬斯蒂斯蒂芬斯蒂芬斯蒂芬</a>
                        </div>
                    </td>
                    <td><p class="jiage">￥99.05</p></td>
                    <td>&nbsp;</td>
                    <td>有货</td>
                    <td>
                        <div class="shuliang"><a class="jianqu" href="#">-</a><a class="zhi" href="#">1</a><a
                                class="jiashang" href="#">+</a></div>
                    </td>
                    <td>
                        <div class="caozuo"><p><a href="#">删除</a></p>
                            <p><a href="#">修改优惠</a></p></div>
                    </td>
                </tr>
                <tr class="goodsbg">
                    <td valign="top">
                        <div class="fuxuan"><input type="checkbox" name="checkbox" value="checkbox"/></div>
                    </td>
                    <td>
                        <div class="goods">
                            <img src="img/user/goods.jpg" class="fl"/>
                            <a href="#">撒旦法斯蒂芬斯蒂芬斯蒂芬斯蒂芬撒旦法斯蒂芬斯蒂芬斯蒂斯蒂芬斯蒂芬斯蒂芬</a>
                        </div>
                    </td>
                    <td><p class="jiage">￥99.05</p></td>
                    <td>&nbsp;</td>
                    <td>有货</td>
                    <td>
                        <div class="shuliang"><a class="jianqu" href="#">-</a><a class="zhi" href="#">1</a><a
                                class="jiashang" href="#">+</a></div>
                    </td>
                    <td>
                        <div class="caozuo"><p><a href="#">删除</a></p>
                            <p><a href="#">修改优惠</a></p></div>
                    </td>
                </tr>

            </table>
        </div>
    </div>
</div>
</div>

<div class="clear" style="height:30px"></div>

<div class="footerLink">
    <div class="footerLink_ul center">
        <?php if(is_array($catelog) || $catelog instanceof \think\Collection || $catelog instanceof \think\Paginator): $i = 0; $__LIST__ = $catelog;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
        <ul>
            <h2><?php echo $item['title']; ?></h2>
            <?php if(!empty($item['subLog'])): if(is_array($item['subLog']) || $item['subLog'] instanceof \think\Collection || $item['subLog'] instanceof \think\Paginator): $i = 0; $__LIST__ = $item['subLog'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subitem): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo url('index/help',['id'=>$subitem['id']]); ?>"><?php echo $subitem['title']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </ul>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>

<div class="footer center">
    <p>
        <?php echo (isset($cfg['copy_right']) && ($cfg['copy_right'] !== '')?$cfg['copy_right']:''); ?><br />
        <?php echo (isset($cfg['address']) && ($cfg['address'] !== '')?$cfg['address']:''); ?> 联系电话：<?php echo (isset($cfg['contact']) && ($cfg['contact'] !== '')?$cfg['contact']:''); ?><br />
        <?php echo (isset($cfg['icp']) && ($cfg['icp'] !== '')?$cfg['icp']:''); ?>
    </p>
</div>
</body>
</html>
