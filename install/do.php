<?php 
    ini_set('max_execution_time','300');
    include_once('init.php');
    include_once(APP_PATH.'/lib/Pub/File.php');
	$_S=Language();
    
    $act=isset($_REQUEST['act'])?$_REQUEST['act']:null;
    
    $_paras="";
    if($_GET)
    {
        foreach($_GET as $k => $v)
        {
            if($k!='act')
                $_paras.="&{$k}=".urlencode($v);
        }
    }
    
    if($act=='1')
    {
        $host=GetValue('host');
        $port=GetValue('port');
        $db_user=GetValue('db_user');
        $db_pass=GetValue('db_pass');
        $db_name=GetValue('db_name');
        
        $admin_pass=GetValue('admin_pass');
        
        if(!IsNotEmpty($host,true) || !IsNotEmpty($port,true) || !IsNotEmpty($db_user,true) || !IsNotEmpty($db_pass,true) || !IsNotEmpty($db_name,true) || !IsNotEmpty($admin_pass,true))
        {
            die('数据库配置信息不足');
        }
        else 
        {
            $str="mysql:host={$host};dbname={$db_name};port={$port}";
            $Conn=null;
            try
            {
                $Conn=new PDO($str,$db_user,$db_pass,[PDO::ATTR_TIMEOUT=>2,PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
            }
            catch(Exception $e)
            {
                $Conn=null;die('数据库连接失败');
            }
            
            try
            {
                //echo "数据库恢复中............................................";
                $Conn->exec("set names 'UTF8'");
                $file=file_get_contents('sql.install');
                $Conn->exec($file);
                $Conn->exec("update user set LOGIN_NAME='admin',LOGIN_PASS='{$admin_pass}' where ID=71");
                $Conn=null;
                //echo "数据库安装成功!";
                die("<script>parent.window.step('成功',false,true);parent.window.step('写入配置文件',true,false);window.location.href='do.php?act=2{$_paras}'</script>");
            }
            catch(Exception $e)
            {
                $Conn=null;throw $e;
            }
            
        }
    }
    else if($act=='2')
    {
        $host=GetValue('host');
        $port=GetValue('port');
        $db_user=GetValue('db_user');
        $db_pass=GetValue('db_pass');
        $db_name=GetValue('db_name');
        
        $ini=<<<EOT
[common]
application.directory                         = APP_PATH
application.ext                               = php
application.view.ext                          = php
application.modules 	                      = "Index,Mall,Sysapi,System,Chuanhai,Call,Caiwu,Mess,Page,Users,Cmd"
application.library 	                      = APP_PATH "/../lib"
application.library.directory 	              = APP_PATH "/../lib"
application.library.namespace 	              = 
application.bootstrap 	                      = APP_PATH "/Bootstrap.php"
application.baseUri 	                      =
application.url_suffix 	                      = .html
application.dispatcher.defaultRoute           =
application.dispatcher.throwException         = 0
application.dispatcher.catchException         = 1
application.dispatcher.defaultModule          = "Index"
application.dispatcher.defaultController      = "pro"
application.dispatcher.defaultAction          = "index"


[product : common]

application.db.ip                       = "{$host}"
application.db.dbname                   = "{$db_name}"
application.db.port                     = "{$port}"
application.db.username                 = "{$db_user}"
application.db.password                 = "{$db_pass}"
EOT;
        
        $file = fopen(realpath(APP_PATH."/protected/config/application.ini"), "w") or die("Can't open file");
        if(!fwrite($file, $ini))
        {
            echo "Error writing to file";
            echo("<script>parent.window.step('失败',false,true);</script>");
            echo("<script>parent.window.close();");
        }
        else 
        {
            if(\Pub\File::CreateFile('lock.lock', "1"))
            {
                echo("<script>parent.window.step('成功',false,true);</script>");//
                echo("<script>parent.window.close();parent.location.href='success.php'</script>");
            }
            else 
            {
                echo("<script>parent.window.step('失败',false,true);</script>");
                echo("<script>parent.window.close();");
            }
        }
        fclose($file);
        
        
    }
    else if($act=='ok')
    {
        
    }
?>