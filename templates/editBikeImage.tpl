{include file="head.tpl"}

{include file="nav.tpl"}


<article class="container" style="width: 40rem; display: flex; flex-direction: column; color: white; background-color: #242527cc; margin: 0 auto 70px auto; padding: 20px 40px">
    <form action="editBikeImage/{$bike_id}" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Cambiar Imagen: <input type="file" name="file" style="margin-left: 10px;"/></label>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </div>
        {if $msj != ""}
        <div class="alert alert-warning" style="margin-top: 25px" role="alert">{$msj}</div>
        {/if}
    </form>
</article>


{include file="footer.tpl"}