<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />

        <title><?= $title ?></title>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link href="www/css/style.css" rel="stylesheet" /> 
        
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    </head>    

    <body>

    <nav id="navbar">
        <ul>
        <li id="home">Accueil</li>
        <li>Episodes</li>
        <li id="login"><i class="fas fa-power-off"></i></li>
        </ul>
    </nav>
        
    <div id="container">
        <?= $content ?>
    </div>

    <footer>
    
    </footer>

    </body>
</html>
