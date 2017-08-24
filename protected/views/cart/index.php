<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="Keywords" content="" />
<meta name="Description" content="" />
<title>订单列表-<?php echo Pub\SysPara::SiteName; ?></title>
<link href="/css/layout.css" rel="stylesheet" type="text/css" />
<link href="/css/assist.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/layer/layer.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
</head>
<body>
    <div id="s-header">
        <div class="hbox">
            <div class="logo-box clearfix"> <a href="/"  class="logo"><?php echo Pub\SysPara::SiteName; ?></a>
                <h1 class="page-title">确认订单</h1> </div>
            <div class="m-step"> <span class="bg"></span>
                <ul class="clearfix">
                    <li class="step step-1 active">
                        <div class="txt">购物车</div>
                    </li>
                    <li class="step step-2">
                        <div class="txt">确认订单</div>
                    </li>
                    <li class="step step-3 ">
                        <div class="txt">在线支付</div>
                    </li>
                    <li class="step step-4 ">
                        <div class="txt">完成</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/ s-header-->
    <div class="layout-cont-w1000">
        <div class="shop-confirm">
            <h3 class="shop-title1"><strong>确认商品信息</strong></h3>
            <div class="m-cartbox">
                <div class="head clearfix">
                    <div class="col col1">
                        <input type="checkbox" class="u-chk" name="selectAll" id="selectAll" checked="checked">
                        <label for="selectAll" class="lab">全选</label>
                    </div>
                    <div class="col col2">商品信息</div>
                    <div class="col col3">单价(元)</div>
                    <div class="col col4">数量</div>
                    <div class="col col5">金额(元)</div>
                    <div class="col col6">操作</div>
                </div>
                <!-- /head -->
                <div class="m-cart">
                    <div class="goods">
                        <ul class="m-goods">
    						<?php foreach ($all_pro as $k=>$v) :?>
    						<li class="gooditm z-selected">
    							<div class="col col0">
    								<input type="checkbox" class="u-chk" name="pro[<?php echo $k; ?>][id]" checked="checked" value="<?php echo $v['ID']; ?>">
    								<input type="hidden" name="pro[<?php echo $k; ?>][typeid]" value="<?php echo $v['type']['ID'];?>">
                                    <input type="hidden" name="pro_mess_<?php echo $v['type']['ID'];?>" value="test">
    							</div>
    							<div class="col col2">
    								<a href="<?php echo Pub\SysPara::Pro_Detail_Url(array('id'=>$v['ID']));?>" target="_blank" class="imgwrap"><img src="<?php echo Pub\SysPara::Img_Url($v['PIC']); ?>" width="50" height="50"></a>
    								<div class="txtwrap">
    									<h3 class="goodtlt">
    										<a href="<?php echo Pub\SysPara::Pro_Detail_Url(array('id'=>$v['ID']));?>" target="_blank"><?php echo $v['NAME']?></a>
    									</h3>
    									<p class="goodtax"><?php echo $v['type']['NAME'];?></p>
    								</div>
    							</div>
    							<div class="col col3">
    								<del class="oldprice"><?php echo $v['SHI_CHANG_PRICE']?></del>
    								<span class="newprice"><?php echo $v['type']['PRICE']?></span>
    							</div>
    							<div class="col col4">
    								<span class="u-setcount"> <span class="minus" onclick="numDec($(this).next('input'))">-</span>
    								<input type="text" name="pro[<?php echo $k; ?>][num]" class="ipt" value="<?php echo $v['num']?>" max="34">
    								<span class="plus" onclick="numAdd($(this).prev('input'))">+</span></span>
    							</div>
    							<div class="col col5">
    								<span class="sum"><?php printf("%.2f",$v['type']['PRICE'] * $v['num']);?></span>
    							</div>
    							<div class="col col6">
    								<a href="<?php echo Pub\SysPara::site_url().'cart/delete?key='.$v['cart_key']?>" class="u-remove">删除</a>
    							</div>
    						</li>
    						<?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- /goods -->
                </div>
                <!--/m-cart  -->
            </div>
            <?php if ($UserId): ?>
            <h3 class="shop-title1"><strong>选择收货地址</strong></h3>
            <div class="adrwarp-box clearfix">
                <?php foreach ($addresses as $address) :?>
                <?php	if ($address['ISDEFAULT']) :?>
                <label class="adrwrap" id="address_<?php echo $address['ID'];?>">
                    <div class="cbox checked">
                        <input type="radio" name="address_id" data-sheng="<?php echo $address['SHENG']; ?>" value="<?php echo $address['ID'];?>" style="display:none" checked="checked" onclick="choose($(this))">
                        <p class="receiver">
                            <strong><?php echo $address['USER_NAME'];?>&nbsp;&nbsp;收</strong>
                            <b class="default">默认地址</b>
                        </p>
                        <p class="tel"><?php echo $address['USER_TEL'];?></p>
                        <p class="addresstext">
                            <?php echo $address['ADDRESS'];?>
                        </p>
                        <p class="opp">
                            <a class="mod" href="javascript:address_edit(<?php echo $address['ID'];?>)">修改</a>
                            <a class="del" href="javascript:address_delete(<?php echo $address['ID'];?>)">删除</a>
                        </p>
                    </div>
                </label>
                <?php else: ?>
                <label class="adrwrap" id="address_<?php echo $address['ID'];?>">
                    <div class="cbox">
                        <input type="radio" name="address_id" data-sheng="<?php echo $address['SHENG']; ?>" value="<?php echo $address['ID'];?>" style="display:none" onclick="choose($(this))">
                        <p class="receiver">
                            <strong><?php echo $address['USER_NAME'];?>&nbsp;&nbsp;收</strong>
                            <b class="default"></b>
                        </p>
                        <p class="tel"><?php echo $address['USER_TEL'];?></p>
                        <p class="addresstext">
                            <?php echo $address['ADDRESS'];?>
                        </p>
                        <p class="opp">
                            <a class="mod" href="javascript:address_edit(<?php echo $address['ID'];?>)">修改</a>
                            <a class="del" href="javascript:address_delete(<?php echo $address['ID'];?>)">删除</a>
                        </p>
                    </div>
                </label>
                <?php endif; ?>
                <!-- / adrwrap-->
                <?php endforeach; ?>
            </div>
            <!--/adrwarp-box -->
            <div class="addNewAddr-box"> <span class="addNewAddr">+新增收货地址</span> </div>
            <?php endif; ?>
           
            <!--/coupon  -->
            <div class="oshowcon clearfix mb20">
                <div class="submitwrap">
                    <div class="itemamount clearfix">
                        <div class="settlementamount clearfix">
                            <p><em class="amount" id="countprice">¥<?php printf("%.2f",$total['countprice']);?></em></p>
                            <p><em class="amount" id="yun_fei">¥<?php printf("%.2f",$total['yun_fei']);?></em></p>
                            <p><em class="amount" id="hui_dian"><?php echo $total['hui_dian'];?></em></p>
                     
                            <!-- <p><em class="amount" id="point"><?php echo $total['point'];?></em></p> -->
                            
                            <p class="totalprice"><em class="amount"><span rel="<?php printf("%.2f",$total['totalprice']);?>" id="totalprice">¥<?php printf("%.2f",$total['totalprice']);?></span></em></p>
                        </div>
                        <div class="settlementitem clearfix">
                            <p><em class="tit">商品应付总计：</em></p>
                            <p><em class="tit">运费：</em> </p>
                            <p><em class="tit">可积分抵扣：</em> </p>
                            
                            <!-- <p><em class="tit">获取积分：</em> </p> -->
                            <p><em class="tit">应付金额：</em></p>
                        </div>
                    </div>
                    <div class="submitandtip clearfix"> <a class="oorgbtn" href="javascript:pay()" >提交订单</a> </div>
                    <p class="addr" id="addrinfo"><?php if (!empty($default_address)) echo $default_address['USER_NAME']." 收&#12288;".($default_address['SHENG_NAME'] == $default_address['SHI_NAME'] ? '' : $default_address['SHENG_NAME']).$default_address['SHI_NAME'].$default_address['QU_NAME'].$default_address['ADDRESS']."&#12288;电话 ".$default_address['USER_TEL']; ?></p>
                </div>
            </div>
            <!-- /oshowcon -->
        </div>
        <!-- /shop-confirm -->
    </div>
    <!-- / layout-cont-w1000-->
    <?php \Pub\Yaf::display('footer'); ?>
