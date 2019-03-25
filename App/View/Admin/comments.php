<div>
    
    <h2>Tous les commentaires</h2>

	<div class="table-responsive">
		<table class="display table table-bordered table-hover">
			<caption>Commentaires</caption>

			<thead class="thead-light">
				<tr>
					<th scope="col">Auteur</th>
					<th scope="col">Commentaire</th>
					<th scope="col">Publié le</th>
					<th scope="col">Signalé</th>
					<th scope="col">Supprimer</th>
				</tr>
			</thead>
		
			<tbody>
			<?php foreach ($vars['comments'] as $comments): ?>
				<tr>
					<td><?=$comments['auteur']?></td>
					<td><?=$comments['commentaire']?></td>
					<td><?=$comments['date_commentaire']?></td>
					<td class="flag"><?=$comments['abuse'] == 1? '<i class="fas fa-exclamation-triangle"></i>' : '' ?></td>
					<td>
					<a href="?action=deleteComment&id=<?= $comments['id']?>" scope="col" class="supp btn btn-outline-danger"><i class="fas fa-times"></i></a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>

		</table>
	</div>
</div>

	<script>
		$(document).ready(function() {

			$('.table').DataTable( {
			columnDefs: [{
				targets: [0],
				orderData: [0, 1]
			}, {
				targets: [2],
				orderData: [1, 0]
			}, { 
				"orderable": false, "targets": [-1]
				},
				 { 
				"orderable": false, "targets": [0, 1]
				}],

			"language": {
					"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
				}
		} ),

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

