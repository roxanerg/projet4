<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="./www/css/admin.css" />

    <script src="./www/tinymce/tinymce.min.js"></script> 
    <script>
        tinymce.init({
            selector :'.txt_episode',
            content_css : 'www/css/admin.css',
            contextmenu : "link image imagetools table spellchecker",
            language : 'fr_FR',
            cleanup : true
            });
    </script>
</head>

<body>
    <div class="wrapper">
        <header id="header_admin">

            <div id="logo_box">
                <a href="?action=indexAdmin"><img src="www/images/logo3.png" id="logo" alt="logo Jean Forteroche"></a>
            </div>

            <nav id="navbar">
                <ul>
                    <li><a href="?action=indexAdmin"><i class="fas fa-solar-panel"></i>Tableau de bord</a></li>
                    <li><a href="?action=allEpisodes"><i class="fas fa-pencil-alt"></i>Episodes</a></li>
                    <li><a href="?action=allComments"><i class="far fa-comment-alt"></i>Commentaires</a></li>
                    <li><a href="?action=editBio"><i class="fas fa-user-edit"></i>Biographie</a></li> 
                    <li><a href="?action=logoutAdmin"><i class="fas fa-power-off"></i>LogOut</a></li> 
                </ul>
            </nav>
        </header>

        <div class="container-fluid">
