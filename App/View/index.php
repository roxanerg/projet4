<?php $title = "Blog de Jean Forteroche"; ?>

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
        <a href="?action=chapterView&id=<?= $episode['id']?>"><?= $episode['titre']?></a>
    </h4>
    <p><?= $episode['contenu']?></p>


<?php endforeach; ?>

<?php for ($i = 1; $i <= $vars['pages']; $i++): ?>
    <div id="pagination">
        <a href="?page=<?=$i?>"><?=$i?></a>
    </div>    
<?php endfor; ?>

</div>
