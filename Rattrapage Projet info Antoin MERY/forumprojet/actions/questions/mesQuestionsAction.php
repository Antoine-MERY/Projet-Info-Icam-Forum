<?php
require('actions/database.php');

$getAllMesQuestions = $bdd->prepare('SELECT id, titre, description FROM questions WHERE id_auteur = ? ORDER BY id DESC'); // on appèle les id (des questions) du plus récent au plus ancient (décroissance) pour les afficher de cette facon.
$getAllMesQuestions->execute(array($_SESSION['id']));