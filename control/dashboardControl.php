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

    include('../page/dashboardPage_default.php');
}

