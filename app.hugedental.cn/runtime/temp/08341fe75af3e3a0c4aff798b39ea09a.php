<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"/www/wwwroot/app.hugedental.cn/public/../application/admin/view/stock/detail.html";i:1516805386;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>出库防伪码详细</title>
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
<table class="table table-bordered table-hover definewidth m10" width="1000px">
  	<tr>
      <td><textarea style="width:1300px; height:300px"  readonly="true"><?php echo $stock_info['code_list']; ?></textarea></td>  
  	</tr>
    <tr>
        <td  style="line-height:27px;">
            <button type="button"  name="backid" id="backid">返回列表</button>
        </td>
    </tr>
</table>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="index.html";
		 });
      	

    });
</script>