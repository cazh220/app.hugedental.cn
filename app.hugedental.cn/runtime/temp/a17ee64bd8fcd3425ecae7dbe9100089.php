<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/www/wwwroot/app.hugedental.cn/public/../application/admin/view/user/index.html";i:1516797913;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>会员列表</title>
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
        
        input[type="text"]{
        	height: 33px !important;
        }


    </style>
</head>
<body>
<form class="form-inline definewidth m20" action="index" method="get">    
    <input type="text" name="keyword" id="keyword" class="abc input-default" placeholder="账户名/手机号/所属单位" value="<?php echo \think\Request::instance()->get('keyword'); ?>">&nbsp;&nbsp;<input type="text" name="dental" id="dental"class="abc input-default" placeholder="技工所" value="<?php echo \think\Request::instance()->get('dental'); ?>">&nbsp;&nbsp;<input type="text" name="hospital" id="hospital"class="abc input-default" placeholder="门诊医院" value="<?php echo \think\Request::instance()->get('hospital'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<label>注册时间:</label><div class="input-group date form_date col-md-5 text_s" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="20" type="text" value="<?php echo \think\Request::instance()->get('start_time'); ?>" readonly>
					<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				<input type="hidden" id="dtp_input1" name="start_time" value="<?php echo \think\Request::instance()->get('start_time'); ?>" /> ~ <div class="input-group date form_date col-md-5 text_s" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="20" type="text" value="<?php echo \think\Request::instance()->get('end_time'); ?>" readonly>
					<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				<input type="hidden" id="dtp_input2" name="end_time" value="<?php echo \think\Request::instance()->get('end_time'); ?>" />    
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增用户</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="delete_user">删除</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="export">导出</button>
</form>
<table class="table table-bordered table-hover definewidth m10" style="width: 1700px;">
    <thead>
    <tr>
		<th width="70px"><input type="checkbox" id="all_user_id" name="all_user_id" value="">选择</th>
        <th width="80px">会员编号</th>
        <th width="100px">账户名</th>
        <th width="100px">会员手机号</th>
        <th width="80px">用户类型</th>
		<th width="250px">单位名称</th>
		<!--<th>单位地址</th>-->
		<th width="80px">用户姓名</th>
		<th width="120px">部门</th>
		<th width="100px">邮箱</th>
		<th width="150px">注册时间</th>
		<th width="80px">录入数量</th>
		<th width="80px">出库数量</th>
      	<th width="80px">牙齿数量</th>
		<th width="80px">状态</th>
        <th width="280px">操作</th>
    </tr>
    </thead>
		<?php if(is_array($user['data']) || $user['data'] instanceof \think\Collection || $user['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $user['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
	     <tr>
			<td><input type="checkbox" class="c_user_id" id="c_user_id<?php echo $list['user_id']; ?>" name="user_id[]" value="<?php echo $list['user_id']; ?>"></td>
			<td><?php echo $list['member_id']; ?></td>
            <td><?php echo $list['username']; ?></td>
			<td><?php echo $list['mobile']; ?></td>
			<td><?php if($list['user_type'] == 1): ?>技工所<?php elseif($list['user_type'] == 2): ?>医生<?php else: ?>其它<?php endif; ?></td>
			<td><?php echo $list['company_name']; ?></td>
			<!--<td><?php echo $list['company_addr']; ?></td>-->
			<td><?php echo $list['realname']; ?></td>
			<td><?php echo $list['department']; ?></td>
			<td><?php echo $list['email']; ?></td>
			<td><?php echo $list['create_time']; ?></td>
			<td><?php echo $list['record_count']; ?></td>
			<td><?php echo $list['stock_count']; ?></td>
           	<td><?php echo $list['tooth_count']; ?></td>
			<td><?php if($list['status'] == 1): ?><font color="green">已审核</font><?php if($list['auto_check'] == 1): ?>(自动)<?php endif; elseif($list['status'] == 2): ?>未通过<?php else: ?><font color="red">未审核</font><?php endif; ?></td>
			<td>
			<a href="history?user_id=<?php echo $list['user_id']; ?>">历史记录</a>&nbsp;&nbsp;<a href="user_detail?user_id=<?php echo $list['user_id']; ?>">详情</a>&nbsp;&nbsp;<?php if($list['status'] == 0): ?><a href="#" onclick="pass(<?php echo $list['user_id']; ?>)">通过</a>&nbsp;&nbsp;<a href="#" onclick="refuse(<?php echo $list['user_id']; ?>)">拒绝</a><?php endif; ?>&nbsp;&nbsp;<a href="#" onclick="reset_pwd(<?php echo $list['user_id']; ?>)">恢复初始密码</a>
			</td>
        </tr>
		<?php endforeach; endif; else: echo "" ;endif; ?>		
</table>
<?php echo $page; ?>
</body>
</html>
<script>
    $(function () {
        $('#export').click(function(){

				window.location.href="export";
		 });

		$('#addnew').click(function(){

				window.location.href="add";
		 });
		 
		 $("#all_user_id").click(function(){
			if ($("#all_user_id").is(':checked'))
			{
				$(".c_user_id").each(function(i, n){
					$(this).prop("checked", true);
				 });
			}
			else
			{
				$(".c_user_id").each(function(i, n){
					$(this).prop("checked", false);
				 });
			}
		 });
		 
		 $("#delete_user").click(function(){
			if(confirm("确定要删除吗？"))
			{
			
				
				var user_id = new Array();
				$(".c_user_id").each(function(i, n){
					if ($(this).is(':checked'))
					{
						user_id.push($(this).val());
					}
				});
				var user_id_str = user_id.join(',');
				var url = "delete_user?user_id="+user_id_str;
				window.location.href=url;		
			
			}
		 });


    });
	
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	
	function pass(id)
	{
		if(confirm('确定通过审核？'))
		{
			var url = "audit?user_id="+id+"&type=pass";
			window.location.href=url;	
		}
	}
	
	function refuse(id)
	{
		if(confirm('确定拒绝？'))
		{
			var url = "audit?user_id="+id+"&type=refuse";
			window.location.href=url;	
		}
	}
	
	function reset_pwd(id)
	{
		if(confirm('确定要恢复初始密码？'))
		{
			//var url = "audit?user_id="+id+"&type=refuse";
			//window.location.href=url;	
			$.ajax({
				url:'reset_pwd',
				type:"get",
				data:"user_id="+id,
				dataType:'json',
				success:function(msg){
					alert(msg.message);
					if(msg.status == 1)
					{
						return false;
					}
				}
				
				
			});
		}
	}
	
</script>