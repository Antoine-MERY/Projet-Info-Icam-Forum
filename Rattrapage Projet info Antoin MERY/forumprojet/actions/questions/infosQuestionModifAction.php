<?php
require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){// verifier si id question est bien passée en paramètre

    $idOfQuestion = $_GET['id'];

    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?'); // Verifier si la question existe / * pour: selection de touts les données d'une question dans bdd
    $checkIfQuestionExists->execute(array($idOfQuestion));

    if($checkIfQuestionExists->rowCount() > 0){

        $questionInfos = $checkIfQuestionExists->fetch(); // recuperer les donnees de la question
        if($questionInfos['id_auteur'] == $_SESSION['id']){

            $question_title = $questionInfos['titre'];
            $question_description = $questionInfos['description'];
            $question_content = $questionInfos['contenu'];

            $question_description = str_replace('<br />', '', $question_description); // supprimer les occurances <br> dans les zones de texte en les remplacant par rien
            $question_content = str_replace('<br />', '', $question_content);

        }else{
            $errorMsg = "Vous n'êtes pas l'auteur de cette question";
        }


    }else{
        $errorMsg = "Vous n'êtes pas l'auteur de cette question";
    }


}else{
    $errorMsg = "Aucune question n'a été trouvée";
}