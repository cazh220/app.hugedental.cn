<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"/www/wwwroot/app.hugedental.cn/public/../application/admin/view/message/send.html";i:1513001834;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>发送消息</title>
    <meta charset="UTF-8">
	
	<link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/style.css" />
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/ckform.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/common.js"></script>

</head>
<body>
<form id="message" action="send" method="post" class="definewidth m20">
<table class="table table-bordered table-hover definewidth m10">
	<tr>
        <td class="tableleft"  style="line-height:27px;">发送对象：<br></td>
        <td  style="line-height:27px;"><input type="radio" name="receiver_type" value="1" checked="checked">指定接收人&nbsp;&nbsp;<input type="radio" name="receiver_type" value="0">所有人(发所有人会很慢，不要频繁发全局消息)
        <div id="users" style="display: block;"><textarea id="mobile" name="mobile" cols="20" rows="5"  placeholder="请输入手机号，每行一条"></textarea></div>
        </td>
  </tr>
    <tr>
        <td class="tableleft"  style="line-height:27px;">发送内容：</td>
        <td  style="line-height:27px;">
        	<textarea id="content" name="content" cols="40" rows="5"  placeholder="请输入消息内容,100字以内"></textarea>
        	
        </td>
    </tr>
    <tr>
        <td></td>
        <td  style="line-height:27px;">
            <button type="button" onclick="send()" class="btn btn-primary"  type="button">发送</button>
        </td>
    </tr>
</table>
</form>
</body>
</html>
<script>
    $(function () {       
		$("input[name=receiver_type]").click(function(){
			var type = $(this).val();
			if(type==1)
			{
				$("#users").css("display","block");
			}
			else
			{
				$("#users").css("display","none");
			}
		});
	});
    
    function send()
    {
    	//判断发送类型
		var type;
		type = $("input[name=receiver_type]:checked").val();
		if(type == 1)
		{
			var mobile = $("#mobile").val();
			if(mobile == '')
			{
				alert("请输入手机号");
				return false;
			}
			else
			{
				//验证手机号
				var exp = /^1(3|4|5|7|8)\d{9}$/;
				var strs= new Array();
				strs = mobile.split('\n');
				console.log(strs);
				for(var i=0; i<strs.length; i++)
				{
					//console.log(trim(strs[i]));
					//return false;
					if(strs[i] != '')
					{
						var tel;
						tel = strs[i].replace(/^\s+|\s+$/g,''); 
						checkPhone(tel);
					}
				}
			}
		}
    	
    	var content = $("#content").val();
    	if(content == '')
    	{
    		
    		alert('请填写发送内容');
    		return false;
    	}
    	else
    	{
    		if(jmz.GetLength(content) > 100)
    		{
    			alert('内容不大于100个字');
    			return false;
    		}
    	}
    	
    	$("#message").submit();
    }
    
    
    var jmz = {};
	jmz.GetLength = function(str) {
    	///<summary>获得字符串实际长度，中文2，英文1</summary>
    	///<param name="str">要获得长度的字符串</param>
	    var realLength = 0, len = str.length, charCode = -1;
	    for (var i = 0; i < len; i++) {
	        charCode = str.charCodeAt(i);
	        if (charCode >= 0 && charCode <= 128) realLength += 1;
	        else realLength += 2;
	    }
	    return realLength;
	};
	
	//去除首位空格
	function trim(str){ //删除左右两端的空格
　　   return str.replace(/(^s*)|(s*$)/g, "");
　　 }
	
	//校验
	function checkPhone(phone){ 
	    if(!(/^1(3|4|5|7|8)\d{9}$/.test(phone))){ 
	        alert(phone+"有误，请更正");  
	        return false; 
	    } 
	}
</script>