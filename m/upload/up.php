<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
<script type="text/javascript" src="/js/jQuery.js"></script>
<script src="jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="uploadify.css">
<style type="text/css">
body {
	font: 13px Arial, Helvetica, Sans-serif;
}
</style>
</head>

<body>
<?php 
function GetNumValue($key,$value=-1,$IsToUTF8=false,$IsUrlEnCode=false,$IsUrlDeCode=false)
{
		$tdata = null;
		if(isset($_GET[$key]))
		    $tdata = $_GET[$key];
		if(!isset($tdata) && isset($_REQUEST[$key]))
		 	$tdata=$_REQUEST[$key];
		if(isset($value) && !isset($tdata))
		 	$tdata=$value;

		return $tdata;
}
    $PicType=GetNumValue('pic_type',0);
    $UserID=GetNumValue('user_id',-1);
    $UpUrl="/system/upload/file/";
    $UpUrl=$UpUrl.'?pic_type='.$PicType;
?>
	<form style="margin:50px; text-align:center; padding-left:30px;">
		<div id="queue"></div>
		<input id="file_upload" name="file_upload" type="file" multiple="true">
	</form>

	<script type="text/javascript">
		<?php $timestamp = time();?>
	
 
		$(function() {
		

			$('#file_upload').uploadify({
				'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'user_id'   : '<?php echo $UserID;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},
				'swf'      : 'uploadify.swf',
				'fileTypeDesc' : 'Image Files',//只允许上传图像
				'fileTypeExts' : '*.gif; *.jpg; *.png; *.jpeg;*.zip;*.rar;',//限制允许上传的图片后缀
				'fileSizeLimit' : '500KB',//限制上传的图片不得超过200KB 
				'overrideEvents': ["onSelectError","onDialogClose"],
				'onSelectError':function(file, errorCode, errorMsg){
            switch(errorCode) {
                case -100:
                    alert("上传的文件数量已经超出！");
                    break;
                case -110:
                    alert("文件 ["+file.name+"] 大小超出系统限制的500KB大小！");
                    break;
                case -120:
                    alert("文件 ["+file.name+"] 大小异常！");
                    break;
                case -130:
                    alert("文件 ["+file.name+"] 类型不正确！");
                    break;
            }
        },
				'onUploadSuccess' : function(file, data, response) {
            //alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
			 parent.window.SetValueByID('<?php echo $_GET['name'] ?>',data);
			 parent.window.ExtWindowClose(escape(window.location.pathname+window.location.search));
        },
		

				'uploader' : '<?php echo $UpUrl; ?>'
			});
			
$('#file_upload').uploadify('settings','buttonText','点击选择文件');
			
		});
		
	</script>
</body>
</html>