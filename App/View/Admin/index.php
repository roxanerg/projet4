<h2>Bienvenue</h2>

<h3>Commentaires signalés :</h3>

<?php foreach ($vars['moderateComm'] as $comms): ?>

    <h4><?= $comms['auteur']?></h4>

    <p><?= $comms['commentaire']?></p>

<?php endforeach; ?>
