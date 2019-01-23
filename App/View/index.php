<?php $title = 'Accueil'; ?>


<?php ob_start(); ?>

<div>
    <h1>Bienvenue sur le blog de Jean Forteroche</h1>
    <img>
</div>

<aside>
    <h2>Episodes :</h2>

<?php

foreach ($chapters as $chapter) 
    {
?>

    <div id=episodes>
        <h2 id="episodes_titles">
            <?= htmlspecialchars($chapter['titre']); ?>
        </h2>  

        <div id="episodes_dates">
            Le <?= htmlspecialchars($chapter['jour']); ?>
        </div>  

        <p id="episodes_texts">
            <?= nl2br(htmlspecialchars($chapter['contenu'])); ?>
        </p> 

        <a href="chapterView.php?billet=<?= $chapter['id']; ?>">Lire plus</a>
    </div>
</aside>

<?php

}

$chapter->closeCursor();

?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
