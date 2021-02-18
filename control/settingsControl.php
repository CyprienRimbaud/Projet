<?php

function settingsControl($userAction){
    switch ($userAction){
        default:
            settingsControl_defaultAction();
            break;
    }
}

function settingsControl_defaultAction()
{

    $tabTitle="Mes paramètres ";



    include('../page/settingsPage_default.php');
}

