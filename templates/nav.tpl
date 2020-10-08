<nav class="navbar navbar-dark bg-dark" style="height: 10vh">
  <a class="navbar-brand" style="color: white; font-size: 32px" href="home">Home</a>
  <a class="nav-link" style="color: white; font-size: 22px"  href="bikes">Bicicletas <span class="sr-only">(current)</span></a>
  <a class="nav-link" style="color: white; font-size: 22px"  href="categories">Categorías <span class="sr-only">(current)</span></a>
  <a class="nav-link" style="color: white; font-size: 22px"  href="categoriesAndBikes">Bicicletas & Categorías <span class="sr-only">(current)</span></a>
  <a class="nav-link" style="color: white; font-size: 22px; display: none"  href="editForms">Insertar en BBDD <span class="sr-only">(current)</span></a>
  <div>
  {if $isLogged}
    <button type="button" class="btn btn-light"><a href="login" style="text-decoration: none; color: #343a40">Cerrar Sesion</a></button>
  {else}
    <button type="button" class="btn btn-light"><a href="login" style="text-decoration: none; color: #343a40">Iniciar Sesion</a></button>
    <button type="button" class="btn btn-light"><a href="register" style="text-decoration: none; color: #343a40">Registrarse</a></button>
  {/if}
  </div>
</nav>