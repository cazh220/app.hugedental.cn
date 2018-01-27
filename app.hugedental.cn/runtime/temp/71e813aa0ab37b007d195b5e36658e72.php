<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"/www/wwwroot/app.hugedental.cn/public/../application/admin/view/gift/edit.html";i:1515295802;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>编辑奖品</title>
    <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/bootstrap-datetimepicker.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/upload/css/default.css">
	<link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/upload/css/fileinput.css" media="all"/>
	
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/ckform.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/common.js"></script>
	<script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/locales/bootstrap-datetimepicker.fr.js"></script>
	<script src="<?php echo \think\Config::get('host_url'); ?>/public/static/upload/js/fileinput.js" type="text/javascript"></script>
</head>
<body>
<form id="gift_form" action="doEdit" method="post" class="definewidth m20" onsubmit="return checkSubmit();">
<input type="hidden" id="gift_id" name="gift_id" value="<?php echo $data['gift_id']; ?>" />
<input type="hidden" id="img_size" name="img_size" value="" />
<input type="hidden" id="upload_flag" name="upload_flag" value="0" />
<table class="table table-bordered table-hover definewidth m10">
    <tr>
        <td width="10%" class="tableleft" style="line-height:27px; font-size:13px">奖品名称：</td>
        <td style="line-height:27px;"><input type="text" name="gift_name" value="<?php echo $data['gift_name']; ?>"/></td>
    </tr>
    <tr>
        <td class="tableleft" style="line-height:27px; font-size:13px">奖品图片：</td>
        <td style="line-height:27px;">
			<input id="file-0a" class="file" type="file" multiple data-min-file-count="1" name="image" value="<?php echo $data['gift_photo']; ?>">
			<input type="hidden" id="gift_pic" name="gift_pic" value="<?php echo $data['gift_photo']; ?>"/>
			<!-- <form enctype="multipart/form-data" action="aaaa" method="post"> -->
				<!-- <input id="file-0a" class="file" type="file" multiple data-min-file-count="1"> -->
			<!-- </form> -->
		</td>
    </tr>
    <tr>
        <td class="tableleft" style="line-height:27px; font-size:13px">兑奖日期：</td>
        <td style="line-height:27px;">
                <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" style="width:20%">
                    <input class="form-control" size="16" type="text" value="<?php echo $data['create_time']; ?>" readonly style="height:32px;">
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				<input type="hidden" id="dtp_input2" name="validity_time" value="<?php echo $data['validity_time']; ?>" /><br/>
		</td>
    </tr>
    <tr>
        <td class="tableleft" style="line-height:27px; font-size:13px">规格属性：</td>
        <td ><input type="text" name="attribute" id="attribute" value="<?php echo $data['attribute']; ?>" placeholder=""/></td>
    </tr>
    <tr>
        <td class="tableleft" style="line-height:27px; font-size:13px">奖品介绍：</td>
        <td ><textarea name="gift_intro" cols="20" rows="5" ><?php echo $data['gift_intro']; ?></textarea></td>
    </tr>
  	<tr>
        <td class="tableleft" style="line-height:27px; font-size:13px">库存：</td>
        <td ><input type="text" name="stock" id="stock" value="<?php echo $data['num']; ?>" placeholder=""/></td>
    </tr>
    <tr>
        <td class="tableleft" style="line-height:27px; font-size:13px">兑换需抵扣积分：</td>
        <td style="line-height:27px;">
           <input type="text" id="credit" name="credit" value="<?php echo $data['credits']; ?>">
        </td>
    </tr>
    <tr>
        <td class="tableleft"></td>
        <td style="line-height:27px;">
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

    });
  
  	function checkSubmit()
  	{
    	var flag = $("#upload_flag").val();
      	/*if(flag==0)
        {
        	alert("您的图片还未上传，请确认点击upload上传");
          	return false;
        }*/
      	return true;
    }
	
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	
	
	var gift_pic = $("#gift_pic").val();
	var gift_id = $("#gift_id").val();
	//图片
	var pic;
	if(gift_pic != '')
	{
		pic = "http://app.hugedental.cn/public/uploads/"+gift_pic;
	}
	
	/*
	var xhr = $.ajax({
	  type: "HEAD",
	  url: pic,
	  success: function(msg){
		//alert(xhr.getResponseHeader('Content-Length') + ' bytes');
		size = xhr.getResponseHeader('Content-Length');
		$("#img_size").val(size);
	  }
	});
	*/

	//var img=new Image(); 
	//img.src=pic;
	//img.dynsrc=pic;
	/*
	img.onload = function(){
		//var a=this.fileSize;
		console.log(img.size);
	}*/

	if (pic)
	{
		$("#file-0a").fileinput({
			uploadUrl: "upload", // server upload action
			uploadAsync: true,
			showPreview: true,
			initialPreview: [
			pic
			],
			initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
			initialPreviewFileType: 'image', // image is the default and can be overridden in config below
			initialPreviewConfig: [
				{caption: gift_pic, size: 576237, width: "120px", url: "delete_pic?gift_pic="+gift_pic+"&gift_id="+gift_id, key: 1},
			],
			allowedFileExtensions : ['jpg', 'png','gif'],
			overwriteInitial: false,
			maxFileSize: 1000,
			maxFilesNum: 1,
			slugCallback: function(filename) {
				return filename.replace('(', '_').replace(']', '_');
			}
		}).on("fileuploaded", function(event, data) {
			if(data.response.status == 1)
			{
				$("#gift_pic").val(data.response.name);
              	$("#upload_flag").val(1);
			}
			else
			{
				alert('上传失败');
			}
		});
	}
	else
	{
		$("#file-0a").fileinput({
			uploadUrl: "upload", // server upload action
			uploadAsync: true,
			initialPreviewFileType: 'image', // image is the default and can be overridden in config below
			allowedFileExtensions : ['jpg', 'png','gif'],
			overwriteInitial: false,
			maxFileSize: 1000,
			maxFilesNum: 1,
			slugCallback: function(filename) {
				return filename.replace('(', '_').replace(']', '_');
			}
		}).on("fileuploaded", function(event, data) {
			if(data.response.status == 1)
			{
				$("#gift_pic").val(data.response.name);
              	$("#upload_flag").val(1);
			}
			else
			{
				alert('上传失败');
			}
		});
	}
	
</script>