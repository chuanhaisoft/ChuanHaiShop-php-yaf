<style type="text/css">
#allmap {width: 100%;height: 300px;overflow: hidden;margin:0;}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=3MYQsShElyBnlO37RVDMRde5"></script>
<script type="text/javascript">
<!--
if(''=='1'){
	if(''!='')document.domain = '';
}else{
/**
	window.onerror=function (){
		url = 'http://seller1.huiup.cn/servicer/job.php?job=ggmap_position&position=117.127599,39.086993&mapid=mapid&city_id=';
		url +=url.indexOf('?')>0?'&':'?';
		if(''!='')window.location.href=url+'showDomain=1';
		return true;
	};
	obj = (self==top) ? window.opener : window.parent ;
	obj.document.body;
	**/
}
//-->
</script>
<div id="allmap"></div>

<script type="text/javascript">
// 百度地图API功能 113.220243, 28.181133
var map = new BMap.Map("allmap");            // 创建Map实例
var point,marker;
var lng="<?php echo isset($x)?$x:'' ?>",lat="<?php echo isset($y)?$y:'' ?>";
if (lng!="" && lat!=""){
	map.centerAndZoom(new BMap.Point(lng, lat), 12);
	set_marker();
}else{
	map.centerAndZoom("<?php echo isset($city)?$city:'北京' ?>",12);                   // 初始化地图,设置城市和地图级别。
}

var gc = new BMap.Geocoder();

map.enableScrollWheelZoom();    //启用滚轮放大缩小，默认禁用
map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用
map.addControl(new BMap.NavigationControl());  //添加默认缩放平移控件
map.addControl(new BMap.NavigationControl({anchor: BMAP_ANCHOR_TOP_RIGHT, type: BMAP_NAVIGATION_CONTROL_SMALL}));  //右上角，仅包含平移和缩放按钮
map.addControl(new BMap.NavigationControl({anchor: BMAP_ANCHOR_BOTTOM_LEFT, type: BMAP_NAVIGATION_CONTROL_PAN}));  //左下角，仅包含平移按钮
map.addControl(new BMap.NavigationControl({anchor: BMAP_ANCHOR_BOTTOM_RIGHT, type: BMAP_NAVIGATION_CONTROL_ZOOM}));  //右下角，仅包含缩放按钮



map.addEventListener("click",function(e){

	check_error_point(e);	//检查位置是否有误！

	map.removeOverlay(marker);	//移除旧坐标
	lng=e.point.lng;
	lat=e.point.lat;
	set_marker();
});


function postpoint(){
	 if(confirm("你确认选择当前位置吗?")){
		 parent.window.SaveMap(lng+','+lat);
		 parent.window.ExtWindowClose(escape(window.location.pathname+window.location.search));
	 }else{
	 }
}

function set_marker(){
	marker = new BMap.Marker( new BMap.Point(lng, lat) );  // 创建标注
	marker.addEventListener("click", function(){    
		postpoint();	//提交得到的坐标
	});
	marker.enableDragging();    
	marker.addEventListener("dragend", function(e){
		lng=e.point.lng;
		lat=e.point.lat;
		postpoint();	//提交得到的坐标
	})
	map.addOverlay(marker);              // 将标注添加到地图中
	//marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
}

function check_error_point(e){
    gc.getLocation(e.point, function(rs){
        var addComp = rs.addressComponents;
        //alert(addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber);
		if(addComp.province==""){
			if( confirm("当前位置有误，是否重新定向到你所在地区！") ){
				var myCity = new BMap.LocalCity();
				myCity.get(function(result){
					var cityName = result.name;
					map.centerAndZoom(cityName,12);
				});
			}			
		}
    });
}
</script>
