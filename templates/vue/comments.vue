{literal}
<div v-if="comments.length > 0" id="comments-box" style="width: 60rem; color: white; background-color: #242527cc; margin: 0 auto; padding: 20px 40px">
    <div v-for="comment in comments" style="padding: 15px;">
        <div v-for="n in 5" style="display: inline-block;">
            <i  v-if="n <= comment.puntuacion" class="fa fa-star star checked"></i>
            <i  v-else class="fa fa-star star"></i>
        </div>
        <div style="display: flex; width: 100%;">
            <h5 style="width: 50%;">{{ comment.titulo }}</h5>
            <h5 style="width: 50%; text-align: right;">{{ comment.usuario }}</h5>
        </div>
            {/literal}
            <div style="display: flex; width: 100%;">
            {if $hasPermission}
                <p style="width: 97%; height: 60px;" v-if="comment.descripcion.length < 80" >{{ comment.descripcion }}</p>
                <p style="width: 97%; height: 60px; overflow: scroll;" v-else>{{ comment.descripcion }}</p>
                <h5 style="width: 3%; cursor: pointer; display: flex; flex-direction: row-reverse;"><i class="delete-comment fa fa-trash" :id="comment.id_comentario"></i></h5>
            {elseif $isLogged}
                <p style="width: 97%; height: 60px;" v-if="comment.descripcion.length < 80" >{{ comment.descripcion }}</p>
                <p style="width: 97%; height: 60px; overflow: scroll;" v-else>{{ comment.descripcion }}</p>
            {else}
                <p style="width: auto;">{{ comment.descripcion }}</p>
            {/if}
            </div>
            {literal}
    </div>
</div>
<div v-else id="comments-box"></div>
{/literal}