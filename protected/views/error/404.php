4041
<br/>
<?php 
echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
echo '<br/>';
echo \Pub\Fram::Date();
?>