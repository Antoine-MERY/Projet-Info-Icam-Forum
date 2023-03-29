<?php

require('actions/database.php');

$getAllAnswers = $bdd->prepare('SELECT id_auteur, pseudo_auteur, id_question, contenu FROM reponse WHERE id_question = ? ORDER BY id DESC'); // recuperation des données d'une réponse dans la bdd reponse qui possède l'id de question passée en paramètre 
$getAllAnswers->execute(array($idOfQuestion));
