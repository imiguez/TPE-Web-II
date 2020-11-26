{include file="head.tpl"}

{include file="nav.tpl"}

<table class="table table-bordered container" style="background-color: white; text-align: center;  margin: 20vh auto 35vh auto; height: auto">
    <thead style="background-color: #343a40; color: white">
        <tr>
            <th scope="col" style="border-color: #343a40">Usuario</th>
            <th scope="col" style="border-color: #343a40">Email</th>
            <th scope="col" style="border-color: #343a40">Permiso</th>
            <th scope="col" style="border-color: #343a40" ><i class="fa fa-pencil-square-o"></i></th>
            <th scope="col" style="border-color: #343a40" ><i class="fa fa-trash"></i></th>
        </tr>
    </thead>
    <tbody>

    {foreach from=$users item=user} 
        <tr>
            <td>{$user->usuario}</td>
            <td>{$user->email}</td>
            {if $user->permiso == 0}
                <td>Usuario</td>
                <th scope="col"><a href="editUserPermission/{$user->id_usuario}" class="w3-xlarge" style="text-decoration: none; color: black"><i class="fa fa-user"></i></a></th>
            {else}
                <td>Admin</td>
                <th scope="col"><a href="editUserPermission/{$user->id_usuario}" class="w3-xlarge" style="text-decoration: none; color: black"><i class="fa fa-user-circle"></i></a></th>
            {/if}
            <th scope="col"><a href="deleteUser/{$user->id_usuario}" class="w3-xlarge" style="text-decoration: none; color: black"><i class="fa fa-trash"></i></a></th>
        </tr>
    {/foreach}

    </tbody>
</table>

{include file="footer.tpl"}