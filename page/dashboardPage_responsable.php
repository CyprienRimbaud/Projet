<?php include ('../page/template/header.php'); ?>

<div class="card-header">
    Demandes en cour :
</div>


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
        $html.= '<tr><td>'.$user['id'].'</td>';
        $html.= '<td>'.$user['lastname'].'</td>';
        $html.= '<td>'.$user['firstname'].'</td>';
        $html.= '<td>'.dateUsToFr($user['start']).'</td>';
        $html.= '<td>'.dateUsToFr($user['end']).'</td>';
        $html.= '<td>'.vacation_getReasonLabel($user['label']).'</td>';
        $html.= vacation_getStatusLabel($user['status']);
        $html.='    <td>
    <div class="btn-group">
        <button onclick="myFunction()" type="button" class="btn btn-danger">Refusé !</button>
        <button type="button" class="btn btn-warning">En attente</button>
        <button type="button" class="btn btn-success">Accepté !</button>
    </div>
    </td></tr>';
    }
    echo $html
    ?>


    </tbody>
</table>

<?php include ('../page/template/footer.php'); ?>

