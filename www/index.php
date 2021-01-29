<?php
include('../config/env.php');
include('../data/Connection.php');
include('../data/userData.php');
include('../data/vacationData.php');


include('../control/authenticateControl.php');
include('../control/dashboardControl.php');

session_start();


if (isset($_GET['route'])) {
    $route=$_GET['route'];

}

$action='';

if (isset($_GET['action'])) {
    $action=$_GET['action'];
}
if (!isset($_SESSION['id'])){
    $route='authenticate';
}
switch($route){
    case "dashboard":
        dashboardControl($action);
    break;
    case "authenticate":
        authenticateControl($action);
    break;
    default:
        echo("La route spécifiée n'existe pas !");
    break;
}