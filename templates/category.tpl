{include file="head.tpl"}

{include file="nav.tpl"}

<article class="container" style="display: flex; flex-wrap: wrap; height: auto; margin: 20vh auto 35vh auto">
        <div class="list-group container" style="width: 40%; margin: 5% auto">
        <a  class="list-group-item list-group-item-action active" style="background-color: #343a40; border-color: #343a40">{$category->categoria}</a>
        {foreach from=$bikes item=bike}
            {if $bike->id_categoria == $category->id_categoria}
            <a href="bike/{$bike->id_bicicleta}" class="list-group-item list-group-item-action">{$bike->marca}  -  {$bike->modelo}</a>
            {/if}
        {/foreach}
        </div>
</article>

{include file="footer.tpl"}