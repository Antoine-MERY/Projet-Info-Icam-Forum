<?php

session_start();
if(!isset($_SESSION['auth'])){// verif connexion utilisateur
    header('Location: ../../connexion.php'); // sinon redirection vers connnexion
}

require('../database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){ // verifier si l'id est rentré en paramètre dans l'url
    $idQuestion = $_GET['id']; // l'id en paramètre

    $verifQuestionExiste = $bdd->prepare('SELECT id_auteur FROM questions WHERE id = ?'); // recupreration de l'id de la question dans la base de donnee et verifier si la question existe
    $verifQuestionExiste->execute(array($idQuestion));

    if($verifQuestionExiste->rowCount() > 0){

        $InfosQuestion = $verifQuestionExiste->fetch(); // recuperer les infos de la question
        if($InfosQuestion['id_auteur'] == $_SESSION['id']){

            $supprimerQuestion = $bdd->prepare('DELETE FROM questions WHERE id = ?'); // suppression de la question
            $supprimerQuestion->execute(array($idQuestion));

            header('Location: ../../mesQuestions.php');

        }else{
            echo "Cette question ne vous appartient pas";
        }
    }else{
        echo "Aucune question n'a été trouvée";
    }

}else{
    echo "Aucune question n'a été trouvée";
}