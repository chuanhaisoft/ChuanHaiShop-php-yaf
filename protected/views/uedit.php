    <script id="container" name="content" type="text/plain"><?php echo $content; ?></script>
    <!-- 配置文件 -->
    <script type="text/javascript" src="/js/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/js/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
    //document.domain="huiup.cn";
        var editor = new UE.ui.Editor({initialFrameHeight:250 });  
        editor.render("container");  
    </script>