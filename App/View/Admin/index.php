<h2 id="welcome">Bienvenue !</h2>

<table class="display table table-bordered table-hover" id="comments">

	<div id="notice"><a href="/docs/docu.php" class="get_doc btn btn-primary">Téléchargez la notice d'utilisation
	<i class="download fas fa-file-download"></i></a></div><br/>

	<h3 id="flagged" class="badge badge-light">Commentaires signalés :</h3>
        <caption>Commentaires signalés</caption>

        <thead class="thead-light">
            <tr>
                <th scope="col">Auteur</th>
                <th scope="col">Commentaire</th>
                <th scope="col">Publié le</th>
				<th scope="col">Supprimer</th>
				<th scope="col">Ne plus signaler</th>

            </tr>
        </thead>
		
        <tbody>

        <?php foreach ($vars['moderateComm'] as $comments): ?>
            <tr>
                <td><?=$comments['auteur']?></td>
                <td><?=$comments['commentaire']?></td>
                <td><?=$comments['date_commentaire']?></td>
                <td>
                <a href="?action=deleteComment&id=<?= $comments['id']?>" scope="col" class="supp btn btn-outline-danger"><i class="fas fa-times"></i></a>
                </td>
				<td>
                <button name="<?= $comments['id']?>" scope="col" class="unreport btn btn-warning"><i class="fas fa-undo-alt"></i></button>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>

	<script>
		$(document).ready(function() {

			$('.unreport').on('click', function(event) {

            var comment_id = $(this).attr('name');

            $.ajax ({
                url:"index.php?action=unreportComment&id=" + comment_id,
                method:"POST",
				context: this,
				data: { id: comment_id, action: 'unreportComment' },
                dataType:"text",
                success:function(data)
                {
                    alert('Le commentaire n\'est plus signalé'+ comment_id + '-'+ data);
					$(this).parent().parent().hide();
                }
			})
        });

			$(".supp").click(function() {
			var confirmed = confirm("Êtes-vous sur de vouloir supprimer le commentaire ?");  

			if (confirmed) {
				return true;
			} else { 
				return false;
			}
		});
	});

	</script>