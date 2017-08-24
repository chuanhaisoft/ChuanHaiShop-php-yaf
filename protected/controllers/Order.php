<?php
use Pub\SysFram;
use Pub\Fram;

class OrderController extends \Base\ControllerUser
{
	public function ListAction()
	{
	    $UID=SysFram::GetLoginID();
		$m=new \Model\OrderMallDetail();
		
		
		$PageNum = Fram::GetNumValue('page',1);
        $PageSize=20;
        $total=0;
        $start=($PageNum-1)*$PageSize;
        $_where=[$m->_UserId->w('=',$UID)];
        $_where2=[$m->_UserId->w('=',$UID)];
        
        $status = Fram::GetNumValue("status",'0');
        if($status==1)
        {
            $_where[] = $m->_State2->w_and('=',-1);//" AND (b.STATE='0' or b.STATE='0.1')";
        }
        if($status==2)
        {
            $_where[] = $m->_State2->w_and('=',0);
        }
        if($status==3)
        {
            $_where[] = $m->_State2->w_and('=',3);//" AND a.STATE2='3' AND a.IS_PING_JIA='0'";
        }
        $num=Fram::GetNumValue('num','0');
        if($num>0)
            $_where[]=$m->_OrderId->w_and('=',$num);
        $mall_id=Fram::GetNumValue('mall_id','0');
        if($mall_id>0)
            $_where=$m->_Id->w_and('=',$mall_id);
        $name=Fram::GetValue('name');
        if($name)
            $_where[]=$m->_ProName->w_and('like',"%{$name}%");
        $st=Fram::GetValue('st');
        $ed=Fram::GetValue('ed');
        $zt=Fram::GetNumValue('zt');
        $ft=Fram::GetNumValue('ft');
        if($zt && $zt>0)
        {
        	if($zt==1)
        		$_where[]=$m->_State2->w_and('=',-1);
        	if($zt==2)
        		$_where[]=$m->_State2->w_and('>',-1);
        	 
        }
        
        
        if($st && $ed)
        {
            $_where[]=$m->_AddTime->w_and('>=',"{$st} 0:0:0");
            $_where[]=$m->_AddTime->w_and('<=',"{$ed} 23:59:59");
        }
         
        $data['status'] = $status;
        
        $data['xiangqing_action'] = 'shouhuo';
        $data['RoleID']=SysFram::getLoginRoleID();

        $rs=Bll\OrderMallDetail::GetList($PageNum,$PageSize,$_where,$total);
        for($i=0;$i<count($rs);$i++)
        {
            $detail=Bll\OrderMall::Model($rs[$i][$m->_OrderId->k]);
            $rs[$i]['STATE']=$detail->State();
            $rs[$i]['PAY_TIME']=$detail->PayTime();
            
            if(in_array($rs[$i]['STATE2'],array(1,2.5,2.6,2.7,2.8,2.9,4))||($rs[$i]['STATE2']==0&&$rs[$i]['STATE']==1&&floor((time()-strtotime($rs[$i]['PAY_TIME']))/86400)>=0)||($rs[$i]['STATE2']==2&&floor((time()-strtotime($rs[$i]['SHOU_HUO_TIME']))/86400)<=7)){
                $rs[$i]['show_tui_btn'] = 1;
            }else{
                $rs[$i]['show_tui_btn'] = 0;
            }
        }

        //统计
        
        //全部订单
        $data['all_count'] = 0;
        $count_where = $_where2;
       
        Bll\OrderMallDetail::GetList(1,1,$count_where,$data['all_count'],"",'');
      
        $data['daifu_count'] = 0;
        //$count_where = $_where." AND (b.STATE='0' or b.STATE='0.1') ";
        //Bll_OrderMallDetail::GetListLeftOrderMall(1,1,$count_where,$data['daifu_count'],"",'');
        
        
        $data['daifa_count'] = 0;
        //$count_where = $_where2." AND STATE2='0' ";
        //Bll_OrderMallDetail::GetList(1,1,$count_where,$data['daifa_count'],"",'');
        
        
        $data['daiping_count'] = 0;
        //$count_where = $_where2." AND STATE2='3' AND IS_PING_JIA='0'";
        //Bll_OrderMallDetail::GetList(1,1,$count_where,$data['daiping_count'],"",'');
        
        
        
        
        
        Bll\User::SetRowsUserName($rs,'SHOP_ID');
	    
        $data['rs'] = $rs;
        $data['total'] = $total;
        $data['page'] = $PageNum;
        $data['pagesize'] = $PageSize;
        $data['allpage'] = ceil($total/$PageSize);
        $data['top_menu_index'] = 3;
        
	    $this->display_layout('list',$data);
	}
	
	
	
	
	
	
	
	
	
}