<?php /* Smarty version Smarty-3.1.14, created on 2014-08-12 23:09:59
         compiled from "D:\develop\web\www\infectionMap\template\infection\list.html" */ ?>
<?php /*%%SmartyHeaderCode:184453ea2ac237ab12-62450515%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6406003c3b7734ce937c8b96f0ad6132e81c5d9' => 
    array (
      0 => 'D:\\develop\\web\\www\\infectionMap\\template\\infection\\list.html',
      1 => 1407856194,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184453ea2ac237ab12-62450515',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53ea2ac23a5a91_10045873',
  'variables' => 
  array (
    'infections' => 0,
    'infection' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ea2ac23a5a91_10045873')) {function content_53ea2ac23a5a91_10045873($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/static/css/infectious.css">
<div class="wrap iList">
	<div class="itable">
		<div class="btn-l">
			<a href="/infection/update.php" class="btn" target="_blank">新增传染病</a>
		</div>

		<table>
			<thead>
				<tr>
					<td>传染病名称</td>
					<td>传染病英文</td>
					<td>病原体名称</td>
					<td>病原体英文</td>
					<td>分类学地位</td>
					<td>操作</td>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['infection'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['infection']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infections']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['infection']->key => $_smarty_tpl->tpl_vars['infection']->value){
$_smarty_tpl->tpl_vars['infection']->_loop = true;
?>
				<tr id="infection_<?php echo $_smarty_tpl->tpl_vars['infection']->value['id'];?>
">
					<td><?php echo $_smarty_tpl->tpl_vars['infection']->value['cname'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['infection']->value['ename'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['infection']->value['pathogen_cname'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['infection']->value['pathogen_ename'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['infection']->value['taxonomy'];?>
</td>
					<td>
						<a href="/infection/update.php?id=<?php echo $_smarty_tpl->tpl_vars['infection']->value['id'];?>
" target="_blank" class="icon icon_edit"></a>
						<a href="javascript:void(0);" class="icon icon_delete" onclick="delInfection(<?php echo $_smarty_tpl->tpl_vars['infection']->value['id'];?>
);"></a>
					</td>
				</tr>
				<?php } ?>

			</tbody>
		</table>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script>
var delInfectionUrl = "/api.php?action=infection&method=del";

function delInfection(infectionID){
	var conRes = confirm('你确定要删除此疾病吗, 这样会丢失数据!!!');
	if(!conRes){
		return false;
	}
	var url = delInfectionUrl + "&infection_id=" + infectionID;
	$.getJSON(url,function(json){
		if(json['code'] != 22000){
			alert(json['message']);
			return false;
		}
		
		$("#infection_"+infectionID).fadeOut();
	});
}
</script><?php }} ?>