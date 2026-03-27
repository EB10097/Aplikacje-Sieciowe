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
                {* SEKCJA DLA KLIENTA *}
                {if $isKlient|default:false}
                    <a href="{$conf->action_url}cartView" style="color: white; text-decoration: none; margin-right: 15px;">🛒 Koszyk</a>
                    <a href="{$conf->action_url}orderList" style="color: #3498db; text-decoration: none; margin-right: 15px;">📜 Moje zamówienia</a>
                {/if}

                {* SEKCJA DLA PRACOWNIKA - Zarządzanie zamówieniami *}
                {if $isPracownik|default:false}
                    <a href="{$conf->action_url}orderList" style="color: #f1c40f; text-decoration: none; font-weight: bold; margin-right: 15px;">📦 Zarządzaj zamówieniami</a>
                {/if}

                {* SEKCJA DLA ADMINA - Tylko zarządzanie użytkownikami *}
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
        <form action="{$conf->action_url}productList" method="get" style="display: flex; gap: 15px; align-items: center; justify-content: space-between; flex-wrap: nowrap;">
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
                    <a href="{$conf->action_url}productList" style="background: #95a5a6; color: white; padding: 10px 20px; text-decoration: none; border-radius: 3px; font-weight: bold; white-space: nowrap;">✖</a>
                {/if}
            </div>
        </form>
    </div>

    {* Tabela produktów *}
    <table border="1" cellpadding="10" style="border-collapse: collapse; width: 100%; background: white; border-radius: 5px; overflow: hidden;">
        <thead>
            <tr style="background: #eee;">
                <th style="width: 120px; text-align: center;">Zdjęcie</th>
                <th style="text-align: center;">Nazwa</th>
                <th style="width: 120px; text-align: center;">Cena</th>
                <th style="text-align: center;">Opis</th>
                {if $isPracownik|default:false || $isKlient|default:false || !isset($user)}
                    <th style="width: 200px; text-align: center;">Opcje</th>
                {/if}
            </tr>
        </thead>
        <tbody>
        {foreach $produkty as $p}
            <tr>
                <td style="padding: 10px; text-align: center; vertical-align: middle;">
                    {if $p['zdj_sciezka']}
                        <img src="{$conf->app_url}/uploads/products/{$p['zdj_sciezka']}" alt="{$p['nazwa_produktu']}" style="max-width: 80px; max-height: 80px; border-radius: 5px; object-fit: cover; border: 1px solid #ddd; margin: 0 auto; display: block;">
                    {else}
                        <div style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; background: #f5f5f5; border-radius: 5px; border: 1px solid #ddd; margin: 0 auto;">
                            <span style="color: #bbb; font-size: 2.5em;">📦</span>
                        </div>
                    {/if}
                </td>
                <td style="vertical-align: middle; text-align: center;"><strong>{$p['nazwa_produktu']}</strong></td>
                <td style="color: #e74c3c; font-weight: bold; font-size: 1.2em; text-align: center; vertical-align: middle;">{$p['cena']} zł</td>
                <td style="vertical-align: middle; text-align: center;">{$p['opis']}</td>
                
                {* Opcje ukryte dla Admina, widoczne dla reszty *}
                {if !$isAdmin}
                <td style="vertical-align: middle; text-align: center; white-space: nowrap;">
                    {if $isPracownik|default:false}
                        <a href="{$conf->action_url}productEdit&id={$p['id_product']}" style="color: #3498db; text-decoration: none; margin-right: 10px;">✏️ Edytuj</a>
                        <a href="{$conf->action_url}productDelete&id={$p['id_product']}" onclick="return confirm('Czy na pewno usunąć ten produkt?');" style="color: #e74c3c; text-decoration: none;">🗑️ Usuń</a>
                    {/if}
                    
                    {if $isKlient|default:false}
                        <a href="{$conf->action_url}cartAdd&id={$p['id_product']}" style="color: green; font-weight: bold; text-decoration: none;">🛒 Do koszyka</a>
                    {/if}

                    {if !isset($user)}
                        <a href="{$conf->action_url}login" style="color: #3498db; text-decoration: none;">🔒 Zaloguj się aby kupić</a>
                    {/if}
                </td>
                {/if}
            </tr>
        {/foreach}
        </tbody>
    </table>
</div>

{/block}