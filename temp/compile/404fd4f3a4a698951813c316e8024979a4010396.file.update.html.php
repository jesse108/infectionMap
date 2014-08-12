<?php /* Smarty version Smarty-3.1.14, created on 2014-08-12 20:24:56
         compiled from "D:\develop\web\www\infectionMap\template\infection\update.html" */ ?>
<?php /*%%SmartyHeaderCode:3202753e9e8795a3c08-74451883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '404fd4f3a4a698951813c316e8024979a4010396' => 
    array (
      0 => 'D:\\develop\\web\\www\\infectionMap\\template\\infection\\update.html',
      1 => 1407846282,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3202753e9e8795a3c08-74451883',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53e9e8795edf90_39100771',
  'variables' => 
  array (
    'id' => 0,
    'infection' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53e9e8795edf90_39100771')) {function content_53e9e8795edf90_39100771($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrap">
	<div class="form-wrap">
		<h2>新增传染病</h2>
		<form action="/infection/update.php" id="infection_form" method="post">
			<?php if ($_smarty_tpl->tpl_vars['id']->value){?>
				<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
			<?php }?>
			
			<div class="row">
				<div class="afield">
					<label for="iName" class="t">传染病名称</label>
					<div class="main">
						<input type="text" class="ainput" name="cname" value="<?php echo $_smarty_tpl->tpl_vars['infection']->value['cname'];?>
" id="cname">
					</div>
				</div>
				
				<div class="afield">
					<label for="iEnName" class="t">传染病英文名称</label>
					<div class="main">
						<input type="text" class="ainput" name="ename" value="<?php echo $_smarty_tpl->tpl_vars['infection']->value['ename'];?>
" id="iEnName">
					</div>
				</div>

			</div>

			<div class="row">
				<div class="afield">
					<label for="pathogenName" class="t">病原体名称</label>
					<div class="main">
						<input type="text" class="ainput" name="pathogen_cname" value="<?php echo $_smarty_tpl->tpl_vars['infection']->value['pathogen_cname'];?>
" id="pathogenName">
					</div>
				</div>
				
				<div class="afield">
					<label for="pathogenEnName" class="t">病原体英文</label>
					<div class="main">
						<input type="text" class="ainput" name="pathogen_ename" value="<?php echo $_smarty_tpl->tpl_vars['infection']->value['pathogen_ename'];?>
" id="pathogenEnName">
					</div>
				</div>

				<div class="afield lastAfield">
					<label for="Taxonomy" class="t">分类学地位</label>
					<div class="main">
						<input type="text" class="ainput" name="taxonomy" value="<?php echo $_smarty_tpl->tpl_vars['infection']->value['taxonomy'];?>
" id="Taxonomy">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="afield">
					<label for="sources" class="t">传染源</label>
					<div class="main">
						<input type="text" class="ainput" name="infection_source" value="<?php echo $_smarty_tpl->tpl_vars['infection']->value['infection_source'];?>
" id="sources">
					</div>
				</div>
				<div class="afield">
					<label for="Susceptible" class="t">易感人群</label>
					<div class="main">
						<input type="text" class="ainput" name="susceptible_pop" value="<?php echo $_smarty_tpl->tpl_vars['infection']->value['susceptible_pop'];?>
" id="Susceptible">
					</div>
				</div>

				<div class="afield lastAfield">
					<label for="transmission" class="t">传播途径</label>
					<div class="main">
						<input type="text" class="ainput" name="infection_path" value="<?php echo $_smarty_tpl->tpl_vars['infection']->value['infection_path'];?>
" id="transmission">
					</div>
				</div>
			</div>

			<div class="line">
				<div class="afield">
					<label for="stander" class="t">诊断标准</label>
					<div class="main">
						<textarea name="judge_standard" id="standard" cols="30" rows="5"><?php echo $_smarty_tpl->tpl_vars['infection']->value['judge_standard'];?>
</textarea>
					</div>
				</div>
			</div>
			
						<div class="line">
				<div class="afield">
					<label for="stander" class="t">预防措施</label>
					<div class="main">
						<textarea name="prevention" id="prevention" cols="30" rows="5"><?php echo $_smarty_tpl->tpl_vars['infection']->value['prevention'];?>
</textarea>
					</div>
				</div>
			</div>
			
						<div class="line">
				<div class="afield">
					<label for="stander" class="t">治疗措施</label>
					<div class="main">
						<textarea name="treatment" id="treatment" cols="30" rows="5"><?php echo $_smarty_tpl->tpl_vars['infection']->value['treatment'];?>
</textarea>
					</div>
				</div>
			</div>


			<div class="btn-c">
				<input type="submit" value="完成" class="btn sBtn">
			</div>
		</form>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>