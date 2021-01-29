<?php

function dashboardControl($userAction){
    switch ($userAction)
    {
        case 'store':
            dashboardControl_storeAction();
            break;
        default:
            dashboardControl_defaultAction();
            break;
    }
}

function dashboardControl_defaultAction()
{
    $tabTitle="Consultation";

    include('../page/dashboardPage_default.php');
}

function dashboardControl_storeAction()
{
    $vacations = vacationData_getAllWithId();
    include ('../page/dashboardPage_responsable.php');
}
