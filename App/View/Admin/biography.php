<div class="container">
    
    <h2>Biographie</h2>

    <form action="?action=addBio" method="POST">
        <textarea name="contenu" rows="20" cols="33" class="form-control txt_episode"><?= nl2br(htmlspecialchars($vars['biography'][''])); ?></textarea>        
        <input type="submit" class="btn btn-primary mb-2 connect" value="Ajouter" />
    </form>
        
    </table>

</div>
