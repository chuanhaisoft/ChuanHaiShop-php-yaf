<?php
use \Pub\Fram;
use \Pub\SysFram;
use \Pub\Ext;

class ProController extends \Base\ControllerAdmin
{
    public function ListAction()
	{
		SysFram::CheckPagePower(302);
		$UID=SysFram::GetLoginID();
		
		$m=new \Model\Pro();
		$act=Fram::GetValue("act");
		if(isset($act))
		{
			switch ($act)
			{
				case "List":
					$PageNum=0;$start=0;$PageSize=0;$total=0;
	                \Pub\Ext::InitPageSize($PageNum, $start, $PageSize);
	                $State=Fram::GetNumValue('state',null);
	                $ProName=Fram::GetValue('name','');
	                $ShopName=Fram::GetValue('sname','');
	                $RoleID=Fram::GetNumValue('role_id',-1);
					$Name=Fram::GetValue('name','');
					
					$w=(\Pub\SysFram::getLoginRoleID()==1)?null:[$m->_UserId->w('=',$UID),$m->_State->w_and('!=',-100)];
					$Sort=Fram::GetValue('mall_sort_select_ids','');
					$Sort=explode(',', $Sort);
					if(count($Sort)>1 && is_numeric($Sort[0]) )
					{
					    $w[]=$m->_SortParentId->w_and('=',$Sort[0]);
					}
					if(count($Sort)>1  && is_numeric($Sort[1]))
					{
					    $w[]=$m->_SortId->w_and('=',$Sort[1]);
					}
					if(count($Sort)>1  && is_numeric($Sort[2]))
					{
					    $w[]=$m->_SortId3->w_and('=',$Sort[2]);
					}
					
					if(is_numeric($State))
					{
					    $w[]=$m->_State->w_and('=',$State);
					}
					if(Fram::GetValue('state','')=='0,1')
					{
						$w[]=$m->_State->w_and('=',0);
					}
					if(Fram::GetValue('state','')=='0.1,1')
					{
					    $w[]=$m->_State->KuoHao_Left('and');
					    $w[]=$m->_State->w('=',0.1);
					    $w[]=$m->_State->w_or('=',1);
					    $w[]=$m->_State->KuoHao_Right();
					}
					if(Fram::CheckNum($RoleID))
					{
					    $w[]=$m->_RoleId->w_and('=',$RoleID);
					}
					
					if($ProName && strlen($ProName)>0)
					{
					    $w[]=$m->_Name->w_and('like',"%{$ProName}%");
					}
					if($ShopName && strlen($ShopName)>0)
					{
						////$w="{$w} and SHOP_NAME like '%{$ShopName}%'";
					}
					
					$rs=\Bll\Pro::GetList($PageNum,$PageSize,$w,$total,"*");
					
					//获取分类
					$SORT_IDS = array();
					 
					
					foreach ($rs as $v)
					{
					    if($v['SORT_PARENT_ID']&&!in_array($v['SORT_PARENT_ID'], $SORT_IDS))
					    {
					        $SORT_IDS[] = $v['SORT_PARENT_ID'];
					    }
					    if($v['SORT_ID']&&!in_array($v['SORT_ID'], $SORT_IDS))
					    {
					        $SORT_IDS[] = $v['SORT_ID'];
					    }
					    if($v['SORT_ID3']&&!in_array($v['SORT_ID3'], $SORT_IDS))
					    {
					        $SORT_IDS[] = $v['SORT_ID3'];
					    }
					}
					 
					 
					$total_temp = 0;
					$SORTS = array();
					if($SORT_IDS){
					    $SORTS = Bll\MallSort::GetList(1, 2000,'ID in('.implode(',',$SORT_IDS).')',$total_temp,"ID,NAME",'');
					}
					 
					$SORTS_T = array();
					$SORTS_T[0] = '';
					 
					foreach ($SORTS as $v)
					{
					    $SORTS_T[$v['ID']] = $v['NAME'];
					}
					
					foreach ($rs as $key => $v)
					{
					    $rs[$key]['SORT_NAME'] = '';
					    if(!empty($SORTS_T[$v['SORT_PARENT_ID']])){
					        $rs[$key]['SORT_NAME'] .= $SORTS_T[$v['SORT_PARENT_ID']];
					    }
					    if(!empty($SORTS_T[$v['SORT_ID']])){
					        $rs[$key]['SORT_NAME'] .= ' > '.$SORTS_T[$v['SORT_ID']];
					    }
					    if(!empty($SORTS_T[$v['SORT_ID3']])){
					        $rs[$key]['SORT_NAME'] .= ' > '.$SORTS_T[$v['SORT_ID3']];
					    }
					}
					
					
					\Bll\User::SetRowsUserName($rs,'USER_ID');
					echo Ext::GetJsonStr($rs,$total);
					exit();
				    break;

				case "Del":
					$ids=Fram::GetValue("IDS","");
					if($ids != "")
					{
    			        $ids=explode(',', $ids);
    			        for($i=0;$i<count($ids);$i++)
    			        {
    			            if(Fram::CheckNum($ids[$i]))
    			            {
    			                $m2=Bll\Pro::Model($ids[$i]);
    			                $m=new Model\Pro();
    			                $m->Id($ids[$i]);
    			                $m->State(-100);
    		                     
    		                    if($m2->State()==1)
    		                    {
    		                        die("请先下架商品后在进行删除!");
    		                    }
    			                $m->Update();
    			            }
    			            else
    			            {
    			                die("没有权限删除!");
    			            }
    			        }
					}
					exit();
					break;
				case "ShangXiaJia"://商城管理员
				    $ids=Fram::GetValue("IDS","");
				    if($ids != "")
				    {
				        $ids=explode(',', $ids);
				        for($i=0;$i<count($ids);$i++)
				        {
				            if(Fram::CheckNum($ids[$i]))
				            {
				                $m=new Model\Pro();
				                $m->Id($ids[$i]);
				                $dostate=Fram::GetNumValue('dostate',-1);
				                //上架
				                if($dostate==1)
				                {
				                    $m->State(1);
				                    $m->Update([$m->_State->w('=',0.1)]);
				                }
				                //下架
				                if($dostate==2)
				                {
				                    $m->State(0.1);
				                    $m->Update([$m->_State->w('=',1)]);
				                }
				                
				            }
				        }
				    }
				    echo "操作完成";
				    exit();
				    break;
/**
			    case "ShangJiaShangXiaJia"://商城管理员
				        $ids=Fram::GetValue("IDS","");
				        if($ids != "" && Bll\Role::Role_Id_Shop(SysFram::getLoginRoleID()))
				        {
				            $ids=explode(',', $ids);
				            for($i=0;$i<count($ids);$i++)
				            {
				                if(Fram::CheckNum($ids[$i]))
				                {
				                    $m=new Model_Pro();
				                    $m->Id($ids[$i]);
				                    $dostate=Fram::GetNumValue('dostate',-1);
				                    //上架
				                    if($dostate==1)
				                    {
				                        $m->State(1);
				                        if(Bll_Pro::Update($m,null,'STATE=0.1 and USER_ID='.SysFram::GetLoginID().'  AND ID='.$ids[$i]))
				                            echo "操作成功,";
				                        else 
				                            echo "操作失败,";
				                    }
				                    //下架
				                    if($dostate==2)
				                    {
				                        $m->State(0.1);
				                        if(Bll_Pro::Update($m,null,'STATE=1 and USER_ID='.SysFram::GetLoginID().'  AND ID='.$ids[$i]))
				                            echo "操作成功,";
				                        else
				                            echo "操作失败,";  
				                    }
				    
				                }
				            }
				        }
				        //echo "操作完成";
				        exit();
				        break;
    
				 case "ShopShenHe"://商城审核
				        $ids=Fram::GetValue("IDS","");
				        
				        if($ids != "" && SysFram::getLoginRoleID()==104)
				        {
				            $ids=explode(',', $ids);
				            for($i=0;$i<count($ids);$i++)
				            {
				                if(Fram::CheckNum($ids[$i]))
				                {
				                    $m=new Model_Pro();
				                    $m->Id($ids[$i]);
				                    $m->State(1);
				                    Bll_Pro::Update($m,null,'STATE=0  AND ID='.$ids[$i]);
				                }
				            }
				        }
				        echo "操作完成";
				        exit();
				        break;
			    case "ShopShenHeFalse"://商城审核驳回
				        $ids=Fram::GetValue("IDS","");
				        $BEI_ZHU = Fram::GetValue("BEI_ZHU","");
				        if($ids != "" && SysFram::getLoginRoleID()==104)
				        {
				            $ids=explode(',', $ids);
				            for($i=0;$i<count($ids);$i++)
				            {
				                if(Fram::CheckNum($ids[$i]))
				                {
				                    $m=new Model_Pro();
				                    $m->Id($ids[$i]);
				                    $m->State(-3);
				                    $m->BeiZhu($BEI_ZHU);
				                    Bll_Pro::Update($m,null,'(STATE=0 or STATE=0.1)  AND ID='.$ids[$i]);
				                }
				            }
				        }
				        echo "操作完成";
				        exit();
				        break;
**/
			   case "TiJiaoShenHe"://产品提交审核
			       $id =Fram::GetNumValue("PorId","");
			       if($id)
			       {
	                   $m=new Model\Pro();
	                   $m->Id($id);
	                   $m->State(-5);
	                   $m->BeiZhu('');
	                   $m->Update([$m->_State->w('=',-6)]);			           
			       }
			       echo "操作完成";
				   exit();
				   break;

			}
		}
		
		
		$C = "ID,NAME,USER_ID,USER_ID_NAME,STATE,ADD_TIME,SORT_NAME,ROLE_ID";
		$F = "产品名称,,NAME,,-1,,WebDetailView,,left;所属分类,,SORT_NAME;所属用户,,USER_ID_NAME;添加时间,,ADD_TIME;状态,,STATE,,-1,,ZhuangTai";//,,ZhuangTai
		$T = "操作::编 辑@@page@@EditAddress@@'ID='@@0.9@@0.95";
		
		if(true)
		{
		    //$T .=";;快捷修改@@page@@'/mall/pro/quick_edit.html'@@'ID='@@820@@600";
		}
		
		$Bar = "添加产品,,/css/js/ext/images/pen.gif,,GridAdd(AddAddress),,#FF0000;产品上架,,/css/js/ext/images/pen.gif,,ActShangJia(),,#FF0000;产品下架,,/css/js/ext/images/pen.gif,,ActXiaJia(),,#FF0000".(SysFram::getLoginRoleID()==1||Bll\Role::Role_Id_Shop(SysFram::getLoginRoleID())?';删除产品,,/css/js/ext/images/delete.gif,,ActDel2()':'');
		
		
		$GridHtml = Ext::GridStr(-1,Fram::CurrentUrl(), Fram::CurrentPath()."/edit.html", Fram::CurrentPath()."/add.html", "ID", "名",$C,$F ,$T,$Bar,1,'SearchDiv');
		
		
		$this->display_layout('pro-list',array('GridHtml'=>$GridHtml));
		
	}

