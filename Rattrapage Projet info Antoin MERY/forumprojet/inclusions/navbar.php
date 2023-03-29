<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Icam Forum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="pageAccueil.php">Les question</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="publication.php">Publier une question</a>
        </li>

        <?php // On veut que l'onglet d'accès à "Mes questions" dans la barre de navigation soit uniquement présente pour un utilisateur déjà connecté (pas pour une personne lambda sans compte)
          if(isset($_SESSION['auth'])){ // seuelement dans le cas ou utilisateur est authantifié
            ?>
              <li class="nav-item">
              <a class="nav-link" href="mesQuestions.php">Mes questions</a>
              </li>
            <?php 
          }
        ?>

        <?php // Meme raison que si dessus (onglet de déconnexion unniquement accessible pour un utilisateur enregistré)
          if(isset($_SESSION['auth'])){
            ?>
              <li class="nav-item">
              <a class="nav-link" href="actions/utilisateur/deconnectAction.php">Déconnexion</a>
              </li>
            <?php 
          }
        ?>

      </ul>
    </div>
  </div>
</nav>