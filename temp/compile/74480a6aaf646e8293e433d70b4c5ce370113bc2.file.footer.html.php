<?php /* Smarty version Smarty-3.1.14, created on 2014-08-12 16:25:01
         compiled from "D:\develop\web\www\infectionMap\template\footer.html" */ ?>
<?php /*%%SmartyHeaderCode:1488253ce36d0154221-22626857%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74480a6aaf646e8293e433d70b4c5ce370113bc2' => 
    array (
      0 => 'D:\\develop\\web\\www\\infectionMap\\template\\footer.html',
      1 => 1407831898,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1488253ce36d0154221-22626857',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53ce36d0154222_12169533',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ce36d0154222_12169533')) {function content_53ce36d0154222_12169533($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("html_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
$(function(){
	var $dMenu = $('.d-menu');
	$('.r-menu a:first').on('click', function(event){  // down menu slideDown and slideUp handler
		event.preventDefault();
		event.stopPropagation();

		if($('.d-menu:visible').length > 0){
			$dMenu.slideUp();
		}else{
			$dMenu.slideDown();
		}
	});
	$('body').on('click', function(event){
		$('.d-menu').slideUp();
	});
});
</script>
<?php }} ?>