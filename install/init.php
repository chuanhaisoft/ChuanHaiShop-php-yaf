<?php
    if(file_exists("lock.lock"))
        die("安装文件已经锁定,如需重新安装,请删除install文件夹中的lock.lock文件");
    define('APP_PATH', $_SERVER['DOCUMENT_ROOT']);
    $CheckWriteFolder=array('upload','install','protected/config/application.ini');
    $IsWrite=null;
    $IsPhp=null;
    
    function SetIsWrite($v)
    {
        global $IsWrite;
        if($IsWrite===null)
            $IsWrite=$v;
        else
            $IsWrite=$IsWrite && $v;
    }
    function SetIsPhp($v)
    {
        global $IsPhp;
        if($IsPhp===null)
            $IsPhp=$v;
        else
            $IsPhp=$IsPhp && $v;
    }
    
    function IsNotEmpty($Str,$IsNothing=false)
    {
        $Value=false;
        if(isset($Str) && $Str!=null && ($IsNothing==false || ($IsNothing==true && $Str!="")))
        {
            $Value=true;
        }
        return $Value;
    }
    
    function GetValue($key,$value=null,$IsToUTF8=false,$IsUrlEnCode=false,$IsUrlDeCode=false)
    {
        $tdata = null;
        if(isset($_GET[$key]))
            $tdata = $_GET[$key];
        if(!isset($tdata) && isset($_REQUEST[$key]))
            $tdata=$_REQUEST[$key];
        if(isset($value) && !isset($tdata))
            $tdata=$value;
        $tdata = StrCheck($tdata);
        if($IsToUTF8 && isset($tdata))
        {
            $tdata = convert2utf8($tdata);
        }
        if($IsUrlDeCode && isset($tdata))
            $tdata = urldecode($tdata);
        if($IsUrlEnCode && isset($tdata))
            $tdata = urlencode($tdata);
        return $tdata;
    }
    
    function convert2utf8($object)
    {
        //$NewObject = array();
        $NewObject = $object;
        //echo gettype($object);
        switch (gettype($object))
        {
            case 'array':
                foreach($object as $k1=> $v1)
                {
                    if(gettype($object[$k1]) == 'array')
                    {
                        $NewObject[$k1] = convert2utf8($object[$k1]);
                        //echo count($object[$k1]);
                        /**
                         foreach($object[$k1] as $k2=> $v2)
                         {
                         $NewObject[$k1][$k2] = iconv("gbk","utf-8",$object[$k1][$k2]);
                         }
                        **/
                    }
                    else
                    {
                        $NewObject[$k1] = iconv("gbk","utf-8",$object[$k1]);
                    }
                }
                break;
            case 'string':
                 
            default:
                $NewObject = iconv("gbk","utf-8",$object);
                break;
        }
        return $NewObject;
    }
    
    function StrCheck($Str,$DoKuoHao=false,$DoDengYu=false,$DoWenHao=false,$DoFenHao=false,$DoKongGe=false,$DoMyCatKey=false)
    {
        if(IsNotEmpty($Str))
        {
            $Str = trim($Str);
            $Str = str_replace("'","&#39;",$Str);
            $Str = str_replace("<","&#60;",$Str);
            $Str = str_replace(">","&#62;",$Str);
            $Str = str_replace("--","&#8254;&#8254;",$Str);
            $Str = str_replace("\\","&#92;",$Str);
            $Str = str_replace("\$","&#36;",$Str);
            if($DoKuoHao)
            {
                $Str = str_replace("(","&#40;",$Str);
                $Str = str_replace(")","&#41;",$Str);
            }
            if($DoDengYu)
                $Str = str_replace("=","&#61;",$Str);
            if($DoWenHao)
                $Str = str_replace("?","&#63;",$Str);
            if($DoFenHao)
                $Str = str_replace(";","&#59;",$Str);
            if($DoKongGe)
                $Str = str_replace(" ","&#160;",$Str);
        }
        else
        {
            $Str="";
        }
    
        return $Str;
    }
    
    function Language()
    {
        $_S=array();
        $_S['php_os'] = '操作系统';
        $_S['php_ver'] = '不低于Php5.6';
        $_S['mysql_ver'] = 'MySQL 版本';
        $_S['gd_version'] = 'GD 版本';
        $_S['jpeg'] = '是否支持 JPEG';
        $_S['gif'] = '是否支持 GIF';
        $_S['png'] = '是否支持 PNG';
        $_S['safe_mode'] = '服务器是否开启安全模式';
        $_S['safe_mode_on'] = '开启';
        $_S['safe_mode_off'] = '关闭';
        $_S['can_write'] = '可写';
        $_S['cannt_write'] = '不可写';
        $_S['not_exists'] = '不存在';
        $_S['cannt_modify'] = '不可修改';
        $_S['all_are_writable'] = '所有模板，全部可写';
    
        $_S['is_mysql']="是否支持MySQL:PDO";
        $_S['is_yaf']="是否支持Yaf";
        $_S['is_yaf_namespace']="是否支持Yaf命名空间";
        $_S['is_bcmath']="是否支持bcmath";
    
        $_S['support']="支持";
        $_S['not_support']="不支持";
        
        $_S['support_write']="可写";
        $_S['not_support_write']="不可写";
    
        return $_S;
    }
?>