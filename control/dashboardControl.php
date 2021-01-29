<?php

function dashboardControl($userAction){
    switch ($userAction){
        default:
            dashboardControl_defaultAction();
            break;
    }
}

function dashboardControl_defaultAction()
{

    $tabTitle="Consultation";
    $userVacationData = vacationData_getAllWithId($_SESSION['id']);
    include('../page/dashboardPage_default.php');
}
