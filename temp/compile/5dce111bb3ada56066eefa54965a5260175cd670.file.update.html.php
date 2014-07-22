<?php /* Smarty version Smarty-3.1.14, created on 2014-07-15 22:11:19
         compiled from "D:\develop\code\www\infectionMap\template\infection\update.html" */ ?>
<?php /*%%SmartyHeaderCode:1723053c4d3ff66a146-80055545%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5dce111bb3ada56066eefa54965a5260175cd670' => 
    array (
      0 => 'D:\\develop\\code\\www\\infectionMap\\template\\infection\\update.html',
      1 => 1405433476,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1723053c4d3ff66a146-80055545',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53c4d3ff66a149_01390610',
  'variables' => 
  array (
    'id' => 0,
    'infection' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c4d3ff66a149_01390610')) {function content_53c4d3ff66a149_01390610($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="main_content">
<h3>新增传染病</h3>

<div class="">
	<form action="/infection/update.php" method="post">
	<table class="input_table" >
		<?php if ($_smarty_tpl->tpl_vars['id']->value){?>
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
		<?php }?>
		<tr>
			<td>
				<span>传染病名称</span>
				<input type="text" class="form-control" name="cname" value="<?php echo $_smarty_tpl->tpl_vars['infection']->value['cname'];?>
"/>
			</td>

			<td>
				<span>传染病英文名</span>
				<input type="text" class="form-control" name="ename" value="<?php echo $_smarty_tpl->tpl_vars['infection']->value['ename'];?>
"/>
			</td>

		</tr>
		<tr>
			<td>
				<span>病原体名称</span>
				<input type="text" class="form-control" name="pathogen_cname" value="<?php echo $_smarty_tpl->tpl_vars['infection']->value['pathogen_cname'];?>
"/>
			</td>

			<td>
				<span>病原体英文名</span>
				<input type="text" class="form-control" name="pathogen_ename" value="<?php echo $_smarty_tpl->tpl_vars['infection']->value['pathogen_ename'];?>
"/>
			</td>
			<td>
				<span>分类学地位</span>
				<input type="text" class="form-control" name="taxonomy" value="<?php echo $_smarty_tpl->tpl_vars['infection']->value['taxonomy'];?>
"/>
			</td>
		</tr>

		<tr>
			<td>
				<span>传染源</span>
				<input type="text" class="form-control" name="infection_source" value="<?php echo $_smarty_tpl->tpl_vars['infection']->value['infection_source'];?>
"/>
			</td>

			<td>
				<span>易感人群</span>
				<input type="text" class="form-control" name="susceptible_pop" value="<?php echo $_smarty_tpl->tpl_vars['infection']->value['susceptible_pop'];?>
"/>
			</td>
			<td>
				<span>传染途径</span>
				<input type="text" class="form-control" name="infection_path" value="<?php echo $_smarty_tpl->tpl_vars['infection']->value['infection_path'];?>
"/>
			</td>
		</tr>

		<tr>
			
			<td colspan=3> 
				<span>诊断标准</span>
				<textarea class="form-control" rows="3" name="judge_standard"><?php echo $_smarty_tpl->tpl_vars['infection']->value['judge_standard'];?>
</textarea>
			</td>
		</tr>

		<tr>
			
			<td colspan=3> 
				<span>预防措施</span>
				<textarea class="form-control" rows="3" name="prevention"><?php echo $_smarty_tpl->tpl_vars['infection']->value['prevention'];?>
</textarea>
			</td>
		</tr>

		<tr>
			
			<td colspan=3> 
				<span>治疗措施</span>
				<textarea class="form-control" rows="3" name="treatment"><?php echo $_smarty_tpl->tpl_vars['infection']->value['treatment'];?>
</textarea>
			</td>
		</tr>

	</table>

	<input type="submit" value="提交">
	</form>
</div>


</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>