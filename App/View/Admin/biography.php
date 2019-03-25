<div class="container">
    
    <h2>Biographie</h2>

    <form action="?action=editBio" method="POST">
        <textarea name="biography" rows="20" cols="33" class="form-control txt_episode"><?= nl2br($vars['biography']['contenu']); ?></textarea>        
        <input type="submit" class="btn btn-primary mb-2 connect" value="Ajouter" />
    </form>
        
    </table>

</div>
