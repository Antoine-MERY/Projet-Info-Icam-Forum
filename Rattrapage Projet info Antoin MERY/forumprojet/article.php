<?php 
session_start();
require('actions/questions/afficheArticleAction.php'); 
require('actions/questions/postReponseAction.php');
require('actions/questions/afficheToutesReponsesAction.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'inclusions/head.php';?>
</head>
<body>
    <?php include 'inclusions/navbar.php';?>

<br><br>

<div class="container">

    <?php
        if(isset($errorMsg)){ echo $errorMsg;}

        if(isset($question_publication_date)){
            ?>
            <section class="esp-contenu"> <!-- espace dédié question principale--->
                <h3><?= $question_title; ?></h3>
                <hr>
                <p><?= $question_content; ?></p>
                <hr>
                <small><?= $question_pseudo_author . ' ' . $question_publication_date; ?></small>
            </section>
                <br><br>
            <section class="esp-reponse">
                <form  class="form-group" method="POST">
                    <label>Réponse :</label>
                    <br>
                    <textarea name="answer" class="form-control"></textarea>
                    <br>
                    <button class="btn btn-primary" type="submit" name="validate">Répondre</button>

                </form>
            <br>
                <?php
                    while($answer = $getAllAnswers->fetch()){
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <?php echo $answer['pseudo_auteur']; ?>
                                </div>
                                <div class="card-body">
                                    <?php echo $answer['contenu'];?>
                                </div>
                            </div>
                            <br>
                        <?php
                    }
                ?>
            </section>
            <?php
        }
    ?>
</div>
    
</body>
</html>