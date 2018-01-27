<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"/www/wwwroot/app.hugedental.cn/public/../application/admin/view/user/edit_user.html";i:1513001834;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/style.css" />
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/ckform.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/common.js"></script>

 

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
<form action="edit" method="post" class="definewidth m20" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $user['user_id']; ?>" />
    <table class="table table-bordered table-hover definewidth m10">
        <tr>
        <td width="10%" class="tableleft">会员账号</td>
        <td><input type="text" name="username" value="<?php echo $user['username']; ?>"/></td>
		</tr>
		<tr>
			<td class="tableleft">手机号：</td>
			<td><input type="text" name="mobile" value="<?php echo $user['mobile']; ?>"/></td>
		</tr>
		<tr>
			<td class="tableleft">真实姓名：</td>
			<td><input type="text" name="realname" value="<?php echo $user['realname']; ?>"/></td>
		</tr>
		<tr>
			<td class="tableleft">用户类型：</td>
			<td><select id="user_type" name="user_type" onchange="select_usertype(this.value)">
				<option value="1" <?php if($user['user_type'] == 1): ?>selected="selected"<?php endif; ?>>技工所</option>
				<option value="2" <?php if($user['user_type'] == 2): ?>selected="selected"<?php endif; ?>>医生</option>
			</select></td>
		</tr>
		<tr>
			<td class="tableleft">性别：</td>
			<td><input type="radio" name="sex" value="1" <?php if($user['sex'] == 1): ?>checked<?php endif; ?>>男&nbsp;&nbsp;<input type="radio" name="sex" value="2" <?php if($user['sex'] == 2): ?>checked<?php endif; ?>>女</td>
		</tr>
		<tr>
			<td class="tableleft">邮箱：</td>
			<td><input type="text" name="email" value="<?php echo $user['email']; ?>"/></td>
		</tr>
		<tr>
			<td class="tableleft">出生年月：</td>
			<td>
			<select id="year" name="year" style="width:60px">
			<?php if(is_array($year) || $year instanceof \think\Collection || $year instanceof \think\Paginator): $i = 0; $__LIST__ = $year;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$year): $mod = ($i % 2 );++$i;?>
			<option value="<?php echo $year; ?>" <?php if($user['year'] == $year): ?>selected<?php endif; ?>><?php echo $year; ?></option>
			<?php endforeach; endif; else: echo "" ;endif; ?>
			</select>年
			<select id="month" name="month" style="width:60px">
			<?php if(is_array($month) || $month instanceof \think\Collection || $month instanceof \think\Paginator): $i = 0; $__LIST__ = $month;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$month): $mod = ($i % 2 );++$i;?>
			<option value="<?php echo $month; ?>" <?php if($user['month'] == $month): ?>selected<?php endif; ?>><?php echo $month; ?></option>
			<?php endforeach; endif; else: echo "" ;endif; ?>
			</select>月
			<select id="day" name="day" style="width:60px">
			<?php if(is_array($day) || $day instanceof \think\Collection || $day instanceof \think\Paginator): $i = 0; $__LIST__ = $day;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$day): $mod = ($i % 2 );++$i;?>
			<option value="<?php echo $day; ?>" <?php if($user['day'] == $day): ?>selected<?php endif; ?>><?php echo $day; ?></option>
			<?php endforeach; endif; else: echo "" ;endif; ?>
			</select>日
			</td>
		</tr>
		<tr>
			<td class="tableleft">单位名称：</td>
			<td><input type="text" name="company_name" value="<?php echo $user['company_name']; ?>"/></td>
		</tr>
		<tr>
			<td class="tableleft">单位地址：</td>
			<td><input type="text" name="company_addr" value="<?php echo $user['company_addr']; ?>"/></td>
		</tr>
		<tr>
			<td class="tableleft">单位电话：</td>
			<td><input type="text" name="company_phone" value="<?php echo $user['company_phone']; ?>"/></td>
		</tr>
		<tr>
			<td class="tableleft">部门：</td>
			<td><input type="text" name="department" value="<?php echo $user['department']; ?>"/></td>
		</tr>
		<tr>
			<td class="tableleft">职位：</td>
			<td><input type="text" name="position" value="<?php echo $user['position']; ?>"/></td>
		</tr>
		<tr>
			<td class="tableleft">人员数：</td>
			<td><input type="text" name="person_num" value="<?php echo $user['persons_num']; ?>"/></td>
		</tr>
		<tr>
			<td class="tableleft">邮编：</td>
			<td><input type="text" name="zipcode" value="<?php echo $user['zipcode']; ?>"/></td>
		</tr>
		
		<tr>
	        <td class="tableleft">头像或Logo：</td>
	        <td ><input  type="file" name="logo" id="logo"/><?php if($user['head_img'] != ''): ?><div style="margin-left: 200px; margin-top: -30px;">预览：<img src="<?php echo \think\Config::get('host_url'); ?>/public/uploads/<?php echo $user['head_img']; ?>" width="50px" height="50px"></div><?php endif; ?></td>
	    </tr>
	    <tr>
	        <td class="tableleft">单位介绍：</td>
	        <td><textarea id="company_info" name="company_info" cols="40" rows="5" placeholder="请输入单位介绍，限制100字内"><?php echo $user['company_info']; ?></textarea></td>
	    </tr>
	    <tr class="techer">
	        <td class="tableleft">年全瓷牙量</td>
	        <td><input type="text" name="year_tooth_num" id="year_tooth_num" placeholder="请填写年全瓷牙量" value="<?php echo $user['year_tooth_num']; ?>"/></td>
	    </tr>
	    <tr class="techer">
	        <td class="tableleft">年营业额</td>
	        <td><input type="text" name="year_sales" id="year_sales" placeholder="请填写年营业额" value="<?php echo $user['year_sales']; ?>"/></td>
	    </tr>
	    <tr class="techer">
	        <td class="tableleft">在用氧化锆品牌</td>
	        <td><input type="text" name="yhg_band" id="yhg_band" placeholder="请填写在用氧化锆品牌" value="<?php echo $user['yhg_band']; ?>"/></td>
	    </tr>
	    <tr class="techer">
	        <td class="tableleft">在用瓷粉品牌</td>
	        <td><input type="text" name="cf_band" id="cf_band" placeholder="请填写在用瓷粉品牌" value="<?php echo $user['cf_band']; ?>"/></td>
	    </tr>
	    <tr class="techer">
	        <td class="tableleft">厂房面积</td>
	        <td><input type="text" name="factory" id="factory" placeholder="请填写厂房面积" value="<?php echo $user['factory']; ?>"/></td>
	    </tr>
	    <tr class="techer">
	        <td class="tableleft">扩展计划</td>
	        <td><input type="text" name="plan" id="plan" placeholder="请填写扩展计划" value="<?php echo $user['plan']; ?>"/></td>
	    </tr>
	    
	    <tr class="doctor">
	        <td class="tableleft">椅位</td>
	        <td><input type="text" name="seats" id="seats" placeholder="请填写椅位" value="<?php echo $user['seats']; ?>"/></td>
	    </tr>
	    <tr class="doctor">
	        <td class="tableleft">是否开展种植</td>
	        <td><input type="radio" id="is_grow" name="is_grow" value="1" <?php if($user['is_grow'] == 1): ?>checked="checked"<?php endif; ?> >是<input type="radio" id="is_grow2" name="is_grow" value="2" <?php if($user['is_grow'] == 2): ?>checked="checked"<?php endif; ?>>否</td>
	    </tr>
	    <tr class="doctor">
	        <td class="tableleft">是否上椅旁系统</td>
	        <td><input type="radio" id="is_seats" name="is_seats" value="1" <?php if($user['is_seats'] == 1): ?>checked="checked"<?php endif; ?>>是<input type="radio" id="is_seats2" name="is_seats" value="2" <?php if($user['is_seats'] == 2): ?>checked="checked"<?php endif; ?>>否</td>
	    </tr>
	    <tr class="doctor">
	        <td class="tableleft">是否已开展正畸</td>
	        <td><input type="radio" id="is_correct" name="is_correct" value="1" <?php if($user['is_correct'] == 1): ?>checked="checked"<?php endif; ?>>是<input type="radio" id="is_correct2" name="is_correct" value="2" <?php if($user['is_correct'] == 2): ?>checked="checked"<?php endif; ?>>否</td>
	    </tr>
		
        <tr>
            <td class="tableleft"></td>
            <td>
                <button type="submit" class="btn btn-primary" type="button">保存</button>				 &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
            </td>
        </tr>
    </table>
    <input type="hidden" id="user_type_s" value="<?php echo $user_type; ?>" />
</form>
</body>
</html>
<script>
$(function () {       
	$('#backid').click(function(){
			window.location.href="index";
	 });
	 
	 var user_type = $("#user_type_s").val();
	 if(user_type ==1)
	 {
	 	$(".techer").css("display", "");
	 	$(".doctor").css("display", "none");
	 }
	 else
	 {
	 	$(".techer").css("display", "none");
	 	$(".doctor").css("display", "");
	 }

});

function select_usertype(val)
{
	if(val==1)
	{
		//技工
		$(".techer").css("display","");
		$(".doctor").css("display","none");
	}
	else
	{
		//医生
		$(".techer").css("display","none");
		$(".doctor").css("display","");
	}
}
</script>