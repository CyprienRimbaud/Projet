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
        <th>Action</th>

    </tr>
    </thead>
    <tbody>
    <p><strong>Vous avez choisi le mois : <?php if(isset($_POST['monthWanted']) and $_POST['monthWanted'] == "allMonth"){ echo " tous"; }elseif(isset($_POST['monthWanted']) and $_POST['monthWanted']){ echo $_POST['monthWanted'];}?></strong></p>
    <?php
    $html = '';
    if(count($userDataVacation)<= 0){
        echo '<p> Selectionnez un utilisateur </p>';
    }else{
        foreach($userDataVacation as $user){
            $html.= '<tr><td>'.$user['vacation_id'].'</td>';
            $html.= '<td>'.$user['lastname'].'</td>';
            $html.= '<td>'.$user['firstname'].'</td>';
            $html.= '<td>'.dateUsToFr($user['start']).'</td>';
            $html.= '<td>'.dateUsToFr($user['end']).'</td>';
            $html.= '<td>'.vacation_getReasonLabel($user['label']).'</td>';
            $html.='<td>'.$user['comentary'].'</td>';
            $html.= vacation_getStatusLabel($user['status']);
            if($user['status'] == 3){
                $html.='<td><div class="btn-group"><a href="?route=dashboard&action=delete&idvacation='.$user['vacation_id'].'&iduser='.$user['id'].'" class="btn bg-orange" role="button" data-bs-toggle="button">Accepter l\'annulation !</a>';
                $html.='<a href="?route=dashboard&action=status&idvacation='.$user['vacation_id'].'&iduser='.$user['id'].'&state=0" class="btn btn-warning" role="button" data-bs-toggle="button">Ne pas accepter !</a></td>';
            }else{
                $html.='<td><div class="btn-group"><a href="?route=dashboard&action=status&idvacation='.$user['vacation_id'].'&iduser='.$user['id'].'&state=2" class="btn btn-danger" role="button" data-bs-toggle="button">Refusé !</a><a href="?route=dashboard&action=status&idvacation='.$user['vacation_id'].'&iduser='.$user['id'].'&state=0" class="btn btn-warning" role="button" data-bs-toggle="button">En attente !</a><a href="?route=dashboard&action=status&idvacation='.$user['vacation_id'].'&iduser='.$user['id'].'&state=1" class="btn btn-success" role="button" data-bs-toggle="button">Valider !</a></div></td></tr>';
            }
        }
    }

    echo $html;

    ?>



    </tbody>
</table>


<?php include ('../page/template/footer.php'); ?>

