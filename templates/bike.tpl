{include file="head.tpl"}

{include file="nav.tpl" url="../"}

<table class="table table-bordered container" style="background-color: white; text-align: center; margin: 5% auto; min-height: 75vh">
    <thead style="background-color: #343a40; color: white">
        <tr>
            <th scope="col" style="border-color: #343a40">Marca</th>
            <th scope="col" style="border-color: #343a40">Modelo</th>
            <th scope="col" style="border-color: #343a40">Categoría</th>
            <th scope="col" style="border-color: #343a40">Condicion</th>
            <th scope="col" style="border-color: #343a40">Precio</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="align-self: center;">{$bike->marca}</td>
            <td style="align-self: center;">{$bike->modelo}</td>
            <td style="align-self: center;">
                {foreach from=$categories item=categorie}
                    {if $bike->id_categoria == $categorie->id_categoria}
                        {$categorie->categoria}
                    {/if}
                {/foreach}
            </td>
            <td style="align-self: center;">{if {$bike->condicion}}
                Nueva
                {else}
                Usada    
            {/if}
            </td>
            <td style="align-self: center;">{$bike->precio}</td>
    </tbody>
</table>       

{include file="footer.tpl"}