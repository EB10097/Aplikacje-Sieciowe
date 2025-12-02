<?php
/* Smarty version 3.1.30, created on 2025-12-02 22:31:07
  from "C:\xampp\htdocs\AS6_KK_ochrona_zasobow\app\views\CalcView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_692f5a9b8f6397_68512565',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '360d6e00a9f699c9f2f2ffbbf8ab16234b4322b4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AS6_KK_ochrona_zasobow\\app\\views\\CalcView.tpl',
      1 => 1764701348,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_692f5a9b8f6397_68512565 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_165376923692f5a9b8e6792_92510607', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2015772605692f5a9b8f5fe7_57846281', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'footer'} */
class Block_165376923692f5a9b8e6792_92510607 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_2015772605692f5a9b8f5fe7_57846281 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h2 class="content-head is-center"> 
    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/index.php" class="btn" style="font-size: 12px; padding: 6px 16px; float: right; margin-top: 4px;">Powrót</a>
    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout" class="btn" style="font-size: 12px; padding: 6px 16px; float: right; margin-top: 4px; margin-right: 5px;">Wyloguj</a>
</h2>

<style>
/* Lokalny styl dla kalkulatora: zielony i powiększony wynik */
.result-box .res { color: #27ae60; font-weight: 700; font-size: 28px; }
</style>

<div class="row padding">
    <div class="col span_8">
        <div class="l-box">
            <form action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ctrl.php?action=calcCompute" method="post">
                <fieldset>
                    <label for="id_kwotaKredytu">Kwota kredytu</label>
                    <input id="id_kwotaKredytu" type="text" placeholder="Kwota Kredytu" name="kwotaKredytu" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kwotaKredytu;?>
">

                    <label for="id_lataKredytu">Lata kredytu</label>
                    <select name="lataKredytu" id="id_lataKredytu">
                        <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 30+1 - (1) : 1-(30)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                            
                            <option value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['form']->value->lataKredytu == $_smarty_tpl->tpl_vars['i']->value) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
                        <?php }
}
?>

                    </select>

                    <label for="id_oprocentowanie">Oprocentowanie (%)</label>                    
                    <input id="id_oprocentowanie" type="text" placeholder="Oprocentowanie" name="oprocentowanie" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->oprocentowanie;?>
">

                    <button type="submit" class="btn btn-large">Oblicz</button>

                    
                    <?php if (isset($_smarty_tpl->tpl_vars['result']->value->result)) {?>
                        <div class="result-box" style="margin-top:12px;">
                            <h4>Miesięczna rata</h4>
                            <p class="res"><?php echo $_smarty_tpl->tpl_vars['result']->value->result;?>
 zł</p>
                        </div>
                    <?php }?>
                </fieldset>
            </form>
        </div>
    </div>

    <div class="col span_16">
        <div class="l-box">

        
        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
            <h4>Nastąpił Błąd</h4>
            <ol class="err">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
?>
            <li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </ol>
        <?php }?>

        
        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
            <h4>Informacje</h4>
            <ol class="inf">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
?>
            <li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </ol>
        <?php }?>

        </div>
    </div>
</div>

<?php
}
}
/* {/block 'content'} */
}
