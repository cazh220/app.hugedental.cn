<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"/www/wwwroot/app.hugedental.cn/public/../application/admin/view/user/user_action.html";i:1513001834;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>会员记录</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/bootstrap-datetimepicker.min.css" />
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/ckform.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/common.js"></script>
	<script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/locales/bootstrap-datetimepicker.fr.js"></script>

    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>
<body>
<form class="form-inline definewidth m20">    
    <button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>账号</th>
        <th>手机号</th>
        <th>登录密码</th>
        <th>姓名</th>
        <th>会员类型</th>
        <th>操作内容</th>
        <th>操作时间</th>
    </tr>
    </thead>
		<?php if(is_array($list['data']) || $list['data'] instanceof \think\Collection || $list['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$items): $mod = ($i % 2 );++$i;?>
	     <tr>
            <td><?php echo $items['username']; ?></td>
            <td><?php echo $items['mobile']; ?></td>
            <td><?php echo $items['password']; ?></td>
            <td><?php echo $items['realname']; ?></td>
            <td><?php if($items['user_type'] == 1): ?>技工<?php else: ?>医生<?php endif; ?></td>
			<td><?php echo $items['content']; ?></td>
			<td><?php echo $items['action_create_time']; ?></td>
			</td>
        </tr>
		<?php endforeach; endif; else: echo "" ;endif; ?>		
</table>

<?php echo $page; ?>
</body>
</html>
<script>
    $(function () {
        $('#backid').click(function(){
				window.location.href="index";
		 });


    });
	
</script>