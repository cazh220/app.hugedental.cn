<?php
namespace app\admin\model;

use think\Model;
use think\Db;

class Stock extends Model
{
	public function stock_list($param=array())
	{
		$res = array();
		$obj = Db::name('hg_stock');
		if (!empty($param['keyword']))
		{
			$obj = $obj->where('company_name|product|mobile','like','%'.$param['keyword'].'%');
		}
		if (!empty($param['start_time']) && !empty($param['end_time']))
		{
			$obj = $obj->where('stock_time',['>=',$param['start_time']],['<=',$param['end_time']],'and');
		}
		$res = $obj->where('is_delete', 0)->order('stock_id desc')->paginate(10);
		return $res;
	}
	
	//生成出库单号
	public function create_stock_no()
	{
		$no = '20'.date("YmdHis", time()).rand(1000,9999);
		return $no;
	}
	
    //插入出库
    public function insert_stock($data=array(), $code=array())
    {
    	if($data && $code && !empty($data['stock_no']))
    	{
			Db::startTrans();
			
			foreach($code as $key => $val)
			{
				try{
					$sql = "UPDATE hg_security_code SET stock_no = '".$data['stock_no']."', status = 1 WHERE security_code = '".$val."'";
					Db::execute($sql);
				} catch (\Exception $e) {
					// 回滚事务
					Db::rollback();
					return false;
				}
			}
			
			try{
				$res = Db::table('hg_stock')->insert($data);
			} catch (\Exception $e) {
				// 回滚事务
				Db::rollback();
				return false;
			}

			// 提交事务
			Db::commit();
			return true;
    	}
    	
    	return false;
    }
    
    //获取出库详情
    public function stock_out_detail($stock_id=0)
    {
    	$res = Db::table('hg_stock')->where('stock_id',$stock_id)->find();
    	return $res;
    }
    
    //更新出库单状态
    public  function update_stock_out($stock_id=0)
    {
    	$sql = "UPDATE hg_stock SET status = 1, stock_time = NOW() WHERE stock_id = ".$stock_id;
    	try{
    		Db::execute($sql);
    	}catch(exception $e){
    		return false;
    	}
    	return true;
    	
    }
  
  	//删除出库
  	public function delete_stock($stock_id='')
    {
        //获取防伪码
        $sql = "SELECT * FROM hg_stock WHERE stock_id = ".$stock_id;
        $res = Db::query($sql);
        $code_arr = array();
        if(!empty($res[0]['code_list']))
        {
            $code_arr = explode(',', $res[0]['code_list']);
        }

        if(!empty($code_arr))
        {
            //事务
            Db::startTrans();

            foreach ($code_arr as $key => $value) {
                $sql = "UPDATE hg_security_code SET stock_no = '', status = 0 WHERE security_code = '".$value."'";
                //echo $sql;die;
                try{
                    Db::execute($sql);
                } catch (\Exception $e) {
                    // 回滚事务
                    Db::rollback();
                    return false;
                }
            }

            $sql = "DELETE FROM hg_stock WHERE stock_id = ".$stock_id;
            try{
                Db::execute($sql);
            }catch(\Exception $e){
                // 回滚事务
                Db::rollback();
                return false;
            }

            // 提交事务
            Db::commit();

            return true;   
        }
        else
        {
            return false;
        }

    }
    
    //出库数量统计
    public function stock_out_num($mobile)
    {
    	if($mobile)
    	{
    		$res = Db::query("select SUM(stock_num) as 'cnt' from hg_stock where mobile = '".$mobile."'");
    		
    	}
    	
    	return !empty($res[0]['cnt']) ? $res[0]['cnt'] : 0;
    }
    
    //根据码查出库单号
    public function view_stock_no($code='')
    {
    	if(empty($code))
    	{
    		return '';
    	}
    	$res = Db::table('hg_security_code')->where('security_code',$code)->find();
    	
    	return !empty($res['stock_no']) ? $res['stock_no'] : '';
    }
	
	//获取出库数量
	public function stock_tongji()
	{
		$sql = "SELECT COUNT(*) as 'total' FROM hg_security_code";
		$res = Db::query($sql);
		
		$total = !empty($res[0]['total']) ? intval($res[0]['total']) : 0; 
		
		$sql = "SELECT COUNT(*) as 'out_num' FROM hg_security_code WHERE status IN (1,2)";
		$res = Db::query($sql);
		$out_num = !empty($res[0]['out_num']) ? intval($res[0]['out_num']) : 0;
		
		return array('total'=>$total, 'out_num'=>$out_num);
	}
}