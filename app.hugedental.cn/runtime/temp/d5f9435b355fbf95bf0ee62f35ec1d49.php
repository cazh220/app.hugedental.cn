<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"/www/wwwroot/app.hugedental.cn/public/../application/admin/view/stock/create.html";i:1516956243;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>出库</title>
    <meta charset="UTF-8">
	
	<link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('host_url'); ?>/public/static/Css/style.css" />
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/ckform.js"></script>
    <script type="text/javascript" src="<?php echo \think\Config::get('host_url'); ?>/public/static/Js/common.js"></script>
  	<style>
       #codeTextarea{width: 1400px;height: 710px;}
      .textAreaWithLines{font-family: courier;border: 1px solid #ddd;}
      .textAreaWithLines textarea,.textAreaWithLines div{border: 0px;line-height: 120%;font-size: 12px;}
      .lineObj{color: #666;}
  	</style>

</head>
<body>
<form id="stock_out" action="doStockOut" method="post" class="definewidth m20">
<table class="table table-bordered table-hover definewidth m10">
    <tr>
        <td  style="line-height:27px;">
        <div style="height:50px">
          <input type="text" id="_code" name="_code" style="width:1000px" value="" placeholder="可根据会员编号或者技工单位名字、技工会员名字、技工会员账号模糊搜索"><button id="search">搜索</button>&nbsp;&nbsp;<button id="reback" class="reback">返回</button>&nbsp;&nbsp;<input type="button" id="save" onclick="stockout()"  value="保存">&nbsp;&nbsp;
        </div>
        <div  id="result"></div>
        <!--<div>
        <textarea id="code_list" name="code_list" cols="100" rows="5"  placeholder="防伪码以“，”隔开" readonly="true"></textarea>(已录入<span id="code_num">0</span>个)
        </div>-->
          
        <!--<div>
        	<textarea id="codeTextarea" name="codeTextarea" placeholder="防伪码以“，”隔开" ></textarea>  
        </div>-->
      	</td>
    </tr>
  	<tr>
      <td colspan="2"><input type="text" id="scan_code" name="scan_code" value="" style="width:1000px" placeholder="防伪码扫描录入"><input type="hidden" id="h_code" name="h_code" value=""></td>  
  	</tr>
	<tr>
      <td colspan="2" style="text-align:right">已录入数量<span id="count">0</span>个</td>  
  	</tr>
  	<tr>
      <td colspan="2" style="text-align:right"><textarea id="codeTextarea" name="codeTextarea" placeholder="请输入防伪码" ></textarea></td>  
  	</tr>
    <tr>
        <td></td>
        <td  style="line-height:27px;">
          	
        	<input type="hidden" id="error_flag" value="0"/>
            <button id="reback1" class="reback">返回</button>&nbsp;&nbsp;<input type="button" id="save1" onclick="stockout()"  value="保存">
        </td>
    </tr>
</table>
</form>
</body>
</html>
<script>
  	$('.reback').click(function(){
      			window.location.href="index.html";
      			return false;
		 });
  
    $(function () {       
		
      	 $("#search").click(function(){
         	var search = $("#_code").val();
           	$.ajax({
            	//url:'http://app.hugedental.cn/public/admin.php/admin/patient/search',
              	url:'http://app.hugedental.cn/public/admin.php/admin/user/search',
              	data:'search='+search,
              	type:'GET',
              	dataType:'json',
              	success:function(msg){
            		if(msg.list)
                    {
                      	var txt = '<table border="1" width="600" style="text-align:center">';
						$.each(msg.list, function(i, v){
                          	//<td><input type='button' onclick=\"select_code('"+v.security_code+"')\" value='选择'></td>
                        	txt += "<tr><td><input type='radio' name='user_group' value='"+v.user_id+"' checked></td><td>"+v.member_id+"</td><td>"+v.company_name+"</td><td>"+v.realname+"</td><td>"+v.mobile+"</td></tr>";
                        });   
                      	txt += '</table>';
                      	//console.log(txt);
                      	$("#result").html(txt);
                    }
            	}
            });
           
           return false;
         });
		 
		 
		 $("#code_list").blur(function(){
           	/*
		 	var code = new Array();
		 	var code_str = $(this).val();
		 	//code = code_str.split('\n')
           	code = code_str.split(',')
		 	var len = code.length;
		 	//console.log(len);
		 	$("#code_num").html(len);
            */
		 });

    });
  
  
  
  	setInterval(addcode,1000);
  
  	function addcode()
  	{
    	var code = $("#scan_code").val();
      	var arr = new Array();
      	var list_s = $("#h_code").val();
      	if(list_s)
        {
        	arr = list_s.split(',');
        }
      	
      	if(code && code.length > 16)
        {
          	//检查验证防伪码是否正确
          	$.ajax({
				type:'POST',
				url:'check_code',
				data:'code='+code,
				dataType:'json',
              	success:function(msg){
                	if(msg.status == 1)
					{
                      	alert(msg.message);
                      	$("#scan_code").val('');
                        //console.log(msg.message);//return false;
                      	return false;
					}
              		else
              		{
            			if(contains(arr, code))
                        {
                            alert(code+"已存在");
                            $("#scan_code").val('');
                            return false;
                        }
                        arr.push(code);
                        $("#scan_code").val('');
          				
          				$("#count").html(arr.length);
                        var list = arr.join(',');
                        //添加框中
                        var content = '';
                        var content_arr = group(arr, 10);
                        var len = content_arr.length;

                        for(var i=0;i<len;i++)
                        {
                            content += content_arr[i].join(',')+'\n';
                        }

                        $("#codeTextarea").val(content);
                        console.log(content);
                        $("#h_code").val(list);
          				
            		}
                }
			});
          
          	
        }
      	
    }
  
  	function group(array, subGroupLength) {
        var index = 0;
        var newArray = [];

        while(index < array.length) {
            newArray.push(array.slice(index, index += subGroupLength));
        }

        return newArray;
    }
  
  	function contains(arr, obj) {  
        var i = arr.length;  
        while (i--) {  
            if (arr[i] === obj) {  
                return true;  
            }  
        }  
        return false;  
    }  
  
  	function calc()
  	{
    	var txt = $("#codeTextarea").val();
      	$.ajax({
				type:'POST',
				url:'count_code',
				data:'txt='+txt,
				dataType:'json',
				success:function(msg){
                  	$("#count").html(msg.count);
					if(msg.status == 1)
					{
						alert(msg.message);
                      	//console.log(msg.message);
                        console.log(msg.list);//return false;
                      	
                      	$("#codeTextarea").val(msg.list);
                      	return false;
					}
					else
					{
						
					}
				}
			});
      	
    }
  
  
  	function select_code(code)
  	{
      	if(code=='')
        {
        	alert('选择的防伪码为空');
          	return false;
        }
      	var txt = new Array();
      	var old = $("#code_list").val();
      	//console.log(old);
      	if(old)
        {
          	//olds = old.replace(//g, ',');console.log(olds);
        	txt = old.split(",")
        }
      	txt.push(code);
      	var len = txt.length;
		 	//console.log(len);
		$("#code_num").html(len);
      	//console.log(txt);
      	
      	var html = '';
      	$.each(txt, function(i, n){
          	//var x = i%5;
          	//console.log(i+':'+x);
        	if(i==0)
            {
            	html = n;
            }
          	else
            {
            	html += ","+n;
            }
        });
      
      
      
    	//console.log(html);
      	$("#code_list").val(html);
    }
    
    function check_mobile(mobile)
    {
    	if(mobile)
    	{
    		//ajax校验
    		$.ajax({
				type:'POST',
				url:'check_mobile',
				data:'mobile='+mobile,
				dataType:'json',
				success:function(msg){
					if(msg.status == 0)
					{
						$("#error_flag").val(1);
					}
					else
					{
						$("#error_flag").val(0);
					}
				}
			});
    		//$("#stock_out_btn").attr("disabled", true);
    	}
    	else
    	{
    		$("#error_flag").val(0);
    		//$("#stock_out_btn").attr("disabled", false);
    	}
    }
    
    function select_company(val)
    {
    	if(val==-1)
    	{
    		$("#other_company").css("display", "");
    	}
    	else
    	{
    		$("#other_company").css("display", "none");
    	}
    }
    
    function stockout()
    {
      	var txt = $("#codeTextarea").val();
      	if(txt=='')
        {
        	alert("请输入防伪码");
            return false;
        }
      	else
        {
        	$("#stock_out").submit();
        }
      	/*
    	var comnpany_name = $("#company").val();
    	if(comnpany_name == '')
    	{
    		alert('请选择客户单位');
    		return false;
    	}
    	else if(comnpany_name == -1)
    	{
    		var other_company = $("#other_company").val();
    		if(other_company == '')
    		{
    			alert('请填写客户单位');
    			return false;
    		}
    	}
    	
    	var flag = $("#error_flag").val();
      	var mobile = $("#mobile").val();
    	if(flag == 1 && mobile)
    	{
    		alert('会员手机号不存在');
    		return false;
    	}
    	
    	var code = $("#code_list").val();
    	if(code == '')
    	{
    		alert('请填写要出库的防伪码');
    		return false;
    	}
        */
    	
    	
    }
  
  
  	var lineObjOffsetTop = 2;
    function createTextAreaWithLines(id)
    {
      var el = document.createElement('DIV');
      var ta = document.getElementById(id);
      ta.parentNode.insertBefore(el,ta);
      el.appendChild(ta);
      el.className='textAreaWithLines';
      el.style.width = (ta.offsetWidth + 30) + 'px';
      ta.style.position = 'absolute';
      ta.style.left = '30px';
      el.style.height = (ta.offsetHeight + 4) + 'px';
      el.style.overflow='hidden';
      el.style.position = 'relative';
      el.style.width = (ta.offsetWidth + 30) + 'px';
      var lineObj = document.createElement('DIV');
      lineObj.style.position = 'absolute';
      lineObj.style.top = lineObjOffsetTop + 'px';
      lineObj.style.left = '0px';
      lineObj.style.width = '27px';
      el.insertBefore(lineObj,ta);
      lineObj.style.textAlign = 'right';
      lineObj.className='lineObj';
      var string = '';
      for(var no=1;no<100;no++){
       if(string.length>0)string = string + '<br>';
       string = string + no;
      }
       ta.onkeydown = function() { positionLineObj(lineObj,ta); };
       ta.onmousedown = function() { positionLineObj(lineObj,ta); };
       ta.onscroll = function() { positionLineObj(lineObj,ta); };
       ta.onblur = function() { positionLineObj(lineObj,ta); };
       ta.onfocus = function() { positionLineObj(lineObj,ta); };
       ta.onmouseover = function() { positionLineObj(lineObj,ta); };
       lineObj.innerHTML = string;
      }
    function positionLineObj(obj,ta)
    {
       obj.style.top = (ta.scrollTop * -1 + lineObjOffsetTop) + 'px';  
    }
  
  	createTextAreaWithLines('codeTextarea');
</script>