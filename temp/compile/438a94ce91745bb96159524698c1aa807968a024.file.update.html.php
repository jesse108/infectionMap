<?php /* Smarty version Smarty-3.1.14, created on 2014-07-16 15:33:26
         compiled from "D:\develop\code\www\infectionMap\template\location\update.html" */ ?>
<?php /*%%SmartyHeaderCode:1066253c53fbf4acf29-49790452%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '438a94ce91745bb96159524698c1aa807968a024' => 
    array (
      0 => 'D:\\develop\\code\\www\\infectionMap\\template\\location\\update.html',
      1 => 1405495806,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1066253c53fbf4acf29-49790452',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53c53fbf4e3a37_86841594',
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
<?php if ($_valid && !is_callable('content_53c53fbf4e3a37_86841594')) {function content_53c53fbf4e3a37_86841594($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="main_content">
<h3><?php if ($_smarty_tpl->tpl_vars['id']->value){?>修改<?php }else{ ?>新增<?php }?> 地点</h3>

	<div class="">
		<form action="/location/update.php" method="post">
		<table class="input_table" >
			<?php if ($_smarty_tpl->tpl_vars['id']->value){?>
				<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
			<?php }?>
			<tr>
				<td>
					<span>地点名称</span>
					<input type="text" class="form-control" name="cname" value="<?php echo $_smarty_tpl->tpl_vars['location']->value['cname'];?>
"/>
				</td>

				<td>
					<span>洲际</span>
					<select class="form-control" name="continent_id" id="continent_id" onchange="changeContinent();">
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
				</td>

				<td>
					<span>国家</span>
					<select class="form-control" name="country_id" id="country_id" onchange="changeCountry();">

					</select>
				</td>
			</tr>

			<tr>
				<td colspan=3>
					<div id="map_container"></div>
				</td>
			</tr>

			<tr>
				<td>
 					经度 <input type="text" name="lng" id="lngX" readonly value="<?php echo $_smarty_tpl->tpl_vars['location']->value['lng'];?>
"/>
				</td>

				<td>
					维度 <input type="text" name="lat" id="latY" readonly value="<?php echo $_smarty_tpl->tpl_vars['location']->value['lat'];?>
" />
				</td>
			</tr>

			<tr>

				<td colspan=3>
					<span>地点介绍</span>
					<textarea rowspan=3 name="info" class="form-control"><?php echo $_smarty_tpl->tpl_vars['location']->value['info'];?>
 </textarea>
				</td>
			</tr>

			<tr>

				<td colspan=3>
					<span>其他备注</span>
					<textarea rowspan=3 name="comment" class="form-control"><?php echo $_smarty_tpl->tpl_vars['location']->value['comment'];?>
 </textarea>
				</td>
			</tr>

		</table>
		
		

		<input type="submit" value="提交" class="btn"/>
		<?php if ($_smarty_tpl->tpl_vars['id']->value){?>
		<a class="btn btn-success" href="/location/update.php"> 创建新地点</a>
		<?php }?>
		</form>

	</div>	
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script src="http://webapi.amap.com/maps?v=1.3&key=52eb0ee17d59916ec379c4a7f0cdefed" type="text/javascript"></script>

<script type="text/javascript">
var mapObj;
mapInit();

var allLocations = <?php echo json_encode($_smarty_tpl->tpl_vars['allLocations']->value);?>
;
<?php if ($_smarty_tpl->tpl_vars['continentID']->value){?>
buildCityOption(allLocations[<?php echo $_smarty_tpl->tpl_vars['continentID']->value;?>
]['sub'],<?php echo $_smarty_tpl->tpl_vars['countryID']->value;?>
);
<?php }?>


//初始化地图对象，加载地图
function mapInit(){
     mapObj = new AMap.Map("map_container",{
        //二维地图显示视口
        view: new AMap.View2D({
            center:new AMap.LngLat(<?php echo $_smarty_tpl->tpl_vars['location']->value['lng'];?>
,<?php echo $_smarty_tpl->tpl_vars['location']->value['lat'];?>
),//地图中心点
            zoom:4 //地图显示的缩放级别
        })
    }); 
     
    //为地图注册click事件获取鼠标点击出的经纬度坐标
    var clickEventListener=AMap.event.addListener(mapObj,'click',function(e){
        document.getElementById("lngX").value=e.lnglat.getLng();
        document.getElementById("latY").value=e.lnglat.getLat(); 
    });
}

function changeContinent(){
	continent_id = $("#continent_id").val();
	continent = allLocations[continent_id];
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

</script>
<?php }} ?>