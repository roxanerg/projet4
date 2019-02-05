<?php $title = "Blog de Jean Forteroche"; ?>

<?php ob_start(); ?>

<?php

if (empty($vars)) 
{
        echo '<p> Ce billet n\'existe pas </p>';
} 
else 
{
    //print_r($vars);
    $page=0; ////// POUR PAS COMMENTER LES LIENS DE PAGES
?>
        <div id=episode>
            <h2 id="episode_title">
                <?= htmlspecialchars($vars['episodes']['titre']); ?>
            </h2>  

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
        
        <a href="?page=<?= $page - 1, $vars['id']; ?>">Page précédente</a>
        <a href="?page=<?= $page + 1, $vars['id']; ?>">Page suivante</a>

<?php
}

?>
        <h3>Ajouter un commentaire<h3>
            <form action="index.php?action=addComment&amp;id=<?= $vars['episode']['id'] ?>" method="post">
                
                <input type="text" name="auteur" placeholder="Pseudo"><br />
                <textarea rows="10" cols="30" name="commentaire" placeholder="Commentaire"></textarea><br />
                <input type="submit" value="Valider"> 

            </form>

        <h3 id="comms">Commentaires</h3>

<?php foreach ($vars['comments'] as $comments): ?>

        <h4><?=$comments['pseudo']?></h4>

        <p><?=$comments['commentaire']?></p>

        <p><em><?= htmlspecialchars($comments['jour_comm'])?></em></p>
    
<?php endforeach ?>


<?php $content = ob_get_clean(); ?>

<?php require('Template.php'); ?>

    </body>
</html>