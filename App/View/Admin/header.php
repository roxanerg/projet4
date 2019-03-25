<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
	<link rel="stylesheet" href="/css/admin.css" />
 

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
    <script src="./www/tinymce/tinymce.min.js"></script> 
    <script>
        tinymce.init({
			setup: function (editor) {
				editor.on('change', function () {
					editor.save();
				});
			},
            selector :'.txt_episode',
            content_css : 'www/css/admin.css',
			menubar: "edit format",
            contextmenu : "link table spellchecker",
            language : 'fr_FR',
            cleanup : true
            });
    </script>
</head>

<body id="body">
    <header id="header_admin">

        <div id="logo_box">
            <a href="?action=indexAdmin"><img src="www/images/Logo3.png" id="logo" alt="logo Jean Forteroche"></a>
        </div>

        <nav id="navbar">
            <ul class="nav flex-column">
                <li class="nav-item"><a href="?action=indexAdmin" class="nav-link active"><i class="fas fa-solar-panel"></i>Tableau de bord</a></li>
                <li class="nav-item"><a href="?action=allEpisodes" class="nav-link"><i class="fas fa-pencil-alt"></i>Episodes</a></li>
                <li class="nav-item"><a href="?action=allComments" class="nav-link"><i class="far fa-comment-alt"></i>Commentaires</a></li>
                <li class="nav-item"><a href="?action=editBio" class="nav-link"><i class="fas fa-user-edit"></i>Biographie</a></li>
                <li class="nav-item"><a href="?action=allUsers" class="nav-link"><i class="fas fa-users"></i>Utilisateurs</a></li>  
                <li class="nav-item" id="logout"><a href="?action=logoutAdmin" class="nav-link"><i class="fas fa-power-off"></i>LogOut</a></li> 
            </ul>
        </nav>
		
    </header>

    <header id="header_sm">

        <div id="logo_box">
            <a href="?action=indexAdmin"><img src="www/images/Logo3.png" id="logo" alt="logo Jean Forteroche"></a>
        </div>
		
		<nav id="hamburger">
			<div id="toggle">
				<input type="checkbox" />
				<span></span>
				<span></span>
				<span></span>

				<ul id="hamb_nav">
					<li class="nav-item"><a href="?action=indexAdmin" class="nav-link active"><i class="fas fa-solar-panel"></i>Tableau de bord</a></li>
					<li class="nav-item"><a href="?action=allEpisodes" class="nav-link"><i class="fas fa-pencil-alt"></i>Episodes</a></li>
					<li class="nav-item"><a href="?action=allComments" class="nav-link"><i class="far fa-comment-alt"></i>Commentaires</a></li>
					<li class="nav-item"><a href="?action=editBio" class="nav-link"><i class="fas fa-user-edit"></i>Biographie</a></li>
					<li class="nav-item"><a href="?action=allUsers" class="nav-link"><i class="fas fa-users"></i>Utilisateurs</a></li>  
					<li class="nav-item" id="logout"><a href="?action=logoutAdmin" class="nav-link"><i class="fas fa-power-off"></i>LogOut</a></li> 
				</ul>
			</div>
		</nav>
    </header>

<div class="wrapper">
