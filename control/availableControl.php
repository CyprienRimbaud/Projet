<?php

function availableControl($userAction){
    switch ($userAction){
        case "consult":
            availableControl_consultAction();
            break;

        case "store":
            availableControl_storeAction();
            break;
        default:
            availableControl_defaultAction();
            break;
    }
}

function availableControl_defaultAction()
{
    $tabTitle="Available";
    include('../page/availablePage_default.php');
}

function availableControl_consultAction()
{
    $tabTitle="Available consult";
    include('../page/availablePage_consult.php');
}

function availableControl_storeAction()
{
    // Code pour la route available et l'action store
    $datas['test']=$_POST['formulair'];
    $datas['deGarde']=$_POST['choixSemaine'];
    $datas['ligue_id']=$_SESSION['ligue_id'];
    
    var_dump($_POST);
    
    $test=planifierData_store($datas);
    
    if ($test>0){
        $message="Le formulaire a été enregistré avec succès.";
    }
    else {
        $message="Il y a un problème dans vos choix de formulaire ou bien nous avons perdu la connexion !!"; 
    }

    // On appelle à nouveau la vue par défaut
    $tabTitle="Available";
    include('../page/availablePage_default.php');
}   