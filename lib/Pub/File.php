<?php
namespace Pub;
class File
{
    public static function SuoLuoTu($FileName,$SaveTo,$SetW,$SetH)
    {
        $IMGInfo= getimagesize($FileName);
        if(!$IMGInfo) return false;       
        if($IMGInfo['mime']== "image/pjpeg" || $IMGInfo['mime']=="image/jpeg"){
            $ThisPhoto= imagecreatefromjpeg($FileName);
        }elseif($IMGInfo['mime']== "image/x-png" || $IMGInfo['mime']== "image/png"){
            $ThisPhoto= imagecreatefrompng($FileName);   
        }elseif($IMGInfo['mime']== "image/gif"){
            $ThisPhoto=imagecreatefromgif($FileName); 
        } 
        $width=$IMGInfo[0];
        $height=$IMGInfo[1];   
        $scalc = max($width/$SetW,$height/$SetH);
        $nw = intval($width/$scalc);
        $nh = intval($height/$scalc);
        //echo "缩略大小：w$nw,h$nh <br />";
        if($SetW-$nw == 1){$nw = $SetW;}
        if($SetH-$nh == 1){$nh = $SetH;}
        //echo "+修正1像素： w$nw,h$nh<br />";
        //补宽
        if($SetW-$nw > 0){
            $nh = $nh +(($nh/$nw) * ($SetW-$nw));
            //echo "*需补宽".($SetW-$nw).",陪补高".(($nh/$nw) * ($SetW-$nw))."  <br />";  
            $nw = $SetW;
        }
        //补高
        if($SetH-$nh > 0){
            $nw = $nw + (($nw/$nh) * ($SetH-$nh));
            //echo "*需补高".($SetH-$nh).",陪补宽". (($nw/$nh) * ($SetH-$nh)) ."<br />";
            $nh = $SetH;
        }
       
        $nw = intval($nw);
        $nh = intval($nh);
        //echo "+修正大小：w$nw,h$nh<br />";
        $px = ($SetW - $nw)/2;
        $py = ($SetH - $nh)/2;
        //echo "窗口大小：w$SetW,h$SetH <br />";
        //echo "+偏移修正：x$px,y$py <br />";
        $NewPhoto=imagecreatetruecolor($SetW,$SetH);
        imagecopyresized($NewPhoto,$ThisPhoto,$px,$py,0,0,$nw,$nh,$width,$height);
        ImageJpeg ($NewPhoto,$SaveTo,100);
        return true;
    }
    
	//文件存储路径
	public static function GetDictionPath()
	{
		return "upload/auto";//$_SERVER['DOCUMENT_ROOT'].
	}
    /**
     * 建立文件夹
     *
     * @param    string $aimUrl
     * @return    viod
     */
    public static function createDir($aimUrl) 
    {
        $aimUrl = str_replace('', '/', $aimUrl);
        $aimDir = '';
        $arr = explode('/', $aimUrl);
        foreach ($arr as $str) 
        {
            $aimDir .= $str . '/';
            if (!file_exists($aimDir)) 
            {
                @mkdir($aimDir);
            }
        }
        //die($aimDir);
    }

	 /**
     * 建立文件
     *
     * @param    string    $aimUrl 
     * @param    boolean    $overWrite 该参数控制是否覆盖原文件
     * @return    boolean
     */
    public static function CreateFile($aimUrl,$data,$overWrite = true) 
    {
        if (file_exists($aimUrl) && $overWrite == false) 
        {
            return false;
        } 
        elseif (file_exists($aimUrl) && $overWrite == true) 
        {
            self::DelFile($aimUrl);
        }
        //die(dirname(__FILE__));
        //basename()
        $aimDir = dirname($aimUrl);
        self::createDir($aimDir);
        touch($aimUrl);//置指定文件的访问和修改时间,如果文件不存在，则会被创建。
        //写入文件
        //die(realpath($aimDir));
        //$array = explode("/", $aimUrl);
        //die($aimUrl);
        //echo realpath($aimUrl);
        //die("dddd");
        $file = fopen(realpath($aimUrl), "w") or die("Can't open file");
		if(!fwrite($file, $data))
		{
			echo "Error writing to file";
		}
		fclose($file);
        return true;
    }
    
