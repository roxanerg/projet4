<div class="container-fluid">
    
    <?php $title = "Blog de Jean Forteroche"; ?>

    <?php

    if (empty($vars)) 
    {
            echo '<p> Ce billet n\'existe pas </p>';
    } 
    else 
    {
        $page=$vars['episode']['id']; ////// POUR PAS COMMENTER LES LIENS DE PAGES
    ?>
            <div id="episode">
                <h2 id="episode_title">
                    <?= $vars['episode']['titre']; ?>
                </h2>  
                
                Publié le : 
                <?php if (empty($vars['episode']['date_modif'])) { ?> 
                    <div id="episode_date"><?= $vars['episode']['date_creation']; ?></div>  
                <?php } else { ?>
                    <div id="episode_date"><?= $vars['episode']['date_modif']; ?></div> 
                <?php } ?>
                
                <p id="episode_text">
                    <?= nl2br($vars['episode']['contenu']); ?>
                </p> 
            </div>
            
            <a href="?action=episodeView&id=<?= $page - 1; ?>">Page précédente</a>
            <a href="?action=episodeView&id=<?= $page + 1; ?>">Page suivante</a>

    <?php
    }

    ?>
            <h3>Ajouter un commentaire<h3>

                <form action="index.php?action=addComment" method="post"> 
                    <input type="hidden" name="episodeId" value="<?= $vars['episode']['id']?>">
                    <input type="text" name="auteur" placeholder="Nom" required><br />
                    <textarea rows="10" cols="25" name="commentaire" placeholder="Commentaire" required></textarea><br />
                    <input type="submit" value="Valider"> 
                </form>

            <h3 id="comms">Commentaires</h3>

    <?php foreach ($vars['comments'] as $comments): ?>

            <h4><?=htmlspecialchars($comments['auteur'])?></h4>

            <p><?=htmlspecialchars($comments['commentaire'])?></p>

            <p><em><?=htmlspecialchars($comments['jour_comm'])?></em></p>

            <button class="report" name="<?=$comments['id']?>"><i class="far fa-flag"></i></button>
        
    <?php endforeach ?>

    <script>

    $(document).ready(function() {
    
        $('.report').on('click', function(event) {

            var comment_id = $(this).attr('name');

            $.ajax ({
                url:"index.php?action=reportComment&id=" + comment_id,
                method:"GET",
                dataType:"text",
                success:function()
                {
                    alert('Le commentaire a bien été signalé');
                }


            })
        })
    });

    </script>
</div>
