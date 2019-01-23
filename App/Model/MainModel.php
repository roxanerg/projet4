<?php

function getPosts() 
{
    $db = connectDb();
    $request = $db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y") AS jour FROM billets ORDER BY date_creation DESC LIMIT 0, 5');
    return $request;
}

function getChapter($postId) 
{
    $db = connectDb();
    $request= $db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, '%d/%m/%Y') AS jour FROM billets WHERE id = ?');
    $request->execute(array($postId));
    $chapter = $request->fetch();
    return $chapter;
}

function getComments($postId) 
{  
    $db = connectDb();
    $comments = $db->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, "%d/%m/%Y %Hh%imin%ss") AS jour_comm FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC');
    $comments->execute(array($postId));
    return $comments;
}

function postComment() 
{
    $db = connectDb($postId, $auteur, $commentaire);
    if (isset($_POST['auteur']) && isset($_POST['commentaire']))
    {
        $request = $db->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire, date_commentaire) VALUES (?, ?, ?, NOW())');
        $addComm = $request->execute(array($postId, $auteur, $commentaire));
        return $addComm;       
    }
}

function connectDb() 
{
    try 
    {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

    catch (Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }  
}
