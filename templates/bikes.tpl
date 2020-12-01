{include file="head.tpl"}

{include file="nav.tpl"}

<table class="table table-bordered container" style="background-color: white; text-align: center;  margin: 20vh auto 10vh auto; height: auto">
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

    {foreach from=$paginationBikes item=bike} 
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

<nav class="container" style="display: flex; justify-content: center;" aria-label="Page navigation example">
  <ul class="pagination">
      {if $actualPage <= 1}
        <li class="page-item disabled"><a class="page-link" href="bikes/{$actualPage-1}">Anterior</a></li>
    {else}
        <li class="page-item"><a class="page-link" href="bikes/{$actualPage-1}">Anterior</a></li>
    {/if}
    {for $page=1 to $pages}
        {if $page <= $actualPage+1 && $page >= $actualPage-1 && $page != $actualPage}
            <li class="page-item"><a class="page-link" href="bikes/{$page}">{$page}</a></li>
        {/if}
        {if $page == $actualPage}
            <li class="page-item active"><a class="page-link" href="bikes/{$page}">{$page}</a></li>
        {/if}
    {/for}
    {if $actualPage == 1}
        <li class="page-item"><a class="page-link" href="bikes/3">3</a></li>
    {/if}
    {if $actualPage >= $pages}
        <li class="page-item disabled"><a class="page-link" href="bikes/{$actualPage+1}">Siguiente</a></li>
    {else}
        <li class="page-item"><a class="page-link" href="bikes/{$actualPage+1}">Siguiente</a></li>
    {/if}
  </ul>
</nav>

{include file="footer.tpl"}