<script type="text/javascript" src="/js/startScore.js"></script>
<style>
.block .star_score{ float:left;}
.star_list{height:21px;margin:50px; line-height:21px;}
.block p,.block .attitude{ padding-left:20px; line-height:21px; display:inline-block;}
.block p span{ color:#C00;}
.star_score { background:url(/images/stark2.png); width:160px; height:21px;  position:relative; }
.star_score a{ height:21px; display:block; text-indent:-999em; position:absolute;left:0;}
.star_score a:hover{ background:url(/images/stars1.png);left:0;}
.star_score a.clibg{ background:url(/images/stars1.png);left:0;}
#starttwo .star_score { background:url(/images/starky.png);}
#starttwo .star_score a:hover{ background:url(/images/starsy.png);left:0;}
#starttwo .star_score a.clibg{ background:url(/images/starsy.png);left:0;}
/*星星样式*/
.show_number{ padding-left:50px; padding-top:20px;}
.show_number li{ width:240px; border:1px solid #ccc; padding:10px; margin-right:5px; margin-bottom:20px;}
.atar_Show{background:url(/images/stark2.png); width:160px; height:21px;  position:relative; float:left; }
.atar_Show p{ background:url(/images/stars2.png);left:0; height:21px; width:134px;}
.show_number li span{ display:inline-block; line-height:21px;}
</style>



<div class="txtMore mt">
  <div class="tit">
    我有话说
  </div>
  <div class="con" style="display:block; max-height:none">


<div class='content'><div class='uibox-dp'><div class='cont'><ul class="clearfix">
<?php
$m=new Model\Discuss();
$Rows=\Bll\Discuss::GetList(1, 100,[$m->_MessId->w('=',$MessID),$m->_ModuleId->w_and('=',$ModuleID)]);
//print_r($Rows);
foreach ($Rows as $k=>$v)
{
    $m=new \Model\Discuss();
    Pub\SysFram::RowToModel($m, $v);
?>
          <li id="discuss_<?php echo $m->Id(); ?>">
            <dl>
              <dd class="clearfix"><span class="name"><?php echo $m->Mess(); ?></span> <span class="time"><?php echo $m->SendTime(); ?></span> </dd>

            </dl>
          </li>
<?php
}
?>

</ul></div></div></div>
<div style="padding-top:20px"></div>


<?php
$m=new Model\Discuss();
$m->ModuleId($ModuleID);
$m->MessId($MessID);
echo Form\Html::FormBegin($m);
?>
<table width="100%"  border="0" align="left" cellpadding="0" cellspacing="1" class="mytable"  id="mytable">
    <tr>
    <td colspan="2" align="center">
<div  style="padding-bottom:5px; width:90%" >
    <div id="startone"  class="block clearfix" >
          <div class="star_score"></div>
          <p style="float:left;"><span class="fenshu" id="fenshu"></span></p>
          <div class="attitude" style="display:none"></div>
    </div>
</div>
	</td>
  </tr>
     <tr>
    <td colspan="2">
      <div align="center"><?php echo Form\Html::Text($m->_Mess,null,['width'=>'90%','height'=>'120px']);?></div></td>
    </tr>
  <tr>
    <td><div align="right"> </div></td>
    <td><table width="98%" border="0" cellspacing="0">
        <tr>
          <td ><?php echo Form\Html::Hidden($m->_ModuleId).Form\Html::Hidden($m->_MessId).Form\Html::Hidden($m->_State);?></td>
          <td width="20%">
 <div style="padding-top:10px"></div>
<?php 
echo Form\Html::ButtonajaxSubmit(null,'发表评论','/discuss/do.html',null,['width'=>'100px','height'=>'30px'],'BeforeDo()');
?></td>
        </tr>
      </table></td>
  </tr>
</table>

<?php echo Form\Html::FormEnd();?>
</div>
<script>
     scoreFun($("#startone"))
     scoreFun($("#starttwo"),{
           fen_d:22,//每一个a的宽度
           ScoreGrade:5//a的个数 10或者
         })
function BeforeDo()
{
    SetDomValue('STATE',$("#fenshu").text());
}
</script>
<script>
    //显示分数
      $(".show_number li p").each(function(index, element) {
        var num=$(this).attr("tip");
        var www=num*2*16;//
        $(this).css("width",www);
        //$(this).parent(".atar_Show").siblings("span").text(num+"分");
    });
</script>







  </div>


<div style="padding-top:50px">&nbsp;</div>


<script type="text/javascript">
GetAjax('/user2/Viewcount.html?source='+GetQueryString('source')+'&t='+Date.parse(new Date()),{moduleid:"<?php echo $ModuleID; ?>",id:"<?php echo $MessID; ?>"});
</script>