<!-- Si titre épisode le charger sinon field vide-->

<h2></h2>

<?php if (empty($vars['episode']['id'])) { ?>
    <form action="?action=addEpisode" method="POST">
<?php } else { ?>

<form action="?action=editEpisode&id=<?= $vars['episode']['id'] ?>" method="POST"> 

<?php } ?>

    <input type="text" name="titre" value="<?= $vars['episode']['titre']; ?>" class="form-control txt_episode" placeholder="Titre" required><br />
    
    <textarea name="contenu" rows="20" cols="33" class="form-control txt_episode" required><?= nl2br($vars['episode']['contenu']); ?></textarea>
    
    <input type="hidden" name="date_creation" value="<?= $vars['episode']['date_creation']; ?>"/><br />
    
    <input type="hidden" name="date_modif" value="<?= $vars['episode']['date_modif']; ?>"/><br />
    
    <input type="submit" class="btn btn-primary mb-2 connect" value="<?php if (empty($vars['episode']['id'])) { ?>Ajouter<?php } else { ?>Modifier<?php } ?>" />

</form>

<?php if (empty($vars['episode']['id'])) { ?><a href="?action=allEpisodes">Annuler</a><?php } else { ?><a href="?action=deleteEpisode&id=<?=$vars['episode']['id']; ?>" class="supp">Supprimer</a><?php } ?>


<script>

$(document).ready(function() {

    $('.supp').on('click', function(event) {
        alert('Êtes-vous sur de vouloir supprimer l\'épisode ?');         
        })
    })
});

</script>
                                         