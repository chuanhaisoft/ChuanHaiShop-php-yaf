
<h1 class="logo fl" >
    <a href="<?php echo Pub\SysPara::site_url()?>"><?php echo Pub\SysPara::SiteName;?></a>
</h1>
<!--/ logo-->
<div style="color:red">
 <A href="http://demo.chuanhaisoft.com/chuanhai/" target="_blank">后台演示：http://demo.chuanhaisoft.com/chuanhai/</A> 用户名:admin  密码:chuanhaisoft  
<script type="text/javascript">
document.writeln("<a href=\'https://github.com/chuanhaisoft/ChuanHaiShop-php-yaf\' target=\'_blank\'>下载ChuanHaiShop</a>");
</script>
</div>
            <script>
			//indexbanner();
			function check_search(){
				if ($("#search_type").text() == '店铺')
				{
					$("#search_form").attr("action","<?php echo Pub\SysPara::site_url()?>shops.html");
				}
				return true;
			}
			</script>
 <div class="search_form fl">
     <form class="form" id="search_form" action="<?php echo Pub\SysPara::Pro_List_Url(0,1);?>" onsubmit="return check_search();" target="_blank">
					<div class="input_select_menu" style="">
			          <span class="select_item" id="search_type">商品</span>
			          <ul class="item_list" style="display: none;">
			            <li><a href="JavaScript:void(0);">商品</a></li>
			            <li style='display:none'><a href="JavaScript:void(0);">店铺</a></li>
			          </ul>
			        </div>
					<input type="text" class="sr" value="在这里搜索商品名称..." name="keyword" autocomplete="off" onfocus="this.className=' sr'; if(this.value!='在这里搜索商品名称...'){this.style.color='#404040';}else{this.value='';this.style.color='#404040'}" onblur="if(this.value==''){this.value='在这里搜索商品名称...';this.style.color='#b6b7b9';this.className='sr';}" onkeydown="this.style.color='#404040'" style="color: rgb(182, 183, 185);">
					<input type="submit" value="搜索" class="sub" />
				</form>
    </div>
    <!--/ search_form-->

    <script type="text/javascript">repselect("input_select_menu");</script>
    <div class="fl" style="padding-top: 20px;font-size: 14px;"> 
    &nbsp;&nbsp;
    <A href="javascript:return;">授权购买:</A>  
	<a target=blank href=http://wpa.qq.com/msgrd?V=3&uin=276556803&Site=川海软件&Menu=yes><img border="0" SRC=http://wpa.qq.com/pa?p=1:276556803:1 alt="点击这里给我发消息"></a><span style="color:red">&nbsp;&nbsp;vue版本:</span>

    </div> 
	 <img src="http://shop.chuanhaisoft.com/images/shows/scan.png" style="width:55px;">
 