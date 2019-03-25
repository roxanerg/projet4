<body>
    <div class="container-fluid connexion col-7">
        <h2>Connexion</h2>

        <form action="login" method="post" class="form-signin">
            <input type="email" name="login" class="form-control" placeholder="Identifiant"/>

            <input type="password" name="password" class="form-control password" placeholder="Mot de passe"/>

            <input type="submit" class="btn btn-primary mb-2 connect" value="Connexion" />
        </form>

        <?php if (isset($vars['error'])): ?>

        <div id="error"><?= $vars['error'] ?></div>
        
        <?php endif ?>
    </div>
</body>