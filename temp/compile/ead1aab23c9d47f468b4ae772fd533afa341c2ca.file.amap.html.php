<?php /* Smarty version Smarty-3.1.14, created on 2014-07-15 23:57:34
         compiled from "D:\develop\code\www\infectionMap\template\demo\amap.html" */ ?>
<?php /*%%SmartyHeaderCode:3148653c54582093888-39394290%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ead1aab23c9d47f468b4ae772fd533afa341c2ca' => 
    array (
      0 => 'D:\\develop\\code\\www\\infectionMap\\template\\demo\\amap.html',
      1 => 1405439849,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3148653c54582093888-39394290',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53c545820ca399_33577472',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c545820ca399_33577472')) {function content_53c545820ca399_33577472($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>鼠标拾取地图坐标</title>
<style type="text/css">
	#iCenter{
		width: 800px;
		height: 400px;
	}
</style>

<!-- 页面布局样式 -->
<script language="javascript" src="http://webapi.amap.com/maps?v=1.3&key=52eb0ee17d59916ec379c4a7f0cdefed"></script>
<script language="javascript">

</script>
</head>
<body >
    <div id="iCenter"></div>
    <div style="padding:2px 0px 0px 5px;font-size:12px">
        <b>鼠标左键在地图上单击获取坐标</b>
        <br><div>X：<input type="text" id="lngX" name="lngX" value=""/> Y：<input type="text" id="latY" name="latY" value=""/></div>
    </div>
</body>
</html> 

<script type="text/javascript">
var mapObj;
//初始化地图对象，加载地图
function mapInit(){
     mapObj = new AMap.Map("iCenter",{
        //二维地图显示视口
        view: new AMap.View2D({
          //  center:new AMap.LngLat(116.397428,39.90923),//地图中心点
            zoom:4 //地图显示的缩放级别
        })
    }); 
     
    //为地图注册click事件获取鼠标点击出的经纬度坐标
    var clickEventListener=AMap.event.addListener(mapObj,'click',function(e){
        document.getElementById("lngX").value=e.lnglat.getLng();
        document.getElementById("latY").value=e.lnglat.getLat(); 
    });
}
mapInit();
</script><?php }} ?>