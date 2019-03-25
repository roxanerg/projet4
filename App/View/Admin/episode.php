<?php if (empty($vars['episode']['id'])) { ?>
	<h2>Nouvel épisode</h2>
    <form id="formEpisode" action="?action=addEpisode" method="POST">

<?php } else { ?>
	<h2>Modifier l'épisode</h2>
	<form id="formEpisode" action="?action=editEpisode&id=<?=$vars['episode']['id']?>" method="POST"> 

<?php } ?>

		<input type="hidden" name="id" id="suppid" class=".suppid" value="<?=$vars['episode']['id']?>"/><br />

		<input type="text" name="titre" value="<?=$vars['episode']['titre']?>" class="form-control txt_title" placeholder="Titre" required><br />
    
		<textarea name="contenu" rows="20" cols="33" class="form-control txt_episode" required><?= nl2br($vars['episode']['contenu']) ?>
		</textarea>
    
		<input type="hidden" name="date_creation" value="<?= $vars['episode']['date_creation'] ?>"/><br />
    
		<input type="hidden" name="date_modif" value="<?= $vars['episode']['date_modif'] ?>"/><br />
    
		<input type="submit" class="btn btn-primary mb-2 connect" value="<?php if (empty($vars['episode']['id'])) { ?>Ajouter<?php } else { ?>Modifier<?php } ?>" />

	</form>

<?php if (empty($vars['episode']['id'])) { ?>
	<a href="?action=allEpisodes" id="cancel">Annuler</a>
<?php } else { ?>
	<a href="?action=deleteEpisode&id=<?=$vars['episode']['id']?>" class="supp">Supprimer</button>
<?php } ?>


<script>

$(document).ready(function() {
	


    $(".supp").click(function() {
        var confirmed = confirm("Êtes-vous sur de vouloir supprimer l\'épisode ?");  

		if (confirmed) {
		    return true;
		} else { 
			return false;
			}
    });
});

</script>
                                         