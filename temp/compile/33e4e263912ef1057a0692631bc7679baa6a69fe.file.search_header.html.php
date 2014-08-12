<?php /* Smarty version Smarty-3.1.14, created on 2014-08-12 23:53:01
         compiled from "D:\develop\web\www\infectionMap\template\block\search_header.html" */ ?>
<?php /*%%SmartyHeaderCode:3174353ea32ebc3ee50-28942578%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33e4e263912ef1057a0692631bc7679baa6a69fe' => 
    array (
      0 => 'D:\\develop\\web\\www\\infectionMap\\template\\block\\search_header.html',
      1 => 1407858777,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3174353ea32ebc3ee50-28942578',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53ea32ebc75965_57591076',
  'variables' => 
  array (
    'keyword' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ea32ebc75965_57591076')) {function content_53ea32ebc75965_57591076($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("html_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" type="text/css" href="/static/css/index.css">

<div class="header">
	<div class="wrap">
		<div class="tip"><a href="#">管理员登陆</a></div>
	</div>
</div>

<div class="wrap search">
	<h1><img src="/static/img/ims-logo.png" alt="">港口传染病地图</h1>

	<div class="main">
		<form action="/search/index.php" method="get" id="search_form">
			<input type="text" class="ainput" id="keyword" name="keyword" value="<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
">
			<input type="hidden" value="" name="type" />
			<input type="button" value="搜疾病" class="btn abtn" onclick="search_submit(1)">
			<input type="button" value="搜地点" class="btn bbtn" onclick="search_submit(2)">
		</form>
	</div>
</div><?php }} ?>