<script>
$(function() {
	$("li.gooditm input[type=text]").keyup(function() {
        $(this).parents("li.gooditm").find("input[type=checkbox]").attr("checked",true);
		total();
	})
	$(".m-cart").find("input[type=checkbox]").click(function() {
		total();
	})
    $("#selectAll").click(function(){
    	var checked = $(this).attr('checked') ? true : false;
    	$(".m-cart").find("input[type='checkbox']").attr('checked',checked);
        total();
    })
    $(".addNewAddr").click(function() {
        address_add();
    })
    $(".adrwarp-box").find("input").click(function(){
    })
    
})
function numAdd(obj) {
	var num_add = parseInt(obj.val()) + 1;
	if (obj.val() == "") {
		num_add = 1
	}
	obj.val(num_add);
    obj.parents("li.gooditm").find("input[type=checkbox]").attr("checked",true);
	total();
}
function numDec(obj) {
	var num_dec = parseInt(obj.val()) - 1;
	if (num_dec < 1) {
		layer.alert("数量不能小于1")
	} else {
		obj.val(num_dec);
	}
    obj.parents("li.gooditm").find("input[type=checkbox]").attr("checked",true);
	total();
}
function choose(a)
{
    $(".adrwarp-box").find("input").each(function(){
        $(this).parent().removeClass("checked");
    })
    a.parent().addClass("checked");
    var address = address_get(a.val());
    $("#addrinfo").html(address.USER_NAME+" 收&#12288;"+(address.SHENG_NAME == address.SHI_NAME ? '' : address.SHENG_NAME)+address.SHI_NAME+address.QU_NAME+address.ADDRESS+"&#12288;电话 "+address.USER_TEL);
    total();
}
function total()
{
    var address_id = $('input[name=address_id]:checked').val();
    var pros = new Array();
    $("ul.m-goods").find("input[type=checkbox]:checked").parents("li.gooditm").each(function(i){
        pros[i] = {
            id:$(this).find("input[type=checkbox]").val(),
            typeid:$(this).find("input[type=hidden]").val(),
            count:$(this).find("input[type=text]").val(),
        };
    });
    $.ajax({
        type: "POST",
        url: "/cart/total.html",
        data: {address_id:address_id,pros:pros},
        dataType: "json",
        success: function(data){
            if (data.error) {
                layer.alert(data.mess);
            } else {
                $("#countprice").html('¥'+data.total.countprice);
                $("#yun_fei").html('¥'+data.total.yun_fei);
                $("#hui_dian").html(data.total.hui_dian);
                //$("#mprice").html('¥'+data.total.mprice);
                //$("#cashprice").html('¥'+data.total.cashprice);
                $("#point").html(data.total.point);
                $("#totalprice").html('¥'+data.total.totalprice);
                $.each(data.pros,function(i,v){
                    var li = $("ul.m-goods").find("input[value="+v.typeid+"]").parents("li.gooditm");
                    li.find("span.sum").text(v.countprice);
                })
            }
        }
    })
}
function open_layer_form(title)
{
    layer.open({
        type : 2,
        title : title,
        closeBtn : 1,
        shift : 2,
        area : [ '750px', '600px' ],
        shadeClose : true,
        content : ['/address/add.html', 'no']
    });
}
function open_layer_form_edit(title,id)
{
    layer.open({
        type : 2,
        title : title,
        closeBtn : 1,
        shift : 2,
        area : [ '750px', '600px' ],
        shadeClose : true,
        content : ['/address/add.html?id='+id, 'no']
    });
}
function close_layer_from()
{
    layer.closeAll();
}
function address_add()
{
    open_layer_form('新增收货地址');
}
function address_edit(id)
{
    open_layer_form_edit('修改收货地址',id);
}
function address_get(id){
    var result;
    $.ajax({
        type: "GET",
        async: false,
        url: "/address/get.html",
        data: {id:id},
        dataType: "json",
        success: function(data){
            if (data.error == 1) {
                layer.alert(data.mess);
            } else {
                result = data.data;
            }
        }
    });
    return result;
}
function address_delete(id)
{
	layer.confirm('确定删除么？', {
		  btn: ['确 定','取 消']
		}, function(){
			do_delete(id);
		}, function(){
		  
		});
}
function do_delete(id)
{
    $.ajax({
        type:"GET",
        url: "<?php echo Pub\SysPara::site_url('address/delete.html');?>",
        data: {id:id},
        dataType: "json",
        success: function(data){
            layer.alert(data.mess, function(index){
                if (data.error == 0) {
                    $('#address_'+id).remove();
                }
                layer.close(index);
            });
        }
    })
}

