<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/www/wwwroot/app.hugedental.cn/public/../application/index/view/shop/index.html";i:1515693008;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
		<title>积分商城</title>
		<script src="<?php echo \think\Config::get('host_url'); ?>/public/static/index/js/jquery.js"></script>
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
			
			function add_cart(val)
			{
				$.ajax({
					type:"post",
					url:"add_cart",
					data:'id='+val,
					dataType:'json',
					success:function(msg)
					{
						//console.log(msg);
						alert(msg.message);
					}
				});
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
					<?php if($user != ''): ?>
					<font color="#ccc">欢迎您，<?php echo $user; ?>! <span>|</span>
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
				<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/index">首页</a>&nbsp;&gt;&nbsp;<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/shop/index">积分商城</a>&nbsp;&gt;&nbsp;积分商城			</div>
			<table width="1200" border="0" align="center" cellpadding="12" cellspacing="1" bgcolor="#7fb926">
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
													<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/member/edit_password">修改安全信息</a>
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
													<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/credits/search_credits">我的积分</a>
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
											<tbody><tr>
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
					<td width="80%" height="420" valign="top" bgcolor="#FFFFFF"><script>
function CheckAll(form)
  {
  for (var i=0;i<form.elements.length;i++)
    {
    var e = form.elements[i];
    if (e.name != 'chkall')
       e.checked = form.chkall.checked;
    }
  }
</script> 
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
            <tbody><tr>
              <td width="50%" height="30" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="50%" bgcolor="#FFFFFF"><div align="right">&nbsp;&nbsp;</div></td>
            </tr>
        </tbody></table>
        <br>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
          <form name="listmsg" method="post" action="http://www.zhulu.com/e/member/doaction.php" onsubmit="return confirm(&#39;确认要删除?&#39;);"></form>
            <tbody><tr class="header"> 
              <td width="100%" height="23" colspan="4"> <div align="center">积分商城</div></td>
            </tr>
            <tr bgcolor="#FFFFFF">
            	<td>
            		<?php if(is_array($goods) || $goods instanceof \think\Collection || $goods instanceof \think\Paginator): $key = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($key % 2 );++$key;?>
            		
					<table align="center" style="margin: 10px; width: 218px; float: left; border-left: dashed 1px #00868B;border-top: dashed 1px #00868B;border-right: dashed 1px #00868B;border-bottom: dashed 1px #00868B;">
		              		<tr>
		              			<td rowspan="3" width="80px"><a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/goods/index?gift_id=<?php echo $item['gift_id']; ?>" target="_blank"><img src="<?php echo \think\Config::get('host_url'); ?>/public/uploads/<?php echo $item['gift_photo']; ?>" width="80px" height="80px"></a></td>
		              			<td><b><?php echo $item['gift_name']; ?></b></td>
		              		</tr>
		              		<tr>
		              			<td><font color="red"><?php echo $item['credits']; ?>积分</font></td>
		              		</tr>
		              		<tr>
		              			<td><input type="button" id="buy" onclick="add_cart(<?php echo $item['gift_id']; ?>)" value="加入购物车" style="background-color:#008800; color: #FFF; cursor: hand;"></td>
		              		</tr>
		              	</table>
            		<?php endforeach; endif; else: echo "" ;endif; ?>
            	</td>
            </tr>
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
				<!-- <img src="./消息列表_files/footer_logo.png"> -->
			</div>
			<!--<div class="link fl">
				<p>友情链接：</p>
				<a href="#" target="_blank">#</a>
				<a href="#" target="_blank">#</a>
				<a href="#" target="_blank">#</a>
				<a href="#" target="_blank">#</a>
				<a href="#" target="_blank">#</a>
			</div>-->
			<!-- <div class="wx t-cen fr">
				<img src="./files/wx.jpg">
				<p>扫一扫，关注</p>
			</div> -->
		</div>

		<div class="keep">
			<div class="wrap">
				<!--<ul class="row">
					<li>
						<a href="#">关于沪鸽 </a>
					</li>
					<li>
						<a href="#">加入我们</a>
					</li>
					<li>
						<a href="#"> 联系方式 </a>
					</li>
					<li>
						<a href="#"> 合作伙伴</a>
					</li>
					<li>
						<a href="#"> sitemap </a>
					</li>
				</ul>-->

				<p class="t-cen">Copyright © 2017 沪鸽 All Rights Reserved 沪ICP备1500号</p>
			</div>
		</div>
	</div>

</body></html>