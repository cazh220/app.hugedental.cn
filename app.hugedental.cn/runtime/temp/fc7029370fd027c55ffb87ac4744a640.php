<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"/www/wwwroot/app.hugedental.cn/public/../application/index/view/member/edit_member.html";i:1515692841;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
		<title>修改资料</title>
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
			//选择省获取市
			function change_province(id)
			{
				$.ajax({
					type:"get",
					url:"<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/Region/get_region",
					data:'id='+id,
					dataType:'json',
					success:function(msg)
					{
						var txt = "<option value=''>请选择</option>";
					    $.each(msg, function(i,n){
							txt += "<option value='"+n.id+"'>"+n.name+"</option>"
						});
						$("#city").html(txt);
						//window.location.href="cart/index";
					}
				});
			}
			
			//选择市获取区
			function change_city(id)
			{
				$.ajax({
					type:"get",
					url:"<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/Region/get_region",
					data:'id='+id,
					dataType:'json',
					success:function(msg)
					{
						var txt = "<option value=''>请选择</option>";
					    $.each(msg, function(i,n){
							txt += "<option value='"+n.id+"'>"+n.name+"</option>"
						});
						$("#district").html(txt);
					}
				});
			}
			
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
				<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/index">首页</a>&nbsp;&gt;&nbsp;<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/member">会员中心</a>&nbsp;&gt;&nbsp;修改资料			</div>
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

  <form name="userinfoform" method="post" enctype="multipart/form-data" action="do_edit_member">
    <input type="hidden" name="enews" value="EditInfo">
	<input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
    <tbody><tr class="header"> 
      <td height="25" colspan="2">修改基本资料</td>
    </tr>
    <tr> 
      <td width="25%" height="25" bgcolor="#FFFFFF"><div align="left">账号:</div></td>
      <td width="75%" height="25" bgcolor="#FFFFFF"><?php echo $user['username']; ?></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25" colspan="2"> 
        <table width="100%" align="center" cellpadding="3" cellspacing="1" bgcolor="#DBEAF5">
			<tbody>
			<tr>
				<td width="25%" height="25" bgcolor="ffffff">真实姓名:</td><td bgcolor="ffffff">
				<input name="realname" type="text" id="realname" value="<?php echo $user['realname']; ?>"><span style="color:red">*</span>
				</td>
			</tr>
			<tr>
				<td width="25%" height="25" bgcolor="ffffff">手机号:</td><td bgcolor="ffffff">
				<input name="mobile" type="text" id="mobile" value="<?php echo $user['mobile']; ?>"><span style="color:red">*</span>
				</td>
			</tr>
			<tr>
				<td width="16%" height="25" bgcolor="ffffff">会员类别:</td>
				<td bgcolor="ffffff">
					<input name="user_type" type="radio" id="user_type1" value="1" <?php if($user['user_type'] == 1): ?>checked<?php endif; ?> disabled>技工
					<input name="user_type" type="radio" id="user_type2" value="2" <?php if($user['user_type'] == 2): ?>checked<?php endif; ?> disabled>医生
				</td>
			</tr>
			<tr>
				<td width="16%" height="25" bgcolor="ffffff">出生年月:</td>
				<td bgcolor="ffffff">
					<select id="year" name="year" disabled="disabled">
						<option value="">请选择</option>
						<?php if(is_array($year) || $year instanceof \think\Collection || $year instanceof \think\Paginator): $i = 0; $__LIST__ = $year;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$_year): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $_year; ?>" <?php if($_year == $year_s): ?>selected<?php endif; ?>><?php echo $_year; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>年
					<select id="month" name="month" disabled="disabled">
						<option value="">请选择</option>
						<?php if(is_array($month) || $month instanceof \think\Collection || $month instanceof \think\Paginator): $i = 0; $__LIST__ = $month;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$_month): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $_month; ?>" <?php if($_month == $month_s): ?>selected<?php endif; ?>><?php echo $_month; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>月
					<select id="day" name="day" disabled="disabled">
						<option value="">请选择</option>
						<?php if(is_array($day) || $day instanceof \think\Collection || $day instanceof \think\Paginator): $i = 0; $__LIST__ = $day;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$_day): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $_day; ?>" <?php if($_day == $day_s): ?>selected<?php endif; ?>><?php echo $_day; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>日
				</td>
			</tr>
			<tr>
				<td width="16%" height="25" bgcolor="ffffff">单位名称:</td>
				<td bgcolor="ffffff"><input name="company_name" type="text" id="company_name" value="<?php echo $user['company_name']; ?>"><span style="color:red">*</span>
			</td>
			</tr>
			<tr>
				<td width="16%" height="25" bgcolor="ffffff">单位地址:</td>
				<td bgcolor="ffffff">
				<select id="province" name="province" onchange="change_province(this.value)">
							<option value="">请选择</option>
							<?php if(is_array($province_list) || $province_list instanceof \think\Collection || $province_list instanceof \think\Paginator): $i = 0; $__LIST__ = $province_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pitem): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo $pitem['id']; ?>" <?php if($pitem['id'] == $province_s): ?>selected<?php endif; ?>><?php echo $pitem['name']; ?></option>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
						<select id="city" name="city" onchange="change_city(this.value)">
							<option value="">请选择</option>
							<?php if(is_array($city_list) || $city_list instanceof \think\Collection || $city_list instanceof \think\Paginator): $i = 0; $__LIST__ = $city_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$citem): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo $citem['id']; ?>" <?php if($citem['id'] == $city_s): ?>selected<?php endif; ?>><?php echo $citem['name']; ?></option>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
						<select id="district" name="district">
							<option value="">请选择</option>
							<?php if(is_array($district_list) || $district_list instanceof \think\Collection || $district_list instanceof \think\Paginator): $i = 0; $__LIST__ = $district_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ditem): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo $ditem['id']; ?>" <?php if($ditem['id'] == $district_s): ?>selected<?php endif; ?>><?php echo $ditem['name']; ?></option>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
				<input name="company_addr" type="text" id="company_addr" value="<?php echo $user['company_addr']; ?>"><span style="color:red">*</span>
			</td>
			</tr>
			<tr>
				<td width="16%" height="25" bgcolor="ffffff">单位电话:</td>
				<td bgcolor="ffffff"><input name="company_phone" type="text" id="company_phone" value="<?php echo $user['company_phone']; ?>"></td><span style="color:red">*</span>
			</tr>
			<tr>
				<td width="16%" height="25" bgcolor="ffffff">部门:</td>
				<td bgcolor="ffffff"><input name="department" type="text" id="department" value="<?php echo $user['department']; ?>"><span style="color:red">*</span>
			</td>
			</tr>
			<tr>
				<td width="16%" height="25" bgcolor="ffffff">职位:</td>
				<td bgcolor="ffffff"><input name="position" type="text" id="position" value="<?php echo $user['position']; ?>"><span style="color:red">*</span>
			</td>
			</tr>
			<tr>
				<td width="16%" height="25" bgcolor="ffffff">单位介绍:</td>
				<td bgcolor="ffffff"><textarea id="company_info" name="company_info" cols="65" rows="10" placeholder="请输入单位介绍，100字以内"><?php echo $user['company_info']; ?></textarea></td>
			</tr>
			<!--<tr>
				<td width="16%" height="25" bgcolor="ffffff">区域:</td>
				<td bgcolor="ffffff">
					<select id="province" name="province" onchange="change_province(this.value)">
							<option value="">请选择</option>
							<?php if(is_array($province_list) || $province_list instanceof \think\Collection || $province_list instanceof \think\Paginator): $i = 0; $__LIST__ = $province_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pitem): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo $pitem['id']; ?>" <?php if($pitem['id'] == $province_s): ?>selected<?php endif; ?>><?php echo $pitem['name']; ?></option>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
						<select id="city" name="city" onchange="change_city(this.value)">
							<option value="">请选择</option>
							<?php if(is_array($city_list) || $city_list instanceof \think\Collection || $city_list instanceof \think\Paginator): $i = 0; $__LIST__ = $city_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$citem): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo $citem['id']; ?>" <?php if($citem['id'] == $city_s): ?>selected<?php endif; ?>><?php echo $citem['name']; ?></option>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
						<select id="district" name="district">
							<option value="">请选择</option>
							<?php if(is_array($district_list) || $district_list instanceof \think\Collection || $district_list instanceof \think\Paginator): $i = 0; $__LIST__ = $district_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ditem): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo $ditem['id']; ?>" <?php if($ditem['id'] == $district_s): ?>selected<?php endif; ?>><?php echo $ditem['name']; ?></option>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
				</td>
			</tr>-->
			<tr>
				<td width="16%" height="25" bgcolor="ffffff">邮箱:</td>
				<td bgcolor="ffffff"><input name="email" type="text" id="email" value="<?php echo $user['email']; ?>"></td>
			</tr>
			<tr>
				<td width="16%" height="25" bgcolor="ffffff">会员头像</td>
				<td bgcolor="ffffff"><input type="file" name="head">（尺寸：160X160，大小不超过1M）&nbsp;&nbsp;</td><span style="color:red">*</span>
			</tr>
		</tbody>
		</table>      
		</td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">&nbsp;</td>
      <td height="25" bgcolor="#FFFFFF"> <input type="submit" name="Submit" value="修改信息">
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