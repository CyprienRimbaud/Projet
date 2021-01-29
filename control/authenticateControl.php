<?php

function authenticateControl($userAction){
    switch ($userAction){
        case "login":
            authenticateControl_loginAction();
            break;
        case "logout":
            authenticateControl_logoutAction();
            break;

        default:
            authenticateControl_defaultAction();
            break;
    }
}

function authenticateControl_defaultAction()
{
    $tabTitle="Connexion";
    $message='';
    include('../page/authenticatePage_default.php');
}

function authenticateControl_loginAction()
{
    // Code si action=login dans l'url

    $login=$_POST['login'];
    $pwd=hash('sha1',$_POST['pwd']);

    // Appel du modèle pour chercher le mail et le mdp crypté dans la bdd
    $user=userData_findOneWithCredentials($login,$pwd);

    if (empty($user)){
        // Pas d'utilisateur avec ce mail et ce mot de passe. On prépare un message pour la vue
        $message="Vos identifiants sont incorrects. Merci de réessayer";
        // On appelle la vue par défaut
        $tabTitle="Connexion";
        include('../page/authenticatePage_default.php');
    }
    else{
        // Code si l'utilisateur existe dans la table user
        if ($user[0]['active']){
            // L'utilisateur a le droit d'accès
            $_SESSION['id']=$user[0]['id'];
            $_SESSION['login']=$user[0]['login'];
            $_SESSION['active']=$user[0]['active'];
            $_SESSION['firstName']=$user[0]['firstName'];
            $_SESSION['lastName']=$user[0]['lastName'];


                header('location:?route=dashboard&action=store');
        }
        else{
            // On informe l'utilisateur qu'il n'a pas le droit d'accès
            $message="Vous n'êtes pas autorisé à accéder à l'application. Veuillez contacter votre administrateur.";
            // On appelle la vue par défaut
            $tabTitle="Connexion";
            include('../page/authenticatePage_default.php');
        }
    }
}

function authenticateControl_logoutAction()
{
    // Code pour la déconnexion
    unset($_SESSION);
    session_destroy();
    header('location:?route=authenticate');
}