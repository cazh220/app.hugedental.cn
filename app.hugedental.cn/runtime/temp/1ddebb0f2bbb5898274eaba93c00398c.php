<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:95:"/www/wwwroot/app.hugedental.cn/public/../application/index/view/credits/add_patient_techer.html";i:1515692571;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
		<title>技工录入</title>
		<style>
			a {
				text-decoration: none;
				color: #002280
			}
			
			a:hover {
				text-decoration: underline
			}
			
			body {
				font-size: 9pt;
			}
			
			table {
				font: 9pt Tahoma, Verdana;
				color: #002280
			}
			
			input,
			select,
			textarea {
				font: 9pt Tahoma, Verdana;
				font-weight: normal;
			}
			
			select {
				font: 9pt Tahoma, Verdana;
				font-weight: normal;
			}
			
			.category {
				font: 9pt Tahoma, Verdana;
				color: #000000;
				background-color: #fcfcfc
			}
			
			.singleborder {
				font-size: 0px;
				line-height: 1px;
				padding: 0px;
				background-color: #F8F8F8
			}
			
			.bold {
				font-weight: bold
			}
			/*修改主要色调*/
			
			header table {
				color: #a1a1a1
			}
			
			header strong {
				color: red
			}
			
			header a {
				color: #a1a1a1
			}
			
			.header {
				font: 9pt Tahoma, Verdana;
				color: #FFFFFF;
				font-size: 16px;
				background-color: #5da708
			}
			
			.header a {
				color: #FFFFFF
			}
			
			.tableborder {
				background: #7fb926;
				border: 1px solid #5da708
			}
			td {height:32px;text-indent: 8px;}
			/*分页样式*/
			
			.epages {
				margin: 3px 0;
				font: 11px/12px Tahoma
			}
			
			.epages * {
				vertical-align: middle;
			}
			
			.epages a {
				padding: 1px 4px 1px;
				border: 1px solid #A6CBE7;
				margin: 0 1px 0 0;
				text-align: center;
				text-decoration: none;
				font: normal 12px/14px verdana;
			}
			
			.epages a:hover {
				border: #659B28 1px solid;
				background: #f3f8ef;
				text-decoration: none;
				color: #004c7d
			}
			
			.epages input {
				margin-bottom: 0px;
				border: 1px solid #659B28;
				height: 15px;
				font: bold 12px/15px Verdana;
				padding-bottom: 1px;
				padding-left: 1px;
				margin-right: 1px;
				color: #659B28;
			}
			.tableborder img{
				vertical-align:baseline;
				margin-right: 5px;
			}
             .header{
             	text-indent: 0;
             }           

		</style>
		<script src="<?php echo \think\Config::get('host_url'); ?>/public/static/index/js/jquery.js"></script>
		<script lanuage="JScript">
			function DisplayImg(ss, imgname, phome) {
				if(imgname == "menumemberimg") {
					img = todisplay(domenumember, phome);
					document.images.menumemberimg.src = img;
				} else if(imgname == "menumsgimg") {
					img = todisplay(domenumsg, phome);
					document.images.menumsgimg.src = img;
				} else if(imgname == "menuinfoimg") {
					img = todisplay(domenuinfo, phome);
					document.images.menuinfoimg.src = img;
				} else if(imgname == "menuspaceimg") {
					img = todisplay(domenuspace, phome);
					document.images.menuspaceimg.src = img;
				} else if(imgname == "menupayimg") {
					img = todisplay(domenupay, phome);
					document.images.menupayimg.src = img;
				} else if(imgname == "menushopimg") {
					img = todisplay(domenushop, phome);
					document.images.menushopimg.src = img;
				} else {}
				DisplayAllMenu(imgname);
			}

			function todisplay(ss, phome) {
				if(ss.style.display == "") {
					ss.style.display = "none";
					theimg = "<?php echo \think\Config::get('host_url'); ?>/public/static/index/css/new/add.gif";
				} else {
					ss.style.display = "";
					theimg = "<?php echo \think\Config::get('host_url'); ?>/public/static/index/css/new/noadd.gif";
				}
				return theimg;
			}

			function turnit(ss, img) {
				DisplayImg(ss, img, 0);
			}

			function DisplayAllMenu(imgname) {
				if(imgname != 'menumemberimg' && domenumember.style.display == "") {
					domenumember.style.display = "none";
					document.images.menumemberimg.src = "<?php echo \think\Config::get('host_url'); ?>/public/static/index/css/new/add.gif";
				}
				if(imgname != 'menumsgimg' && domenumsg.style.display == "") {
					domenumsg.style.display = "none";
					document.images.menumsgimg.src = "<?php echo \think\Config::get('host_url'); ?>/public/static/index/css/new/add.gif";
				}
				if(imgname != 'menuinfoimg' && domenuinfo.style.display == "") {
					domenuinfo.style.display = "none";
					document.images.menuinfoimg.src = "<?php echo \think\Config::get('host_url'); ?>/public/static/index/css/new/add.gif";
				}
				if(imgname != 'menuspaceimg' && domenuspace.style.display == "") {
					domenuspace.style.display = "none";
					document.images.menuspaceimg.src = "<?php echo \think\Config::get('host_url'); ?>/public/static/index/css/new/add.gif";
				}
				if(imgname != 'menupayimg' && domenupay.style.display == "") {
					domenupay.style.display = "none";
					document.images.menupayimg.src = "<?php echo \think\Config::get('host_url'); ?>/public/static/index/css/new/add.gif";
				}
				if(imgname != 'menushopimg' && domenushop.style.display == "") {
					domenushop.style.display = "none";
					document.images.menushopimg.src = "<?php echo \think\Config::get('host_url'); ?>/public/static/index/css/new/add.gif";
				}
			}
			
			function formsubmit(){
				var hospital = $("#hospital").val();
				var doctor = $("#doctor").val();
				var name = $("#name").val();
				var birthday = $("#birthday").val();
				if(hospital == '')
				{
					alert('医疗机构不为空');
					return false;
				}
				if(doctor == '')
				{
					alert('医疗专家不为空');
					return false;
				}
				if(name == '')
				{
					alert('患者姓名不为空');
					return false;
				}
				if(birthday == '')
				{
					alert('年龄不为空');
					return false;
				}
				var tooth_position1 = $("#tooth_position1").val();
				var tooth_position2 = $("#tooth_position2").val();
				var tooth_position3 = $("#tooth_position3").val();
				var tooth_position4 = $("#tooth_position4").val();
				
				var exp = /^[1-8]{1,8}$/;
				if(tooth_position1 && !exp.exec(tooth_position1))
				{
					alert('左上牙位填写不符合要求');
					return false;
				}
				else if(tooth_position2 && !exp.exec(tooth_position2))
				{
					alert('右上牙位填写不符合要求');
					return false;
				}
				else if(tooth_position3 && !exp.exec(tooth_position3))
				{
					alert('左下牙位填写不符合要求');
					return false;
				}
				else if(tooth_position4 && !exp.exec(tooth_position4))
				{
					alert('右下牙位填写不符合要求');
					return false;
				}
				
				$("#userinfoform").submit();
			}
		</script>
	</head>

	<body leftmargin="0" topmargin="0">
		<header>
		<div class="wrap">
			<h1 class="logo fl">
				<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/index"><img src="<?php echo \think\Config::get('host_url'); ?>/public/static/index/css/new/hg_logo.png" style="width:100px; height:45px"></a>
			</h1>
			<div class="info fr">
				<div class="login fr">
					<?php if($users != ''): ?>
					<font color="#ccc">欢迎您，<?php echo $users; ?>! <span>|</span>
					<!--<a href="http://huge.com/public/index.php/index/index/resetpwd">修改密码</a><span>|</span>-->
					<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/member/index">会员中心</a><span>|</span>
					<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/index/logout">退出</a></font>
					<?php else: ?>
					<!--<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/index/register">注册</a><span>|</span>
					<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/index/login">登录</a>-->
					<!-- 登录 -->
					<?php endif; ?>
				</div>
			</div>
		</div>
	</header>
	
	
		<div class="wrap" style="margin-bottom:120px">
			<div style="margin:10px 0">
				<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/index/">首页</a>&nbsp;&gt;&nbsp;<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/member/">会员中心</a>&nbsp;&gt;&nbsp;修改资料			</div>
			<table width="1300" border="0" align="center" cellpadding="12" cellspacing="1" bgcolor="#7fb926">
				<tbody><tr>
					<td width="15%" valign="top" bgcolor="#FFFFFF">
												<table width="180" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
							<tbody><tr class="header" id="domenumemberid" onmouseup="turnit(domenumember,&#39;menumemberimg&#39;);" style="CURSOR: hand" title="展开/收缩">
								<td height="40"><img src="<?php echo \think\Config::get('host_url'); ?>/public/static/index/css/new/add.gif" name="menumemberimg" width="20" height="9" border="0">帐号</td>
							</tr>
							</tbody><tbody id="domenumember" style="display:">
								<tr>
									<td bgcolor="#FFFFFF">
										<table width="90%" border="0" align="right" cellpadding="3" cellspacing="1">
											<tbody><tr>
												<td height="32">
													<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/member/edit_member">修改资料</a>
												</td>
											</tr>
											<tr>
												<td height="32">
													<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/member/edit_password">修改密码</a>
												</td>
											</tr>
											<tr>
												<td height="32">
													<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/patient">患者列表</a>
												</td>
											</tr>
										</tbody></table>
									</td>
								</tr>
							</tbody>
							<tbody><tr class="header" id="domenumsgid" onmouseup="turnit(domenumsg,&#39;menumsgimg&#39;);" style="CURSOR: hand" title="展开/收缩">
								<td height="40"><img src="<?php echo \think\Config::get('host_url'); ?>/public/static/index/css/new/add.gif" name="menumsgimg" width="20" height="9" border="0">积分管理</td>
							</tr>
							</tbody><tbody id="domenumsg" style="display:">
								<tr>
									<td bgcolor="#FFFFFF">
										<table width="90%" border="0" align="right" cellpadding="3" cellspacing="1">
											<tbody><tr>
												<td height="32">
													<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/credits/search_credits">积分查询</a>
												</td>
											</tr>
											<tr>
												<td height="32">
													<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/credits/detail">积分明细</a>
												</td>
											</tr>
											<tr>
												<td height="32">
													<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/credits/write_security_code">获得积分</a>
												</td>
											</tr>
										</tbody></table>
									</td>
								</tr>
							</tbody>
							
							<tbody><tr class="header" id="domenuspaceid" onmouseup="turnit(domenuspace,&#39;menuspaceimg&#39;);" style="CURSOR: hand" title="展开/收缩">
								<td height="40"><img src="<?php echo \think\Config::get('host_url'); ?>/public/static/index/css/new/add.gif" name="menuspaceimg" width="20" height="9" border="0">积分商城</td>
							</tr>
							</tbody><tbody id="domenuspace" style="display:">
								<tr>
									<td bgcolor="#FFFFFF">
										<table width="90%" border="0" align="right" cellpadding="3" cellspacing="1">
											<tbody>
											<tr>
												<td height="32">
													<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/shop/index">积分商城</a>
												</td>
											</tr>
											<tr>
												<td height="32">
													<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/cart/index">我的购物车</a>
												</td>
											</tr>
											<tr>
												<td height="32">
													<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/order/index">我的兑换订单</a>
												</td>
											</tr>
											</tr>
										</tbody></table>
									</td>
								</tr>
							</tbody>
							<tbody><tr class="header">
								<td height="40"><img src="<?php echo \think\Config::get('host_url'); ?>/public/static/index/css/new/noadd.gif" width="20" height="9" border="0">
									<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/index/logout" onclick="return confirm(&#39;确认要退出?&#39;);">退出</a>
								</td>
							</tr>
						</tbody></table>
											</td>
					<td width="80%" height="420" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <tbody><tr>
    <td width="50%" height="30" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="50%" bgcolor="#FFFFFF"><div align="right"></div></td>
  </tr>
</tbody></table>
<br>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">

  <form id = "userinfoform" name="userinfoform" method="post" enctype="multipart/form-data" action="do_edit_member">
    <input type="hidden" name="enews" value="EditInfo">
	<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
	<input type="hidden" name="security_code" value="<?php echo $security_code; ?>">
	<input type="hidden" name="patient_id" value="<?php echo $patient['patient_id']; ?>">
    <tbody><tr class="header"> 
      <td height="25" colspan="2">技工录入</td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25" colspan="2"> 
        <table width="100%" align="center" cellpadding="3" cellspacing="1" bgcolor="#DBEAF5">
			<tbody>
			<tr>
				<td width="25%" height="25" bgcolor="ffffff">医疗机构:</td><td bgcolor="ffffff">
				<input name="hospital" type="text" id="hospital" value="<?php echo $patient['hospital']; ?>"><span style="color:red">*</span>
				</td>
			</tr>
			
			<tr>
				<td width="25%" height="25" bgcolor="ffffff">医疗专家:</td><td bgcolor="ffffff">
				<input name="doctor" type="text" id="doctor" value="<?php echo $patient['doctor']; ?>"><span style="color:red">*</span>
				</td>
			</tr>
			<tr>
				<td width="25%" height="25" bgcolor="ffffff">患者姓名:</td><td bgcolor="ffffff">
				<input name="name" type="text" id="name" value="<?php echo $patient['name']; ?>"><span style="color:red">*</span>
				</td>
			</tr>
			<tr>
				<td width="16%" height="25" bgcolor="ffffff">患者性别:</td>
				<td bgcolor="ffffff">
					<input name="sex" type="radio" id="sex1" value="1" <?php if($patient['sex'] == 1): ?>checked="checked"<?php endif; ?>>男
					<input name="sex" type="radio" id="sex2" value="2" <?php if($patient['sex'] == 2): ?>checked="checked"<?php endif; ?>>女
				</td>
			</tr>
			
			<tr>
				<!--<td width="16%" height="25" bgcolor="ffffff">出生年月:</td>
				<td bgcolor="ffffff">
					<select id="year" name="year" >
						<option value="">请选择</option>
						<?php if(is_array($year) || $year instanceof \think\Collection || $year instanceof \think\Paginator): $i = 0; $__LIST__ = $year;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$_year): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $_year; ?>" <?php if($_year == $year_s): ?>selected<?php endif; ?>><?php echo $_year; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>年
					<select id="month" name="month" >
						<option value="">请选择</option>
						<?php if(is_array($month) || $month instanceof \think\Collection || $month instanceof \think\Paginator): $i = 0; $__LIST__ = $month;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$_month): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $_month; ?>" <?php if($_month == $month_s): ?>selected<?php endif; ?>><?php echo $_month; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>月
					<select id="day" name="day" >
						<option value="">请选择</option>
						<?php if(is_array($day) || $day instanceof \think\Collection || $day instanceof \think\Paginator): $i = 0; $__LIST__ = $day;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$_day): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $_day; ?>" <?php if($_day == $day_s): ?>selected<?php endif; ?>><?php echo $_day; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>日
					<span style="color:red">*</span>
				</td>-->
				<td width="16%" height="25" bgcolor="ffffff">年龄:</td>
				<td bgcolor="ffffff">
					<input  type="text"  id="birthday" name="birthday" value="<?php echo $patient['birthday']; ?>"/>
					<span style="color:red">*</span>
				</td>
			</tr>
			<tr>
				<td width="16%" height="25" bgcolor="ffffff">选择牙位:</td>
				<td bgcolor="ffffff">
					<div>
						<input name="tooth_position1" type="text" id="tooth_position1" value="<?php echo $patient['tooth_position1']; ?>">
						<input name="tooth_position2" type="text" id="tooth_position2" value="<?php echo $patient['tooth_position2']; ?>">
					</div>
					<div style="float: left;">
						<input name="tooth_position3" type="text" id="tooth_position3" value="<?php echo $patient['tooth_position3']; ?>">
						<input name="tooth_position4" type="text" id="tooth_position4" value="<?php echo $patient['tooth_position4']; ?>">
					</div>
					<div style="color:red; float: left; vertical-align: middle;">*</div>
				<!--<input name="company_addr" type="text" id="company_addr" value=""><span style="color:red">*</span>-->
			</td>
			</tr>
			<tr>
				<td width="16%" height="25" bgcolor="ffffff">制作单位:</td>
				<td bgcolor="ffffff"><input name="production_unit" type="text" id="production_unit" value="<?php echo $user_detail['company_name']; ?>" disabled="disabled"></td><span style="color:red">*</span>
			</tr>
			<tr>
				<td width="16%" height="25" bgcolor="ffffff">录入人员:</td>
				<td bgcolor="ffffff"><input name="recorder" type="text" id="recorder" value="<?php echo $user_detail['realname']; ?>" disabled="disabled"><span style="color:red">*</span>
			</td>
			</tr>
			<tr>
				<td width="16%" height="25" bgcolor="ffffff">修复体类别:</td>
				<td bgcolor="ffffff">
					<select id="false_tooth" name="false_tooth">
						<option value="1" <?php if($patient['false_tooth'] == 1): ?>selected="selected"<?php endif; ?>>美晶瓷全牙</option>
						<option value="4" <?php if($patient['false_tooth'] == 4): ?>selected="selected"<?php endif; ?>>氧化锆全牙</option>
					</select>
					<span style="color:red">*</span>
				</td>
			</tr>
			<tr>
				<td width="16%" height="25" bgcolor="ffffff">修复体图片：</td>
				<td bgcolor="ffffff"><input type="file" name="repairosome_pic">（尺寸：160X160，大小不超过1M）&nbsp;&nbsp;</td><span style="color:red">*</span>
			</tr>
			<?php if($patient['repairosome_pic']): ?>
			<tr>
				<td width="16%" height="25" bgcolor="ffffff">修复体图片预览：</td>
				<td bgcolor="ffffff"><img src="http://app.hugedental.cn/public/uploads/<?php echo $patient['repairosome_pic']; ?>" width="50px" height="50px"></td>
			</tr>
			<?php endif; ?>
		</tbody>
		</table>      
		</td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">&nbsp;</td>
      <td height="25" bgcolor="#FFFFFF"> <input type="button" name="Submit" onclick="formsubmit()" value="提交">
      </td>
    </tr>
  </form>
</tbody></table>
    </td>
  </tr>
</tbody></table>
<table width="960" border="0" align="center" cellpadding="3" cellspacing="1">
  <tbody><tr>
    <td height="8"></td>
  </tr>
</tbody></table>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/index/css/new/style.css">


<div class="footer">
		<div class="wrap">
			<div class="f_logo fl">
				<!--<img src="<?php echo \think\Config::get('host_url'); ?>/public/static/index/css/new/footer_logo.png">-->
			</div>
		</div>

		<div class="keep">
			<div class="wrap">
				<p class="t-cen">Copyright © 2017 沪鸽 All Rights Reserved 沪ICP备150号</p>
			</div>
		</div>
	</div>
</body></html>