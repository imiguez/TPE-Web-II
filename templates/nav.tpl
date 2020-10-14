<nav class="navbar navbar-dark bg-dark" style="height: 20vh; margin-bottom: 150px">
  <a class="navbar-brand" style="color: white; font-size: 32px" href="home">Home</a>
  <a class="nav-link" style="color: white; font-size: 22px"  href="bikes">Bicicletas <span class="sr-only">(current)</span></a>
  <a class="nav-link" style="color: white; font-size: 22px"  href="categories">Categorías <span class="sr-only">(current)</span></a>
  <a class="nav-link" style="color: white; font-size: 22px"  href="categoriesAndBikes">Bicicletas & Categorías <span class="sr-only">(current)</span></a>
  {if $isLogged}
  <div style="margin-right: 8vh">
    <button type="button" class="btn btn-light"><a href="logout" style="text-decoration: none; color: #343a40">Cerrar Sesion</a></button>
    {if $hasPermission}
    <div class="dropdown" style="position: absolute;">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: 5px">
        Admin
      </button>
      <div id="dropdown-menu" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="showInsertBike">Agregar Bicicleta</a>
        <a class="dropdown-item" href="showInsertCategory">Agregar Categoría</a>
      </div>
    </div>
    {/if}
  </div>
  {else}
  <div>
    <button type="button" class="btn btn-light"><a href="login" style="text-decoration: none; color: #343a40">Iniciar Sesion</a></button>
    <button type="button" class="btn btn-light"><a href="register" style="text-decoration: none; color: #343a40">Registrarse</a></button>
    </div>
  {/if}
  
</nav>

<script src="./js/nav.js" type="text/javascript"> </script>