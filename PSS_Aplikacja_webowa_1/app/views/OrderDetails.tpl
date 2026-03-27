{extends file="main.tpl"}

{block name="content"}
<div style="width:80%; margin: 2em auto; background: white; padding: 25px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    
    {* Dołączenie komunikatów systemowych *}
    {include file='messages.tpl'}

    <h2 style="color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px;">
        📄 Szczegóły zamówienia #{$orderInfo['id_order']|default:$orderInfo['ORDERS_ID']}
    </h2>

    <div style="margin: 20px 0; line-height: 1.6;">
        <p><b>Data złożenia:</b> {$orderInfo['data_zamowienia']}</p>
        <p><b>Adres dostawy:</b> {$orderInfo['adres_dostawy']}</p>
        <p><b>Status:</b> 
            <span style="background: #3498db; color: white; padding: 3px 8px; border-radius: 4px;">
                {$orderInfo['status']}
            </span>
        </p>
    </div>

    {* Wykorzystanie klas pure css dla wyglądu *}
    <table class="pure-table pure-table-bordered" style="width:100%; margin-top: 20px;">
        <thead>
            <tr style="background-color: #f8f9fa; text-align: left;">
                <th>Produkt</th>
                <th>Cena w dniu zakupu</th>
                <th>Ilość</th>
                <th>Wartość</th>
            </tr>
        </thead>
        <tbody>
        {foreach $items as $item}
            <tr>
                <td>{$item['nazwa_produktu']}</td>
                <td>{$item['cena_zakupu']} zł</td>
                <td>{$item['ilosc']} szt.</td>
                <td>{($item['cena_zakupu'] * $item['ilosc'])|number_format:2} zł</td>
            </tr>
        {/foreach}
        </tbody>
        <tfoot>
            <tr style="background: #f1f2f6; font-size: 1.2em; font-weight: bold;">
                <td colspan="3" style="text-align: right; padding: 15px;">Suma całkowita:</td>
                <td style="color: #e67e22;">{$orderInfo['total_price']|default:$orderInfo['koszt_zamowienia']} zł</td>
            </tr>
        </tfoot>
    </table>

    <div style="margin-top: 30px; display: flex; gap: 15px;">
        <a href="{$conf->action_url}orderList" class="pure-button" style="background: #7f8c8d; color: white; text-decoration: none;">
            ⬅ Powrót do historii
        </a>
        
        {* przycisk powrotu do sklepu *}
        <a href="{$conf->action_url}productList" class="pure-button">
            🏠 Do sklepu
        </a>
    </div>
</div>
{/block}