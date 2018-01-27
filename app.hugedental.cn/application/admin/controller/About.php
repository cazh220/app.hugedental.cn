<?php
namespace app\admin\controller;
use think\Controller;
use think\View;
use think\Db;
use think\Session;
use think\Log;


class About extends Controller
{
	//添加内容
	public function update_content()
	{
		$id 		= !empty($_POST['tid']) ? intval($_POST['tid']) : '';
		$content 	= !empty($_POST['content']) ? trim($_POST['content']) : '';
		$About = model('About');
		if(empty($id))
		{
			//更新
			$res = $About->insert_about($content, $id);
		}
		else
		{
			//插入
			$res = $About->update_about_content($content, $id);
			
		}
		
		if($res)
		{
			echo "<script>alert('成功！');window.location.href='get_content?id=".$id."';</script>";
		}
		else
		{
			echo "<script>alert('失败！');history.go(-1);</script>";
		}
		
		
	}
	
	//防伪码验证版本说明
	public function get_content()
	{
		$id	= !empty($_GET['id']) ? intval($_GET['id']) : 1;
		
		//获取内容
		$About = model('About');
		
		if($id == 1)
		{
			$title = '防伪验证卡版本说明';
		}
		else if($id == 2)
		{
			$title = '常见问题说明';
		}
		else
		{
			$title = '会员注册协议书';
		}
		
		//获取内容
		$list = $About->getAbout($id);
		$content = !empty($list[0]['content']) ? trim($list[0]['content']) : '';

		$view = new View();
		$view->assign('content', $content);
		$view->assign('title', $title);
		$view->assign('id', $id);
		return $view->fetch('fangweima');
	}
	
		
	
}