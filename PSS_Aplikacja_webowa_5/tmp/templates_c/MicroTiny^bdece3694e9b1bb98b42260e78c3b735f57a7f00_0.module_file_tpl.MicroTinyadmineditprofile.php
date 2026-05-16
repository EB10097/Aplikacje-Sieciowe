<?php
/* Smarty version 4.2.1, created on 2026-05-16 14:36:39
  from 'module_file_tpl:MicroTiny;admin_editprofile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6a0864d7953986_29993009',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bdece3694e9b1bb98b42260e78c3b735f57a7f00' => 
    array (
      0 => 'module_file_tpl:MicroTiny;admin_editprofile.tpl',
      1 => 1777739842,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a0864d7953986_29993009 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.form_start.php','function'=>'smarty_function_form_start',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.cms_help.php','function'=>'smarty_function_cms_help',),2=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.cms_yesno.php','function'=>'smarty_cms_function_cms_yesno',),3=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\smarty\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),4=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.form_end.php','function'=>'smarty_function_form_end',),));
?>
<h3><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('edit_profile');?>
: <em><?php echo $_smarty_tpl->tpl_vars['data']->value['label'];?>
</em></h3>

<?php echo smarty_function_form_start(array(),$_smarty_tpl);?>

	<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
profile" value="<?php echo $_smarty_tpl->tpl_vars['profile']->value;?>
"/>
	<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
origname" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
"/>

	<?php if ($_smarty_tpl->tpl_vars['data']->value['system']) {?><div class="information"><?php $_smarty_tpl->_assignInScope('tmp', ('profiledesc_').($_smarty_tpl->tpl_vars['data']->value['name']));
echo $_smarty_tpl->tpl_vars['mod']->value->Lang($_smarty_tpl->tpl_vars['tmp']->value);?>
</div><?php }?>

	<div class="pageoverflow">
		<p class="pagetext"></p>
		<p class="pageinput">
			<input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('submit');?>
"/>
			<input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
cancel" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('cancel');?>
"/>
		</p>
	</div>

	<?php if (!$_smarty_tpl->tpl_vars['data']->value['system']) {?>
		<div class="pageoverflow">
			<p class="pagetext">
				<label for="profile_name">*<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('profile_name');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'mthelp_profilename','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('profile_name')),$_smarty_tpl);?>

			</p>
			<p class="pageinput">
				<input type="text" size="40" id="profile_name" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
profile_name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
" />
			</p>
		</div>

		<div class="pageoverflow">
			<p class="pagetext">
				<label for="profile_label">*<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('profile_label');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'mthelp_profilelabel','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('profile_label')),$_smarty_tpl);?>

			</p>
			<p class="pageinput">
				<input type="text" size="80" id="profile_label" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
profile_label" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['label'];?>
" />
			</p>
		</div>
	<?php }?>

	<div class="pageoverflow">
		<p class="pagetext">
			<label for="profile_menubar"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('profile_menubar');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'mthelp_profilemenubar','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('profile_menubar')),$_smarty_tpl);?>

		</p>
		<p class="pageinput">
			<select id="profile_menubar" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
profile_menubar"><?php echo smarty_cms_function_cms_yesno(array('selected'=>$_smarty_tpl->tpl_vars['data']->value['menubar']),$_smarty_tpl);?>
</select>
		</p>
	</div>

	<div class="pageoverflow">
		<p class="pagetext">
			<label for="profile_allowimages"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('profile_allowimages');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'mthelp_profileallowimages','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('profile_allowimages')),$_smarty_tpl);?>

		</p>
		<p class="pageinput">
			<select id="profile_allowimages" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
profile_allowimages"><?php echo smarty_cms_function_cms_yesno(array('selected'=>$_smarty_tpl->tpl_vars['data']->value['allowimages']),$_smarty_tpl);?>
</select>
		</p>
	</div>

	<div class="pageoverflow">
		<p class="pagetext">
			<label for="profile_allowtables"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('profile_allowtables');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'mthelp_profileallowtables','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('profile_allowtables')),$_smarty_tpl);?>

		</p>
		<p class="pageinput">
			<select id="profile_allowtables" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
profile_allowtables"><?php echo smarty_cms_function_cms_yesno(array('selected'=>$_smarty_tpl->tpl_vars['data']->value['allowtables']),$_smarty_tpl);?>
</select>
		</p>
	</div>

	<div class="pageoverflow">
		<p class="pagetext">
			<label for="profile_showstatusbar"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('profile_showstatusbar');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'mthelp_profilestatusbar','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('profile_showstatusbar')),$_smarty_tpl);?>

		</p>
		<p class="pageinput">
			<select id="profile_showstatusbar" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
profile_showstatusbar"><?php echo smarty_cms_function_cms_yesno(array('selected'=>$_smarty_tpl->tpl_vars['data']->value['showstatusbar']),$_smarty_tpl);?>
</select>
		</p>
	</div>

	<div class="pageoverflow">
		<p class="pagetext">
			<label for="profile_allowresize"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('profile_allowresize');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'mthelp_profileresize','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('profile_allowresize')),$_smarty_tpl);?>

		</p>
		<p class="pageinput">
			<select id="profile_allowresize" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
profile_allowresize"><?php echo smarty_cms_function_cms_yesno(array('selected'=>$_smarty_tpl->tpl_vars['data']->value['allowresize']),$_smarty_tpl);?>
</select>
		</p>
	</div>

	<div class="pageoverflow">
		<p class="pagetext">
			<label for="profile_dfltstylesheet"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('profile_dfltstylesheet');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'mthelp_dfltstylesheet','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('profile_dfltstylesheet')),$_smarty_tpl);?>

		</p>
		<p class="pageinput">
			<select id="profile_dfltstylesheet" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
profile_dfltstylesheet">
				<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['stylesheets']->value,'selected'=>$_smarty_tpl->tpl_vars['data']->value['dfltstylesheet']),$_smarty_tpl);?>

			</select>
		</p>
	</div>

	<div class="pageoverflow">
		<p class="pagetext">
			<label for="profile_allowcssoverride"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('profile_allowcssoverride');?>
:</label>&nbsp;<?php echo smarty_function_cms_help(array('key2'=>'mthelp_allowcssoverride','title'=>$_smarty_tpl->tpl_vars['mod']->value->Lang('profile_allowcssoverride')),$_smarty_tpl);?>

		</p>
		<p class="pageinput">
			<select id="profile_allowcssoverride" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
profile_allowcssoverride"><?php echo smarty_cms_function_cms_yesno(array('selected'=>$_smarty_tpl->tpl_vars['data']->value['allowcssoverride']),$_smarty_tpl);?>
</select>
		</p>
	</div>

	<div class="pageoverflow">
		<p class="pagetext"></p>
		<p class="pageinput">
			<input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('submit');?>
"/>
			<input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
cancel" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('cancel');?>
"/>
		</p>
	</div>
<?php echo smarty_function_form_end(array(),$_smarty_tpl);
}
}
