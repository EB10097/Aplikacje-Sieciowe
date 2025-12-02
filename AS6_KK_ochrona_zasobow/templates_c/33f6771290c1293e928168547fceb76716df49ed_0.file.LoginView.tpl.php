<?php
/* Smarty version 3.1.30, created on 2025-12-02 22:31:09
  from "C:\xampp\htdocs\AS6_KK_ochrona_zasobow\app\views\LoginView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_692f5a9d5f9510_01585080',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33f6771290c1293e928168547fceb76716df49ed' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AS6_KK_ochrona_zasobow\\app\\views\\LoginView.tpl',
      1 => 1764704064,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_692f5a9d5f9510_01585080 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1413426600692f5a9d5f91b9_60402652', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'} */
class Block_1413426600692f5a9d5f91b9_60402652 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="row padding">
	<div class="col span_8" style="float: none; margin: 0 auto;">
		<div class="l-box">
			<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login" method="post">
				<fieldset>
					<legend>Logowanie do systemu</legend>
					
					<label for="id_login">login:</label>
                    <input id="id_login" type="text" name="login" /">
					
					<label for="id_pass">Hasło:</label>
                    <input id="id_pass" type="text" name="pass" /">
					
					<div style="margin-top: 1em;">
						<input type="submit" value="Zaloguj" class="btn"/>
					</div>
				</fieldset>
			</form>	
		</div>
		
		<div style="margin-top: 1em;">
			<?php $_smarty_tpl->_subTemplateRender("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		</div>
	</div>
</div>
<?php
}
}
/* {/block 'content'} */
}
