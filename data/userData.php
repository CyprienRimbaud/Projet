<?php

function userData_findOneWithCredentials($userLogin,$userPwd){
    //$request ="SELECT * FROM user WHERE email='usersio@sio.fr'AND mdp='0ec960d4105605608894658ed65e81a85a34839e'";
    $request ="SELECT * FROM user WHERE login='".$userLogin."' AND password='".$userPwd."'";
    $requestParams=array($userLogin,$userPwd);
    $result=Connection::safeQuery($request,$requestParams);
    return $result;
}

function userData_getAll(){
    $request = 'SELECT * FROM user';
    $result = Connection::query($request,[]);
    return $result;
}