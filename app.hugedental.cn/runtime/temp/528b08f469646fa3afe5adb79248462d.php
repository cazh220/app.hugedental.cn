<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"/www/wwwroot/app.hugedental.cn/public/../application/admin/view/security/create_index.html";i:1513001834;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>防伪码生成列表</title>
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
<form class="form-inline definewidth m20 fome_h" action="create_list" method="get">    
    <div style="float:left"><input type="text" name="operater" id="operater" class="abc input-default" placeholder="操作人" value="<?php echo \think\Request::instance()->get('operater'); ?>"></div>&nbsp;&nbsp;&nbsp;&nbsp;<label>录入时间:</label><div id="_start" class="input-group date form_date col-md-5 text_s" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
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
    <button type="submit" class="btn btn-primary">查询</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>ID</th>
        <th>生成日期</th>
        <th>操作人</th>
		<th>生码主题</th>
		<th>数量</th>
		<th>详情</th>
    </tr>
    </thead>
		<?php if(is_array($data['data']) || $data['data'] instanceof \think\Collection || $data['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
	     <tr>
			<td><?php echo $list['batch_id']; ?></td>
			<td><?php echo $list['create_time']; ?></td>
            <td><?php echo $list['operater']; ?></td>
			<td><?php echo $list['them']; ?></td>
			<td><?php echo $list['num']; ?></td>
			<td><a href="batch_detail?batch_id=<?php echo $list['batch_id']; ?>&path=<?php echo $list['path']; ?>">详情</a>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="export_security_code?batch_id=<?php echo $list['batch_id']; ?>">印刷格式</a>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="export_security_code_pdf?batch_id=<?php echo $list['batch_id']; ?>">防伪码</a>
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
		 
		 $("#export_qrcode").click(function(){
		 	window.location.href="export_pdf";
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