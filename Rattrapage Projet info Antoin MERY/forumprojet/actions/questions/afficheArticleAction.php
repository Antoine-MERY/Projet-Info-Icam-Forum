<?php

require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){ // vérifier si l'id de la question a bien été déclarée dans l'url et cet identifiant possède bien une valeur

    $idOfQuestion = $_GET['id']; // récupérer l'id de la question
    $checkIfQuestionExist = $bdd->prepare('SELECT * FROM questions WHERE id = ?'); // verifier si la question existe
    $checkIfQuestionExist->execute(array($idOfQuestion));

    if($checkIfQuestionExist->rowCount() > 0){

        $questionsInfos = $checkIfQuestionExist->fetch();// récupérer toutes les infos de la question

        // On définis ses infos dans des variables qu'on pourra manipuler
        $question_title = $questionsInfos['titre'];
        $question_content = $questionsInfos['contenu'];
        $question_id_author = $questionsInfos['id_auteur'];
        $question_pseudo_author = $questionsInfos['pseudo_auteur'];
        $question_publication_date = $questionsInfos['date_publication'];

    }else{
        $errorMsg = "Aucune question n'a été trouvée";
    }
}else{
    $errorMsg = "Aucune question n'a été trouvée";
}
