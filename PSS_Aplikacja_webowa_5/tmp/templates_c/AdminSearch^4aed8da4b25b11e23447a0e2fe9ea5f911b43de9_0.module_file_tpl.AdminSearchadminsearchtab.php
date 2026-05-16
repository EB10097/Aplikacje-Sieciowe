<?php
/* Smarty version 4.2.1, created on 2026-05-16 14:37:12
  from 'module_file_tpl:AdminSearch;admin_search_tab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6a0864f85e46a0_68360601',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4aed8da4b25b11e23447a0e2fe9ea5f911b43de9' => 
    array (
      0 => 'module_file_tpl:AdminSearch;admin_search_tab.tpl',
      1 => 1777739841,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a0864f85e46a0_68360601 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\modifier.cms_escape.php','function'=>'smarty_modifier_cms_escape',),));
if (count($_smarty_tpl->tpl_vars['slaves']->value) > 0) {?>
<style type="text/css" scoped>
#status_area,#searchresults_cont,#workarea {
  display: none;
}
#searchresults {
  max-height: 25em;
  overflow:   auto;
  cursor: pointer;
}
.search_oneresult {
  color: red;
}
</style>

<?php echo '<script'; ?>
>
 var ajax_url = '<?php echo $_smarty_tpl->tpl_vars['ajax_url']->value;?>
';
 //var clickthru_msg = '<?php echo strtr((string)$_smarty_tpl->tpl_vars['mod']->value->Lang('warn_clickthru'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S" ));?>
';
 <?php if ((isset($_smarty_tpl->tpl_vars['saved_search']->value['slaves'])) && in_array(-1,$_smarty_tpl->tpl_vars['saved_search']->value['slaves'])) {?>
 var sel_all = 1;
 <?php }?>

 $(document).on('click','#searchbtn',function(){
   var l = $('#filter_box :checkbox.filter_toggle:checked').length;
   if( l == 0 ) {
     cms_alert('<?php echo strtr((string)$_smarty_tpl->tpl_vars['mod']->value->Lang('error_select_slave'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S" ));?>
');
   } else {
     $('#searchresults').html('');
   }
 });
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
"><?php echo '</script'; ?>
>

<div id="adminsearchform">
<?php echo $_smarty_tpl->tpl_vars['formstart']->value;?>


<table class="pagetable">
<tr valign="top">
<td width="50%">
<div class="pageoverflow">
  <p class="pagetext"><label for="searchtext"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('search_text');?>
:</label></p>
  <p class="pageinput">
    <input id="searchtext" type="text" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
search_text" value="<?php echo smarty_modifier_cms_escape((($tmp = $_smarty_tpl->tpl_vars['saved_search']->value['search_text'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp));?>
" size="80" maxlength="80" id="searchtext"/>
  </p>
</div>
<div class="pageoverflow">
  <p class="pagetext"></p>
  <p class="pageinput">
    <input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
submit" value="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('search');?>
" id="searchbtn" />
  </p>
</div>
</td>
<td width="50%">
<div class="pageoverflow" id="filter_box">
  <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('filter');?>
:</p>
  <p class="pageinput">
    <input id="filter_all" type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
slaves[]" value="-1" checked="checked"/>&nbsp;<label for="filter_all" title="<?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('desc_filter_all');?>
"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('all');?>
</label><br />
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['slaves']->value, 'slave', false, NULL, 'slaves', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['slave']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['slave']->value) {
$_smarty_tpl->tpl_vars['slave']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_slaves']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_slaves']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_slaves']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_slaves']->value['total'];
?>
      <input class="filter_toggle" id="<?php echo $_smarty_tpl->tpl_vars['slave']->value['class'];?>
" type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
slaves[]" value="<?php echo $_smarty_tpl->tpl_vars['slave']->value['class'];?>
" <?php if ((isset($_smarty_tpl->tpl_vars['saved_search']->value['slaves'])) && in_array($_smarty_tpl->tpl_vars['slave']->value['class'],$_smarty_tpl->tpl_vars['saved_search']->value['slaves'])) {?>checked="checked"<?php }?>/>&nbsp;<label for="<?php echo $_smarty_tpl->tpl_vars['slave']->value['class'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['slave']->value['description'];?>
"><?php echo $_smarty_tpl->tpl_vars['slave']->value['name'];?>
</label><?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_slaves']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_slaves']->value['last'] : null)) {?><br/><?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <br /><br />
    <input type="checkbox" id="search_desc" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
search_descriptions" value="1" checked="checked">&nbsp;<label for="search_desc"><?php echo $_smarty_tpl->tpl_vars['mod']->value->lang('lbl_search_desc');?>
</label><br/>
    <input type="checkbox" id="search_case" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
search_casesensitive" value="1">&nbsp;<label for="search_casesensitive"><?php echo $_smarty_tpl->tpl_vars['mod']->value->lang('lbl_search_casesensitive');?>
</label><br/>
    <input type="checkbox" id="search_snippets" name="<?php echo $_smarty_tpl->tpl_vars['actionid']->value;?>
show_snippets" value="1">&nbsp;<label for="show_snippets"><?php echo $_smarty_tpl->tpl_vars['mod']->value->lang('lbl_show_snippets');?>
</label>
  </p>
  <br />
</div>
</td>
</tr>
</table>

<div class="pageoverflow" id="progress_area"></div>
<div class="pageoverflow" id="status_area"></div>
<fieldset id="searchresults_cont">
  <legend><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('search_results');?>
:</legend>
  <div id="searchresults_cont2">
    <ul id="searchresults">
    </ul>
  </div>
</fieldset>
<?php echo $_smarty_tpl->tpl_vars['formend']->value;?>

</div>

<iframe id="workarea" name="workarea"></iframe>
<?php } else { ?>
<div class="pageoverflow">
  <p class="pagetext"><?php echo $_smarty_tpl->tpl_vars['mod']->value->Lang('empty_list');?>
</p>
</div>
  
<?php }
}
}
