{include file="head.tpl"}

{include file="nav.tpl" url=""}

<table class="table table-bordered container" style="background-color: white; text-align: center; margin: 5% auto; min-height: 75vh">
    <thead style="background-color: #343a40; color: white">
        <tr>
        <th scope="col" style="border-color: #343a40">Marca</th>
        <th scope="col" style="border-color: #343a40">Categoría</th>
        <!--<th scope="col">Condicion</th>
        <th scope="col">Precio</th>-->
        <th scope="col" style="border-color: #343a40">Ver</th>
         </tr>
    </thead>
    <tbody>

    {foreach from=$bikes item=bike} 
        <tr>
            <td>{$bike->marca}</td>
            <td>
                {foreach from=$categories item=categorie}
                    {if $bike->id_categoria == $categorie->id_categoria}
                        {$categorie->categoria}
                    {/if}
                {/foreach}
            </td>
            <!--<td>{if {$bike->condicion}}
                Nueva
                {else}
                Usada    
            {/if}
            </td>
            <td>{$bike->precio}</td>-->
            <td><a href="bicicleta/{$bike->id_bicicleta}" class="list-group-item list-group-item-action">Ver Detalles</a></td>
        </tr>
    {/foreach}

    </tbody>
</table>

{include file="footer.tpl"}