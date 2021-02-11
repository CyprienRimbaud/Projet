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

    $tabTitle="Mes demandes en cours :";
    $userVacationData = vacationData_getAllWithId($_SESSION['id']);
    include('../page/dashboardPage_default.php');
}
