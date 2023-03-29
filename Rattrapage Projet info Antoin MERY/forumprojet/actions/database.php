<?php

try{ // verification connection bien effectuée
    $bdd = new PDO('mysql:host=localhost;dbname=forumbdd;charset=UTF8;', 'root'); // variable bdd (base de donnée) / classe PDO pour faire des requetes sql simples / (hote;nom base de donnée;encodage char speciaux;nom utilisateur bdd)
}catch(Exception $e){ // si ca ne marche pas activer var e qui stock l'exception suivante
    die('Une erreur a été trouvée : ' . $e->getMessage()); // planter et efficher le message d'erreur
}
