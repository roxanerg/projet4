<div class="container">
    
    <h2>Tous les commentaires</h2>

    <table class="table table-bordered table-hover">
        <caption>Commentaires</caption>

        <tr>
            <th scope="col">Auteur</th>
            <th scope="col">Commentaire</th>
            <th scope="col">Publié le</th>
            <th scope="col">Flag</th>
        </tr>
        
        <?php foreach ($vars['comments'] as $comments): ?>
        <tr>
            <td><?=$comments['auteur']?></td>
            <td><?=$comments['commentaire']?></td>
            <td><?=$comments['date_commentaire']?></td>
            <td><?=$comments['abuse'] == 1? 'Oui' : '/' ?></td>
            <td>
            <a href="?action=deleteComment&commentId=<?= $comments['id']?>" scope="col"><p>Supprimer</p></a>
            </td>
        </tr>
        <?php endforeach; ?>
        
    </table>

</div>
