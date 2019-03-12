<body>
    <div class="container-fluid">
        <h2>Connexion</h2>

        <form action="?action=loginAdmin" method="post">
            <input type="email" name="login" class="form-control" placeholder="Identifiant"/><br />

            <input type="password" name="password" class="form-control password" placeholder="Mot de passe"/><br /><br />

            <input type="submit" class="btn btn-primary mb-2 connect" value="Connexion" />
        </form>
        
        <script>
        
            $('.connect').submit (function({
                var password = $('.password').val();
                var hash = password_hash(password);
            }))
        
        </script>

        <?php if (isset($vars['error'])): ?>

        <div id="error"><?= $vars['error'] ?></div>
        
        <?php endif; ?>
    </div>
</body>