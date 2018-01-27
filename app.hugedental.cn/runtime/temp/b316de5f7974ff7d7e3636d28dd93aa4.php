<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"/www/wwwroot/app.hugedental.cn/public/../application/admin/view/message/index.html";i:1513001834;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>消息列表</title>
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
    <input type="text" name="sender" id="sender" class="abc input-default" placeholder="发送人" value="<?php echo \think\Request::instance()->get('sender'); ?>">&nbsp;&nbsp;<input type="text" name="receiver" id="receiver"class="abc input-default" placeholder="接收人" value="<?php echo \think\Request::instance()->get('receiver'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<label>发送时间:</label><div class="input-group date form_date col-md-5 text_s" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
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
    <button type="submit" class="btn btn-primary">查询</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>消息ID</th>
        <th>发送人</th>
        <th>接收人</th>
        <th>消息类型</th>
		<th>消息内容</th>
		<th>是否已读</th>
    </tr>
    </thead>
    	<?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
	     <tr>
			<td><?php echo $data['id']; ?></td>
            <td><?php echo $data['sender']; ?></td>
			<td><?php echo $data['receiver']; ?></td>
			<td><?php if($data['type'] == 0): ?>普通<?php else: ?>其它<?php endif; ?></td>
			<td><?php echo $data['message']; ?></td>
			<td><?php if($data['is_read'] == 1): ?>已读<?php else: ?>未读<?php endif; ?></td>
        </tr>
		<?php endforeach; endif; else: echo "" ;endif; endif; ?>
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
		if(confirm('确定通过审核？'))
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