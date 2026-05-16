<?php
/* Smarty version 4.2.1, created on 2026-05-16 14:31:06
  from 'module_file_tpl:CMSContentManager;admin_ordercontent.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6a08638a97b913_79462238',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '100a09e9c7f9a583e316bcf303d5827b504bc073' => 
    array (
      0 => 'module_file_tpl:CMSContentManager;admin_ordercontent.tpl',
      1 => 1777739841,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a08638a97b913_79462238 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'display_tree' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\cmsms\\tmp\\templates_c\\CMSContentManager^100a09e9c7f9a583e316bcf303d5827b504bc073_0.module_file_tpl.CMSContentManageradminord.php',
    'uid' => '100a09e9c7f9a583e316bcf303d5827b504bc073',
    'call_name' => 'smarty_template_function_display_tree_4416181996a08638a9404f1_84367694',
  ),
));
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.form_start.php','function'=>'smarty_function_form_start',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.form_end.php','function'=>'smarty_function_form_end',),));
echo '<script'; ?>
 type="text/javascript">
    function parseTree(ul) {
        var tags = [];
        ul.children('li').each(function() {
            var subtree = $(this).children('ul');
            tags.push($(this).attr('id'));
            if (subtree.size() > 0) {
                tags.push(parseTree(subtree));
            }
        });
        return tags;
    }


    $(document).ready(function() {
        $(document).on('click', '#btn_submit', function(ev) {
	    ev.preventDefault();
	    var form = $(this).closest('form');
            cms_confirm('<?php echo strtr((string)$_smarty_tpl->tpl_vars['mod']->value->Lang('confirm_reorder'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S" ));?>
').done(function(){
                var tree = $.toJSON(parseTree($('#masterlist')));
                var ajax_res = false;
                $('#orderlist').val(tree);
		form.submit();
            });
        });

        $('ul.sortable').nestedSortable({
            disableNesting : 'no-nest',
            forcePlaceholderSize : true,
            handle : 'div',
            items : 'li',
            opacity : .6,
            placeholder : 'placeholder',
            tabSize : 20,
            tolerance : 'pointer',
            listType : 'ul',
            toleranceElement : '> div'
        });
    });
<?php echo '</script'; ?>
>



<h3><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_ordercontent');?>
</h3>
<?php echo smarty_function_form_start(array('action'=>'admin_ordercontent','id'=>"theform"),$_smarty_tpl);?>

<input type="hidden" id="orderlist" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
orderlist" value=""/>
<div class="information">
	<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('info_ordercontent');?>

</div>
<div class="pageoverflow">
	<p class="pagetext"></p>
	<p class="pageinput">
		<input id="btn_submit" type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('submit');?>
"/>
		<input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
cancel" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('cancel');?>
"/>
		<input id="btn_revert" type="submit" name="revert" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('revert');?>
"/>
	</p>
</div>
<div class="pageoverflow">
	<?php $_smarty_tpl->_assignInScope('list', $_smarty_tpl->tpl_vars['tree']->value->getChildren(false,true));?>
	<ul id="masterlist" class="sortableList sortable">
		<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'display_tree', array('list'=>$_smarty_tpl->tpl_vars['list']->value), true);?>

	</ul>
</div>
<?php echo smarty_function_form_end(array(),$_smarty_tpl);
}
/* smarty_template_function_display_tree_4416181996a08638a9404f1_84367694 */
if (!function_exists('smarty_template_function_display_tree_4416181996a08638a9404f1_84367694')) {
function smarty_template_function_display_tree_4416181996a08638a9404f1_84367694(Smarty_Internal_Template $_smarty_tpl,$params) {
$params = array_merge(array('depth'=>0), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\modifier.cms_escape.php','function'=>'smarty_modifier_cms_escape',),));
?>

	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'node');
$_smarty_tpl->tpl_vars['node']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['node']->value) {
$_smarty_tpl->tpl_vars['node']->do_else = false;
?>
		<?php $_smarty_tpl->_assignInScope('obj', $_smarty_tpl->tpl_vars['node']->value->getContent(false,true,false));?>
		<li id="page_<?php echo $_smarty_tpl->tpl_vars['obj']->value->Id();?>
" <?php if (!$_smarty_tpl->tpl_vars['obj']->value->WantsChildren()) {?>class="no-nest"<?php }?>>
			<div class="label" <?php if (!$_smarty_tpl->tpl_vars['obj']->value->Active()) {?>style="color: red;"<?php }?>>
				<span>&nbsp;</span><?php echo $_smarty_tpl->tpl_vars['obj']->value->Hierarchy();?>
:&nbsp;<?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['obj']->value->Name());
if (!$_smarty_tpl->tpl_vars['obj']->value->Active()) {?>&nbsp;(<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('prompt_inactive');?>
)<?php }?> <em>(<?php echo smarty_modifier_cms_escape($_smarty_tpl->tpl_vars['obj']->value->MenuText());?>
)</em>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['node']->value->has_children()) {?>
			<ul>
				<?php $_smarty_tpl->_assignInScope('list', $_smarty_tpl->tpl_vars['node']->value->getChildren(false,true));?>
				<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'display_tree', array('list'=>$_smarty_tpl->tpl_vars['list']->value,'depth'=>$_smarty_tpl->tpl_vars['depth']->value+1), true);?>

			</ul>
			<?php }?>
		</li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}}
/*/ smarty_template_function_display_tree_4416181996a08638a9404f1_84367694 */
}
