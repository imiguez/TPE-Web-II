{include file="head.tpl"}

{include file="nav.tpl"}


<article class="container" style="display: flex; flex-wrap: wrap; height: auto; margin: 20vh auto 35vh auto">
        <div class="list-group container" style="width: 40%; margin: 5% auto">
        <a href="#" class="list-group-item list-group-item-action active" style="background-color: #343a40; border-color: #343a40">Categorías</a>
        {foreach from=$categories item=category}
            <a href="category/{$category->id_categoria}" class="list-group-item list-group-item-action">{$category->categoria}</a>
        {/foreach}
        </div>
</article>


{include file="footer.tpl"}