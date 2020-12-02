{include file="head.tpl"}

{include file="nav.tpl"}

<article style="width: 60rem; display: flex; flex-direction: column; color: white; background-color: #242527cc; margin: 70px auto; padding: 20px 40px">
  <h2>Agregar una Bicicleta</h2>
  <form action="insertBike" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="marca">Marca</label>
      <input type="text" required class="form-control" id="marca" name="marca" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="modelo">Modelo</label>
      <input type="text" required class="form-control" id="modelo" name="modelo">
    </div>
    <div class="form-group">
                <label>Categoria</label>
                <select class="form-control" required name="categoria">
                    {foreach from=$categories item=category}
                        <option value="{$category->id_categoria}">{$category->categoria}</option>
                    {/foreach}
                </select>
            </div>
    <div class="form-group">
      <label for="precio">Precio</label>
      <input type="number" required class="form-control" id="precio" name="precio">
    </div>
    <div class="form-group form-check">
        <div>
            <input type="radio" required class="form-check-input" id="nueva" name="condicion" value="1" checked="checked">
            <label class="form-check-label" for="nueva">Es nueva</label>
        </div>
        <div>
            <input type="radio" required class="form-check-input" id="usada" name="condicion" value="0">
            <label class="form-check-label" for="usada">Es usada</label>
        </div>
    </div>
    <div>
      <label>Agregar Imagen: <input type="file" required name="file" style="margin-left: 10px;"/></label>
    </div>
    <button type="submit" class="btn btn-primary">Agregar</button>
  </form>

    {if $msj != ""}
    <div class="alert alert-warning" style="margin-top: 25px" role="alert">{$msj}</div>
    {/if}
</article>

{include file="footer.tpl"}