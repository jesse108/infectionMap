<?php /* Smarty version Smarty-3.1.14, created on 2014-08-12 20:57:11
         compiled from "D:\develop\web\www\infectionMap\template\infection\detail.html" */ ?>
<?php /*%%SmartyHeaderCode:1075653ce36d009d528-21121195%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '258a4788996da23750a847c9f24d0308bc5f3934' => 
    array (
      0 => 'D:\\develop\\web\\www\\infectionMap\\template\\infection\\detail.html',
      1 => 1407848229,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1075653ce36d009d528-21121195',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53ce36d0117327_71152176',
  'variables' => 
  array (
    'locations' => 0,
    'location' => 0,
    'infection' => 0,
    'infectionCases' => 0,
    'case' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ce36d0117327_71152176')) {function content_53ce36d0117327_71152176($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/static/css/infectious.css">
<div class="wrap">
	<div class="content">
		<div class="l-content">
			<div id="mapContainer"></div><!-- 地图容器 -->
			<div class="quickT">
					<select name="continent_id" id="intercontinental" onchange="changeLocation(1);">
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
					
					<select id="country_id" class="form-control" onchange="changeLocation(2);">
						<option value="0">选择国家</option>
					</select>
					
					<select id="city_id" class="form-control" onchange="changeLocation(3);">
						<option value="0">选择城市</option>
					</select>

					<a href="/infection/case_update.php?infection_id=<?php echo $_smarty_tpl->tpl_vars['infection']->value['id'];?>
"><button class="btn">新增发病记录</button></a>
			</div>
			
			<div class="itable">
				<table>
					<thead>
						<tr>
							<td width="15%">国家地区</td>
							<td width="15%">发病日期</td>
							<td width="15%">发病人数</td>
							<td width="15%">发病率</td>
							<td width="15%">患病人数</td>
							<td width="15%">患病率</td>
							<td width="25%">备注</td>
						</tr>
					</thead>
					<tbody>
					<?php  $_smarty_tpl->tpl_vars['case'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['case']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infectionCases']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['case']->key => $_smarty_tpl->tpl_vars['case']->value){
$_smarty_tpl->tpl_vars['case']->_loop = true;
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['case']->value['location'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['case']->value['start_date'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['case']->value['case_number'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['case']->value['case_rate'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['case']->value['ill_number'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['case']->value['ill_rate'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['case']->value['comment'];?>
</td>
						</tr>				
					<?php } ?>

					</tbody>
				</table>
			</div>

		</div>
		<div class="r-content">
			<h3>东方马脑炎</h3>
			<div class="b base">
				<div class="t">
					基本信息 <a class="edit" target="_blank" href="/infection/update.php?id=<?php echo $_smarty_tpl->tpl_vars['infection']->value['id'];?>
#infection_form">编辑</a>
				</div>
				<div class="c">
					<p>
						<label>疾病名称：</label><span class="va"><?php echo $_smarty_tpl->tpl_vars['infection']->value['cname'];?>
</span>
					</p>
					<p>
						<label>疾病英文：</label><span class="va"><?php echo $_smarty_tpl->tpl_vars['infection']->value['ename'];?>
</span>
					</p>
					<br>
					<p>
						<label>病原体名称：</label><span class="va"><?php echo $_smarty_tpl->tpl_vars['infection']->value['pathogen_cname'];?>
</span>
					</p>
					<p>
						<label>病原体英文：</label><span class="va"><?php echo $_smarty_tpl->tpl_vars['infection']->value['pathogen_ename'];?>
</span>
					</p>
					<p>
						<label>分类学地位：</label><span class="va"><?php echo $_smarty_tpl->tpl_vars['infection']->value['taxonomy'];?>
</span>
					</p>
					<br>
					<p>
						<label>传染源：</label><span class="va"><?php echo $_smarty_tpl->tpl_vars['infection']->value['infection_source'];?>
</span>
					</p>
					<p>
						<label>传染途径：</label><span class="va"><?php echo $_smarty_tpl->tpl_vars['infection']->value['infection_path'];?>
</span>
					</p>
					<p>
						<label>易感人群：</label><span class="va"><?php echo $_smarty_tpl->tpl_vars['infection']->value['suseptible_pop'];?>
</span>
					</p>
				</div>
			</div>
			<div class="b">
				<div class="t">
					诊断标准 <a target="_blank" href="/infection/update.php?id=<?php echo $_smarty_tpl->tpl_vars['infection']->value['id'];?>
#standard" class="edit">编辑</a>
				</div>
				<div class="c">
				<?php echo $_smarty_tpl->tpl_vars['infection']->value['judge_standard'];?>

				</div>
			</div>

			<div class="b">
				<div class="t">
					预防措施 <a target="_blank" href="/infection/update.php?id=<?php echo $_smarty_tpl->tpl_vars['infection']->value['id'];?>
#prevention" class="edit">编辑</a>
				</div>
				<div class="c">
				<?php echo $_smarty_tpl->tpl_vars['infection']->value['prevention'];?>

				</div>
			</div>

			<div class="b">
				<div class="t">
					治疗措施 <a target="_blank" href="/infection/update.php?id=<?php echo $_smarty_tpl->tpl_vars['infection']->value['id'];?>
#treatment" class="edit">编辑</a>
				</div>
				<div class="c">
					<?php echo $_smarty_tpl->tpl_vars['infection']->value['treatment'];?>

				</div>
			</div>
		</div>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="http://webapi.amap.com/maps?v=1.3&key=dbb6bc63f724a1f9099ecd0a6acf3871" type="text/javascript"></script>
<script type="text/javascript">
var mapObj;
var markers = [];
$(function(){
	mapInit();
	// map click handler
});
	
//初始化地图对象，加载地图
function mapInit(){
    mapObj = new AMap.Map("mapContainer");

    for(var i=0; i<10; i++){  //伪造数据
    	var marker = new AMap.Marker({                 
	      map:mapObj,                 
	      icon:"/static/img/icon_maker.png",                 
	      offset:new AMap.Pixel(-9,-32),
	      position:new AMap.LngLat(116-i*0.08, 40)   // 构造坐标集合          
	    });
	    markers[i] = marker;
    }

	
	mapObj.plugin(["AMap.MarkerClusterer"],function() {
	    cluster = new AMap.MarkerClusterer(mapObj,markers);
	});

	mapObj.setCenter(new AMap.LngLat(115.6, 40));

}
</script><?php }} ?>