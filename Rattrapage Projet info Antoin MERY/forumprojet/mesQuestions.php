<?php
    require('actions/utilisateur/securiteAction.php');
    require('actions/questions/mesQuestionsAction.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'inclusions/head.php';?>
<body>
    <?php include 'inclusions/navbar.php';?>

   <br><br> 
    <div class="container">

    <?php
        while($question = $getAllMesQuestions->fetch()) {
            ?>
            <div class="card">
                <h5 class="card-header">
                    <?php echo $question['titre'];?>  <!-- recuperation titre de la question -->    
                </h5>
            <div class="card-body">  
                <p class="card-text"><?php echo $question['description'];?></p> <!-- recuperation de la description de la question -->
                <a href="article.php?id=<?php echo $question['id'];?>" class="btn btn-primary">Accéder à la question</a>
                <a href="modifQuestion.php?id=<?php echo $question['id'];?>" class="btn btn-warning">Modifier</a> <!--envoi vers page de modif question en fonction de l'id question-->
                <a href="actions/questions/supprimeQuestionAction.php?id=<?php echo $question['id'];?>" class="btn btn-danger">Supprimer</a> <!-- envoie vers page de suppression -->
            </div>
            </div>
            <br>

            <?php
        }
    ?>

    </div>
    
</body>
</html>