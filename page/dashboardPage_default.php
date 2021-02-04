<?php include('template/header.php'); 
include('../page/template/menu.php'); ?>

        <h1>Votre tableau bord</h1>
    <table class="table table-dark table-sm">
        <tr><th>Demandes</th><th>Date</th><th>Etat</th><th></th></tr>
        <?php
        $html="";
        for($compteur = 0; $compteur < count($userVacationData);$compteur++){
            $html.= '<tr><td>Demande numéro: '.$userVacationData[$compteur]['id'].'';
            $html.= '<td>'.$userVacationData[$compteur]['start'].'';
            $html.= " au ".$userVacationData[$compteur]['end'].'';
            $html.= '</td>';
            $html.= '<td>'.$userVacationData[$compteur]['status'].'</td>';
            $html.= '<td><div class="btn-group" role="group" aria-label="Basic mixed styles example">';
            $html.= '<button class="btn btn-danger">Supprimer</button></div></td>';
        }


        echo $html;
        ?>
    </table>
<p><a href="?route=dashboard&action=trash"> Corbeille </a></p>

        <h2>Nouvelle demande:</h2>
<form name="add" method="post">
    <p>Choisissez votre semaine :</p>
    <select name="age" onchange="showUser(this.value)">
        <option>Semaine 1</option>
        <option>Semaine 2</option>
        <option>Semaine 3</option>
    </select>
</form>

