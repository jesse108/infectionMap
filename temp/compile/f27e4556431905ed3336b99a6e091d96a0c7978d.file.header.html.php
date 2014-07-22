<?php /* Smarty version Smarty-3.1.14, created on 2014-07-16 15:36:38
         compiled from "D:\develop\code\www\infectionMap\template\header.html" */ ?>
<?php /*%%SmartyHeaderCode:2594453c3a817db6596-07245162%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f27e4556431905ed3336b99a6e091d96a0c7978d' => 
    array (
      0 => 'D:\\develop\\code\\www\\infectionMap\\template\\header.html',
      1 => 1405496161,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2594453c3a817db6596-07245162',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53c3a817dba415_78481269',
  'variables' => 
  array (
    'headerTitle' => 0,
    'systemError' => 0,
    'systemNotice' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c3a817dba415_78481269')) {function content_53c3a817dba415_78481269($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("http_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="header">
	<div class="row">
		<div class="col-md-1 col-md-offset-1">
			<a href="/" class="btn btn-primary">< 返回首页</a>
		</div>
		<div class="col-md-5 text-center col-md-offset-1">
			<h2><?php echo $_smarty_tpl->tpl_vars['headerTitle']->value;?>
</h2>
		</div>

		<div class="col-md-2">
			<a href="#" class="btn">点击登录</a>
		</div>
	</div>
	
</div>

<div class="main">

<?php if (!isset($_smarty_tpl->tpl_vars['systemError'])) $_smarty_tpl->tpl_vars['systemError'] = new Smarty_Variable(null);if ($_smarty_tpl->tpl_vars['systemError']->value = System::GetError()){?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <?php echo $_smarty_tpl->tpl_vars['systemError']->value;?>

</div>
<?php }?>

<?php if (!isset($_smarty_tpl->tpl_vars['systemNotice'])) $_smarty_tpl->tpl_vars['systemNotice'] = new Smarty_Variable(null);if ($_smarty_tpl->tpl_vars['systemNotice']->value = System::GetNotice()){?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <?php echo $_smarty_tpl->tpl_vars['systemNotice']->value;?>

</div>
<?php }?><?php }} ?>