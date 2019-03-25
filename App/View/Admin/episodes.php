<div>   
    <a href="?action=editEpisode&id=0" class="add_new btn btn-primary">Ajouter un nouvel épisode<i class="plus fas fa-plus-circle"></i></a>
    
    <h2>Tous les épisodes</h2>

    <table class="display table table-bordered table-hover">
        <caption>Episodes</caption>

	   <thead class="thead-light">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Titre</th>
				<th scope="col">Extrait</th>
				<th scope="col">Crée le</th>
				<th scope="col">Modifié le</th>
				<th scope="col"></th>
			</tr>
		</thead>
        
		<tbody>

        <?php foreach ($vars['episodes'] as $episode): ?>
			<tr>
				<td><?= $episode['id']?></td>
				<td><?= $episode['titre']?></td>
				<td><?= $episode['contenu']?></td>
				<td><?= $episode['date_creation']?></td>
				<td><?= $episode['date_modif']?></td>
				<td class="actions">
				<a href="?action=editEpisode&id=<?=$episode['id']?>" scope="col" class="btn btn-outline-primary"><i class="fas fa-pen"></i></a>
				
				<a href="?action=deleteEpisode&id=<?=$episode['id']?>" scope="col" class="supp btn btn-outline-danger"><i class="fas fa-times"></i></a>
				</td>
			</tr>
        <?php endforeach ?>

		</tbody>
        
    </table>
</div>

	<script>
	$(document).ready(function() {

		$('.table').DataTable({
        columnDefs: [ {
            targets: [ 0 ],
            orderData: [ 0, 1 ]
        }, 
		{ 
			"orderable": false, "targets": [-1, 2]
		}],
		
		"language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            }
		}),

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
