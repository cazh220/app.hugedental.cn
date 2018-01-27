<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"/www/wwwroot/app.hugedental.cn/public/../application/admin/view/admin/add.html";i:1513001832;}*/ ?>
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
<form action="add_admin_user" method="post" class="definewidth m20">
<table class="table table-bordered table-hover definewidth m10">
    <tr>
        <td width="10%" class="tableleft">账号</td>
        <td><input type="text" id="username" name="username"/><span id="username_note"></span></td>
    </tr>
    <tr>
        <td class="tableleft">密码</td>
        <td><input type="password" id="password" name="password"/><span id="password_note"></span></td>
    </tr>
	<tr>
        <td class="tableleft">确认密码</td>
        <td><input type="password" id="repassword" name="repassword"/><span id="repassword_note"></span></td>
    </tr>
    <tr>
        <td class="tableleft">角色</td>
        <td>
			<select name="parentid">
				<option value="1">管理员</option>
				<option value='2'/>其它</option>
			</select>
		</td>
    </tr>
    <tr>
        <td class="tableleft">手机号</td>
        <td><input type="text" name="mobile"/></td>
    </tr>
    <tr>
        <td class="tableleft">状态</td>
        <td>
            <input type="radio" name="is_frozen" value="0" checked/> 启用
           <input type="radio" name="is_frozen" value="1"/> 禁用
        </td>
    </tr>
    <tr>
        <td class="tableleft">权限</td>
        <td>
			<!--<label class='checkbox inline'><input type='checkbox' name='permission[]' value='21' />管理员权限</label>
			<label class='checkbox inline'><input type='checkbox' name='permission[]' value='22' />授权查看</label>-->
			<table border="1" style="border-color:#ccc" width="100%">
				<?php if(is_array($prev_data) || $prev_data instanceof \think\Collection || $prev_data instanceof \think\Paginator): $i = 0; $__LIST__ = $prev_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$prev): $mod = ($i % 2 );++$i;?>
				<tr>
					<td width="15%"><label class='checkbox inline'><input type='checkbox' name='permission[]' value='<?php echo $prev['action_id']; ?>' /><?php echo $prev['action_name']; ?></label></td>
					<td>
					<?php if(is_array($prev['child']) || $prev['child'] instanceof \think\Collection || $prev['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $prev['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$prev_act): $mod = ($i % 2 );++$i;?>
					<label class='checkbox inline'><input type='checkbox' name='permission[]' value='<?php echo $prev_act['action_id']; ?>' /><?php echo $prev_act['action_name']; ?></label>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					</td>
				</tr>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
		</td>
    </tr>
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary" type="button">保存</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
        </td>
    </tr>
</table>
</form>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="index.html";
		 });
		 
		$("#username").blur(function(){
			var username = $(this).val();
			//正则校验 数字字母组合4-12个字符
			var exp = /^\w{4,12}$/;
			if (!exp.test(username)){
				$("#username_note").html("<font color='red'>请输入4-12位数字字母或下划线组合</font>");
				return false;
			}
			
			$.ajax({
				type:"POST",
				url:"<?php echo \think\Config::get('host_url'); ?>/public/admin.php/admin/admin/check_username",
				data:"username="+username,
				dataType:"json",
				success:function(msg){
					if (msg.status == 1)
					{
						$("#username_note").html("<font color='red'>"+msg.message+"</font>");
					}
				}
			});
		});
		
		$("#username").focus(function(){
			$("#username_note").html("");
		});
		
		$("#password").blur(function(){
			var password = $(this).val();
			var exp = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,20}$/;
			if (!exp.test(password)){
				$("#password_note").html("<font color='red'>请输入6-20位包含数字字母</font>");
				return false;
			}
		});
		
		$("#password").focus(function(){
			$("#password_note").html("");
		});
		
		$("#repassword").blur(function(){
			var repassword = $(this).val();
			var password = $("#password").val();
			var exp = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,20}$/;
			if (!exp.test(repassword)){
				$("#repassword_note").html("<font color='red'>请输入6-20位包含数字字母</font>");
				return false;
			}
			
			if (repassword != password){
				$("#repassword_note").html("<font color='red'>密码不一致,请重新输入</font>");
				return false;
			}
		});
		
		$("#repassword").focus(function(){
			$("#repassword_note").html("");
		});
		
		

    });
</script>