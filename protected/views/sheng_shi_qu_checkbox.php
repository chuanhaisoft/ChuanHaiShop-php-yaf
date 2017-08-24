<script src="/js/xiala/js/comm.js"></script>
<script src="/js/xiala/js/linkagesel-min.js"></script>
<script type="text/javascript" src="/upload/cache/s_s_q_x.js"></script>

<div  id="sheng_checkbox_box">

</div>

<script type="text/javascript">
var checkbox_html = '';

for(key in s_s_q_x){
	checkbox_html +='<span class="sheng_checkbox_span" style="display:inline-block;"><input id="sheng_checkbox_'+ key +'" name="sheng_checkbox[]" type="checkbox" value="'+ key +'"> <label for="sheng_checkbox_'+ key +'">'+ s_s_q_x[key].name +'</span></label>';
}


$('#sheng_checkbox_box').html(checkbox_html);

$('.sheng_checkbox_span').live('click',function(){
// 	alert('123');
// 	$(this).find('input').click();
});

</script>


















