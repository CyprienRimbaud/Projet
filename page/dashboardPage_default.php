<?php include('template/header.php'); 
include('../page/template/menu.php'); ?>

        <h1>Votre tableau bord</h1>
    <table class="table table-dark table-striped">
        <tr><th>Demandes</th><th>Date</th><th>Etat</th><th>Raisons</th></tr>
        <?php

        $html="";
        for($compteur = 0; $compteur < count($userVacationData);$compteur++){
            $html.= '<tr><td>Demande numéro: '.$userVacationData[$compteur]['id'].'';
            $html.= '<td>'.$userVacationData[$compteur]['start'].'';
            $html.= " au ".$userVacationData[$compteur]['end'].'';
            $html.= '</td>';
            $html.= '<td>'.vacation_getStatusLabel($userVacationData[$compteur]['status']).'</td>';
            $html.= '<td>'.vacation_getReasonLabel($userVacationData[$compteur]['label']).'</td>';
        }

        echo $html;
        ?>
    </table>

        <h2>Créer une nouvelle demande:</h2>

<form name="add" method="post">
    <label for="dataResa">Du : </label>
    <input type="date" name="dateResa">
    <label for="dataResa">au : </label>
    <input type="date" name="dateResa">
    <?php
    $html="";
    for($i=0;$i<=5;$i++){
        $html.='<div class="form-check form-check-inline">';
        $html.='<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">';
        $html.='  <label class="form-check-label" for="inlineRadio1">RTT</label></div>';


    }
    echo $html;
    ?>



</form>


<?php include('template/footer.php');

