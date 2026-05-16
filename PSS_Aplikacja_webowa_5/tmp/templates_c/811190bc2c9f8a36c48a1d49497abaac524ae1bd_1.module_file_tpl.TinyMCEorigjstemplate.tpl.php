<?php
/* Smarty version 4.2.1, created on 2026-05-14 20:25:26
  from 'module_file_tpl:TinyMCE;orig_js_template.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6a061396993b78_80671489',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '811190bc2c9f8a36c48a1d49497abaac524ae1bd' => 
    array (
      0 => 'module_file_tpl:TinyMCE;orig_js_template.tpl',
      1 => 1777740853,
      2 => 'module_file_tpl',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a061396993b78_80671489 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'dropdown_menu' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\cmsms\\tmp\\templates_c\\811190bc2c9f8a36c48a1d49497abaac524ae1bd_1.module_file_tpl.TinyMCEorigjstemplate.tpl.php',
    'uid' => '811190bc2c9f8a36c48a1d49497abaac524ae1bd',
    'call_name' => 'smarty_template_function_dropdown_menu_15725890076a061396950c41_57286588',
  ),
));
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.root_url.php','function'=>'smarty_function_root_url',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\smarty\\plugins\\modifier.replace.php','function'=>'smarty_modifier_replace',),));
?>
tinymce.init({
	selector: '<?php if ((isset($_smarty_tpl->tpl_vars['selector']->value)) && $_smarty_tpl->tpl_vars['selector']->value != '') {
echo $_smarty_tpl->tpl_vars['selector']->value;
} else { ?>textarea.TinyMCE<?php }?>',

	language: '<?php echo $_smarty_tpl->tpl_vars['language']->value;?>
',

	license_key: '<?php echo (($tmp = $_smarty_tpl->tpl_vars['profile']->value->license_key ?? null)===null||$tmp==='' ? 'gpl' ?? null : $tmp);?>
',
	promotion: false,
	onboarding: false,

	cmsms_tiny: cmsms_tiny = {
		<?php if ($_smarty_tpl->tpl_vars['enable_linker']->value) {?>
			linker_text : '<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['TinyMCE']->value->Lang('cmsms_linker'));?>
',
			linker_title : '<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['TinyMCE']->value->Lang('title_cmsms_linker'));?>
',
			linker_image : '<?php echo $_smarty_tpl->tpl_vars['TinyMCE']->value->GetModuleURLPath();?>
/lib/images/cmsmslink.gif',
			linker_url : '<?php echo $_smarty_tpl->tpl_vars['linker_url']->value;?>
',
			linker_autocomplete_url : '<?php echo $_smarty_tpl->tpl_vars['getpages_url']->value;?>
',
			linker_href : '<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['TinyMCE']->value->Lang('prompt_href'));?>
',
			prompt_page : '<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['TinyMCE']->value->Lang('prompt_linker'));?>
',
			prompt_page_info : '<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['TinyMCE']->value->Lang('info_linker_autocomplete'));?>
',
			prompt_alias : '<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['TinyMCE']->value->Lang('prompt_selectedalias'));?>
',
			prompt_alias_info : '<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['TinyMCE']->value->Lang('tooltip_selectedalias'));?>
',
			prompt_text : '<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['TinyMCE']->value->Lang('prompt_texttodisplay'));?>
',
			prompt_class : '<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['TinyMCE']->value->Lang('prompt_class'));?>
',
			prompt_rel : '<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['TinyMCE']->value->Lang('prompt_rel'));?>
',
			prompt_target : '<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['TinyMCE']->value->Lang('prompt_target'));?>
',
			tab_general : '<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['TinyMCE']->value->Lang('tab_general_title'));?>
',
			tab_advanced : '<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['TinyMCE']->value->Lang('tab_advanced_title'));?>
',
			target_none : '<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['TinyMCE']->value->Lang('none'));?>
',
			target_new_window : '<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['TinyMCE']->value->Lang('newwindow'));?>
',
			loading_info : '<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['TinyMCE']->value->Lang('loading_info'));?>
',
		<?php }?>

		filepicker_title: '<?php echo strtr((string)$_smarty_tpl->tpl_vars['TinyMCE']->value->Lang('filepickertitle'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S" ));?>
',
        filebrowser_title: '<?php echo strtr((string)$_smarty_tpl->tpl_vars['TinyMCE']->value->Lang('title_cmsms_filebrowser'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S" ));?>
',

        <?php if ($_smarty_tpl->tpl_vars['profile']->value->enable_user_templates) {?>
        	template_title: '<?php echo $_smarty_tpl->tpl_vars['TinyMCE']->value->lang('template_insert');?>
',
        	template_select: '<?php echo $_smarty_tpl->tpl_vars['TinyMCE']->value->lang('template_select');?>
',
        <?php }?>
	},
	<?php if ($_smarty_tpl->tpl_vars['profile']->value->relative_urls) {?>
		relative_urls: true,
	<?php } else { ?>
		relative_urls: false,
		remove_script_host: false,
	<?php }?>
	document_base_url: '<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/',
	browser_spellcheck: true,

	forced_root_block: '<?php echo (($tmp = $_smarty_tpl->tpl_vars['profile']->value->forced_root_block ?? null)===null||$tmp==='' ? 'p' ?? null : $tmp);?>
',
	newline_behavior: '<?php echo (($tmp = $_smarty_tpl->tpl_vars['profile']->value->newline_behavior ?? null)===null||$tmp==='' ? 'default' ?? null : $tmp);?>
',

		plugins: '<?php echo $_smarty_tpl->tpl_vars['profile']->value->plugins;?>
 <?php if ($_smarty_tpl->tpl_vars['enable_linker']->value && strpos($_smarty_tpl->tpl_vars['profile']->value->plugins,'cmsms_linker') === false) {?>cmsms_linker<?php }?> <?php if ($_smarty_tpl->tpl_vars['profile']->value->enable_user_templates) {?>cmsms_template<?php }?> <?php if ($_smarty_tpl->tpl_vars['profile']->value->autoresize) {?>autoresize<?php }?>',

		<?php if ($_smarty_tpl->tpl_vars['profile']->value->image_advtab) {?>
		image_advtab: true,
	<?php }?>

	contextmenu: "<?php if ($_smarty_tpl->tpl_vars['enable_linker']->value && strpos($_smarty_tpl->tpl_vars['profile']->value->contextmenu,'cmsms_linker') === false) {?>cmsms_linker<?php }?> <?php echo $_smarty_tpl->tpl_vars['profile']->value->contextmenu;?>
",

		<?php if (!$_smarty_tpl->tpl_vars['profile']->value->show_menubar) {?>
		menubar: false,
	<?php } else { ?>
		<?php if ($_smarty_tpl->tpl_vars['profile']->value->use_advanced_menu && !empty($_smarty_tpl->tpl_vars['profile']->value->advanced_menu)) {?>
			menu: <?php echo $_smarty_tpl->tpl_vars['profile']->value->advanced_menu;?>
,
		<?php } else { ?>
			menubar: '<?php echo $_smarty_tpl->tpl_vars['profile']->value->menubar;?>
',
		<?php }?>
	<?php }?>

		<?php if (!$_smarty_tpl->tpl_vars['profile']->value->show_toolbar) {?>
		toolbar: false,
	<?php } else { ?>
		toolbar1: '<?php echo $_smarty_tpl->tpl_vars['profile']->value->toolbar1;?>
',
		<?php if (!empty($_smarty_tpl->tpl_vars['profile']->value->toolbar2)) {?>
			toolbar2: '<?php echo $_smarty_tpl->tpl_vars['profile']->value->toolbar2;?>
',
		<?php }?>
	<?php }?>

		<?php if (!$_smarty_tpl->tpl_vars['profile']->value->show_statusbar && $_smarty_tpl->tpl_vars['profile']->value->resize == false) {?>
		statusbar: false,
	<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['profile']->value->resize == false) {?>
		resize: false,
	<?php } elseif ($_smarty_tpl->tpl_vars['profile']->value->resize == 'both') {?>
		resize: 'both',
	<?php } else { ?>
		resize: true,
	<?php }?>

	height: 20,
	autoresize_min_height: 10,
	autoresize_max_height: 600,
	autoresize_bottom_margin: 10,

		<?php if ((isset($_smarty_tpl->tpl_vars['content_css']->value)) && $_smarty_tpl->tpl_vars['content_css']->value != '') {?>
		content_css: '<?php echo $_smarty_tpl->tpl_vars['content_css']->value;?>
',
	<?php }?>


		<?php if ((isset($_smarty_tpl->tpl_vars['style_formats']->value)) && !empty($_smarty_tpl->tpl_vars['style_formats']->value)) {?>
		style_formats: [
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['style_formats']->value, 'style_format');
$_smarty_tpl->tpl_vars['style_format']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['style_format']->value) {
$_smarty_tpl->tpl_vars['style_format']->do_else = false;
?>
				{<?php echo $_smarty_tpl->tpl_vars['style_format']->value;?>
},
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		],
	<?php }?>

		<?php if ((isset($_smarty_tpl->tpl_vars['link_classes']->value))) {?>
		link_class_list: [
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['link_classes']->value, 'classes', false, 'name');
$_smarty_tpl->tpl_vars['classes']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['name']->value => $_smarty_tpl->tpl_vars['classes']->value) {
$_smarty_tpl->tpl_vars['classes']->do_else = false;
?>
				{title: '<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
', value: '<?php echo strtr((string)$_smarty_tpl->tpl_vars['classes']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S" ));?>
'},
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		],
	<?php }?>

		<?php if ((isset($_smarty_tpl->tpl_vars['image_classes']->value))) {?>
		image_class_list: [
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['image_classes']->value, 'classes', false, 'name');
$_smarty_tpl->tpl_vars['classes']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['name']->value => $_smarty_tpl->tpl_vars['classes']->value) {
$_smarty_tpl->tpl_vars['classes']->do_else = false;
?>
				{title: '<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
', value: '<?php echo strtr((string)$_smarty_tpl->tpl_vars['classes']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S" ));?>
'},
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		],
	<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['profile']->value->use_custom_block_formats && $_smarty_tpl->tpl_vars['profile']->value->block_formats != '') {?>
		block_formats: "<?php echo $_smarty_tpl->tpl_vars['profile']->value->block_formats;?>
",
	<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['profile']->value->enable_user_templates) {?>
		cmsms_templates: cmsms_templates = [
			<?php if ((isset($_smarty_tpl->tpl_vars['user_templates']->value))) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user_templates']->value, 'user_template');
$_smarty_tpl->tpl_vars['user_template']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user_template']->value) {
$_smarty_tpl->tpl_vars['user_template']->do_else = false;
?>
					{title: "<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['user_template']->value->get_name());?>
", description: "<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)smarty_modifier_replace($_smarty_tpl->tpl_vars['user_template']->value->get_description(),"\r\n",'<br>'));?>
", content: "<?php echo smarty_modifier_replace(preg_replace('!\s+!u', ' ',$_smarty_tpl->tpl_vars['user_template']->value->get_content()),'"','\"');?>
"},
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			<?php }?>
			<?php if ((isset($_smarty_tpl->tpl_vars['user_templates_files']->value))) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user_templates_files']->value, 'content', false, 'title');
$_smarty_tpl->tpl_vars['content']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['title']->value => $_smarty_tpl->tpl_vars['content']->value) {
$_smarty_tpl->tpl_vars['content']->do_else = false;
?>
					{title: "<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['title']->value);?>
", description: "", content: "<?php echo smarty_modifier_replace(preg_replace('!\s+!u', ' ',$_smarty_tpl->tpl_vars['content']->value),'"','\"');?>
"},
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			<?php }?>
		],
	<?php }?>


		external_plugins: {
		<?php if ($_smarty_tpl->tpl_vars['enable_linker']->value) {?>
			"cmsms_linker" : "<?php echo $_smarty_tpl->tpl_vars['TinyMCE']->value->getModuleURLPath();?>
/lib/js/tinymce_external_plugins/cmsms_linker/plugin.js",
		<?php }?>
		<?php if ((isset($_smarty_tpl->tpl_vars['can_use_filemanager']->value)) && $_smarty_tpl->tpl_vars['can_use_filemanager']->value && $_smarty_tpl->tpl_vars['profile']->value->filemanager_use) {?>
			"cmsms_filepicker" : "<?php echo $_smarty_tpl->tpl_vars['TinyMCE']->value->getModuleURLPath();?>
/lib/js/tinymce_external_plugins/cmsms_filepicker/plugin.js",
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['profile']->value->enable_user_templates) {?>
			"cmsms_template" : "<?php echo $_smarty_tpl->tpl_vars['TinyMCE']->value->getModuleURLPath();?>
/lib/js/tinymce_external_plugins/cmsms_template/plugin.js",
		<?php }?>
	},

		<?php if ((isset($_smarty_tpl->tpl_vars['can_use_filemanager']->value)) && $_smarty_tpl->tpl_vars['can_use_filemanager']->value && $_smarty_tpl->tpl_vars['profile']->value->filemanager_use) {?>
		file_picker_types: 'file image media',
			<?php }?>

		urlconverter_callback: function(url, elm, onsave, name) {
		var self = this;
				var convertUrls = tinymce.activeEditor.options.get('convert_urls')
		var relativeUrls = tinymce.activeEditor.options.get('convert_urls')
		var removeScriptHost = tinymce.activeEditor.options.get('remove_script_host')

		if (!convertUrls || ( elm && elm.nodeName == 'LINK' ) || url.indexOf('file:') === 0 || url.length === 0) {
			return url;
		}

		// fix entities in cms_selflink urls.
		if (url.indexOf('cms_selflink') != -1) {
			decodeURI(url);
			url = url.replace('%20', ' ');
			return url;
		}
		// Convert to relative
		if (relativeUrls) {
			return self.documentBaseURI.toRelative(url);
		}

		// Convert to absolute
		url = self.documentBaseURI.toAbsolute(url, removeScriptHost);
		return url;
	},


	setup: function(editor) {
		editor.on('change', function(e) {
			$(document).trigger('cmsms_formchange');
		});

				<?php if ((isset($_smarty_tpl->tpl_vars['custom_dropdown']->value))) {?>
			editor.ui.registry.addMenuButton('customdropdown',
				{
					<?php if (!empty($_smarty_tpl->tpl_vars['profile']->value->custom_dropdown_title)) {?>
						text: ' <?php echo $_smarty_tpl->tpl_vars['profile']->value->custom_dropdown_title;?>
',
					<?php }?>
					tooltip: '<?php echo $_smarty_tpl->tpl_vars['profile']->value->custom_dropdown_title;?>
',
					icon: 'code-sample',
					fetch: function(callback) {
						var items = [
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['custom_dropdown']->value, 'entry');
$_smarty_tpl->tpl_vars['entry']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->do_else = false;
?>
								{
									type: 'menuitem',
									text: '<?php echo $_smarty_tpl->tpl_vars['entry']->value['title'];?>
',
									onAction: function(){
										<?php if (!(isset($_smarty_tpl->tpl_vars['entry']->value['value2']))) {?>
											editor.insertContent('<?php echo preg_replace('!\s+!u', ' ',$_smarty_tpl->tpl_vars['entry']->value['value1']);?>
');
										<?php } else { ?>
											sel = editor.selection.getContent();
											editor.insertContent('<?php echo preg_replace('!\s+!u', ' ',$_smarty_tpl->tpl_vars['entry']->value['value1']);?>
'+sel+'<?php echo preg_replace('!\s+!u', ' ',$_smarty_tpl->tpl_vars['entry']->value['value2']);?>
');
										<?php }?>
									}
								},
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						];
						callback(items);
					}
				}
			);
			editor.ui.registry.addMenuItem('customdropdown', {
				context: 'insert',
				<?php if (!empty($_smarty_tpl->tpl_vars['profile']->value->custom_dropdown_title)) {?>
					text: ' <?php echo $_smarty_tpl->tpl_vars['profile']->value->custom_dropdown_title;?>
',
				<?php }?>
				icon: 'code-sample',
				getSubmenuItems: () => {
					return [
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['custom_dropdown']->value, 'entry');
$_smarty_tpl->tpl_vars['entry']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->do_else = false;
?>
							{
								type: 'menuitem',
								text: '<?php echo $_smarty_tpl->tpl_vars['entry']->value['title'];?>
',
								onAction: function(){
									<?php if (!(isset($_smarty_tpl->tpl_vars['entry']->value['value2']))) {?>
										editor.insertContent('<?php echo preg_replace('!\s+!u', ' ',$_smarty_tpl->tpl_vars['entry']->value['value1']);?>
');
									<?php } else { ?>
										sel = editor.selection.getContent();
										editor.insertContent('<?php echo preg_replace('!\s+!u', ' ',$_smarty_tpl->tpl_vars['entry']->value['value1']);?>
'+sel+'<?php echo preg_replace('!\s+!u', ' ',$_smarty_tpl->tpl_vars['entry']->value['value2']);?>
');
									<?php }?>
								}
							},
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					];
				}
			});
		<?php }?>


				

		<?php if ($_smarty_tpl->tpl_vars['external_modules']->value) {?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['external_modules']->value, 'external_module');
$_smarty_tpl->tpl_vars['external_module']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['external_module']->value) {
$_smarty_tpl->tpl_vars['external_module']->do_else = false;
if (!empty($_smarty_tpl->tpl_vars['external_module']->value->menu_entries)) {?>editor.ui.registry.addMenuButton('<?php echo $_smarty_tpl->tpl_vars['external_module']->value->button_name;?>
',{<?php if ($_smarty_tpl->tpl_vars['profile']->value->external_modules_show_menutext) {?>text: '<?php if (!empty($_smarty_tpl->tpl_vars['external_module']->value->image)) {?> <?php }
echo preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['external_module']->value->title);?>
',<?php }
if ($_smarty_tpl->tpl_vars['external_module']->value->tooltip != '') {?>tooltip: '<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['external_module']->value->tooltip);?>
',<?php }?>icon: '<?php echo $_smarty_tpl->tpl_vars['external_module']->value->icon;?>
',fetch: function(callback) {var items = [<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'dropdown_menu', array('menu'=>$_smarty_tpl->tpl_vars['external_module']->value->menu_entries), true);?>
];callback(items);}});editor.ui.registry.addNestedMenuItem('<?php echo $_smarty_tpl->tpl_vars['external_module']->value->button_name;?>
',	{icon: '<?php echo $_smarty_tpl->tpl_vars['external_module']->value->icon;?>
',text: '<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['external_module']->value->title);?>
',getSubmenuItems: function() {return [<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'dropdown_menu', array('menu'=>$_smarty_tpl->tpl_vars['external_module']->value->menu_entries), true);?>
];}});<?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		<?php }?>
		
	},

		<?php if (!empty($_smarty_tpl->tpl_vars['profile']->value->extra_js)) {?>
		<?php echo $_smarty_tpl->tpl_vars['profile']->value->extra_js;?>

	<?php }?>


});
<?php }
/* smarty_template_function_dropdown_menu_15725890076a061396950c41_57286588 */
if (!function_exists('smarty_template_function_dropdown_menu_15725890076a061396950c41_57286588')) {
function smarty_template_function_dropdown_menu_15725890076a061396950c41_57286588(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

						<?php if ((isset($_smarty_tpl->tpl_vars['parent']->value)) && (isset($_smarty_tpl->tpl_vars['parent']->value['content'])) && $_smarty_tpl->tpl_vars['parent']->value['content'] != '') {?>
				{
					type: 'menuitem',
					text: '<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['parent']->value['menu_text']);?>
',
					icon: 'chevron-left',
					onAction: function() {
						editor.insertContent('<?php echo preg_replace('!\s+!u', ' ',preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['parent']->value['content']));?>
');
					},
				},
			<?php }?>
			<?php if (!empty($_smarty_tpl->tpl_vars['menu']->value)) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menu']->value, 'entry');
$_smarty_tpl->tpl_vars['entry']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->do_else = false;
?>
					{
						type: '<?php if ((isset($_smarty_tpl->tpl_vars['entry']->value['children']))) {?>nestedmenuitem<?php } else { ?>menuitem<?php }?>',
						text: '<?php echo preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['entry']->value['menu_text']);?>
',
						<?php if (!(isset($_smarty_tpl->tpl_vars['entry']->value['children']))) {?>
							onAction: function() {
								editor.insertContent('<?php echo preg_replace('!\s+!u', ' ',preg_replace("%(?<!\\\\)'%", "\'", (string)$_smarty_tpl->tpl_vars['entry']->value['content']));?>
');
							},
						<?php } else { ?>getSubmenuItems: function() {return [<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'dropdown_menu', array('menu'=>$_smarty_tpl->tpl_vars['entry']->value['children'],'parent'=>$_smarty_tpl->tpl_vars['entry']->value), true);?>
];}<?php }?>
					},
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			<?php }?>
		<?php
}}
/*/ smarty_template_function_dropdown_menu_15725890076a061396950c41_57286588 */
}
