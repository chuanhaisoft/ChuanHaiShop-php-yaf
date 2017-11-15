<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
<script type="text/javascript" src="/js/jQuery.js"></script>
<script type="text/javascript" src="/js/layui/layui.js"></script>
<link href="/js/layui/css/layui.css" rel="stylesheet" type="text/css" />
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
	<form style="margin:50px; text-align:center;">
		<div id="queue"></div>
        <button type="button" class="layui-btn layui-btn-danger" id="chuanhai_upload">
          <i class="layui-icon">&#xe67c;</i>上传图片
        </button>
	</form>
<script type="text/javascript">
layui.use('upload', function(){
  var upload = layui.upload;
   
  //执行实例
  var uploadInst = upload.render({
    elem: '#chuanhai_upload' //绑定元素
    ,url: '<?php echo $UpUrl; ?>' //上传接口
    ,field:'Filedata'
    ,size:500
    ,data:{return_type:'json'}
    ,done: function(res){
    	 parent.window.SetValueByID('<?php echo $_GET['name'] ?>',res.file_url);
    	 parent.window.ExtWindowClose(escape(window.location.pathname+window.location.search));
    }
    ,error: function(){//alert('error');
      //请求异常回调
    }
  });
});
</script>

</body>
</html>