	public function AddAction()
	{
	    SysFram::CheckPagePower(302);Fram::SetNoCache();
	    
	    $UID=SysFram::GetLoginID();
	    $RoleID=SysFram::getLoginRoleID();
	    
	    $USER_ID = 0;
	
        if(Bll\Role::Role_Id_Shop($RoleID))
            $USER_ID = $UID;
        
       $check=Bll\User::Row($UID);
      
       
	    if(\Pub\Fram::IsPost())
	    {
	        $F='Pro';
	        $m=new \Model\Pro();$m2=new \Model\Pro();$m->getPost();
	        Fram::SetChanged($m->_Name);
	        if($m->Name()=='')
	            die("parent.window.ExtAlert('请输入产品名称。');");
	        Fram::SetChanged($m->_Name2);
	        Fram::SetChanged($m->_ProLevelNum);
	        //Fram::SetChanged($m->_PriceShop);
	        Fram::SetChanged($m->_ShiChangPrice);
	        //Fram::SetChanged($m->_HuiDianShop);
	        //Fram::SetChanged($m->_PointFree);
	        Fram::SetChanged($m->_Pic);

	        $Sort=Fram::GetValue('mall_sort_select_ids','');
	        $Sort=explode(',', $Sort);
	        if(count($Sort)>=2 && is_numeric($Sort[0]) && is_numeric($Sort[1]))
	        {
	            $m->SortId($Sort[1]);
	            $m->SortParentId($Sort[0]);
	            if(!empty($Sort[2]))
	            {
	                $m->SortId3($Sort[2]);
	            }
	        }
	        else 
	            die("parent.window.ExtAlert('类别错误，请重新选择。');");
	        
	        $m->WuLiuId(Fram::GetNumValue('yun_fei_select_ids',0));
	        if(!Fram::CheckNum($m->WuLiuId()))
	            die("parent.window.ExtAlert('运费出错，请重新选择。');");
	        
	        $m->UserId(SysFram::GetLoginID());
	        $m->AddTime(Fram::Date());
	        $m->State(\Pub\SysFram::getLoginRoleID()==1?0.1:-6);
	        
	        $Conn=\Pub\Fram::GetConn(true);
	        
	        $r = $m->Insert($Conn);
	        $ProID=$r;
	        
	        $r = $r && \Bll\Pro::UpdateShengShiQuXian($ProID,$m->WuLiuId(),$Conn);
	        
	        $Mess='';
	        if(is_numeric($ProID) && $ProID>0)
	        {
	            //更新产品介绍
	            $m_mess=new Model\ProMess();
	            $m_mess->Id($ProID);
	            $m_mess->Mess(str_replace("'", "&#39;", $_POST['content']));
	            $m_mess->Pic1(Fram::GetValue('PIC1'));
	            $m_mess->Pic2(Fram::GetValue('PIC2'));
	            $m_mess->Pic3(Fram::GetValue('PIC3'));
	            $m_mess->Pic4(Fram::GetValue('PIC4'));
	            $m_mess->Pic5(Fram::GetValue('PIC5'));
	            $r = $r && $m_mess->Insert($Conn);
	            //产品型号
	            $r= $r && \Bll\ProType::InsertUpdateType($ProID, $Mess,$Conn,SysFram::getLoginRoleID(),SysFram::GetLoginID());
	                
	            
	        }
	        
	        
	        if($r && $Conn->commit())
	        {
	            echo ("parent.window.ExtAlert('操作成功。');".Pub\Js::FormResert());
	            echo Pub\Js::ParentDoView(true);
	        }
	        else
	        {
	            $Conn->rollback();
	            if(strlen($Mess)==0)
	                $Mess='操作失败，请重试。';
	            echo("parent.window.ExtAlert('{$Mess}');");
	        }
	        Fram::CloseConn($Conn);
	        exit();
	    }
	    
	    $model=new \Model\Pro();
	    $model->ProLevelNum(2);
	    //$model->NAME='产品名字';$model->PRICE_SHOP=100;$model->SHI_CHANG_PRICE=200;
	    $para['RATE']=\Bll\User::GetShopRate(SysFram::GetLoginID());
	    $para['SHOP_ROLE']=SysFram::getLoginRoleID();
	    $para['HUI_DIAN_SHOP']=0;
	    $para['POINT_FREE']=0;
	    
	    $pro_mess=new \Model\ProMess();

	    $this->display_layout('add',['m'=>$model,'pro_mess'=>$pro_mess,'USER_ID'=>$USER_ID,'check'=>$check['CHECK_USER'],'para'=>$para]);
	}
	
