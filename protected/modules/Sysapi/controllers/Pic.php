<?php
Use \Pub\Fram;
Use \Pub\SysFram;

class PicController extends \Base\Api
{
	public function Lun_boAction()
	{
	    $Total=0;
        $rows=\Bll\News::GetList(1, 10,'SORT_ID=10 and STATE=1',$Total,'ID,TITLE,PIC1,ADD_TIME');
        echo parent::ToJson($rows);
	}
	
	
	
	
}