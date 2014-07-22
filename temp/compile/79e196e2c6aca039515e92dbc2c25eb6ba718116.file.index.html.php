<?php /* Smarty version Smarty-3.1.14, created on 2014-07-18 01:58:35
         compiled from "D:\develop\code\www\infectionMap\template\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2719553c3a817d1dfd3-76312924%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79e196e2c6aca039515e92dbc2c25eb6ba718116' => 
    array (
      0 => 'D:\\develop\\code\\www\\infectionMap\\template\\index.html',
      1 => 1405616555,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2719553c3a817d1dfd3-76312924',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53c3a817da6b94_25767616',
  'variables' => 
  array (
    'allInfections' => 0,
    'char' => 0,
    'infections' => 0,
    'infection' => 0,
    'allLocations' => 0,
    'continent' => 0,
    'country' => 0,
    'city' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c3a817da6b94_25767616')) {function content_53c3a817da6b94_25767616($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("http_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="container main">
	<div class="top_seach">
		<h1 class="text-center"><strong>传染病地图</strong></h1>
		<br />
		<form class="form">
			<div class="form-group">
				<div class="col-md-6 col-md-offset-2">
					<input  type= "text" class="form-control input-lg" name="key" placeholder="Search Data" />
				</div>
				<div class="col-md-4">
					<input type="submit" class="btn btn-primary btn-lg" value="搜疾病"/>
					<input type="submit" class="btn btn-success btn-lg" value="搜地区"/>
				</div>
			</div>
		</form>
	</div>
	<div class="clearfix"></div>
	<br />
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<h3>传染病 <small>(<a href="/infection/list.php">管理</a>)</small></h3>
				</div>
				
				<div class="col-md-3 col-md-offset-3">
					<a class="btn btn-success btn-sm" href="/infection/update.php">新增传染病</a>
				</div>
			</div>

			<div class="index_block">
				<table class="table table-striped">
				<?php  $_smarty_tpl->tpl_vars['infections'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['infections']->_loop = false;
 $_smarty_tpl->tpl_vars['char'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allInfections']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['infections']->key => $_smarty_tpl->tpl_vars['infections']->value){
$_smarty_tpl->tpl_vars['infections']->_loop = true;
 $_smarty_tpl->tpl_vars['char']->value = $_smarty_tpl->tpl_vars['infections']->key;
?>
					<tr><td><?php echo $_smarty_tpl->tpl_vars['char']->value;?>
</td></tr>
					<tr><td>
					<?php  $_smarty_tpl->tpl_vars['infection'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['infection']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infections']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['infection']->key => $_smarty_tpl->tpl_vars['infection']->value){
$_smarty_tpl->tpl_vars['infection']->_loop = true;
?>
						<a href="/infection/detail.php?id=<?php echo $_smarty_tpl->tpl_vars['infection']->value['id'];?>
"><span class="index_item"><?php echo $_smarty_tpl->tpl_vars['infection']->value['cname'];?>
</span></a> 
					<?php } ?>
					</td></tr>
				<?php } ?>
				</table>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<h3>地点</h3>
				</div>
	
				<div class="col-md-3 col-md-offset-3">
					<a class="btn btn-success btn-sm" href="/location/update.php">新增地点</a>
				</div>
			</div>

			<div class="index_block">
				<?php  $_smarty_tpl->tpl_vars['continent'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['continent']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allLocations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['continent']->key => $_smarty_tpl->tpl_vars['continent']->value){
$_smarty_tpl->tpl_vars['continent']->_loop = true;
?>
				<div class="panel">
					<div class="panel-heading">
						<h3><?php echo $_smarty_tpl->tpl_vars['continent']->value['cname'];?>
</h3>
					</div>

					
					<table class="table table-striped">
						<?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['country']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['continent']->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value){
$_smarty_tpl->tpl_vars['country']->_loop = true;
?>
							<tr><td><a class="index_item" href="/location/detail.php?id=<?php echo $_smarty_tpl->tpl_vars['country']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['country']->value['cname'];?>
</a></td></tr>
							<tr><td>
							<?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['city']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['country']->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value){
$_smarty_tpl->tpl_vars['city']->_loop = true;
?>
								<a href="/location/detail.php?id=<?php echo $_smarty_tpl->tpl_vars['city']->value['id'];?>
"><span class="index_item"><?php echo $_smarty_tpl->tpl_vars['city']->value['cname'];?>
</span></a>
							<?php } ?>
							</td></tr>
						<?php } ?>
					</table>
					
				</div>
				<?php } ?>
			</div>

		</div>
	</div>
	
</div>
<?php echo $_smarty_tpl->getSubTemplate ("http_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>