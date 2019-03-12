<h2 id="welcome">Bienvenue</h2>

<h3 id="flagged">Commentaires signalés :</h3>

<?php foreach ($vars['moderateComm'] as $comms): ?>

    <h4><?= $comms['auteur']?></h4>

    <p><?= $comms['commentaire']?></p>

<?php endforeach; ?>
