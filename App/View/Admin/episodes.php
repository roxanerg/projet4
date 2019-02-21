<div>   
    <a href="?action=editEpisode&id=0"><p>Ajouter un nouvel épisode</p><i class="fas fa-plus-circle"></i></a>
    
    <h2>Tous les épisodes</h2>

    <table class="table table-bordered table-hover">
        <caption>Episodes</caption>
   
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Extrait</th>
            <th scope="col">Crée le</th>
            <th scope="col">Dernière modification le</th>
        </tr>
        
        <?php foreach ($vars['episodes'] as $episode): ?>
        <tr>
            <td><?= $episode['id']?></td>
            <td><?= $episode['titre']?></td>
            <td><?= $episode['contenu']?></td>
            <td><?= $episode['date_creation']?></td>
            <td><?= $episode['date_modif']?></td>
            <td>
            <a href="?action=editEpisode&id=<?= $episode['id']?>" scope="col"><p>Modifier</p></a>
            </td>
        </tr>
        <?php endforeach; ?>
        
    </table>
</div>
