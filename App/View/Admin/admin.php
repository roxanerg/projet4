<?php

require('/Model/postModel.php');

$manager = new postModel();

// à transformer en switch
if (isset($_GET['modifier'])) {
    $news = $manager->getEpisode((int) $_GET['modifier']);
}

if (isset($_GET['supprimer'])) {
    $manager->delete((int) $_GET['supprimer']);
    $message = 'L\'épisode a bien été supprimée !';
}

if (isset($_POST['titre'])) {
    $episodes = new Episodes(
        [
        'titre' => $_POST['titre'],
        'contenu' => $_POST['contenu']
        ]
    );

    if (isset($_POST['id']))
    {
        $episodes->setId($_POST['id']);
    }

    if ($episodes->isValid())
    {
        $manager->save($episodes);
        $message = $episodes->isNew() ? 'L\'épisode a bien été ajoutée !' : 'L\'épisode a bien été modifiée !';
    }
    else
    {
        $errors = $episodes->errors();
    }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />

    <title>Administration</title>
  </head>

  <body>

    <form action="Admin.php" method="post">

<?php

if (isset($message)) {
    echo $message, '<br />';
}

?>
    <?php if (isset($errors) && in_array(Episodes::TITRE_INVALIDE, $errors)) echo 'Le titre est invalide.<br />'; ?>

    Titre : <input type="text" name="titre" value="<?php if (isset($episodes)) echo $episodes->titre(); ?>" /><br />
    
    <?php if (isset($errors) && in_array(Episodes::CONTENU_INVALIDE, $errors)) echo 'Le contenu est invalide.<br />'; ?>

    Contenu :<br /><textarea rows="8" cols="60" name="contenu"><?php if (isset($episodes)) echo $episodes->contenu(); ?></textarea><br />

<?php

if(isset($episodes) && !$episodes->isNew()) {

?>
    <input type="hidden" name="id" value="<?= $episodes->id() ?>" />
    <input type="submit" value="Modifier" name="modifier" />
<?php

}
else {

?>
    <input type="submit" value="Ajouter" />
<?php

}

?>
    </form>

    <p>Il y a actuellement <?= $manager->count() ?> épisodes :</p>

    <table>

      <tr><th>Titre</th><th>Date de création</th><th>Dernière modification</th><th>Action</th></tr>

<?php

foreach ($manager->getList() as $episodes)
{
  echo '<tr><td>', $episodes->titre(), '</td><td>', $episodes->date_creation()->format('d/m/Y à H\hi'), '</td><td>', ($episodes->date_creation() == $episodes->date_modif() ? '-' : $episodes->date_modif()->format('d/m/Y à H\hi')), '</td><td><a href="?modifier=', $episodes->id(), '">Modifier</a> | <a href="?supprimer=', $episodes->id(), '">Supprimer</a></td></tr>', "\n";
}

?>

    </table>
  </body>
</html>
