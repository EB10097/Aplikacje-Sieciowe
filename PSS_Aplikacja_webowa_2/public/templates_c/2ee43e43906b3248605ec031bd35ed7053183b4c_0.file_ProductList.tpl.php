<?php
/* Smarty version 5.4.5, created on 2026-04-02 14:46:18
  from 'file:ProductList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_69ce651a3371a7_08252513',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ee43e43906b3248605ec031bd35ed7053183b4c' => 
    array (
      0 => 'ProductList.tpl',
      1 => 1775133728,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69ce651a3371a7_08252513 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\str\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_91337827569ce651a315c96_77990053', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_91337827569ce651a315c96_77990053 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\str\\app\\views';
?>


<div style="max-width: 1400px; margin: 0 auto; padding: 20px;">

    <h1 style="text-align: center; margin-bottom: 30px;">Katalog naszych mydeł</h1>

        <nav style="background: #333; color: white; padding: 15px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center; border-radius: 5px;">
        <div>
            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
mainPage" style="color: white; text-decoration: none; font-weight: bold; margin-right: 15px;">🏠 Strona główna</a>
            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" style="color: white; text-decoration: none; font-weight: bold; margin-right: 15px;">🧼 Katalog</a>
            
            <?php if ((true && ($_smarty_tpl->hasVariable('user') && null !== ($_smarty_tpl->getValue('user') ?? null)))) {?>
                <?php if ((($tmp = $_smarty_tpl->getValue('isKlient') ?? null)===null||$tmp==='' ? false ?? null : $tmp)) {?>
                    <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
cartView" style="color: white; text-decoration: none; margin-right: 15px;">🛒 Koszyk</a>
                    <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
orderList" style="color: #3498db; text-decoration: none; margin-right: 15px;">📜 Moje zamówienia</a>
                <?php }?>

                <?php if ((($tmp = $_smarty_tpl->getValue('isPracownik') ?? null)===null||$tmp==='' ? false ?? null : $tmp)) {?>
                    <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
orderList" style="color: #f1c40f; text-decoration: none; font-weight: bold; margin-right: 15px;">📦 Zarządzaj zamówieniami</a>
                <?php }?>

                <?php if ((($tmp = $_smarty_tpl->getValue('isAdmin') ?? null)===null||$tmp==='' ? false ?? null : $tmp)) {?>
                    <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
userList" style="color: #8e44ad; text-decoration: none; font-weight: bold; margin-right: 15px;">👥 Użytkownicy</a>
                <?php }?>
            <?php }?>
        </div>

        <div>
            <?php if ((true && ($_smarty_tpl->hasVariable('user') && null !== ($_smarty_tpl->getValue('user') ?? null)))) {?>
                <span>Zalogowany jako: <b><?php echo $_smarty_tpl->getValue('user')->login;?>
</b> 
                    <small style="color: #bbb;">(<?php echo $_smarty_tpl->getValue('user')->role;?>
)</small>
                </span>
                <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
logout" style="background: #e74c3c; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; margin-left: 10px;">Wyloguj</a>
            <?php } else { ?>
                <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
login" style="color: white; text-decoration: none; margin-right: 15px;">Zaloguj się</a>
                <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
registerRender" style="background: #3498db; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px;">Załóż konto</a>
            <?php }?>
        </div>
    </nav>

        <?php if ((($tmp = $_smarty_tpl->getValue('isPracownik') ?? null)===null||$tmp==='' ? false ?? null : $tmp)) {?>
        <div style="margin-bottom: 15px; display: flex; gap: 10px;">
            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productNew" style="background: green; color: white; padding: 10px; text-decoration: none; border-radius: 5px;">+ Dodaj nowe mydło</a>
            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
categoryList" style="background: #d35400; color: white; padding: 10px; text-decoration: none; border-radius: 5px;">🏷️ Kategorie</a>
        </div>
    <?php }?>

        <div style="margin: 20px 0; padding: 15px; background: #f9f9f9; border: 1px solid #ddd; border-radius: 5px;">
        <form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" method="get" style="display: flex; gap: 15px; align-items: center; justify-content: space-between; flex-wrap: nowrap;">
            <input type="hidden" name="action" value="productList">
            <div style="display: flex; align-items: center; gap: 8px; flex: 2;">
                <label style="font-weight: bold; white-space: nowrap;">Szukaj mydła:</label>
                <input type="text" name="sf_nazwa" value="<?php echo (($tmp = $_smarty_tpl->getValue('searchForm')->nazwa ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" placeholder="Wpisz nazwę..." style="padding: 8px; border: 1px solid #ccc; border-radius: 3px; width: 100%;">
            </div>
            <div style="display: flex; align-items: center; gap: 8px; flex: 1;">
                <label style="font-weight: bold; white-space: nowrap;">Kategoria:</label>
                <select name="sf_kategoria" style="padding: 8px; border: 1px solid #ccc; border-radius: 3px; width: 100%;">
                    <option value="wszystkie" <?php if (!$_smarty_tpl->getValue('searchForm')->kategoria || $_smarty_tpl->getValue('searchForm')->kategoria == 'wszystkie') {?>selected<?php }?>>Wszystkie</option>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'cat');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('cat')->value) {
$foreach0DoElse = false;
?>
                        <option value="<?php echo $_smarty_tpl->getValue('cat')['id_category'];?>
" <?php if ($_smarty_tpl->getValue('searchForm')->kategoria == $_smarty_tpl->getValue('cat')['id_category']) {?>selected<?php }?>><?php echo $_smarty_tpl->getValue('cat')['nazwa_kategori'];?>
</option>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </select>
            </div>
            <div style="display: flex; gap: 5px;">
                <button type="submit" style="background: #3498db; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 3px; font-weight: bold; white-space: nowrap;">🔍 Filtruj</button>
                <?php if ($_smarty_tpl->getValue('searchForm')->nazwa || ($_smarty_tpl->getValue('searchForm')->kategoria && $_smarty_tpl->getValue('searchForm')->kategoria != 'wszystkie')) {?>
                    <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList" style="background: #95a5a6; color: white; padding: 10px 20px; text-decoration: none; border-radius: 3px; font-weight: bold; white-space: nowrap;">✖</a>
                <?php }?>
            </div>
        </form>
    </div>

        <table border="1" cellpadding="10" style="border-collapse: collapse; width: 100%; background: white; border-radius: 5px; overflow: hidden; margin-bottom: 20px;">
        <thead>
            <tr style="background: #eee;">
                <th style="width: 120px; text-align: center;">Zdjęcie</th>
                <th style="text-align: center;">Nazwa</th>
                <th style="width: 120px; text-align: center;">Cena</th>
                <th style="text-align: center;">Opis</th>
                <?php if ((($tmp = $_smarty_tpl->getValue('isPracownik') ?? null)===null||$tmp==='' ? false ?? null : $tmp) || (($tmp = $_smarty_tpl->getValue('isKlient') ?? null)===null||$tmp==='' ? false ?? null : $tmp) || !(true && ($_smarty_tpl->hasVariable('user') && null !== ($_smarty_tpl->getValue('user') ?? null)))) {?>
                    <th style="width: 200px; text-align: center;">Opcje</th>
                <?php }?>
            </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('produkty'), 'p');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('p')->value) {
$foreach1DoElse = false;
?>
            <tr>
                <td style="padding: 10px; text-align: center; vertical-align: middle;">
                    <?php if ($_smarty_tpl->getValue('p')['zdj_sciezka']) {?>
                        <img src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/uploads/products/<?php echo $_smarty_tpl->getValue('p')['zdj_sciezka'];?>
" alt="<?php echo $_smarty_tpl->getValue('p')['nazwa_produktu'];?>
" style="max-width: 80px; max-height: 80px; border-radius: 5px; object-fit: cover; border: 1px solid #ddd; margin: 0 auto; display: block;">
                    <?php } else { ?>
                        <div style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; background: #f5f5f5; border-radius: 5px; border: 1px solid #ddd; margin: 0 auto;">
                            <span style="color: #bbb; font-size: 2.5em;">📦</span>
                        </div>
                    <?php }?>
                </td>
                <td style="vertical-align: middle; text-align: center;"><strong><?php echo $_smarty_tpl->getValue('p')['nazwa_produktu'];?>
</strong></td>
                <td style="color: #e74c3c; font-weight: bold; font-size: 1.2em; text-align: center; vertical-align: middle;"><?php echo $_smarty_tpl->getValue('p')['cena'];?>
 zł</td>
                <td style="vertical-align: middle; text-align: center;"><?php echo $_smarty_tpl->getValue('p')['opis'];?>
</td>
                
                <?php if (!$_smarty_tpl->getValue('isAdmin')) {?>
                <td style="vertical-align: middle; text-align: center; white-space: nowrap;">
                    <?php if ((($tmp = $_smarty_tpl->getValue('isPracownik') ?? null)===null||$tmp==='' ? false ?? null : $tmp)) {?>
                        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productEdit&id=<?php echo $_smarty_tpl->getValue('p')['id_product'];?>
" style="color: #3498db; text-decoration: none; margin-right: 10px;">✏️ Edytuj</a>
                        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productDelete&id=<?php echo $_smarty_tpl->getValue('p')['id_product'];?>
" onclick="return confirm('Czy na pewno usunąć ten produkt?');" style="color: #e74c3c; text-decoration: none;">🗑️ Usuń</a>
                    <?php }?>
                    
                    <?php if ((($tmp = $_smarty_tpl->getValue('isKlient') ?? null)===null||$tmp==='' ? false ?? null : $tmp)) {?>
                        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
cartAdd&id=<?php echo $_smarty_tpl->getValue('p')['id_product'];?>
" style="color: green; font-weight: bold; text-decoration: none;">🛒 Do koszyka</a>
                    <?php }?>

                    <?php if (!(true && ($_smarty_tpl->hasVariable('user') && null !== ($_smarty_tpl->getValue('user') ?? null)))) {?>
                        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
login" style="color: #3498db; text-decoration: none;">🔒 Zaloguj się aby kupić</a>
                    <?php }?>
                </td>
                <?php }?>
            </tr>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>

        <div style="text-align: center; margin-top: 20px; display: flex; justify-content: center; gap: 5px;">
        <?php if ($_smarty_tpl->getValue('totalPages') > 1) {?>
            <?php
$_smarty_tpl->assign('p', null);$_smarty_tpl->tpl_vars['p']->step = 1;$_smarty_tpl->tpl_vars['p']->total = (int) ceil(($_smarty_tpl->tpl_vars['p']->step > 0 ? $_smarty_tpl->getValue('totalPages')+1 - (1) : 1-($_smarty_tpl->getValue('totalPages'))+1)/abs($_smarty_tpl->tpl_vars['p']->step));
if ($_smarty_tpl->tpl_vars['p']->total > 0) {
for ($_smarty_tpl->tpl_vars['p']->value = 1, $_smarty_tpl->tpl_vars['p']->iteration = 1;$_smarty_tpl->tpl_vars['p']->iteration <= $_smarty_tpl->tpl_vars['p']->total;$_smarty_tpl->tpl_vars['p']->value += $_smarty_tpl->tpl_vars['p']->step, $_smarty_tpl->tpl_vars['p']->iteration++) {
$_smarty_tpl->tpl_vars['p']->first = $_smarty_tpl->tpl_vars['p']->iteration === 1;$_smarty_tpl->tpl_vars['p']->last = $_smarty_tpl->tpl_vars['p']->iteration === $_smarty_tpl->tpl_vars['p']->total;?>
                <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
productList&page=<?php echo $_smarty_tpl->getValue('p');?>
&sf_nazwa=<?php echo $_smarty_tpl->getValue('searchForm')->nazwa;?>
&sf_kategoria=<?php echo $_smarty_tpl->getValue('searchForm')->kategoria;?>
" 
                   style="
                    padding: 8px 12px; 
                    text-decoration: none; 
                    border-radius: 3px; 
                    border: 1px solid #ddd;
                    <?php if ($_smarty_tpl->getValue('p') == $_smarty_tpl->getValue('currentPage')) {?>
                        background-color: #3498db; color: white; border-color: #3498db;
                    <?php } else { ?>
                        background-color: white; color: #333;
                    <?php }?>
                   ">
                   <?php echo $_smarty_tpl->getValue('p');?>

                </a>
            <?php }
}
?>
        <?php }?>
    </div>

</div>

<?php
}
}
/* {/block "content"} */
}
