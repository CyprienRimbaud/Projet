<?php

function dashboardControl($userAction){
    switch ($userAction){
        case 'store':
            dashboardControl_storeAction();
            break;
        case 'responsable':
            dashboardControl_responsableAction();
            break;
        default:
            dashboardControl_defaultAction();
            break;
    }
}

function dashboardControl_defaultAction()
{

    $tabTitle="Mes demandes en cours :";
    $userVacationData = vacationData_getAllWithId($_SESSION['id']);


    include('../page/dashboardPage_default.php');
}

function dashboardControl_storeAction(){
    $dateStart = dateFrToUs($_POST['dateStart']);
    $dateEnd = dateFrToUs($_POST['dateEnd']);
    $typeVacation = (int) $_POST['typeVacation'];
    vacationData_insertVacationById($dateStart,$dateEnd,$typeVacation);

    dashboardControl_defaultAction();
}

function dashboardControl_responsableAction(){
    $tabTitle = "Menu responsable : ";


    $userDataVacation = vacationData_getVacationById($_POST['userWanted']);
    $messageUser = '';
    if (isset($userDataVacation)) {
        $messageUser = 'Erreur, selectionnez une personne';
    }

    $userData = userData_getAll();
    if (isset($_GET['idvacation'])) {
        $idVacation = $_GET['idvacation'];
        $idUser = $_GET['iduser'];
        $status = $_GET['state'];
        vacationData_changeStatusById($idUser,$status,$idVacation);
    }
    include('../page/dashboardPage_responsable.php');

}


