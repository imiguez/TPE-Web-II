{include file="head.tpl"}

{include file="nav.tpl"}


<article  class="card" style="width: 30rem; background-color: #242527cc; padding: 3rem; border: 1px #343a40; margin: 5% auto; height: auto">
    <form action="verifyUserLogin" method="post">
        <div class="form-group">
        <label for="user" style="color: white">Nombre de Usuario</label>
        <input type="text" class="form-control" id="user" name="user" aria-describedby="emailHelp" placeholder="Enter user name">
    </div>
    <div class="form-group">
        <label for="password" style="color: white">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    <!--<div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>-->
    <button type="submit" class="btn btn-primary" style="width: 100%; background-color: #343a40; color: white;">Iniciar Sesion</button>
    {if $msj != ""}
    <div class="alert alert-warning" style="margin-top: 25px" role="alert">{$msj}</div>
    {/if}
    </form>
</article>


{include file="footer.tpl"}