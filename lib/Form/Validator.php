<?php
namespace Form;

	use Pub\Fram;
 class Validator
	{
	    public static function ModelFieldCheck($m,$rules)
	    {
	        $r=true;
	        foreach($rules[0] as $key2 => $value2)
	        {
	            $key_m = '_'.\Pub\Fram::FormatName($key2);
	            foreach($value2 as $key=>$value)
	            {
	                switch($key)
	                {
	                    case 'required':
	                        $r = $r && self::required($m->$key_m->v);
	                        break;
	                    case 'email':
	                        $r = $r && self::email($m->$key_m->v);
	                        break;
	                    case 'dateISO':
	                    case 'date':
	                        $r = $r && self::date($m->$key_m->v);
	                        break;
	                    //case 'mobile':
	                    //    $r = $r && self::MobileNum($m->$key_m->v);
	                    //    break;
	                    case 'number':
	                        $r = $r && is_numeric($m->$key_m->v);
	                        break;
	                    case 'digits':
	                        $r = $r && floor($m->$key_m->v)==$m->$key_m->v; //&& is_int($m->$key_m->v);
	                        break;
	                    case 'equalTo':
	                        $key2='_'.\Pub\Fram::FormatName(str_replace('#', '', $value));
	                        $r = $r && self::equalTo($m->$key_m->v,$m->$key2->v);
	                        break;
	                    case 'maxlength':
	                        $r = $r && self::maxlength($m->$key_m->v,$value);
	                        break;
	                    case 'minlength':
	                        $r = $r && self::minlength($m->$key_m->v,$value);
	                        break;
	                    case 'max':
	                        $r = $r && (is_numeric($m->$key_m->v) && $m->$key_m->v<=$value);
	                        break;
	                    case 'min':
	                        $r = $r && (is_numeric($m->$key_m->v) && $m->$key_m->v>=$value);
	                        break;
	                    default:
	                        $r=false;
	                }//echo "-{$m->$key_m->k}-{$key}-{{$m->$key_m->v}}-----------------";var_dump($r);echo'<br/>';
	            }
	            
	        }
	        
	        return $r;
	    }
		
		protected static function required($value)
		{
			return !empty(trim($value));
		}
		
		protected static function minlength($value,$Length)
		{
			if(strlen($value)<$Length) { return false; } return true;			
		}
		
		protected static function maxlength($value,$Length)
		{
			if(strlen($value)>$Length) { return false; } return true;
		}
		
		public static function email($value)
		{
			return filter_var($value,FILTER_VALIDATE_EMAIL);
		}
		
		public static function MobileNum($value)
		{
		    return (\Pub\Fram::CheckNum($value) && strlen($value)==11)?true:false;
		}
		
		protected static function date($value)
		{
		    $ret = strtotime($value);
            return $ret !== FALSE && $ret != -1;
		}
		
		protected static function equalTo($value1,$value2)
		{
			return $value1 === $value2;
		}
	}