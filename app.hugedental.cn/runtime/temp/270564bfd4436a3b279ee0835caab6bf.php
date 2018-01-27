<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"/www/wwwroot/app.hugedental.cn/public/../application/admin/view/patient/index.html";i:1516552607;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>患者列表</title>
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
<form class="form-inline definewidth m20 fome_h" action="index" method="get">    
    <div style="float:left"><input type="text" name="keyword" id="keyword" class="abc input-default" placeholder="患者姓名/医疗机构/制作单位" value="<?php echo \think\Request::instance()->get('keyword'); ?>"></div>&nbsp;&nbsp;&nbsp;&nbsp;<label>录入时间:</label><div class="input-group date form_date col-md-5 text_s" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
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
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="import">导入</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="export">导出</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
		<th><input type="checkbox" id="all_user_id" name="all_user_id" value="">选择</th>
        <th>编号</th>
        <th>患者名</th>
        <th>性别</th>
        <th>出生年月</th>
		<th>联系电话</th>
		<!--<th>城市</th>-->
		<th>修复体类别</th>
		<th>牙位</th>
      	<th>牙齿数量</th>
		<th>制作单位</th>
		<th>医疗机构</th>
		<th>录入人</th>
        <th>操作</th>
    </tr>
    </thead>
		<?php if(is_array($patient['data']) || $patient['data'] instanceof \think\Collection || $patient['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $patient['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
	     <tr>
			<td><input type="checkbox" class="c_patient_id" id="c_user_id<?php echo $list['patient_id']; ?>" name="patient_id[]" value="<?php echo $list['patient_id']; ?>"></td>
			<td><?php echo $list['patient_id']; ?></td>
            <td><?php echo $list['name']; ?></td>
			<td><?php if($list['sex'] == 1): ?>女<?php else: ?>男<?php endif; ?></td>
			<td><?php echo $list['birthday']; ?></td>
			<td><?php echo $list['mobile']; ?></td>
			<!--<td>上海</td>-->
			<td><?php echo $list['false_tooth_name']; ?></td>
			<td><?php echo $list['tooth_position']; ?></td>
           	<td><?php echo $list['tooth_num']; ?></td>
			<td><?php echo $list['production_unit']; ?></td>
			<td><?php echo $list['hospital']; ?></td>
			<td><?php echo $list['operator']; ?></td>
			<td>
			<a href="patient_detail?patient_id=<?php echo $list['patient_id']; ?>">详情</a>
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
				$(".c_patient_id").each(function(i, n){
					$(this).prop("checked", true);
				 });
			}
			else
			{
				$(".c_patient_id").each(function(i, n){
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

</script>