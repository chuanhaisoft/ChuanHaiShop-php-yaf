<?php
namespace Pub;

class ModelBase
{
    public $__RuleName='';
    
	public function getPost($_arr=null)
	{
	    if($_arr==null)
	        $_arr=$_POST;
	    
		if(isset($_arr) && count($_arr)>0)
		{
			foreach ($_arr as $key => $value)
			{
			    if($this->NameIfPass())
			        $key=array_flip($this->FieldPassedName())[$key];
				$key = '_'.Fram::FormatName($key);
				if(isset($this->$key))
				{
				    $v='';
				    if(is_array($value))
				    {
				        $v=[];
				        for($i=0;$i<count($value);$i++)
				            array_push($v, \Pub\Fram::StrCheck($value[$i]));
				        $v=implode(',', $v);
				    }
				    else
				        $v = \Pub\Fram::StrCheck($value);
				    $this->$key->Set($v,false);
				}
			}
		}
	}
	
	public function ValidateModel()
	{
	    $Rules=\Form\Html::RulesJson($this,true);
	    $Checked=\Form\Validator::ModelFieldCheck($this, $Rules);
	    return $Checked;
	}
}