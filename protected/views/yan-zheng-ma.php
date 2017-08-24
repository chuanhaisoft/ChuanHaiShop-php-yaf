<?php 
    if(!isset($w)){$w='';}else{$w=" width='{$w}'";}
    if(!isset($h)){$h='';}else{$h=" height='{$h}'";}
?>
<img src="/user/Imagecode.html"<?php echo $w.$h; ?> style="vertical-align:middle;cursor:pointer;" onclick="this.src='/user/Imagecode.html?d='+Math.random();" />