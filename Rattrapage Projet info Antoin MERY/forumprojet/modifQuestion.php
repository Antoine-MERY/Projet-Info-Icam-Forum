<!--affiche le formulaire à l'utilisateur-->

<?php 
    
    require('actions/utilisateur/securiteAction.php');
    require('actions/questions/modifQuestionAction.php');
    require('actions/questions/infosQuestionModifAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'inclusions/head.php';?>
<body>
    <?php include 'inclusions/navbar.php';?>

<br><br>

    <div class="container">
        <?php 
            if(isset($errorMsg)){ 
                echo '<p>'.$errorMsg.'</p>'; // affichage message d'erreur :tous les champs n'ont pas était remplis pour la validation (voir: inscriptionAction.php) -->
    }  
    ?>

    <?php
        if(isset($question_content)){
            ?>
            <form method="POST"> <!--methode POST pour pouvoir envoyer des requetes entre le formulaire et le php-->

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
                    <input type="text" class="form-control" name="title" value=" <?php echo  $question_title; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Description de la question</label>
                    <textarea class="form-control" name="description"><?php echo  $question_description; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
                    <textarea class="form-control" name="content"><?php echo  $question_content; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="validate">Modifier la question</button>

            </form> 
            <?php
        }
    ?>
    
</div>

</body>
</html>