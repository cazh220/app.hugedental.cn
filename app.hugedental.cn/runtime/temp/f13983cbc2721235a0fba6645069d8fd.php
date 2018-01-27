<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/www/wwwroot/app.hugedental.cn/public/../application/admin/view/stock/index.html";i:1516902075;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>防伪码列表</title>
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
        
        input[type="text"]{
        	height: 33px !important;
        }
		
		.pagination{text-align:center;margin-top:20px;margin-bottom: 20px;} 

    </style>
</head>
<body>
<form class="form-inline definewidth m20 fome_h" action="index" method="get">    
    <div style="float:left"><input type="text" name="keyword" id="keyword" class="abc input-default" placeholder="客户编码/客户名称/条码编号" value="<?php echo \think\Request::instance()->get('keyword'); ?>"></div>&nbsp;&nbsp;&nbsp;&nbsp;<label>发货时间:</label><div id="_start" class="input-group date form_date col-md-5 text_s" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="20" type="text" value="<?php echo \think\Request::instance()->get('start_time'); ?>" readonly>
					<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				<input type="hidden" id="dtp_input1" name="start_time" value="<?php echo \think\Request::instance()->get('start_time'); ?>" /> ~ <div id="_end" class="input-group date form_date col-md-5 text_s" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="20" type="text" value="<?php echo \think\Request::instance()->get('end_time'); ?>" readonly>
					<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				<input type="hidden" id="dtp_input2" name="end_time" value="<?php echo \think\Request::instance()->get('end_time'); ?>" />  
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="delete_stock">删除</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="export">导出</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
		<th><input type="checkbox" id="all_stock_id" name="all_stock_id" value="">选择</th>
        <th>出库单号</th>
        <th>出库数量</th>
        <th>出库人</th>
        <th>客户单位</th>
        <th>关联用户</th>
		<th>出货时间</th>
      	<th>防伪码详细</th>
		<th>状态</th>
    </tr>
    </thead>
		<?php if(is_array($stock['data']) || $stock['data'] instanceof \think\Collection || $stock['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $stock['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
	     <tr>
			<td><input type="checkbox" class="c_stock_id" id="c_stock_id<?php echo $list['stock_id']; ?>" name="stock_id[]" value="<?php echo $list['stock_id']; ?>"></td>
			<td><?php echo $list['stock_no']; ?></td>
            <td><?php echo $list['stock_num']; ?></td>
			<td><?php echo $list['user_name']; ?></td>
			<td><?php echo $list['company_name']; ?></td>
			<td><?php echo $list['mobile']; ?></td>
			<td><?php echo $list['stock_time']; ?></td>
           <td><a href="javascript:onclick=stock_out_code(<?php echo $list['stock_id']; ?>, '<?php echo \think\Config::get('host_url'); ?>')">查看</a></td>
			<td><?php if($list['status']==0): ?><a href="javascript:onclick=stock_out_confirm('确认出库？', <?php echo $list['stock_id']; ?>, '<?php echo \think\Config::get('host_url'); ?>')"><font color="red">待发货</font></a><?php else: ?><font color="green">已出库</font><?php endif; ?></td>
        </tr>
		<?php endforeach; endif; else: echo "" ;endif; ?>		
</table>
<?php echo $page; ?>
</body>
</html>
<script>
  
  	function stock_out_code(id, url)
  	{
    	url = url+'/public/admin.php/admin/stock/stockout_code?stock_id='+id;
      	window.location.href=url;
    }
  
	function stock_out_confirm(msg, stock_id, url)
	{
		url = url+'/public/admin.php/admin/stock/stockout_confirm?stock_id='+stock_id;
		//alert(url);return false;
		
		if(confirm(msg))
		{
			window.location.href=url;
		}
		return false;
	}
	
    $(function () {
        $('#export').click(function(){

				window.location.href="export";
		 });

		$('#addnew').click(function(){

				window.location.href="add";
		 });
		 
		 
		$("#all_stock_id").click(function(){
			if ($("#all_stock_id").is(':checked'))
			{
				$(".c_stock_id").each(function(i, n){
					$(this).prop("checked", true);
				 });
			}
			else
			{
				$(".c_stock_id").each(function(i, n){
					$(this).prop("checked", false);
				 });
			}
		 });
		 
		 $("#delete_stock").click(function(){
			if(confirm("确定要删除吗？"))
			{
				var stock_id = new Array();
				$(".c_stock_id").each(function(i, n){
					if ($(this).is(':checked'))
					{
						stock_id.push($(this).val());
					}
				});
				var stock_id_str = stock_id.join(',');
				var url = "delete_stock?stock_id="+stock_id_str;
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
	
	
	
</script>