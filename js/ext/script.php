<?php
	header("Expires:".gmdate("D, d M Y H:i:s", time()+15360000)."GMT"); 
	header("Cache-Control: max-age=315360000"); 
	$_fileName=basename($_GET['file']);
	 $lastmodified = filemtime($_fileName);
	header("Last-Modified:".gmdate("D, d M Y H:i:s", $lastmodified)."GMT");
	    // Send Etag hash
    $hash = "vodsp.com" ;//. '-' . md5($fn);
    $etag=$hash;
    //header('Etag:'.$etag,true,304); 
	header("Content-type: application/javascript"); 
    //header("Vary: Accept-Encoding");
    //header("Content-Length: ".strlen($content));
     if (strlen($_SERVER['HTTP_IF_MODIFIED_SINCE'])>5)
      { 
            header('Etag:'.$etag,true,304);
            exit; 
      } 
      else 
      {
      	  //header('Etag:'.$etag);
      	  if(strstr($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')>=0)
      	  {
      	  	header("Content-Encoding: gzip");
	      	$extName=explode(".",$_fileName);
			$extName=$extName[count($extName)-1];
			if($extName == "gz" || $extName == "yy")
	      		readfile($_fileName);
      	  }
	      else
	      {
	      	readfile(str_replace(".yy","",$_fileName));
	      }

      }
	
?>