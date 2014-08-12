<?php /* Smarty version Smarty-3.1.14, created on 2014-08-12 17:59:27
         compiled from "D:\develop\web\www\infectionMap\template\header.html" */ ?>
<?php /*%%SmartyHeaderCode:1943753ce36d0154228-23954327%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8daf61e4cf2c64831627978c2f6ced55df47dce' => 
    array (
      0 => 'D:\\develop\\web\\www\\infectionMap\\template\\header.html',
      1 => 1407837558,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1943753ce36d0154228-23954327',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53ce36d0154222_43939479',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ce36d0154222_43939479')) {function content_53ce36d0154222_43939479($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("html_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="header">
	<div class="wrap">
		<a class="btn reback" href="/">返回首页</a>
		<h1><img src="/static/img/ims-logo.png" alt="">港口传染病地图</h1>
		<div class="r-menu">
			<a href="#" ><span class="username">admin</span><span class="role">(系统管理员)▼</span></a>
			<a href="#">退出</a>
		</div>
		<div class="d-menu">
			<ul>
				<li><a href="#">修改密码</a></li>
				<li><a href="#">退出</a></li>
			</ul>
		</div>
	</div>
</div><?php }} ?>