<?php
use Pub\Fram;
use Pub\File;

class UploadController extends yaf\Controller_Abstract
{
    
    public function Upload_imAction()
    {
        //header('Access-Control-Allow-Origin:*');
        //header("Access-Control-Allow-Methods", "POST,OPTIONS,GET");
        
        $from = @$_SERVER['HTTP_REFERER'];
        if($from) {
            $arr = parse_url($from);
            $Host=$arr['host'];//SERVER_PORT
            if(isset($arr['port']) && $arr['port']!='80' )
            {
                $Host.=':'.$arr['port'];
            }
            $allowDomain = $arr['scheme'] . "://" . $Host;
            header("Access-Control-Allow-Origin: " . $allowDomain);
        }
        
        header("Access-Control-Allow-Methods: POST,OPTIONS,GET");
        header("Access-Control-Allow-Credentials: true");
        header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
         
        $filename = Fram::GetValue("filename","");
        $FileType=Fram::GetNumValue('pic_type',0);
    
        if(Fram::IsPost())
        {
            $data =  $_FILES["file"];
            $_FileSize=$data['size']/1024;
            if($_FileSize>1024*5)
            {
                json_encode(json_encode(array('code'=>1,'msg'=>'文件尺寸太大')));
            }
            $fileTypes = array('jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG','rar','zip','mp3','arm','mp4');
            $fileParts = pathinfo($_FILES['file']['name']);
            if (!in_array($fileParts['extension'],$fileTypes))
            {
                self::ShuChu(json_encode(array('code'=>1,'msg'=>'文件类型错误')));
            }
    
            if (!is_null($data))
            {
                if(false || self::CheckFileName($filename))
                    $FileName = $filename;
                else
                    $FileName=File::SuiJiName("a.".$fileParts['extension'],'im_pic');

                File::CreateFile2($FileName,"");
                move_uploaded_file($_FILES['file']['tmp_name'],realpath($FileName));
    
                self::ShuChu(json_encode(array('code'=>0,'data'=>array('src'=>'http://'.$_SERVER['SERVER_NAME'].'/'.$FileName),'msg'=>'')));
    
            }
            else
            {
                self::ShuChu(json_encode(array('code'=>1,'msg'=>'文件内容为空')));
            }
        }
        else
        {
            
        }
    
    }
    
	public static function ShuChu($str)
	{
	    $type=Fram::GetValue('type','web');
	    //$Url=Fram::GetValue('tmpurl','https://');
	    if($type=='web')
	    {die($str);
	        header('Location:' . $_GET['tmpurl'] . '?data=' . urlencode($str));
	        exit();
	    }
	    else 
	    {
	        die($str);
	    }
	    
	}
	
