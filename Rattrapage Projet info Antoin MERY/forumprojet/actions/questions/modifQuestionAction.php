<?php
    
    require('actions/database.php');

// validation du formulaire
if(isset($_POST['validate'])){
    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])){   // verifier si les champs sont remplis
      
        // les données à faire passer dans la requête
        $new_question_title = htmlspecialchars($_POST['title']);
        $new_question_description = nl2br(htmlspecialchars($_POST['description']));
        $new_question_content = nl2br(htmlspecialchars($_POST['content']));

        // modifier les infos de la question qui possède l'id rentré en paramètre dans l'url
        $editQuestionOnWebsite = $bdd->prepare('UPDATE questions SET titre = ?, description = ?, contenu = ? WHERE id = ?');
        $editQuestionOnWebsite->execute(array($new_question_title, $new_question_description, $new_question_content, $idOfQuestion));

        // redirection vers la page d'affichage des questions de l'utilisateur
        header('Location: mesQuestions.php');

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}