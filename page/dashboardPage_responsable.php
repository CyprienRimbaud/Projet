<?php include ('../page/template/header.php'); ?>

<div class="card-header">
    Demandes en cour :
</div>
<form method="post" action ="?route=dashboard&action=responsable">
<label>Paramètres de recherche :</label>
    <select name ="userWanted" select class="form-select" aria-label="Default select example">
        <?php


        $html = '';
        foreach($userData as $user){
            $html.= '<option value ="'.$user['id'].'">'.$user['login'].'</option>';
        }
        echo $html;

        ?>
    </select>
    <select name ="monthWanted" select class="form-select" aria-label="Default select example">
            <option selected value="allMonth">Tous les mois</option>
        <?php foreach($month as $oneMonth){ ?>
            <option value ="<?=$oneMonth?>"> <?=$oneMonth?></option>
        <?php } ?>

    </select>
    <input type="submit" value="Valider">
</form>

<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Début</th>
        <th>Fin</th>
        <th>Raison</th>
        <th>Commentaire</th>
        <th>Status actuel</th>
        <th>Actions</th>

    </tr>
    </thead>
    <tbody>
    <p><strong>Vous avez choisi le mois : <?php if(isset($_POST['monthWanted']) and $_POST['monthWanted'] == "allMonth"){ echo " tous"; }elseif(isset($_POST['monthWanted']) and $_POST['monthWanted']){ echo $_POST['monthWanted'];}?></strong></p>
    <?php
    $html = '';
    if(count($userDataVacation)<= 0){
        echo '<p><strong> Selectionnez un utilisateur </strong></p>';
    }else{
        foreach($userDataVacation as $userVacation){
            $html.= '<tr><td>'.$userVacation['vacation_id'].'</td>';
            $html.= '<td>'.$userVacation['lastname'].'</td>';
            $html.= '<td>'.$userVacation['firstname'].'</td>';
            $html.= '<td>'.dateUsToFr($userVacation['start']).'</td>';
            $html.= '<td>'.dateUsToFr($userVacation['end']).'</td>';
            $html.= '<td>'.vacation_getReasonLabel($userVacation['label']).'</td>';
            $html.='<td>'.$userVacation['comentary'].'</td>';
            $html.= vacation_getStatusLabel($userVacation['status']);
            if($userVacation['status'] == 3){
                $html.='<td><div class="btn-group"><a href="?route=dashboard&action=delete&idvacation='.$userVacation['vacation_id'].'&iduser='.$userVacation['id'].'" class="btn bg-orange" role="button" data-bs-toggle="button">Accepter l\'annulation !</a>';
                $html.='<a href="?route=dashboard&action=status&idvacation='.$userVacation['vacation_id'].'&iduser='.$userVacation['id'].'&state=0" class="btn btn-warning" role="button" data-bs-toggle="button">Ne pas accepter !</a></td>';
            }else{
                $html.='<td><div class="btn-group"><a href="?route=dashboard&action=status&idvacation='.$userVacation['vacation_id'].'&iduser='.$userVacation['id'].'&state=2" class="btn btn-danger" role="button" data-bs-toggle="button">Refusé !</a><a href="?route=dashboard&action=status&idvacation='.$userVacation['vacation_id'].'&iduser='.$userVacation['id'].'&state=0" class="btn btn-warning" role="button" data-bs-toggle="button">En attente !</a><a href="?route=dashboard&action=status&idvacation='.$userVacation['vacation_id'].'&iduser='.$userVacation['id'].'&state=1" class="btn btn-success" role="button" data-bs-toggle="button">Valider !</a></div></td></tr>';
            }
        }
    }

    echo $html;

    ?>



    </tbody>
</table>


<?php include ('../page/template/footer.php'); ?>

