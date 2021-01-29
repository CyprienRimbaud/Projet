<?php

function vacationData_getAllWithId($userId){
    //$request ="SELECT * FROM user WHERE email='usersio@sio.fr'AND mdp='0ec960d4105605608894658ed65e81a85a34839e'";
    $request ="SELECT * FROM vacation WHERE user_id='".$userId."'";

    $result=Connection::query($request);
    return $result;
}