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

    // ICI TU PEUX FAIRE TES REQUETES SQL J'EN AI DEJA CRéER PAS MAL!
    // ATTENTION TU PEUX CREER DES NOUVELLES FONCTIONS MAIS MODIFIE PAS CELLE EXISTANTE


    include('../page/settingsPage_default.php');
}

