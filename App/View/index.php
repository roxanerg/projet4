<?php $title = 'Accueil'; ?>


<?php ob_start(); ?>

<div>
    <h1>Bienvenue sur le blog de Jean Forteroche</h1>
    <img>
</div>

<aside>
    <h2>Episodes :</h2>

<?php

while ($data = $chapter->fetch())
{

?>
    <div class="episode">
        <h3>
            <?= htmlspecialchars($data['title']) ?>

            <em>le <?= $data['jour'] ?></em>
        </h3>
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?><br />
            <em><a href="post.php?id=<?= $data['id'] ?>">Lire la suite</a></em>
        </p>
    </div>
</aside>


<?php

}

$chapter->closeCursor();

?>

<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>