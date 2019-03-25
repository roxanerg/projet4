<?php $title = "Episode : " . $vars['episode']['titre']. "par Jean Forteroche" ?>

<div class="container-fluid episode-home">

    <?php

    if (empty($vars)) 
    {
            echo '<p> Ce billet n\'existe pas </p>';
    } 
    else 
    {
        $page=$vars['episode']['id']; ////// POUR PAS COMMENTER LES LIENS DE PAGES
    ?>
            <div id="episode">
				<div class="episode_title">
					<h2><?= $vars['episode']['titre'] ?></h2> 
				</div>
                
				<div id="dates">
                <?php if (empty($vars['episode']['date_modif'])) { ?> 
                    <div class="episode_date badge badge-pill badge-info">Publié le : <em><?= $vars['episode']['date_creation'] ?></em></div>  
                <?php } else { ?>
                    <div class="episode_date badge badge-pill badge-info"> Mise-à-jour le : <?= $vars['episode']['date_modif'] ?></div> 
                <?php } ?>
				</div>
                
                <div class="episode_text">
                    <?= nl2br($vars['episode']['contenu']) ?>
                </div> 
            </div>

            <div class="prev_next">
				<div class="btn btn-info" id="previous">< Page précédente</div>
				<div class="btn btn-info" id="next"> Page suivante ></div>
			</div>
    <?php
    }

    ?>
			<div id="add_comm">
				<h3 id="add_comm_title">Ajouter un commentaire<h3>

					<form action="/comment" method="post"> 
						<div class="form-group">
							<input type="hidden" name="episodeId" value="<?= $vars['episode']['id']?>">
							<input type="text" name="auteur" placeholder="Nom (obligatoire)" class="form-control col-7" required><br />
							<textarea rows="8" name="commentaire" placeholder="Commentaire (obligatoire)" class="form-control col-7" required>
							</textarea><br />
							<input type="submit" value="Valider" class="btn btn-primary"> 
						</div>
					</form>
			</div>

			<div id="comments">
				<h3 id="comms">Commentaires</h3>

				<?php if(empty($vars['comments'])) { 
				echo "Il n'y a pas de commentaire pour le moment..."; 
				} else { ?>
				<?php foreach ($vars['comments'] as $comments): ?>

				<div class="comment panel-group">
					<div class="panel panel-default">

						<div class="panel-heading">
							<div class="comm_auth"><?=htmlspecialchars($comments['auteur'])?></div>
							<p class="comm_date badge badge-secondary"><em>Le <?=htmlspecialchars($comments['jour_comm'])?></em></p>
						</div>

						<p class="comm panel-body"><?=htmlspecialchars($comments['commentaire'])?></p>

						<button class="report btn btn-outline-danger" name="<?=$comments['id']?>">Signaler<i class="flag far fa-flag"></i></button>
					</div>
				</div>
        
				<?php endforeach ?> 
				<?php } ?>
			</div>

    <script>

    $(document).ready(function() {
		
		if (<?= $page ?> == <?= $vars['previous']['id'] ?>) {
			$('#previous').hide();
		}

		if (<?= $page ?> == <?= $vars['next']['id'] ?>) {
			$('#next').hide();
		}
    
        $('.report').on('click', function(event) {

            var comment_id = $(this).attr('name');

            $.ajax ({
                url:"index.php?action=reportComment&id=" + comment_id,
                method:"GET",
                dataType:"text",
                success:function()
                {
                    alert('Le commentaire a bien été signalé');
                }
			})
        });

		$('#previous').on('click', function(event) {
			
			window.location.href = '/episode/<?= $vars['previous']['id'] ?>-<?= self::cleanUrl($vars['previous']['titre'])?>';
		})

		$('#next').on('click', function(event) {
			
			window.location.href = '/episode/<?= $vars['next']['id'] ?>-<?= self::cleanUrl($vars['next']['titre'])?>';
		})
    });

    </script>
</div>
