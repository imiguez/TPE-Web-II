{include file="head.tpl"}

{include file="nav.tpl"}


<article style="width: 60rem; display: flex; flex-direction: column; color: white; background-color: #242527cc; margin: 70px auto; padding: 20px 40px">
  <h2>Agregar una Categoría</h2>
  <form action="insertCategory" method="POST">
    <div class="form-group">
      <label for="categoria">Categoría</label>
      <input type="text" class="form-control" id="categoria" name="categoria" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary">Agregar</button>
  </form>

    {if $msj != ""}
    <div class="alert alert-warning" style="margin-top: 25px" role="alert">{$msj}</div>
    {/if}
</article>



{include file="footer.tpl"}