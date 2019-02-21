<!-- Si titre épisode le charger sinon field vide-->

<h2></h2>

<form action="?action=editEpisode&id=<?= $vars['episode']['id'] ?>" method="POST">

    <input type="text" name="titre" value="<?= htmlspecialchars($vars['episode']['titre']); ?>" class="form-control txt_episode" placeholder="Titre"/><br />
    
    <textarea name="contenu" rows="20" cols="33" class="form-control txt_episode"><?= nl2br(htmlspecialchars($vars['episode']['contenu'])); ?></textarea>
    
    <input type="hidden" name="date_creation" value="<?= htmlspecialchars($vars['episode']['date_creation']); ?>"/><br />
    
    <input type="hidden" name="date_modif" value="<?= htmlspecialchars($vars['episode']['date_modif']); ?>"/><br />
    
    <input type="submit" class="btn btn-primary mb-2 connect" value="Ajouter" />

</form>

<a href="?action=deleteEpisode&id=<?=$vars['episode']['id']; ?>">Supprimer</a>



  
<!--ajouter une condition pr afficher la date de creation OU modif si existe 
+ si épisode existe bouton = "modifier" sinon = "valider" -->
