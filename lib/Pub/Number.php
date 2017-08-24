<?php
namespace Pub;
class Number
{
    public static function Jia($a,$b,$c='ChUaNHaI',$d='ChUaNHaI')
    {
        //$num= "{$a}" + "{$b}";
        $num= bcadd($a,$b,self::DecimalLen($a, $b));
        if($c!='ChUaNHaI')
            $num= bcadd($num,$c,self::DecimalLen($num, $c));
        if($d!='ChUaNHaI')
            $num= bcadd($num,$d,self::DecimalLen($num, $d));
        //$num=floatval($num);
        return $num;
    }
    
    public static function Jian($a,$b,$c='ChUaNHaI',$d='ChUaNHaI')
    {
        //$num= "{$a}" - "{$b}";
        $num= bcsub($a,$b,self::DecimalLen($a, $b));
        if($c!='ChUaNHaI')
            $num= bcsub($num,$c,self::DecimalLen($num, $c));
        if($d!='ChUaNHaI')
            $num= bcsub($num,$d,self::DecimalLen($num, $d));
        return $num;
    }
    
    public static function Cheng($a,$b)
    {
        //$num= "{$a}" * "{$b}";
        $num= bcmul($a,$b,self::DecimalLen_Cheng($a, $b));
        return $num;
    }
    
    public static function Chu($a,$b,$JingDu=null)
    {
        //$num= "{$a}" / "{$b}";
        //$num= bcdiv($a,$b);
        return isset($JingDu)?bcdiv($a,$b,$JingDu):"{$a}" / "{$b}";
    }
    
    public static function XiaoYu($a,$b,$JingDu=2)
    {
        $r=bccomp($a,$b,$JingDu);
        if($r==-1)
            return true;
        else 
            return false;
    }
    
    public static function XiaoYu_DengYu($a,$b,$JingDu=2)
    {
        $r=bccomp($a,$b,$JingDu);
        if($r==-1 || $r==0)
            return true;
        else
            return false;
    }
    
    public static function DaYu($a,$b,$JingDu=2)
    {
        $r=bccomp($a,$b,$JingDu);
        if($r==1)
            return true;
        else
            return false;
    }
    
    public static function DaYu_DengYu($a,$b,$JingDu=2)
    {
        $r=bccomp($a,$b,$JingDu);
        if($r==1 || $r==0)
            return true;
        else
            return false;
    }
    
    public static function DecimalLen($a,$b)
    {
        $a_len=0;$b_len=0;
        $a=explode('.', $a);
        if(is_array($a) && isset($a[1]))
            $a_len=strlen($a[1]);
        $b=explode('.', $b);
        if(is_array($b) && isset($b[1]))
            $b_len=strlen($b[1]);
        return $a_len>$b_len?$a_len:$b_len;
    }
    
    public static function DecimalLen_Cheng($a,$b)
    {
        $a_len=0;$b_len=0;
        $a=explode('.', $a);
        if(is_array($a) && isset($a[1]))
            $a_len=strlen($a[1]);
        $b=explode('.', $b);
        if(is_array($b) && isset($b[1]))
            $b_len=strlen($b[1]);
    
        if($a_len>0 && $b_len>0)
            return $a_len + $b_len;
        else
            return $a_len>$b_len?$a_len:$b_len;
    }
	
 	
}
