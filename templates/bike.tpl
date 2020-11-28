{include file="head.tpl"}

{include file="nav.tpl"}

<table class="table table-bordered container" style="background-color: white; text-align: center; margin: 30vh auto 20vh auto; height: auto">
    <thead style="background-color: #343a40; color: white">
        <tr>
            <th scope="col" style="border-color: #343a40">Marca</th>
            <th scope="col" style="border-color: #343a40">Modelo</th>
            <th scope="col" style="border-color: #343a40">Categoría</th>
            <th scope="col" style="border-color: #343a40">Condicion</th>
            <th scope="col" style="border-color: #343a40">Precio</th>
            {if $hasPermission}
                <th scope="col" style="border-color: #343a40" ><i class="fa fa-trash"></i></th>
            {/if}
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="align-self: center;">{$bike->marca}</td>
            <td style="align-self: center;">{$bike->modelo}</td>
            <td style="align-self: center;">
                {foreach from=$categories item=category}
                    {if $bike->id_categoria == $category->id_categoria}
                        <a href="category/{$category->id_categoria}" class="list-group-item list-group-item-action" style="border: none">{$category->categoria}</a>
                    {/if}
                {/foreach}
            </td>
            <td style="align-self: center;">{if $bike->condicion}
                Nueva
                {else}
                Usada    
            {/if}
            </td>
            <td style="align-self: center;">${$bike->precio}</td>
            {if $hasPermission}
                <th scope="col"><a href="deleteBike/{$bike->id_bicicleta}" class="w3-xlarge" style="text-decoration: none; color: black"><i class="fa fa-trash"></i></a></th>
            {/if}
    </tbody>
</table>     
{if $isLogged}
    
{/if}
<div data-spy="scroll" id="comment-container">

</div>

{if $hasPermission}
    <article style="width: 60rem; display: flex; flex-direction: column; color: white; background-color: #242527cc; margin: 0 auto 70px auto; padding: 20px 40px">
  <h2>Editar {$bike->marca} {$bike->modelo}</h2>
  <form action="editBike/{$bike->id_bicicleta}" method="POST">
    <div class="form-group">
      <label for="marca">Marca</label>
      <input type="text" class="form-control" id="marca" name="marca" aria-describedby="emailHelp" value="{$bike->marca}">
    </div>
    <div class="form-group">
      <label for="modelo">Modelo</label>
      <input type="text" class="form-control" id="modelo" name="modelo" value="{$bike->modelo}">
    </div>
    <div class="form-group">
      <label for="categoria">Categoria</label>
      <select name="categoria" class="form-control">
        {foreach from=$categories item=category}
            {if $bike->id_categoria == $category->id_categoria}
                <option value="{$category->id_categoria}">{$category->categoria}</option>
            {/if}
        {/foreach}
        {foreach from=$categories item=category}
            {if $bike->id_categoria != $category->id_categoria}
              <option value="{$category->id_categoria}">{$category->categoria}</option>
            {/if}
        {/foreach}
      </select>
    </div>
    <div class="form-group">
      <label for="precio">Precio</label>
      <input type="number" class="form-control" id="precio" name="precio" value="{$bike->precio}">
    </div>
    <div class="form-group form-check">
        {if $bike->condicion == 1}
        <div>
            <input type="radio" class="form-check-input" id="nueva" name="condicion" value="1" checked="checked">
            <label class="form-check-label" for="nueva">Es nueva</label>
        </div>
        <div>
            <input type="radio" class="form-check-input" id="usada" name="condicion" value="0">
            <label class="form-check-label" for="usada">Es usada</label>
        </div>
        {else}
        <div>
            <input type="radio" class="form-check-input" id="nueva" name="condicion" value="1">
            <label class="form-check-label" for="nueva">Es nueva</label>
        </div>
        <div>
            <input type="radio" class="form-check-input" id="usada" name="condicion" value="0" checked="checked">
            <label class="form-check-label" for="usada">Es usada</label>
        </div>
        {/if}
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
  </form>
  
    {if $msj != ""}
    <div class="alert alert-warning" style="margin-top: 25px" role="alert">{$msj}</div>
    {/if}
</article>
{/if}
<script src="./js/comentarios.js" type="text/javascript"> </script>
{include file="footer.tpl"}