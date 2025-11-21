<?php
/* Smarty version 5.4.2, created on 2025-11-21 15:50:03
  from 'file:calc.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_69207c1b234354_55788619',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9cbb1f9c9762068ebc812f96baabe267158a293' => 
    array (
      0 => 'calc.html',
      1 => 1763736601,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69207c1b234354_55788619 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AS3_KK_szablony_smarty\\app';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_41687566269207c1b21e306_50509147', 'footer');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_133587688569207c1b221120_47779091', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../templates/index.html", $_smarty_current_dir);
}
/* {block 'footer'} */
class Block_41687566269207c1b21e306_50509147 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AS3_KK_szablony_smarty\\app';
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_133587688569207c1b221120_47779091 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AS3_KK_szablony_smarty\\app';
?>


<h2 class="content-head is-center"> 
    <a href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/index.php" class="btn" style="font-size: 12px; padding: 6px 16px; float: right; margin-top: 4px;">Powrót</a>
</h2>

<style>
/* Lokalny styl dla kalkulatora: zielony i powiększony wynik */
.result-box .res { color: #27ae60; font-weight: 700; font-size: 28px; }
</style>

<div class="row padding">
    <div class="col span_8">
        <div class="l-box">
            <form action="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/calc.php" method="post">
                <fieldset>
                    <label for="id_kwotaKredytu">Kwota kredytu</label>
                    <!-- ZMIANA: $form->kwotaKredytu zamiast $form['kwotaKredytu'] -->
                    <input id="id_kwotaKredytu" type="text" placeholder="Kwota Kredytu" name="kwotaKredytu" value="<?php echo $_smarty_tpl->getValue('form')->kwotaKredytu;?>
">

                    <label for="id_lataKredytu">Lata kredytu</label>
                    <select name="lataKredytu" id="id_lataKredytu">
                        <?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 30+1 - (1) : 1-(30)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                            <!-- ZMIANA: $form->lataKredytu -->
                            <option value="<?php echo $_smarty_tpl->getValue('i');?>
"<?php if ($_smarty_tpl->getValue('form')->lataKredytu == $_smarty_tpl->getValue('i')) {?> selected<?php }?>><?php echo $_smarty_tpl->getValue('i');?>
</option>
                        <?php }
}
?>
                    </select>

                    <label for="id_oprocentowanie">Oprocentowanie (%)</label>
                    <!-- ZMIANA: $form->oprocentowanie -->
                    <input id="id_oprocentowanie" type="text" placeholder="Oprocentowanie" name="oprocentowanie" value="<?php echo $_smarty_tpl->getValue('form')->oprocentowanie;?>
">

                    <button type="submit" class="btn btn-large">Oblicz</button>

                    <!-- ZMIANA: Sprawdzamy czy wynik istnieje w obiekcie CalcResult -->
                    <?php if ((null !== ($_smarty_tpl->getValue('result')->result ?? null))) {?>
                        <div class="result-box" style="margin-top:12px;">
                            <h4>Miesięczna rata</h4>
                            <p class="res"><?php echo $_smarty_tpl->getValue('result')->result;?>
 zł</p>
                        </div>
                    <?php }?>
                </fieldset>
            </form>
        </div>
    </div>

    <div class="col span_16">
        <div class="l-box">

                <?php if ($_smarty_tpl->getValue('msgs')->isError()) {?>
            <h4>Nastąpił Błąd</h4>
            <ol class="err">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs')->getErrors(), 'err');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('err')->value) {
$foreach0DoElse = false;
?>
            <li><?php echo $_smarty_tpl->getValue('err');?>
</li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ol>
        <?php }?>

                <?php if ($_smarty_tpl->getValue('msgs')->isInfo()) {?>
            <h4>Informacje</h4>
            <ol class="inf">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs')->getInfos(), 'inf');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('inf')->value) {
$foreach1DoElse = false;
?>
            <li><?php echo $_smarty_tpl->getValue('inf');?>
</li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
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
