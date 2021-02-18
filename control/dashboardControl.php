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
        case 'cancel':
            dashboardControl_cancelAction();
            break;
        case 'delete':
            dashboardControl_deleteAction();
            break;
        default:
            dashboardControl_defaultAction();
            break;
    }
}

function dashboardControl_defaultAction()
{

    $tabTitle="Mes demandes en cours :";
    $userVacationData = vacationData_getVacationById($_SESSION['id']);
    if(isset($_GET['state'])){
        $idVacation = $_GET['idvacation'];
        $idUser = $_GET['iduser'];
        $status = $_GET['state'];
        vacationData_changeStatusById($idUser,$status,$idVacation);
    }

    include('../page/dashboardPage_default.php');
}

function dashboardControl_storeAction(){
    $dateStart = dateFrToUs($_POST['dateStart']);
    $dateEnd = dateFrToUs($_POST['dateEnd']);
    $typeVacation = (int) $_POST['typeVacation'];
    $comments = $_POST['comments'];
    vacationData_insertVacationById($dateStart,$dateEnd,$typeVacation,$comments);

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
        if(isset($_GET['user'])){
            $userWanted = $_GET['user'];
        }
        $userDataVacation = vacationData_getVacationById($userWanted);
    }
    $userData = userData_getAllWithResponsableId($_SESSION['id']);



    include('../page/dashboardPage_responsable.php');

}

function dashboardControl_statusAction(){

    if (isset($_GET['idvacation'])) {
        $idVacation = $_GET['idvacation'];
        $idUser = $_GET['iduser'];
        $status = $_GET['state'];
        vacationData_changeStatusById($idUser,$status,$idVacation);
    }

    header('location:?route=dashboard&action=responsable&user='.$idUser);
}

function dashboardControl_cancelAction(){
    if(isset($_GET['id'])){
        $idVacation = $_GET['id'];
        $idUser = $_SESSION['id'];
        vacationData_changeStatusById($idUser,3,$idVacation);
    }
    header('location:?route=dashboard');
}

function dashboardControl_deleteAction(){
    if(isset($_GET['iduser'])){
        $idVacation = $_GET['idvacation'];
        $idUser = $_GET['iduser'];
        vacationData_deleteVacationWithVacationId($idVacation);
    }

    header('location:?route=dashboard&action=responsable&user='.$idUser);
}