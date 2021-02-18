<?php if($_SESSION['responsable'] == null){?>
<li class="nav-item">
    <a href="?route=dashboard&action=responsable" class="nav-link">
        <i class="nav-icon far fa-user"></i>
        <p>
            Menu responsable
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Fiches salariés
        </p>
    </a>
</li>
<?php }else{ ?>
<li class="nav-item">
    <a href="?route=dashboard" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        <p>
            Tableau de bord
        </p>
    </a>
</li>
<?php } ?>



<li class="nav-item">
    <a href="?route=settings" class="nav-link">
        <i class="nav-icon fas fa-wrench"></i>
        <p>
            Paramètres
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="?route=authenticate&action=logout" class="nav-link">
        <i class="nav-icon fas fa-power-off"></i>
        <p>
            Déconnexion
        </p>
    </a>
</li>