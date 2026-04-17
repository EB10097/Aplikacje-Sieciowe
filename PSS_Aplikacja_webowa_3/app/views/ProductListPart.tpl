{* Tabela produktów *}
<table border="1" cellpadding="10" style="border-collapse: collapse; width: 100%; background: white; border-radius: 5px; overflow: hidden; margin-bottom: 20px;">
    <thead>
        <tr style="background: #eee;">
            <th style="width: 120px; text-align: center;">Zdjęcie</th>
            <th style="text-align: center;">Nazwa</th>
            <th style="width: 120px; text-align: center;">Cena</th>
            <th style="text-align: center;">Opis</th>
            {if !$isAdmin}
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

{* SEKCJA STRONNICOWANIA z ajaxem *}
<div style="text-align: center; margin-top: 20px; display: flex; justify-content: center; gap: 5px;">
    {if $totalPages > 1}
        {for $p=1 to $totalPages}
            <a href="javascript:void(0);" 
               onclick="ajaxReloadElement('table', '{$conf->action_url}productListPart&page={$p}&sf_nazwa={$searchForm->nazwa}&sf_kategoria={$searchForm->kategoria}'); return false;"
               style="
                padding: 8px 12px; 
                text-decoration: none; 
                border-radius: 3px; 
                border: 1px solid #ddd;
                {if $p == $currentPage}
                    background-color: #3498db; color: white; border-color: #3498db;
                {else}
                    background-color: white; color: #333;
                {/if}
               ">
               {$p}
            </a>
        {/for}
    {/if}
</div>