	//保存用户上传资源
	public function Fileaction()
	{
		$filename = Fram::GetValue("filename","");
		$FileType=Fram::GetNumValue('pic_type',0);
		$Return_Type=Fram::GetValue('return_type','string');
		
		if(Fram::IsPost())
		{
			$data =  $_FILES["Filedata"];
			//print($data['size']);
			$_FileSize=$data['size']/1024;
			if($_FileSize>1024*3)
			{
				//echo '<html><head><base target="_self"/></head>';
				//echo Js::ScriptHead();
				//echo Js::Alert("png图片不能大于3M");
				//echo "document.location.href='/uploadfile/Upload/'";
				//echo Js::ScriptEnd();
				//$this->render('upload');
				//exit();	
			    die("-1");
			}
			$fileTypes = array('jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG','rar','zip');
			$fileParts = pathinfo($_FILES['Filedata']['name']);
			if (!in_array($fileParts['extension'],$fileTypes))
			{
			    //echo Js::ScriptHead();
			    //echo Js::Alert("扩展名无效");
			    //echo "document.location.href='/uploadfile/Upload/'";
			    //echo Js::ScriptEnd();
			    //$this->render('upload');
			    die("-1");
			}
			
			if (!is_null($data)) 
			{
				if(self::CheckFileName($filename))
					$FileName = $filename;
				else
					$FileName=File::SuiJiName("a.".$fileParts['extension']);
				//die($FileName);
				File::CreateFile2($FileName,"");
				move_uploaded_file($_FILES['Filedata']['tmp_name'],realpath($FileName));
				
				$ext=explode(".", realpath($FileName));
				$ext[count($ext)-2]=$ext[count($ext)-2]."_250x250";
				$ext=implode('.',$ext);
				
				File::SuoLuoTu(realpath($FileName), $ext, 250, 250);
				if($FileType==999999999)
				{
				    //File::SuoLuoTu(realpath($FileName), str_replace('.', "_800.", realpath($FileName)), 800, 800);
				    File::SuoLuoTu(realpath($FileName), str_replace('.', "_500.", realpath($FileName)), 500, 500);
				    //File::SuoLuoTu(realpath($FileName), str_replace('.', "_210.", realpath($FileName)), 210, 210);
				    //File::SuoLuoTu(realpath($FileName), str_replace('.', "_80.", realpath($FileName)), 80, 80);
				    //$resizeimage=new ResizeImage(realpath($FileName), '800', '800', '0', str_replace('.', "_800.", realpath($FileName)));
				    //$resizeimage=new ResizeImage(realpath($FileName), '500', '500', '0', str_replace('.', "_500.", realpath($FileName)));
				    //$resizeimage=new ResizeImage(realpath($FileName), '210', '210', '0', str_replace('.', "_210.", realpath($FileName)));
				    //$resizeimage=new ResizeImage(realpath($FileName), '80', '80', '0', str_replace('.', "_80.", realpath($FileName)));
				}
				if($FileType==50)
				{
				    //echo $FileName;echo "<br/>";
				    //echo realpath($FileName);echo "<br/>";
				    //echo realpath("upload/im/top/1.jpg");echo "<br/>";die('---');
				    $UserID=Fram::GetNumValue('user_id',-1);
				    if(is_numeric($UserID) && $UserID>0)
				        File::SuoLuoTu(realpath($FileName), "upload/im/top/{$UserID}.jpg", 50, 50);
				}
				
				//$file=CUploadedFile::getInstanceByName($_FILES['Filedata']);
				//$file->saveAs($data,true);
				echo $Return_Type=='json'?json_encode(['file_url'=>$FileName]):$FileName;
				/**
				if($IsIE)
					$str="<script>returnValue='{$FileName}';window.close();</script>";
				else
					$str="<script>window.opener.ffSetValue('{$FileName}');window.close();</script>";
				//"<script>returnValue=\"upload/uploadfile/" + FilePath1 + "/" + FilePath2 + "/" + FileEndName + "\";window.close();</script>"
				die($str);
				**/
				
			}
			else 
			{
				echo "文件内容为空";
			}
		}
		else
		{
			$this->render('upload');
		}
		
	}
	//检测文件名合法性
	public function CheckFileName($filename)
	{
		//upload/auto/2010/04/25/15/33/33/27032259186.png
		$reValue=false;
		$filename2 = substr($filename,0,11);
		$filename3 = substr($filename,strlen($filename)-4);
		//die($filename2."----".$filename3);
		if($filename2 == "upload/auto" && $filename3 == ".png")
			$reValue = true;
		//die($reValue);
		return $reValue;
	}
	
	//保存用户上传 侧面图
	public function actionCePic()
	{
		if(Yii::app()->request->isPostRequest)
		{
			$ProductID = Fram::GetValue("ProductID",-1);
			if($ProductID>0)
			{
				$data =  $_FILES["Filedata"];
				if (!is_null($data)) 
				{
					$FileName=File::SuiJiName("a.jpg");
					File::CreateFile2($FileName,"");
					move_uploaded_file($_FILES['Filedata']['tmp_name'],realpath($FileName));
					//$file=CUploadedFile::getInstanceByName($_FILES['Filedata']);
					//$file->saveAs($data,true);
					//echo $FileName;
					//parent.window.ExtAlert(\"\u6DFB\u52A0\u6210\u529F\")","parent.window.DoView();"]}
					$model=new Model_MorePic();
					$model->PicId(-1);
					$model->PicState(1);
					$model->AddTime(Fram::Date());
					$model->PicAddress($FileName);
					$model->ProductId($ProductID);
					if(Bll_MorePic::Insert($model))
					{
						$address="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
						$str="<script>alert('上传成功');parent.window.DoView();self.location.href='{$address}'</script>";	
					}
					else 
					{
							$str="<script>alert('上传失败');</script>";
					}
					die($str);
				}
				else 
				{
					echo "文件内容为空";
				}
			}
			else 
			{
				echo "参数不正确";
			}

		}
		else
		{
			$this->render('cepic');
		}
		
	}
	
}
