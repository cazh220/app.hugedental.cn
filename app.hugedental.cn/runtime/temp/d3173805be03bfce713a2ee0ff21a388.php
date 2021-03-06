<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"/www/wwwroot/app.hugedental.cn/public/../application/admin/view/security/index.html";i:1515514992;}*/ ?>
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
    <div style="float:left"><input type="text" name="code" id="code" class="abc input-default" placeholder="防伪码" value="<?php echo \think\Request::instance()->get('code'); ?>"></div>&nbsp;&nbsp;&nbsp;&nbsp;<label>录入时间:</label><div id="_start" class="input-group date form_date col-md-5 text_s" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="20" type="text" value="<?php echo \think\Request::instance()->get('start_time'); ?>" readonly>
					<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				<input type="hidden" id="dtp_input1" name="start_time" value="<?php echo \think\Request::instance()->get('start_time'); ?>" /> ~ <div id="_end" class="input-group date form_date col-md-5 text_s" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="20" type="text" value="<?php echo \think\Request::instance()->get('end_time'); ?>" readonly>
					<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
                
                <select id="type" name="type">
                	<option value="">全部</option>
                	<option value="1" <?php if(\think\Request::instance()->get('type') == 1): ?>selected<?php endif; ?>>美晶瓷</option>
                	<option value="4" <?php if(\think\Request::instance()->get('type') == 4): ?>selected<?php endif; ?>>诺必灵</option>
                </select> 
                
				<input type="hidden" id="dtp_input2" name="end_time" value="<?php echo \think\Request::instance()->get('end_time'); ?>" />  
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="delete_code">删除</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="import">导入</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="export">导出防伪码</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="export_qrcode">导出二维码专用</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
    	<th><input type="checkbox" id="all_code_id" name="all_code_id" value="">选择</th>
        <th>ID</th>
        <th>防伪码</th>
        <th>最近查询时间</th>
		<th>出库单号</th>
		<th>客户单位</th>
		<th>出库时间</th>
		<th>二维码</th>
    </tr>
    </thead>
		<?php if(is_array($data['data']) || $data['data'] instanceof \think\Collection || $data['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
	     <tr>
	     	<td><input type="checkbox" class="c_code_id" id="c_code_id<?php echo $list['code_id']; ?>" name="code_id[]" value="<?php echo $list['code_id']; ?>"></td>
			<td><?php echo $list['code_id']; ?></td>
            <td><?php echo $list['security_code']; ?></td>
			<td><?php echo $list['query_time']; ?></td>
			<td><?php echo $list['stock_no']; ?></td>
			<td><?php echo $list['company_name']; ?></td>
			<td><?php echo $list['stock_time']; ?></td>
			<td><img style="width:40px; height:40px" src="http://qr.liantu.com/api.php?text=<?php echo $list['qrcode']; ?>"/></td>
        </tr>
		<?php endforeach; endif; else: echo "" ;endif; ?>	
	<tr>
		<td colspan="7">已发放的防伪码数量为<font color="red"><?php echo $count; ?></font>个</td>
	</tr>
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
		 
		 $("#export_qrcode").click(function(){
		 	window.location.href="export_pdf";
		 });
      
      	$('#import').click(function(){

				window.location.href="import_qrcode";
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
		 
		 $("#delete_code").click(function(){
			if(confirm("确定要删除吗？"))
			{
			
				
				var code_id = new Array();
				$(".c_code_id").each(function(i, n){
					if ($(this).is(':checked'))
					{
						code_id.push($(this).val());
					}
				});
				var code_id_str = code_id.join(',');
				if(code_id_str == '')
				{
					alert('请选择防伪码');
					return false;
				}
				var url = "delete_code?code_id="+code_id_str;
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