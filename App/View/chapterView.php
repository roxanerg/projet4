<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
    </head>

    <body>

        <p><a href="chaptersView.php">Retour à la liste des billets</a></p>

<?php

if (empty($chapter)) 
{
        echo '<p> Ce billet n\'existe pas </p>';
} 
else 
{
?>
        <div id=notes>
            <h2 id="notes_titles">
                <?php echo htmlspecialchars($chapter['titre']); ?>
            </h2>  

            <div id="notes_dates">
                <?php echo htmlspecialchars($chapter['jour']); ?>
            </div>  

            <p id="notes_texts">
                <?php echo nl2br(htmlspecialchars($chapter['contenu'])); ?>
            </p> 
        </div>
        
        <a href="?page=<?php echo $page - 1, $chapter['id']; ?>">Page précédente</a>
        <a href="?page=<?php echo $page + 1, $chapter['id']; ?>">Page suivante</a>

<?php
}

?>
        <h3>Ajouter un commentaire<h3>
            <form action="index(routeur).php?action=addComment&amp;id=<?= $chapter['id'] ?>" method="post">
                
                <input type="text" name="auteur" placeholder="Pseudo"><br />
                <textarea rows="10" cols="30" name="commentaire" placeholder="Commentaire"></textarea><br />
                <input type="submit" value="Valider"> 

            </form>

        <h3 id="comms">Commentaires</h3>

<?php

while ($comm = $comments->fetch()) 
{
?>
        <h4><?=htmlspecialchars($comm['auteur'])?></h4>
        <p><?=nl2br(htmlspecialchars($comm['commentaire']))?></p>
        <p><em><?=htmlspecialchars($comm['jour_comm'])?></em></p>
    
<?php
}

$comments->closeCursor();
?>

    </body>
</html>