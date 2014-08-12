<?php /* Smarty version Smarty-3.1.14, created on 2014-08-12 23:56:43
         compiled from "D:\develop\web\www\infectionMap\template\search\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2509653ea3195908587-42875896%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e8d7735f7ebf746068470299d3c867eae66ac81' => 
    array (
      0 => 'D:\\develop\\web\\www\\infectionMap\\template\\search\\index.html',
      1 => 1407858999,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2509653ea3195908587-42875896',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53ea3195952911_22777321',
  'variables' => 
  array (
    'keyword' => 0,
    'locationResult' => 0,
    'location' => 0,
    'infectionResult' => 0,
    'infection' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ea3195952911_22777321')) {function content_53ea3195952911_22777321($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("block/search_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="searchResult">
<?php if ($_smarty_tpl->tpl_vars['keyword']->value){?>
	<?php if ($_smarty_tpl->tpl_vars['locationResult']->value){?>
		<h3 class="hotip">为您找到 <span class="kw">[<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
]</span> 相关的地区：
		<?php  $_smarty_tpl->tpl_vars['location'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['location']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['locationResult']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['location']->key => $_smarty_tpl->tpl_vars['location']->value){
$_smarty_tpl->tpl_vars['location']->_loop = true;
?>
		<a href="/location/detail.php?id=<?php echo $_smarty_tpl->tpl_vars['location']->value['id'];?>
" target="_blank" class="tag"><?php echo $_smarty_tpl->tpl_vars['location']->value['cname'];?>
</a>
		<?php } ?>
		</h3>
	<?php }elseif($_smarty_tpl->tpl_vars['infectionResult']->value){?>
		<h3 class="hotip">为您找到 <span class="kw">[<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
]</span> 相关的疾病：
		<?php  $_smarty_tpl->tpl_vars['infection'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['infection']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infectionResult']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['infection']->key => $_smarty_tpl->tpl_vars['infection']->value){
$_smarty_tpl->tpl_vars['infection']->_loop = true;
?>
		<a href="/infection/detail.php?id=<?php echo $_smarty_tpl->tpl_vars['infection']->value['id'];?>
" target="_blank" class="tag"><?php echo $_smarty_tpl->tpl_vars['infection']->value['cname'];?>
</a>
		<?php } ?>
		</h3>	
	<?php }elseif($_smarty_tpl->tpl_vars['type']->value==2){?>
		<h3 class="hotip">没有找到<span class="kw">[<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
]</span> 相关的地区：<a href="/location/update.php?cname=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
" class="tag">创建该地点</a></h3>
	<?php }else{ ?>
		<h3 class="hotip">没有找到<span class="kw">[<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
]</span> 相关的疾病：<a href="/infection/update.php?cname=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
" class="tag">创建该疾病</a></h3>
	<?php }?>
<?php }?>
</div>

	
<?php echo $_smarty_tpl->getSubTemplate ("block/search_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>