    public static function File_Mess($f)
    {
        $r=false;
        if(file_exists($f))
        { 
            $r = file_get_contents($f);
            //$str = str_replace("\r\n","<br />",$str); 
        }
        return $r;
    }
    
    public static function CreateFile2($aimUrl,$data,$overWrite = true) 
    {
        if (file_exists($aimUrl) && $overWrite == false) 
        {
            return false;
        } 
        elseif (file_exists($aimUrl) && $overWrite == true) 
        {
            self::DelFile($aimUrl);
        }
        //die(dirname(__FILE__));
        //basename()
        $aimDir = dirname($aimUrl);
        self::createDir($aimDir);
        touch($aimUrl);//置指定文件的访问和修改时间,如果文件不存在，则会被创建。
        //写入文件
        //die(realpath($aimDir));
        $array = explode("/", $aimUrl);
        //$file = fopen(realpath($aimDir)."\\".$array[count($array)-1], "w") or die("Can't open file");
		//if(!fwrite($file, $data))
		//{
			//echo "Error writing to file";
		//}
		//fclose($file);
        return true;
    }

     /**
     * 删除文件夹
     *
     * @param    string    $aimDir
     * @return    boolean
     */
    public static function unlinkDir($aimDir) 
    {
        $aimDir = str_replace('', '/', $aimDir);
        $aimDir = substr($aimDir, -1) == '/' ? $aimDir : $aimDir.'/';
        if (!is_dir($aimDir)) 
        {
            return false;
        }
        $dirHandle = opendir($aimDir);
        while(false !== ($file = readdir($dirHandle))) 
        {
            if ($file == '.' || $file == '..') {
                continue;
            }
            if (!is_dir($aimDir.$file)) {
                FileUtil::unlinkFile($aimDir . $file);
            } else {
                FileUtil::unlinkDir($aimDir . $file);
            }
        }
        closedir($dirHandle);
        return rmdir($aimDir);
    }
    /**
     * 删除文件
     *
     * @param    string    $aimUrl
     * @return    boolean
     */
    public static function DelFile($aimUrl) 
    {
        if (file_exists($aimUrl)) 
        {
            unlink($aimUrl);
            return true;
        } 
        else 
        {
            return false;
        }
    }
    //生成随机目录名+文件名
    public static function SuiJiName($FileName,$DictionName=null) 
    {
    	$ToFileName="";
    	if(!isset($FileName))
    	{
    		$FileName="a.jpg";
    	}
        $names = explode(".", $FileName);//Y-m-d H:i:s
        //目录名部分
    	if(isset($DictionName))
    	{
    		$ToFileName .= "upload/".$DictionName."/";
    	}
    	else
    	{
    		$ToFileName .= self::GetDictionPath()."/";
    	}
        $array = array(Fram::Date("Y"),Fram::Date("m"),Fram::Date("d"),Fram::Date("H"),Fram::Date("i"),Fram::Date("s"));
        $ToFileName .= implode("/",$array);
        //文件名部分
        $ToFileName .= "/".floor(intval(microtime())*1000000).self::getRandNumber();
		$ToFileName .= ".".$names[count($names)-1];
        
        return $ToFileName;
    }

    //随机数
    public static function getRandNumber ($fMin=1, $fMax=99999) 
    { 
	  srand((double)microtime()*1000000);
	  $fLen = "%0".strlen($fMax)."d";
	  return sprintf($fLen, rand($fMin,$fMax));
 	}
 	
 	public static function Is_Exist($f)
 	{
 	    if(file_exists($f))
 	    {
 	        return true;
 	    }
 	    else
 	    {
 	        return false;
 	    }
 	}
 	
 	public static function GetPicByUrl($url,$filename) 
 	{ 
	  if($url==""):return false;endif; 
	  try 
	  {
	  	  ob_start(); 
		  @readfile($url); 
		  $img = ob_get_contents(); 
		  ob_end_clean(); 
		  $size = strlen($img);
		  if($size>0)
		  {
		  	return self::CreateFile($filename,$img,true);
		  }
		  else
		  {
		  	return false;
		  }
		  /**
		  $fp2=@fopen($filename, "a"); 
		  fwrite($fp2,$img); 
		  fclose($fp2); 
		  **/
		  
		  
	  }
	  catch (Exception $e) {return false;} 
	  
	  
	} 
 	
}
