<?php  

    require('actions/utilisateur/securiteAction.php');
    require('actions/questions/publicationAction.php');  ?>   <!--procédure de securité-->
        
<!DOCTYPE html>
<html lang="en">
<?php include 'inclusions/head.php'; ?>

<body>

    <?php include 'inclusions/navbar.php'; ?>

    <br><br>
    <form class ="container" method="POST"> <!--methode POST pour pouvoir envoyer des requetes entre le formulaire et le php-->

    <?php 
        if(isset($errorMsg)){
            echo '<p>'.$errorMsg.'</p>';   //affichage message d'erreur :tous les champs n'ont pas était remplis pour la validation (voir: inscriptionAction.php)
        }elseif(isset($successMsg)){
            echo '<p>'.$successMsg.'</p>'; //affichage message confirmation article publié avec succes
        }     
    ?> 



        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description de la question</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
            <textarea class="form-control" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="validate">Publier la question</button>

    </form>
</body>
</html>