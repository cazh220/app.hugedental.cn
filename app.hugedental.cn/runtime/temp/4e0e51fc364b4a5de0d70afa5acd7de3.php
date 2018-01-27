<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/www/wwwroot/app.hugedental.cn/public/../application/admin/view/gift/index.html";i:1514986019;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>奖品列表</title>
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
	<script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/locales/bootstrap-datetimepicker.fr.js"></script>
	<script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/clipboard/clipboard.min.js"></script>
	<style type="text/css">
		input[type="text"]{
        	height: 33px !important;
        }
	</style>
</head>
<body>
<form class="form-inline definewidth m20" action="index.html" method="get">    
    <input type="text" name="gift_name" id="gift" class="abc input-default" placeholder="奖品名称" value="<?php echo \think\Request::instance()->get('gift_name'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<select id="type" name="type" style="padding-bottom:3px; height:34px"><option value="">全部</option><option value="1">礼品</option><option value="2">商品</option></select>
    &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="unshow">下架</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="delete">删除</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
		<th><input type="checkbox" id="gift_id_all" name="gift_id_all" value=""/>全选</th>
        <th>礼品图片</th>
        <th>奖品名称</th>
        <th>规格属性</th>
        <th>积分分值</th>
        <th>库存</th>
		<th>总已兑换数量</th>
		<th>兑换有效时间</th>
		<th>状态</th>
        <th>操作</th>
    </tr>
    </thead>
	     <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gift): $mod = ($i % 2 );++$i;?>
	     <tr>
			<td><input type="checkbox" class="gift_id" id="gift_id" name="gift_id[]" value="<?php echo $gift['gift_id']; ?>"/></td>
            <td><image src="<?php echo \think\Config::get('host_url'); ?>/public/uploads/<?php echo $gift['gift_photo']; ?>" width="25px" height="25px"></td>
            <td><?php echo $gift['gift_name']; ?></td>
            <td><?php echo $gift['attribute']; ?></td>
            <td><?php echo $gift['credits']; ?></td>
            <td><?php echo $gift['num']; ?></td>
			<td><?php echo $gift['sales_num']; ?></td>
			<td><?php echo $gift['validity_time']; ?></td>
			<td><?php echo $gift['status_name']; ?></td>
            <td>
                <a href="edit?gift_id=<?php echo $gift['gift_id']; ?>">编辑奖品</a>&nbsp;&nbsp;   
				<a href="#" data-clipboard-text="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/goods/index?gift_id=<?php echo $gift['gift_id']; ?>" class="copy">复制链接</a>&nbsp;&nbsp;
            </td>
        </tr>
	<?php endforeach; endif; else: echo "" ;endif; ?>		
</table>
<?php echo $page; ?>
</body>
</html>
<script>
    $(function () {
        

		$('#addnew').click(function(){

				window.location.href="add";
		 });
		 
		 $("#gift_id_all").click(function(){
			if ($("#gift_id_all").is(':checked'))
			{
				$(".gift_id").each(function(i, n){
					$(this).prop("checked", true);
				 });
			}
			else
			{
				$(".gift_id").each(function(i, n){
					$(this).prop("checked", false);
				 });
			}
		 });
		 
		 $("#delete").click(function(){
			if(confirm("确定要删除吗？"))
			{
				var gift_id = new Array();
				$(".gift_id").each(function(i, n){
					if ($(this).is(':checked'))
					{
						gift_id.push($(this).val());
					}
				});
				var gift_id_str = gift_id.join(',');
				var url = "delete_gift?gift_id="+gift_id_str;
				window.location.href=url;		
			}
		 });
		 
		 $("#unshow").click(function(){
			if(confirm("确定要下架吗？"))
			{
				var gift_id = new Array();
				$(".gift_id").each(function(i, n){
					if ($(this).is(':checked'))
					{
						gift_id.push($(this).val());
					}
				});
				var gift_id_str = gift_id.join(',');
				var url = "offline?gift_id="+gift_id_str;
				window.location.href=url;		
			}
		 });


    });
	
	$('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
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
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
	
	var clipboard = new Clipboard('.copy');
    clipboard.on('success', function(e) {
		alert("复制成功");
        console.log(e);
    });
    clipboard.on('error', function(e) {
        console.log(e);
    });
</script>