	public function Shop_check()
	{
	    
	    
	}
	
	public function EditAction()
	{
	    SysFram::CheckPagePower(302);
	    
	    $UID=SysFram::GetLoginID();
	    $Pid=Fram::GetNumValue('ID',-1);
	    $_total = 0;
	    ////$no_pay_order = Bll\OrderMallDetail::GetListLeftOrderMall(1, 1,"(b.STATE='0.1' or b.STATE='0') and   a.PRO_ID='".$Pid."'",&$_total,'a.*,b.STATE','ID asc');
	     
	    
	    $RoleID=SysFram::getLoginRoleID();
	     
	    $USER_ID = 0;
	    
	    if(!is_numeric($Pid) || $Pid<=0)
	        die("无此产品");
	    ////if(!Bll\Pro::IsProEditPower($Pid,$UID))
	    ////    die("parent.window.ExtAlert('无权操作。');");
	    
	    if(\Pub\Fram::IsPost())
	    {
	        $F='Pro';
	        $m2=new Model\Pro();$m2=Bll\Pro::Model($Pid);
	        $m=new Model\Pro();$m->getPost();
	        $m->Id($Pid);
	        
	        
	        $RoleID=SysFram::getLoginRoleID();
	        if(Bll\Role::Role_Id_Shop($RoleID))
	        {
	            $now_state = $m2->State();
	        
	            if($now_state==0)
	            {
	                die("parent.window.ExtAlert('商品审核中,不能修改!');");
	            }
	            if($now_state==1)
	            {
	                die("parent.window.ExtAlert('请先下架商品后在进行编辑!');");
	            }
	        
	            //if($no_pay_order)
	            //{
	            //    die("parent.window.ExtAlert('有可以支付的订单 ,不可以进行数据编辑!');");
	            //}
	             
	            $m->State(-6);
	        }
	        
	        Fram::SetChanged($m->_Name);
	        if($m->Name()=='')
	            die("parent.window.ExtAlert('请输入产品名称。');");
	        Fram::SetChanged($m->_Name2);
	        Fram::SetChanged($m->_ProLevelNum);
	        Fram::SetChanged($m->_Pic);
	        Fram::SetChanged($m->_ShiChangPrice);
	        if(!Fram::CheckNum($m->ShiChangPrice()))
	            die("parent.window.ExtAlert('市场价出错，请重新选择。');");
	        
	        Fram::SetChanged($m->_GongYingShangId);
	        Fram::SetChanged($m->_CangKuId);
	       
	        
	        
	        $Sort=Fram::GetValue('mall_sort_select_ids','');
	        $Sort=explode(',', $Sort);
	        if(count($Sort)>=2 && is_numeric($Sort[0]) && is_numeric($Sort[1]))
	        {
	            $m->SortId($Sort[1]);
	            $m->SortParentId($Sort[0]);
	            if(!empty($Sort[2]))
	            {
	                $m->SortId3($Sort[2]);
	            }
	        }
	        else 
	            die("parent.window.ExtAlert('类别错误，请重新选择。');");
	        
	        
	        $m->WuLiuId(Fram::GetNumValue('yun_fei_select_ids',0));
	        if(!Fram::CheckNum($m->WuLiuId()))
	            die("parent.window.ExtAlert('运费出错，请重新选择。');");
	        
	        //$m->UserId(SysFram::GetLoginID());
	        //$m->AddTime(Fram::Date());
	        
	        
	        $Conn=\Pub\Fram::GetConn(true);
	        $r = true;
	        $r = Bll\Pro::Update($m,null,$Conn);
	        $r = $r && Bll\Pro::UpdateShengShiQuXian($Pid,$m->WuLiuId(),$Conn);
	        //var_dump($r);
	        $Mess='';
	        if(1==1)
	        {
	            //更新产品介绍
	            $m_mess=new Model\ProMess();
	            $m_mess->Id($Pid);
	            $m_mess->Mess(str_replace("'", "&#39;", $_POST['content']));
	            $m_mess->Pic1(Fram::GetValue('PIC1'));
	            $m_mess->Pic2(Fram::GetValue('PIC2'));
	            $m_mess->Pic3(Fram::GetValue('PIC3'));
	            $m_mess->Pic4(Fram::GetValue('PIC4'));
	            $m_mess->Pic5(Fram::GetValue('PIC5'));
	            $r = $r && Bll\ProMess::Update($m_mess,null,$Conn);
	            
	            //产品型号
	            $r= $r && Bll\ProType::InsertUpdateType($Pid, $Mess,$Conn,Bll\User::GetRoleByID($m2->UserId()),$m2->UserId());
	        }
	        
	        if($r && $Conn->commit())
	        {
	            echo ("parent.window.ExtAlert('操作成功。');");
	            echo \Pub\Js::ParentDoView(true);
	        }
	        else
	        {
	            $Conn->rollback();
	            if(strlen($Mess)==0)
	                $Mess='操作失败，请重试。';
	            echo("parent.window.ExtAlert('{$Mess}');");
	        }
	        Fram::CloseConn($Conn);
	        exit();
	    }
	    $m=new Model\Pro();$m=Bll\Pro::Model($Pid);
	    
	    $para['RATE']=Bll\User::GetShopRate($m->UserId());
	    $para['SHOP_ROLE']=Bll\User::GetRoleByID($m->UserId());
	    $para['HUI_DIAN_SHOP']=$m->HuiDianShop();
	    $para['POINT_FREE']=$m->PointFree();
	    
	    $USER_ID = $m->UserId();
	   
	    ///////////??????????????
	    $u=new Model\User();
	    $u=Bll\User::Model($m->UserId());

	    //print_r($model);
	    $m_mess=Bll\ProMess::Model($Pid);
	    
	    
	    $Types = array();
	    $m_protype=new \Model\ProType();
	    $Types=Bll\ProType::GetList(1, 500,[$m_protype->_ProId->w('=',$Pid)]);
	    $TypePids = array();
	    $UsedTypeIds = array();
	    
	    $show_btn = 1;
	    
	    $RoleID=SysFram::getLoginRoleID();
	    $show_msg = '';
	    if(Bll\Role::Role_Id_Shop($RoleID))
	    {
	        $now_state = $m->State();
	        
	        if($now_state==0)
	        {
	            $show_msg = '产品审核中,不能修改';
	            $show_btn=0;
	        }
	        if($now_state==1)
	        {
	            $show_msg = '上架产品,不能修改';
	            $show_btn=0;
	        }
	         
	        if($no_pay_order)
	        {
	            $show_msg = '有可以支付的订单 ,不可以进行数据编辑';
	            $show_btn=0;
	        }
	    
	    }
	    
	   
	    if($Types){
    	    foreach ($Types as $key => $v){
    	        $type_json = $v['GUI_GE_JSON'];
    	        $type_array = json_decode($v['GUI_GE_JSON']);
    	        
    	        if($type_array){
    	            foreach ($type_array as $key2 => $v2){
    	                $Types[$key]['GUI_GE_JSON_ARRAY'][] = array(
    	                    'pid' => $key2,
    	                    'tid' => $v2,
    	                );
    	                
    	                if(!in_array($key2, $UsedTypeIds)){
    	                    $UsedTypeIds[] = $key2;
    	                }
    	            }
    	        } 	        
    	        
    	    }
	    }
	    
	   
	    
	    if($type_array){
	        foreach ($type_array as $key => $v2){
	            $TypePids[] = $key;
	        }
	        
	    }
	    
	    $UsedTypeIds = implode('_', $UsedTypeIds);
	   
	    
	    $this->display_layout('edit',array('UsedTypeIds'=>$UsedTypeIds,'m'=>$m,'m_mess'=>$m_mess,'para'=>$para,'Types'=>$Types,'TypePids'=>$TypePids,'pro_bei_zhu'=>$m->BeiZhu(),'show_btn'=>$show_btn,'show_msg'=>$show_msg,'USER_ID'=>$USER_ID));
	}
/**
	//快捷修改 不需要进行审核
	public function actionQuick_edit()
	{
	    SysFram::CheckPagePower(302);
	    
	    $UID=SysFram::GetLoginID();
	    $Pid=Fram::GetNumValue('ID',-1);
	    $_total = 0;
	    
	    $RoleID=SysFram::getLoginRoleID();
	     
	    $USER_ID = 0;
	    
	    if(!is_numeric($Pid) || $Pid<=0)
	        die("无此产品");
	    if(!Bll_Pro::IsProEditPower($Pid,$UID))
	        die("parent.window.ExtAlert('无权操作。');");
	    
	    if(Yii::app()->request->isPostRequest)
	    {
	        $F='Pro';
	        $m2=new Model_Pro();$m2=Bll_Pro::GetModel($Pid);
	        $m=new Model_Pro();$m->GetForm($_POST['Pro']);
	        $m->Id($Pid);
	        
	        $RoleID=SysFram::getLoginRoleID();
	        
	        $Conn=Date::GetConnection();
	        $Tran=$Conn->beginTransaction();
	        $r = true;
	        $Mess='';
	        
	        $ProNums=Fram::GetValue('xing_hao_nums','');
	        $Count = 0;
	        if($ProNums && strlen($ProNums)>0)
	        {
	            $ProNums=explode(',', $ProNums);
	            for($i=0;$i<count($ProNums);$i++)
	            {
    	            $j=$ProNums[$i];
    	            if(is_numeric($j))
    	            {
    	               $_m_type=new Model_ProType();
    	               $DbID=Fram::GetNumValue("{$j}_xing_hao_db_key",0);
    	               $_m_type->KuCun(Fram::GetNumValue("{$j}_ku_cun",0));
    	               if(!Fram::CheckNum($_m_type->KuCun()))
    	                    die("parent.window.ExtAlert('第{$j}:库存输入错误，请重新输入。');");
    	            
                            if(!is_numeric($_m_type->KuCun()))
                                $Mess.=",库存错误，请输入数字格式";
                            else
                            {
                                if(is_numeric($DbID) && $DbID>0)
                                {
                                   $_m_type->Id($DbID);
                                    Fram::SetChanged($_m_type->_ProId,false);
                                    $r=$r && Bll_ProType::Update($_m_type,$Conn,"PRO_ID=".$Pid);
                                }
                            
                                $Count++;
                            }
    	                
                    }
                }
                
	       }
	            
// 	            $r= $r && Bll_ProType::InsertUpdateType($Pid, $Mess,$Conn,Bll_User::GetRoleByID($m2->UserId()),$m2->UserId());
	        
	        if($r)
	        {
	            $Tran->commit();
	            echo ("parent.window.ExtAlert('操作成功。');");
	            echo Js::ParentDoView(true);
	        }
	        else
	        {
	            $Tran->rollback();
	            if(strlen($Mess)==0)
	                $Mess='操作失败，请重试。';
	            echo("parent.window.ExtAlert('{$Mess}');");
	        }
	        Fram::CloseConn($Conn);
	        exit();
	    }
	    $m=new Model_Pro();$m=Bll_Pro::GetModel($Pid);
	    $model=new Pro();
	    $model->NAME=$m->Name();
	    $model->NAME2=$m->Name2();
	    $model->PRICE_SHOP=$m->PriceShop();
	    $model->SHI_CHANG_PRICE=$m->ShiChangPrice();
	    $model->RATE=Bll_User::GetShopRate($m->UserId());
	    $model->SHOP_ROLE=Bll_User::GetRoleByID($m->UserId());
	    $model->HUI_DIAN_SHOP=$m->HuiDianShop();
	    $model->POINT_FREE=$m->PointFree();
	    
	    $USER_ID = $m->UserId();
	   
	    
	    $u=new Model_User();
	    $u=Bll_User::GetModel($m->UserId());
	    $model->POINT=$m->Point();
	    if($u->RoleId()!=81)
	    {
	        $model->POINT=round($u->PartnerRate()*$m->Price(),2);
	    }
	    $model->WU_LIU_ID=$m->WuLiuId();
	    $model->SORT_ID=$m->SortId();
	    $model->SORT_PARENT_ID=$m->SortParentId();
	    $model->USER_ID=$m->UserId();
	    $model->PRICE=$m->Price();
	    $model->HUI_DIAN=$m->HuiDian();
	    $model->PIC=$m->Pic();
	    //print_r($model);
	    $m_mess=new Model_ProMess();$m_mess=Bll_ProMess::GetModel($Pid);
	    $Mess=$m_mess->Mess();
	    $model->PIC1=$m_mess->Pic1();
	    $model->PIC2=$m_mess->Pic2();
	    $model->PIC3=$m_mess->Pic3();
	    $model->PIC4=$m_mess->Pic4();
	    $model->PIC5=$m_mess->Pic5();
	    
	    $Types = array();
	    $Types=Bll_ProType::GetList(1, 50,"PRO_ID=".$Pid);
	    $TypePids = array();
	    $UsedTypeIds = array();
	    
	    $show_btn = 1;
	    
	    $RoleID=SysFram::getLoginRoleID();
	    $show_msg = '';
	   
	    if($Types){
    	    foreach ($Types as $key => $v){
    	        $type_json = $v['GUI_GE_JSON'];
    	        $type_array = json_decode($v['GUI_GE_JSON']);
    	        
    	        if($type_array){
    	            foreach ($type_array as $key2 => $v2){
    	                $Types[$key]['GUI_GE_JSON_ARRAY'][] = array(
    	                    'pid' => $key2,
    	                    'tid' => $v2,
    	                );
    	                
    	                if(!in_array($key2, $UsedTypeIds)){
    	                    $UsedTypeIds[] = $key2;
    	                }
    	            }
    	        } 	        
    	        
    	    }
	    }
	    
	   
	    
	    if($type_array){
	        foreach ($type_array as $key => $v2){
	            $TypePids[] = $key;
	        }
	        
	    }
	    
	    $UsedTypeIds = implode('_', $UsedTypeIds);
	   
	    
	    $this->layout="ext";
	    $this->render('quick_edit',array('pro'=>$m,'UsedTypeIds'=>$UsedTypeIds,'m'=>$model,'Mess'=>$Mess,'Types'=>$Types,'TypePids'=>$TypePids,'pro_bei_zhu'=>$m->BeiZhu(),'show_btn'=>$show_btn,'show_msg'=>$show_msg,'USER_ID'=>$USER_ID));
	}
	
**/
	public function GuigehtmlAction()
	{
	    $SortID=Fram::GetNumValue('sort_id');
	    $SHOP_ID =Fram::GetNumValue('SHOP_ID',0);
	    $Used_Type_Ids =Fram::GetValue('Used_Type_Ids','');
	    
	    $NoSelect=Fram::GetNumValue('no_select',0);
// 	    if(!Fram::CheckNum($SortID))
// 	        die('请输入类别主键');

	    $this->display('gui-ge-html',array('Used_Type_Ids'=>$Used_Type_Ids,'SortID'=>$SortID,'NoSelect'=>$NoSelect,'USER_ID'=>$SHOP_ID));
	}

}
