{extends file="main.tpl"}

{block name="content"}

<div style="max-width: 1400px; margin: 0 auto; padding: 20px;">

    <h1 style="text-align: center; margin-bottom: 30px;">Katalog naszych mydeł</h1>

    {* Nawigacja i status logowania *}
    <nav style="background: #333; color: white; padding: 15px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center; border-radius: 5px;">
        <div>
            <a href="{$conf->action_url}mainPage" style="color: white; text-decoration: none; font-weight: bold; margin-right: 15px;">🏠 Strona główna</a>
            <a href="{$conf->action_url}productList" style="color: white; text-decoration: none; font-weight: bold; margin-right: 15px;">🧼 Katalog</a>
            
            {if isset($user)}
                {if $isKlient|default:false}
                    <a href="{$conf->action_url}cartView" style="color: white; text-decoration: none; margin-right: 15px;">🛒 Koszyk</a>
                    <a href="{$conf->action_url}orderList" style="color: #3498db; text-decoration: none; margin-right: 15px;">📜 Moje zamówienia</a>
                {/if}

                {if $isPracownik|default:false}
                    <a href="{$conf->action_url}orderList" style="color: #f1c40f; text-decoration: none; font-weight: bold; margin-right: 15px;">📦 Zarządzaj zamówieniami</a>
                {/if}

                {if $isAdmin|default:false}
                    <a href="{$conf->action_url}userList" style="color: #8e44ad; text-decoration: none; font-weight: bold; margin-right: 15px;">👥 Użytkownicy</a>
                {/if}
            {/if}
        </div>

        <div>
            {if isset($user)}
                <span>Zalogowany jako: <b>{$user->login}</b> 
                    <small style="color: #bbb;">({$user->role})</small>
                </span>
                <a href="{$conf->action_url}logout" style="background: #e74c3c; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; margin-left: 10px;">Wyloguj</a>
            {else}
                <a href="{$conf->action_url}login" style="color: white; text-decoration: none; margin-right: 15px;">Zaloguj się</a>
                <a href="{$conf->action_url}registerRender" style="background: #3498db; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px;">Załóż konto</a>
            {/if}
        </div>
    </nav>

    {* Przyciski zarządzania - TYLKO DLA PRACOWNIKA *}
    {if $isPracownik|default:false}
        <div style="margin-bottom: 15px; display: flex; gap: 10px;">
            <a href="{$conf->action_url}productNew" style="background: green; color: white; padding: 10px; text-decoration: none; border-radius: 5px;">+ Dodaj nowe mydło</a>
            <a href="{$conf->action_url}categoryList" style="background: #d35400; color: white; padding: 10px; text-decoration: none; border-radius: 5px;">🏷️ Kategorie</a>
        </div>
    {/if}

    {* Wyszukiwarka *}
    <div style="margin: 20px 0; padding: 15px; background: #f9f9f9; border: 1px solid #ddd; border-radius: 5px;">
        {* DODANO ID i ONSUBMIT *}
        <form id="search-form" onsubmit="ajaxPostForm('search-form', '{$conf->action_url}productListPart', 'table'); return false;" style="display: flex; gap: 15px; align-items: center; justify-content: space-between; flex-wrap: nowrap;">
            <input type="hidden" name="action" value="productList">
            <div style="display: flex; align-items: center; gap: 8px; flex: 2;">
                <label style="font-weight: bold; white-space: nowrap;">Szukaj mydła:</label>
                <input type="text" name="sf_nazwa" value="{$searchForm->nazwa|default:''}" placeholder="Wpisz nazwę..." style="padding: 8px; border: 1px solid #ccc; border-radius: 3px; width: 100%;">
            </div>
            <div style="display: flex; align-items: center; gap: 8px; flex: 1;">
                <label style="font-weight: bold; white-space: nowrap;">Kategoria:</label>
                <select name="sf_kategoria" style="padding: 8px; border: 1px solid #ccc; border-radius: 3px; width: 100%;">
                    <option value="wszystkie" {if ! $searchForm->kategoria || $searchForm->kategoria == 'wszystkie'}selected{/if}>Wszystkie</option>
                    {foreach $categories as $cat}
                        <option value="{$cat['id_category']}" {if $searchForm->kategoria == $cat['id_category']}selected{/if}>{$cat['nazwa_kategori']}</option>
                    {/foreach}
                </select>
            </div>
            <div style="display: flex; gap: 5px;">
                <button type="submit" style="background: #3498db; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 3px; font-weight: bold; white-space: nowrap;">🔍 Filtruj</button>
                {if $searchForm->nazwa || ($searchForm->kategoria && $searchForm->kategoria != 'wszystkie')}
                    {* Przycisk resetowania filtrów - on może przeładować stronę klasycznie *}
                    <a href="{$conf->action_url}productList" style="background: #95a5a6; color: white; padding: 10px 20px; text-decoration: none; border-radius: 3px; font-weight: bold; white-space: nowrap;">✖</a>
                {/if}
            </div>
        </form>
    </div>

    {* tabela ajax *}
    <div id="table">
        {include file="ProductListPart.tpl"}
    </div>

</div>

{/block}