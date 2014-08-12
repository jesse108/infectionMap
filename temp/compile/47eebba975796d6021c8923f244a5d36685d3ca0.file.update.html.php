<?php /* Smarty version Smarty-3.1.14, created on 2014-08-12 23:50:57
         compiled from "D:\develop\web\www\infectionMap\template\location\update.html" */ ?>
<?php /*%%SmartyHeaderCode:3264853e9840fa89b37-46563235%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47eebba975796d6021c8923f244a5d36685d3ca0' => 
    array (
      0 => 'D:\\develop\\web\\www\\infectionMap\\template\\location\\update.html',
      1 => 1407839069,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3264853e9840fa89b37-46563235',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53e9840fc858a7_91065194',
  'variables' => 
  array (
    'id' => 0,
    'location' => 0,
    'allLocations' => 0,
    'curLocation' => 0,
    'continentID' => 0,
    'countryID' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53e9840fc858a7_91065194')) {function content_53e9840fc858a7_91065194($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" type="text/css" href="/static/css/place.css">

<div class="wrap addPlace">
	<div class="form-wrap">
		<h2>创建地点</h2>
		<form action="/location/update.php" method="post">
		<?php if ($_smarty_tpl->tpl_vars['id']->value){?>
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
		<?php }?>
		<div class="row">
			<div class="afield">
				<label for="placeName" class="t">地点名称</label>
				<div class="main">
					<input type="text" class="ainput" name="cname" id="placeName" value="<?php echo $_smarty_tpl->tpl_vars['location']->value['cname'];?>
" />
				</div>
			</div>
			<div class="afield">
				<label for="intercontinental" class="t">洲际</label>
				<div class="main">
					<select name="intercontinental" id="continent_id" name="continent_id" onchange="changeContinent();">
						<option value="0"></option>
						<?php  $_smarty_tpl->tpl_vars['curLocation'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['curLocation']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allLocations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['curLocation']->key => $_smarty_tpl->tpl_vars['curLocation']->value){
$_smarty_tpl->tpl_vars['curLocation']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['curLocation']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['curLocation']->value['id']==$_smarty_tpl->tpl_vars['continentID']->value){?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['curLocation']->value['cname'];?>
</option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="afield lastAfield">
				<label for="country" class="t">国家</label>
				<div class="main">
					<select name="country_id" id="country_id" onchange="changeCountry();">
					
					</select>
				</div>
			</div>
		</div>

		<div class="line">
			<div class="afield">
				<label class="t">请在地图上标记</label>
				<div class="main">
					<div id="mapContainer">
						
					</div>
				</div>
			</div>
		</div>

		<div class="line">
			<div class="afield">
				<label for="introduction" class="t">地点介绍</label>
				<div class="main">
					<textarea name="info" id="introduction" cols="30" rows="5"><?php echo $_smarty_tpl->tpl_vars['location']->value['info'];?>
</textarea>
					<input type="hidden" name="lng" id="lngX" value="<?php echo $_smarty_tpl->tpl_vars['location']->value['lng'];?>
">
					<input type="hidden" name="lat" id="latY" value="<?php echo $_smarty_tpl->tpl_vars['location']->value['lat'];?>
">
				</div>
			</div>
		</div>

		<div class="btn-c">
			<input type="submit" value="完成" class="btn sBtn">
			<a href="/"><input type="button" value="取消" class="btn cBtn"/></a>
		</div>
		</form>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="http://webapi.amap.com/maps?v=1.3&key=dbb6bc63f724a1f9099ecd0a6acf3871" type="text/javascript"></script>
<script type="text/javascript" src="/static/js/html_tools.js"></script>
<script type="text/javascript">
var mapObj;
var marker;
var allLocations = <?php echo json_encode($_smarty_tpl->tpl_vars['allLocations']->value);?>
;

$(function(){
	<?php if ($_smarty_tpl->tpl_vars['continentID']->value){?>
	buildCityOption(allLocations[<?php echo $_smarty_tpl->tpl_vars['continentID']->value;?>
]['sub'],<?php echo $_smarty_tpl->tpl_vars['countryID']->value;?>
);
	<?php }?>
	
	mapInit();
});


function mapInit(){
    mapObj = new AMap.Map("mapContainer",{
        view: new AMap.View2D({
            center:new AMap.LngLat(<?php echo $_smarty_tpl->tpl_vars['location']->value['lng'];?>
,<?php echo $_smarty_tpl->tpl_vars['location']->value['lat'];?>
),//地图中心点
            zoom:4 //地图显示的缩放级别
        })	
    });
    marker = new AMap.Marker({                 
      map:mapObj,                 
      icon:"/static/img/icon_maker.png",                 
      offset:new AMap.Pixel(-9,-32)               
    });
    AMap.event.addListener(mapObj,'click',getLnglat); 
}

function getLnglat(e){ 
    document.getElementById("lngX").value=e.lnglat.getLng(); 
    document.getElementById("latY").value=e.lnglat.getLat(); 

    var lnglat = e.lnglat;
    marker.setPosition(lnglat);
   	mapObj.setCenter(lnglat);  
}


function changeContinent(){
	continent_id = $("#continent_id").val();
	continent = allLocations[continent_id];
	dump(continent_id);
	if(continent){
		lat = continent['lat'];
		lng = continent['lng'];
		showLocationChange(lng,lat);
		buildCityOption(continent['sub']);
	}
}

function changeCountry(){
	continent_id = $("#continent_id").val();
	country_id = $("#country_id").val();
	country = allLocations[continent_id]['sub'][country_id];
	if(country){
		lat = country['lat'];
		lng = country['lng'];
		showLocationChange(lng,lat);
	}
}

function buildCityOption(citys,select_id){
	var html = '';
	html = " <option value='0'></option>";
	for(var i in citys){
		cur_id = citys[i]['id'];
		cur_name = citys[i]['cname'];
		if(select_id == cur_id){
			select_html = "selected";
		} else {
			select_html = "";
		}
		cur_html = "<option value='"+cur_id+"'  "+select_html+">"+cur_name+"</option>";
		html = html + cur_html;
	}
	$('#country_id').html(html);
}


function showLocationChange(lng,lat){
	mapObj.setZoomAndCenter(4,new AMap.LngLat(lng,lat));
}

</script><?php }} ?>