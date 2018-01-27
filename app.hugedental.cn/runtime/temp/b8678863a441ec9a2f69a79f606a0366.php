<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/www/wwwroot/app.hugedental.cn/public/../application/admin/view/user/detail.html";i:1513001834;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>会员详情</title>
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
<button type="button" class="btn btn-success" id="edit_user" style="float:right; margin-bottom:15px">编辑</button>
<input type="hidden" id="user_id" value="<?php echo $detail['user_id']; ?>" >
</form>
<table class="table table-bordered table-hover definewidth m10">
    <tr>
        <th width="10%">真实姓名</th>
		<td width="20%"><?php echo $detail['realname']; ?></td>
		<th width="10%">性别</th>
		<td width="25%"><?php if($detail['sex'] == 1): ?>男<?php elseif($detail['sex'] == 2): ?>女<?php else: ?>未知<?php endif; ?></td>
		<th width="10%">手机</th>
		<td width="25%"><?php echo $detail['mobile']; ?></td>
    </tr>
	<tr>
		<th width="10%">电子邮箱</th>
		<td><?php echo $detail['email']; ?></td>
		<th width="10%">生日</th>
		<td><?php echo $detail['birthday']; ?></td>
		<th width="10%">城市</th>
		<td>上海</td>
	</tr>	
</table>
<table class="table table-bordered table-hover definewidth m10">
    <tr>
        <th width="10%">单位名称</th>
		<td width="20%"><?php echo $detail['company_name']; ?></td>
		<th width="10%">部门</th>
		<td width="25%"><?php echo $detail['department']; ?></td>
		<th width="10%">职位</th>
		<td width="25%"><?php echo $detail['position']; ?></td>
    </tr>
	<tr>
		<th width="10%">单位电话</th>
		<td><?php echo $detail['company_phone']; ?></td>
		<th width="10%">单位地址</th>
		<td colspan="3"><?php echo $detail['company_addr']; ?></td>
	</tr>
	<tr>
        <th width="10%">会员类型</th>
		<td width="20%"><?php if($detail['user_type'] == 1): ?>技工所<?php elseif($detail['user_type'] == 2): ?>医生<?php else: ?>其它<?php endif; ?></td>
		<th width="10%">扫描次数</th>
		<td width="25%"><?php echo $count; ?></td>
		<th width="10%">最后扫码时间</th>
		<td width="25%"><?php echo $last_time; ?></td>
    </tr>
	<tr>
        <th width="10%">累计积分</th>
		<td width="20%"><?php echo $detail['total_credits']; ?></td>
		<th width="10%">已兑积分</th>
		<td width="25%"><?php echo $detail['exchanged_credits']; ?></td>
		<th width="10%">积分余额</th>
		<td width="25%"><?php echo $detail['left_credits']; ?></td>
    </tr>
	<tr>
        <th width="10%">收货地址</th>
		<td colspan="5"><?php echo $province; ?><?php echo $city; ?><?php echo $district; ?><?php echo $address['address']; ?></td>
    </tr>
</table>
<?php if($detail['user_type'] == 1): ?>
<table class="table table-bordered table-hover definewidth m10">
    <tr>
        <th width="10%">年全瓷牙量</th>
		<td width="20%"><?php echo $detail['year_tooth_num']; ?></td>
		<th width="10%" rowspan="3" style="text-align: center; vertical-align: middle;">单位简介：</th>
		<td width="60%" rowspan="3" style="text-align: left; vertical-align: middle;"><?php echo $detail['company_info']; ?></td>
    </tr>
	<tr>
		<th width="10%">年营业额</th>
		<td><?php echo $detail['year_sales']; ?></td>
	</tr>
	<tr>
		<th width="10%">在用氧化锆品牌</th>
		<td><?php echo $detail['yhg_band']; ?></td>
	</tr>
	<tr>
        <th width="10%">在用瓷粉品牌</th>
		<td width="20%"><?php echo $detail['cf_band']; ?></td>
		<th width="10%" rowspan="3" style="text-align: center; vertical-align: middle;">单位头像：</th>
		<td width="60%" rowspan="3" style="text-align: left; vertical-align: middle;"><img src="<?php echo \think\Config::get('host_url'); ?>/public/uploads/<?php echo $detail['head_img']; ?>" width="76px" height="76px"></td>
    </tr>
	<tr>
		<th width="10%">厂房面积</th>
		<td><?php echo $detail['factory']; ?></td>
	</tr>
	<tr>
		<th width="10%">扩展计划</th>
		<td><?php echo $detail['year_sales']; ?></td>
	</tr>
</table>
<?php else: ?>
<table class="table table-bordered table-hover definewidth m10">
    <tr>
        <th width="10%">椅位</th>
		<td width="20%"><?php echo $detail['seats']; ?></td>
		<th width="10%" rowspan="2" style="text-align: center; vertical-align: middle;">单位简介：</th>
		<td width="60%" rowspan="2" style="text-align: left; vertical-align: middle;"><?php echo $detail['company_info']; ?></td>
    </tr>
	<tr>
		<th width="10%">是否开展已种植</th>
		<td><?php if($detail['is_grow'] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
	</tr>
	<tr>
        <th width="10%">是否上椅旁系统</th>
		<td><?php if($detail['is_seats'] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
		<th width="10%" rowspan="2" style="text-align: center; vertical-align: middle;">单位头像：</th>
		<td width="60%" rowspan="2" style="text-align: left; vertical-align: middle;"><img src="<?php echo \think\Config::get('host_url'); ?>/public/uploads/<?php echo $detail['head_img']; ?>" width="76px" height="76px"></td>
    </tr>
	<tr>
		<th width="10%">是否已开展正畸</th>
		<td><?php if($detail['is_correct'] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
	</tr>
</table>
<?php endif; ?>
</body>
</html>
<script>
    $(function () {
        
		var user_id = $("#user_id").val();
		$('#edit_user').click(function(){

				window.location.href="edit_user?user_id="+user_id;
		 });


    });

</script>