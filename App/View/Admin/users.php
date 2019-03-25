<div>   
    <a href="?action=editUser&id=0" class="add_new btn btn-primary">Ajouter un nouvel utilisateur<i class="plus fas fa-plus-circle"></i></a>
    
    <h2>Utilisateurs</h2>

    <table class="display table table-bordered table-hover">
        <caption>Episodes</caption>
   
	
	   <thead class="thead-light">
			<tr>
				<th scope="col">Nom</th>
				<th scope="col">Email</th>
				<th scope="col">Modifier</th>
				<th scope="col">Supprimer</th>
			</tr>
		</thead>
        
		<tbody>
        <?php foreach ($vars['users'] as $users): ?>
			<tr>
				<td><?= $users['name_admin']?></td>
				<td><?= $users['email_admin']?></td>
				<td>
				<a href="editUser&id=<?=$users['id']?>" scope="col" class="btn btn-outline-primary"><i class="fas fa-pen"></i></a>
				</td>
				<td>
				<a href="deleteUser&id=<?=$users['id']?>" scope="col" class="supp btn btn-outline-danger"><i class="fas fa-times"></i></a>
				</td>
			</tr>
        <?php endforeach; ?>
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
			"orderable": false, "targets": [-1]
		}],
		
		"language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            }
		}),

    $(".supp").click(function() {
        var confirmed = confirm("Etes-vous sur de vouloir supprimer l\'utilisateur ?");  

		if (confirmed) {
		    return true;
		} else { 
			return false;
		}
	})
});

</script>
