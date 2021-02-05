
<?php

$html ='<nav class="navbar navbar-expand-lg navbar-dark bg-dark">';
$html.='<div class="container-fluid">';
$html.='<a class="navbar-brand" href="?route=dashboard"> Home</a>';
$html.='<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">';
$html.='<span class="navbar-toggler-icon"></span>';
$html.='</button>';
$html.='<div class="collapse navbar-collapse" id="navbarNavAltMarkup">';
$html.='<div class="navbar-nav">';
$html.='<a class="nav-link" href="?route=authenticate&action=logout">Déconnexion</a>';
$html.='</div></div></div></nav>';

if(isset($_SESSION['id'])){
    echo $html;
}
?>
