<?php

function dashboardControl($userAction){
    switch ($userAction){
        case 'trash':
            dashboardControl_trashAction();
            break;
        default:
            dashboardControl_defaultAction();
            break;
    }
}

function dashboardControl_defaultAction()
{

    $tabTitle="Consultation";
    $userVacationData = vacationData_getAllWithIdNotTrash($_SESSION['id']);
    include('../page/dashboardPage_default.php');
}

function dashboardControl_trashAction()
{
    $tabTitle="Corbeille";
    $userVacationTrash = vacationData_getAllWithIdTrash($_SESSION['id']);
    include('../page/dashboardPage_trash.php');
}
