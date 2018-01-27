<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/www/wwwroot/app.hugedental.cn/public/../application/admin/view/admin/index.html";i:1514125938;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>管理员列表</title>
    <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/bootstrap.css" />
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/bootstrap.min.css" /> -->
    <link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/style.css" />
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/ckform.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/common.js"></script>

 

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
<form class="form-inline definewidth m20" action="index.html" method="get">    
    <button type="button" class="btn btn-success" id="addnew">新增用户</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>ID</th>
        <th>账号</th>
        <th>角色</th>
		<th>手机号</th>
		<th>冻结</th>
        <th>最后登录时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <?php if(!(empty($list['data']) || (($list['data'] instanceof \think\Collection || $list['data'] instanceof \think\Paginator ) && $list['data']->isEmpty()))): if(is_array($list['data']) || $list['data'] instanceof \think\Collection || $list['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$admin): $mod = ($i % 2 );++$i;?>
	     <tr>
            <td><?php echo $admin['admin_id']; ?></td>
            <td><?php echo $admin['username']; ?></td>
            <td><?php echo $admin['role_id']; ?></td>
            <td><?php echo $admin['mobile']; ?></td>
			<td><?php if($admin['is_frozen'] == 0): ?>正常<?php else: ?><font color="red">冻结</font><?php endif; ?></td>
			<td><?php echo $admin['last_login_time']; ?></td>
            <td>
                <a href="edit?admin_id=<?php echo $admin['admin_id']; ?>">编辑</a>&nbsp;&nbsp;   
				<a href="edit_password?admin_id=<?php echo $admin['admin_id']; ?>&admin_name=<?php echo $admin['username']; ?>">修改密码</a>&nbsp;&nbsp;
				<?php if($admin['admin_id'] != 1): ?><a href="#" onclick="del(<?php echo $admin['admin_id']; ?>)">删除</a><?php endif; ?>
            </td>
        </tr>
	<?php endforeach; endif; else: echo "" ;endif; endif; ?>
</table>
<?php echo $page; ?>
</body>
</html>
<script>
    $(function () {
        

		$('#addnew').click(function(){
				window.location.href="add";
		 });


    });

	function del(id)
	{
		
		
		if(confirm("确定要删除吗？"))
		{
		
			//var url = "index.html";
			
			//window.location.href=url;		
			$.ajax({
				type:"get",
				data:"admin_id="+id,
				url:"http://app.hugedental.cn/public/admin.php/admin/admin/delete",
				dataType:"json",
				success:function(msg)
				{
					//console.log(msg);
					alert(msg.message);
					if(msg.status==true)
					{
						location.reload();
					}
				}
			});
		
		}
	
	
	
	
	}
</script>