<?php //détruire toutes les sessions lorsque l'utilisateur est déconnecté (sécurité)
session_start();
$_SESSION = [];
session_destroy();
header('Location: ../../inscription.php');