function setdefault(address_id) {
    $("b.default").each(function(){
        var thisid = $(this).parents("div.cbox").children("input[name=address_id]").val();
        if (thisid == address_id) {
            var html = '默认地址';
        } else {
            var html = '';
        }
        $(this).html(html);
    })
}
function get_address_children(pid, defaultid){
    var result = '<option value="">请选择</option>';
    $.ajax({
        type: "GET",
        async: false,
        url: "<?php echo Pub\SysPara::site_url('address/children.html');?>",
        data: {pid:pid},
        dataType: "json",
        success: function(data){
            $.each(data, function(name,value){
                selected = (value.ID == defaultid) ? 'selected' : '';
                result += '<option value="'+value.ID+'" '+selected+'>'+value.NAME+'</option>';
            })
        }
    });
    return result;
}
function pay()
{
    if (<?php echo $UserId ? $UserId : 0; ?> == 0) 
    {
        layer.alert('请登录', function (index) {
            window.location.href = "<?php echo Pub\SysPara::site_url('member/login.html');?>";
            layer.close(index);
        });
        return false;
    }
    var pros = new Array();
    $("ul.m-goods").find("input[type=checkbox]:checked").parents("li.gooditm").each(function(i){
        pros[i] = {
            id:$(this).find("input[type=checkbox]").val(),
            typeid:$(this).find("input[type=hidden]").val(),
            count:$(this).find("input[type=text]").val(),
        };
    });
    $.ajax({
        type: "POST",
        url: "<?php echo Pub\SysPara::site_url('cart/pay.html');?>",
        data: {
            address_id:$('input[name=address_id]:checked').val(),
            data:pros
        },
        dataType: "json",
        success: function(data){
            if (data.error==0) {
                layer.open({
                    type: 2,
                    //skin: 'layui-layer-lan',
                    title: '在线支付',
                    fix: true,
                    area: ['1000px', '500px'],
                    shadeClose: true,
                    content: data.next_url,
					end: function(index, layero)
					{
						location.href='/order/list.html';
					}
                });
            } else {
                layer.alert(data.mess);
            }
        }
    });
}
</script>
</body>

</html>
