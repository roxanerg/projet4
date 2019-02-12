<?php $title = "Blog de Jean Forteroche"; ?>

<?php

if (empty($vars)) 
{
        echo '<p> Ce billet n\'existe pas </p>';
} 
else 
{
    //print_r($vars);
    $page=$vars['episodes']['id']; ////// POUR PAS COMMENTER LES LIENS DE PAGES
?>
        <div id="episode">
            <h2 id="episode_title">
                <?= htmlspecialchars($vars['episodes']['titre']); ?>
            </h2>  
            <!--ajouter une condition pr afficher la date de creation OU modif si existe -->
            <div id="episode_date">
                <?= htmlspecialchars($vars['episodes']['date_creation']); ?>
            </div>  
            <div id="episode_date">
                <?= htmlspecialchars($vars['episodes']['date_modif']); ?>
            </div> 

            <p id="episode_text">
                <?= nl2br(htmlspecialchars($vars['episodes']['contenu'])); ?>
            </p> 
        </div>
        
        <a href="?action=chapterView&id=<?= $page - 1; ?>">Page précédente</a>
        <a href="?action=chapterView&id=<?= $page + 1; ?>">Page suivante</a>

<?php
}

?>
        <h3>Ajouter un commentaire<h3>
        <!-- addComment+id -->
            <form action="index.php?action=addComment" method="post"> 
                <input type="hidden" name="episodeId" value="<?= $vars['episodes']['id']?>">
                <input type="text" name="auteur" placeholder="Nom"><br />
                <textarea rows="10" cols="30" name="commentaire" placeholder="Commentaire"></textarea><br />
                <input type="submit" value="Valider"> 
            </form>

        <h3 id="comms">Commentaires</h3>

<?php foreach ($vars['comments'] as $comments): ?>

        <h4><?=$comments['auteur']?></h4>

        <p><?=$comments['commentaire']?></p>

        <p><em><?=$comments['jour_comm']?></em></p>

        <button class="report" name="<?=$comments['id']?>"><i class="far fa-flag"></i></button>
    
<?php endforeach ?>

<script>

$(document).ready(function() {
 
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
    })
 });

 </script>
