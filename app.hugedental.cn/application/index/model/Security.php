<?php
namespace app\index\model;

use think\Model;
use think\Db;

class Security extends Model
{
	public function serach_security_code($param)
	{
		$res = Db::query("SELECT * FROM hg_security_code a LEFT JOIN hg_patient b ON a.security_code = b.security_code WHERE a.security_code = :security_code", ['security_code'=>$param['security_code']]);
		
		return !empty($res) ? $res : array();
	}
  
  	//获取修复体类别
  	public function get_fix_type($code)
    {
    	$res = Db::query("SELECT production_title FROM hg_security_code  WHERE security_code = :security_code", ['security_code'=>$code]);
		
		return !empty($res[0]['production_title']) ? $res[0]['production_title'] : 0;
    }
  
  	//插入积分记录
	public function insert_credit_flow($data)
	{
		if(empty($data))
		{
			return false;
		}
		
		$sql = "INSERT INTO hg_credits_flow SET ";
		
		foreach($data as $key => $val)
		{
			$sql .= $key."='".$val."',";
		}
		
		$sql .= " create_time = NOW()";

		try{
			$res = Db::execute($sql);
		}catch(exception $e){
			echo $e->getMessage();
			return false;
		}
		
		return true;
	}

	
}

	