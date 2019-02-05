<?php $title = "Blog de Jean Forteroche"; ?>

<?php ob_start(); ?>

<div>
    <div id="home_screen">
        <div id="home_title">
            <h1>"Un billet simple pour l'Alaska"<br /> par Jean Forteroche</h1>
        </div>
        <div id="home_play">
            <img src="./www/images/AuroraWinterTrain.jpg" id="home_image" alt="train Alaska">
        </div>
    </div>


<h2>Les derniers épisodes :</h2>

<?php foreach ($vars['episodes'] as $episode): ?>
    <h4>
        <a href="?id=<?= $episode['id']?>"><?= $episode['titre']?></a>
    </h4>
    <p><?= $episode['contenu']?></p>
</div>

<?php endforeach ?>

<?php $content = ob_get_clean(); ?>

<?php require('Template.php'); ?>

