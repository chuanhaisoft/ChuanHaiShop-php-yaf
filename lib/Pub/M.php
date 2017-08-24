<?php
namespace Pub;
class M
{
	public $k;
	public $v;
	public $Type;
	//public $FieldIntro;
	public $AutoKey = false;
	public $Changed = false;
	
	function __construct($__FieldName,$__FieldValue,$__FieldType)
	{
		$this->k = $__FieldName;
		$this->v = $__FieldValue;
		$this->Type = $__FieldType;
	}
	
	public function Set($__FieldValue,$IsSetFieldChanged=true)
	{
		$this->v = $__FieldValue;
		if($IsSetFieldChanged)
		  $this->Changed = true;
		
	}
	
	public function SetChanged($State=true)
	{
	   //if($this->v!=null)
	       $this->Changed=$State;
	}
	
	public function w($Act='=',$FieldValue=null,$QianZhui='',$HouZhui='',$Field_QianZhui='')
	{
	    if($Field_QianZhui)
	        $Field_QianZhui=$Field_QianZhui.".";
	    else
	        $Field_QianZhui='';
	    if($FieldValue===null)
	        $FieldValue=$this->v;
	    if(!$QianZhui)
	        $QianZhui='';
	    if(!$HouZhui)
	        $HouZhui='';
	    return [$QianZhui.$Field_QianZhui.$this->k.' '.$Act.' ? '.$HouZhui,$FieldValue];
	}
	
	public function w_and($Act='=',$FieldValue=null,$QianZhui='',$HouZhui='',$Field_QianZhui='')
	{
	    $w=$this->w($Act,$FieldValue,$QianZhui,$HouZhui,$Field_QianZhui);
	    return [' and '.$w[0],$w[1]];
	}
	
	public function w_or($Act='=',$FieldValue=null,$QianZhui='',$HouZhui='',$Field_QianZhui='')
	{
	    $w=$this->w($Act,$FieldValue,$QianZhui,$HouZhui,$Field_QianZhui);
	    return [' or '.$w[0],$w[1]];
	}
	
	public function KuoHao_Left($Act='and')
	{
	    $Act=trim($Act);
	    return [" {$Act} ( "];
	}
	
	public function KuoHao_Right()
	{
	    return [')'];
	}

}
