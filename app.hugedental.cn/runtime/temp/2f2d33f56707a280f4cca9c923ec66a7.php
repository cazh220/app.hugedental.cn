<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/www/wwwroot/app.hugedental.cn/public/../application/admin/view/order/index.html";i:1513001834;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>换领订单</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/bootstrap.min.css" />
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

</head>
<body>
<form class="form-inline definewidth m20" action="" method="get">    
    <input type="text" name="keyword" id="keyword" class="abc input-default" placeholder="订单号/会员编号" value="<?php echo \think\Request::instance()->get('keyword'); ?>">&nbsp;&nbsp;<select id="type" name="type"><option value="">全部</option><option value="1" <?php if(\think\Request::instance()->get('type') == 1): ?>selected<?php endif; ?>>待确认</option><option value="2" <?php if(\think\Request::instance()->get('type') == 2): ?>selected<?php endif; ?>>待发货</option><option value="3" <?php if(\think\Request::instance()->get('type') == 3): ?>selected<?php endif; ?>>已发货</option><option value="4" <?php if(\think\Request::instance()->get('type') == 4): ?>selected<?php endif; ?>>已完成</option></select> 
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp;<button type="button" class="btn btn-success" id="delete_user">删除</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="export">导出</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
		<th><input type="checkbox" id="all_user_id" name="all_user_id" value="">选择</th>
        <th>订单编号</th>
        <!--<th>奖品名称</th>
        <th>奖品数量</th>-->
        <th>会员名称</th>
		<th>配送地址</th>
		<th>配送名称</th>
		<th>注册时间</th>
		<th>快递公司</th>
		<th>快递号</th>
		<th>总积分</th>
		<th>上次操作时间</th>
        <th>状态</th>
    </tr>
    </thead>
		<?php if(is_array($order['data']) || $order['data'] instanceof \think\Collection || $order['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $order['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
	     <tr>
			<td><input type="checkbox" class="c_user_id" id="c_order_id<?php echo $list['order_id']; ?>" name="order_id[]" value="<?php echo $list['order_id']; ?>"></td>
			<td><?php echo $list['order_no']; ?></td>
            <!--<td>奖品名称</td>
			<td>2</td>-->
			<td><?php echo $list['username']; ?></td>
			<td><?php echo $list['province_name']; ?>-<?php echo $list['city_name']; ?>-<?php echo $list['district_name']; ?></td>
			<td><?php echo $list['ship_way_name']; ?></td>
			<td><?php echo $list['create_time']; ?></td>
			<td><?php echo $list['ship_company_name']; ?></td>
			<td><?php echo $list['ship_no']; ?></td>
			<td><?php echo $list['total_credits']; ?></td>
			<td><?php echo $list['update_time']; ?></td>
			<td><?php if($list['order_status'] == 0): ?><a href="javascript:onclick=order_s('订单确认？', <?php echo $list['order_id']; ?>, 1, '<?php echo \think\Config::get('host_url'); ?>')"><font color="red">待确认</font></a><?php elseif($list['order_status'] == 1): ?><font color="yellow"><a href="javascript:onclick=order_s('确认发货？', <?php echo $list['order_id']; ?>, 2, '<?php echo \think\Config::get('host_url'); ?>')">待发货</a></font><?php else: ?><font color="green">已发货</font><?php endif; ?>&nbsp;&nbsp;<a href="<?php echo \think\Config::get('host_url'); ?>/public/admin.php/admin/order/detail?order_id=<?php echo $list['order_id']; ?>">详情</a>
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

				window.location.href="order/export";
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
	
	
	function order_s(msg, order_id, order_status, url)
	{
		url = url+'/public/admin.php/admin/order/order_status?order_id='+order_id+'&order_status='+order_status;
		//alert(url);return false;
		if(confirm(msg))
		{
			window.location.href=url;
		}
		return false;
	}
</script>