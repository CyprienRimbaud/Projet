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
    $userDataVacation = vacationData_getVacation();
    include('../page/dashboardPage_responsable.php');

}