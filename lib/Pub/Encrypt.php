<?php
namespace Pub;
class Encrypt
{
	public static function PassWordEncode($Str)
	{
		$Str = self::CommonEncode($Str);
		return $Str;
	}
	
	public static function PassWordEncode2($Str)
	{
		$Str = sha1(md5(self::CommonEncode($Str)));
		return $Str;
	}
	
	public static function CommonEncode($Str)
	{
		//$Str = self::php_encrypt($Str);
		$Str = self::CommonCode($Str,'ENCODE','');
		$Str = base64_encode($Str);
		return $Str;
	}
	
	public static function CommonDecode($Str)
	{
		$Str = base64_decode($Str);
		$Str = self::CommonCode($Str,'DECODE','');
		//$Str = self::php_decrypt($Str);
		return $Str;
	}
	//签名算法
	public static function QianMing($str)
	{
		return base64_encode(md5(md5(self::CommonEncode($str)).md5(sha1($str))));
	}

	public static function php_encrypt($str)
	{
		$str=$str.'';
		$str=substr(base64_encode($str),0,2).$str;
		$encrypt_key = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$decrypt_key = 'feA4mBdCDErF6yGzb3sHo8IqJKwLM7cat2NjOP5v1u0xQ9kRgSiThUpVWnXlYZ';
		if (strlen($str) == 0) return false;
		$enstr='';
		for ($i=0; $i<strlen($str); $i++)
		{
			for ($j=0; $j<strlen($encrypt_key); $j++)
			{
				if ($str[$i] == $encrypt_key[$j])
				{
					$enstr .= $decrypt_key[$j];
					break;
				}
			}
		}
		return $enstr;
	}
	
	public static function php_decrypt($str)
	{
		$encrypt_key = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$decrypt_key = 'feA4mBdCDErF6yGzb3sHo8IqJKwLM7cat2NjOP5v1u0xQ9kRgSiThUpVWnXlYZ';
		if (strlen($str) == 0) return false;
		$str=substr($str,2);
		for ($i=0; $i<strlen($str); $i++)
		{
			for ($j=0; $j<strlen($decrypt_key); $j++)
			{
				if ($str[$i] == $decrypt_key[$j])
				{
					$enstr .= $encrypt_key[$j];
					break;
				}
			}
		}
		return $enstr;
	}

	public static function CommonCode($string, $operation, $key = 'wWw.ShowNI.CN') 
	{
	     $key = md5($key);//? $key : $GLOBALS['auth_key']
	     $key_length = strlen($key);
	     $string = $operation == 'DECODE' ? base64_decode($string) : substr(md5($string.$key), 0, 8).$string;
	     $string_length = strlen($string);
	     $rndkey = $box = array();
	     $result = '';
	
	     for($i = 0; $i <= 255; $i++) 
	     {
	      	$rndkey[$i] = ord($key[$i % $key_length]);
	        $box[$i] = $i;
	     }
	
	     for($j = $i = 0; $i < 256; $i++) 
	     {
	      	$j = ($j + $box[$i] + $rndkey[$i]) % 256;
	        $tmp = $box[$i];
	        $box[$i] = $box[$j];
	        $box[$j] = $tmp;
	     }
	
	     for($a = $j = $i = 0; $i < $string_length; $i++) 
	     {
	      	$a = ($a + 1) % 256;
	             $j = ($j + $box[$a]) % 256;
	             $tmp = $box[$a];
	             $box[$a] = $box[$j];
	             $box[$j] = $tmp;
	             $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
	     }

	     if($operation == 'DECODE') 
	     {
	             if(substr($result, 0, 8) == substr(md5(substr($result, 8).$key), 0, 8)) {
	                 return substr($result, 8);
	             } else {
	                 return '';
	             }
	     } else {
	             return str_replace('=', '', base64_encode($result));
	     }

	}

	public static function EncodingStrToStr($_str) 
	{
		$_str=base64_encode($_str);
		$_str=str_replace("AAA", ".",$_str);
		$_str=str_replace('1', '$',$_str);
		$_str=str_replace('B', '%',$_str);
		$_str=str_replace('+', '*',$_str);
		
		$_str=str_replace('/', 'B',$_str);
		$_str=str_replace('=', '1',$_str);
		
		$_str=str_replace("11", "!",$_str);
		
		return $_str;
	}
	
	
	
	
	public static function CheckWebApiPower($Id)
	{
	    $Mobile=Fram::GetNumValue('api_user');
	    $UserPass=Fram::GetValue('key');
	    if(!$Mobile || !is_numeric($Mobile) || !$UserPass)
	        die(json_encode(array('error'=>'1','mess'=>'用户名或密码错误。')));
	    
	    if(!SysFram::CheckWebApiSign($Mobile,$UserPass,$Id))
	    {
	        die(json_encode(array('error'=>'1','mess'=>'用户名或密码错误。')));
	    }
	}
	
}
