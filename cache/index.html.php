<?php /* Smarty version 2.6.26, created on 2018-09-11 12:17:50
         compiled from index.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>首页</title>

<!--<base href="http://192.168.1.108/Mapbackstage/"></base>-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script  type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=ycTgY5YTSnk5PsqumqZboxtXaKU6Io6K"></script>
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://localhost/Mapbackstage/theme/default/js/distpicker.data.js"></script>
<script src="http://localhost/Mapbackstage/theme/default/js/distpicker.js"></script>

<link href="http://localhost/Mapbackstage/theme/<?php echo $this->_tpl_vars['theme_name']; ?>
/style/main.css" rel="stylesheet" type="text/css" />
<link href="http://localhost/Mapbackstage/theme/<?php echo $this->_tpl_vars['theme_name']; ?>
/style/bootstrap.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.bootcss.com/html2canvas/0.4.1/html2canvas.js"></script> 
<script src="http://localhost/Mapbackstage/theme/default/js/DistanceTool.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/library/MarkerTool/1.2/src/MarkerTool_min.js"></script>

<!--加载鼠标绘制工具   画折线需要 -->
<script type="text/javascript" src="http://api.map.baidu.com/library/DrawingManager/1.4/src/DrawingManager_min.js"></script>
<link rel="stylesheet" href="http://api.map.baidu.com/library/DrawingManager/1.4/src/DrawingManager_min.css" />
<!--加载检索信息窗口-->
<script type="text/javascript" src="http://api.map.baidu.com/library/SearchInfoWindow/1.4/src/SearchInfoWindow_min.js"></script>
<link rel="stylesheet" href="http://api.map.baidu.com/library/SearchInfoWindow/1.4/src/SearchInfoWindow_min.css" />

<style type="text/css">
<?php echo '

    '; ?>


  </style>
</head>
<body>

<div class="main" id="main" style="width:100%;height:1000px;">
	<!-- 上部 -->
	<div class="top" id="top" style="width:100%;height:60px;">
	

	  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'top.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
	
	</div>
	<!-- left -->
	<div class="left" id="left" style="float:left; width:16%;">
	  			

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'left.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>			
	  			
	  			
	</div>
	 <div id="divS" class="gf_s" style="float: left;"></div>
     <div id="divSG" class="gf_s_g" style="float: left;"></div>
	<script>
	<?php echo '
	$(function(){
		

		
	});
	'; ?>

	</script>
	<!-- main right -->
	<div class="right" id="right" style="float:left; width:83%;">
	
		<div id="l-map" style="width:100%;" ></div> 
		
		<!-- <div id="load-map">
		<iframe src="http://map.baidu.com/?l=&s=s%26wd%3D%E5%85%A8%E5%9B%BD"  style="width:100%;height:100%;border:0;"></iframe>
		</div>
		-->
	</div>

</div>

	<div style="display:none"> 
	<form id="formid"  name= "myform" method = 'post'  action = 'index.php?act=jietu'  >  
	  <input name="img" type="hidden" id="imgs">  
      <a href="javascript:;" onclick='$("#formid").submit()' rel="external nofollow" class="btn" style="width:150px;" id="toserver">保存图片到服务器</a>	 
	</form> 

	  
    </div>
    

</body>
</html>
<script type="text/javascript">
var baidu_coordinate='<?php echo $this->_tpl_vars['baidu_coordinate']; ?>
'; 
var all_store='<?php echo $this->_tpl_vars['all_store']; ?>
'; 
var count_store='<?php echo $this->_tpl_vars['pager']['record_count']; ?>
';
var money_all='<?php echo $this->_tpl_vars['money_all']; ?>
'; 
<?php echo '

	// 百度地图API功能
	function G(id) {
		return document.getElementById(id);
	}

	var map = new BMap.Map("l-map");
	map.centerAndZoom("武汉",5);                   // 初始化地图,设置城市和地图级别。
	map.enableAutoResize();
	
	 //去除路网
  
	 map.setMapStyle({
            styleJson:[
              {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": {
                                  "color": "#ffffff",
                                  "visibility": "off"
                        }
              }
        ]
    });
	 
	
	
	
    //向地图中添加缩放控件  
    var ctrlNav = new window.BMap.NavigationControl({  
        anchor: BMAP_ANCHOR_TOP_LEFT,  
        type: BMAP_NAVIGATION_CONTROL_LARGE  
    });  
    map.addControl(ctrlNav);  

    //向地图中添加缩略图控件  
    var ctrlOve = new window.BMap.OverviewMapControl({  
        anchor: BMAP_ANCHOR_BOTTOM_RIGHT,  
        isOpen: 1  
    });  
    map.addControl(ctrlOve);  

/*     //向地图中添加比例尺控件  
    var ctrlSca = new window.BMap.ScaleControl({  
        anchor: BMAP_ANCHOR_BOTTOM_LEFT  
    });  
    map.addControl(ctrlSca);  */
    //向地图中添加比例尺控件  
	var top_left_control = new BMap.ScaleControl({anchor: BMAP_ANCHOR_TOP_LEFT});// 左上角，添加比例尺
	setTimeout(function(){
		map.addControl(top_left_control);
	}, 5000)
	
	
	// 覆盖区域图层测试
	//map.addTileLayer(new BMap.PanoramaCoverageLayer());

	//var stCtrl = new BMap.PanoramaControl(); //构造全景控件
	//stCtrl.setOffset(new BMap.Size(20, 20));
	//map.addControl(stCtrl);//添加全景控件
    
    
	//测距
	var myDis = new BMapLib.DistanceTool(map);
	myDis.addEventListener("addpoint", function(e) {
		console.log("addpoint");
		console.log(e.point);
		console.log(e.pixel);
		console.log(e.index);
		console.log(e.distance);
	});
	myDis.addEventListener("removepolyline", function(e) {
		console.log("removepolyline");
		console.log(e);
	});
	// 定位当前位置
	/*
	var map = new BMap.Map("l-map");
	var point = new BMap.Point(116.331398,39.897445);
	map.centerAndZoom(point,16);
	

	var geolocation = new BMap.Geolocation();
	geolocation.getCurrentPosition
	(function(r){
		if(this.getStatus() == BMAP_STATUS_SUCCESS){
			var mk = new BMap.Marker(r.point);
			map.addOverlay(mk);
			map.panTo(r.point);
			//alert(\'您的位置：\'+r.point.lng+\',\'+r.point.lat);
		}
		else {
			alert(\'failed\'+this.getStatus());
		}        
	},{enableHighAccuracy: true})
	*/
	//关于状态码
	//BMAP_STATUS_SUCCESS	检索成功。对应数值“0”。
	//BMAP_STATUS_CITY_LIST	城市列表。对应数值“1”。
	//BMAP_STATUS_UNKNOWN_LOCATION	位置结果未知。对应数值“2”。
	//BMAP_STATUS_UNKNOWN_ROUTE	导航结果未知。对应数值“3”。
	//BMAP_STATUS_INVALID_KEY	非法密钥。对应数值“4”。
	//BMAP_STATUS_INVALID_REQUEST	非法请求。对应数值“5”。
	//BMAP_STATUS_PERMISSION_DENIED	没有权限。对应数值“6”。(自 1.1 新增)
	//BMAP_STATUS_SERVICE_UNAVAILABLE	服务不可用。对应数值“7”。(自 1.1 新增)
	//BMAP_STATUS_TIMEOUT	超时。对应数值“8”。(自 1.1 新增)
	
	
	/*** 搜索自动显示百度的
	var ac = new BMap.Autocomplete(    //建立一个自动完成的对象
		{"input" : "suggestId"
		,"location" : map
	});

	ac.addEventListener("onhighlight", function(e) {  //鼠标放在下拉列表上的事件
	var str = "";
		var _value = e.fromitem.value;
		var value = "";
		if (e.fromitem.index > -1) {
			value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
		}    
		str = "FromItem<br />index = " + e.fromitem.index + "<br />value = " + value;
		
		value = "";
		if (e.toitem.index > -1) {
			_value = e.toitem.value;
			value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
		}    
		str += "<br />ToItem<br />index = " + e.toitem.index + "<br />value = " + value;
		G("searchResultPanel").innerHTML = str;
	});

	var myValue;
	ac.addEventListener("onconfirm", function(e) {    //鼠标点击下拉列表后的事件
	var _value = e.item.value;
		myValue = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
		G("searchResultPanel").innerHTML ="onconfirm<br />index = " + e.item.index + "<br />myValue = " + myValue;
		
		setPlace();
	});
	
	*/
	
	//单击获取点击的经纬度  5公里画圆
	
	 //以点击为中心点画圆
		/*
		var mOption = {
			poiRadius : 500,           //半径为1000米内的POI,默认100米
			numPois : 2                //列举出50个POI,默认10个
		}
		
		var myGeo = new BMap.Geocoder();        //创建地址解析实例
		function displayPOI(mPoint){
			map.addOverlay(new BMap.Circle(mPoint,500));        //添加一个圆形覆盖物
			myGeo.getLocation(mPoint,
				function mCallback(rs){
					var allPois = rs.surroundingPois;       //获取全部POI（该点半径为100米内有6个POI点）
					for(i=0;i<allPois.length;++i){
						document.getElementById("panel").innerHTML += "<p style=\'font-size:12px;\'>" + (i+1) + "、" + allPois[i].title + ",地址:" + allPois[i].address + "</p>";
						map.addOverlay(new BMap.Marker(allPois[i].point));                
					}
				},mOption
			);
		}
		*/

		//拼接infowindow内容字串
		var html = [];
		html.push(\'<span style="font-size:12px">属性信息: </span><br/>\');
		html.push(\'<table border="0" cellpadding="1" cellspacing="1" >\');
		html.push(\'  <tr>\'); 
		html.push(\'      <td align="left" class="common">名 称：</td>\');
		html.push(\'      <td colspan="2"><input type="text" maxlength="50" size="18"  id="txtName"></td>\');
		html.push(\'	     <td valign="top"><span class="star">*</span></td>\');
		html.push(\'  </tr>\');
		html.push(\'  <tr>\');
		html.push(\'      <td  align="left" class="common">电 话：</td>\');
		html.push(\'      <td colspan="2"><input type="text" maxlength="30" size="18"  id="txtTel"></td>\');
		html.push(\'	     <td valign="top"><span class="star">*</span></td>\');
		html.push(\'  </tr>\');
		html.push(\'  <tr>\');
		html.push(\'      <td  align="left" class="common">地 址：</td>\');
		html.push(\'      <td  colspan="2"><input type="text" maxlength="50" size="18"  id="txtAddr"></td>\');
		html.push(\'	     <td valign="top"><span class="star">*</span></td>\');
		html.push(\'  </tr>\');
		html.push(\'  <tr>\');
		html.push(\'      <td align="left" class="common">描 述：</td>\');
		html.push(\'      <td colspan="2"><textarea rows="2" cols="15"  id="areaDesc"></textarea></td>\');
		html.push(\'	     <td valign="top"></td>\');
		html.push(\'  </tr>\');
		html.push(\'  <tr>\');
		html.push(\'	     <td  align="center" colspan="3">\');
		html.push(\'          <input type="button" name="btnOK"  onclick="fnOK()" value="确定">&nbsp;&nbsp;\');
		html.push(\'		     <input type="button" name="btnClear" onclick="fnClear();" value="重填">\');
		html.push(\'	     </td>\');
		html.push(\'  </tr>\');
		html.push(\'</table>\');
		
		var infoWin = new BMap.InfoWindow(html.join(""), {offset: new BMap.Size(0, -10)});
		var curMkr = null; // 记录当前添加的Mkr
		var mkrTool = new BMapLib.MarkerTool(map, {autoClose: true, followText: "添加标注"}); //false 连续标注
		mkrTool.addEventListener("markend", function(evt){ 
		    var mkr = evt.marker;
		    mkr.openInfoWindow(infoWin);
		    curMkr = mkr;
		   // console.log(curMkr);
		});
		
		
		
/******折线*****************/
		
		
	var overlays = [];
	var overlaycomplete = function(e){
        overlays.push(e.overlay);
    };
    var styleOptions = {
        strokeColor:"red",    //边线颜色。
        fillColor:"red",      //填充颜色。当参数为空时，圆形将没有填充效果。
        strokeWeight: 3,       //边线的宽度，以像素为单位。
        strokeOpacity: 0.8,	   //边线透明度，取值范围0 - 1。
        fillOpacity: 0.6,      //填充的透明度，取值范围0 - 1。
        strokeStyle: \'solid\' //边线的样式，solid或dashed。
    }
    //实例化鼠标绘制工具
    var drawingManager = new BMapLib.DrawingManager(map, {
        isOpen: false, //是否开启绘制模式
        enableDrawingTool: false, //是否显示工具栏
		enableCalculate: false,  //绘制是否进行测距(画线时候)、测面(画圆、多边形、矩形)
        drawingToolOptions: {
            anchor: BMAP_ANCHOR_TOP_RIGHT, //位置
            offset: new BMap.Size(5, 5), //偏离值
        },
        circleOptions: styleOptions, //圆的样式
        polylineOptions: styleOptions, //线的样式
        polygonOptions: styleOptions, //多边形的样式
        rectangleOptions: styleOptions //矩形的样式
    });  
	 //添加鼠标绘制工具监听事件，用于获取绘制结果
    drawingManager.addEventListener(\'overlaycomplete\', overlaycomplete);
  //清除绘图
   function clearAll() {
	for(var i = 0; i < overlays.length; i++){
           map.removeOverlay(overlays[i]);
       }
       overlays.length = 0   
   }
//开启折线绘图
function Polyline(){
		   
			drawingManager.open();
			/*BMAP_DRAWING_MARKER 画点 
			BMAP_DRAWING_CIRCLE 画圆 
			BMAP_DRAWING_POLYLINE 画线 
			BMAP_DRAWING_POLYGON 画多边形 
			BMAP_DRAWING_RECTANGLE 画矩形*/
			drawingManager.setDrawingMode(BMAP_DRAWING_POLYLINE); //开启画折线
}
		
		
/*******折线end****************/	

	/**
	*  ICON图标
	*level 等级 1最小 
	*/
	
	function get_Icon(lid){
	
	var icon_url=\'\';
	  if(lid>0){
		  
		  icon_url= "http://localhost/Mapbackstage/theme/default/images/map_icon/st_"+lid+".png";
	  }else{
		  
		  icon_url= "http://localhost/Mapbackstage/theme/default/images/icon_1.png";
	  }
		var myIcon = new BMap.Icon(
				
					icon_url,
				
				   new BMap.Size(16, 16), //视窗大小  23, 25
				   { 
				    offset: new BMap.Size(16, 16),
				 
				   // imageOffset: new BMap.Size(-20, 0), //0, 0 - 0 * 25 图片相对视窗偏移
				 
					//imageSize:new BMap.Size(144,92)
				  });
		return myIcon;
		}
	
	function select_Icon(icon){
		
		//console.log(icon);
		var myIcon = new BMap.Icon(
				\'"\'+icon+\'"\',
				
				   new BMap.Size(16, 16), //视窗大小  23, 25
				   { 
				    offset: new BMap.Size(16, 16),
				 
				  });
		return myIcon;
		}
	
	
	/*
	function get_Icon(level){
		 //http://api.map.baidu.com/img/markers.png
		if(level==\'1\'){
			
			var myIcon = new BMap.Icon(
					"http://webmap0.map.bdstatic.com/wolfman/static/common/images/us_cursor_9517a2b.png",
					
					   new BMap.Size(10, 22), //视窗大小  23, 25
					   { 
					    offset: new BMap.Size(10, 25),
					 
					    imageOffset: new BMap.Size(-20, 0), //0, 0 - 0 * 25 图片相对视窗偏移
					 
						imageSize:new BMap.Size(144,92)
					  });	
			
			
		}else if(level==\'2\'){
			
			var myIcon = new BMap.Icon(
					"http://webmap0.map.bdstatic.com/wolfman/static/common/images/us_cursor_9517a2b.png",
					
					   new BMap.Size(18, 25), //视窗大小  23, 25
					   { 
					    offset: new BMap.Size(18, 25),
					 
					    imageOffset: new BMap.Size(-36, -23), //0, 0 - 0 * 25 图片相对视窗偏移
					 
						imageSize:new BMap.Size(144,92)
					  });
		}else{
			
			var myIcon = new BMap.Icon(
					"http://webmap0.map.bdstatic.com/wolfman/static/common/images/us_cursor_9517a2b.png",
					
					   new BMap.Size(16, 25), //宽高  23, 25
					   { 
					    offset: new BMap.Size(16, 25),
					 
					    imageOffset: new BMap.Size(-32, -50), //0, 0 - 0 * 25 图片相对视窗偏移
					 
						imageSize:new BMap.Size(144,92)
					  });
			
		}
		//icon图标
		return myIcon;
		
	}
	*/
	


				
		setTimeout(function(){
			//showAll(all_store);
		}, 1000)
		
	//	showAll(all_store);
		 //绘制海量点
	    
		// console.log(all_store);
		// getAll_coordinate(baidu_coordinate);

		var  Coordinate=JSON.parse(baidu_coordinate);
		
		var color_arr=new Array(\'#ff0000\',\'#00aaff\',\'#1cba1c\',\'#808000\');
		for (var i = 0; i < Coordinate.length; i++) {
				
			//console.log(color_arr[i]);
			getAll_coordinate(Coordinate[i],color_arr[i]);
		}
		 //绘制海量点
		 
		function getAll_coordinate(data,color){
			
		 	//var data=JSON.parse(baidu_coordinate);  //讲json字符串转化为json对象
			var  trackPoint=new Array();
		 if (document.createElement(\'canvas\').getContext) {  // 判断当前浏览器是否支持绘制海量点
	        var points = [];  // 添加海量点数据
	        for (var i = 0; i < data.length; i++) {
	        	
	    		trackPoint[i]=data[i][\'baidu_coordinate\']; //百度坐标集合
	    		//console.log(trackPoint[i]);
	    		var str=trackPoint[i].split(",");  //分割字符串为数组
	        	
	    		var  point=new BMap.Point(str[0],str[1]);
	    		  //默认首页数据data只有坐标，在组织或其他的时候才要其他数据
	             if(data[i][\'store_id\']){
	            	 
	            	 point.store_id=data[i][\'store_id\'];
	            	 point.name=data[i][\'name\'];
	            	 point.phone=data[i][\'phone\'];
	            	 point.img=data[i][\'img\'];
	            	 point.address=data[i][\'address\'];
	            	 point.level1_name=data[i][\'level1_name\'];
	            	 point.level2_name=data[i][\'level2_name\'];
	            	 point.level3_name=data[i][\'level3_name\'];
	            	 point.api_start_day=data[i][\'api_start_day\'];
	            	 point.api_end_day=data[i][\'api_end_day\'];
	            	 point.api_total_num=data[i][\'api_total_num\'];
	            	 point.api_total_money=data[i][\'api_total_money\'];
	            	 point.remark=data[i][\'remark\'];
	            	 
	             }
	    		
	    		
	    		points.push(point);
	    		
	    		
	    		
	        }
	        var options = {
	            size: BMAP_POINT_SIZE_NORMAL,  //BMAP_POINT_SIZE_SMALL
	            shape: BMAP_POINT_SHAPE_STAR,
	            //color: \'#d340c3\'
	            color:color
	        }
	        var pointCollection = new BMap.PointCollection(points, options);  // 初始化PointCollection
	        pointCollection.addEventListener(\'click\', function (e) {
	          // alert(\'单击点的坐标为：\' + e.point.lng + \',\' + e.point.lat);  // 监听点击事件
	          // 如果data有其他数据  点击组织 和区域的时候  默认全部显示的不能点击 
	          if(data[0][\'store_id\']){
	        	   
	              	hailiang_click(e.point,e.point.lng,e.point.lat);
	        	 map.centerAndZoom(new BMap.Point(e.point.lng,e.point.lat), 15);  //缩放等级
	           }
	 
	          //console.log(e);
	          
	        });
	        
	        setZoom(points); //自动缩放
            //标注的点击事件
           // marker_click(pointCollection,marker,data[i]); 
            //标注点的 鼠标右键事件
            //marker_right_click(pointCollection,marker,data[i]);
            
            
	        map.addOverlay(pointCollection);  // 添加Overlay
	    } else {
	        alert(\'请在chrome、safari、IE8+以上浏览器查看本示例\');
	    }
			
		}
		 
		

	
/***
 * 默认显示所有的门店点  不分页
 */

function showAll(json_str){

	var  trackPoint=new Array();
	var  bPoints=new Array();
	var data=JSON.parse(json_str);  //讲json字符串转化为json对象
	//console.log(data);

	
	/*
	var myIcon = new BMap.Icon(
		"http://localhost/Mapbackstage/theme/default/images/icon1_1.png",
		
		   new BMap.Size(16, 16), //视窗大小  23, 25
		   { 
		    offset: new BMap.Size(16, 16),
		 
		   // imageOffset: new BMap.Size(-20, 0), //0, 0 - 0 * 25 图片相对视窗偏移
		 
			//imageSize:new BMap.Size(144,92)
		  });	
	*/
	
	for(var i=0;i<data.length;i++)
	{
		var myIcon=get_Icon(data[i][\'color\']);
		//console.log(data);
		trackPoint[i]=data[i][\'baidu_coordinate\']; //百度坐标集合
		//console.log(trackPoint[i]);
		var str=trackPoint[i].split(",");  //分割字符串为数组
		var pt = new BMap.Point(str[0],str[1]);
		var  marker=new BMap.Marker(pt,{icon: myIcon});
		bPoints.push(pt); // 添加到百度坐标数组 用于自动调整缩放级别
		map.addOverlay(marker);    //添加标注
		//marker.setAnimation(BMAP_ANIMATION_DROP); //跳动的动画 

         //添加鼠标移动上面显示信息提示 
        addInfoWindow(marker,data[i]);
         
         //标注的点击事件
        marker_click(pt,marker,data[i])
         
         //标注点的 鼠标右键事件
        marker_right_click(pt,marker,data[i]);
         
	}
	
}

	  //回车事件响应
	$(function(){
   /*
	$(document).keyup(function (e) {//捕获文档对象的按键弹起事件  
    if (e.keyCode == 13) {//按键信息对象以参数的形式传递进来了  
        //此处编写用户敲回车后的代码 
			 var note=$("#suggestId").val();
			 //myValue=note;
			 //setPlace();
			 //alert(myValue);
			  map.clearOverlays();    //清除地图上所有覆盖物  
			 var local = new BMap.LocalSearch(map, {//智能搜索
				renderOptions:{map: map}  
				});
				local.search(note);
		}  
		});  
	*/

	//定位到当前位置 
	$("#weizhi").click(function(){
		
		
		//map.centerAndZoom(point,16);
		
		var geolocation = new BMap.Geolocation();
		geolocation.getCurrentPosition
		(function(r){
			if(this.getStatus() == BMAP_STATUS_SUCCESS){
				var mk = new BMap.Marker(r.point);
				map.addOverlay(mk);
				map.panTo(r.point);
				//alert(\'您的位置：\'+r.point.lng+\',\'+r.point.lat);
				map.centerAndZoom(r.point,16);
			}
			else {
				alert(\'failed\'+this.getStatus());
			}        
		},{enableHighAccuracy: true})
	});
	//清除地图上覆盖物
	$("#qingchu").click(function(){
		
		//map.clearOverlays(); 清除所有的覆盖物
		removeFanwei();//移除范围绑定事件
		qingup();  
		
		
		
		//window.location.reload();
		
		
	});
	
	
	
	//添加标注 加点
 	$("#biaoji").click(function(){
 		 removeFanwei();//移除范围绑定事件
		//添加绑定事件
		//map.addEventListener(\'click\', AddMarker);
	mkrTool.open();
	
		
	}); 
	//折线工具
	$("#zhexian").click(function(){
		 removeFanwei();//移除范围绑定事件
		 Polyline();
		 
		 
	/* 	var polyline = new BMap.Polyline([    
		        new BMap.Point(116.399, 39.910),    
		        new BMap.Point(116.405, 39.920)    
		         ],    
		       {strokeColor:"blue", strokeWeight:6, strokeOpacity:0.5})   
		       map.addOverlay(polyline); */
		
		
	});
	
	//5公里范围
	$("#fanwei").click(function(){
		
		map.setDefaultCursor("crosshair");//设置鼠标样式为十字花样式
		//设置鼠标样式为手形
		//map.setDefaultCursor（“url(\'bird.cur\')"）；
		map.addEventListener(\'click\', clickFanwei);
		} );
	
     //点击城市添加标注
     
     $(".menu-item-a,.menu-item-a-1,.menu-item-a-1-1").click(function(){
    	 
    	// alert("11111");
    	 map.clearOverlays();    //清除地图上所有覆盖物
    	 removeFanwei();//移除范围绑定事件
		//点击文字加色
    	 $("#menu-list").find(".color_red").removeClass("color_red");
    	 $(this).addClass("color_red");
    	 
    	 var did=$(this).attr(\'did\');
    	 //did=11;
    	 var dname=$(this).text(); //名称
    	 var pl=$(this).attr(\'pl\'); //省 市 区级别  1 2 3
    	 var zom=\'\';//地图级别大小
    	// 百度坐标系坐标
    	 var bPoints = new Array();
    	 
		if(pl==\'1\'){zom=10;	}
		if(pl==\'2\'){zom=11;	}
		if(pl==\'3\'){zom=14;	}
    	 
    	 $.ajax({ 
    		 type: "get",  //
    		 url : "index.php", 
    		 dataType:\'json\',// 
    		 data:  \'act=get_label&did=\'+did,   
    		 success: function(res){//如果调用php成功
    		
    			 if(res.msg==0){
    				 
    				// alert(\'error\');
    				 return false;
    			 }
    			var data=res.data;
    			var trackPoint=new Array();  
    			
    			var data1=res.result;
				//console.log(data);
				
    			
    			
    			for(var i=0;i<data.length;i++)
    			{
    				var myIcon=get_Icon(data[i][\'color\']);
    				//console.log(data[i]);
    				trackPoint[i]=data[i][\'baidu_coordinate\']; //百度坐标集合
    				
        			$str=trackPoint[i].split(",");  //分割字符串为数组
        			var pt = new BMap.Point($str[0],$str[1]);
        			//var  marker=new BMap.Marker(pt,{icon: myIcon});
       				 bPoints.push(pt); // 添加到百度坐标数组 用于自动调整缩放级别
       				/*	 
        			map.addOverlay(marker);    //添加标注
        			marker.setAnimation(BMAP_ANIMATION_DROP); //跳动的动画 
        			//BMAP_ANIMATION_BOUNCE 跳动的动画   BMAP_ANIMATION_DROP  //坠落的动画
        			
        		//	var label = new window.BMap.Label(data[i][\'name\'], { offset: new window.BMap.Size(20, -10) });  
                 //   marker.setLabel(label); 
                    //  Lable样式设置// 不需要//
                    label.setStyle({
                    	width: "120px",
                    	color: \'#fff\',
                    	background: \'#ff8355\',
                    	border: \'1px solid "#ff8355"\',
                    	borderRadius: "5px",
                    	textAlign: "center",
                    	height: "26px",
                    	lineHeight: "26px"
                    	});/////
                    
                    //alert(data[i][\'name\']);
                     //添加鼠标移动上面显示信息提示 
                   // addInfoWindow(marker,data[i]);
                     
                     //标注的点击事件
                    marker_click(pt,marker,data[i])
                     
                     //标注点的 鼠标右键事件
                    marker_right_click(pt,marker,data[i]);
       				*/
    			}
    			

    			////////////添加海量点///////////
    			 var  data1=JSON.parse(data1);
    			//console.log(data1);

    			for (var i = 0; i < data1.length; i++) {
    					
    				getAll_coordinate(data1[i],color_arr[i]);
    			}
///////////////////////////////////////////
    			

    			
 					//地图级别缩放
		  
 				if(data.length>1){
 					
    				
        			setTimeout(function(){
					    setZoom(bPoints);
					}, 1000)
					
    			}else{
    				
        			map.centerAndZoom(dname, zom);  //缩放等级
    			}
 					




    			
    			//console.log(trackPoint);
    			$("#pop").show();
    			$(\'#z_store\').html(res.store_count);
    			$(\'#z_money\').html(res.money_heji);
    		 }
    		 });
 
    	
    	 
     });
     
     //点击组织 地图显示标注
     
     $(".item-bg-a").click(function(){
    	 
    	// alert("999");
    	
    	 map.clearOverlays();    //清除地图上所有覆盖物
    	 removeFanwei();//移除范围绑定事件
    	 
 		//点击文字加色
    	 $("#menu-list0").find(".color_red").removeClass("color_red");
    	 $(this).addClass("color_red");
    	 
    	 var bPoints = new Array();
    	 
    	var did=$(this).attr(\'did\');
    	
    	var lid=$(this).attr(\'lid\');
    	
		 if(did==1){
			 var code1=$(this).attr(\'leid\');
			 var str="code1="+code1; 
		 }
		 if(did==2){
			 
			 var code2=$(this).attr(\'leid\');
			 
			 var code1=$(this).parent(\'li\').parent(\'ul\').prev(\'a\').attr(\'leid\');
			 var str="code1="+code1+"&code2="+code2; 
			 //alert(str);
		 }
		 if(did==3){
			 
			 var code3=$(this).attr(\'leid\');
			 
			 var h2=$(this).parent(\'li\').parent(\'ul\').prev(\'a\');
			 var code2=h2.attr(\'leid\');
			 
			 var code1=h2.parent(\'li\').parent(\'ul\').prev(\'a\').attr(\'leid\');
			 
			 var str="code1="+code1+"&code2="+code2+"&code3="+code3; 
			
		 }
		 if(did==4){
			 
			 var code4=$(this).attr(\'leid\');
			 
			 var h2=$(this).parent(\'li\').parent(\'ul\').prev(\'a\');
			 var code3=h2.attr(\'leid\');
			 
			 var h3=h2.parent(\'li\').parent(\'ul\').prev(\'a\');
			 
			 var code2=h3.attr(\'leid\');
			 
			 var code1=h3.parent(\'li\').parent(\'ul\').prev(\'a\').attr(\'leid\');
			 
			 var str="code1="+code1+"&code2="+code2+"&code3="+code3+"&code4="+code4; 
		 
		 }
		 
		 if(did==5){
			 
			 var code5=$(this).attr(\'leid\');
			 
			 var h2=$(this).parent(\'li\').parent(\'ul\').prev(\'a\');
			 var code4=h2.attr(\'leid\');
			 
			 var h3=h2.parent(\'li\').parent(\'ul\').prev(\'a\');
			 
			 var code3=h3.attr(\'leid\');
			 
			 var h4=h3.parent(\'li\').parent(\'ul\').prev(\'a\');
			 
			 var code2=h4.attr(\'leid\');
			 
			 var  code1=h4.parent(\'li\').parent(\'ul\').prev(\'a\').attr(\'leid\');
			 
			 var str="code1="+code1+"&code2="+code2+"&code3="+code3+"&code4="+code4+"&code5="+code5; 
		 
			 //alert(str);
		 }
		 
		 
		 
		 
		 
		 
    	//return false;
    	  $.ajax({
    		  
    		 type: "get",  //
     		 url : "index.php", 
     		 dataType:\'json\',// 
     		 data:  \'act=zuzhi_lable&did=\'+did+"&"+str,   
     		 success: function(res){
     			 
     		 			
	 		if(res.msg!=0){
    				 //console.log(res);

    			var data=res.data;
    			var trackPoint=new Array();  
    			
    			var myIcon=get_Icon(lid);

    			//var  marker=new Array()
    			//var info =new Array();
    			/*
    			for(var i=0;i<data.length;i++)
    			{
    				//console.log(data[i]);
    				trackPoint[i]=data[i][\'baidu_coordinate\']; //百度坐标集合
    				
        			$str=trackPoint[i].split(",");  //分割字符串为数组
        		
        			var pt = new BMap.Point($str[0],$str[1]);
        			
        			 bPoints.push(pt); // 添加到百度坐标数组 用于自动调整缩放级别
        			
        			var  marker=new BMap.Marker(pt,{icon: myIcon});
        			map.addOverlay(marker);    //添加标注
        			//marker.setAnimation(BMAP_ANIMATION_DROP); //跳动的动画 
        			//BMAP_ANIMATION_BOUNCE 跳动的动画   BMAP_ANIMATION_DROP  //坠落的动画
        			
        		//	var label = new window.BMap.Label(data[i][\'name\'], { offset: new window.BMap.Size(20, -10) });  
                 //   marker.setLabel(label); 
                     //添加鼠标移动上面显示信息提示 
                    //addInfoWindow(marker,data[i]);
                     
                    //标注的点击事件
                    marker_click(pt,marker,data[i]); 
                    //标注点的 鼠标右键事件
                    marker_right_click(pt,marker,data[i]);
    			}
    			*/
    			getAll_coordinate(data,color_arr[lid-1]);
    			
    			
    			//map.centerAndZoom("上海", 10);
    			  //设置地图级别 缩放
				/*
    			  setTimeout(function(){
				    setZoom(bPoints);
				}, 1000);
    			  */
    			  
    			  
    			  //查询分页详细列表信息
    			//  zuzhi_page(did,str,1);

    			  
    			  
     		 }
    			
     			 
    			$("#pop").show();
    			$(\'#z_store\').html(res.store_count);
    			$(\'#z_money\').html(res.money_heji);
     			 
     			 
     		 
     		 }
    		  
    		  
    		  
    	  });
    	//alert("00");
     });
     
	
	
	
	});
	

	

	
/**
*标注点的点右键点击事件
*/
function marker_right_click(pt,marker,data){
	
	
	marker.addEventListener(\'rightclick\', function (e) {
		  /*
		  var Menu = new BMap.ContextMenu();
	      Menu.addItem(new BMap.MenuItem(\'删除覆盖物 \', function () {
	          map.removeOverlay(circle);
	          Menu.close();
	      }))
	      map.addContextMenu(Menu);
	      */
	      
	     // var txt="<p style=\'font-size:12px;line-height:1.8em;\'>编号:"+data[\'store_id\']+"<br/>店长名:" + data[\'name\'] + "</br>地址：" + data[\'address\'] + "</br> 电话：" +data[\'phone\'] + "</br>所属信息:<br/>一级代理:"+data[\'level1_name\']+"<br>二级代理:"+data[\'level2_name\']+"<br>本部长:"+data[\'level3_name\']+"</p>";
		 if(data.image){
			 var img=data.image;	
			 } else{
				 var img="http://localhost/Mapbackstage/theme/default/images/img_none.png";
				 }	
		 
	      var txt =\'<div style="height:26px;" id="detailDiv">\';
	          txt+=\'<a  href="" target="_blank" style="font-size: 14px; color: rgb(77, 77, 77); font-weight: bold; text-decoration: none;" >\'+data[\'store_id\']+\'</a> </div>\';
	          
	          txt +=\'<div style="height: 70px;" ><img src="\'+img+\'" style="height: 100%;"/> </div>\';
	          txt+=\'<p style="padding: 0px; margin: 0px; line-height: 20px; font-size: 12px; color: rgb(77, 77, 77);">姓名：\'+ data[\'name\'] +\'</p>\';
	          txt+=\'<p style="padding: 0px; margin: 0px; line-height: 20px; font-size: 12px; color: rgb(77, 77, 77);">地址：\'+ data[\'address\'] +\'</p>\';
	          txt+=\'<p style="padding: 0px; margin: 0px; line-height: 20px; font-size: 12px; color: rgb(77, 77, 77);">电话：\'+ data[\'phone\'] +\'</p>\';

	          txt+=\'<p style="padding: 0px; margin: 0px; line-height: 20px; font-size: 12px; color: rgb(77, 77, 77);">一级代理：\'+ data[\'level1_name\'] +\'</p>\';
	          txt+=\'<p style="padding: 0px; margin: 0px; line-height: 20px; font-size: 12px; color: rgb(77, 77, 77);">二级代理：\'+ data[\'level2_name\'] +\'</p>\';
	          txt+=\'<p style="padding: 0px; margin: 0px; line-height: 20px; font-size: 12px; color: rgb(127, 127, 127);">三级代理：\'+ data[\'level3_name\'] +\'</p>\';
	          
	          //txt+=\'<p style="padding: 0px; margin: 0px; line-height: 18px; font-size: 12px; color: rgb(127, 127, 127);">标签：房地产 住宅区 小区</p>\';
	      
	      
	      var info= new window.BMap.InfoWindow(txt); // 
			
		   //console.log(this);
	     //添加绑定
	     /* 
	     marker.addEventListener("mouseover", function () {  
	      	 this.openInfoWindow(info);  
	       }); 
	     */
	      
	       
	     
	      var watchMarker = function(e,ee,marker){//右键查看详情
	          //方法
	    	  this.openInfoWindow(info); 
	      	//console.log(e);
	      	//console.log(ee);
	    	//console.log(marker);
	   
	        }
	     	var markerMenu=new BMap.ContextMenu();
	        markerMenu.addItem(new BMap.MenuItem(\'查看详情\',watchMarker.bind(marker)));
	        marker.addContextMenu(markerMenu);//给标记添加右键菜单
	      
	     
	});
}	

/***
 * 海量点的点击事件 取代标注点的点击事件
 */
 function  hailiang_click(data,x,y){
   	 //左侧具体相信信息显示
   	 $(".menu_tab").hide();
   	 $(\'#tap1\').show();
   	 $(\'#detail\').show();
   	 $(\'#store_list\').hide();
   	 $("#pop").hide(); 
   	 $("#fan2").show();//显示返回按钮
		
 		 if(data.image){var img=data.image;	}
 		 else{var img="http://localhost/Mapbackstage/theme/default/images/img_none.png"; }	
 		 
		var detail=\'<div style="width:60%;float:left;">\';
		detail+=\'<div class="dltal" style="font-weight:bold;">编号:<span id="store_id">\'+data.store_id+\'</span></div>\';
		detail+=\'<div class="dltal">店长名:<span id="store_name">\'+data.name+\'</span>     </div>\';
		detail+=\'<div class="dltal">电话:<span id="store_phone">\'+data.phone+\'</span></div>\';
		detail+=\'</div><div class="drtal" style="float:right;width:40%">\';
		detail+=\' <img src="\'+img+\'" id="store_image" style="width:100%"></img> </div>\';
			detail+=\'<div  class="jiaoyi">	<p>\';
			detail+=\' 地址:<span id="store_address">\'+data.address+\'</span></p>\';
			detail+=\' <p style=""> <strong>所属信息</strong><br/>\';
			detail+=\' 一级代理:<span id="level1_name">\'+data.level1_name+\'</span><br/>\';
			detail+=\' 二级代理:<span id="level2_name">\'+data.level2_name+\'</span><br/>\';
			detail+=\' 本部长:<span id="level3_name">\'+data.level3_name+\'</span><br/><br/>\';
			detail+=\' <strong>销售信息</strong><br/>\';
			detail+=\' 最初交易日: <span id="api_start_day">\'+data.api_start_day+\'</span><br/>\';
			detail+=\' 最终交易日: <span id="api_end_day">\'+data.api_end_day+\'</span><br/>\';
			detail+=\' 中交易次数:<span id="api_total_num">\'+data.api_total_num+\'</span> 次<br/>\';
			detail+=\'累计销售额: <span id="api_total_money">\'+data.api_total_money+\'</span></p>\';
			if(data.remark)detail+=\'<p><strong>备注信息</strong><br/><span id="remark">\'+data.remark+\'</span></p>\';
			detail+=\'</div>\';
 				
		$("#detail").html(detail);
	    //var hai=new BMap.Point(x,y);
		/// map.centerAndZoom(hai, 15);  //缩放等级
}
 
/***
 * 标注点的 点击事件
 */
function marker_click(pt,marker,data){
	
    marker.addEventListener("click",function(){
   	 
   	
   	// alert(pt);
   	 //左侧具体相信信息显示
   	 $(".menu_tab").hide();
   	 $(\'#tap1\').show();
   	 $(\'#detail\').show();
   	 $(\'#store_list\').hide();
   	 $("#pop").hide(); 
   	 $("#fan2").show();//显示返回按钮
		
 		 if(data.image){var img=data.image;	}
 		 else{var img="http://localhost/Mapbackstage/theme/default/images/img_none.png"; }	
 		 
		var detail=\'<div style="width:60%;float:left;">\';
		detail+=\'<div class="dltal" style="font-weight:bold;">编号:<span id="store_id">\'+data.store_id+\'</span></div>\';
		detail+=\'<div class="dltal">店长名:<span id="store_name">\'+data.name+\'</span>     </div>\';
		detail+=\'<div class="dltal">电话:<span id="store_phone">\'+data.phone+\'</span></div>\';
		detail+=\'</div><div class="drtal" style="float:right;width:40%">\';
		detail+=\' <img src="\'+img+\'" id="store_image" style="width:100%"></img> </div>\';
			detail+=\'<div  class="jiaoyi">	<p>\';
			detail+=\' 地址:<span id="store_address">\'+data.address+\'</span></p>\';
			detail+=\' <p style=""> <strong>所属信息</strong><br/>\';
			detail+=\' 一级代理:<span id="level1_name">\'+data.level1_name+\'</span><br/>\';
			detail+=\' 二级代理:<span id="level2_name">\'+data.level2_name+\'</span><br/>\';
			detail+=\' 本部长:<span id="level3_name">\'+data.level3_name+\'</span><br/><br/>\';
			detail+=\' <strong>销售信息</strong><br/>\';
			detail+=\' 最初交易日: <span id="api_start_day">\'+data.api_start_day+\'</span><br/>\';
			detail+=\' 最终交易日: <span id="api_end_day">\'+data.api_end_day+\'</span><br/>\';
			detail+=\' 中交易次数:<span id="api_total_num">\'+data.api_total_num+\'</span> 次<br/>\';
			detail+=\'累计销售额: <span id="api_total_money">\'+data.api_total_money+\'</span></p>\';
			if(data.remark)detail+=\'<p><strong>备注信息</strong><br/><span id="remark">\'+data.remark+\'</span></p>\';
			detail+=\'</div>\';
 				
		$("#detail").html(detail);
   	 
   	 
   	 
   	 map.centerAndZoom(pt, 15);  //缩放等级
    });
	
	
}		
		
		
 //获取指定标记的详细信息   
 function addInfoWindow(marker,data) {
 
     var info= new window.BMap.InfoWindow("<p style=’font-size:12px;lineheight:1.8em;’>" + data[\'name\'] + "</br>地址：" + data[\'address\'] + "</br> 电话：" +data[\'phone\'] + "</br></p>"); // 
		
	   //console.log(this);
     //添加绑定
     /* 
     marker.addEventListener("mouseover", function () {  
      	 this.openInfoWindow(info);  
       }); 
     */
 
 }
 
//根据点的数组自动调整缩放级别
 function setZoom (bPoints) {
      var view = map.getViewport(eval(bPoints));  
         var mapZoom = view.zoom;   
         var centerPoint = view.center;   
         map.centerAndZoom(centerPoint,mapZoom);  
 }
	
		
	function setPlace(){
		map.clearOverlays();    //清除地图上所有覆盖物
		function myFun(){
			var pp = local.getResults().getPoi(0).point;    //获取第一个智能搜索的结果
			map.centerAndZoom(pp, 18);
			map.addOverlay(new BMap.Marker(pp));    //添加标注
		}
		var local = new BMap.LocalSearch(map, { //智能搜索
		  onSearchComplete: myFun
		});
		local.search(myValue);
	}
	
	map.enableScrollWheelZoom(true); //放大和缩小
	
  ///保存图片功能

$(function(){ 
  $("#jietu_upload").click(function(){ 
    html2canvas($("#right"), { 
      onrendered: function(canvas) { 
        //把截取到的图片替换到a标签的路径下载 
       // $("#download").attr(\'href\',canvas.toDataURL()); 
		//内容放到form表单里面
		
		$("#imgs").val(canvas.toDataURL());
		
		$("#formid").submit();
        //下载下来的图片名字 
        //$("#download").attr(\'download\',\'share.png\') ;  
       // document.body.appendChild(canvas); 
      } 

    }); 
  }); 
});   
/////添加标注///	
/* function addMarker(point){
	  var marker = new BMap.Marker(point);
	  map.addOverlay(marker);
	} */
	


//////移除范围click事件  /////
function removeFanwei(){
		
	map.removeEventListener(\'click\', clickFanwei);
	map.setDefaultCursor("url(\'bird.cur\')");  //鼠标手势 手形
	}

	
var  clickFanwei=function (e){
	//alert(e.point.lng + "," + e.point.lat);  //获取坐标
	  //return false;
	var mPoint = new BMap.Point(e.point.lng,e.point.lat);

	//displayPOI(mPoint);
	
	//添加中心点标致
	
	var starMarker = new BMap.Marker(mPoint, {
                            icon: new BMap.Symbol(BMap_Symbol_SHAPE_STAR, {
                                scale: 1.5,
                                fillColor: "red",
                                fillOpacity: 0.3
                            })
                        });
	//starMarker.imei="wujiaoxin";
      /*                  starMarker.addEventListener("click", function () {
                            var p = starMarker.getPosition();
                            alert("这里是您所查找的中心点！\\n坐标：" + p.lng + "，" + p.lat);
                        });
      map.addOverlay(starMarker);
      */
	///
	

	
	map.enableScrollWheelZoom();
	map.centerAndZoom(mPoint,14);
	var circle = new BMap.Circle(mPoint,1000,{strokeColor:"blue",fillColor:"#0000ff", strokeWeight: 0.7 ,fillOpacity: 0.3, strokeOpacity: 0.3});
	//,enableEditing:true  是否启用编辑
	//1000 带标1000米 半径为1公里
	
	map.addOverlay(circle);
	
	var circle2 = new BMap.Circle(mPoint,2000,{strokeColor:"green", strokeWeight:1, strokeOpacity:0.7,fillColor:"#0000ff",fillOpacity:0.1});     //半径为2公里
	
	map.addOverlay(circle2);   
	
	
	var circle3 = new BMap.Circle(mPoint,3000,{strokeColor:"Olive", strokeWeight:1, strokeOpacity:0.7,fillColor:"#008000",fillOpacity:0.1});     //半径为3公里
	
	map.addOverlay(circle3); 

	var circle4 = new BMap.Circle(mPoint,4000,{strokeColor:"Red", strokeWeight:1, strokeOpacity:0.7,fillColor:"#808000",fillOpacity:0.1});     //半径为4公里
	
	map.addOverlay(circle4);  

	var circle5 = new BMap.Circle(mPoint,5000,{strokeColor:"Black", strokeWeight:1, strokeOpacity:0.7,fillColor:"#FF0000",fillOpacity:0.1});     //半径为5公里
	
	map.addOverlay(circle5);  
	
	
	if (mPoint != null) {
	circle.addEventListener("lineupdate", function (e) {
	console.log(circle.getRadius()); //返回圆形覆盖物的半径 
	});
	
	//circle.addEventListener("mouseover", function (e) {
		//alert("888");
		//});
	
	}
	//var local = new BMap.LocalSearch(map, {renderOptions: {map: map, autoViewport: false}}); 
	//local.searchNearby(\'餐馆\',mPoint,1000);
	 //右键删除
	 /*
	map.addEventListener(\'rightclick\', function (e) {
		
		  var Menu = new BMap.ContextMenu();
	      Menu.addItem(new BMap.MenuItem(\'删除覆盖物 \', function () {
	          map.removeOverlay(circle);
	          Menu.close();
	      }))
	      map.addContextMenu(Menu);
	     
	});
	 */
	

	 removeFanwei();
	
	
}
//清除上一步  圆 折线等
function qingup(){
	
	var allOverlay=map.getOverlays();
	
	console.log(allOverlay);
	
	//allOverlay[4].hide();
  var a=0; var b=0;
 	
	for (var i = 0; i < allOverlay.length ; i++){
		
		//console.log(allOverlay[i].toString());

		if(allOverlay[i].toString()==\'[object Circle]\'){
			
			 a=1;
			//删除圆 
			map.removeOverlay(allOverlay[i]);
			//return false;
		}
		
		if(allOverlay[i].toString()==\'[object Polyline]\'){
			b=1; 
			//删除折线
			map.removeOverlay(allOverlay[i]);
			//return false;
		}
		
		if(allOverlay[i].toString()==\'[object Marker]\'){
			
			//if(allOverlay[i].getTitle)
			  //删除中心点标记
			//map.removeOverlay(allOverlay[i]);
			//return false;
			
			//console.log(allOverlay[i].getTitle());
			//console.log(allOverlay[i].getPosition());
		}
		

		
	
		
		
	}
	
	
	//alert(a);
	//alert(b);

	if(a==0 && b==0){
		  //清除所有
		  map.clearOverlays();   
		
	}

	
	//circle.hide();
	//circle2.hide();
	//circle3.hide();
	//circle4.hide();
}

//提交数据
function fnOK(){
    var name = encodeHTML(document.getElementById("txtName").value);
    var tel = encodeHTML(document.getElementById("txtTel").value);
    var addr = encodeHTML(document.getElementById("txtAddr").value);
    var desc = encodeHTML(document.getElementById("areaDesc").value);

    if(!name || !tel || !addr){
        alert("星号字段必须填写");    
        return;
    }

    if(curMkr){
        //设置label
        var lbl = new BMap.Label(name, {offset: new BMap.Size(1, -20)});
        lbl.setStyle({border: "solid 1px gray"});
        curMkr.setLabel(lbl);
        
        //设置title
        var title = "电话: " + tel + "\\n\\r" + "地址: " +addr + "\\n\\r" + "描述: " + desc;
        curMkr.setTitle(title);        
    }
    if(infoWin.isOpen()){
        map.closeInfoWindow();
    }

    //在此用户可将数据提交到后台数据库中
    //alert("保存数据到后台开发中,敬请期待");
}

//输入校验
function encodeHTML(a){
	return a.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;");
}

//重填数据
function fnClear(){
    document.getElementById("txtName").value = "";
    document.getElementById("txtTel").value = "";
    document.getElementById("txtAddr").value = "";
    document.getElementById("areaDesc").value = "";
}
	
	
'; ?>

</script>


   <script type="text/javascript">
   <?php echo '  
   var $sliderMoving = false;     
 
     //兼容各种浏览器的,获取鼠标真实位置
     function mousePosition(ev) {
       if (!ev) ev = window.event;
       if (ev.pageX || ev.pageY) {
         return { x: ev.pageX, y: ev.pageY };
       }
       return {
         x: ev.clientX + document.documentElement.scrollLeft - document.body.clientLeft,
         y: ev.clientY + document.documentElement.scrollTop - document.body.clientTop
       };
     };
     //获取一个DIV的绝对坐标的功能函数,即使是非绝对定位,一样能获取到
     function getElCoordinate(dom) {
       var t = dom.offsetTop;
       var l = dom.offsetLeft;
       dom = dom.offsetParent;
       while (dom) {
         t += dom.offsetTop;
         l += dom.offsetLeft;
         dom = dom.offsetParent;
       };
       return { top: t, left: l };
     };
 
     //分隔条幽灵左右拖动(mousemove)
     function sliderGhostMoving(e) {
       $("#divSG").css({ left: mousePosition(e).x - 2, display: "block" });
     };
     //完成分隔条左右拖动(mouseup)
     function sliderHorizontalMove(e) {
       var lWidth = getElCoordinate($("#divSG")[0]).left - 2;
       
        //锁定左边最小宽度 230
        if(lWidth<230){
        	
        	lWidth=230;
        }
       var rWidth = $(window).width() - lWidth - 6;
       $("#left").css("width", lWidth + "px");
       $("#right").css("width", rWidth + "px");
       $("#divSG").css("display", "none");
     };
 
     function reinitSize() {
       var width = $(window).width() - 6;
       var height = $(window).height();   //浏览器高度
       
      var th=$("#top").height();  //头部高度
         //左侧菜单固定高度
         $(".main-div").css("height",height-th-60+\'px\');
       $("#left").css({ height: height-th + "px", width: width * 0.16 + "px" });
       $("#divS").css({ height: height-th - 2 + "px", width: "4px" });
       $("#divSG").css({ height: height-th - 2 + "px", width: "4px" });
       $("#right").css({ height: height-th + "px", width: width * 0.84 + "px" });
     }
 
     $(document).ready(function () {
       reinitSize();
 
       $("#divS").on("mousedown", function (e) {
         $sliderMoving = true;
         $("#main").css("cursor", "e-resize");
       });
 
       $("#main").on("mousemove", function (e) {
         if ($sliderMoving) {
           sliderGhostMoving(e);
         }
       });
 
       $("#main").on("mouseup", function (e) {
         if ($sliderMoving) {
           $sliderMoving = false;
           sliderHorizontalMove(e);
           $("#main").css("cursor", "default");
         }
       });
     });
 
     $(window).resize(function () {
       reinitSize();
     });
     

     '; ?>

   </script>
<script src="http://localhost/Mapbackstage/theme/default/js/main.js"></script>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "index_modal.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
