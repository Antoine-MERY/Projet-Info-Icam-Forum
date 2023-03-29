<!--fichier pour publier la question-->

<?php
    require('actions/database.php'); 

if(isset($_POST['validate'])){   // si l'utilisateur appuie sur le bouton valider..

    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])){// vérifier si les champs ne sont pas vides

            //les données de la question
            $question_title = htmlspecialchars($_POST['title']);  //htmlspecialchars comme securité (éviter que les utilisateurs n'écrivent en html dans les champs)
            $question_description = nl2br(htmlspecialchars($_POST['description'])); //variable nl2br car php ne reconnait pas les sauts de ligne
            $question_content = nl2br(htmlspecialchars($_POST['content']));
            $question_date = date('d/m/Y'); // (récupération de la date)
            $question_id_author = $_SESSION['id']; // (récupération id auteur)
            $question_pseudo_author = $_SESSION['pseudo']; // (récupération pseudo auteur)

            // inserer la question sur le site
            $insertQuestionOnWebsite = $bdd->prepare ('INSERT INTO questions(titre, description, contenu, id_auteur, pseudo_auteur, date_publication)VALUES( ?, ?, ?, ?, ?, ?)'); // creation de variables pour simplifier les appels
            $insertQuestionOnWebsite->execute(array($question_title, $question_description, $question_content, $question_id_author, $question_pseudo_author, $question_date));

            $successMsg = "Votre question a bien été publiée";

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
                
}
