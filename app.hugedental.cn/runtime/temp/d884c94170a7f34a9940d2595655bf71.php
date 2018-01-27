<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/www/wwwroot/app.hugedental.cn/public/../application/admin/view/admin/edit.html";i:1513001832;}*/ ?>
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
<form action="edit_admin_user" method="post" onsubmit="return check_admin()" class="definewidth m20">
<input type="hidden" name="admin_id" value="<?php echo $data['admin_id']; ?>" />
    <table class="table table-bordered table-hover definewidth m10">
        <tr>
            <td width="10%" class="tableleft">登录名</td>
            <td><input type="text" name="username" id="username" value="<?php echo $data['username']; ?>"/><span id="username_note"></span></td>
        </tr>
        <tr>
            <td class="tableleft">角色</td>
            <td>
				<select name="role_id">
					<option value="1" <?php if($data['role_id'] == 1): ?>selected="selected"<?php endif; ?>>管理员</option>
					<option value="2" <?php if($data['role_id'] == 2): ?>selected="selected"<?php endif; ?>>其它</option>
				</select>
			</td>
        </tr>
        <tr>
            <td class="tableleft">手机号</td>
            <td><input type="text" name="mobile" id="mobile" value="<?php echo $data['mobile']; ?>"/><span id="mobile_note"></span></td>
        </tr>
        <tr>
            <td class="tableleft">状态</td>
            <td>
                <input type="radio" name="is_frozen" value="0" <?php if($data['is_frozen'] == 0): ?>checked<?php endif; ?> /> 启用
				<input type="radio" name="is_frozen" value="1" <?php if($data['is_frozen'] == 1): ?>checked<?php endif; ?> /> 禁用
            </td>
        </tr>
        <tr>
            <td class="tableleft">权限</td>
            <td>
				<table border="1" style="border-color:#ccc" width="100%">
				<?php if(is_array($prev_data) || $prev_data instanceof \think\Collection || $prev_data instanceof \think\Paginator): $i = 0; $__LIST__ = $prev_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$prev): $mod = ($i % 2 );++$i;?>
				<tr>
					<td width="10%"><label class='checkbox inline'><input type='checkbox' name='permission[]' value='<?php echo $prev['action_id']; ?>' <?php if($prev['checked'] == 1): ?>checked<?php endif; ?> /><span style="margin-left:18px"><?php echo $prev['action_name']; ?></span></label></td>
					<td>
					<?php if(!(empty($prev['child']) || (($prev['child'] instanceof \think\Collection || $prev['child'] instanceof \think\Paginator ) && $prev['child']->isEmpty()))): if(is_array($prev['child']) || $prev['child'] instanceof \think\Collection || $prev['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $prev['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$prev_act): $mod = ($i % 2 );++$i;?>
					<label class='checkbox inline'><input type='checkbox' name='permission[]' value='<?php echo $prev_act['action_id']; ?>' <?php if($prev_act['checked'] == 1): ?>checked<?php endif; ?> /><span style="margin-left:18px"><?php echo $prev_act['action_name']; ?></span></label>
					<?php endforeach; endif; else: echo "" ;endif; endif; ?>
					</td>
				</tr>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
			</td>
        </tr>
        <tr>
            <td class="tableleft"></td>
            <td>
                <button type="submit" class="btn btn-primary" type="button" id="save">保存</button>				 &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="index";
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
		
		$("#mobile").blur(function(){
			var phone = $(this).val();
			
			if(!(/^1(3|4|5|7|8)\d{9}$/.test(phone))){ 
		        alert("手机号码不正确，请重填");  
		        return false; 
		    } 
		});
		

    });
    
    function check_admin()
    {
    	var username = $("#username").val();
    	if(username == '')
    	{
    		alert('请填用户名');
    		return false;
    	}
    	
    	var mobile = $("#mobile").val();
    	if(mobile == '')
    	{
    		alert('请填用手机号');
    		return false;
    	}
    	
    	//$("#save").attr("disabled", false);
    	
    }
</script>