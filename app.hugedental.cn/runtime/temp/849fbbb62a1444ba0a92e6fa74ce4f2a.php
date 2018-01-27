<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"/www/wwwroot/app.hugedental.cn/public/../application/admin/view/security/create.html";i:1513001834;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>防伪码生成</title>
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
<form action="doCreate" method="post" class="definewidth m20">
<table class="table table-bordered table-hover definewidth m10">
	<tr>
        <td width="10%" class="tableleft"  style="line-height:27px;">防伪码主题：</td>
        <td  style="line-height:27px;"><input type="text" name="them" placeholder="日期/人名/产品/数量/印刷厂名称"/></td>
    </tr>
    <tr>
        <td width="10%" class="tableleft"  style="line-height:27px;">修复体产品：</td>
        <td  style="line-height:27px;">
        	<select id="" name="production_title">
        		<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
        		<option value="<?php echo $list['false_tooth_id']; ?>"><?php echo $list['false_tooth_name']; ?></option>
        	    <?php endforeach; endif; else: echo "" ;endif; ?>
        	</select>
        <!--<input type="text" name="production_title" placeholder="请输入对应产品"/>-->
        </td>
    </tr>
    <tr>
        <td width="10%" class="tableleft"  style="line-height:27px;">防伪码数量：</td>
        <td  style="line-height:27px;"><input type="text" name="num" placeholder="请输入数量"/></td>
    </tr>
	<tr>
        <td class="tableleft"  style="line-height:27px;">位数：</td>
        <td  style="line-height:27px;"><input type="text" name="size" placeholder="不少于16位"/></td>
    </tr>
	<tr>
        <td class="tableleft"  style="line-height:27px;">前缀：</td>
        <td  style="line-height:27px;"><input type="text" name="prefix" placeholder="美晶瓷M,诺必灵N"/></td>
    </tr>
    <tr>
        <td class="tableleft"  style="line-height:27px;">导出：</td>
        <td  style="line-height:27px;"><input type="checkbox" name="export" value="1"/></td>
    </tr>
    <tr>
        <td></td>
        <td  style="line-height:27px;">
            <button type="submit" class="btn btn-primary" id="create" type="button">生成</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
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
		 
		$("#create").click(function(){
			$(this).css("display", "none");
		});

    });
</script>