<?php

session_start();
require('actions/database.php');

// on verifie si l'utilisateur a appuyé sur le bouton "S'inscrire" dans la page de connection (si la variable POST "name=validate" existe)
if(isset($_POST['validate'])){

    if(!empty($_POST['pseudo']) AND !empty($_POST['password'])){ // on vérifie si il remplie bien tous les champs (si les champs ne sont pas vides)
           
            //stocker toutes les données réqupérées dans des variables pour pouvoir les réutiliser
            $user_pseudo = htmlspecialchars($_POST['pseudo']); //htmlspecialchars comme securité (éviter que les utilisateurs n'écrivent en html dans les champs)
            $user_password = htmlspecialchars($_POST['password']); 

            $checkIfUsersExists = $bdd->prepare('SELECT * FROM user WHERE pseudo = ?'); // check du pseudo dans bdd
            $checkIfUsersExists->execute(array($user_pseudo));

            if($checkIfUsersExists->rowCount() > 0){
                
                $usersInfos = $checkIfUsersExists->fetch();     // récupération données user
                if(password_verify($user_password, $usersInfos['mdp'])){     // les deux mdp correspondent ?

                    // Authentifie les champs d'utilisateur et récupération des données dans des variables globales session
                    $_SESSION['auth'] = true;
                    $_SESSION['id'] = $usersInfos['id'];
                    $_SESSION['lastname'] = $usersInfos['nom'];
                    $_SESSION['firstname'] = $usersInfos['prenom'];
                    $_SESSION['pseudo'] = $usersInfos['pseudo'];

                    // une fois qu'il est authentifié -> redirection vers la page d'accueil
                    header('Location: pageAccueil.php');

                }else{
                    $errorMsg = "Mot de passe incorrect...";
                }

            }else{
                    $errorMsg = "Pseudo incorrect...";
            }

    }else{ // sinon afficher le message d'erreur lors de la validation
                    $errorMsg = "Veuillez compléter tous les champs...";
    }
}
