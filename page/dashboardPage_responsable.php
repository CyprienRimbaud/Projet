<?php include ('../page/template/header.php'); ?>

<div class="card-header">
    Demandes en cour :
</div>
<form method="post" action ="?route=dashboard&action=responsable">
<label>Choisissez la personne voulue</label>
    <select name ="userWanted" select class="form-select" aria-label="Default select example">
        <?php
        $html = '';
        foreach($userData as $user){
            $html.= '<option value ="'.$user['id'].'">'.$user['login'].'</option>';
        }
        echo $html;

        ?>
        <input type="submit" value="Valider">
    </select>
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
        <th>Status actuel</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $html = '';
    foreach($userDataVacation as $user){
        $html.= '<tr><td>'.$user['vacation_id'].'</td>';
        $html.= '<td>'.$user['lastname'].'</td>';
        $html.= '<td>'.$user['firstname'].'</td>';
        $html.= '<td>'.dateUsToFr($user['start']).'</td>';
        $html.= '<td>'.dateUsToFr($user['end']).'</td>';
        $html.= '<td>'.vacation_getReasonLabel($user['label']).'</td>';
        $html.= vacation_getStatusLabel($user['status']);
        $html.='<td><div class="btn-group"><a href="?route=dashboard&action=responsable&idvacation='.$user['vacation_id'].'&iduser='.$user['id'].'&state=2" class="btn btn-danger" role="button" data-bs-toggle="button">Refusé !</a><a href="?route=dashboard&action=responsable&idvacation='.$user['vacation_id'].'&iduser='.$user['id'].'&state=0" class="btn btn-warning" role="button" data-bs-toggle="button">En attente !</a><a href="?route=dashboard&action=responsable&idvacation='.$user['vacation_id'].'&iduser='.$user['id'].'&state=1" class="btn btn-success" role="button" data-bs-toggle="button">Valider !</a></div></td></tr>';
    }
    echo $html;

    ?>



    </tbody>
</table>
<p>Pour mettre à jour actualisez la page</p>

<?php include ('../page/template/footer.php'); ?>

