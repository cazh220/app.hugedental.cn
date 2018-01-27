<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"/www/wwwroot/app.hugedental.cn/public/../application/admin/view/security/batch_index.html";i:1513001834;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>防伪码批次详情</title>
    <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/bootstrap-datetimepicker.min.css" />
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/ckform.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/common.js"></script>
	<script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/clipboard.min.js"></script>
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
		
		.pagination{text-align:center;margin-top:20px;margin-bottom: 20px;} 

    </style>
</head>
<body>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>序号</th>
        <th>防伪码</th>
        <!--<th>操作</th>-->
    </tr>
    </thead>
		<?php if(is_array($data['data']) || $data['data'] instanceof \think\Collection || $data['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
	     <tr>
			<td><?php echo $list['code_id']; ?></td>
			<td><?php echo $list['security_code']; ?></td>
			<!--<td><a href="/app/public/<?php echo $path; ?>/<?php echo $list['security_code']; ?>.png" target="_blank">预览</a>&nbsp;&nbsp;<a href="down?file=<?php echo $list['security_code']; ?>&path=<?php echo $path; ?>" target="_blank">下载</a></td>-->
        </tr>
		<?php endforeach; endif; else: echo "" ;endif; ?>	
</table>
<?php echo $page; ?>
</body>
</html>
<script>

</script>