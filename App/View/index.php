<?php $title = "Blog de Jean Forteroche" ?>

<div>
    <div id="home_screen">
        <div id="home_title"><h1><b id="title">"Un billet simple pour l'Alaska"</b><br /><b id="author">par Jean Forteroche</b></h1></div>
        
        <div id="home_photo">
        <img src="images/AuroraWinterTrain.jpg" id="home_image" alt="train Alaska">
        </div>
    </div>

    <div class="episodes">
        <div id="ep_all"><h2>Les derniers épisodes :</h2></div>

        <div id="ep_home">

        <?php foreach ($vars['episodes'] as $episode): ?>
  
            <div class="ep_card">
				<div class="ep_body">
					<h3 class="ep_title">
						<a href="/episode/<?= $episode['id']?>-<?= self::cleanUrl($episode['titre'])?>"><?= $episode['titre']?></a>
					</h3>
					<p class="ep_excerpt"><?= $episode['contenu']?></p>
					<a href="/episode/<?= $episode['id']?>-<?= self::cleanUrl($episode['titre'])?>" class="next btn btn-primary btn-sm">Lire la suite</a>
				</div>
			</div>
            
        <?php endforeach; ?>

        </div>

        <nav aria-label="Episodes navigation">
            <ul class="pagination">
                <?php if($vars['page'] > 1): ?>
                
                <li class="page-item">
                    <a class="page-link" href="?page=<?=$vars['page']-1?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>                
                <?php endif; ?>

                <?php for ($i = 1; $i <= $vars['pages']; $i++): ?>   
                <li class="page-item"><a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
                <?php endfor; ?>
                
                <?php if($vars['page'] < $vars['pages']): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?=$vars['page']+1?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </nav> 
    </div>
</div>
