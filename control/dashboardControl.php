<?php

function dashboardControl($userAction){
    switch ($userAction){
        case 'store':
            dashboardControl_storeAction();
            break;
        case 'responsable':
            dashboardControl_responsableAction();
            break;
        case 'status':
            dashboardControl_statusAction();
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
    $userWanted = 0;
    $monthWanted = "Tous";
    $month = ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"];
    if(isset($_POST['userWanted'])){
        $userWanted = $_POST['userWanted'];
    }elseif(isset($_GET['iduser'])){
        $userWanted = $_GET['iduser'];
    }

    if(isset($_POST['monthWanted']) and $_POST['monthWanted'] != "allMonth"){
        $monthWanted = $_POST['monthWanted'];
        $userDataVacation = vacationData_getVacationByIdAndMonth($userWanted,monthToNumber($monthWanted));
    }else{
        $userDataVacation = vacationData_getVacationById($userWanted);
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
