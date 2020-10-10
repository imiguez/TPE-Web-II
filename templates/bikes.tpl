{include file="head.tpl"}

{include file="nav.tpl"}

<table class="table table-bordered container" style="background-color: white; text-align: center;  margin: 20vh auto 35vh auto; height: auto">
    <thead style="background-color: #343a40; color: white">
        <tr>
        <th scope="col" style="border-color: #343a40">Marca</th>
        <th scope="col" style="border-color: #343a40">Modelo</th>
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
            <td>{$bike->modelo}</td>
            <td>
                {foreach from=$categories item=category}
                    {if $bike->id_categoria == $category->id_categoria}
                        {$category->categoria}
                    {/if}
                {/foreach}
            </td>
            {if $hasPermission}
                <td><a href="bike/{$bike->id_bicicleta}" class="list-group-item list-group-item-action" style="border: none">Editar / Eliminar</a></td>    
            {else}
                <td><a href="bike/{$bike->id_bicicleta}" class="list-group-item list-group-item-action" style="border: none">Ver Detalles</a></td>
            {/if}
        </tr>
    {/foreach}

    </tbody>
</table>

{include file="footer.tpl"}