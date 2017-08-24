<?php
use Pub\SysFram;
use Pub\Fram;

class NewsController extends \Base\Common
{
	public function ListAction()
	{

	}
	
	
	public function ViewAction()
	{
		$ID = Fram::GetNumValue('id');
		if(!Fram::CheckNum($ID))
		    die('无信息');
		$news=Bll\News::Model($ID);
		$news_info=Bll\NewsInfo::Model($ID);
		
		$this->display_layout('view',['news'=>$news,'news_info'=>$news_info]);
	}
	

	
}