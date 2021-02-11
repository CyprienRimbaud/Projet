<?php include ('../page/template/header.php'); ?>

<div class="card-body">
    <form class="form-horizontal" action=".?route=capacity&action=addCapacity" method="POST">
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Capacité</label>
            <div class="col-sm-10">
                <div class="fx-relay-email-input-wrapper">
                    <div class="input-group input-group-sm">
                        <input type="text" name="name" class="form-control">
                        <span class="input-group-append">
                    <button type="submit" class="btn btn-info btn-flat"><i class="fas fa-check"></i></button>
                  </span>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <?php foreach ($capacities as $capacity){
                   echo '<th>'.$capacity['name'].'</th>';
                }?>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($roles as $role){
            echo '<tr>';
            echo '<td>'.$role['name'].'</td>';
            foreach($capacities as $capacity){
                $class= capacityData_has($capacity['id'],$role['id']) ? 'bg-green':'bg-red';
                echo '<td onclick="window.location.href=\'?route=capacity&action=toggle&capacity_id='.$capacity['id'].'&role_id='.$role['id'].'\'" class="pointer '.$class.'"></td>                        
                    ';
            }
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>

<?php include ('../page/template/footer.php'); ?>