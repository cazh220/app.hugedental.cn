<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/www/wwwroot/app.hugedental.cn/public/../application/admin/view/index/index.html";i:1513001834;}*/ ?>

<!DOCTYPE HTML>
<html>
<head>
    <title>后台管理系统</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo \think\Config::get('host_url'); ?>/public/static/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo \think\Config::get('host_url'); ?>/public/static/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo \think\Config::get('host_url'); ?>/public/static/assets/css/main-min.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="header">

    <div class="dl-title">
        <!--<img src="/chinapost/Public/assets/img/top.png">-->
    </div>

    <div class="dl-log">欢迎您，<span class="dl-log-user"><?php echo $username; ?></span><a href="<?php echo \think\Config::get('host_url'); ?>/public/admin.php/admin/index/logout" title="退出系统" class="dl-log-quit">[退出]</a>
    </div>
</div>
<div class="content">
    <div class="dl-main-nav">
        <div class="dl-inform"><div class="dl-inform-title"><s class="dl-inform-icon dl-up"></s></div></div>
        <ul id="J_Nav"  class="nav-list ks-clear">
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">系统管理</div></li>		<!--<li class="nav-item dl-selected"><div class="nav-item-inner nav-order">业务管理</div></li>-->

        </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">
	
    </ul>
</div>
<script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/assets/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/assets/js/bui-min.js"></script>
<script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/assets/js/common/main-min.js"></script>
<script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/assets/js/config-min.js"></script>
<script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/js/bootstrap.min.js"></script>
<script>
    BUI.use('common/main',function(){
        var config = [<?php echo $menu; ?>];
        new PageUtil.MainPage({
            modulesConfig : config
        });
    });
</script>
</body>
</html>