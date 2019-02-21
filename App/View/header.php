<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />

        <title><?= $title ?></title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link href="www/css/style.css" rel="stylesheet" /> 

    </head>    

    <body>

        <header>

            <div id="logo_container">
                <a href="index.php"><img src="./www/images/logo3.png" id="logo" alt="logo Jean Forteroche"></a>
            </div>

            <nav id="navbar">
                <ul>
                    <li id="home"><a href="index.php"><i class="fas fa-home"></i></a></li>
                    <li id="link_bio"><a href="?action=getBio"><i class="far fa-user-circle"></i></a>Bio</li>
                    <li id="link_login"><a href="?action=loginAdmin"><i class="fas fa-power-off"></i></a></li>
                </ul>
            </nav>

        </header>

