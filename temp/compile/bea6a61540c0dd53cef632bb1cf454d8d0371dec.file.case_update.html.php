<?php /* Smarty version Smarty-3.1.14, created on 2014-07-16 22:46:02
         compiled from "D:\develop\code\www\infectionMap\template\block\case_update.html" */ ?>
<?php /*%%SmartyHeaderCode:2499753c63371dccb75-28635375%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bea6a61540c0dd53cef632bb1cf454d8d0371dec' => 
    array (
      0 => 'D:\\develop\\code\\www\\infectionMap\\template\\block\\case_update.html',
      1 => 1405521957,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2499753c63371dccb75-28635375',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53c63371dfb9a1_66139281',
  'variables' => 
  array (
    'id' => 0,
    'allInfections' => 0,
    'infections' => 0,
    'infection' => 0,
    'infectionID' => 0,
    'allLocations' => 0,
    'continent' => 0,
    'locationID' => 0,
    'country' => 0,
    'city' => 0,
    'startDate' => 0,
    'infectionCase' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c63371dfb9a1_66139281')) {function content_53c63371dfb9a1_66139281($_smarty_tpl) {?><link href="/static/lib/bootstrap_time_picker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<script type="text/javascript" src="/static/lib/bootstrap_time_picker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/static/lib/bootstrap_time_picker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>

<div class="main_content">
<h3>增加新纪录</h3>
<hr>
<div class="">
	<form action="/infection/case_update.php" method="post">
	<table class="input_table" >
		<?php if ($_smarty_tpl->tpl_vars['id']->value){?>
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
		<?php }?>
		<tr>
			<td>
				<span>传染病名称</span>  <a href="/infection/update.php">添加</a>
				<select name="infection_id" class="form-control">
					<option value="0">请选择传染病</option>
					<?php  $_smarty_tpl->tpl_vars['infections'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['infections']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allInfections']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['infections']->key => $_smarty_tpl->tpl_vars['infections']->value){
$_smarty_tpl->tpl_vars['infections']->_loop = true;
?>
					<?php  $_smarty_tpl->tpl_vars['infection'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['infection']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infections']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['infection']->key => $_smarty_tpl->tpl_vars['infection']->value){
$_smarty_tpl->tpl_vars['infection']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['infection']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['infectionID']->value==$_smarty_tpl->tpl_vars['infection']->value['id']){?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['infection']->value['cname'];?>
 </option>
					<?php } ?>
					<?php } ?>
				</select>
			</td>

			<td>
				<span>地点</span> <a href="/location/update.php">添加</a>
				<select name="location_id" class="form-control">
					<option value="0">请选地点</option>
					<?php  $_smarty_tpl->tpl_vars['continent'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['continent']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allLocations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['continent']->key => $_smarty_tpl->tpl_vars['continent']->value){
$_smarty_tpl->tpl_vars['continent']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['continent']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['continent']->value['id']==$_smarty_tpl->tpl_vars['locationID']->value){?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['continent']->value['cname'];?>
</option>
						<?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['country']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['continent']->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value){
$_smarty_tpl->tpl_vars['country']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['country']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['country']->value['id']==$_smarty_tpl->tpl_vars['locationID']->value){?> selected <?php }?>>-<?php echo $_smarty_tpl->tpl_vars['country']->value['cname'];?>
-</option>
							<?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['city']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['country']->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value){
$_smarty_tpl->tpl_vars['city']->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['city']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['city']->value['id']==$_smarty_tpl->tpl_vars['locationID']->value){?> selected <?php }?>>--<?php echo $_smarty_tpl->tpl_vars['city']->value['cname'];?>
--</option>
							<?php } ?>
						<?php } ?>
					<?php } ?>
					
					
				</select>
			</td>
			
			<td>
				<span>发病起始于</span>
				<div class="input-group date form_datetime time_input" >
					<input size="16" type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['startDate']->value;?>
" name="start_date" readonly>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
				</div>
				
			</td>

		</tr>
		<tr>
			<td>
				<span>发病人数</span>
				<input type="text" class="form-control" name="case_number" value="<?php echo $_smarty_tpl->tpl_vars['infectionCase']->value['case_number'];?>
"/>
			</td>

			<td>
				<span>发病几率</span>
				<div class="input-group">
					<input type="text" class="form-control" name="case_rate" value="<?php echo $_smarty_tpl->tpl_vars['infectionCase']->value['case_rate'];?>
"/>
					<span class="input-group-addon">%</span>
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<span>患病人数</span>
				<input type="text" class="form-control" name="ill_number" value="<?php echo $_smarty_tpl->tpl_vars['infectionCase']->value['ill_number'];?>
"/>
			</td>

			<td>
				<span>易患病几率</span>
				<div class="input-group">
					<input type="text" class="form-control" name="ill_rate" value="<?php echo $_smarty_tpl->tpl_vars['infectionCase']->value['ill_rate'];?>
"/>
					<span class="input-group-addon">%</span>
				</div>
			</td>
		</tr>

		<tr>
			
			<td colspan=3> 
				<span>备注</span>
				<textarea class="form-control" rows="3" name="comment"><?php echo $_smarty_tpl->tpl_vars['infectionCase']->value['comment'];?>
</textarea>
			</td>
		</tr>

	</table>

	<input type="submit" class="btn" value="提交">
	<?php if ($_smarty_tpl->tpl_vars['id']->value){?>
	<a class="btn btn-success" href="/infection/case_update.php">增加新纪录</a>
	<?php }?>
	</form>
</div>
</div>

<script>
$('.form_datetime').datetimepicker({
    language:  'zh-CN',
    weekStart: 1,
    todayBtn:  1,
	autoclose: 1,
	todayHighlight: 1,
	startView: 2,
	minView: 2,
	forceParse: 0,
	format: 'yyyy-mm-dd'
});
</script>
<?php }} ?>