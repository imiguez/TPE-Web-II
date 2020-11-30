{literal}
<div v-if="comments.length > 0" data-spy="scroll" id="comments-box" style="width: 60rem; display: flex; flex-direction: column; color: white; background-color: #242527cc; margin: 0 auto 70px auto; padding: 20px 40px">
    <div v-for="comment in comments" style="padding: 15px;">
        <div v-for="n in 5" style="display: inline-block;">
            <i  v-if="n <= comment.puntuacion" class="fa fa-star star checked"></i>
            <i  v-else class="fa fa-star star"></i>
        </div>
        <h5 style="display: flex; justify-content: space-between;">{{ comment.titulo }} <span>{{ comment.usuario }}</span></h5>
        {/literal}
        {if $hasPermission}
            <p style="display: flex; justify-content: space-between;">{{ comment.descripcion }} 
                <button class="delete-comment" :id="comment.id_comentario"><i class="fa fa-trash"></i></button>
            </p>
        {else}
            <p>{{ comment.descripcion }}</p>
        {/if}
        {literal}
    </div>
</div>
<div v-else id="comments-box"></div>
{/literal}