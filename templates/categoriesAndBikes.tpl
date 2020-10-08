{include file="head.tpl"}

{include file="nav.tpl"}

<article class="container" style="display: flex; flex-wrap: wrap; min-height: 75vh">
    {foreach from=$categories item=categorie}
        <div class="list-group container" style="width: 40%; margin: 5% auto">
        <a href="categorie/{$categorie->id_categoria}" class="list-group-item list-group-item-action active" style="background-color: #343a40; border-color: #343a40">
            {$categorie->categoria}
        </a>
        {foreach from=$bikes item=bike}
            {if $bike->id_categoria == $categorie->id_categoria}
            <a href="bike/{$bike->id_bicicleta}" class="list-group-item list-group-item-action">{$bike->marca}  -  {$bike->modelo}</a>
            {/if}
        {/foreach}
        </div>
    {/foreach}
</article>

{include file="footer.tpl"}