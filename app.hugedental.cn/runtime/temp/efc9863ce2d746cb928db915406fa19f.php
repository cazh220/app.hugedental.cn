<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"/www/wwwroot/app.hugedental.cn/public/../application/admin/view/patient/detail.html";i:1513001834;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
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


    </style>
</head>
<body>
<form class="form-inline definewidth m20">  
<button type="button" class="btn btn-success" id="edit_patient" style="float:right; margin-bottom:15px">编辑</button>
<input type="hidden" id="patient_id" value="<?php echo $detail['patient_id']; ?>" >
</form>
<table class="table table-bordered table-hover definewidth m10">
    <tr>
        <th width="10%">患者姓名</th>
		<td width="20%"><?php echo $detail['name']; ?></td>
		<th width="10%">患者性别</th>
		<td width="25%"><?php if($detail['sex'] == 0): ?>男<?php else: ?>女<?php endif; ?></td>
		<th width="10%">手机</th>
		<td width="25%"><?php echo $detail['mobile']; ?></td>
    </tr>
	<tr>
		<th width="10%">电子邮箱</th>
		<td><?php echo $detail['email']; ?></td>
		<th width="10%">乘胜年月</th>
		<td><?php echo $detail['birthday']; ?></td>
		<th width="10%">城市</th>
		<td>上海</td>
	</tr>	
</table>
<table class="table table-bordered table-hover definewidth m10">
    <tr>
        <th width="10%">门诊医院</th>
		<td width="20%"><?php echo $detail['hospital']; ?></td>
		<th width="10%">主治医生</th>
		<td width="25%"><?php echo $detail['doctor']; ?></td>
		<th width="10%">牙位</th>
		<td width="25%"><?php echo $detail['tooth_position']; ?></td>
    </tr>
	<tr>
		<th width="10%">义齿类别</th>
		<td><?php echo $detail['false_tooth_name']; ?></td>
		<th width="10%">防伪码</th>
		<td><?php echo $detail['security_code']; ?></td>
		<th width="10%">扫码次数</th>
		<td>10</td>
	</tr>
	<tr>
        <th width="10%">制作单位</th>
		<td width="20%"><?php echo $detail['production_unit']; ?></td>
		<th width="10%">录入时间</th>
		<td width="25%"><?php echo $detail['create_time']; ?></td>
		<th width="10%">录入人</th>
		<td width="25%"><?php echo $detail['operator']; ?></td>
    </tr>
</table>
</body>
</html>
<script>
    $(function () {
        
		var patient_id = $("#patient_id").val();
		$('#edit_patient').click(function(){

				window.location.href="edit_patient?patient_id="+patient_id;
		 });


    });

</script>