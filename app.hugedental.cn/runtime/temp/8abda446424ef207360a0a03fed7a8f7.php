<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/www/wwwroot/app.hugedental.cn/public/../application/index/view/cart/index.html";i:1515692525;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<!-- saved from url=(0034)http://www.zhulu.com/e/member/msg/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
		<title>我的购物车</title>
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
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<script lanuage="JScript">
			function minus(id, score)
			{
				var num = $("#goods_num_"+id).val();
				num--;
				if(num <= 0)
				{
					num = 0;
				}
				
				$("#goods_num_"+id).val(num);
				//获取所需积分
				var need = parseInt($("#need_credits").text());
				need -= parseInt(score);
				if(need <= 0)
				{
					need = 0;
				}
				$("#need_credits").html(need);
				
			}
			
			function plus(id, score)
			{
				var num = $("#goods_num_"+id).val();
				num++;
				$("#goods_num_"+id).val(num);
				//获取所需积分
				var need = parseInt($("#need_credits").text());
				need += parseInt(score);
				$("#need_credits").html(need);
				//console.log(need);
			}
			
			//删除购物车中商品
			function delete_goods(id)
			{
				$.ajax({
					type:"post",
					url:"<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/cart/delete_cart_goods",
					data:'id='+id,
					dataType:'json',
					success:function(msg)
					{
						//console.log(msg);
						alert(msg.message);
						$("#tr"+id).css("display","none");
						//window.location.href="index";
					}
				});
			}
			
			//清空购物车
			function clear_cart()
			{
				$.ajax({
					type:"post",
					url:"<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/cart/clear_cart_goods",
					dataType:'json',
					success:function(msg)
					{
						//console.log(msg);
						alert(msg.message);
						window.location.href="index";
					}
				});
			}
			
			//兑换奖品
			function create_order()
			{
				//检验地址
				var province = $("#province").val();
				var city = $("#city").val();
				var district = $("#district").val();
				if(province==''||city==''||district=='')
				{
					alert('请选择收货地址区域');
					return false;
				}
				//邮编
				var zipcode = $("#zip_code").val();
				//收货人
				var consignee = $("#consignee").val();
				if(consignee == '')
				{
					alert('请填写收货人');
					return false;
				}
				//收货电话：
				var mobile = $("#mobile").val();
				if(mobile=='')
				{
					alert('请填写收货电话');
					return false;
				}
				//详细地址
				var address = $("#address").val();
				if(address=='')
				{
					alert('请填写详细收货地址');
					return false;
				}
				
				//传奖品数量
				var data = new Array();
				$(".goods_num").each(function(i){
					goods_id = $(this).data('id');
					num = $(this).val();
					val = goods_id+':'+num;
					data.push(val);
				});
				
				var address_json;
				address_json = {"province":province,"city":city,"district":district,"zipcode":zipcode,"consignee":consignee,"mobile":mobile,"address":address};
				//console.log(address_json);
				//return false;
				$.ajax({
					type:"post",
					url:"<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/cart/order_create",
					data:'detail='+JSON.stringify(data)+'&address='+JSON.stringify(address_json),
					dataType:'json',
					success:function(msg)
					{
						//console.log(msg);
						alert(msg.message);
						window.location.href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/cart/index";
					}
				});
				
			}
			
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
				<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/index/"><img src="<?php echo \think\Config::get('host_url'); ?>/public/static/index/css/new/hg_logo.png" style="width:100px; height:45px"></a>
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
				<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/index">首页</a>&nbsp;&gt;&nbsp;<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/shop/index">积分商城</a>&nbsp;&gt;&nbsp;我的购物车		</div>
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
									<a href="<?php echo \think\Config::get('host_url'); ?>/public/index.php/index/index/logout" >退出</a>
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
              <td width="50%" height="30" bgcolor="#FFFFFF"><div align="left"><b>合计：</b>共<span id="total_c" style="color:red"><?php echo $num_goods; ?></span>件商品;消耗积分：<span id="need_credits" style="color:red"><?php echo $need_total_credits; ?></span></div></td>
              <td width="50%" bgcolor="#FFFFFF"><div align="right"><input type="button" name="clear" onclick="clear_cart()" value="清空购物车" style="height:25px; width:70px" <?php if(empty($goods) || (($goods instanceof \think\Collection || $goods instanceof \think\Paginator ) && $goods->isEmpty())): ?>disabled<?php endif; ?>>&nbsp;&nbsp;<input type="button" name="create_order" onclick="create_order()" value="兑换" style="height:25px; width:50px" <?php if(empty($goods) || (($goods instanceof \think\Collection || $goods instanceof \think\Paginator ) && $goods->isEmpty())): ?>disabled<?php endif; ?>>&nbsp;&nbsp;</div></td>
            </tr>
        </tbody></table>
        <br>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" style="text-align: center;">
          <form style="text-align: center;" name="listmsg" method="post" action="#" onsubmit="return confirm(&#39;确认要删除?&#39;);"></form>
            <tbody><tr class="header"> 
              <td width="10%"><div align="center">序号</div></td>
              <td width="18%"><div align="center">兑换奖品</div></td>
              <td width="10%"><div align="center">奖品积分</div></td>
              <td width="20%"><div align="center">奖品数量</div></td>
			  <td width="10%"><div align="center">奖品单位</div></td>
			  <td width="17%"><div align="center">奖品图片</div></td>
			  <td width="15%"><div align="center">操作</div></td>
            </tr>
			<?php if(empty($goods) || (($goods instanceof \think\Collection || $goods instanceof \think\Paginator ) && $goods->isEmpty())): ?>
				<tr bgcolor="#FFFFFF"> 
				  <td colspan="7">您的购物车内尚未选择商品！</td>
				</tr>
			<?php else: if(is_array($goods) || $goods instanceof \think\Collection || $goods instanceof \think\Paginator): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
				<tr bgcolor="#FFFFFF" id="tr<?php echo $item['goods_id']; ?>"> 
				  <td><?php echo $item['id']; ?></td>
				  <td><?php echo $item['gift_name']; ?></td>
				  <td><?php echo $item['credits']; ?></td>
				  <td><i class="fa fa-minus-square-o fa-2x" onclick="minus(<?php echo $item['goods_id']; ?>, <?php echo $item['credits']; ?>)" style="vertical-align:middle"></i>&nbsp;&nbsp;<input type="text" value="<?php echo $item['goods_num']; ?>" size="3" id="goods_num_<?php echo $item['goods_id']; ?>" data-id="<?php echo $item['goods_id']; ?>" class="goods_num" style="vertical-align:middle; line-height:20px" /><i class="fa fa-plus-square-o fa-2x" id="plus" onclick="plus(<?php echo $item['goods_id']; ?>, <?php echo $item['credits']; ?>)" style="vertical-align:middle"></i></td>
				  <td>份</td>
				  <td><img src="<?php echo \think\Config::get('host_url'); ?>/public/uploads/<?php echo $item['gift_photo']; ?>" width="76px" height="50px" style="margin: 5px;"></td>
				  <td><a href="#" onclick="delete_goods(<?php echo $item['goods_id']; ?>)">移除</a></td>
				</tr>
				<?php endforeach; endif; else: echo "" ;endif; endif; ?>
			
        </tbody></table>
		
		<!--收货地址-->
		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" style="text-align: center;">
            <tbody>
				<tr class="header"> 
					<td width="100%" colspan="2"><div align="left">收货地址</div></td>
				</tr>
				<tr bgcolor="#FFFFFF"> 
					<td width="15%">区域：</td>
					<td align="left">
						<select id="province" name="province" onchange="change_province(this.value)">
							<option value="">请选择</option>
							<?php if(is_array($province) || $province instanceof \think\Collection || $province instanceof \think\Paginator): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pitem): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo $pitem['id']; ?>"><?php echo $pitem['name']; ?></option>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
						<select id="city" name="city" onchange="change_city(this.value)">
							<option value="">请选择</option>
						</select>
						<select id="district" name="district">
							<option value="">请选择</option>
						</select>
					</td>
				</tr>
				<tr bgcolor="#FFFFFF"> 
					<td width="15%">邮编：</td>
					<td align="left"><input type="text" id="zip_code" name="zip_code" value="" style="width:200px"></td>
				</tr>
				<tr bgcolor="#FFFFFF"> 
					<td width="15%">收货人：</td>
					<td align="left"><input type="text" id="consignee" name="consignee" value="" style="width:200px"></td>
				</tr>
				<tr bgcolor="#FFFFFF"> 
					<td width="15%">收货电话：</td>
					<td align="left"><input type="text" id="mobile" name="mobile" value="" style="width:200px"></td>
				</tr>
				<tr bgcolor="#FFFFFF"> 
					<td width="15%">详细地址：</td>
					<td align="left"><input type="text" id="address" name="address" value="" style="width:200px"></td>
				</tr>
			</tbody>
		</table>
		
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
			<div class="link fl">
			</div>
		</div>

		<div class="keep">
			<div class="wrap">
				<ul class="row">
				</ul>

				<p class="t-cen">Copyright © 2017 沪鸽 All Rights Reserved 沪ICP备15001344号</p>
			</div>
		</div>
	</div>

</body></html>