<?php

require_once('../lib/config.php');

$login = $_POST['email'];
$password = sha1($_POST['password']);

$utilisateurExiste = $pdo->sql("SELECT iwit_utilisateur_id FROM iwit_utilisateurs WHERE iwit_utilisateur_email = ? AND iwit_utilisateur_password = ?", array($login, $password));
$countUtilisateurs = $utilisateurExiste->rowCount();

if ($countUtilisateurs == 1) {
    session_start();
    $allUtilsateur = $pdo->sqlRow("SELECT * FROM iwit_utilisateurs WHERE iwit_utilisateur_email = ? AND iwit_utilisateur_password = ?", array($login, $password));
    $_SESSION['utilisateur_id'] = $allUtilsateur['iwit_utilisateur_id'];
    $_SESSION['utilisateur_nom'] = $allUtilsateur['iwit_utilisateur_nom'];
    $_SESSION['utilisateur_prenom'] = $allUtilsateur['iwit_utilisateur_prenom'];
    $_SESSION['utilisateur_nomComplet'] = $allUtilsateur['iwit_utilisateur_nomComplet'];
    $_SESSION['utilisateur_email'] = $allUtilsateur['iwit_utilisateurs_email'];
    $_SESSION['utilisateur_photo'] = $allUtilsateur['iwit_utilisateur_image'];

    header("Location: ../index.php?p=modules/locaux");
} else {
    echo 'you$uck';
}

?>