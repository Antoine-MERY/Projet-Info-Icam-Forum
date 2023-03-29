<!-- Page d'inscription (création de compte) -->
<?php 
require('actions/utilisateur/inscriptionAction.php'); ?> <!-- inclusion du code de la page inscriptionAction.php pour qu'elles puissent communiquer--->
<!DOCTYPE html>
<html lang="en">
<?php include 'inclusions/head.php'; ?> <!--  require au lieu d'include pour planter la page si il y a une erreur de l'appel du fichier -->

<body>
    <br><br>
    <form class ="container" method="POST"> <!--methode POST pour pouvoir envoyer des requetes entre le formulaire et le php-->

    <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?> <!-- affichage message d'erreur :tous les champs n'ont pas était remplis pour la validation (voir: inscriptionAction.php)-->



        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pseudo</label>
            <input type="text" class="form-control" name="pseudo">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nom</label>
            <input type="text" class="form-control" name="lastname">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Prénom</label>
            <input type="text" class="form-control" name="firstname">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password">
        </div>       
        <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>
        <br><br>
        <a href="connexion.php"><p>J'ai déjà un compte, je me connecte</p></a>

    </form>
</body>
</html>