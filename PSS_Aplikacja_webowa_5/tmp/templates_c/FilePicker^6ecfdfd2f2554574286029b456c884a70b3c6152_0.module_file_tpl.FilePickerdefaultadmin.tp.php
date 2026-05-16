<?php
/* Smarty version 4.2.1, created on 2026-05-16 14:53:48
  from 'module_file_tpl:FilePicker;defaultadmin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6a0868dc7efa07_09727990',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ecfdfd2f2554574286029b456c884a70b3c6152' => 
    array (
      0 => 'module_file_tpl:FilePicker;defaultadmin.tpl',
      1 => 1777739842,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a0868dc7efa07_09727990 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.cms_action_url.php','function'=>'smarty_cms_function_cms_action_url',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\admin\\plugins\\function.admin_icon.php','function'=>'smarty_function_admin_icon',),2=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\smarty\\plugins\\function.cycle.php','function'=>'smarty_function_cycle',),3=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\modifier.cms_escape.php','function'=>'smarty_modifier_cms_escape',),4=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\modifier.cms_date_format.php','function'=>'smarty_modifier_cms_date_format',),));
?>
<div class="pageoptions">
  <a href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'edit_profile'),$_smarty_tpl);?>
"><?php echo smarty_function_admin_icon(array('alt'=>((string)$_smarty_tpl->tpl_vars['mod']->value->Lang('add_profile')),'title'=>((string)$_smarty_tpl->tpl_vars['mod']->value->Lang('add_profile')),'icon'=>'newobject.gif'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('add_profile');?>
</a>
</div>

<table class="pagetable">
    <thead>
      <tr>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('th_id');?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('th_name');?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('th_reltop');?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('th_default');?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('th_created');?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('th_last_edited');?>
</th>
        <th class="pageicon">&nbsp;</th>
        <th class="pageicon">&nbsp;</th>
      </tr>
    </thead>
    <tbody>
	<?php if (!empty($_smarty_tpl->tpl_vars['profiles']->value)) {?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profiles']->value, 'profile');
$_smarty_tpl->tpl_vars['profile']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['profile']->value) {
$_smarty_tpl->tpl_vars['profile']->do_else = false;
?>
		  <tr class="<?php echo smarty_function_cycle(array('values'=>'row1,row2'),$_smarty_tpl);?>
">
			<?php echo smarty_cms_function_cms_action_url(array('action'=>'edit_profile','pid'=>$_smarty_tpl->tpl_vars['profile']->value->id,'assign'=>'edit_url'),$_smarty_tpl);?>

			<td><?php echo $_smarty_tpl->tpl_vars['profile']->value->id;?>
</td>
			<td><a href="<?php echo $_smarty_tpl->tpl_vars['edit_url']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('edit_profile');?>
"><?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['profile']->value->name);?>
</a></td>
		<td><?php echo $_smarty_tpl->tpl_vars['profile']->value->reltop;?>
</td>
		<td>
		   <?php if ($_smarty_tpl->tpl_vars['profile']->value->id == $_smarty_tpl->tpl_vars['dflt_profile_id']->value) {?>
			 <?php echo smarty_function_admin_icon(array('title'=>lang('yes'),'icon'=>'true.gif'),$_smarty_tpl);?>

		   <?php } else { ?>
			 <a href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'setdflt_profile','pid'=>$_smarty_tpl->tpl_vars['profile']->value->id),$_smarty_tpl);?>
"><?php echo smarty_function_admin_icon(array('title'=>lang('no'),'icon'=>'false.gif'),$_smarty_tpl);?>
</a>
		   <?php }?>
		</td>
			<td><?php echo smarty_modifier_cms_date_format($_smarty_tpl->tpl_vars['profile']->value->create_date);?>
</td>
			<td><?php echo smarty_modifier_cms_date_format($_smarty_tpl->tpl_vars['profile']->value->modified_date);?>
</td>
			<td><a href="<?php echo $_smarty_tpl->tpl_vars['edit_url']->value;?>
" class="pageoptions"><?php echo smarty_function_admin_icon(array('alt'=>((string)$_smarty_tpl->tpl_vars['mod']->value->Lang('edit_profile')),'title'=>((string)$_smarty_tpl->tpl_vars['mod']->value->Lang('edit_profile')),'icon'=>'edit.gif'),$_smarty_tpl);?>
</a></td>
			<td><a href="<?php echo smarty_cms_function_cms_action_url(array('action'=>'delete_profile','pid'=>$_smarty_tpl->tpl_vars['profile']->value->id),$_smarty_tpl);?>
" class="pageoptions"><?php echo smarty_function_admin_icon(array('alt'=>((string)$_smarty_tpl->tpl_vars['mod']->value->Lang('delete_profile')),'title'=>((string)$_smarty_tpl->tpl_vars['mod']->value->Lang('delete_profile')),'icon'=>'delete.gif'),$_smarty_tpl);?>
</a></td>
		  </tr>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	<?php } else { ?>
		<tr><td colspan="8"><p class="information"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('no_profiles');?>
</p></td></tr>
	<?php }?>
    </tbody>
</table><?php }
}
