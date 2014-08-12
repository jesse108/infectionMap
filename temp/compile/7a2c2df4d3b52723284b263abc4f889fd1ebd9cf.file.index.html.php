<?php /* Smarty version Smarty-3.1.14, created on 2014-08-12 23:30:58
         compiled from "D:\develop\web\www\infectionMap\template\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2011253ce36cd8c7ed0-17083131%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a2c2df4d3b52723284b263abc4f889fd1ebd9cf' => 
    array (
      0 => 'D:\\develop\\web\\www\\infectionMap\\template\\index.html',
      1 => 1407857446,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2011253ce36cd8c7ed0-17083131',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53ce36cd941cd7_64900943',
  'variables' => 
  array (
    'allInfections' => 0,
    'char' => 0,
    'infections' => 0,
    'infection' => 0,
    'allLocations' => 0,
    'contient' => 0,
    'country' => 0,
    'city' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ce36cd941cd7_64900943')) {function content_53ce36cd941cd7_64900943($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("block/search_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrap tags">
	<div class="tagsItem imItem">
		<div class="tit">
			<span class="h2">传染病</span><a href="/infection/list.php">［管理］</a>
			<a href="/infection/update.php" class="btn cbtn">新增传染病</a>
		</div>
		<div class="cont">
			<?php  $_smarty_tpl->tpl_vars['infections'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['infections']->_loop = false;
 $_smarty_tpl->tpl_vars['char'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allInfections']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['infections']->key => $_smarty_tpl->tpl_vars['infections']->value){
$_smarty_tpl->tpl_vars['infections']->_loop = true;
 $_smarty_tpl->tpl_vars['char']->value = $_smarty_tpl->tpl_vars['infections']->key;
?>
			<div class="t"><?php echo $_smarty_tpl->tpl_vars['char']->value;?>
</div>
			<ul class="tagsList">
				<?php  $_smarty_tpl->tpl_vars['infection'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['infection']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infections']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['infection']->key => $_smarty_tpl->tpl_vars['infection']->value){
$_smarty_tpl->tpl_vars['infection']->_loop = true;
?>
				<li><a href="/infection/detail.php?id=<?php echo $_smarty_tpl->tpl_vars['infection']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['infection']->value['cname'];?>
</a></li>
				<?php } ?>
			</ul>
			<?php } ?>
		</div>
	</div>

	<div class="tagsItem cityItem">
		<div class="tit">
			<span class="h2">地点</span><a href="#">［管理］</a>
			<a href="/location/update.php" class="btn cbtn">新增地点</a>
		</div>
		<div class="cont">
			<?php  $_smarty_tpl->tpl_vars['contient'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['contient']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allLocations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['contient']->key => $_smarty_tpl->tpl_vars['contient']->value){
$_smarty_tpl->tpl_vars['contient']->_loop = true;
?>
				<?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['country']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contient']->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value){
$_smarty_tpl->tpl_vars['country']->_loop = true;
?>
					<?php if ($_smarty_tpl->tpl_vars['country']->value['sub']){?>
						<div class="t"><?php echo $_smarty_tpl->tpl_vars['country']->value['cname'];?>
</div>
						<ul class="tagsList">
						<?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['city']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['country']->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value){
$_smarty_tpl->tpl_vars['city']->_loop = true;
?>
						<li><a href="#"><?php echo $_smarty_tpl->tpl_vars['city']->value['cname'];?>
</a></li>
						<?php } ?>
						</ul>
					<?php }?>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("block/search_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>