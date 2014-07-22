<?php /* Smarty version Smarty-3.1.14, created on 2014-07-18 02:23:34
         compiled from "D:\develop\code\www\infectionMap\template\location\detail.html" */ ?>
<?php /*%%SmartyHeaderCode:1219553c61f00da0854-78123598%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a783abc97a66e4d97d8188f09cce1deed9fd01a2' => 
    array (
      0 => 'D:\\develop\\code\\www\\infectionMap\\template\\location\\detail.html',
      1 => 1405621412,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1219553c61f00da0854-78123598',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53c61f00ddf058_54938723',
  'variables' => 
  array (
    'location' => 0,
    'yearCount' => 0,
    'defaultYear' => 0,
    'year' => 0,
    'infections' => 0,
    'one' => 0,
    'infectionCases' => 0,
    'rowInfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c61f00ddf058_54938723')) {function content_53c61f00ddf058_54938723($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
	<div class="col-md-8 col-md-offset-1">
		<div class="main_content">
			<div class="row">
				<div class = "col-md-4"><h4>传染病</h4></div>
				<div class = "col-md-3 col-md-offset-5"><a class="btn btn-success" href="/infection/case_update.php?location_id=<?php echo $_smarty_tpl->tpl_vars['location']->value['id'];?>
">新增发病记录</a></div>
			</div>

			<div class="normal_block">
				<?php  $_smarty_tpl->tpl_vars['count'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['count']->_loop = false;
 $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['yearCount']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['count']->key => $_smarty_tpl->tpl_vars['count']->value){
$_smarty_tpl->tpl_vars['count']->_loop = true;
 $_smarty_tpl->tpl_vars['year']->value = $_smarty_tpl->tpl_vars['count']->key;
?>
					<button class="btn btn-sm <?php if ($_smarty_tpl->tpl_vars['defaultYear']->value==$_smarty_tpl->tpl_vars['year']->value){?> btn-success<?php }?>" id="year_button_<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
" onclick="changeYear(<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
)" ><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</button>
				<?php } ?>
			</div>

			<div class="normal_block">
				<canvas id="myChart" width="650" height="400"></canvas>
			</div>

			<div class="normal_block">
				<button class="btn btn-success infection_button" id="infection_button_0" onclick="changeInfection(0)">所有</button>
				<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['infections']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_smarty_tpl->tpl_vars['one']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['one']->key;
?>
				<button class="btn btn-primary infection_button" id="infection_button_<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
" onclick="changeInfection(<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
)"><?php echo $_smarty_tpl->tpl_vars['one']->value['cname'];?>
</button>
				<?php } ?>
			</div>

			<div class="normal_block" id="case_table">
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="left_content">
			<h4 class=" text-center">地点介绍</h4> <a href="/location/update.php?id=<?php echo $_smarty_tpl->tpl_vars['location']->value['id'];?>
">修改</a>
			<hr>
			<h4><span class="glyphicon glyphicon-exclamation-sign"></span> 简介</h4>
			<p class="well"><?php echo $_smarty_tpl->tpl_vars['location']->value['info'];?>
</p>

			<hr>
			<h4><span class="glyphicon glyphicon-book"></span> 其他备注</h4>
			<p class="well"><?php echo $_smarty_tpl->tpl_vars['location']->value['comment'];?>
</p>
			<hr>
			<div id="side_map_content">
			</div>
		</div>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript" src="/static/lib/chart.js/Chart.js"></script>
<script src="http://webapi.amap.com/maps?v=1.3&key=52eb0ee17d59916ec379c4a7f0cdefed" type="text/javascript"></script>

<script type="text/javascript">
cases = <?php echo json_encode($_smarty_tpl->tpl_vars['infectionCases']->value);?>
;
rowInfo = <?php echo json_encode($_smarty_tpl->tpl_vars['rowInfo']->value);?>
;

//地图
 mapObj = new AMap.Map("side_map_content",{
    view: new AMap.View2D({
        center:new AMap.LngLat(<?php echo $_smarty_tpl->tpl_vars['location']->value['lng'];?>
,<?php echo $_smarty_tpl->tpl_vars['location']->value['lat'];?>
),//地图中心点
        zoom:4 //地图显示的缩放级别
    })
}); 


//图表
var selectInfectionID = 0;
var selectYear;
var selectMonth;
var ctx = $("#myChart").get(0).getContext("2d");
var myChart = new Chart(ctx);
drawCases(new Date().getFullYear());	

function drawCases(year,month,infectionID){
	var drawDate = { };
	var labels=[];
	var data = [];
	var showCases = [];

	if(infectionID !== undefined){
		selectInfectionID = selectInfectionID === undefined ? 0 : selectInfectionID;
		$("#infection_button_"+selectInfectionID).removeClass('btn-success').addClass('btn-primary');
		$("#infection_button_"+infectionID).removeClass('btn-primary').addClass('btn-success');
	}

	if(year !== undefined){
		$("#year_button_"+selectYear).removeClass('btn-success');
		$("#year_button_"+year).addClass('btn-success');		
	}

	selectYear = year;
	selectMonth = month;
	selectInfectionID = infectionID;
	if(month && year){ //以天为最小单位
		 
	} else if(year){ //以月为最小单位
		var monthCount = { };
		for(var i = 0; i < 12 ; i++){ //1个月
			var curMonthDate = new Date(year + "-" + i + "-" + "10");//已十号为标准
			var curMonth = i + 1;
			monthCount[i] = 0;

			labels.push(curMonth + "月");
		}

		for(var i in cases){
			var curCase = cases[i];
			var curDate = new Date(curCase['start_date']);
			var curYear = curDate.getFullYear();
			var cutInfectoinID = curCase['infection_id'];

			if(curYear == year && (!infectionID || infectionID == cutInfectoinID) ){
				var month = curDate.getMonth();
				monthCount[month]++;
				showCases.push(curCase);
			}
		}

		for(var i in monthCount){
			data[i] = monthCount[i];
		}

		drawDate = {
			labels:labels,
			datasets : [
			  {
				fillColor : "rgba(169,214,246,0.5)",
				strokeColor : "rgba(220,220,220,1)",
				data: data,
			  },
			]
		};
		myChart.Bar(drawDate);
		drawCaseTable(showCases);
	} else { //以年为最小单位

	}
}



//表格
function drawCaseTable(showCases){
	htmlObj = new Html_Bootstrap_Table(showCases);
	htmlObj.setTableInfo(rowInfo);
	html = htmlObj.createHtml();
	$("#case_table").html(html);
}



//其他
function changeInfection(infectionID){
	drawCases(selectYear,selectMonth,infectionID);
}

function changeYear(year){
	drawCases(year,selectMonth,0);
}

</script>
<?php }} ?>