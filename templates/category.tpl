{include file="head.tpl"}

{include file="nav.tpl"}

<article class="container" style="display: flex; flex-wrap: wrap; height: auto; margin: 20vh auto 35vh auto">
        <div class="list-group container" style="width: 40%; margin: 5% auto">
            <div style="display: flex">
            <a  class="list-group-item list-group-item-action active" style="background-color: #343a40; border-color: #343a40">
                {$category->categoria}
            </a>
                {if $hasPermission}
                    <a href="deleteCategory/{$category->id_categoria}" class="w3-xlarge" style="background-color: #343a40; padding: 5px 10px 0 5px;text-decoration: none; color: black"><i class="fa fa-trash"></i></a>
                {/if}
            </div>
        {foreach from=$bikes item=bike}
            {if $bike->id_categoria == $category->id_categoria}
            <a href="bike/{$bike->id_bicicleta}" class="list-group-item list-group-item-action">{$bike->marca}  -  {$bike->modelo}</a>
            {/if}
        {/foreach}
        </div>
</article>



{if $hasPermission}
    <article style="width: 60rem; display: flex; flex-direction: column; color: white; background-color: #242527cc; margin: 0 auto 70px auto; padding: 20px 40px">
  <h2>Editar {$category->categoria}</h2>
    <form action="editCategory/{$category->id_categoria}" method="POST">
    <div class="form-group">
      <label for="categoria">Categoría</label>
      <input type="text" class="form-control" id="categoria" name="categoria" aria-describedby="emailHelp" value="{$category->categoria}">
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
  </form>

    {if $msj != ""}
    <div class="alert alert-warning" style="margin-top: 25px" role="alert">{$msj}</div>
    {/if}
</article>
{/if}

{include file="footer.tpl"}