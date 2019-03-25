<?php if (empty($vars['user']['id'])) { ?>

	<h2>Nouvel utilisateur</h2>
    <form action="?action=addUser" method="POST">

<?php } else { ?>

	<h2>Modifier le profile</h2>
	<form action="?action=editUser&id=<?= $vars['user']['id'] ?>" method="POST"> 

<?php } ?>

		<input type="hidden" name="id" value="<?= $vars['user']['id']?>" class="form-control"><br />

		<input type="text" name="name" value="<?= $vars['user']['name_admin']?>" class="form-control" placeholder="Nom" required><br />

		<input type="text" name="mail" value="<?= $vars['user']['email_admin']?>" class="form-control" placeholder="Email" required><br />

		<input type="password" name="password" value="" class="form-control" placeholder="Mot de passe" <?php if (empty($vars['user']['id'])) { ?>required<?php } else { ?>""<?php } ?>><br />
    
		<input type="submit" class="btn btn-primary mb-2 connect" value="<?php if (empty($vars['user']['id'])) { ?>Ajouter<?php } else { ?>Modifier<?php } ?>" />

	</form>

<?php if (empty($vars['user']['id'])) { ?><a href="?action=allUsers" class="cancel btn btn-outline-secondary">Annuler</a><?php } else { ?><a href="?action=deleteUser&id=<?=$vars['user']['id']?>" class="supp btn btn-outline-danger">Supprimer</a><?php } ?>


<script>

$(document).ready(function() {

	$('.cancel').on('click', function(event) {
        var confirmed = confirm('Annuler la modification ?'); 
		
		if (confirmed) {
			return true;
		} else { 
			return false;
		}
    }),

	 $(".supp").click(function() {
		var confirmed = confirm("&Ecirc;tes-vous sur de vouloir supprimer l\'utilisateur ?");  

		if (confirmed) {
			return true;
		} else { 
			return false;
		}
	 })

});

</script>
