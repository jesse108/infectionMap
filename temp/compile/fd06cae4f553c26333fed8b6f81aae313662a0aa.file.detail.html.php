<?php /* Smarty version Smarty-3.1.14, created on 2014-07-17 22:38:54
         compiled from "D:\develop\code\www\infectionMap\template\infection\detail.html" */ ?>
<?php /*%%SmartyHeaderCode:1831653c699b2a6fc85-96013326%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd06cae4f553c26333fed8b6f81aae313662a0aa' => 
    array (
      0 => 'D:\\develop\\code\\www\\infectionMap\\template\\infection\\detail.html',
      1 => 1405607931,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1831653c699b2a6fc85-96013326',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53c699b2ab6193_23615576',
  'variables' => 
  array (
    'locations' => 0,
    'location' => 0,
    'infection' => 0,
    'caseLoctions' => 0,
    'infectionCases' => 0,
    'rowInfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c699b2ab6193_23615576')) {function content_53c699b2ab6193_23615576($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
	<div class="col-md-8 col-md-offset-1">
		<div class="main_content">
			<div id="detail_map"></div>
			<div class="row">
				<div class="col-md-3">
					<select id="continent_id" class="form-control" onchange="changeLocation(1);">
						<option value="0">选择大洲</option>
						<?php  $_smarty_tpl->tpl_vars['location'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['location']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['locations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['location']->key => $_smarty_tpl->tpl_vars['location']->value){
$_smarty_tpl->tpl_vars['location']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['location']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['location']->value['cname'];?>
</option>
						<?php } ?>
					</select>
				</div>

				<div class="col-md-3">
					<select id="country_id" class="form-control" onchange="changeLocation(2);">
						<option value="0">选择国家</option>
					</select>
				</div>
	
				<div class="col-md-3">
					<select id="city_id" class="form-control" onchange="changeLocation(3);">
						<option value="0">选择城市</option>
					</select>
				</div>			

				<div class = "col-md-3"><a class="btn btn-success" href="/infection/case_update.php?infection_id=<?php echo $_smarty_tpl->tpl_vars['infection']->value['id'];?>
">新增发病记录</a></div>
			</div>

			<div class="normal_block" id="table_show">
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="left_content">
			<h4 class=" text-center"><?php echo $_smarty_tpl->tpl_vars['infection']->value['cname'];?>
</h4> <a href="/infection/update.php?id=<?php echo $_smarty_tpl->tpl_vars['infection']->value['id'];?>
">修改</a>
			<hr>
			<h4><span class="glyphicon glyphicon-exclamation-sign"></span> 基本信息</h4>
			
			  <p class="well">
			  	疾病名称: <?php echo $_smarty_tpl->tpl_vars['infection']->value['cname'];?>
<br>
			  	英文名:<?php echo $_smarty_tpl->tpl_vars['infection']->value['ename'];?>
<br><br>

			  	病原体名称:<?php echo $_smarty_tpl->tpl_vars['infection']->value['pathogen_cname'];?>
<br>
			  	病原体英文名:<?php echo $_smarty_tpl->tpl_vars['infection']->value['pathogen_ename'];?>
<br>
			  	分类学地位:<?php echo $_smarty_tpl->tpl_vars['infection']->value['taxonomy'];?>
<br><br>

			  	传染源:<?php echo $_smarty_tpl->tpl_vars['infection']->value['infection_source'];?>
 <br>
			  	传染途径:<?php echo $_smarty_tpl->tpl_vars['infection']->value['infection_path'];?>
 <br>
			  	易感人群:<?php echo $_smarty_tpl->tpl_vars['infection']->value['suseptible_pop'];?>
 <br>
			  </p>
			<hr>

			<h4><span class="glyphicon glyphicon-book"></span>诊断标准</h4>
			<p class="well"><?php echo $_smarty_tpl->tpl_vars['infection']->value['judge_standard'];?>
</p>
			<hr>

			<h4><span class="glyphicon glyphicon-book"></span>预防措施</h4>
			<p class="well"><?php echo $_smarty_tpl->tpl_vars['infection']->value['prevention'];?>
</p>
			<hr>

			<h4><span class="glyphicon glyphicon-book"></span>治疗措施</h4>
			<p class="well"><?php echo $_smarty_tpl->tpl_vars['infection']->value['treatment'];?>
</p>
					

		</div>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script  type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=52eb0ee17d59916ec379c4a7f0cdefed"></script>

<script type="text/javascript">
var caseLocations = <?php echo json_encode($_smarty_tpl->tpl_vars['caseLoctions']->value);?>
;
var cases = <?php echo json_encode($_smarty_tpl->tpl_vars['infectionCases']->value);?>
;
var allLocations = <?php echo json_encode($_smarty_tpl->tpl_vars['locations']->value);?>
;
var rowInfo = <?php echo json_encode($_smarty_tpl->tpl_vars['rowInfo']->value);?>
;

var country;

function changeLocation(level){
	var continentID = $("#continent_id").val();
	var countryID = $("#country_id").val();
	var cityID = $("#city_id").val();
	level = level ? level : 1;
	
	switch(level){
		case 1: //切换大洲
			$countrySelect = $("#country_id");
			$countrySelect.html("");
		
			$citySelect = $("#city_id");
			$citySelect.html("");
			
			continent = allLocations[continentID];
			countries = continent['sub'];
			if(countries){
				html = buildOptionHtml(countries,"选择国家","id",'cname');
				$countrySelect.html(html);
			}
			
			//切换地图
			if(continent){
				clearTag();
				markMapInArea([continent]);
				createTable([continent]);
				showLocationChange(continent['lng'],continent['lat'],1);
			}
			break;
		case 2://切换国家
			$citySelect = $("#city_id");
			$citySelect.html("");
			country = allLocations[continentID]['sub'][countryID];
			cities = country['sub'];
			
			if(cities){
				html = buildOptionHtml(cities,"选择城市","id",'cname');
				$citySelect.html(html);
			}

			if(country){
				clearTag();
				markMapInArea([country]);
				createTable([country]);
				showLocationChange(country['lng'],country['lat'],4);			
			}
			break;
		case 3:
			city = allLocations[continentID]['sub'][countryID]['sub'][cityID];
			if(city){
				clearTag();
				markMapInArea([city]);
				createTable([city]);
				showLocationChange(city['lng'],city['lat'],5);		
			}			
			break;
	}
}

var mapObj,cluster;
var markers= [];
mapInit();



function mapInit(){
	mapObj = new AMap.Map("detail_map",{
    view: new AMap.View2D({
        //center:new AMap.LngLat({ $location['lng']},{ $location['lat']}),//地图中心点
        zoom:1//地图显示的缩放级别
    	})
	});
	markMapInArea(allLocations);
	createTable(allLocations);
}

//向地图添加标点
function mapAddTag(lng,lat){
	var marker = new AMap.Marker({
		position:new AMap.LngLat(lng,lat) ,//基点位置
		icon:"http://webapi.amap.com/images/marker_sprite.png" //marker图标，直接传递地址url
	});
	markers.push(marker);
}

//清除标点
function clearTag(){
    if(cluster) {
        cluster.setMap(null);
    }
	markers= [];
}

function showTag(){
	mapObj.plugin(["AMap.MarkerClusterer"],function(){
		cluster = new AMap.MarkerClusterer(mapObj,markers);
	});
}


function showLocationChange(lng,lat,level){
	mapObj.setZoomAndCenter(level,new AMap.LngLat(lng,lat));
}

 
function markMapInArea(locations){
	if(!locations){
		return false;
	}

	var locationIDs = [];
	locationIDs = Util_Array.GetColunm(locations,'id','sub');
	
	for(var i in cases){
		curLocationID = cases[i]['location_id'];
		if(in_array(curLocationID,locationIDs)){
			curLocation = caseLocations[curLocationID];
			if(curLocation){
				mapAddTag(curLocation['lng'],curLocation['lat']);
			}
		}
	}
	showTag();
}

function createTable(locations){
	if(!locations){
		return false;
	}

	var locationIDs = [];
	var showCases = [];

	locationIDs = Util_Array.GetColunm(locations,'id','sub');

	for(var i in cases){
		curLocationID = cases[i]['location_id'];
		if(in_array(curLocationID,locationIDs)){
			showCases.push(cases[i]);
		}
	}

	htmlObj = new Html_Bootstrap_Table(showCases);
	htmlObj.setTableInfo(rowInfo);

	$("#table_show").html(htmlObj.createHtml());
}


</script>
<?php }} ?>