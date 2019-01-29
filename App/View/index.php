<?php 

$title = 'Accueil'; 

require('/View/template.php'); 
require('/Model/postModel.php');

$content = ob_start(); 
$manager = new postModel();

?>

<div>
    <h1>Bienvenue sur le blog de Jean Forteroche</h1>
    <img>
</div>

<h2>Les derniers épisodes :</h2>

<?php

    if (isset($_GET['id']))
    {
        $episodes = $manager->getEpisode((int) $_GET['id']);

        echo 'Le ', $episodes->date_creation()->format('d/m/Y à H\hi'), '</p>', "\n",
            '<h2>', $episodes->titre(), '</h2>', "\n",
            '<p>', nl2br($episodes->contenu()), '</p>', "\n";

        if ($episodes->date_creation() != $episodes->date_modif()) {
            echo '<p><em>Modifiée le ', $episodes->date_modif()->format('d/m/Y à H\hi'), '</em></p>';
        }
    }
    else
    {
        foreach ($manager->getList(0, 5) as $episodes)
        {
            if (strlen($episodes->contenu()) <= 200) {
                $contenu = $episodes->contenu();
            }
            else
            {
                $debut = substr($episodes->contenu(), 0, 200);
                $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
                $contenu = $debut;
            }
            echo '<h4><a href="?id=', $episodes->id(), '">', $episodes->titre(), '</a></h4>', "\n", '<p>', nl2br($contenu), '</p>';
        }
    }

?>

/*
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

        <a href="chapterView.php?episode=<?= $chapter['id']; ?>">Lire plus</a>
    </div> 
     
<?php

}

?>*/

<?php $content = ob_get_clean(); ?>

