<div>   
    <a href=""><p>Ajouter un nouvel utilisateur</p><i class="fas fa-plus-circle"></i></a>
    
    <h2>Utilisateurs</h2>

    <table class="table table-bordered table-hover">
        <caption>Episodes</caption>
   
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
        </tr>
        
        <?php foreach ($vars['users'] as $users): ?>
        <tr>
            <td><?= $users['id']?></td>
            <td><?= $users['name_admin']?></td>
            <td><?= $users['email_admin']?></td>
            <td><?= $users['password_admin']?></td>
            <td>
            <a href="?action=deleteUser&id=<?= $users['id']?>" scope="col" class="delete"><p>Supprimer</p></a>
            </td>
        </tr>
        <?php endforeach; ?>
        
    </table>
</div>

<script>

$(document).ready(function() {

    $('.delete').on('click', function(event) {
        alert('Êtes-vous sur de vouloir supprimer l\'utilisateur ?');         
        })
    })
});

</script>
