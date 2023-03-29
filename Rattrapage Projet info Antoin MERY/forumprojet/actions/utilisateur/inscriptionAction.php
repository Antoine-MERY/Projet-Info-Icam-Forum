<!--code qui traite les requetes et actions de l'utilisateur sur la page de connection-->

<?php
session_start();
require('actions/database.php');
// on verifie si l'utilisateur a appuyé sur le bouton "S'inscrire" dans la page de connection (si la variable POST "name=validate" existe)
if(isset($_POST['validate'])){

    if(!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password'])){ // on vérifie si il remplie bien tous les champs (si les champs ne sont pas vides)
           
        //stocker toutes les données réqupérées dans des variables pour pouvoir les réutiliser
        $user_pseudo = htmlspecialchars($_POST['pseudo']); //htmlspecialchars comme securité (éviter que les utilisateurs n'écrivent en html dans les champs)
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT); //password_hash comme securité; criptage du mdp (il ne faut pas qu'il apparaisse en clair dans le code source)

        //vérification de l'id de l'utilisateur (compte déjà existant?)
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM user WHERE pseudo = ?'); //reccuperation du pseudo de l'utilisateur dans la table user qui possède ce pseudo
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        if ($checkIfUserAlreadyExists->rowCount() == 0){  // si un utilisateur s'est connecté:

            $insertUserOnWebsite = $bdd->prepare('INSERT INTO user(pseudo, nom, prenom, mdp)VALUES(?, ?, ?, ?)');   //inscription de l'utilisateur dans bdd
            $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));

            $getInfosOfThisUser = $bdd->prepare('SELECT id, pseudo, nom, prenom FROM user WHERE nom = ? AND prenom = ? AND pseudo = ?'); // authentification de l'utilisateur (récupération des données)
            $getInfosOfThisUser->execute(array($user_lastname, $user_firstname, $user_pseudo)); 

            $usersInfos = $getInfosOfThisUser->fetch(); // stockage dans un tableau

            // Authentifie les champs d'utilisateur et récupération des données dans des variables globales session pour pouvoir les récupérer plus tard
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['lastname'] = $usersInfos['nom'];
            $_SESSION['firstname'] = $usersInfos['prenom'];
            $_SESSION['pseudo'] = $usersInfos['pseudo'];

            //Rediriger l'utilisateur vers la page d'acceuil 
            header('Location: pageAccueil.php');                    
        }else{
            $errorMsg = "L'utilisateur existe déjà";
        }


        }else{ // sinon afficher le message d'erreur lors de la validation
            $errorMsg = "Veuillez compléter tous les champs...";
        }
}