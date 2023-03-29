<?php // fichier pour stocker le code à inclure dans page accueil

require('actions/database.php');

$getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions ORDER BY id DESC'); // recupérations des données de la table questions de la base de donnée triés par ordre décroissants
if(isset($_GET['search']) AND !empty($_GET['search'])){ // verifier si une question a été rentré par l'utilisateur

    $usersSearch = $_GET['search']; // recherche
    $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions WHERE titre LIKE "%'.$usersSearch.'%" ORDER BY id DESC'); // récupérer toutes les questions qui correspondent à la recherche
    // attribut "LIKE": pour obtenir des résultats de titres similaires au celui recherché (fonctionnement: après que l'utilisateur ait effectué sa recherche pour trouver un article par son titre, même si le titre entré n'est pas exacte, la recherche parviendra à afficher les questions les plus proches de la recherche grace aux mots clés équivalents entre le titre de la question et la recherche)

    
}